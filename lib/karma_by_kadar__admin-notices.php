<?php
/*
Version: 1.0.0
Author: Kadar Claudiu
*/

if ( ! defined( 'ABSPATH' ) ) { exit; }

set_transient( 'karma_by_kadar__rating', 'alive', 3 );
add_user_meta( get_current_user_id(), 'karma_by_kadar__rating_dismissed', 'false', true );

function karma_by_kadar__rating_notice() {

	if ( (get_transient( 'karma_by_kadar__rating') == 'alive') ) {

		if ( get_user_meta(get_current_user_id(), 'karma_by_kadar__rating_dismissed', true) == 'false' ) {

			// CSS files.
			wp_enqueue_style( 'karma-by-kadar__notice-css', KARMA_BY_KADAR__PLUGIN_URL . 'css/karma_by_kadar__notice__css.css' );

			?>

			<div class="notice notice--karma notice-success is-dismissible">
				<p>
					<?php esc_html_e( 'Hi!', 'karma-by-kadar' ); ?>
				</p>
				<p>
					<?php esc_html_e( 'My name is Kadar Claudiu and I develop and mentain "Karma Music Player" plugin.', 'karma-by-kadar' ); ?>
					<br>
					<?php esc_html_e( 'I want to thank you for choosing my plugin and give to this plugin a chance!', 'karma-by-kadar' ); ?>
					<br>
					<?php esc_html_e( 'I hope it will be usefull for you.', 'karma-by-kadar' ); ?>
					<br>
					<?php esc_html_e( 'If you feel, you can give a 5 Stars rating on WordPress.org.', 'karma-by-kadar' ); ?>
					<br>
					<?php esc_html_e( 'It will be very helpful for the plugin and his future.', 'karma-by-kadar' ); ?>
					<br>
					<?php esc_html_e( 'Also you can translate the plugin into your language!', 'karma-by-kadar' ); ?>
				</p>
				<p>
					<?php esc_html_e( 'Thank you!', 'karma-by-kadar' ); ?>
				</p>
				<p>
					<a href="<?php echo esc_url( 'https://wordpress.org/support/plugin/karma-by-kadar/reviews/' ) ?>" class="button" target="_blank">
						<i class="dashicons dashicons-star-filled" style="text-decoration: none;"></i>
						<?php echo esc_html__( 'Give 5 Stars Rating' , 'karma-by-kadar' ); ?>
					</a>
					<a href="<?php echo esc_url( 'https://translate.wordpress.org/projects/wp-plugins/karma-by-kadar' ); ?>" class="button" target="_blank">
						<i class="dashicons dashicons-admin-site" style="text-decoration: none;"></i>
						<?php echo esc_html__( 'Translate Into Your Language' , 'karma-by-kadar' ); ?>
					</a>
					<a href="<?php echo esc_url( '?karma-by-kadar__rating-dismiss' ); ?>" class="button">
						<i class="dashicons dashicons-no-alt" style="text-decoration: none;"></i>
						<?php echo esc_html__( 'Dismiss' , 'karma-by-kadar' ); ?>
					</a>
				</p>
			</div>

			<?php delete_transient( 'karma_by_kadar__rating' );

		}
	}

}
add_action( 'admin_notices', 'karma_by_kadar__rating_notice' );

function karma_by_kadar__rating_dismissed() {

	if ( isset( $_GET['karma-by-kadar__rating-dismiss'] ) ) {

		update_user_meta( get_current_user_id(), 'karma_by_kadar__rating_dismissed', 'true', false );

	}

}
add_action( 'admin_init', 'karma_by_kadar__rating_dismissed' );