<?php
/**
 * Plugin Name: Image Placeholder
 * Plugin URI: 
 * Description: Places a image placeholder using a shortcode
 * Version: 1.0
 * Author: Buddy Jansen & Jeroen Sormani
 * Author URI: http://www.jeroensormani.nl
 * License: IPHBJ
 */

class placeholder {
    
    
    public function __construct() {
        
        add_shortcode('placeholder', array($this,'add_placeholder'));
        add_action('media_buttons_context', array($this,'add_button'));
        add_action('admin_footer', array($this,'popup'));
    
    }

    
    public function add_placeholder($atts) {

        extract( shortcode_atts( array(
            'height' => 150,
            'width' => 150,
            'url' => "#",
            'size' => null,
            'align' => "none",
        ), $atts ) );

        return "<img src='http://placehold.it/".$width."x".$height."' class='align$align'>";
    }
    
    public function add_button($container_id, $placeholder_button) {
        $placeholder_button =  '<a class="thickbox" href="#TB_inline?width=400&inlineId=popup_container"><div class="button">Placeholder</div></a>';
        
        return $placeholder_button;
    }
    
    public function popup() {
        ?>
        <div id="popup_container" style="display:none;">
            <p>You can choose a placeholder size, or you can choose for the custom placeholder.</p>
        </div>
        <?php
    }

}
$placeholder = new placeholder();
$placeholder->popup();


?>