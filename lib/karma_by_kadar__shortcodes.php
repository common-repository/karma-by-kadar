<?php
/*
Version: 1.0.3
Author: Kadar Claudiu
*/

if ( ! defined( 'ABSPATH' ) ) { exit; }

class karma_by_kadar__simple_player {

	protected static $instance = null;

	public static function get_instance() {

		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	private function __construct() {
		add_shortcode( 'karma_by_kadar__simple_player', array( &$this, 'shortcode' ) );
	}

	public function shortcode( $atts ) {
		$output = $vc_src = $src = $title = $volume = $loop = $autoplay = $color = $downloadable = '';

		extract( shortcode_atts( array(
			'title' 			=> esc_html__( 'Louis Armstrong - Hello Dolly' , 'karma-by-kadar' ),
			'src' 				=> '',
			'vc_src' 			=> '',
			'volume' 			=> '0.7',
			'elementor_volume' 	=> '',
			'autoplay' 			=> false,
			'loop' 				=> false,
			'color' 			=> '0',
			'downloadable' 		=> false,
		), $atts ) );

		$volume = str_replace( ',', '.', $volume);
		$the_src_final = '';

		if ( $elementor_volume != '' ) {
			$volume = $elementor_volume / 10;
		}

		if ( is_numeric( $vc_src ) ) {
			$vc_src = wp_get_attachment_url($vc_src);
		}

		if ( $src != '' || $vc_src != '' ) {
			if ( $vc_src != '' ) {
				$the_src_final = $vc_src;
			} else if ( $src != '' ) {
				$the_src_final = $src;
			}
		}
		
		if ( $autoplay == 'true' ) {
			$autoplay = true;
		} else if ( $autoplay == 'false' ) {
			$autoplay = false;
		}
		if ( $downloadable == 'true' ) {
			$downloadable = true;
		} else if ( $downloadable == 'false' ) {
			$downloadable = false;
		}
		if ( $loop == 'true' ) {
			$loop = true;
		} else if ( $loop == 'false' ) {
			$loop = false;
		}

		$output .= '<div class="karma-by-kadar__simple-player ';
			if ( ($color != '') & ($color != '0') ) {
				if ( $color == '1' ) {
					$output .= 'karma-by-kadar__simple-player--blue ';
				} else if ( $color == '2' ) {
					$output .= 'karma-by-kadar__simple-player--red ';
				} else if ( $color == '3' ) {
					$output .= 'karma-by-kadar__simple-player--pink ';
				} else if ( $color == '4' ) {
					$output .= 'karma-by-kadar__simple-player--green ';
				} else if ( $color == '5' ) {
					$output .= 'karma-by-kadar__simple-player--yellow ';
				} else if ( $color == '6' ) {
					$output .= 'karma-by-kadar__simple-player--gray ';
				} else if ( $color == '7' ) {
					$output .= 'karma-by-kadar__simple-player--black ';
				} else if ( $color == '8' ) {
					$output .= 'karma-by-kadar__simple-player--cyan ';
				} else if ( $color == '9' ) {
					$output .= 'karma-by-kadar__simple-player--teal ';
				} else if ( $color == '10' ) {
					$output .= 'karma-by-kadar__simple-player--white ';
				}
			}
			if ( is_rtl() ) {
			$output .= 'karma-by-kadar__simple-player--rtl" ';
			} else {
			$output .= '" ';
			}
			if ( $title != '' ) {
			$output .= 'data-title="' . esc_html($title) . '" ';
			}
			if ( $the_src_final != '' ) {
			$output .= 'data-src="' . esc_url($the_src_final) . '" ';
			}
			if ( $volume != '' ) {
			$output .= 'data-volume="' . esc_attr($volume) . '" ';
			}
			if ( $autoplay == true ) {
			$output .= 'data-autoplay="' . esc_attr('autoplay') . '" ';
			}
			if ( $loop == true ) {
			$output .= 'data-loop="' . esc_attr('loop') . '" ';
			}
			if ( is_rtl() ) {
			$output .= 'data-rtl="' . esc_attr('rtl') . '" ';
			}
			$output .= '>
			<div class="karma-by-kadar__simple-player__player"></div>
			<div class="karma-by-kadar__simple-player__play-pause">
				<div class="karma-by-kadar__simple-player__play">
					<i class="material-icons">play_circle_filled</i>
				</div>
				<div class="karma-by-kadar__simple-player__pause">
					<i class="material-icons">pause_circle_filled</i>
				</div>
			</div>';
			if ( $title != '' ) {
$output .= '<div class="karma-by-kadar__simple-player__title">
				<div class="karma-by-kadar__simple-player__title__the-title">' . esc_html($title) . '</div>';
				if ( $downloadable == true ) {
	$output .= '<a href="' . esc_html($the_src_final) . '" class="karma-by-kadar__simple-player__download" download>
					<i class="material-icons">save_alt</i>
				</a>';
				}
$output .= '</div>';
			}
$output .= '<div class="karma-by-kadar__simple-player__volume-handler-container">
				<div class="karma-by-kadar__simple-player__middle">
					<div class="karma-by-kadar__simple-player__seekbar">
						<div class="karma-by-kadar__simple-player__seekbar__bg"></div>
					</div>
					<div class="karma-by-kadar__simple-player__current-time"></div>
					<div class="karma-by-kadar__simple-player__duration"></div>
				</div>
				<div class="karma-by-kadar__simple-player__right">
					<div class="karma-by-kadar__simple-player__volume">
						<div class="karma-by-kadar__simple-player__volume__bar">
							<div class="karma-by-kadar__simple-player__volume__seekbar">
								<div class="karma-by-kadar__simple-player__volume__seekbar__bg"></div>
							</div>
							<i class="material-icons">volume_down</i>
						</div>
						<div class="karma-by-kadar__simple-player__mute">
							<i class="material-icons">volume_up</i>
						</div>
						<div class="karma-by-kadar__simple-player__unmute">
							<i class="material-icons">volume_off</i>
						</div>
					</div>
				</div>
			</div>
		</div>';

		return $output;
	}

}

karma_by_kadar__simple_player::get_instance();