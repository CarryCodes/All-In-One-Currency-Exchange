import apiFetch from '@wordpress/api-fetch';
import { create } from 'zustand';
import { createJSONStorage, persist } from 'zustand/middleware';

export const useAppStore = create<AppStoreType>()(
	persist(
		(set, get) => ({
			title: '',
			apikey: '',
			username: '',
			setTitle: (title: string) => {
				document.title = `AIO-Currency Exchange - ${title}`;
				const urlParams = new URLSearchParams(window.location.search);
				urlParams.set('tab', title);
				const newSearchString = urlParams.toString();
				window.history.replaceState(null, '', `${window.location.pathname}?${newSearchString}`);
				set({
					title: title,
				});
			},
			getInfo: async () => {
				try {
					const response: any = await apiFetch({ path: '/dashboard' });

					if (response) {
						set({
							apikey: response.aioce_apikey,
							username: response.aioce_username,
						});
					}
				} catch {
					console.error('Failed to fetch plugin information');
				}
			},
			setInfo: async (aioce_username, aioce_apikey) => {
				try {
					const response: any = await apiFetch({ path: '/dashboard', method: 'POST', data: { aioce_username, aioce_apikey } });

					if (response) {
						set({
							apikey: response.aioce_apikey,
							username: response.aioce_username,
						});
					}
				} catch {
					console.error('Failed to fetch plugin information');
				}
			},
			getQuota: async () => {
				try {
					if (get().apikey != '') {
						const response = await fetch(`https://api.currencyexchangerate-api.com/v1/${get().apikey}/quota`);
						const data = await response.json();
						if (data) {
							set({
								quota: data.quota,
								remaining: data.remaining,
							});
						}
					}
				} catch {
					console.error('Failed to fetch Quota information');
				}
			},
		}),
		{
			name: 'aioce-dashboard', // name of the item in the storage (must be unique)
			storage: createJSONStorage(() => sessionStorage), // (optional) by default, 'localStorage' is used
		}
	)
);
