<?php
global $plazarttheme_font_family, $plazarttheme_font_weight;

$plazarttheme_get_fonts         =       plazarttheme_get_fonts();
$plazarttheme_font_family       =       array();
$plazarttheme_font_weight       =       array();
$plazarttheme_font_family[0]    =       array(
                    'value'     =>      'Default',
                    'label'     =>      'Default'
                );

foreach ($plazarttheme_get_fonts as $plazarttheme_get_font) {
        $plazarttheme_family            = $plazarttheme_get_font["family"];
        $plazarttheme_id                = $plazarttheme_get_font["uid"];
                /*   List Font Google   */
                $plazarttheme_font_family[$plazarttheme_id] = array(
                    'value'  =>  $plazarttheme_family,
                    'label'  =>  $plazarttheme_family
                );

}

?>