<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close fui-cross" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title"><?php _e( 'Please login below', 'cf' ); ?></h4>
      </div>
      <div class="modal-body">
          <form name="login-form" id="sidebar-login-form" class="standard-form" role="form" action="<?php echo site_url( 'wp-login.php', 'login_post' ); ?>" method="post">
           <div class="form-group">
              <label><?php _e( 'Username', 'buddypress' ); ?><br />
              <input type="text" name="log" placeholder="<?php _e( 'Your username', 'cf' ); ?>" id="sidebar-user-login" class="input form-control" value="<?php if ( isset( $user_login) ) echo esc_attr(stripslashes($user_login)); ?>" tabindex="97" /></label>
          </div>
          <div class="form-group">
              <label><?php _e( 'Password', 'buddypress' ); ?><br />
              <input type="password" name="pwd" id="sidebar-user-pass" placeholder="Your Password" class="input form-control" value="" tabindex="98" /></label>

              <p class="forgetmenot"><label><input name="rememberme" type="checkbox" id="sidebar-rememberme" value="forever" tabindex="99" /> <?php _e( 'Remember Me', 'buddypress' ); ?></label></p>
          </div>
            </form>
      </div>

      <div class="modal-footer">
          <input type="submit" name="wp-submit" id="sidebar-wp-submit" value="<?php _e( 'Log In', 'buddypress' ); ?>" tabindex="100" />

          <?php do_action( 'bp_sidebar_login_form' ); ?>

          <input type="hidden" name="testcookie" value="1" />
      </div>
      </div>
  </div>        
</div>