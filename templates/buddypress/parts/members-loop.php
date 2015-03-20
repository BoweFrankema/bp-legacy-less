<?php

/**
 * BuddyPress - Members Loop
 *
 * Querystring is set via AJAX in _inc/ajax.php - bp_legacy_theme_object_filter()
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>

<?php do_action( 'bp_before_members_loop' ); ?>

<?php if ( bp_has_members( 'type=random&max=24&per_page=24' ) ) : ?>



	<?php do_action( 'bp_before_directory_members_list' ); ?>

	<div id="members-list" class="avatar-block" role="main">

	<?php while ( bp_members() ) : bp_the_member(); ?>

			<div class="item-avatar">
					<a href="http://cfcommunity.net/become-a-member">
					<?php bp_member_avatar( 'type=thumb&height=70&width=70' ); ?>
					</a>
			</div>

	<?php endwhile; ?>



	</div>

	<?php do_action( 'bp_after_directory_members_list' ); ?>

	<?php bp_member_hidden_fields(); ?>


<?php else: ?>

	<div id="message" class="info">
		<p><?php _e( "Sorry, no members were found.", 'buddypress' ); ?></p>
	</div>

<?php endif; ?>

<?php do_action( 'bp_after_members_loop' ); ?>
