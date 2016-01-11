<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 7/14/13
 * Time: 8:50 PM
 * To change this template use File | Settings | File Templates.
 */
get_header();

$plazarttheme_title      = ot_get_option('plazarttheme_404_title');
$plazarttheme_content    = ot_get_option('plazarttheme_404_content');
$plazarttheme_background = ot_get_option('plazarttheme_404_bk');

?>

<div class="error">

    <div class="bug-content">
        <h1 class="title-404"><?php echo esc_html($plazarttheme_title); ?></h1>
        <div id="errorboxheader"><?php echo esc_html($plazarttheme_content); ?></div>
        <div id="errorboxbody">
            <ul class="back-to-homepage">
                <li><a href="<?php echo esc_url(get_home_url('/')); ?>" title="<?php echo esc_html__('Go to the Home Page', 'plazarttheme'); ?>"><?php echo esc_html__('Go to the Home Page', 'plazarttheme'); ?></a></li>
            </ul>
            <div id="techinfo">
                <p>
                </p>
            </div>
        </div>
    </div>

</div>
</div>

</body>
</html>