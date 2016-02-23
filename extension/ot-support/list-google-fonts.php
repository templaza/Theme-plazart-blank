<?php
global $tz_plazarttheme_font_family, $tz_plazarttheme_font_weight;

$tz_plazarttheme_get_fonts         =       tz_plazarttheme_get_fonts();
$tz_plazarttheme_font_family       =       array();
$tz_plazarttheme_font_weight       =       array();
$tz_plazarttheme_font_family[0]    =       array(
                    'value'     =>      'Default',
                    'label'     =>      'Default'
                );

foreach ($tz_plazarttheme_get_fonts as $tz_plazarttheme_get_font) {
        $tz_plazarttheme_family            = $tz_plazarttheme_get_font["family"];
        $tz_plazarttheme_id                = $tz_plazarttheme_get_font["uid"];
                /*   List Font Google   */
                $tz_plazarttheme_font_family[$tz_plazarttheme_id] = array(
                    'value'  =>  $tz_plazarttheme_family,
                    'label'  =>  $tz_plazarttheme_family
                );

}

?>