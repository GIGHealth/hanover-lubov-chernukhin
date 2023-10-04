
  <?php
$args = array(
    'post_type'       => array( 'post' ),
    'post_status'     => array( 'publish' ),
    'order'           => 'DESC',
    'posts_per_page'  => 3,
    'facetwp'         => true,
);
// The Query
$query = new WP_Query( $args );
if($query->have_posts()):?>
  <section class="latest-from-the-blog bg-green pt-5 pb-5">
    <div class="facetwp-container content-bounds d-flex flex-column pt-5 pb-5" data-aos="fade-up">
      <div class="latest-from-the-blog-title mb-3" ><h4>Latest from the blog</h4></div>
      <?php while ( $query->have_posts() ) : $query->the_post();
    set_query_var( 'concat', false );
    ?>
    <div class="articles" data-aos="fade" data-aos-delay="100">
      <?php get_template_part('components/latest_blog_post_home') ;?>
    </div>
      <?php endwhile; ?>
    </div>
  </section>

  <?php endif; ?>