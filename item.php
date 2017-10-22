<?php
/**
 * Symnel Items
 *
 * @package Osclass
 * @subpackage Symnel
 * @since Symnel 1.0
 */

if( osc_item_is_expired() == true || osc_item_is_inactive() == true || osc_item_is_spam() == true ) {
  // meta tag robots
  osc_add_hook( 'header', 'dtf_nofollow_construct' );
} else {
  // meta tag robots
  osc_add_hook( 'header', 'dtf_follow_construct' );
}

// add item class on body tag
dtf_add_body_class( 'item-view' );

$short_location = array();
$location = array();
if ( osc_item_address() !== '' ) {
  $location[] = osc_item_address();
}
if ( osc_item_city() !== '' ) {
  $location[] = osc_item_city();
  $short_location[] = osc_item_city();
}
if ( osc_item_region() !== '' ) {
  $location[] = osc_item_region();
  $short_location[] = osc_item_region();
}

if ( osc_item_user_id() != null ) {
    $seller_name = '<a href="'.osc_user_public_profile_url( osc_item_user_id() ).'" title="'.osc_item_contact_name().'">'.osc_item_contact_name().'</a>';
} else {
    $seller_name = __( 'Seller', 'symnel' );
}

osc_current_web_theme_path( 'header.php' );
dtf_show_flash_message( 'pubMessages', 'alert alert-dismissable alert-warning' ); ?>

<div class="container">
  <div class="row">

    <div class="item-wrapper-block col-md-12">
        <?php echo dtf_get_breadcrumb(); ?>
        <div itemscope itemtype="http://schema.org/Product" class="item-content">
            <h1 itemprop="name" class="item-title"><?php echo osc_item_title(); ?></h1>
            <div class="item-meta">
                <?php
                  $seller_username = dtf_get_username( osc_item_user_id() );
                  if( is_numeric( $seller_username ) ) { ?>
                    <a href="<?php echo osc_user_public_profile_url( osc_item_user_id() ); ?>" class="seller btn btn-default btn-xs">
                        <?php echo osc_item_contact_name(); ?>
                    </a>
                <?php
                  } else { ?>
                    <?php if ( $seller_username != '' ) { ?>
                        <a href="<?php echo osc_user_public_profile_url( osc_item_user_id() ); ?>" class="seller btn btn-default btn-xs">
                            <?php echo $seller_username; ?>
                        </a>
                    <?php } else { ?>
                        <span class="seller btn btn-default btn-xs">
                          <?php _e( 'Guest Seller', 'symnel' ); ?>
                        </span>
                    <?php } ?>
                <?php
                  }
                ?>
                <?php if ( osc_item_mod_date() !== '' ) { printf( __( '<span class="update btn-xs">Edited last %1$s</span>', 'symnel' ), osc_format_date( osc_item_mod_date() ) ); } ?>
                <?php if ( osc_is_web_user_logged_in() && osc_logged_user_id() == osc_item_user_id() ) { ?>
                    <span class="divider">
                        &middot;
                    </span>
                    <span id="edit_item_view">
                        <a href="<?php echo osc_item_edit_url(); ?>" rel="nofollow" class="btn-xs"><?php _e( 'Edit item', 'symnel' ); ?></a>
                        &middot;
                        <a onclick="javascript:return confirm('<?php echo osc_esc_js( __( 'This action can not be undone. Are you sure you want to continue?', 'symnel' ) ); ?>')" href="<?php echo osc_item_delete_url(); ?>" rel="nofollow" class="btn-xs"><?php _e( 'Delete item', 'symnel' ); ?></a>
                    </span>
                <?php } ?>
                <span class="visits pull-right">
                    <?php echo number_format( osc_item_views() ); ?> <?php echo (osc_item_views() > 1) ? __( 'Views', 'symnel' ) : __( 'View', 'symnel' ); ?>
                </span>
            </div>
            <div class="item-top-section container-fluid clearfix">
              <div class="row clearfix">

                <div class="item-image-preview col-md-8 clearfix">

                    <div class="item-image-content hidden-portrait clearfix">
                        <div class="slideshow-container clearfix">
                            <div id="slideshow" class="slideshow clearfix"></div>
                        </div>
                    </div>

                    <div id="mobile-slideshow-thumb" class="visible-portrait-block"></div>

                    <div class="visible-portrait-block">
                      <div class="item-minor-details">
                      <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                        <?php if ( osc_price_enabled_at_items() && osc_item_price() != '' ) { ?>
                          <strong class="price" itemprop="price">
                            <?php printf( '%s', osc_format_price(osc_item_price()) ); ?>
                          </strong>
                        <?php } else { ?>
                          <strong class="price"><?php _e( 'Ask seller for price', 'symnel' ); ?></strong>
                        <?php } ?>
                      </div>
                      <div class="date">
                          <?php if ( osc_item_pub_date() !== '' ) { printf( __( '<span class="publish">Published on <time>%1$s</time></span>', 'symnel' ), osc_format_date( osc_item_pub_date() ) ); } ?>
                      </div>
                      <?php if( osc_user_phone() !== '' ) { ?>
                      <div class="contact-number">
                          <span class="btn btn-warning"><i class="glyphicon glyphicon-phone"></i> <?php echo osc_user_phone(); ?></span>
                      </div>
                      <?php } ?>

                      <?php
                        $short_location = array_filter( $short_location );
                        if (!empty($short_location)) { ?>
                        <div class="item-location">
                            <span title="<?php echo implode( ', ', $short_location ); ?>"><?php echo implode( ', ', $short_location ); ?></span>
                        </div>
                      <?php } ?>
                      </div>
                    </div>

                    <!-- Nav tabs -->
                    <ul id="item-desc-tab" class="nav nav-tabs">
                      <li class="active"><a href="#description" data-toggle="tab"><?php _e( 'Description', 'symnel' ); ?></a></li>
                      <li class="visible-portrait"><a href="#contact-item-seller" data-toggle="tab"><?php _e( 'Contact Seller', 'symnel' ); ?></a></li>
                      <?php if ( !osc_is_web_user_logged_in() || osc_logged_user_id()!=osc_item_user_id() ) { ?>
                      <li><a href="#report" data-toggle="tab"><?php _e( 'Report', 'symnel' ); ?></a></li>
                      <?php } ?>
                    </ul>

                    <!-- Tab panes -->
                    <div class="item-full-details tab-content">
                      <div class="tab-pane active" id="description">
                          <div class="item-entry-content clearfix">
                              <div class="item-entry-price">
                                <p>
                                    <?php if ( osc_price_enabled_at_items() && osc_item_price() != '' ) { ?>
                                        <strong><?php _e( 'Price:', 'symnel' ); ?></strong> <?php printf( '%s', osc_format_price(osc_item_price()) ); ?>
                                    <?php } ?>
                                </p>
                              </div>
                              <div id="custom_fields">
                                  <?php if ( osc_count_item_meta() >= 1 ) { ?>
                                      <br />
                                      <div class="meta_list">
                                          <?php while ( osc_has_item_meta() ) { ?>
                                              <?php if ( osc_item_meta_value()!='' ) { ?>
                                                  <div class="meta">
                                                      <strong><?php echo osc_item_meta_name(); ?>:</strong> <?php echo osc_item_meta_value(); ?>
                                                  </div>
                                              <?php } ?>
                                          <?php } ?>
                                      </div>
                                  <?php } ?>
                              </div>
                              <?php osc_run_hook( 'item_detail', osc_item() ); ?>
                              <?php echo osc_item_description(); ?>
                              <div class="item-entry-category">
                                <strong><?php _e( 'Category:', 'symnel' ); ?></strong> <?php echo osc_item_category(); ?>
                              </div>
                              <?php osc_run_hook( 'after-item-details' ); ?>
                          </div>
                      </div>
                      <div class="tab-pane" id="contact-item-seller">
                          <div class="contact-seller visible-portrait-block">
                              <div id="contact" class="widget-box form-container form-vertical">
                                      <?php if ( osc_item_is_expired () ) { ?>
                                          <p class="alert alert-warning">
                                              <?php _e( "The listing is expired. You can't contact the seller.", 'symnel' ); ?>
                                          </p>
                                      <?php } else if ( ( osc_logged_user_id() == osc_item_user_id() ) && osc_logged_user_id() != 0 ) { ?>
                                          <p class="alert alert-warning">
                                              <?php _e( "It's your own listing, you can't contact the seller.", 'symnel' ); ?>
                                          </p>
                                      <?php } else if ( osc_reg_user_can_contact() && !osc_is_web_user_logged_in() ) { ?>
                                          <p class="alert alert-warning">
                                              <?php _e( "You must log in or register a new account in order to contact the advertiser", 'symnel' ); ?>
                                              <a href="<?php echo osc_user_login_url(); ?>" class="btn btn-default"><?php _e( 'Login', 'symnel' ); ?></a>
                                              <a href="<?php echo osc_register_account_url(); ?>" class="btn btn-danger"><?php _e( 'SignUp', 'symnel' ); ?></a>
                                          </p>
                                      <?php } else { ?>
                                          <h4><?php _e( "Contact {$seller_name} <small>via Email</small>", 'symnel' ); ?></h4>
                                          <form action="<?php echo osc_base_url( true ); ?>" class="form-vertical" method="post" name="contact_form" id="contact_form" <?php if ( osc_item_attachment() ) { echo 'enctype="multipart/form-data"'; };?> >
                                              <?php osc_prepare_user_info(); ?>
                                              <input type="hidden" name="action" value="contact_post" />
                                              <input type="hidden" name="page" value="item" />
                                              <input type="hidden" name="id" value="<?php echo osc_item_id(); ?>" />
                                              <div class="form-group">
                                                  <input id="yourName" type="text" name="yourName" value="" class="form-control" placeholder="Enter your name*">
                                              </div>
                                              <div class="form-group">
                                                  <input id="yourEmail" type="text" name="yourEmail" value="" class="form-control" placeholder="Enter your email*">
                                              </div>
                                              <div class="form-group">
                                                  <input id="phoneNumber" type="text" name="phoneNumber" value="" class="form-control" placeholder="Phone number (optional)">
                                              </div>
                                              <div class="form-group">
                                                  <textarea id="message" name="message" placeholder="Message*" class="form-control"></textarea>
                                              </div>

                                              <?php if ( osc_item_attachment() ) { ?>
                                                  <div class="form-group">
                                                      <label class="form-label" for="attachment"><?php _e( 'Attachment', 'symnel' ); ?>:</label>
                                                      <div class="form-controls"><?php ContactForm::your_attachment(); ?></div>
                                                  </div>
                                              <?php }; ?>

                                              <div class="form-group">
                                                  <div class="form-controls">
                                                      <?php osc_run_hook( 'item_contact_form', osc_item_id() ); ?>
                                                      <button type="submit" class="btn btn-default"><?php _e( "Send", 'symnel' );?></button>
                                                  </div>
                                              </div>
                                          </form>
                                      <?php } ?>
                              </div>
                            </div>
                      </div>
                      <?php if ( !osc_is_web_user_logged_in() || osc_logged_user_id()!=osc_item_user_id() ) { ?>
                      <div class="tab-pane" id="report">
                          <div class="item-entry-report clearfix">
                                <form action="<?php echo osc_base_url( true ); ?>" class="clearfix" method="post" name="mask_as_form" id="mask_as_form">
                                    <input type="hidden" name="id" value="<?php echo osc_item_id(); ?>" />
                                    <input type="hidden" name="as" value="spam" />
                                    <input type="hidden" name="action" value="mark" />
                                    <input type="hidden" name="page" value="item" />
                                    <h4 class="report-heading"><?php _e( "What is the issue?*", 'symnel' ); ?></h4>
                                    <ul class="report-list">
                                        <li>
                                            <input id="rl-spam" type="radio" name="as" value="spam" />
                                            <label for="rl-spam"><?php _e( "Spam", 'symnel' ); ?></label>
                                        </li>
                                        <li>
                                            <input id="rl-badcat" type="radio" name="as" value="badcat" />
                                            <label for="rl-badcat"><?php _e( "Misclassified or wrong category", 'symnel' ); ?></label>
                                        </li>
                                        <li>
                                            <input id="rl-repeated" type="radio" name="as" value="repeated" />
                                            <label for="rl-repeated"><?php _e( "Duplicated", 'symnel' ); ?></label>
                                        </li>
                                        <li>
                                            <input id="rl-expired" type="radio" name="as" value="expired" />
                                            <label for="rl-expired"><?php _e( "Expired", 'symnel' ); ?></label>
                                        </li>
                                        <li>
                                            <input id="rl-offensive" type="radio" name="as" value="offensive" />
                                            <label for="rl-offensive"><?php _e( "Offensive content", 'symnel' ); ?></label>
                                        </li>
                                    </ul>
                                    <p class="report-note">
                                        <?php _e( 'Flagged listings and users are reviewed by our staff 24 hours a day, seven days a week to determine whether they violate our Post guidelines. Accounts are penalized for Post Guidelines violations and serious or repeated violations can lead to account termination.', 'symnel' ); ?>
                                    </p>
                                    <input type="submit" name="submit" value="Send Report" class="btn btn-default" />
                                </form>
                          </div>
                      </div><!-- #report -->
                      <?php } ?>

                    </div>

                    <?php osc_current_web_theme_path( 'comments.php' ); ?>

                </div><!-- .item-image-preview -->

                <div class="item-minor-details col-md-4">

                    <?php if ( osc_images_enabled_at_items() ) { ?>
                        <?php if ( osc_count_item_resources() > 0 ) { $i = 0; ?>
                        <div id="desktop-slideshow-thumb">
                          <div id="item-thumbs" class="item-image-navigation">
                              <div id="controls" class="controls"></div>
                              <ul class="thumbs noscript">
                                <?php for ( $i = 0; osc_has_item_resources(); $i++ ) { ?>
                                    <li>
                                        <a class="thumb" href="<?php echo osc_resource_url(); ?>" title="<?php _e( 'image', 'symnel' ); ?><?php echo osc_count_item_resources();?>">
                                            <img itemprop="image" src="<?php echo osc_resource_thumbnail_url(); ?>" alt="<?php _e( 'image', 'symnel' ); ?><?php echo osc_count_item_resources();?>" class="lazy" />
                                        </a>
                                    </li>
                                  <?php } ?>
                              </ul>
                          </div>
                        </div>
                        <?php } ?>
                    <?php } ?>

                    <div class="hidden-portrait">
                      <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                        <?php if ( osc_price_enabled_at_items() && osc_item_price() != '' ) { ?>
                          <strong class="price" itemprop="price"><?php printf( '%s', osc_format_price(osc_item_price()) ); ?></strong>
                        <?php } else { ?>
                          <strong class="price"><?php _e( 'Ask seller for price', 'symnel' ); ?></strong>
                        <?php } ?>
                      </div>
                      <div class="date">
                          <?php if ( osc_item_pub_date() !== '' ) { printf( __( '<span class="publish">Published on <time>%1$s</time></span>', 'symnel' ), osc_format_date( osc_item_pub_date() ) ); } ?>
                      </div>
                      <?php if( osc_user_phone() !== '' ) { ?>
                      <div class="contact-number">
                          <span class="btn btn-warning"><i class="glyphicon glyphicon-phone"></i> <?php echo osc_user_phone(); ?></span>
                      </div>
                      <?php } ?>
                      <?php
                        $short_location = array_filter( $short_location );
                        if ( !empty($short_location) ) { ?>
                        <div class="item-location">
                            <span title="<?php echo implode( ', ', $short_location ); ?>"><?php echo implode( ', ', $short_location ); ?></span>
                        </div>
                      <?php } ?>
                    </div>

                    <?php osc_current_web_theme_path( 'contact-seller.php' ); ?>
                    <?php osc_current_web_theme_path( 'useful-info.php' ); ?>
                    <?php osc_current_web_theme_path( 'side-widgets-item.php' ); ?>

                </div><!-- .item-minor-details -->

              </div>
            </div>

        </div><!-- .item-content -->
    </div><!-- .form-block -->

  </div><!-- .row -->
</div><!-- .container -->

<?php osc_current_web_theme_path( 'footer-item.php' ); ?>
<?php osc_current_web_theme_path( 'footer.php' ); ?>
