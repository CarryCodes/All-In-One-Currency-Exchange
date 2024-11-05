=== All In One Currency Exchange ===
Contributors: CarryCodes
Tags: woocommerce, ecommerce, currency, exchange, national currency
Requires at least: 5.3
Tested up to: 6.6
Requires PHP: 7.3
Stable tag: 1.0.0
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Now you can turn your site to calculate the price of everything in your woocommerce shop in many currencies to become an international shop.

== Description ==
Now you can show the products in your woocommerce shop in many currencies to become an international shop with up to update currencies data in our coulds.

This plugin has been build with react and tailwindcss and will be in our github repo if you want  to join us developing it.

== Frequently Asked Questions ==

= Where can I find the All In One Currency Exchange documentation and setup guide? =

For help setting up and configuring All In One Currency Exchange, please refer to the documentation. [Learn how to add All In One Currency Exchange to your website.](https://currencyexchangerate-api.com/blog/start-wp-plugin)

= Where can I get help for All In One Currency Exchange? =

For questions regarding the plugin setup, we recommend reviewing our [documentation](https://currencyexchangerate-api.com/blog/start-wp-plugin) and the [support email](mailto:support@currencyexchangerate-api.com) if you encounter any issues.
If the question or problem persists after reviewing the documentation, kindly create a send us on [support email](mailto:support@currencyexchangerate-api.com).

= All In One Currency Exchange suddenly no longer works – what do I do? =

If you notice an error or any other issue after updating a plugin or the theme, there could be a potential compatibility issue between it and All In One Currency Exchange.
In such cases, If you can't solve the problem yourself, don't worry! Please send us on [support email](mailto:support@currencyexchangerate-api.com).

= Where can I report bugs? =

Please report confirmed bugs on the [All In One Currency Exchange GitHub repository](https://github.com/CarryCodes/All-In-One-Currency-Exchange/issues). You can also notify us via our [support forum](https://wordpress.org/support/plugin/woocommerce-paypal-payments/) if you are not sure if the problem you encounter is the result of a bug in the plugin. When reporting a bug as a [GitHub issue](https://github.com/CarryCodes/All-In-One-Currency-Exchange/issues) directly, be sure to search the repository to confirm that the bug has not already been reported.

= Where can I request new features or compatibility with other extensions? =

Request new and vote on existing suggestions for features and extensions on our official [feature request board](mailto:features@currencyexchangerate-api.com). Our product teams regularly review requests and consider them valuable for product planning. Our support team is also always interested in learning about your ideas to improve the extension.

= Does All In One Currency Exchange support WooCommerce Blocks? =

Yes, All In One Currency Exchange offers experimental support for the new WooCommerce Cart & Checkout Blocks. The team continues to work on providing a seamless integration with the new WooCommerce Blocks.

= Are there any other new features in development? =

Yes, the All In One Currency Exchange development team is constantly expanding the functionality of the All In One Currency Exchange plugin with the latest features that CurrencyExchangeRateAPI offers.
View the [Testing features previews FAQ](https://github.com/CarryCodes/All-In-One-Currency-Exchange/wiki/Testing-features-previews) for more details.

= All In One Currency Exchange is awesome! Can I contribute? =

Yes, you can! Contributions are always appreciated. Join in on our [GitHub repository](https://github.com/CarryCodes/All-In-One-Currency-Exchange) to stay up-to-date with the latest developments.

== External Services ==

The **All In One Currency Exchange** plugin connects to the [CurrencyExchangeRateAPI](https://currencyexchangerate-api.com) to retrieve live currency exchange rates. This functionality is essential for displaying accurate currency conversions in your WooCommerce shop.

When the plugin is activated, it sends the admin’s selected currency preferences to the CurrencyExchangeRateAPI each time the relevant widget is loaded. The API request follows the schema:

```
https://api.currencyexchangerate-api.com/v1/YOUR-API-KEY/latest/USD
```

Here, `YOUR-API-KEY` should be replaced with your actual API key, and `USD` is the base currency for the exchange rates.

If the user's location or currency preference is not available, the plugin will display a configurable default currency.

This service is governed by [CurrencyExchangeRateAPI's Terms of Use](https://currencyexchangerate-api.com/terms) and [Privacy Policy](https://currencyexchangerate-api.com/privacy). Please ensure to review these documents for information on how your data is handled and your rights regarding personal information.

== Installation ==

= Requirements =

To install and configure All In One Currency Exchange, you will need:

* WordPress Version 5.3 or newer (installed)
* WooCommerce Version 3.9 or newer (installed and activated)
* PHP Version 7.2 or newer
* [CurrencyExchangeRateAPI Account](https://currencyexchangerate-api.com)

= Installation instructions =

1. Log in to WordPress admin.
2. Go to **Plugins > Add New**.
3. Search for the **All In One Currency Exchange** plugin.
4. Click on **Install Now** and wait until the plugin is installed successfully.
5. You can activate the plugin immediately by clicking on **Activate** now on the success page. If you want to activate it later, you can do so via **Plugins > Installed Plugins**.

= Setup and Configuration =

Follow the steps below to connect the plugin to your [CurrencyExchangeRateAPI Account](https://currencyexchangerate-api.com):

1. After you have activated the All In One Currency Exchange plugin, go to **AIOCE > Settings**.
2. Click the **Dashboard** tab.
3. Click on the **Connect Now** button.
5. Sign in to your CurrencyExchangeRateAPI account. If you do not have a CurrencyExchangeRateAPI account yet, sign up for a new CurrencyExchangeRateAPI account.
6. After you have successfully connected your CurrencyExchangeRateAPI account, click on the **Settings** tab and check what feature you want.
7. **Automatic changes**.

Complete onboarding instructions can be found in the [documentation here](https://currencyexchangerate-api.com/blog/start-wp-plugin).

== Screenshots ==

1. Shop Page.
2. Single Product Page
3. Cart page.
4. Mini-Cart
5. Checkout page.
6. Thank You Page
7. Click "Connect Now" to link your site to your CurrencyExchangeRateAPI account.
8. Main settings screen.

== Changelog ==

= 1.0.0 - 2024-10-20 =
* Initial release.
