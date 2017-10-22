<?php
/**
 * @package    Osclass
 * @author     DopeThemes <hello@dopethemes.com>
 * @copyright  Copyright (c) DopeThemes 2014
 * @license    http://www.dopethemes.com/license/osclass
 * @link       http://www.dopethemes.com/
 */
?>
    <?php osc_run_hook( 'after-content' ); ?>

    <?php osc_run_hook( 'footer' ); ?>

    <script type="text/javascript">
        jQuery().ready(function(){
        <?php if ( osc_locale_thousands_sep()!='' || osc_locale_dec_point() != '' ) { ?>
            jQuery("#price").blur(function(event) {
                var price = jQuery("#price").prop("value");
                <?php if ( osc_locale_thousands_sep()!='' ) { ?>
                while(price.indexOf('<?php echo osc_esc_js( osc_locale_thousands_sep() );  ?>')!=-1) {
                    price = price.replace('<?php echo osc_esc_js( osc_locale_thousands_sep() );  ?>', '');
                }
                <?php } ?>
                <?php if ( osc_locale_dec_point()!='' ) { ?>
                var tmp = price.split('<?php echo osc_esc_js( osc_locale_dec_point() )?>');
                if(tmp.length>2) {
                    price = tmp[0]+'<?php echo osc_esc_js( osc_locale_dec_point() )?>'+tmp[1];
                }
                <?php } ?>
                jQuery("#price").prop("value", price);
            });
        <?php } ?>

            // Tab Bootstrap
            var url = document.location.toString();
            if (url.match('#')) {
              jQuery('.nav-tabs a[href=#'+url.split('#')[1]+']').tab('show');
            }

            jQuery('.nav-tabs a').on('shown', function (e) {
              window.location.hash = e.target.hash;
            });
        });
    </script>

  </body>
</html>
