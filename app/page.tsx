'use client';

import { useState, useEffect, useRef } from 'react';
import { Send, Trash2, Copy, Download, RotateCcw, Menu, X } from 'lucide-react';
import ChatMessage from '@/components/ChatMessage';
import ModelSelector from '@/components/ModelSelector';
import SystemPromptEditor from '@/components/SystemPromptEditor';

interface Message {
  id: string;
  role: 'user' | 'assistant';
  content: string;
  timestamp: Date;
}

const MODELS = [
  { id: 'gpt-4-turbo', name: 'GPT-4 Turbo', provider: 'openai' },
  { id: 'gpt-4', name: 'GPT-4', provider: 'openai' },
  { id: 'gpt-3.5-turbo', name: 'GPT-3.5 Turbo', provider: 'openai' },
  { id: 'claude-3-opus', name: 'Claude 3 Opus', provider: 'anthropic' },
  { id: 'claude-3-sonnet', name: 'Claude 3 Sonnet', provider: 'anthropic' },
  { id: 'grok-beta', name: 'Grok Beta', provider: 'xai' },
  { id: 'mistral-large', name: 'Mistral Large', provider: 'mistral' },
  { id: 'llama-2-70b', name: 'Llama 2 70B', provider: 'meta' },
];

const DEFAULT_SYSTEM_PROMPT = `You are MindMatrix AI, an advanced and helpful AI assistant created by WINIKS.co. 
You provide accurate, comprehensive, and thoughtful responses to user queries. 
You are knowledgeable about a wide range of topics including technology, business, science, and creative domains. 
Always maintain a professional yet friendly tone, and provide clear explanations with relevant examples when needed.`;

export default function ChatPage() {
  const [messages, setMessages] = useState<Message[]>([]);
  const [input, setInput] = useState('');
  const [loading, setLoading] = useState(false);
  const [selectedModel, setSelectedModel] = useState(MODELS[0].id);
  const [systemPrompt, setSystemPrompt] = useState(DEFAULT_SYSTEM_PROMPT);
  const [showSettings, setShowSettings] = useState(false);
  const [sidebarOpen, setSidebarOpen] = useState(true);
  const [apiStatus, setApiStatus] = useState<'online' | 'offline'>('online');
  const messagesEndRef = useRef<HTMLDivElement>(null);

  const scrollToBottom = () => {
    messagesEndRef.current?.scrollIntoView({ behavior: 'smooth' });
  };

  useEffect(() => {
    scrollToBottom();
  }, [messages]);

  useEffect(() => {
    const savedMessages = localStorage.getItem('chatMessages');
    if (savedMessages) {
      try {
        const parsed = JSON.parse(savedMessages);
        setMessages(parsed.map((msg: any) => ({
          ...msg,
          timestamp: new Date(msg.timestamp),
        })));
      } catch (e) {
        console.error('Failed to load messages:', e);
      }
    }
  }, []);

  useEffect(() => {
    localStorage.setItem('chatMessages', JSON.stringify(messages));
  }, [messages]);

  const sendMessage = async (e: React.FormEvent) => {
    e.preventDefault();
    if (!input.trim()) return;

    const userMessage: Message = {
      id: Date.now().toString(),
      role: 'user',
      content: input,
      timestamp: new Date(),
    };

    setMessages((prev) => [...prev, userMessage]);
    setInput('');
    setLoading(true);

    try {
      const response = await fetch('/api/chat', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          messages: messages.map((msg) => ({
            role: msg.role,
            content: msg.content,
          })),
          userMessage: input,
          model: selectedModel,
          systemPrompt,
        }),
      });

      if (!response.ok) {
        throw new Error(`API error: ${response.status}`);
      }

      const data = await response.json();
      setApiStatus('online');

      const assistantMessage: Message = {
        id: (Date.now() + 1).toString(),
        role: 'assistant',
        content: data.content,
        timestamp: new Date(),
      };

      setMessages((prev) => [...prev, assistantMessage]);
    } catch (error) {
      console.error('Error sending message:', error);
      setApiStatus('offline');

      const errorMessage: Message = {
        id: (Date.now() + 1).toString(),
        role: 'assistant',
        content: 'Sorry, I encountered an error processing your request. Please check your API key or try again later.',
        timestamp: new Date(),
      };

      setMessages((prev) => [...prev, errorMessage]);
    } finally {
      setLoading(false);
    }
  };

  const clearChat = () => {
    if (window.confirm('Are you sure you want to clear the chat history?')) {
      setMessages([]);
    }
  };

  const exportChat = () => {
    const content = messages
      .map(
        (msg) =>
          `[${msg.timestamp.toLocaleTimeString()}] ${msg.role.toUpperCase()}:\n${msg.content}`
      )
      .join('\n\n');

    const element = document.createElement('a');
    element.setAttribute(
      'href',
      'data:text/plain;charset=utf-8,' + encodeURIComponent(content)
    );
    element.setAttribute('download', `chat-export-${Date.now()}.txt`);
    element.style.display = 'none';
    document.body.appendChild(element);
    element.click();
    document.body.removeChild(element);
  };

  const currentModelName = MODELS.find((m) => m.id === selectedModel)?.name || 'Unknown';

  return (
    <div className="flex h-screen bg-slate-950 text-white overflow-hidden">
      {/* Sidebar */}
      <div
        className={`${
          sidebarOpen ? 'w-64' : 'w-0'
        } glass border-r border-purple-500/20 transition-all duration-300 overflow-hidden flex flex-col`}
      >
        <div className="p-4 border-b border-purple-500/20">
          <div className="flex items-center justify-between">
            <h1 className="text-xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
              MindMatrix
            </h1>
            <button
              onClick={() => setSidebarOpen(false)}
              className="lg:hidden p-1 hover:bg-white/10 rounded"
            >
              <X size={20} />
            </button>
          </div>
        </div>

        <div className="flex-1 overflow-y-auto p-4 space-y-2">
          <button
            onClick={() => {
              clearChat();
              setSidebarOpen(false);
            }}
            className="glass-hover w-full px-4 py-2 rounded-lg flex items-center gap-2 text-sm"
          >
            <RotateCcw size={16} />
            New Chat
          </button>
          <button
            onClick={() => setShowSettings(!showSettings)}
            className="glass-hover w-full px-4 py-2 rounded-lg flex items-center gap-2 text-sm"
          >
            <Menu size={16} />
            Settings
          </button>
          <button
            onClick={exportChat}
            disabled={messages.length === 0}
            className="glass-hover w-full px-4 py-2 rounded-lg flex items-center gap-2 text-sm disabled:opacity-50"
          >
            <Download size={16} />
            Export Chat
          </button>
        </div>

        <div className="p-4 border-t border-purple-500/20 text-xs text-gray-400">
          <p>API Status: <span className={apiStatus === 'online' ? 'text-green-400' : 'text-red-400'}>{apiStatus}</span></p>
          <p className="mt-2">Model: {currentModelName}</p>
        </div>
      </div>

      {/* Main Content */}
      <div className="flex-1 flex flex-col">
        {/* Header */}
        <div className="glass border-b border-purple-500/20 p-4 flex items-center justify-between">
          <button
            onClick={() => setSidebarOpen(!sidebarOpen)}
            className="lg:hidden p-2 hover:bg-white/10 rounded"
          >
            <Menu size={20} />
          </button>
          <h2 className="text-lg font-semibold flex-1 text-center">
            MindMatrix AI Chat - {currentModelName}
          </h2>
          <div className="w-10" />
        </div>

        {/* Messages Area */}
        <div className="flex-1 overflow-y-auto p-6 space-y-4">
          {messages.length === 0 && (
            <div className="flex flex-col items-center justify-center h-full text-center">
              <div className="mb-4">
                <div className="text-5xl mb-4">🤖</div>
                <h3 className="text-2xl font-bold mb-2">Welcome to MindMatrix AI</h3>
                <p className="text-gray-400 max-w-md">
                  Start a conversation with advanced AI models. Your messages are saved locally.
                </p>
              </div>
            </div>
          )}

          {messages.map((msg) => (
            <ChatMessage key={msg.id} message={msg} />
          ))}

          {loading && (
            <div className="flex items-center gap-3">
              <div className="w-8 h-8 rounded-full bg-gradient-to-r from-purple-400 to-pink-400 flex items-center justify-center flex-shrink-0">
                <div className="animate-pulse-glow">✨</div>
              </div>
              <div className="glass rounded-lg p-4 max-w-md">
                <p className="text-gray-300">Thinking...</p>
              </div>
            </div>
          )}

          <div ref={messagesEndRef} />
        </div>

        {/* Settings Panel */}
        {showSettings && (
          <div className="glass border-t border-purple-500/20 p-4 max-h-48 overflow-y-auto">
            <ModelSelector
              models={MODELS}
              selectedModel={selectedModel}
              onModelChange={setSelectedModel}
            />
            <SystemPromptEditor
              systemPrompt={systemPrompt}
              onSystemPromptChange={setSystemPrompt}
            />
          </div>
        )}

        {/* Input Area */}
        <div className="glass border-t border-purple-500/20 p-4">
          <form onSubmit={sendMessage} className="flex gap-3">
            <input
              type="text"
              value={input}
              onChange={(e) => setInput(e.target.value)}
              placeholder="Ask me anything..."
              disabled={loading}
              className="flex-1 glass rounded-lg px-4 py-3 bg-white/5 border border-purple-500/20 focus:border-purple-500/50 focus:outline-none transition-colors disabled:opacity-50"
            />
            <button
              type="submit"
              disabled={loading || !input.trim()}
              className="glass-hover px-6 py-3 rounded-lg bg-gradient-to-r from-purple-500 to-pink-500 disabled:opacity-50 flex items-center gap-2 font-semibold"
            >
              <Send size={18} />
            </button>
          </form>
        </div>
      </div>
    </div>
  );
}