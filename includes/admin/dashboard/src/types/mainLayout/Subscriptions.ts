interface ButtonTabProps {
	tab: string;
	setTab: (name: string) => void | null;
	label: string;
	disabled?: boolean ;
}
