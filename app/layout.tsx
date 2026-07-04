import type { Metadata } from 'next';
import './globals.css';

export const metadata: Metadata = {
  title: 'MindMatrix AI Chat',
  description: 'Advanced AI Chatbot Platform - Chat with multiple AI models',
  viewport: 'width=device-width, initial-scale=1',
  icons: {
    icon: '/favicon.ico',
  },
};

export default function RootLayout({
  children,
}: {
  children: React.ReactNode;
}) {
  return (
    <html lang="en">
      <body className="bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900">
        {children}
      </body>
    </html>
  );
}