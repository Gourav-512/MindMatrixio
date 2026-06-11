'use client';

import { useState } from 'react';
import { Send, Sparkles, Code, FileText, Bot } from 'lucide-react';

export default function Home() {
  const [activeTool, setActiveTool] = useState('chat');
  const [message, setMessage] = useState('');
  const [response, setResponse] = useState('');
  const [loading, setLoading] = useState(false);

  const tools = [
    { id: 'chat', name: 'AI Chat', icon: Bot, desc: 'Talk to powerful LLMs' },
    { id: 'summarize', name: 'Summarizer', icon: FileText, desc: 'Summarize long text' },
    { id: 'code', name: 'Code Assistant', icon: Code, desc: 'Generate & explain code' },
  ];

  
  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    if (!message.trim()) return;

    setLoading(true);
    try {
      const res = await fetch('/api/chat', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ message, tool: activeTool }),
      });
      const data = await res.json();
      setResponse(data.response || 'No response received');
    } catch (error) {
      setResponse('Error connecting to AI. Please check your API keys.');
    }
    setLoading(false);
  };

  
  return (
    <div className="min-h-screen bg-gradient-to-br from-gray-950 via-black to-gray-950">
      {/* Navbar */}
      <nav className="border-b border-gray-800 bg-black/80 backdrop-blur-md sticky top-0 z-50">
        <div className="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
          <div className="flex items-center gap-3">
            <Sparkles className="w-8 h-8 text-purple-500" />
            <h1 className="text-2xl font-bold tracking-tight">MindMatrix<span className="text-purple-500">.io</span></h1>
          </div>
          <div className="flex gap-6 text-sm">
            <a href="#tools" className="hover:text-purple-400 transition">Tools</a>
            <a href="#" className="hover:text-purple-400 transition">Pricing</a>
            <a href="#" className="hover:text-purple-400 transition">Docs</a>
          </div>
        </div>
      </nav>
      

      <div className="max-w-7xl mx-auto px-6 py-12">
        <div className="text-center mb-16">
          <h2 className="text-6xl font-bold mb-4 bg-gradient-to-r from-white to-purple-400 bg-clip-text text-transparent">
            Your AI Super Toolkit
          </h2>
          <p className="text-xl text-gray-400 max-w-2xl mx-auto">
            Powerful AI tools powered by Grok, Claude, and more — completely free tier available.
          </p>
        </div>

        {/* Tools Grid */}
        <div id="tools" className="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
          {tools.map((tool) => (
            <div
              key={tool.id}
              onClick={() => setActiveTool(tool.id)}
              className={`p-8 rounded-3xl border cursor-pointer transition-all hover:scale-105 ${activeTool === tool.id ? 'border-purple-500 bg-gray-900' : 'border-gray-800 hover:border-gray-700'}`}
            >
              <tool.icon className="w-10 h-10 mb-6 text-purple-500" />
              <h3 className="text-2xl font-semibold mb-2">{tool.name}</h3>
              <p className="text-gray-400">{tool.desc}</p>
            </div>
          ))}
        </div>

        {/* Main Tool Area */}
        <div className="max-w-4xl mx-auto bg-gray-900 rounded-3xl p-8 border border-gray-800">
          <div className="flex items-center gap-4 mb-8">
            <div className="p-3 bg-purple-500/10 rounded-2xl">
              <Bot className="w-8 h-8 text-purple-500" />
            </div>
            <div>
              <h3 className="text-3xl font-semibold">{tools.find(t => t.id === activeTool)?.name}</h3>
              <p className="text-gray-500">Powered by OpenRouter + Grok</p>
            </div>
          </div>

          <form onSubmit={handleSubmit} className="space-y-6">
            <textarea
              value={message}
              onChange={(e) => setMessage(e.target.value)}
              placeholder="Type your request here... (e.g., Summarize this article, Write Python code for..., Explain this concept)" 
              className="w-full h-40 bg-black border border-gray-700 rounded-2xl p-6 text-lg focus:outline-none focus:border-purple-500 resize-y"
            />

            <button
              type="submit"
              disabled={loading}
              className="w-full py-4 bg-gradient-to-r from-purple-600 to-violet-600 rounded-2xl font-medium text-lg flex items-center justify-center gap-3 hover:from-purple-500 hover:to-violet-500 disabled:opacity-70 transition"
            >
              {loading ? 'Thinking...' : 'Send to AI'}
              <Send className="w-5 h-5" />
            </button>
          </form>

          {response && (
            <div className="mt-10 p-8 bg-black/50 border border-gray-800 rounded-3xl">
              <h4 className="font-medium text-purple-400 mb-4">AI Response:</h4>
              <div className="prose prose-invert max-w-none text-gray-300 whitespace-pre-wrap">
                {response}
              </div>
            </div>
          )}
        </div>
      </div>
    </div>
  );
}
