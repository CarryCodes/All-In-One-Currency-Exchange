export default function Toggle({  isEnable, onClick, disable = false }: ToggleComponentProps) {
	return (
		<div className='flex items-center'>
			
			<div className={`rounded-full w-8 h-4 p-0.5  cursor-pointer ${isEnable ? 'bg-black' : 'bg-gray-300'}`} onClick={disable ? undefined : onClick}>
				<div
					className={`rounded-full w-3 h-3 bg-white transform mx-auto duration-300 ease-in-out ${isEnable ? 'translate-x-2' : '-translate-x-2'}`}
				></div>
			</div>
		
		</div>
	);
}
