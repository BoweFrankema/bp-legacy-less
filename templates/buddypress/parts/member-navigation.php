   
<div id="profile-sidebar" class="widget">
	<div id="item-header-avatar">
		<a href="<?php bp_user_link(); ?>"><?php bp_displayed_user_avatar( 'type=full' ); ?></a>
	</div><!-- #item-header-avatar -->
	
        <?php /* Show Quick Menu for own Profile page */ if ( bp_is_my_profile() ) : ?>
                    <div id="profile-quick-menu">
                        <?php $userLink = bp_get_loggedin_user_link();?>
                        <select name="forma" onchange="location = this.options[this.selectedIndex].value;">

                        <optgroup label="Quick Links">
                            <option value="<?php echo $userLink; ?>profile/edit">Edit Profile</option>
                            <option value="<?php echo $userLink; ?>profile/change-avatar">Change Avatar</option>
                        </optgroup>
                        <optgroup label="Settings">
                            <option value="<?php echo $userLink; ?>settings">Email/Password settings</option>
                            <option value="<?php echo wp_logout_url( wp_guess_url() ); ?>">Log Out</option>
                        </optgroup>

                          </select>
                    </div>  
        <?php endif; ?>


</div>
<!-- Profile Tabs -->
<div class="sidebar-activity-tabs no-ajax item-list-tabs vertical-list-tabs widget" role="navigation">
	<ul class="sidebar-nav">
		<?php bp_get_displayed_user_nav(); ?>
	</ul>
</div>	
