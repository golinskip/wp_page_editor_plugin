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
    
    public static function number($name, $value = '', $addParam = '', $custom_id = '')
    {
        if ($custom_id == "") {
            $custom_id = str_replace(['[', ']'], ['-','-'], $name);
        }
        $custom_id = self::preventUniqueID($custom_id);
        $out ='<input class="wtst-form-controll" id="'.$custom_id.'" type="number" name="'.$name.'" value="'.$value.'" '.$addParam.'/>';
        return $out;
    }
    
    public static function text($name, $value = '', $multicolumn = false, $addParam = '', $custom_id = '')
    {    
        if ($custom_id == "") {
            $custom_id = str_replace(['[', ']'], ['-','-'], $name);
        }
        $custom_id = self::preventUniqueID($custom_id);
        $out = '';
        if($multicolumn) {
            $out.='<textarea class="wtst-form-controll" id="'.$custom_id.'" name="'.$name.'" style="width:100%; min-height:400px;">';
            $out.= $value;
            $out.='</textarea>';
        } else {
            $out.='<input class="wtst-form-controll" id="'.$custom_id.'" type="text" name="'.$name.'" value="'.$value.'" '.$addParam.'/>';
        }
        return $out;
    }
    
    public static function media_selector($name, $value = '', $custom_id = '')
    {
        $image = wp_get_attachment_image_src($value);
        if ($image) {
            list($src, $width, $height) = $image;
        }
        if ($custom_id == "") {
            $custom_id = str_replace(['[', ']'], ['-','-'], $name);
        }
        $custom_id = self::preventUniqueID($custom_id);
        $no_image_src = plugin_dir_url(__FILE__) . '../img/noimage.png';
        $img_src= (isset($src))?$src:$no_image_src;
        $out = '<div class="'.$name.'_image_preview_wrapper">';
        $out.= '    <img class="wtst-form-controll" id="'.$custom_id.'_image_preview" src="'.$img_src.'" width="100" height="100" style="max-height: 100px; width: 100px;">';
        $out.= '</div>';
        $out.= '<input class="wtst-form-controll"  id="'.$custom_id.'_image_upload_button" type="button" class="button" value="' . __( 'Upload image', 'wtst').'" />';
        $out.= '<input class="wtst-form-controll"  id="'.$custom_id.'_image_reset_button" type="button" class="button" value="' . __( 'Reset', 'wtst' ).'" />';
        $out.= '<input data-id="'.$custom_id.'" class="wtst-form-controll wtst-form-media-value" type="hidden" name="'.$name.'" id="'.$custom_id.'_image_att_id" value="'.$value.'" />';
        $out.= "<script type='text/javascript'> pbet.load_media('$custom_id', '$no_image_src'); </script>";
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
    public static function options($name, $options = [], $value = 0, $addParam = '', $custom_id = '') {
        if ($custom_id == "") {
            $custom_id = str_replace(['[', ']'], ['-','-'], $name);
        }
        $custom_id = self::preventUniqueID($custom_id);
        $out ='<select class="wtst-form-controll" id="'.$custom_id.'" name="'.$name.'" '.$addParam.'>';
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
