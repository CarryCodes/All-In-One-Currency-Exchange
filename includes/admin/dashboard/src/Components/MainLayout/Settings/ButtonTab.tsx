export default function ButtonTab({ tab, setTab, label, disabled = false }: ButtonTabProps) {
	return (
		<button
			className={`${tab == label && 'bg-gray-200'} border-[1px]  px-6  py-3 max-sm:px-2 max-sm:text-sm ${disabled ? "text-[#b2b2b2] cursor-not-allowed":"text-black"} text-lg font-semibold`}
			onClick={() => {
				setTab(label);
			}}
			disabled={disabled}
		>
			{label}
			
		</button>
	);
}
