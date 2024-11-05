export default function StillNeedHelp() {
	return (
		<div className='mt-10 border-[1px] bg-white rounded-lg '>
			<div className='m-8 max-sm:m-6 flex  justify-center items-center flex-col gap-8'>
				<h1 className='text-3xl font-semibold'>Still need help?</h1>
				<h3 className='text-lg font-medium text-slate-400'>Our specialists are always happy to help.</h3>
				<h3 className='text-lg font-medium text-slate-400'>
					Contact us during standard business hours or email us 24/7 and we&#39;ll get back to you.
				</h3>
				<div className='flex gap-4 '>
					<a
						href='mailto:support@currencyexchangerate-api.com'
						className=' bg-black  px-6 rounded-md py-1 text-white text-lg font-semibold uppercase'
					>
						Contact Us
					</a>
					<a
						href='https://currencyexchangerate-api.com/docs'
						target='_blank'
						className=' bg-black  px-6 rounded-md py-1 text-white text-lg font-semibold uppercase'
					>
						Visit our community
					</a>
				</div>
			</div>
		</div>
	);
}
