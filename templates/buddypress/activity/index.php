<?php do_action( 'bp_before_directory_activity' ); ?>

<div id="buddypress">

	<?php if ( ! wp_is_mobile() ) : ?>
		<?php get_template_part( 'buddypress/parts/activity-dropdown' ); ?>
	<?php endif; ?>

	<?php do_action( 'bp_before_directory_activity_content' ); ?>

	<?php if ( is_user_logged_in() ) : ?>

		<?php bp_get_template_part( 'activity/post-form' ); ?>

	<?php endif; ?>

	<?php do_action( 'template_notices' ); ?>


	<?php do_action( 'bp_before_directory_activity_list' ); ?>

	<div class="activity" role="main">

		<?php //if ( wp_is_mobile() ) : ?>
			<?php get_template_part( 'buddypress/parts/activity-dropdown' ); ?>
		<?php //endif; ?>

		<?php bp_get_template_part( 'activity/activity-loop' ); ?>

	</div><!-- .activity -->

	<?php do_action( 'bp_after_directory_activity_list' ); ?>

	<?php do_action( 'bp_directory_activity_content' ); ?>

	<?php do_action( 'bp_after_directory_activity_content' ); ?>

	<?php do_action( 'bp_after_directory_activity' ); ?>

</div>
