<?php
/**
 * @package    Osclass
 * @author     DopeThemes <hello@dopethemes.com>
 * @copyright  Copyright (c) DopeThemes 2014
 * @license    http://www.dopethemes.com/license/osclass
 * @link       http://www.dopethemes.com/
 */
?>
      <!-- Sidebar -->
      <nav class="navbar navbar-fixed-top" role="navigation">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header dopenavbar-header">
          <button type="button" class="navbar-toggle dopenavbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only"><?php _e("Toggle navigation", 'symnel') ; ?></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand dopenavbar-brand" href="<?php echo osc_base_url(); ?>"><?php echo osc_page_title(); ?></a>
        </div>

        <?php if(osc_is_web_user_logged_in()) { ?>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse dopenavbar-backend">
          <?php echo dtf_sidebar_private_user_menu( get_backend_sidebar_menu(), dtf_user_current_section(), true ); ?>
          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user"></i> <?php echo osc_logged_user_name(); ?> <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a href="<?php echo osc_user_dashboard_url(); ?>"><i class="fa fa-dashboard"></i>
                    <?php _e("Ad Perfomance", 'symnel') ; ?>
                  </a>
                </li>
                <li>
                  <a href="<?php echo osc_user_public_profile_url( osc_logged_user_id() ); ?>"><i class="fa fa-globe"></i>
                    <?php _e("Public Profile", 'symnel') ; ?>
                  </a>
                </li>
                <li>
                  <a href="<?php echo osc_user_list_items_url(); ?>"><i class="fa fa-list"></i>
                    <?php _e( 'Manage Your Ads', 'symnel' ); ?>
                  </a>
                </li>
                <li>
                  <a href="<?php echo osc_user_profile_url(); ?>"><i class="fa fa-gear"></i>
                    <?php _e("Account Settings", 'symnel') ; ?>
                  </a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="<?php echo osc_user_logout_url(); ?>"><i class="fa fa-sign-out"></i>
                    <?php _e("Log Out", 'symnel') ; ?>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
        <?php } else { ?>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse dopenavbar-backend">
          <ul class="nav navbar-nav side-nav">
            <li>
                <?php echo dtf_inner_search(); ?>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
            <li>
              <a href="<?php echo osc_user_login_url(); ?>"><?php _e( "Login", 'symnel' ); ?></a>
            </li>
            <li class="active">
              <a href="<?php echo osc_item_post_url_in_category(); ?>"><span class="fa fa-plus"></span>
                <?php _e( "Post New Ads", 'symnel' ) ; ?>
              </a>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
        <?php }?>
      </nav>
