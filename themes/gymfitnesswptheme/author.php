<?php get_header(); ?>

<main class="container page section">
    <?php 
        $author = get_queried_object(); 
        // echo "<pre>";
        // var_dump($author);
        // echo "</pre>";
    ?>

    <h2 class="text-center text-primary">
    Author:
        <?php
             echo $author->data->display_name;
        ?>
    </h2>

    <p class="text-center">
        <?php 
            echo get_the_author_meta('description', $author->data->id);
        ?>
    </p>

    <ul class="blog-entries">
        <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
            <?php get_template_part('template-parts/blog', 'loop') ?>
        <?php endwhile; endif; ?>
    </ul>
</main>

<?php get_footer(); ?>