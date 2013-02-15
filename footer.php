<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package www2
 * @since www2 1.0
 */
global $theme_options;
?>
<nav role="navigation" class="site-navigation main-navigation">
  <div class="container">
    <?php wp_nav_menu( array(
      'theme_location'  => 'primary',
      'menu_class'      => 'menu nav  main-nav',
      'menu_id'         => 'main-nav-bottom',
      'depth'           => 1,
      'fallback_cb'     => false,
    ) ); ?>
  </div><!-- .container -->
</nav><!-- .site-navigation .main-navigation -->
<footer id="colophon" class="site-footer" role="contentinfo">
  <div class="container">
    <?php wp_nav_menu( array(
      'theme_location'  => 'sitemap',
      'menu_class'      => 'menu site-map cf',
      'menu_id'         => 'main-nav-bottom',
      'fallback_cb'     => false,
    ) ); ?>
    <div class="island outer media media-links-wrapper">
      <?php 
      $footer_logo_href = $theme_options['footer_logo_href'] ?: '#';
      $footer_logo = $theme_options['footer_logo'];
      $footer_logo_retina = $theme_options['footer_logo_retina'];

      if(!empty($footer_logo)) { ?>
        <a class="media__img" href="<?php echo $footer_logo_href; ?>">
          <img src="<?php echo $footer_logo; ?>" <? if($footer_logo_retina) { echo 'data-retina="'.$footer_logo_retina.'"'; } ?> />
        </a><?php
      }
      wp_nav_menu( array(
        'theme_location'  => 'footer',
        'menu_class'      => 'menu nav nav--fit site-media-links',
        'menu_id'         => 'site-media-links',
        'fallback_cb'     => false,
        'container_class' => 'media__body middle',
      ) ); ?>
    </div><!-- .site-media-links -->
    <?php wp_nav_menu( array(
      'theme_location'  => 'subfooter',
      'menu_class'      => 'menu nav site-admin-links micro',
      'menu_id'         => 'site-admin-links',
      'container_class' => false,
      'fallback_cb'     => false,
    ) ); ?>
    <div class="site-credits micro">
      <?php echo $theme_options['credits']; ?>
    </div><!-- .site-info -->
  </div><!-- .container -->
</footer><!-- #colophon .site-footer -->
<?php wp_footer(); ?>
</body>
</html>