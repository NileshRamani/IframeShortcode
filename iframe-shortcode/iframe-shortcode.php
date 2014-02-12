<?php
/*
Plugin Name: Iframe Shortcode
Description: [iframe src="http://www.youtube.com/embed/myh94hpFmJY"][/iframe] - apply short code <> instead []
Version: 1.0
Author: Nilesh Ramani
Plugin URI: http://google.com
*/
if(!function_exists( 'NSquareIframeShortcode')) {
	
	function NSquareIframeShortcode($attrs) {
		
		$defaults_attr = array(
			'height' => '100%',
			'width' => '100%',
			'class' => 'iframe-class',
			'scrolling' => 'no',
			'src' => 'http://www.youtube.com/embed/myh94hpFmJY',
			'frameborder' => '0'
		);

		foreach($defaults_attr as $key => $value) { 
			if(!@array_key_exists( $key, $attrs )) { 
				$attrs[$key] = $value;
			}
		}
		
		$str_replace_iframe = '<iframe';
        foreach($attrs as $attr => $value) {
			if($attr != 'same_height_as') { 
				if($value != '') { 
					$str_replace_iframe .= ' ' . $attr . '="' . $value . '"';
				} else { 
					$str_replace_iframe .= ' ' . $attr;
				}
			}
		}
		$str_replace_iframe .= '></iframe>';
		return $str_replace_iframe;
	}
	add_shortcode('iframe', 'NSquareIframeShortcode');	
}