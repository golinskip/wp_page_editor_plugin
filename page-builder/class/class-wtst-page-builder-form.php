<?php
class wtst_page_builder_form
{
    protected static $globalIDIndex = [];
    protected static function preventUniqueID($name) {
        if(!isset(self::$globalIDIndex[$name])) {
            self::$globalIDIndex[$name] = true;
            return $name;
        } else {
            $i=0;
            while(true) {
                $checkedID = $name."_".$i;
                if(!isset(self::$globalIDIndex[$checkedID])) {
                    self::$globalIDIndex[$checkedID] = true;
                    return $checkedID;
                }
                $i++;
            }
         }
    }
    
    public static function number($name, $value = '', $addParam = '', $customId = '')
    {
        if ($customId == "") {
            $customId = str_replace(['[', ']'], ['-','-'], $name);
        }
        $customId = self::preventUniqueID($customId);
        $out = '';
        $out.='<input class="wtst-form-controll" id="'.$customId.'" type="number" name="'.$name.'" value="'.$value.'" '.$addParam.'/>';
        return $out;
    }
    
    public static function text($name, $value = '', $multicolumn = false, $addParam = '', $customId = '')
    {    
        if ($customId == "") {
            $customId = str_replace(['[', ']'], ['-','-'], $name);
        }
        $customId = self::preventUniqueID($customId);
        $out = '';
        if($multicolumn) {
            $out.='<textarea class="wtst-form-controll" id="'.$customId.'" name="'.$name.'" style="width:100%; min-height:400px;">';
            $out.= $value;
            $out.='</textarea>';
        } else {
            $out.='<input class="wtst-form-controll" id="'.$customId.'" type="text" name="'.$name.'" value="'.$value.'" '.$addParam.'/>';
        }
        return $out;
    }
    
    public static function media_selector($name, $value = '', $customId = '')
    {
        $image = wp_get_attachment_image_src($value);
        if ($image) {
            list($src, $width, $height) = $image;
        }
        if ($customId == "") {
            $customId = str_replace(['[', ']'], ['-','-'], $name);
        }
        $customId = self::preventUniqueID($customId);
        $no_image_src = plugin_dir_url(__FILE__) . '../img/noimage.png';
        $img_src= (isset($src))?$src:$no_image_src;
        $out = '';
        $out.= '<div class="'.$name.'_image_preview_wrapper">';
        $out.= '<img id="'.$customId.'_image_preview" src="'.$img_src.'" width="100" height="100" style="max-height: 100px; width: 100px;">';
        $out.= '</div>';
        $out.= '<input id="'.$customId.'_image_upload_button" type="button" class="button" value="' . __( 'Upload image', 'wtst').'" />';
        $out.= '<input id="'.$customId.'_image_reset_button" type="button" class="button" value="' . __( 'Reset', 'wtst' ).'" />';
        $out.= '<input class="wtst-form-controll" type="hidden" name="'.$name.'" id="'.$customId.'_image_att_id" value="'.$value.'" />';
        $out.= "<script type='text/javascript'>
		jQuery( document ).ready( function( $ ) {
			// Uploading files
			var file_frame;
			var wp_media_post_id = wp.media.model.settings.post.id; // Store the old id
                        var set_to_post_id = 1;
                        var no_image_img = '';
                        jQuery('#".$customId."_image_reset_button').click(function(){
                            jQuery('#".$customId."_image_preview').attr('src', '".$no_image_src."');
                            jQuery('#".$customId."_image_att_id').val('');
                        });
			jQuery('#".$customId."_image_upload_button').on('click', function( event ){
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
					$( '#".$customId."_image_preview' ).attr( 'src', attachment.url ).css( 'width', 'auto' );
					$( '#".$customId."_image_att_id' ).val( attachment.id );
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
		});</script>";
        return $out;
    }
    
    public static function editor($name, $value, $settings= []) {
        ob_start();
            $settings = array_merge($settings, array( 'editor_class' => 'dtthemes_wp_editor dtthemes_option ' . $name ));
            wp_editor($value, $name, $settings );
        $out = ob_get_clean();
        return $out;
    }
    
    /**
     * 
     * @param type $name
     * @param type $options : value => label
     * @param type $label
     * @param type $value
     */
    public static function options($name, $options = [], $value = 0, $addParam = '', $customId = '') {
        if ($customId == "") {
            $customId = str_replace(['[', ']'], ['-','-'], $name);
        }
        $customId = self::preventUniqueID($customId);
        $out = '';
        $out.='<select class="wtst-form-controll" id="'.$customId.'" name="'.$name.'" '.$addParam.'>';
        foreach($options as $val => $label) {
            $sel = ($val == $value)?' selected="selected"':'';
            $out.='<option value="'.$val.'"'.$sel.'>';
            $out.=$label;
            $out.='</option>';
        }
        $out.='</select>';
        return $out;
    }

}
