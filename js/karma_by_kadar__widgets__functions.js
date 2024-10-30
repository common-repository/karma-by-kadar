// karma_by_kadar__widgets__functions.js
// by Kadar Claudiu
// https://karma.kadarclaudiu.ro/
// 1.0.0

// This file will be included in WordPress customizer or widgets page to handle the widget functionalities like file upload.

function karma_music_player__upload_function() {
	jQuery('#widgets-right .karma-by-kadar__upload-song.no-js').each(function(){
		var $this = jQuery(this),
			file_frame,
			wp_media_post_id = wp.media.model.settings.post.id,
			set_to_post_id = $this.val(),
			get_hidden_id = $this.closest('.widget-content').find('.karma-by-kadar__hidden-upload-song').attr('id');
		// Remove "no-js" class to know that we have already run this script for this element.
		$this.removeClass('no-js');
		// Initiate the click function for the uplod button.
		$this.on('click', function( event ){
			event.preventDefault();
			// If the media frame already exists, reopen it.
			if ( file_frame ) {
				// Set the post ID to what we want
				file_frame.uploader.uploader.param( 'post_id', set_to_post_id );
				// Open frame
				file_frame.open();
				return;
			} else {
				// Set the wp.media post id so the uploader grabs the ID we want when initialised
				wp.media.model.settings.post.id = set_to_post_id;
			}
			// Create the media frame.
			file_frame = wp.media.frames.file_frame = wp.media({
				title: 'Select a song to upload',
				button: {
					text: 'Use this song',
				},
				library: {
					type: [ 'audio' ]
				},
				multiple: false	// Set to true to allow multiple files to be selected
			});
			// When an song is selected, run a callback.
			file_frame.on( 'select', function() {
				// We set multiple to false so only get one song from the uploader
				attachment = file_frame.state().get('selection').first().toJSON();
				// Do something with attachment.id and/or attachment.url here
				$this.parent().find( '#' + get_hidden_id ).val( attachment.id ).trigger('change');
				$this.closest('.widget-content').find('.karma-by-kadar__song-preview').css('display', 'block');
				$this.closest('.widget-content').find('.karma-by-kadar__song-preview img').attr('src',attachment.icon);
				$this.closest('.widget-content').find('.karma-by-kadar__song-preview span').text(attachment.title);
				// Restore the main post ID
				wp.media.model.settings.post.id = wp_media_post_id;
			});
			// Finally, open the modal
			file_frame.open();
		});
		// Restore the main ID when the add media button is pressed
		jQuery( 'a.add_media' ).on( 'click', function() {
			wp.media.model.settings.post.id = wp_media_post_id;
		});
	});
}