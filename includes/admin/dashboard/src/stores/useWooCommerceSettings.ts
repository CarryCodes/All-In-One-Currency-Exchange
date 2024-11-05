import apiFetch from '@wordpress/api-fetch';
import { create } from 'zustand';

import { persist, createJSONStorage } from 'zustand/middleware';

export const useWooCommerceSettings = create<WooCommerceSettingsType>()(
	persist(
		(set, get) => ({
			getInfo: async () => {
				try {
					const response: StaticSettings = await apiFetch({ path: '/wc_settings' });

					set({ statics: response });
				} catch (error) {
					console.error(error);
				}
			},
			updateOption: async (key: string, value: any) => {
				const current = get().statics;
				if (current) {
					set({
						statics: {
							...current,
							[key]: value,
						},
					});
				}
				try {
					await apiFetch({
						path: '/wc_settings',
						method: 'POST',
						data: { [key]: value },
					});
				} catch (error) {
					console.error(error);
				}
			},
		}),
		{
			name: 'aioce-wcsetting', // name of the item in the storage (must be unique)
			storage: createJSONStorage(() => sessionStorage), // (optional) by default, 'localStorage' is used
		}
	)
);
