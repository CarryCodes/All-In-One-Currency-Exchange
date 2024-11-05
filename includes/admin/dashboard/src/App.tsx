import apiFetch from '@wordpress/api-fetch';

import './assets/css/index.css';
import MainLayout from './Layouts/MainLayout/MainLayout';
import { useAppStore } from './stores/useAppStore';
import Dashboard from './Layouts/MainLayout/Children/Dashboard';
import Devices from './Layouts/MainLayout/Children/Help';
import Subscriptions from './Layouts/MainLayout/Children/Settings';

import { useEffect } from 'react';
import NotFound from './Components/NotFound';

enum DashbordPages {
	Dashboard = 'dashboard',
	Settings = 'settings',
	Help = 'help',
}
apiFetch.use(apiFetch.createRootURLMiddleware(window.AIOCE?.root));
apiFetch.use(apiFetch.createNonceMiddleware(window.AIOCE?.apiNonce));
//console.log(window.AIOCE?.baseUrl); // for more security check if the baseurl is ours
function App() {
	document.getElementById('wpfooter')?.remove();
	const title = useAppStore((state) => state.title);
	const setTitle = useAppStore((state) => state.setTitle);
	const getInfo = useAppStore((state) => state.getInfo);
	const isTitleInDashbordPages = Object.values(DashbordPages).includes(title as any);
	getInfo();
	useEffect(() => {
		if (title == '') {
			const urlParams = new URLSearchParams(window.location.search);
			const currentPage = urlParams.get('tab') === null || urlParams.get('tab') === '' ? 'dashboard' : urlParams.get('tab');
			setTitle(currentPage as string);
		}
	}, [title, setTitle]);

	return (
		<div className=' relative'>
			{isTitleInDashbordPages && (
				<MainLayout>
					{title == 'dashboard' && <Dashboard />}
					{title == 'help' && <Devices />}
					{title == 'settings' && <Subscriptions />}
				</MainLayout>
			)}
			{!isTitleInDashbordPages && !title && <NotFound />}
		</div>
	);
}

export default App;
