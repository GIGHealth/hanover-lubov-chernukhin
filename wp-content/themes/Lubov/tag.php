<?php get_header(); ?>

	<main role="main" aria-label="Content">

    <?php get_template_part('partials/hero'); ?>

    <h1><?php esc_html_e( 'Tag Archive: ', 'html5blank' ); echo single_tag_title( '', false ); ?></h1>

	</main>


<?php get_footer(); ?>
