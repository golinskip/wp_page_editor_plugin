String.prototype.replaceAll = function(search, replacement) {
    var target = this;
    return target.replace(new RegExp(search, 'g'), replacement);
};

//(function( jQuery ) {
    var pbet = {
        load_media: function(customid, noImageSrc) {
            // Uploading files
			var file_frame;
			var wp_media_post_id = wp.media.model.settings.post.id; // Store the old id
                        var set_to_post_id = 1;
                        jQuery('#' + customid + '_image_reset_button').click(function(){
                            jQuery('#' + customid + '_image_preview').attr('src', noImageSrc);
                            jQuery('#' + customid + '_image_att_id').val('');
                        });
			jQuery('#' + customid + '_image_upload_button').on('click', function( event ){
				event.preventDefault();
				// If the media frame already exists, reopen it.
				if ( file_frame ) {
					file_frame.open();
					return;
				} else {
					// Set the wp.media post id so the uploader grabs the ID we want when initialised
					wp.media.model.settings.post.id = set_to_post_id;
				}
				// Create the media frame.
				file_frame = wp.media.frames.file_frame = wp.media({
					title: 'Select a image to upload',
					button: {
						text: 'Use this image',
					},
					multiple: false	// Set to true to allow multiple files to be selected
				});
				// When an image is selected, run a callback.
				file_frame.on( 'select', function() {
					// We set multiple to false so only get one image from the uploader
					attachment = file_frame.state().get('selection').first().toJSON();
					// Do something with attachment.id and/or attachment.url here
					jQuery( '#' + customid + '_image_preview' ).attr( 'src', attachment.url ).css( 'width', 'auto' );
					jQuery( '#' + customid + '_image_att_id' ).val( attachment.id );
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
		},
		load_collection: function() {
				jQuery( function() {
					jQuery( "#wtst-pb-collection-canvas" )
					.accordion({
						header: "> div > h3",
						collapsible: true
					})
					.sortable({
						axis: "y",
						handle: "h3",
						start: function(event, ui) {
							ui.item.bind("click.prevent", function(event) { event.preventDefault(); });
						},
						stop: function( event, ui ) {
							// IE doesn't register the blur when sorting
							// so trigger focusout handlers to remove .ui-state-focus
							ui.item.children( "h3" ).triggerHandler( "focusout" );
							setTimeout(function(){ui.item.unbind("click.prevent");}, 300);
					
							// Refresh accordion to handle new order
							jQuery( this ).accordion( "refresh" );
						}
					});
				} );
				function bindActions() {
					jQuery('.wtst-pb-collection-el .remove').unbind().click(function(){
						if(confirm("Are you sure?")) jQuery(this).parent().parent().remove();
					});
					jQuery('.wtst-pb-collection-el').each(function(){
						jQuery(this).find('input:first').unbind().on('keyup', function(){
							jQuery(this).parent().parent().parent().parent().find('h3 .title').first().html(jQuery(this).val());
						}).parent().parent().parent().parent().find('h3 .title').first().html(jQuery(this).find('input:first').val());
					});
				}
				jQuery('#wtst-pb-collection-button-add').click(function(){
					var newData = jQuery(jQuery(this).attr('data-prototype'));
					var rand = 100 + Math.floor(Math.random() * Math.floor(1000));
					var curId = newData.find('.wtst-form-media-value').attr('data-id');
					newData = jQuery(jQuery(this).attr('data-prototype').replaceAll(curId, rand+curId));
					/*newData.find('.wtst-form-controll').each(function(){
						jQuery(this).attr('id', rand.toString() + jQuery(this).attr('id'));
						jQuery(this).attr('data-id', rand.toString() + jQuery(this).attr('id'));
					});*/
					jQuery('#wtst-pb-collection-canvas').append(newData);
					jQuery('#wtst-pb-collection-canvas').accordion("refresh").sortable("refresh");   
					jQuery('.wtst-pb-collection-el .remove').click(function(){
						if(confirm("Are you sure?")) jQuery(this).parent().parent().remove();
					});
					bindActions();
				});
				jQuery('.wtst-pb-collection-el');
				bindActions();
		}
    }
//})( jQuery );
 