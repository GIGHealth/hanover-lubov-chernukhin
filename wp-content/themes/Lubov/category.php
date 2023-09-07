<?php get_header();?>
	<main role="main" aria-label="Content">


    <div class="category-posts row contain-me p-0 pt-4">
			<?php get_template_part( 'loop-posts' ); ?>
    </div>
    
			<?php get_template_part( 'pagination' ); ?>

		<!-- /section -->
	</main>

<?php get_footer(); ?>
