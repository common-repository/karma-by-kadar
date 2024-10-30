// karma_by_kadar__widgets__functions__calls.js
// by Kadar Claudiu
// https://karma.kadarclaudiu.ro/
// 1.0.0

// This file will be included in WordPress customizer or widgets page calls.

jQuery(document).ready(function() {

	karma_music_player__upload_function();

	jQuery(document).on('widget-added', function(event, widget){

	    karma_music_player__upload_function();

	});

});