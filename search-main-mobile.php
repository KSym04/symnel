<?php
/**
 * Symnel Main Search (Mobile)
 *
 * @package Osclass
 * @subpackage Symnel
 * @since Symnel 1.0
 */
?>
<form id="main_search_form2" name="main_search_form2" action="<?php echo osc_base_url( true ); ?>" method="get" class="search search-mobile nocsrf">
  <input id="sPattern" name="sPattern" type="text" class="form-control" autocomplete="off" value="<?php echo osc_esc_html(osc_search_pattern()); ?>" placeholder="<?php echo osc_esc_html(__(osc_get_preference('keyword_placeholder', 'symnel_theme'), 'symnel')); ?>" />
  <input type="hidden" name="page" value="search"/>
  <?php osc_categories_select( 'sCategory', null, __( 'Category', 'symnel' ) ) ; ?>
  <input type="submit" name="search" class="btn btn-danger" tabindex="-1" value="<?php _e( 'GO SEARCH ITEM', 'symnel' ); ?>" />
</form>
