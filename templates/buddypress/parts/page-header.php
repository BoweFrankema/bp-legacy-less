<?php if (bp_is_user() ): ?>
  <div class="profile-header">
  	<div class="cover-image">

          <?php if ( rtmedia_get_featured() == NULL && bp_is_my_profile() )  : ?>

          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/no-cover-bg.jpg"/>

          <?php elseif ( rtmedia_get_featured() == NULL ): ?>

         <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/cover-bg.jpg"/>

        <?php else: ?>

        <?php rtmedia_featured(); ?>

          <?php endif;?>

  	</div>

  <?php if ( wp_is_mobile() ) : ?>
        <button type="button" class="navbar-toggle navbar-toggle-left" data-toggle="offcanvas">
        <span class="sr-only">Toggle Sidebar</span>
          <i class="fa fa-bars"></i>More about <?php bp_displayed_user_username(); ?>
      </button>
  <div class="mobile-avatar">
      <?php bp_displayed_user_avatar( 'type=full' ); ?>
  </div>
  <?php endif;?>

</div>
<?php endif; ?>

<?php if (bp_is_group() ): ?>
  <div class="profile-header">
    <div class="cover-image">
          <?php if ( rtmedia_get_featured() == NULL ) : ?>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/cover-bg.jpg"/>
          <?php else: ?>
                <?php rtmedia_featured(); ?>
          <?php endif;?>
    </div>


  <?php if ( wp_is_mobile() ) : ?>
        <button type="button" class="navbar-toggle navbar-toggle-left" data-toggle="offcanvas">
        <span class="sr-only">Toggle Sidebar</span>
          <i class="fa fa-bars"></i>Group Navigation
      </button>
  <div class="mobile-avatar">
       <?php bp_group_avatar() ?>
  </div>
  <?php endif;?>

</div>
<?php endif; ?>


<div class="page-header">
  <h1>
    <span><?php the_title(); ?></span>
  </h1>
</div>

