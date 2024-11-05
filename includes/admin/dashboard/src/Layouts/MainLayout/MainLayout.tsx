import MainLayoutLoader from '@/Components/Loaders/MainLayoutLoader';
import SideBar from '@/Components/MainLayout/SideBar/SideBar';
import { Logo } from '@/constants/Logo';
import { useAppStore } from '@/stores/useAppStore';
import React, { Suspense } from 'react';

export default function MainLayout({ children }: { children: React.ReactNode }) {
	const setInfo = useAppStore((state) => state.setInfo);
	const username = useAppStore((state) => state.username);
	return (
		<main className=' bg-[#f1f4f7]  flex flex-col -ml-6'>
			<div className='bg-black py-32'>
				<div className='-mt-20 gap-12 flex flex-col'>
					<a href='/' className='flex justify-center '>
						<img className='w-[128px] h-[128px]' src={Logo} width={128} height={128} alt='logo' />
					</a>
					<div className='pb-10 mt-2 flex justify-center gap-4 flex-col items-center'>
						<h1 className='font-sans  text-white font-semibold  text-3xl '> {username === '' ? 'Anonymous' : `Hello, ${username}`}</h1>
						{username !== '' && (
							<div className='mb-2 text-[#b0b0b0] text-sm max-sm:text-sm  cursor-pointer '>
								<button
									className='underline hover:text-white'
									onClick={async () => {
										await setInfo('', '');
									}}
								>
									LOGOUT →
								</button>
							</div>
						)}
						{username === '' && (
							<div className='mb-2 text-[#b0b0b0] text-sm max-sm:text-sm  cursor-pointer '>
								<button
									className='underline hover:text-white'
									onClick={async () => {
										{
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
														}
													}
												} catch {
													() => {};
												}
											}, 10);
										}
									}}
								>
									Connect Now →
								</button>
							</div>
						)}
					</div>
				</div>
			</div>
			<div className=' xl:mx-48  -mt-28 flex-grow mx-4'>
				<div className='flex min-h-96 shadow-xl shadow-black/5 max-lg:flex-col min-w-[343px] '>
					<SideBar />
					<div className=' bg-[#fbfcfd]  w-4/5 lg:rounded-r-xl max-lg:rounded-b-xl max-lg:w-full  min-h-[630px] overflow-auto'>
						<Suspense fallback={<MainLayoutLoader />}>{children}</Suspense>
					</div>
				</div>
			</div>
			<footer className=' border-t-[1px] mt-16  pt-6 pb-10 text-center dark:text-white-dark ltr:sm:text-left rtl:sm:text-right'>
				All Rights Reserved © {new Date().getFullYear()} -{' '}
				<a href='https://currencyexchangerate-api.com' target='_blank'>
					All In One Currency Exchange
				</a>
			</footer>
		</main>
	);
}
