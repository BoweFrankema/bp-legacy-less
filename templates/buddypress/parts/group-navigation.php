<div id="group-navigation" class="widget"> 
        <div id="item-header-avatar">
          <?php bp_group_avatar() ?>
        </div>
</div>     
<div class="sidebar-activity-tabs no-ajax item-list-tabs vertical-list-tabs widget" role="navigation">
	<ul class="sidebar-nav">
		<?php bp_get_options_nav(); ?>
		<?php do_action( 'bp_group_options_nav' ); ?>
	</ul>
</div>
