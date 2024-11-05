import { SideBarComponent } from '@/constants/SideBarComponent';

import SideBarButton from './SideBarButton';

export default function SideBar() {
	return (
		<div className='bg-white  w-1/5 max-lg:w-full  lg:rounded-l-xl max-lg:rounded-t-xl overflow-auto   max-lg:border-b-[1px] lg:border-r-[1px]'>
			<div className=' max-lg:mt-6 lg:mt-16 snap-x  max-lg:ml-12 max-lg:flex gap-6'>
				{SideBarComponent.map((item: SideBarButtonProps, index: number) => {
					return <SideBarButton key={index} href={item.href} label={item.label} />;
				})}
				
			</div>
		</div>
	);
}
