<?php get_header(); ?>

<main role="main" aria-label="Content">
  <div id="primary" class="primary main-page post-page" role="main">

  <!-- HERO -->
    <section class="hero hero-blog bg-green ">
        <div class="hero-inner d-flex align-items-end content-bounds pb-3">
            <div class="hero-content blog-bounds">
                <div class="hero-title">
                <h1 style="opacity: 0;"><?php echo get_the_title(); ?></h1>
                <div class="date-container pt-0 mt-4" style="opacity: 0;">
                    <p><?php echo get_the_date('j F Y');?></p>
                </div>
                </div>
            </div>
        </div>
    </section>
    <!-- HERO END -->
    <?php if ( have_posts() ) : while (have_posts() ) : the_post(); ?>


    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="opacity: 0">

        <?php
        $cats = get_the_category();
        $categories = null;
        if($cats){
        $a = array_map(function($obj) {
            return $obj->cat_name;
        }, $cats);
        $b = $a;
        $a = implode(", ", $a);
        $categories = $a;
        }

        $type = get_post_type();

        ?>

        <section class="post-top-items">
            <div class="post-top-items-inner content-bounds pt-5 pb-5">
                <div class="first-up-container">
                <?php get_template_part('components/article_content'); ?>
                </div>
            </div>
        </section>

    </article>

    <?php endwhile; endif; ?>
    <?php get_template_part('components/content-rows/next_page_link'); ?>

  </div>
</main>

<?php get_footer(); ?>