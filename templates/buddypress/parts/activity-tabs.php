<div id="vertical-activity-tabs" class="activity-type-tabs item-list-tabs widget vertical-list-tabs" role="navigation">

<?php if ( is_user_logged_in() ) : ?>
	<div id="user-sidebar-menu">
		<?php bp_loggedin_user_avatar( 'width=' . bp_core_avatar_thumb_width() . '&height=' . bp_core_avatar_thumb_height() ); ?>
			 <?php $userLink = bp_get_loggedin_user_link();?>
			 <?php echo bp_core_get_user_displayname( bp_loggedin_user_id() );?><br>
			<a class="no-ajax" href="<?php echo $userLink; ?>"><?php _e('View Profile.', 'roots'); ?>	</a>
	</div><!-- #item-header-avatar -->
<?php endif; ?>

	<ul>
		<?php do_action( 'bp_before_activity_type_tab_all' ); ?>

		<?php if ( is_user_logged_in() ) : ?>

			<?php do_action( 'bp_before_activity_type_tab_friends' ) ?>

			<?php if ( bp_is_active( 'friends' ) ) : ?>

				<?php if ( bp_get_total_friend_count( bp_loggedin_user_id() ) ) : ?>

					<li class="selected active" id="activity-friends"><a href="<?php echo bp_loggedin_user_domain() . bp_get_activity_slug() . '/' . bp_get_friends_slug() . '/'; ?>" title="<?php _e( 'The activity of my friends only.', 'buddypress' ); ?>"><?php printf( __( 'My Friends <span>%s</span>', 'buddypress' ), bp_get_total_friend_count( bp_loggedin_user_id() ) ); ?></a></li>

				<?php endif; ?>

			<?php endif; ?>


			<li id="activity-all"><a href="<?php echo bp_loggedin_user_domain() . bp_get_activity_slug() . '/'; ?>" title="<?php _e( 'The public activity for everyone on this site.', 'buddypress' ); ?>"><?php printf( __( 'All Members <span>%s</span>', 'buddypress' ), bp_get_total_site_member_count() ); ?></a>
			</li>

			<?php do_action( 'bp_before_activity_type_tab_groups' ) ?>


			<?php do_action( 'bp_before_activity_type_tab_favorites' ); ?>

			<?php if ( bp_get_total_favorite_count_for_user( bp_loggedin_user_id() ) ) : ?>

				<li id="activity-favorites"><a href="<?php echo bp_loggedin_user_domain() . bp_get_activity_slug() . '/favorites/'; ?>" title="<?php _e( "The activity I've marked as a favorite.", 'buddypress' ); ?>"><?php printf( __( 'My Favorites <span>%s</span>', 'buddypress' ), bp_get_total_favorite_count_for_user( bp_loggedin_user_id() ) ); ?></a></li>

			<?php endif; ?>

			<?php do_action( 'bp_before_activity_type_tab_mentions' ); ?>

			<li id="activity-mentions"><a href="<?php echo bp_loggedin_user_domain() . bp_get_activity_slug() . '/mentions/'; ?>" title="<?php _e( 'Activity that I have been mentioned in.', 'buddypress' ); ?>"><?php _e( 'Mentions', 'buddypress' ); ?><?php if ( bp_get_total_mention_count_for_user( bp_loggedin_user_id() ) ) : ?> <strong><?php printf( __( '<span>%s new</span>', 'buddypress' ), bp_get_total_mention_count_for_user( bp_loggedin_user_id() ) ); ?></strong><?php endif; ?></a></li>

		<?php endif; ?>


	<li id="activity-group-divider">Your Groups <a href="http://cfcommunity.net/members/cfcommunity/groups/">Manage</a></li>

	<?php if ( bp_is_active( 'groups' ) ) : ?>

				<?php if ( bp_get_total_group_count_for_user( bp_loggedin_user_id() ) ) : ?>

					<li id="activity-groups"><a href="<?php echo bp_loggedin_user_domain() . bp_get_activity_slug() . '/' . bp_get_groups_slug() . '/'; ?>" title="<?php _e( 'The activity of groups I am a member of.', 'buddypress' ); ?>"><?php printf( __( 'All Groups <span>%s</span>', 'buddypress' ), bp_get_total_group_count_for_user( bp_loggedin_user_id() ) ); ?></a></li>

				<?php endif; ?>

			<?php endif; ?>

		<?php do_action( 'bp_activity_type_tabs' ); ?>

	</ul>
</div><!-- .item-list-tabs -->