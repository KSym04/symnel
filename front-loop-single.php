<?php
/**
 * Symnel Front Loop Single
 *
 * @package Osclass
 * @subpackage Symnel
 * @since Symnel 1.0
 */
?>

<li itemscope itemtype="http://schema.org/Product" class="listing-card clearfix <?php echo $class; if ( osc_item_is_premium() ) { echo ' premium'; } ?>">
    <?php if ( osc_images_enabled_at_items() ) { ?>
        <?php if ( osc_count_item_resources() ) { ?>
            <a class="listing-thumb" href="<?php echo osc_item_url() ; ?>" title="<?php echo osc_item_title() ; ?>">
                <img src="<?php echo osc_resource_thumbnail_url(); ?>" title="<?php echo osc_item_title() ; ?>" itemprop="image" alt="<?php echo osc_item_title() ; ?>" class="hidden-smscreen-mobile lazy">
                <img src="<?php echo osc_resource_preview_url(); ?>" title="<?php echo osc_item_title() ; ?>" itemprop="image" alt="<?php echo osc_item_title() ; ?>" class="visible-smscreen-mobile lazy">
            </a>
        <?php } else { ?>
            <a class="listing-thumb" href="<?php echo osc_item_url() ; ?>" title="<?php echo osc_item_title() ; ?>">
                <img src="<?php echo osc_current_web_theme_url( 'assets/img/no_photo.gif' ); ?>" title="" alt="<?php echo osc_item_title() ; ?>" class="lazy" width="110px" height="auto">
            </a>
        <?php } ?>
    <?php } ?>
    <div class="listing-detail">
        <div class="listing-cell">
            <div class="listing-data">
                <div class="listing-basicinfo">

                    <a itemprop="name" href="<?php echo osc_item_url() ; ?>" class="title" title="<?php echo osc_item_title() ; ?>"><?php echo osc_item_title() ; ?></a>

                    <div class="listing-attributes">
                        <time class="timeago" datetime="<?php echo date( DATE_ISO8601, strtotime( osc_item_pub_date() ) ); ?>"><?php echo osc_format_date( osc_item_pub_date() ); ?></time>
                        <span class="by"><?php _e( 'by', 'symnel' ); ?></span>
                        <span class="seller">
                            <?php
                              $seller_username = dtf_get_username( osc_item_user_id() );
                              if( is_numeric( $seller_username ) ) { ?>
                                <a href="<?php echo osc_user_public_profile_url( osc_item_user_id() ); ?>">
                                    <?php echo osc_item_contact_name(); ?>
                                </a>
                            <?php
                              } else { ?>
                                <?php if ( $seller_username != '' ) { ?>
                                    <a href="<?php echo osc_user_public_profile_url( osc_item_user_id() ); ?>">
                                        <?php echo $seller_username; ?>
                                    </a>
                                <?php } else { ?>
                                    <?php _e( 'Guest Seller', 'symnel' ); ?>
                                <?php } ?>
                            <?php
                              }
                            ?>
                        </span>
                    </div><!-- .listing-attributes -->

                    <p class="listing-excerpt"><?php echo osc_highlight( strip_tags( osc_item_description() ) , 250 ); ?></p>

                    <div itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="listing-attributes">
                        <?php if ( osc_price_enabled_at_items() ) { ?>
                            <span class="currency-value" itemprop="price">
                                <?php echo osc_format_price(osc_item_price()); ?>
                            </span>
                        <?php } else { ?>
                            <span class="currency-value"><?php _e( 'Ask seller for price', 'symnel' ); ?></span>
                        <?php } ?>
                        <span class="divider">&middot;</span>
                        <span class="category">
                            <a href="<?php echo dtf_breadcrumbs_category_url( osc_item_category_id() ); ?>"><?php echo osc_item_category(); ?></a>
                        </span>
                    </div><!-- .listing-attributes -->

                    <div class="more-options btn-group btn-group-xs pull-right">
                      <a href="<?php echo osc_item_url() ; ?>" class="btn btn-default"><?php _e( 'View', 'symnel' ); ?></a>
                      <?php if ( osc_is_web_user_logged_in() && osc_logged_user_id() == osc_item_user_id() ) { ?>
                        <a href="<?php echo osc_item_edit_url(); ?>" rel="nofollow" class="btn btn-default"><?php _e( 'Edit', 'symnel' ); ?></a>
                        </span>
                      <?php } ?>
                    </div><!-- .more-options -->

                </div><!-- .listing-basicinfo -->
            </div><!-- .listing-data -->
        </div><!-- .listing-cell -->
    </div><!-- .listing-detail -->
</li>
