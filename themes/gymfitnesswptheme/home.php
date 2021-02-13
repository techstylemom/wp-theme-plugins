<?php get_header(); ?>

<main class="container page section">

    <ul class="blog-entries">
        <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
            <?php get_template_part('template-parts/blog', 'loop') ?>
        <?php endwhile; endif; ?>
    </ul>
</main>

<?php get_footer(); ?>