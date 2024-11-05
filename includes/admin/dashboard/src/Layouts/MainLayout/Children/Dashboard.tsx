import { useAppStore } from '@/stores/useAppStore';
import { useEffect } from 'react';

export default function Dashboard() {
	const username = useAppStore((state) => state.username);
	const setInfo = useAppStore((state) => state.setInfo);
	const getQuota = useAppStore((state) => state.getQuota);
	const quota = useAppStore((state) => state.quota);
	const remainingQuota = useAppStore((state) => state.remaining);
	useEffect(() => {
		getQuota();
	}, [getQuota]);

	return (
		<section className='m-12 max-sm:m-8 mt-16 '>
			<div>
				<h2 className='font-sans text-4xl text-[#293b51] font-semibold'>Dashboard</h2>
			</div>
			{username !== '' ? (
				<div className='mt-10 border-[1px] bg-white  rounded-lg '>
					<div className='m-8 max-sm:m-6 flex justify-between max-sm:flex-col gap-8'>
						<div className='flex'>
							<div className='flex gap-1 flex-col '>
								<div className='  mb-4'>
									<h4 className=' font-light text-sm text-[#6b6b6b] border-b-2 pb-2 inline'>{quota == 100 ? 'Free Plan' : 'Paid'}</h4>
								</div>
								<h5 className='text-xl text-[#293b51] '>Quota Available</h5>
								<div className='text-slate-500 text-md font-light'>
									<span className='font-bold text-lg text-[#293b51]'>
										{remainingQuota}
										<span className=' font-normal text-sm text-[#6b6b6b] '> /{quota}</span>
									</span>
								</div>
							</div>
						</div>

						<div className='flex justify-center items-center flex-col gap-3'>
							<a
								className=' active:text-white hover:text-white bg-black  px-6 rounded-3xl py-1 text-white  text-lg font-semibold uppercase'
								target='_blank'
								href='https://currencyexchangerate-api.com/pricing'
							>
								{remainingQuota == 100 ? 'Upgrade Plan →' : 'Change Plan →'}
							</a>
						</div>
					</div>
				</div>
			) : (
				<div className='mt-10 border-[1px] bg-white rounded-lg '>
					<div className='m-8 max-sm:m-6 flex  justify-center items-center flex-col gap-8'>
						<h3 className='text-lg font-medium text-slate-400'>Please Connect your account to start the currency exchange service</h3>
						<div className='flex gap-4 '>
							<button
								className=' bg-black  px-6 rounded-md py-1 text-white text-lg font-semibold uppercase'
								onClick={() => {
									const currentUrl = encodeURIComponent(window.location.href);
									const site = encodeURIComponent(window.location.host);
									const loginUrl = `https://currencyexchangerate-api.com/connect?connect=true&callback=${currentUrl}&site=${site}`;
									const mywindow = window.open(loginUrl, '_blank', 'width=600,height=400');

									const intervalId = setInterval(async () => {
										try {
											if (mywindow?.location.host == window.location.host) {
												const searchParams = new URLSearchParams(mywindow?.location.search);
												const apikey = searchParams.get('apikey');
												const name = searchParams.get('username');
												if (apikey && name) {
													await setInfo(name, apikey);
													clearInterval(intervalId);
													mywindow?.close();
													getQuota();
												}
											}
										} catch {
											() => {};
										}
									}, 10);
								}}
							>
								Connect Now →
							</button>
						</div>
					</div>
				</div>
			)}
		</section>
	);
}
