<ul id="dropdown-filter">
	<?php do_action( 'bp_activity_syndication_options' ); ?>

	<li id="activity-filter-select" class="last">
		<label for="activity-filter-by"><?php _e( 'Show:', 'buddypress' ); ?></label>
		<select id="activity-filter-by">
			<option value="-1"><?php _e( 'Everything', 'buddypress' ); ?></option>
			<option value="activity_update"><?php _e( 'Updates', 'buddypress' ); ?></option>

			<?php if ( bp_is_active( 'blogs' ) ) : ?>

				<option value="new_blog_post"><?php _e( 'Posts', 'buddypress' ); ?></option>
				<option value="new_blog_comment"><?php _e( 'Comments', 'buddypress' ); ?></option>

			<?php endif; ?>

			<?php if ( bp_is_active( 'forums' ) ) : ?>

				<option value="new_forum_topic"><?php _e( 'Forum Topics', 'buddypress' ); ?></option>
				<option value="new_forum_post"><?php _e( 'Forum Replies', 'buddypress' ); ?></option>

			<?php endif; ?>

			<?php if ( bp_is_active( 'groups' ) ) : ?>

				<option value="created_group"><?php _e( 'New Groups', 'buddypress' ); ?></option>
				<option value="joined_group"><?php _e( 'Group Memberships', 'buddypress' ); ?></option>

			<?php endif; ?>

			<?php if ( bp_is_active( 'friends' ) ) : ?>

				<option value="friendship_accepted,friendship_created"><?php _e( 'Friendships', 'buddypress' ); ?></option>

			<?php endif; ?>

			<option value="new_member"><?php _e( 'New Members', 'buddypress' ); ?></option>

			<?php do_action( 'bp_activity_filter_options' ); ?>

		</select>
	</li>
</ul>