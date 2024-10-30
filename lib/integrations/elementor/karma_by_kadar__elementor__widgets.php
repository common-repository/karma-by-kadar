<?php
namespace karma_by_kadar__elementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Karma by Kadar Simple Player
 *
 * Elementor widget for Karma by Kadar Simple Player.
 *
 * @since 1.0.0
 */
class karma_by_kadar__elementor__simple_player extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'karma-by-kadar__simple-player';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Karma', 'karma-by-kadar' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-play-o';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'karma-by-kadar' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Settings', 'karma-by-kadar' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label' 	=> esc_html__( 'Title:', 'karma-by-kadar' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> esc_html__( 'Louis Armstrong - Hello Dolly' , 'karma-by-kadar' ),
			]
		);

		$this->add_control(
			'src',
			[
				'label' 		=> esc_html__( 'Select Song:', 'karma-by-kadar' ),
				'type' 			=> Controls_Manager::TEXT,
				'placeholder' 	=> esc_html__( 'Song URL...', 'karma-by-kadar' ),
			]
		);

		$this->add_control(
			'elementor_volume',
			[
				'label' 	=> esc_html__( 'Volume:', 'karma-by-kadar' ),
				'type' 		=> Controls_Manager::TEXT,
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '7',
				'options' 	=> [
					'0' 	=> esc_html__( '0' , 'karma-by-kadar' ),
					'1' 	=> esc_html__( '0,1' , 'karma-by-kadar' ),
					'2'		=> esc_html__( '0,2' , 'karma-by-kadar' ),
					'3'		=> esc_html__( '0,3' , 'karma-by-kadar' ),
					'4'		=> esc_html__( '0,4' , 'karma-by-kadar' ),
					'5'		=> esc_html__( '0,5' , 'karma-by-kadar' ),
					'6'		=> esc_html__( '0,6' , 'karma-by-kadar' ),
					'7'		=> esc_html__( '0,7' , 'karma-by-kadar' ),
					'8'		=> esc_html__( '0,8' , 'karma-by-kadar' ),
					'9'		=> esc_html__( '0,9' , 'karma-by-kadar' ),
					'10'	=> esc_html__( '1' , 'karma-by-kadar' ),
				],
			]
		);

		$this->add_control(
			'color',
			[
				'label' 	=> esc_html__( 'Player Color:', 'karma-by-kadar' ),
				'type' 		=> Controls_Manager::TEXT,
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '0',
				'options' 	=> [
					'0' 	=> esc_html__( 'Orange' , 'karma-by-kadar' ),
					'1' 	=> esc_html__( 'Blue' , 'karma-by-kadar' ),
					'2' 	=> esc_html__( 'Red' , 'karma-by-kadar' ),
					'3' 	=> esc_html__( 'Pink' , 'karma-by-kadar' ),
					'4' 	=> esc_html__( 'Green' , 'karma-by-kadar' ),
					'5' 	=> esc_html__( 'Yellow' , 'karma-by-kadar' ),
					'6' 	=> esc_html__( 'Gray' , 'karma-by-kadar' ),
					'7' 	=> esc_html__( 'Black' , 'karma-by-kadar' ),
					'8' 	=> esc_html__( 'Cyan' , 'karma-by-kadar' ),
					'9' 	=> esc_html__( 'Teal' , 'karma-by-kadar' ),
					'10' 	=> esc_html__( 'White' , 'karma-by-kadar' ),
				],
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label' 		=> esc_html__( 'Autoplay:', 'karma-by-kadar' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> esc_html__( 'On', 'karma-by-kadar' ),
				'label_off' 	=> esc_html__( 'Off', 'karma-by-kadar' ),
				'return_value' 	=> 'true',
				'default' 		=> 'false',
			]
		);

		$this->add_control(
			'loop',
			[
				'label' 		=> esc_html__( 'Loop:', 'karma-by-kadar' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> esc_html__( 'On', 'karma-by-kadar' ),
				'label_off' 	=> esc_html__( 'Off', 'karma-by-kadar' ),
				'return_value' 	=> 'true',
				'default' 		=> 'false',
			]
		);

		$this->add_control(
			'downloadable',
			[
				'label' 		=> esc_html__( 'Downloadable:', 'karma-by-kadar' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> esc_html__( 'On', 'karma-by-kadar' ),
				'label_off' 	=> esc_html__( 'Off', 'karma-by-kadar' ),
				'return_value' 	=> 'true',
				'default' 		=> 'false',
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings();

		echo do_shortcode('[karma_by_kadar__simple_player src="' . esc_url( $settings['src'] ) . '" title="' . esc_html( $settings['title'] ) . '" volume="' . esc_html( $settings['elementor_volume'] ) . '" loop="' . esc_html( $settings['loop'] ) . '" autoplay="' . esc_html( $settings['autoplay'] ) . '" color="' . esc_html( $settings['color'] ) . '" downloadable="' . esc_html( $settings['downloadable'] ) . '"]');

	}
}
