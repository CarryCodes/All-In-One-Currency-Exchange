interface WooCommerceSettingsType {
	statics?: StaticSettings;
	getInfo: () => Promise<void>;
	updateOption: (dynamicItem: string, value: any) => Promise<void>;

	//linkDevice: (dynamicItem: string, sections: string, value: any) => Promise<void>;
}
type StaticSettings = {
	aioce_wc_currency: string;
	aioce_wc_shop: boolean;
	aioce_wc_product: boolean;
	aioce_wc_cart: boolean;
	aioce_wc_checkout: boolean;
	aioce_wc_thank_you: boolean;
	aioce_wc_my_account: boolean;
};
