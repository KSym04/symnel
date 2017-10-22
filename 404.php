<?php
/**
 * Symnel 404 Page
 *
 * @package Osclass
 * @subpackage Symnel
 * @since Symnel 1.0.1
 */

// meta tag robots
osc_add_hook( 'header', 'dtf_nofollow_construct' );
dtf_add_body_class( 'not-found-404' );
osc_current_web_theme_path( 'header.php' ); ?>

<div class="container">
  <div class="row">

      <div class="static-page-block col-md-12">
        <div class="static-page-header">
          <h1><?php _e( "Sorry but I can't find the page you're looking for", 'symnel' ) ; ?></h1>
          <p><?php _e( "Let us help you, we have got a few tips for you to find it.", 'symnel' ) ; ?></p>
        </div>
        <div class="static-page-content">
            <?php _e( "<strong>Look</strong> for it in the most popular categories.", 'symnel' ) ; ?>
            <ul class="categories">
                <?php osc_goto_first_category() ; ?>
                <?php while ( osc_has_categories() ) { ?>
                    <li>
                        <a class="category <?php echo osc_category_slug() ; ?>" href="<?php echo osc_search_category_url() ; ?>"><?php echo osc_category_name() ; ?></a> <span>(<?php echo osc_category_total_items() ; ?>)
                        <?php if ( osc_count_subcategories() > 0 ) { ?>
                            <ul class="sub-categories">
                            <?php while ( osc_has_subcategories() ) { ?>
                                <?php if ( osc_category_total_items() > 0 ) { ?>
                                    <li>
                                        <a class="category <?php echo osc_category_slug() ; ?>" href="<?php echo osc_search_category_url() ; ?>"><?php echo osc_category_name() ; ?></a> <span>(<?php echo osc_category_total_items() ; ?>)
                                    </li>
                                <?php } ?>
                            <?php } ?>
                            </ul>
                        <?php } ?>
                    </li>
                <?php } ?>
            </div>
        </div>
      </div>

  </div>
</div>

<?php osc_current_web_theme_path( 'footer-item.php' ); ?>
<?php osc_current_web_theme_path( 'footer.php' ); ?>
