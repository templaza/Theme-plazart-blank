var $container        =   jQuery('.tzPortfolio'),
    Desktop           =   variables_portfolio.desktop,
    tabletportrait    =   variables_portfolio.tabletportrait,
    mobilelandscape   =   variables_portfolio.mobilelandscape,
    mobileportrait    =   variables_portfolio.mobileportrait,
    $filter_status    =   variables_portfolio.filter_status,
    $paging           =   variables_portfolio.paging,
    resizeTimer = null;

/*
* Method create tags
* @variables $filter_status
*/
function tz_plazarttheme_create_tags() {
    if ( $filter_status == 'show' ) {
        var cat_status = []; //var cat_status = [];
        jQuery('.tzPortfolio .portfolio-item').each(function(){
            var item_class = jQuery(this).attr('class');

            item_class = item_class.split(' ');
            for(var i = 0; i < item_class.length; i++){

                if(parseInt(item_class[i].indexOf(themeprefix), 10) === 0) {
                    if(jQuery.inArray(item_class[i], cat_status)){
                        cat_status.push(item_class[i]);
                    }
                }
            }
        });
        for(var index=0; index < cat_status.length; index++){
            jQuery('.tzFilter button#' + cat_status[index]).removeClass('TZHide');
            jQuery('.tzFilter button#' + cat_status[index]).addClass('TZShow');
        }
    }
}
/*
 * Method reize image
 * @variables class
 */
function tz_plazarttheme_ResizeImage(obj){
    var widthStage;
    var heightStage ;
    var widthImage;
    var heightImage;
    obj.each(function (i,el){

        heightStage = jQuery(this).height();

        widthStage = jQuery (this).width();

        var img_url = jQuery(this).find('img').attr('src');

        var image = new Image();
        image.src = img_url;

        widthImage = image.naturalWidth;
        heightImage = image.naturalHeight;

        var tzimg	=	new resizeImage(widthImage, heightImage, widthStage, heightStage);
        jQuery(this).find('img').css ({ top: tzimg.top, left: tzimg.left, width: tzimg.width, height: tzimg.height });


    });

}

/*
 * Method portfolio column
 * @variables Desktop
 * @variables tabletportrait
 * @variables mobilelandscape
 * @variables mobileportrait
 */
function tz_plazarttheme_init(Desktop, tabletportrait, mobilelandscape, mobileportrait){
    var contentWidth    = jQuery('.tzPortfolio').width();
    var numberItem      = 2;
    var newColWidth     = 0;
    var featureColWidth = 0;
    var widthWindwow = jQuery(window).width();
    if (widthWindwow >= 992) {
        numberItem = Desktop;
    } else if (  widthWindwow >= 768) {
        numberItem = tabletportrait ;
    } else if (  widthWindwow >= 480) {
        numberItem = mobilelandscape ;
    } else if (widthWindwow < 480) {
        numberItem = mobileportrait ;
    }
    newColWidth = Math.floor(contentWidth / numberItem);
    featureColWidth = newColWidth * 2;
    jQuery('.portfolio-item').width(newColWidth);
    jQuery('.tz_feature_item').width(featureColWidth);
    var $container  = jQuery('.tzPortfolio') ;
    $container.imagesLoaded(function(){
        $container.isotope({
            masonry:{
                columnWidth: newColWidth
            }
        });

    });
    tz_plazarttheme_ResizeImage(jQuery('.item-img'));
}

/*
 * Method reize
 */
jQuery(window).bind('load resize', function() {
    if (resizeTimer) clearTimeout(resizeTimer);
    resizeTimer = setTimeout("tz_plazarttheme_init(Desktop, tabletportrait, mobilelandscape, mobileportrait)", 100);
});

/*
 * Method filter portfolio
 */
function tz_plazarttheme_loadPortfolio(){
    if ( $filter_status == 'show' ) {
        var $optionSets = jQuery('.tzFilter'),
            $optionLinks = $optionSets.find('button');
        $optionLinks.click(function(event){
            event.preventDefault();
            var $this = jQuery(this);
            // don't proceed if already selected
            if ( $this.hasClass('selected') ) {
                return false;
            }
            var $optionSet = $this.parents('.tzFilter');
            $optionSet.find('.selected').removeClass('selected');
            $this.addClass('selected');

            // make option object dynamically, i.e. { filter: '.my-filter-class' }
            var options = {},
                key = $optionSet.attr('data-option-key'),
                value = $this.attr('data-option-value');

            // parse 'false' as false boolean
            value = value === 'false' ? false : value;
            options[ key ] = value;

            if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
                // changes in layout modes need extra logic
                changeLayoutMode( $this, options );
            } else {
                // otherwise, apply new options
                $container.isotope( options );
            }
            return false;
        });
        tz_plazarttheme_init(Desktop, tabletportrait, mobilelandscape, mobileportrait);
    }
}
jQuery(document).ready(function(){
    $container.imagesLoaded( function(){
        tz_plazarttheme_init(Desktop, tabletportrait, mobilelandscape, mobileportrait);
    });
    tz_plazarttheme_create_tags();
    tz_plazarttheme_loadPortfolio();
});

if ( $paging != 'pagenavi' ){

    jQuery(function(){
        $container.infinitescroll({
                navSelector  : '#loadajax a',    // selector for the paged navigation
                nextSelector : '#loadajax a:first',  // selector for the NEXT link (to page 2)
                itemSelector : '.portfolio-item',     // selector for all items you'll retrieve
                errorCallback: function(){
                    jQuery('#tz_append a').addClass('tzNomore');

                },
                loading: {
                    msgText:'',
                    finishedMsg: '',
                    img: variables_portfolio.image,
                    selector: '#tz_append'
                }
            },
            // call Isotope as a callback
            function( newElements ) {
                var $newElems =   jQuery( newElements ).css({ opacity: 0 });
                // ensure that images load before adding to masonry layout
                $newElems.imagesLoaded(function(){
                    // show elems now they're ready
                    $newElems.animate({ opacity: 1 });
                    // trigger scroll again
                    $container.isotope( 'appended', $newElems);
                    if (String(jQuery.browser.safari) && String(document.readyState) !== "complete") {
                        tz_plazarttheme_init(Desktop, tabletportrait, mobilelandscape, mobileportrait);
                    } else {
                        tz_plazarttheme_init(Desktop, tabletportrait, mobilelandscape, mobileportrait);
                    }
                    //if there still more item
                    if($newElems.length){
                        //move item-more to the end
                        jQuery('div#tz_append').find('a:first').show();
                    }
                });

                tz_plazarttheme_create_tags();
            }
        );

        if ( $paging == 'ajaxbutton' ){
            jQuery(window).unbind('.infscr');

            jQuery('div#tz_append a').click(function(){
                jQuery('div#tz_append').find('a:first').hide();
                $container.infinitescroll('retrieve');
            });
        }

    });
}