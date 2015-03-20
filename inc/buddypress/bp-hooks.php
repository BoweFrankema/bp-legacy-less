
<?php
// Groups
function cf_group_intro() { { ?>
    <?php if ( ! is_mobile_device() ): ?>
    <div class="intro intro-img">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/cf-community-groups.jpg" alt="cc-license" title="cc-license" />
    </div>
    <?php endif; ?>
<?php }}
add_action('bp_before_directory_groups','cf_group_intro');

function cf_group_creation_intro() { { ?>
	<div class="intro">
		<?php _e('This is an explanation for the create groups functionality', 'roots'); ?>
	</div>
<?php }}
add_action('bp_before_group_details_creation_step','cf_group_creation_intro');

// Members
function cf_member_intro() { { ?>
    <div class="intro intro-img">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/cf-community-blogs.jpg" alt="cc-license" title="cc-license" />
    </div>
<?php }}
add_action('bp_before_directory_blogs_content','cf_member_intro');
?>