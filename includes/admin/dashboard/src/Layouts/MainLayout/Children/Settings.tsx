
import ButtonTab from '@/Components/MainLayout/Settings/ButtonTab';

import WoocommerceTab from '@/Components/MainLayout/Settings/WoocommerceTab';
import { useAppStore } from '@/stores/useAppStore';
import { useState } from 'react';

export default function Subscriptions() {
	const username = useAppStore((state) => state.username);
	const [tab, setTab] = useState('Woocommerce');
	return (
		<section className='m-12 max-sm:m-8 mt-16  overflow-auto'>
			<div>
				<h2 className='font-sans text-4xl max-sm:text-xl text-[#293b51] font-semibold'>Settings</h2>
			</div>
			{username == '' ? (
				<>
					<div className='mt-10  text-center'>
						<h2 className='font-sans text-2xl  text-[#293b51] font-semibold'>Connect Now To See Settings!</h2>
					</div>
				</>
			) : (
				<>
					<div className='mt-10 -mb-[1px]'>
						<ButtonTab tab={tab} setTab={setTab} label={'Woocommerce'} />
						<ButtonTab tab={tab} setTab={setTab} label={'TutorLMS (Soon)'} disabled={true} />
				
					</div>
					<div className=' border-[1px] bg-white rounded-r-lg rounded-bl-lg min-w-[405px]'>
						{tab == 'Woocommerce' && <WoocommerceTab />}
						{tab == 'TutorLMS (Soon)'}
						
					</div>
				</>
			)}
		</section>
	);
}
