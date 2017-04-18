/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

jQuery(document).ready(function ($) {
    $('.checkcheck').submit(function () {
        var b = $(this).serialize() + '&action=' + $(this).attr( 'action' );
        $.post(ajaxurl, b).error(
                function () {
                    alert('error');
                }).success(function (response) {
            $('.push-notification').html(response).css('display','block');
            setTimeout(function(){ 
                $('.push-notification').css('display','none');
            }, 3000);
        });
        return false;
    });
});
//save_main_options_ajax();
//
//jQuery(document).ready(function($) {
//
//		var data = {
//			'action': 'my_action',
//			'whatever': 1234
//		};
//
//		// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
//		jQuery.post(ajaxurl, data, function(response) {
//			alert('Got this from the server: ' + response);
//		});
//	});

jQuery(document).ready(function ($) {
    var mediaUploader;
    $('#upload-button').on('click', function (e) {
        e.preventDefault();
        if (mediaUploader) {
            mediaUploader.open();
            return;
        }
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose a Picture for Logo',
            button: {
                text: 'Choose Picture'
            },
            multiple: false
        });
        mediaUploader.on('select', function () {
            attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#logo-picture').val(attachment.url);
            $('#logo-picture-preview').css('background-image', 'url(' + attachment.url + ')');
        });
    });
});
