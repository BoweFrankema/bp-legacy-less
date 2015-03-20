<?php  if ( function_exists( 'bp_is_member' ) ):  ?>
<ul id="bp-user-navigation" class="nav navbar-nav navbar-right"> 

<?php if ( is_user_logged_in() ): ?>

		<?php cf_notifications_buddybar_menu(); ?>

	<li id="bp-profile-menu" class="dropdown menu-groups">
		<a href="/menu/" data-target="#" data-toggle="dropdown" class="dropdown-toggle"><?php echo bp_loggedin_user_avatar( 'type=thumb&width=70&height=70' ); ?><span class="visible-xs"><?php echo bp_core_get_user_displayname( bp_loggedin_user_id() );?></span></a>

			<?php cf_adminbar_account_menu(); ?>
	</li>



<?php else: ?>
	<li class="menu-register">
		<a href="http://nl.cfcommunity.net/lid-worden/"><i class="fa fa-user"></i> <?php _e('Register', 'roots'); ?>	</a>
	</li>
<li class="dropdown menu-groups">
		<a href="/menu/" data-target="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-sign-in"></i> <?php _e('Log In', 'roots'); ?>	</a>
		<ul class="dropdown-menu">
		<li>
			<?php wp_login_form();?>

			<div id="facebook-login">
				<?php jfb_output_facebook_btn(); ?>
			</div>	

		</li>
		</ul>
</li>
		 
<?php endif; ?>
</ul>
<?php endif; ?>
