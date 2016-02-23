<?php
$tz_plazarttheme_footer_col     =   ot_get_option('plazarttheme_footer_columns',4);
$tz_plazarttheme_footer_widthl  =   ot_get_option('plazartthemefooterwidth1',3);
$tz_plazarttheme_footer_width2  =   ot_get_option('plazartthemefooterwidth2',3);
$tz_plazarttheme_footer_width3  =   ot_get_option('plazartthemefooterwidth3',3);
$tz_plazarttheme_footer_width4  =   ot_get_option('plazartthemefooterwidth4',3);
$tz_plazarttheme_copyright      =   ot_get_option('plazarttheme_copyright');
?>

<footer class="tz-footer">
    <div class="container">
            <div class="row">
                <?php
                if(isset($tz_plazarttheme_footer_col) && $tz_plazarttheme_footer_col!=""):
                    for( $tz_plazarttheme_i=0; $tz_plazarttheme_i < $tz_plazarttheme_footer_col; $tz_plazarttheme_i++ ):
                        $tz_plazarttheme_j = $tz_plazarttheme_i +1;
                        if($tz_plazarttheme_i==0){
                            $tz_plazarttheme_col = $tz_plazarttheme_footer_widthl;
                        }elseif($tz_plazarttheme_i==1){
                            $tz_plazarttheme_col = $tz_plazarttheme_footer_width2;
                        }elseif($tz_plazarttheme_i==2){
                            $tz_plazarttheme_col = $tz_plazarttheme_footer_width3;
                        }elseif($tz_plazarttheme_i==3){
                            $tz_plazarttheme_col = $tz_plazarttheme_footer_width4;
                        }

                        ?>
                        <div class="col-md-<?php echo esc_attr($tz_plazarttheme_col); ?> footerattr">
                            <?php
                            if(function_exists('dynamic_sidebar') && dynamic_sidebar('Footer '.$tz_plazarttheme_j.'')):
                            endif;
                            ?>
                        </div><!--end class footermenu-->
                        <?php
                    endfor;
                endif;
                ?>

            </div><!--end class row-->
    </div><!--end class container-->
    <div class="container">
        <div class="tz-demo-copyright"><?php echo balanceTags($tz_plazarttheme_copyright); ?></div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
