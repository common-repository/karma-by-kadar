<?php
namespace karma_by_kadar__elementor;

use karma_by_kadar__elementor\Widgets\karma_by_kadar__elementor__simple_player;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Main karma_by_kadar__elementor Class
 *
 * Register new elementor widget.
 *
 * @since 1.0.0
 */
class karma_by_kadar__elementor {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
		$this->add_actions();
	}

	/**
	 * Add Actions
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function add_actions() {
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'on_widgets_registered' ] );
	}

	/**
	 * On Widgets Registered
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function on_widgets_registered() {
		$this->includes();
		$this->register_widget();
		$this->remove_wp_widgets();
	}

	/**
	 * Includes
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function includes() {
		require KARMA_BY_KADAR__PLUGIN_DIR . 'lib/integrations/elementor/karma_by_kadar__elementor__widgets.php';
	}

	/**
	 * Register Widget
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function register_widget() {
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new karma_by_kadar__elementor__simple_player() );
	}

	/**
	 * Remove WordPress Widgets
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function remove_wp_widgets() {
		function remove_registred_wp_widgets( ){

			$black_list = [
				'Karma_by_kadar__simple_player__widget'
			];

			return $black_list;

		}
		add_filter( 'elementor/widgets/black_list' , 'remove_registred_wp_widgets' );
	}
}

new karma_by_kadar__elementor();
