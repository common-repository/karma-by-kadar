<?php
/*
Version: 1.0.1
Author: Kadar Claudiu
*/

class Karma_by_kadar__simple_player__widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'karma_by_kadar__simple_player__widget',
			esc_html__('Karma', 'karma-by-kadar'),
			array( 'description' => esc_html__( 'Add the Karma Player in the sidebar too.', 'karma-by-kadar' ), )
		);
	}

	public function widget( $args, $instance ) {
		$title = isset( $instance['title'] ) ? $instance['title'] : esc_html__( 'Louis Armstrong - Hello Dolly' , 'karma-by-kadar' );
		$song = isset( $instance['karma_by_kadar__song_id'] ) ? $instance['karma_by_kadar__song_id'] : '';
		$volume = isset( $instance['karma_by_kadar__song_volume'] ) ? $instance['karma_by_kadar__song_volume'] : '';
		$color = isset( $instance[ 'karma_by_kadar__color' ] ) ? $instance[ 'karma_by_kadar__color' ] : '';
		$autoplay = isset( $instance[ 'karma_by_kadar__song_autoplay' ] ) ? $instance[ 'karma_by_kadar__song_autoplay' ] : '';
		$loop = isset( $instance[ 'karma_by_kadar__song_loop' ] ) ? $instance[ 'karma_by_kadar__song_loop' ] : '';
		$downloadable = isset( $instance[ 'karma_by_kadar__song_downloadable' ] ) ? $instance[ 'karma_by_kadar__song_downloadable' ] : '';

		if ( $autoplay != '' ) {
			$autoplay = true;
		} else {
			$autoplay = false;
		}
		if ( $loop != '' ) {
			$loop = true;
		} else {
			$loop = false;
		}
		if ( $downloadable != '' ) {
			$downloadable = true;
		} else {
			$downloadable = false;
		}

		echo $args['before_widget'];

		$song_data = wp_get_attachment_metadata($song);

		echo do_shortcode('[karma_by_kadar__simple_player src="' . wp_get_attachment_url( $song ) . '" title="' . esc_html( $title ) . '" volume="' . esc_html( $volume ) . '" loop="' . esc_html( $loop ) . '" autoplay="' . esc_html( $autoplay ) . '" color="' . esc_html( $color ) . '" downloadable="' . esc_html( $downloadable ) . '"]');

		echo $args['after_widget'];
	}

	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = esc_html__( 'Louis Armstrong - Hello Dolly' , 'karma-by-kadar' );
		}
		if ( isset( $instance[ 'karma_by_kadar__song_id' ] ) ) {
			$song = $instance[ 'karma_by_kadar__song_id' ];
		} else {
			$song = '';
		}
		if ( isset( $instance[ 'karma_by_kadar__song_volume' ] ) ) {
			$karma_by_kadar__song_volume = $instance[ 'karma_by_kadar__song_volume' ];
		} else {
			$karma_by_kadar__song_volume = 0.7;
		}
		if ( isset( $instance[ 'karma_by_kadar__color' ] ) ) {
			$karma_by_kadar__color = $instance['karma_by_kadar__color'];
		} else {
			$karma_by_kadar__color = false;
		}
		if ( isset( $instance[ 'karma_by_kadar__song_autoplay' ] ) ) {
			$karma_by_kadar__song_autoplay = true;
		} else {
			$karma_by_kadar__song_autoplay = false;
		}
		if ( isset( $instance[ 'karma_by_kadar__song_loop' ] ) ) {
			$karma_by_kadar__song_loop = true;
		} else {
			$karma_by_kadar__song_loop = false;
		}
		if ( isset( $instance[ 'karma_by_kadar__song_downloadable' ] ) ) {
			$karma_by_kadar__song_downloadable = true;
		} else {
			$karma_by_kadar__song_downloadable = false;
		}

		if ( $song != '' ) {
			$song_data = wp_get_attachment_metadata($song);
		} ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:' , 'karma-by-kadar' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'karma_by_kadar__song_id' ); ?>"><?php esc_html_e( 'Select Song:' , 'karma-by-kadar' ); ?></label>
			<?php
				if ( isset( $_POST['submit_image_selector'] ) && isset( $_POST['karma_by_kadar__song_id'] ) ) :
					update_option( 'karma_by_kadar__song_id', absint( $_POST['karma_by_kadar__song_id'] ) );
				endif;
				wp_enqueue_media();
			?>
			<?php if ( $song != '' ): ?>
			<span class="karma-by-kadar__song-preview" style="display: block; margin-bottom: 5px; width: 100%;">
			<?php else: ?>
			<span class="karma-by-kadar__song-preview" style="display: none; margin-bottom: 5px; width: 100%;">
			<?php endif; ?>
				<?php if ( $song != '' ): ?>
					<img src="<?php echo includes_url(); ?>images/media/audio.png" style="height: 16px; position: relative; top: 3px; margin-left: 4px;">
					<span>
						<?php if ( isset( $song_data['title'] ) ): ?>
							<?php echo esc_html( $song_data['title'] ); ?>
						<?php else: ?>
							<strong>
								<?php esc_html_e( 'You have to set a title for this song.' , 'karma-by-kadar' ); ?>
							</strong>
						<?php endif; ?>
					</span>
				<?php else: ?>
					<img src="" style="height: 16px; position: relative; top: 3px; margin-left: 4px;">
					<span></span>
				<?php endif; ?>
			</span>
			<input class="karma-by-kadar__upload-song no-js button" type="button" value="<?php esc_html_e( 'Upload song' , 'karma-by-kadar' ); ?>" />
			<input type='hidden' name="<?php echo $this->get_field_name( 'karma_by_kadar__song_id' ); ?>" id='<?php echo $this->get_field_id( 'karma_by_kadar__song_id' ); ?>' value='<?php echo esc_attr( $song ); ?>' class="karma-by-kadar__hidden-upload-song">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'karma_by_kadar__song_volume' ); ?>"><?php esc_html_e( 'Song\'s volume:' , 'karma-by-kadar' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'karma_by_kadar__song_volume' ); ?>" name="<?php echo $this->get_field_name( 'karma_by_kadar__song_volume' ); ?>" type="number" min="0" max="1" step="0.1" value="<?php echo esc_attr( $karma_by_kadar__song_volume ); ?>">
			<span>
				<?php esc_html_e( 'From 0 to 1.' , 'karma-by-kadar' ); ?>
			</span>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'karma_by_kadar__color' ); ?>"><?php esc_html_e( 'Color:' , 'karma-by-kadar' ); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'karma_by_kadar__color' ); ?>" name="<?php echo $this->get_field_name( 'karma_by_kadar__color' ); ?>" type="text">
				<option value='0' <?php echo ( $karma_by_kadar__color == '0' ) ? 'selected' : '' ; ?>>
					<?php esc_html_e( 'Orange' ); ?>
				</option>
				<option value='1' <?php echo ( $karma_by_kadar__color == '1' ) ? 'selected' : '' ; ?>>
					<?php esc_html_e( 'Blue' ); ?>
				</option>
				<option value='2' <?php echo ( $karma_by_kadar__color == '2' ) ? 'selected' : '' ; ?>>
					<?php esc_html_e( 'Red' ); ?>
				</option>
				<option value='3' <?php echo ( $karma_by_kadar__color == '3' ) ? 'selected' : '' ; ?>>
					<?php esc_html_e( 'Pink' ); ?>
				</option>
				<option value='4' <?php echo ( $karma_by_kadar__color == '4' ) ? 'selected' : '' ; ?>>
					<?php esc_html_e( 'Green' ); ?>
				</option>
				<option value='5' <?php echo ( $karma_by_kadar__color == '5' ) ? 'selected' : '' ; ?>>
					<?php esc_html_e( 'Yellow' ); ?>
				</option>
				<option value='6' <?php echo ( $karma_by_kadar__color == '6' ) ? 'selected' : '' ; ?>>
					<?php esc_html_e( 'Gray' ); ?>
				</option>
				<option value='7' <?php echo ( $karma_by_kadar__color == '7' ) ? 'selected' : '' ; ?>>
					<?php esc_html_e( 'Black' ); ?>
				</option>
				<option value='8' <?php echo ( $karma_by_kadar__color == '8' ) ? 'selected' : '' ; ?>>
					<?php esc_html_e( 'Cyan' ); ?>
				</option>
				<option value='9' <?php echo ( $karma_by_kadar__color == '9' ) ? 'selected' : '' ; ?>>
					<?php esc_html_e( 'Teal' ); ?>
				</option>
				<option value='10' <?php echo ( $karma_by_kadar__color == '10' ) ? 'selected' : '' ; ?>>
					<?php esc_html_e( 'White' ); ?>
				</option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'karma_by_kadar__song_autoplay' ); ?>"><?php esc_html_e( 'Autoplay:' , 'karma-by-kadar' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'karma_by_kadar__song_autoplay' ); ?>" name="<?php echo $this->get_field_name( 'karma_by_kadar__song_autoplay' ); ?>" type="checkbox" <?php if ( isset( $instance[ 'karma_by_kadar__song_autoplay' ] ) ) checked( $instance[ 'karma_by_kadar__song_autoplay' ], 'on' ); ?>>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'karma_by_kadar__song_loop' ); ?>"><?php esc_html_e( 'Loop:' , 'karma-by-kadar' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'karma_by_kadar__song_loop' ); ?>" name="<?php echo $this->get_field_name( 'karma_by_kadar__song_loop' ); ?>" type="checkbox" <?php if ( isset( $instance[ 'karma_by_kadar__song_loop' ] ) ) checked( $instance[ 'karma_by_kadar__song_loop' ], 'on' ); ?>>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'karma_by_kadar__song_downloadable' ); ?>"><?php esc_html_e( 'Downloadable:' , 'karma-by-kadar' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'karma_by_kadar__song_downloadable' ); ?>" name="<?php echo $this->get_field_name( 'karma_by_kadar__song_downloadable' ); ?>" type="checkbox" <?php if ( isset( $instance[ 'karma_by_kadar__song_downloadable' ] ) ) checked( $instance[ 'karma_by_kadar__song_downloadable' ], 'on' ); ?>>
		</p>
		<script>
			if (typeof karma_music_player__upload_function !== 'undefined' && $.isFunction(karma_music_player__upload_function)) {
				karma_music_player__upload_function();
			}
		</script><?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['karma_by_kadar__song_id'] = $new_instance['karma_by_kadar__song_id'];
		$instance['karma_by_kadar__song_volume'] = ( ! empty( $new_instance['karma_by_kadar__song_volume'] ) ) ? strip_tags( $new_instance['karma_by_kadar__song_volume'] ) : '';
		$instance['karma_by_kadar__color'] = ( ! empty( $new_instance['karma_by_kadar__color'] ) ) ? strip_tags( $new_instance['karma_by_kadar__color'] ) : '';
		$instance['karma_by_kadar__song_autoplay'] = ( ! empty( $new_instance['karma_by_kadar__song_autoplay'] ) ) ? strip_tags( $new_instance['karma_by_kadar__song_autoplay'] ) : '';
		$instance['karma_by_kadar__song_loop'] = ( ! empty( $new_instance['karma_by_kadar__song_loop'] ) ) ? strip_tags( $new_instance['karma_by_kadar__song_loop'] ) : '';
		$instance['karma_by_kadar__song_downloadable'] = ( ! empty( $new_instance['karma_by_kadar__song_downloadable'] ) ) ? strip_tags( $new_instance['karma_by_kadar__song_downloadable'] ) : '';

		return $instance;
	}

}

add_action( 'widgets_init', function(){
	register_widget( 'Karma_by_kadar__simple_player__widget' );
});

function karma_by_kadar__elementor_remove_widgets(){
    echo '<style>
            .karma_by_kadar__hidde_elementor_widget {
                display: none !important
            }
	    </style>
	    <script>
            setInterval(function(){
                jQuery(".elementor-element-wrapper").each(function(){
                    var $this = jQuery(this),
                        theTitleText = $this.find(".title").text(),
                        theIconClass = $this.find(".icon i").attr("class");
                    if ( theTitleText === "Karma" && theIconClass === "eicon-wordpress" ) {
                        jQuery(this).closest(".elementor-element-wrapper").addClass("karma_by_kadar__hidde_elementor_widget");
                    }
                });
            },50);
		  </script>';
}
add_action( 'admin_print_footer_scripts', 'karma_by_kadar__elementor_remove_widgets' );