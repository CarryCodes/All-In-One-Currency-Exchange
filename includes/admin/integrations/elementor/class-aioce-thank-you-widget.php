<?php

/**
 * Setup Thank you elementor widget
 *
 * @since     1.0.0
 */

defined('ABSPATH') || exit;

class AIOCE_THANKYOU_WIDGET extends \Elementor\Widget_Base
{
	/**
	 * get name of the element
	 *
	 * @since 1.0.0
	 */
	public function get_name()
	{
		return 'aioce_thank_you_order_info';
	}
	/**
	 * get title of the element
	 *
	 * @since 1.0.0
	 */
	public function get_title()
	{
		return __('AIOCE Thank You Page', 'all-in-one-currency-exchange');
	}
	/**
	 * get icon of the element
	 *
	 * @since 1.0.0
	 */
	public function get_icon()
	{
		return 'eicon-code';
	}
	/**
	 * get categories of the element
	 *
	 * @since 1.0.0
	 */
	public function get_categories()
	{
		return ['woocommerce'];
	}
	/**
	 * register controls of the element
	 *
	 * @since 1.0.0
	 */
	protected function _register_controls()
	{
		$this->start_controls_section(
			'content_section',
			[
				'label' => __('Content', 'all-in-one-currency-exchange'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Header Settings
		$this->add_control(
			'header_label',
			[
				'label' => __('Header Label', 'all-in-one-currency-exchange'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Additional Order Information',
			]
		);
		$this->add_control(
			'header_alignment',
			[
				'label' => __('Header Alignment', 'all-in-one-currency-exchange'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __('Left', 'all-in-one-currency-exchange'),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __('Center', 'all-in-one-currency-exchange'),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __('Right', 'all-in-one-currency-exchange'),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
			]
		);



		// Table Settings
		$this->add_control(
			'table_columns',
			[
				'label' => __('Table Columns', 'all-in-one-currency-exchange'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'1' => __('One Column', 'all-in-one-currency-exchange'),
					'2' => __('Two Columns', 'all-in-one-currency-exchange'),
				],
				'default' => '2',
			]
		);



		$this->add_control(
			'th_label_subtotal',
			[
				'label' => __('Subtotal Label', 'all-in-one-currency-exchange'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Subtotal',
			]
		);

		$this->add_control(
			'th_label_total',
			[
				'label' => __('Total Label', 'all-in-one-currency-exchange'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Total',
			]
		);



		$this->end_controls_section();
		$this->start_controls_section(
			'style_section',
			[
				'label' => __('Style', 'all-in-one-currency-exchange'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);



		$this->add_control(
			'header_color',
			[
				'label' => __('Header Color', 'all-in-one-currency-exchange'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#000000',
			]
		);

		$this->add_control(
			'header_font_size',
			[
				'label' => __('Header Font Size', 'all-in-one-currency-exchange'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '24px',
			]
		);

		$this->add_control(
			'header_font_family',
			[
				'label' => __('Header Font Family', 'all-in-one-currency-exchange'),
				'type' => \Elementor\Controls_Manager::FONT,
				'default' => 'Arial',
			]
		);

		// Table Style Settings
		$this->add_control(
			'table_padding',
			[
				'label' => __('Table Padding', 'all-in-one-currency-exchange'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '15px',
			]
		);

		$this->add_control(
			'table_border',
			[
				'label' => __('Table Border', 'all-in-one-currency-exchange'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '1px',
			]
		);

		$this->add_control(
			'table_border_color',
			[
				'label' => __('Table Border Color', 'all-in-one-currency-exchange'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ddd',
			]
		);

		$this->add_control(
			'table_background_color',
			[
				'label' => __('Table Background Color', 'all-in-one-currency-exchange'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#f4f4f4',
			]
		);

		$this->add_control(
			'table_width',
			[
				'label' => __('Table Width', 'all-in-one-currency-exchange'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '100%',
			]
		);
		$this->add_control(
			'th_label_color',
			[
				'label' => __('Label Color', 'all-in-one-currency-exchange'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#000000',
			]
		);

		$this->add_control(
			'th_label_font_size',
			[
				'label' => __('Label Font Size', 'all-in-one-currency-exchange'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '16px',
			]
		);

		$this->add_control(
			'th_label_font_family',
			[
				'label' => __('Label Font Family', 'all-in-one-currency-exchange'),
				'type' => \Elementor\Controls_Manager::FONT,
				'default' => 'Arial',
			]
		);
		$this->end_controls_section();
	}
	/**
	 * render of the element
	 *
	 * @since 1.0.0
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();

		if (!is_wc_endpoint_url('order-received')) {
			return;
		}

		global $wp;
		$order_id = wc_get_order_id_by_order_key($wp->query_vars['key']);
		if (!$order_id) {
			return;
		}

		$order = wc_get_order($order_id);
		if (!$order) {
			return;
		}

		$order_total = $order->get_total();
		$order_subtotal = $order->get_subtotal();
		$wc_func = AIOCE_WCFunc::get_instance();
		$total_formated = $wc_func->preparePrice($order_total);

		if ($total_formated != null) {
			$order_total = $total_formated;
		} else {
			$order_total = wc_price($order_total);
		}
		$subtotal_formated = $wc_func->preparePrice($order_subtotal);
		if ($subtotal_formated != null) {
			$order_subtotal = $subtotal_formated;
		} else {
			$order_subtotal = wc_price($order_subtotal);
		}
		// Apply settings
		$header_label = $settings['header_label'];
		$header_alignment = $settings['header_alignment'];
		$header_color = $settings['header_color'];
		$header_font_size = $settings['header_font_size'];
		$header_font_family = $settings['header_font_family'];
		$table_columns = $settings['table_columns'];
		$th_label_color = $settings['th_label_color'];
		$th_label_font_size = $settings['th_label_font_size'];
		$th_label_font_family = $settings['th_label_font_family'];
		$th_label_subtotal = $settings['th_label_subtotal'];
		$th_label_total = $settings['th_label_total'];

		// Table Style Settings
		$table_padding = $settings['table_padding'];
		$table_border = $settings['table_border'];
		$table_border_color = $settings['table_border_color'];
		$table_background_color = $settings['table_background_color'];
		$table_width = $settings['table_width'];

?>
		<div class="custom-order-info-widget">
			<div class="widget-header" style="text-align: <?php echo esc_attr($header_alignment); ?>;">
				<h2 style="color: <?php echo esc_attr($header_color); ?>; font-size: <?php echo esc_attr($header_font_size); ?>; font-family: <?php echo esc_attr($header_font_family); ?>;">
					<?php echo esc_html($header_label); ?>

				</h2>
			</div>
			<table class="order-details-table" style="width: <?php echo esc_attr($table_width); ?>; border-collapse: collapse; margin-top: 20px;">
				<tbody>
					<?php if ($table_columns === '2') : ?>
						<tr>
							<th style="padding: <?php echo esc_attr($table_padding); ?>; border: <?php echo esc_attr($table_border); ?> solid <?php echo esc_attr($table_border_color); ?>; background-color: <?php echo esc_attr($table_background_color); ?>; color: <?php echo esc_attr($th_label_color); ?>; font-size: <?php echo esc_attr($th_label_font_size); ?>; font-family: <?php echo esc_attr($th_label_font_family); ?>;"><?php echo esc_html($th_label_subtotal); ?>:</th>
							<td style="padding: <?php echo esc_attr($table_padding); ?>; border: <?php echo esc_attr($table_border); ?> solid <?php echo esc_attr($table_border_color); ?>;"><?php echo esc_html($order_subtotal); ?></td>
						</tr>
						<tr>
							<th style="padding: <?php echo esc_attr($table_padding); ?>; border: <?php echo esc_attr($table_border); ?> solid <?php echo esc_attr($table_border_color); ?>; background-color: <?php echo esc_attr($table_background_color); ?>; color: <?php echo esc_attr($th_label_color); ?>; font-size: <?php echo esc_attr($th_label_font_size); ?>; font-family: <?php echo esc_attr($th_label_font_family); ?>;"><?php echo esc_html($th_label_total); ?>:</th>
							<td style="padding: <?php echo esc_attr($table_padding); ?>; border: <?php echo esc_attr($table_border); ?> solid <?php echo esc_attr($table_border_color); ?>;"><?php echo esc_html($order_total); ?></td>
						</tr>
					<?php else : ?>
						<tr>
							<td style="padding: <?php echo esc_attr($table_padding); ?>; border: <?php echo esc_attr($table_border); ?> solid <?php echo esc_attr($table_border_color); ?>;"><?php echo esc_html($th_label_subtotal); ?>: <?php echo esc_html($order_subtotal); ?></td>
						</tr>
						<tr>
							<td style="padding: <?php echo esc_attr($table_padding); ?>; border: <?php echo esc_attr($table_border); ?> solid <?php echo esc_attr($table_border_color); ?>;"><?php echo esc_html($th_label_total); ?>: <?php echo esc_html($order_total); ?></td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
		<style type="text/css">
			.custom-order-info-widget {
				margin: 20px 0;
			}

			.custom-order-info-widget .widget-header {
				margin-bottom: 20px;
			}

			.custom-order-info-widget .widget-header h2 {
				margin: 0;
				font-weight: bold;
			}

			.custom-order-info-widget .order-details-table {
				width: 100%;
				border-collapse: collapse;
			}

			.custom-order-info-widget .order-details-table th,
			.custom-order-info-widget .order-details-table td {
				padding: 15px;
				border: 1px solid #ddd;
				text-align: left;
			}

			.custom-order-info-widget .order-details-table th {
				background-color: #f4f4f4;
				font-weight: bold;
			}

			.custom-order-info-widget .order-details-table tr:nth-child(even) td {
				background-color: #f9f9f9;
			}

			.custom-order-info-widget .order-details-table tr:hover td {
				background-color: #f1f1f1;
			}
		</style>
<?php
	}
}
new AIOCE_THANKYOU_WIDGET();
