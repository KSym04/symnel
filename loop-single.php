<?php
/**
 * Symnel Loop Single
 *
 * @package Osclass
 * @subpackage Symnel
 * @since Symnel 1.0
 */
$size = explode( 'x', osc_thumbnail_dimensions() ); ?>
<tr class="<?php echo $class; if ( osc_item_is_premium() ) { echo ' premium'; } ?>">
  <td>
    <div class="media">
      <?php if ( osc_images_enabled_at_items() ) { ?>
        <?php if ( osc_count_item_resources() ) { ?>
          <a class="listing-thumb pull-left" href="<?php echo osc_item_url() ; ?>" title="<?php echo osc_item_title(); ?>">
            <img src="<?php echo osc_resource_thumbnail_url(); ?>" title="<?php echo osc_item_title(); ?>" alt="<?php echo osc_item_title() ; ?>" height="auto" class="lazy" />
          </a>
        <?php } else { ?>
          <a class="listing-thumb pull-left" href="<?php echo osc_item_url() ; ?>" title="<?php echo osc_item_title() ; ?>"><img src="<?php echo osc_current_web_theme_url( 'assets/img/no_photo.gif' ); ?>" title="<?php echo osc_item_title() ; ?>" alt="<?php echo osc_item_title() ; ?>"  width="96px" height="auto" class="lazy" /></a>
        <?php } ?>
      <?php } ?>
      <div class="media-body">
        <h5 class="media-heading">
          <a href="<?php echo osc_item_url() ; ?>" title="<?php echo osc_item_title() ; ?>"><?php echo osc_item_title() ; ?></a>
        </h5>
        <p class="media-category"><?php echo osc_item_category(); ?></p>
        <div class="media-options">
          <ul>
            <li class="first">
              <a href="<?php echo osc_item_url() ; ?>"><?php _e('View', 'symnel'); ?></a>
            </li>
            <li>
              <a href="<?php echo osc_item_edit_url(); ?>" rel="nofollow"><?php _e('Edit', 'symnel'); ?></a>
            </li>
            <li class="last">
              <a onclick="javascript:return confirm('<?php echo osc_esc_js( __( 'This action can not be undone. Are you sure you want to continue?', 'symnel' ) ); ?>')" href="<?php echo osc_item_delete_url();?>">
                <?php _e('Delete', 'symnel'); ?>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </td>
  <?php if ( osc_price_enabled_at_items() ) { ?>
  <td class="listing-price">
    <span class="currency-value"><?php printf( '%s', osc_format_price( osc_item_price() ) ); ?></span>
  </td>
  <?php } ?>
  <td class="listing-views">
    <?php echo osc_item_views(); ?>
  </td>
  <td class="listing-published-date">
    <?php echo osc_format_date( osc_item_pub_date() ); ?>
  </td>
  <td class="listing-expiration-date">
    <?php if( strtotime( osc_item_dt_expiration() ) == '' ) {
      echo __( 'Non-expiry Ad', 'symnel' );
    } else {
      echo osc_format_date( osc_item_dt_expiration() );
    }
    ?>
  </td>
</tr>
