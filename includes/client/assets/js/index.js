const currencySymbols = {
  AED: "د.إ", // United Arab Emirates Dirham
  AFN: "؋", // Afghan Afghani
  ALL: "L", // Albanian Lek
  AMD: "֏", // Armenian Dram
  ANG: "ƒ", // Netherlands Antillean Guilder
  AOA: "Kz", // Angolan Kwanza
  ARS: "$", // Argentine Peso
  AUD: "$", // Australian Dollar
  AWG: "ƒ", // Aruban Florin
  AZN: "₼", // Azerbaijani Manat
  BAM: "KM", // Bosnia and Herzegovina Convertible Mark
  BBD: "$", // Barbadian Dollar
  BDT: "৳", // Bangladeshi Taka
  BGN: "лв", // Bulgarian Lev
  BHD: ".د.ب", // Bahraini Dinar
  BIF: "FBu", // Burundian Franc
  BMD: "$", // Bermudian Dollar
  BND: "$", // Brunei Dollar
  BOB: "$b", // Bolivian Boliviano
  BRL: "R$", // Brazilian Real
  BSD: "$", // Bahamian Dollar
  BTN: "Nu.", // Bhutanese Ngultrum
  BWP: "P", // Botswanan Pula
  BYN: "Br", // Belarusian Ruble
  BZD: "$", // Belize Dollar
  CAD: "$", // Canadian Dollar
  CDF: "FC", // Congolese Franc
  CHF: "CHF", // Swiss Franc
  CLP: "$", // Chilean Peso
  CNY: "¥", // Chinese Yuan
  COP: "$", // Colombian Peso
  CRC: "₡", // Costa Rican Colón
  CUC: "$", // Cuban Convertible Peso
  CUP: "$", // Cuban Peso
  CVE: "$", // Cape Verdean Escudo
  CZK: "Kč", // Czech Koruna
  DJF: "Fdj", // Djiboutian Franc
  DKK: "kr", // Danish Krone
  DOP: "$", // Dominican Peso
  DZD: "د.ج", // Algerian Dinar
  EGP: "£", // Egyptian Pound
  ERN: "Nfk", // Eritrean Nakfa
  ETB: "Br", // Ethiopian Birr
  EUR: "€", // Euro
  FJD: "$", // Fijian Dollar
  FKP: "£", // Falkland Islands Pound
  FOK: "kr", // Faroese Króna
  GBP: "£", // British Pound Sterling
  GEL: "₾", // Georgian Lari
  GHS: "₵", // Ghanaian Cedi
  GIP: "£", // Gibraltar Pound
  GMD: "D", // Gambian Dalasi
  GNF: "FG", // Guinean Franc
  GTQ: "Q", // Guatemalan Quetzal
  GYD: "$", // Guyanaese Dollar
  HKD: "$", // Hong Kong Dollar
  HNL: "L", // Honduran Lempira
  HRK: "kn", // Croatian Kuna
  HTG: "G", // Haitian Gourde
  HUF: "Ft", // Hungarian Forint
  IDR: "Rp", // Indonesian Rupiah
  ILS: "₪", // Israeli New Shekel
  INR: "₹", // Indian Rupee
  IQD: "ع.د", // Iraqi Dinar
  IRR: "﷼", // Iranian Rial
  ISK: "kr", // Icelandic Króna
  JMD: "$", // Jamaican Dollar
  JOD: "د.ا", // Jordanian Dinar
  JPY: "¥", // Japanese Yen
  KES: "KSh", // Kenyan Shilling
  KGS: "с", // Kyrgystani Som
  KHR: "៛", // Cambodian Riel
  KID: "$", // Kiribati Dollar
  KMF: "CF", // Comorian Franc
  KRW: "₩", // South Korean Won
  KWD: "د.ك", // Kuwaiti Dinar
  KYD: "$", // Cayman Islands Dollar
  KZT: "₸", // Kazakhstani Tenge
  LAK: "₭", // Laotian Kip
  LBP: "ل.ل", // Lebanese Pound
  LKR: "Rs", // Sri Lankan Rupee
  LRD: "$", // Liberian Dollar
  LSL: "L", // Lesotho Loti
  LYD: "ل.د", // Libyan Dinar
  MAD: "د.م.", // Moroccan Dirham
  MDL: "L", // Moldovan Leu
  MGA: "Ar", // Malagasy Ariary
  MKD: "ден", // Macedonian Denar
  MMK: "K", // Myanma Kyat
  MNT: "₮", // Mongolian Tugrik
  MOP: "MOP$", // Macanese Pataca
  MRU: "UM", // Mauritanian Ouguiya
  MUR: "₨", // Mauritian Rupee
  MVR: "Rf", // Maldivian Rufiyaa
  MWK: "MK", // Malawian Kwacha
  MXN: "$", // Mexican Peso
  MYR: "RM", // Malaysian Ringgit
  MZN: "MT", // Mozambican Metical
  NAD: "$", // Namibian Dollar
  NGN: "₦", // Nigerian Naira
  NIO: "C$", // Nicaraguan Córdoba
  NOK: "kr", // Norwegian Krone
  NPR: "Rs", // Nepalese Rupee
  NZD: "$", // New Zealand Dollar
  OMR: "ر.ع.", // Omani Rial
  PAB: "B/.", // Panamanian Balboa
  PEN: "S/.", // Peruvian Nuevo Sol
  PGK: "K", // Papua New Guinean Kina
  PHP: "₱", // Philippine Peso
  PKR: "Rs", // Pakistani Rupee
  PLN: "zł", // Polish Zloty
  PYG: "₲", // Paraguayan Guarani
  QAR: "ر.ق", // Qatari Rial
  RON: "lei", // Romanian Leu
  RSD: "дин.", // Serbian Dinar
  RUB: "₽", // Russian Ruble
  RWF: "FRw", // Rwandan Franc
  SAR: "ر.س", // Saudi Riyal
  SBD: "$", // Solomon Islands Dollar
  SCR: "₨", // Seychellois Rupee
  SDG: "ج.س.", // Sudanese Pound
  SEK: "kr", // Swedish Krona
  SGD: "$", // Singapore Dollar
  SHP: "£", // Saint Helena Pound
  SLL: "Le", // Sierra Leonean Leone
  SOS: "S", // Somali Shilling
  SRD: "$", // Surinamese Dollar
  SSP: "£", // South Sudanese Pound
  STN: "Db", // São Tomé and Príncipe Dobra
  SYP: "ل.س", // Syrian Pound
  SZL: "E", // Swazi Lilangeni
  THB: "฿", // Thai Baht
  TJS: "SM", // Tajikistani Somoni
  TMT: "T", // Turkmenistani Manat
  TND: "د.ت", // Tunisian Dinar
  TOP: "T$", // Tongan Paʻanga
  TRY: "₺", // Turkish Lira
  TTD: "$", // Trinidad and Tobago Dollar
  TVD: "$", // Tuvaluan Dollar
  TZS: "TSh", // Tanzanian Shilling
  UAH: "₴", // Ukrainian Hryvnia
  UGX: "USh", // Ugandan Shilling
  USD: "$", // United States Dollar
  UYU: "$U", // Uruguayan Peso
  UZS: "soʼm", // Uzbekistani Som
  VES: "Bs.S.", // Venezuelan Sovereign Bolívar
  VND: "₫", // Vietnamese Dong
  VUV: "VT", // Vanuatu Vatu
  WST: "T", // Samoan Tala
  XAF: "FCFA", // Central African CFA Franc
  XAG: "XAG", // Silver Ounce
  XAU: "XAU", // Gold Ounce
  XCD: "$", // East Caribbean Dollar
  XDR: "XDR", // International Monetary Fund (IMF) Special Drawing Rights
  XOF: "CFA", // West African CFA Franc
  XPF: "₣", // CFP Franc
  YER: "ر.ي", // Yemeni Rial
  ZAR: "R", // South African Rand
  ZMK: "ZK", // Zambian Kwacha (Old)
  ZMW: "ZK", // Zambian Kwacha (New)
  ZWL: "$", // Zimbabwean Dollar
};
function getCurrencySymbol(currencyCode) {
  return currencySymbols[currencyCode] || currencyCode;
}
const initializeCheckout = () => {
  if (window.wc && window.wc.blocksCheckout != undefined) {
    const aioce_settings = window.wc.wcSettings.getSetting(
      "aioce-wc-blocks_data",
      {}
    );

    const { registerCheckoutFilters } = window.wc.blocksCheckout;

    const isOrderSummaryContext = (args) => args?.context === "summary";
    const isCartContext = (args) => args?.context === "cart";

    const modifyCartItemPrice = (
      defaultValue,
      extensions,
      args,
      validation
    ) => {
      if (aioce_settings.conversion_rate != null)
        if (
          (isCartContext(args) &&
            aioce_settings.settings.aioce_wc_cart == "1") ||
          (isOrderSummaryContext(args) &&
            aioce_settings.settings.aioce_wc_checkout == "1")
        ) {
          let price =
            parseInt(args.cartItem.totals.line_subtotal) *
            aioce_settings.conversion_rate;

          price /= 100;

          return (
            "<price/> (" +
            getCurrencySymbol(aioce_settings.currency) +
            " " +
            price.toFixed(2) +
            ")"
          );
        }
      return defaultValue;
    };
    const modifySubtotalPriceFormat = (
      defaultValue,
      extensions,
      args,
      validation
    ) => {
      if (aioce_settings.conversion_rate != null)
        if (
          (isCartContext(args) &&
            aioce_settings.settings.aioce_wc_cart == "1") ||
          (isOrderSummaryContext(args) &&
            aioce_settings.settings.aioce_wc_checkout == "1")
        ) {
          let price =
            parseInt(args.cartItem.prices.sale_price) *
            aioce_settings.conversion_rate;
          price /= 100;

          return (
            "<price/> (" +
            getCurrencySymbol(aioce_settings.currency) +
            " " +
            price.toFixed(2) +
            ")"
          );
        }
      return defaultValue;
    };

    const modifyTotalsPrice = (defaultValue, extensions, args, validation) => {
      if (aioce_settings.conversion_rate != null)
        if (
          aioce_settings.settings.aioce_wc_cart == "1" ||
          aioce_settings.settings.aioce_wc_checkout == "1"
        ) {
          let price =
            parseInt(args.cart.cartTotals.total_price) *
            aioce_settings.conversion_rate;
          price /= 100;

          return (
            "<price/> (" +
            getCurrencySymbol(aioce_settings.currency) +
            " " +
            price.toFixed(2) +
            ")"
          );
        }
      return defaultValue;
    };

    registerCheckoutFilters("aioce", {
      cartItemPrice: modifyCartItemPrice,
      subtotalPriceFormat: modifySubtotalPriceFormat,
      totalValue: modifyTotalsPrice,
    });

    // Clear the interval once the function has been successfully initialized
    clearInterval(checkInterval);
  }
};

// Check periodically if window.wc.blocksCheckout is defined
const checkInterval = setInterval(() => {
  if (window.wc && window.wc.blocksCheckout) {
    initializeCheckout();
  }
}, 1000);

// Also ensure the script runs after DOM is fully loaded
document.addEventListener("DOMContentLoaded", () => {
  if (window.wc && window.wc.blocksCheckout) {
    initializeCheckout();
  } else {
    checkInterval;
  }
});
