<?php
$copyright = get_field('copyright', 'option');
$linkedin = get_field('linkedin', 'option');
?>


<footer class="footer" role="contentinfo">
  <div class="footer-inner m-auto">
    <div class="footer-content">
      <div class="footer-container bottom footer-container-bottom">
        <div class="footer-container-inner content-bounds">
          <div class="d-flex align-items-center flex-row justify-content-between">
            <div class="footer-left d-flex flex-row align-items-center justify-content-center">
              <!-- copyright -->
              <p class="copyright">
                &copy; <?php echo $copyright;?>
              </p>
              <!-- /copyright -->
              <?php
              wp_nav_menu( array( 
                'theme_location' => 'footer-menu', 
                'container_class' => 'footer-menu d-flex' ) ); 
              ?>

            </div>
            <div class="footer-right">
              <?php if($linkedin): ?>
              <a rel="noopener" href="<?php echo the_field('linkedin', 'option'); ?>"><span class="sr-only">Go to
                  LinkedIn</span><?php echo linkedIn();?></a>
              <?php endif;?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
</div>
<!-- /wrapper -->

<?php wp_footer(); ?>
<div class="mobile-menu-container">
  <div class="site-bounds h-100 d-flex flex-column">
    <nav class="mobile-nav flex-grow-1 d-flex justify-content-center align-items-center" role="navigation" aria-label="navigation">
      <?php main_nav(); ?>
    </nav>
  </div>
</div>
</body>

</html>