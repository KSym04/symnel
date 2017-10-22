<?php
/**
 * Symnel Comments
 *
 * @package Osclass
 * @subpackage Symnel
 * @since Symnel 1.0
 */

if ( function_exists( 'dope_comments' ) ) { ?>

<?php } else { // load Osclass default comment system ?>

<?php if ( osc_comments_enabled()  ) { ?>
    <?php if ( osc_reg_user_post_comments () && osc_is_web_user_logged_in() || !osc_reg_user_post_comments() ) { ?>
    <div id="comments">
        <?php if ( osc_count_item_comments() > 1 ) { ?>
            <h4 class="comment-heading"><?php _e( 'All Comments', 'symnel' ); ?> (<?php echo osc_count_item_comments(); ?>)</h4>
        <?php } ?>
        <?php if ( osc_count_item_comments() == 1 ) { ?>
            <h4 class="comment-heading"><?php _e( 'All Comment', 'symnel' ); ?> (<?php echo osc_count_item_comments(); ?>)</h4>
        <?php } ?>
        <?php if ( osc_count_item_comments() >= 1 ) { ?>
            <div class="comments_list">
                <?php while ( osc_has_item_comments() ) { ?>
                    <div class="comment-box clearfix">
                        <span class="comment-user clearfix">
                            <?php if ( osc_comment_author_name() != '' ) { ?>
                                <?php echo osc_comment_author_name(); ?>
                            <?php } else { _e( 'Guest', 'symnel' ); } ?>
                            <time class="comment-date timeago" datetime="<?php echo date( DATE_ISO8601, strtotime( osc_comment_pub_date() ) ); ?>">
                                <?php echo osc_comment_pub_date(); ?>
                            </time>
                            <?php if ( osc_comment_user_id() && ( osc_comment_user_id() == osc_logged_user_id() ) ) { ?>
                            <span class="comment-delete pull-right">
                                <a rel="nofollow" href="<?php echo osc_delete_comment_url(); ?>" title="<?php _e( 'Delete your comment', 'symnel' ); ?>">
                                    <?php _e( 'Delete', 'symnel' ); ?>
                                </a>
                            </span>
                            <?php } ?>
                        </span>
                        <?php if ( osc_comment_title() != '' ) { ?>
                            <span class="comment-title"><?php echo osc_comment_title(); ?></span>
                        <?php } ?>
                        <p class="comment-content"><?php echo nl2br( osc_comment_body() ); ?></p>
                    </div>
                <?php } ?>
                <div class="paginate">
                    <?php echo osc_comments_pagination(); ?>
                </div>
             </div>
        <?php } ?>
        <div class="resp-wrapper">
            <form action="<?php echo osc_base_url( true ); ?>" method="post" name="comment_form" id="comment_form" class="symnel-form form-horizontal">
                    <h4><?php _e( 'Leave your comment (spam and offensive messages will be removed)', 'symnel' ); ?></h4>
                    <input type="hidden" name="action" value="add_comment" />
                    <input type="hidden" name="page" value="item" />
                    <input type="hidden" name="id" value="<?php echo osc_item_id(); ?>" />
                    <?php if ( osc_is_web_user_logged_in() ) { ?>
                        <input type="hidden" name="authorName" value="<?php echo osc_esc_html( osc_logged_user_name() ); ?>" />
                        <input type="hidden" name="authorEmail" value="<?php echo osc_logged_user_email();?>" />
                    <?php } else { ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="authorName"><?php _e( 'Your Name', 'symnel' ); ?></label>
                            <div class="col-sm-9">
                                <input id="authorName" type="text" name="authorName" value="" class="form-control" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="authorEmail"><?php _e( 'Your Email', 'symnel' ); ?></label>
                            <div class="col-sm-9">
                                <input id="authorEmail" type="text" name="authorEmail" value="" class="form-control" autocomplete="off">
                            </div>
                        </div>
                    <?php }; ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="title"><?php _e( 'Title', 'symnel' ); ?></label>
                        <div class="col-sm-9">
                            <input id="title" type="text" name="title" value="" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="body"><?php _e( 'Comment', 'symnel' ); ?></label>
                        <div class="col-sm-9 textarea">
                            <textarea id="body" name="body" class="form-control" autocomplete="off"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-default"><?php _e( 'Post', 'symnel' ); ?></button>
                      </div>
                    </div>
            </form>
        </div>
    </div>
    <?php } ?>
<?php } ?>

<?php } // end comments ?>
