/* eslint-disable no-var */
import ReactDOM from 'react-dom/client';
import { QueryClient, QueryClientProvider } from 'react-query';
import App from './App.tsx';
import React from 'react';
const queryClient = new QueryClient({
	defaultOptions: {
		queries: {
			staleTime: 100,
			refetchOnWindowFocus: false,
			retry: 1,
		},
	},
});

interface AdminPanelGLobals {
	root: string;
	apiNonce: string;
	baseUrl: string;
}

declare global {
	var AIOCE: AdminPanelGLobals;
}

ReactDOM.createRoot(document.getElementById('root')!).render(
	<React.StrictMode>
		<QueryClientProvider client={queryClient}>
			<App />
		</QueryClientProvider>
	</React.StrictMode>
);
