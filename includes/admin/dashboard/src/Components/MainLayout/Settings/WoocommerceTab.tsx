import Toggle from '@/Components/Customs/Toggle';
import { useWooCommerceSettings } from '@/stores/useWooCommerceSettings';
import { useEffect } from 'react';

export default function SubscriptionsTab() {
	const getInfo = useWooCommerceSettings((state) => state.getInfo);
	useEffect(() => {
		getInfo();
	}, [getInfo]);
	const statics = useWooCommerceSettings((state) => state.statics);
	const updateOption = useWooCommerceSettings((state) => state.updateOption);

	return (
		<div className=' relative m-8 max-sm:m-6 flex justify-between max-sm:flex-col gap-8 '>
			<div className='flex flex-col '>
				<div className='overflow-x-auto sm:-mx-6 lg:-mx-8'>
					<div className='py-2 inline-block  sm:px-6 lg:px-8'>
						<div className='overflow-hidden'>
							<p className='mt-2 text-[#49607e] text-lg max-sm:text-sm'>Enable/Disable Converted currency preview in Woocommerce pages</p>
							<div className='mb-6 mt-2 text-[#b0b0b0] text-sm max-sm:text-sm '>
								<a href='https://currencyexchangerate-api.com/docs' target='_blank' className='underline'>
									See how it works →
								</a>
							</div>
							<table className=' text-left'>
								<tbody>
									<tr>
										<td className='text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap'>
											Choose the second currency (
											<a className=' underline' href='https://currencyexchangerate-api.com/docs/supported-codes' target='_blank'>
												Supported Codes
											</a>
											)
										</td>
										<td className='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap '>
											<select
												id='countries'
												className='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-black dark:focus:border-black'
												value={statics?.aioce_wc_currency}
												onChange={(e) => {
													updateOption('aioce_wc_currency', e.target.value);
												}}
											>
												<option value='AED'>AED</option>
												<option value='AFN'>AFN</option>
												<option value='ALL'>ALL</option>
												<option value='AMD'>AMD</option>
												<option value='ANG'>ANG</option>
												<option value='AOA'>AOA</option>
												<option value='ARS'>ARS</option>
												<option value='AUD'>AUD</option>
												<option value='AWG'>AWG</option>
												<option value='AZN'>AZN</option>
												<option value='BAM'>BAM</option>
												<option value='BBD'>BBD</option>
												<option value='BDT'>BDT</option>
												<option value='BGN'>BGN</option>
												<option value='BHD'>BHD</option>
												<option value='BIF'>BIF</option>
												<option value='BMD'>BMD</option>
												<option value='BND'>BND</option>
												<option value='BOB'>BOB</option>
												<option value='BRL'>BRL</option>
												<option value='BSD'>BSD</option>
												<option value='BTN'>BTN</option>
												<option value='BWP'>BWP</option>
												<option value='BYN'>BYN</option>
												<option value='BZD'>BZD</option>
												<option value='CAD'>CAD</option>
												<option value='CDF'>CDF</option>
												<option value='CHF'>CHF</option>
												<option value='CLP'>CLP</option>
												<option value='CNY'>CNY</option>
												<option value='COP'>COP</option>
												<option value='CRC'>CRC</option>
												<option value='CUP'>CUP</option>
												<option value='CVE'>CVE</option>
												<option value='CZK'>CZK</option>
												<option value='DJF'>DJF</option>
												<option value='DKK'>DKK</option>
												<option value='DOP'>DOP</option>
												<option value='DZD'>DZD</option>
												<option value='EGP'>EGP</option>
												<option value='ERN'>ERN</option>
												<option value='ETB'>ETB</option>
												<option selected value='EUR'>
													EUR
												</option>
												<option value='FJD'>FJD</option>
												<option value='FKP'>FKP</option>
												<option value='FOK'>FOK</option>
												<option value='GBP'>GBP</option>
												<option value='GEL'>GEL</option>
												<option value='GGP'>GGP</option>
												<option value='GHS'>GHS</option>
												<option value='GIP'>GIP</option>
												<option value='GMD'>GMD</option>
												<option value='GNF'>GNF</option>
												<option value='GTQ'>GTQ</option>
												<option value='GYD'>GYD</option>
												<option value='HKD'>HKD</option>
												<option value='HNL'>HNL</option>
												<option value='HRK'>HRK</option>
												<option value='HTG'>HTG</option>
												<option value='HUF'>HUF</option>
												<option value='IDR'>IDR</option>
												<option value='ILS'>ILS</option>
												<option value='IMP'>IMP</option>
												<option value='INR'>INR</option>
												<option value='IQD'>IQD</option>
												<option value='IRR'>IRR</option>
												<option value='ISK'>ISK</option>
												<option value='JEP'>JEP</option>
												<option value='JMD'>JMD</option>
												<option value='JOD'>JOD</option>
												<option value='JPY'>JPY</option>
												<option value='KES'>KES</option>
												<option value='KGS'>KGS</option>
												<option value='KHR'>KHR</option>
												<option value='KID'>KID</option>
												<option value='KMF'>KMF</option>
												<option value='KRW'>KRW</option>
												<option value='KWD'>KWD</option>
												<option value='KYD'>KYD</option>
												<option value='KZT'>KZT</option>
												<option value='LAK'>LAK</option>
												<option value='LBP'>LBP</option>
												<option value='LKR'>LKR</option>
												<option value='LRD'>LRD</option>
												<option value='LSL'>LSL</option>
												<option value='LYD'>LYD</option>
												<option value='MAD'>MAD</option>
												<option value='MDL'>MDL</option>
												<option value='MGA'>MGA</option>
												<option value='MKD'>MKD</option>
												<option value='MMK'>MMK</option>
												<option value='MNT'>MNT</option>
												<option value='MOP'>MOP</option>
												<option value='MRU'>MRU</option>
												<option value='MUR'>MUR</option>
												<option value='MVR'>MVR</option>
												<option value='MWK'>MWK</option>
												<option value='MXN'>MXN</option>
												<option value='MYR'>MYR</option>
												<option value='MZN'>MZN</option>
												<option value='NAD'>NAD</option>
												<option value='NGN'>NGN</option>
												<option value='NIO'>NIO</option>
												<option value='NOK'>NOK</option>
												<option value='NPR'>NPR</option>
												<option value='NZD'>NZD</option>
												<option value='OMR'>OMR</option>
												<option value='PAB'>PAB</option>
												<option value='PEN'>PEN</option>
												<option value='PGK'>PGK</option>
												<option value='PHP'>PHP</option>
												<option value='PKR'>PKR</option>
												<option value='PLN'>PLN</option>
												<option value='PYG'>PYG</option>
												<option value='QAR'>QAR</option>
												<option value='RON'>RON</option>
												<option value='RSD'>RSD</option>
												<option value='RUB'>RUB</option>
												<option value='RWF'>RWF</option>
												<option value='SAR'>SAR</option>
												<option value='SBD'>SBD</option>
												<option value='SCR'>SCR</option>
												<option value='SDG'>SDG</option>
												<option value='SEK'>SEK</option>
												<option value='SGD'>SGD</option>
												<option value='SHP'>SHP</option>
												<option value='SLE'>SLE</option>
												<option value='SOS'>SOS</option>
												<option value='SRD'>SRD</option>
												<option value='SSP'>SSP</option>
												<option value='STN'>STN</option>
												<option value='SYP'>SYP</option>
												<option value='SZL'>SZL</option>
												<option value='THB'>THB</option>
												<option value='TJS'>TJS</option>
												<option value='TMT'>TMT</option>
												<option value='TND'>TND</option>
												<option value='TOP'>TOP</option>
												<option value='TRY'>TRY</option>
												<option value='TTD'>TTD</option>
												<option value='TVD'>TVD</option>
												<option value='TWD'>TWD</option>
												<option value='TZS'>TZS</option>
												<option value='UAH'>UAH</option>
												<option value='UGX'>UGX</option>
												<option value='USD'>USD</option>
												<option value='UYU'>UYU</option>
												<option value='UZS'>UZS</option>
												<option value='VES'>VES</option>
												<option value='VND'>VND</option>
												<option value='VUV'>VUV</option>
												<option value='WST'>WST</option>
												<option value='XAF'>XAF</option>
												<option value='XCD'>XCD</option>
												<option value='XDR'>XDR</option>
												<option value='XOF'>XOF</option>
												<option value='XPF'>XPF</option>
												<option value='YER'>YER</option>
												<option value='ZAR'>ZAR</option>
												<option value='ZMW'>ZMW</option>
												<option value='ZWL'>ZWL</option>
											</select>
										</td>
									</tr>
									<tr>
										<td className='text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap'>Display In Shop Page</td>
										<td className='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap '>
											<Toggle
												onClick={() => {
													updateOption('aioce_wc_shop', !statics?.aioce_wc_shop);
												}}
												isEnable={statics?.aioce_wc_shop}
											/>
										</td>
									</tr>
									<tr>
										<td className='text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap'>Display In Product Page</td>
										<td className='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap '>
											<Toggle
												onClick={() => {
													updateOption('aioce_wc_product', !statics?.aioce_wc_product);
												}}
												isEnable={statics?.aioce_wc_product}
											/>
										</td>
									</tr>
									<tr>
										<td className='text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap'>Display In Cart Page</td>
										<td className='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap '>
											<Toggle
												onClick={() => {
													updateOption('aioce_wc_cart', !statics?.aioce_wc_cart);
												}}
												isEnable={statics?.aioce_wc_cart}
											/>
										</td>
									</tr>
									<tr>
										<td className='text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap'>Display In Checkout Page</td>
										<td className='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap '>
											<Toggle
												onClick={() => {
													updateOption('aioce_wc_checkout', !statics?.aioce_wc_checkout);
												}}
												isEnable={statics?.aioce_wc_checkout}
											/>
										</td>
									</tr>
									<tr>
										<td className='text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap'>
											Display In Thank You Page
											<p className=' font-thin text-sm font mt-2'>*You can use Elementor Widget for the thank you page.</p>
											<p className=' font-thin text-sm font mt-2'>Search for [AIOCE Thank You Page].</p>
										</td>

										<td className='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap '>
											<Toggle
												onClick={() => {
													updateOption('aioce_wc_thank_you', !statics?.aioce_wc_thank_you);
												}}
												isEnable={statics?.aioce_wc_thank_you}
											/>
										</td>
									</tr>
								
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	);
}