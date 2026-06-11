import type { Metadata } from 'next';
import './globals.css';

export const metadata: Metadata = {
  title: 'MindMatrixio - AI Tools Platform',
  description: 'Your all-in-one AI toolkit for productivity and creativity All in One Platform',
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
    <html lang="en" className="dark">
      <body className="bg-gray-950 text-white min-h-screen">
        {children}
      </body>
    </html>
  );
}
