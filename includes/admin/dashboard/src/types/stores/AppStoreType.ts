interface AppStoreType {
	title: string;
	apikey: string;
	username: string;
	quota?: number;
	remaining?: number;
	setTitle: (title: string) => void;
	getInfo: () => Promise<void>;
	setInfo: (aioce_username: string, aioce_apikey: string) => Promise<void>;
	getQuota: () => Promise<void>;
}
