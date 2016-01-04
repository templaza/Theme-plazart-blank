<?php
$plazarttheme_footer_col     =   ot_get_option('plazarttheme_footer_columns',4);
$plazarttheme_footer_widthl  =   ot_get_option('plazartthemefooterwidth1',3);
$plazarttheme_footer_width2  =   ot_get_option('plazartthemefooterwidth2',3);
$plazarttheme_footer_width3  =   ot_get_option('plazartthemefooterwidth3',3);
$plazarttheme_footer_width4  =   ot_get_option('plazartthemefooterwidth4',3);
$plazarttheme_copyright      =   ot_get_option('plazarttheme_copyright');
?>

<footer class="tz-footer">
    <div class="container">
            <div class="row">
                <?php
                if(isset($plazarttheme_footer_col) && $plazarttheme_footer_col!=""):
                    for( $plazarttheme_i=0; $plazarttheme_i < $plazarttheme_footer_col; $plazarttheme_i++ ):
                        $plazarttheme_j = $plazarttheme_i +1;
                        if($plazarttheme_i==0){
                            $plazarttheme_col = $plazarttheme_footer_widthl;
                        }elseif($plazarttheme_i==1){
                            $plazarttheme_col = $plazarttheme_footer_width2;
                        }elseif($plazarttheme_i==2){
                            $plazarttheme_col = $plazarttheme_footer_width3;
                        }elseif($plazarttheme_i==3){
                            $plazarttheme_col = $plazarttheme_footer_width4;
                        }

                        ?>
                        <div class="col-md-<?php echo esc_attr($plazarttheme_col); ?> footerattr">
                            <?php
                            if(function_exists('dynamic_sidebar') && dynamic_sidebar('Footer '.$plazarttheme_j.'')):
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
        <div class="tz-demo-copyright"><?php echo balanceTags($plazarttheme_copyright); ?></div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
