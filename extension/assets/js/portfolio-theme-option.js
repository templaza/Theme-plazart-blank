jQuery(document).ready(function(){

    // method body font
    var FontCheck2 = jQuery("#plazarttheme_TZFontType").attr('value');
    switch (FontCheck2){
        case 'TzFontSquirrel':
            jQuery('#setting_plazarttheme_TzFontSquirrel').css("display","block");
            break;
        case 'TzFontDefault':
            jQuery('#setting_plazarttheme_TzFontDefault').css("display","block");

            break;
        case 'Tzgoogle':

            jQuery('#setting_plazarttheme_TzFontFami').css("display","block");
            jQuery('#setting_plazarttheme_TzFontFaminy').css("display","block");
            break;
    }

    jQuery("#plazarttheme_TZFontType").change(function(){
        var FontCheck = jQuery("#plazarttheme_TZFontType").attr('value');
        switch (FontCheck){
            case 'TzFontDefault':
                jQuery('#setting_plazarttheme_TzFontDefault').slideDown();
                jQuery('#setting_plazarttheme_TzFontSquirrel').slideUp();
                jQuery('#setting_plazarttheme_TzFontFami').slideUp();
                jQuery('#setting_plazarttheme_TzFontFaminy').slideUp();
                break;
            case 'Tzgoogle':
                jQuery('#setting_plazarttheme_TzFontDefault').slideUp();
                jQuery('#setting_plazarttheme_TzFontSquirrel').slideUp();
                jQuery('#setting_plazarttheme_TzFontFami').slideDown();
                jQuery('#setting_plazarttheme_TzFontFaminy').slideDown();
                break;
        }
    });


    // method header font
    var FontCheckHead = jQuery("#plazarttheme_TZFontTypeHead").attr('value');
    switch (FontCheckHead){
        case 'TzFontDefault':
            jQuery('#setting_plazarttheme_TzFontHeadDefault').css("display","block");
            break;
        case 'Tzgoogle':
            jQuery('#setting_plazarttheme_TzFontHeadGoodurl').css("display","block");
            jQuery('#setting_plazarttheme_TzFontFaminyHead').css("display","block");
            break;
    }

    jQuery("#plazarttheme_TZFontTypeHead").change(function(){
        var FontCheckHead2 = jQuery("#plazarttheme_TZFontTypeHead").attr('value');
        switch (FontCheckHead2){
            case 'TzFontDefault':
                jQuery('#setting_plazarttheme_TzFontHeadDefault').slideDown();
                jQuery('#setting_plazarttheme_TzFontHeadSquirrel').slideUp();
                jQuery('#setting_plazarttheme_TzFontHeadGoodurl').slideUp();
                jQuery('#setting_plazarttheme_TzFontFaminyHead').slideUp();
                break;
            case 'Tzgoogle':
                jQuery('#setting_plazarttheme_TzFontHeadDefault').slideUp();
                jQuery('#setting_plazarttheme_TzFontHeadSquirrel').slideUp();
                jQuery('#setting_plazarttheme_TzFontHeadGoodurl').slideDown();
                jQuery('#setting_plazarttheme_TzFontFaminyHead').slideDown();
                break;
        }
    });

    // method Menu font
    var FontCheckMenu= jQuery("#plazarttheme_TZFontTypeMenu").attr('value');
    switch (FontCheckMenu){

        case 'TzFontDefault':
            jQuery('#setting_plazarttheme_TzFontMenuDefault').css("display","block");

            break;
        case 'Tzgoogle':

            jQuery('#setting_plazarttheme_TzFontMenuGoodurl').css("display","block");
            jQuery('#setting_plazarttheme_TzFontFaminyMenu').css("display","block");
            break;
    }

    jQuery("#plazarttheme_TZFontTypeMenu").change(function(){
        var FontCheckMenu2 = jQuery("#plazarttheme_TZFontTypeMenu").attr('value');
        switch (FontCheckMenu2){

            case 'TzFontDefault':
                jQuery('#setting_plazarttheme_TzFontMenuDefault').slideDown();
                jQuery('#setting_plazarttheme_TzFontMenuSquirrel').slideUp();
                jQuery('#setting_plazarttheme_TzFontMenuGoodurl').slideUp();
                jQuery('#setting_plazarttheme_TzFontFaminyMenu').slideUp();
                break;
            case 'Tzgoogle':
                jQuery('#setting_plazarttheme_TzFontMenuDefault').slideUp();
                jQuery('#setting_plazarttheme_TzFontMenuSquirrel').slideUp();
                jQuery('#setting_plazarttheme_TzFontMenuGoodurl').slideDown();
                jQuery('#setting_plazarttheme_TzFontFaminyMenu').slideDown();
                break;
        }
    });

    // method custom font
    var FontCheckCustom= jQuery("#plazarttheme_TZFontTypeCustom").attr('value');
    switch (FontCheckCustom){

        case 'TzFontDefault':
            jQuery('#setting_plazarttheme_TzFontCustomDefault').css("display","block");

            break;
        case 'Tzgoogle':

            jQuery('#setting_plazarttheme_TzFontCustomGoodurl').css("display","block");
            jQuery('#setting_plazarttheme_TzFontFaminyCustom').css("display","block");
            break;
    }

    jQuery("#plazarttheme_TZFontTypeCustom").change(function(){
        var FontCheckCustom2 = jQuery("#plazarttheme_TZFontTypeCustom").attr('value');
        switch (FontCheckCustom2){

            case 'TzFontDefault':
                jQuery('#setting_plazarttheme_TzFontCustomDefault').slideDown();
                jQuery('#setting_plazarttheme_TzFontCustomSquirrel').slideUp();
                jQuery('#setting_plazarttheme_TzFontCustomGoodurl').slideUp();
                jQuery('#setting_plazarttheme_TzFontFaminyCustom').slideUp();
                break;
            case 'Tzgoogle':
                jQuery('#setting_plazarttheme_TzFontCustomDefault').slideUp();
                jQuery('#setting_plazarttheme_TzFontCustomSquirrel').slideUp();
                jQuery('#setting_plazarttheme_TzFontCustomGoodurl').slideDown();
                jQuery('#setting_plazarttheme_TzFontFaminyCustom').slideDown();
                break;
        }
    });




    // method logo type

    var LogoType= jQuery("#plazarttheme_logotype").attr('value');
    if(LogoType==1){
        jQuery('#setting_plazarttheme_logo').slideDown();
        jQuery('#setting_plazarttheme_logoText').slideUp();
        jQuery('#setting_plazarttheme_logoTextcolor').slideUp();
    }else{
        jQuery('#setting_plazarttheme_logo').slideUp();
        jQuery('#setting_plazarttheme_logoText').slideDown();
        jQuery('#setting_plazarttheme_logoTextcolor').slideDown();
    }

    jQuery("#plazarttheme_logotype").change(function(){
        var LogoTypeChange= jQuery("#plazarttheme_logotype").attr('value');
        if(LogoTypeChange==1){
            jQuery('#setting_plazarttheme_logo').slideDown();
            jQuery('#setting_plazarttheme_logoText').slideUp();
            jQuery('#setting_plazarttheme_logoTextcolor').slideUp();
        }else{
            jQuery('#setting_plazarttheme_logo').slideUp();
            jQuery('#setting_plazarttheme_logoText').slideDown();
            jQuery('#setting_plazarttheme_logoTextcolor').slideDown();
        }
    });


    // jquery style option
    jQuery("#tab_TzSyle").toggle(function(){
        jQuery('#tab_TzFontMenu').slideDown();
        jQuery('#tab_TzFontCustom').slideDown();
        jQuery('#tab_TZBody').slideDown();
        jQuery('#tab_TzFontHeader').slideDown();
    }, function(){
        jQuery('#tab_TzFontMenu').slideUp();
        jQuery('#tab_TzFontCustom').slideUp();
        jQuery('#tab_TZBody').slideUp();
        jQuery('#tab_TzFontHeader').slideUp();
    });

        // jquery style option
    jQuery("#tab_TZShop").toggle(function(){
        jQuery('#tab_TZShop1, #tab_TZShop2, #tab_TZShop3').slideDown();
    }, function(){
        jQuery('#tab_TZShop1, #tab_TZShop2, #tab_TZShop3').slideUp();
    });

    // jquery favicon option
    var valuefavicon = jQuery('#plazarttheme_favicon_onoff').attr('value');
    if(valuefavicon =='yes'){
        jQuery('#setting_plazarttheme_favicon').slideDown();
    }else{
        jQuery('#setting_plazarttheme_favicon').slideUp();
    }

    jQuery('#plazarttheme_favicon_onoff').change(function(){
        if(jQuery(this).attr('value')=='yes'){
            jQuery('#setting_plazarttheme_favicon').slideDown();
        }else{
            jQuery('#setting_plazarttheme_favicon').slideUp();
        }
    });

// footer

    jQuery('#plazarttheme_footer_columns').change(function(){

        var footerchange = jQuery(this).attr('value');

        switch (footerchange){
            case'1':
                jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(0)').slideDown();
                jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(1)').slideUp();
                jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(2)').slideUp();
                jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(3)').slideUp();
                break;
            case'2':
                jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(0)').slideDown();
                jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(1)').slideDown();
                jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(2)').slideUp();
                jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(3)').slideUp();
                break;
            case'3':
                jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(0)').slideDown();
                jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(1)').slideDown();
                jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(2)').slideDown();
                jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(3)').slideUp();
                break;
            case'4':
                jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(0)').slideDown();
                jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(1)').slideDown();
                jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(2)').slideDown();
                jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(3)').slideDown();
                break;
            default :
                jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(0)').slideDown();
                jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(1)').slideDown();
                jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(2)').slideDown();
                jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(3)').slideDown();
                break;
        }
    });
    var footervalue =  jQuery('#plazarttheme_footer_columns').attr('value');

    switch (footervalue){
        case'1':
            jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(0)').slideDown();
            jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(1)').slideUp();
            jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(2)').slideUp();
            jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(3)').slideUp();
            break;
        case'2':
            jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(0)').slideDown();
            jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(1)').slideDown();
            jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(2)').slideUp();
            jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(3)').slideUp();
            break;
        case'3':
            jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(0)').slideDown();
            jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(1)').slideDown();
            jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(2)').slideDown();
            jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(3)').slideUp();
            break;
        case'4':
            jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(0)').slideDown();
            jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(1)').slideDown();
            jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(2)').slideDown();
            jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(3)').slideDown();
            break;
        default :
            jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(0)').slideDown();
            jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(1)').slideDown();
            jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(2)').slideDown();
            jQuery('#setting_plazartthemefooter_image .option-tree-ui-radio-images:eq(3)').slideDown();
            break;
    }

    /*   Theme Color   */
    var $themecolor = jQuery('#plazarttheme_TZTypecolor').val();

    switch ($themecolor){
        case '1':
            jQuery('#setting_plazarttheme_TZThemecustom').slideDown();
            jQuery('#setting_plazarttheme_TZThemecolor').slideUp();
            break;
        default :
            jQuery('#setting_plazarttheme_TZThemecustom').slideUp;
            jQuery('#setting_plazarttheme_TZThemecolor').slideDown();
            break;

    }

    jQuery('#plazarttheme_TZTypecolor').change(function(){

        var $themecolor2 = jQuery(this).val();
        switch ($themecolor2){
            case '1':
                jQuery('#setting_plazarttheme_TZThemecustom').slideDown();
                jQuery('#setting_plazarttheme_TZThemecolor').slideUp();
                break;
            default :
                jQuery('#setting_plazarttheme_TZThemecustom').slideUp();
                jQuery('#setting_plazarttheme_TZThemecolor').slideDown();
                break;

        }
    });

});



// Background Type Event

jQuery('#plazarttheme_background_type').on('change', function () {
    "use strict";

    var value = jQuery(this).val();
    if (String(value) === 'none') {
        jQuery('#setting_plazarttheme_background_pattern, ' +
            '#setting_plazarttheme_background_single_image').slideUp();
        jQuery('#setting_plazarttheme_TZBackgroundColor').slideDown();
    }else if (String(value) === 'pattern') {
        jQuery('#setting_plazarttheme_background_pattern').slideDown();
        jQuery('#setting_plazarttheme_background_single_image').slideUp();
        jQuery('#setting_plazarttheme_TZBackgroundColor').slideUp();
    }else {
        jQuery('#setting_plazarttheme_background_pattern').slideUp();
        jQuery('#setting_plazarttheme_background_single_image').slideDown();
        jQuery('#setting_plazarttheme_TZBackgroundColor').slideUp();
    }
});

var background_type = jQuery('#plazarttheme_background_type').val();
if (String(background_type) === 'none') {
    jQuery('#setting_plazarttheme_background_pattern, ' +
        '#setting_plazarttheme_background_single_image').slideUp();
    jQuery('#setting_plazarttheme_TZBackgroundColor').slideDown();
}else if (String(background_type) === 'pattern') {
    jQuery('#setting_plazarttheme_background_pattern').slideDown();
    jQuery('#setting_plazarttheme_background_single_image').slideUp();
} else {
    jQuery('#setting_plazarttheme_background_pattern').slideUp();
    jQuery('#setting_plazarttheme_background_single_image').slideDown();

}

// Background Pattern Preview
jQuery('#setting_plazarttheme_background_pattern .background_pattern').on('click', function () {
    "use strict";
    if (jQuery('#wpcontent').length > 0) {
        jQuery('#wpcontent').css('background', 'url("' + jQuery(this).attr('src') + '") repeat');
    }
});