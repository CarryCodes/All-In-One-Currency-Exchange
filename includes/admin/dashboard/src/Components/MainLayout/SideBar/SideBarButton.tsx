import { useAppStore } from '@/stores/useAppStore';

export default function SideBarButton({ href, label }: SideBarButtonProps) {
	const title = useAppStore((state) => state.title);
	const setTitle = useAppStore((state) => state.setTitle);
	return (
		<div
			className=' cursor-pointer'
			onClick={() => {
				setTitle(href);
			}}
		>
			<div
				className={`p-4 relative lg:border-l-[6px]  max-lg:border-b-[6px] ${
					href == title ? `border-black text-black lg:bg-gray-200` : `border-white `
				}  lg:hover:bg-gray-200 hover:border-black font-semibold  hover:text-black text-sm`}
			>
				{label}
			</div>
		</div>
	);
}
