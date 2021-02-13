<?php

/*
    Template Name: Gallery

*/

 get_header(); ?>

<main class="container page section">
    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
        <h1 class="text-center text-primary"><?php the_title(); ?></h1>
        <?php
            $gallery = get_post_gallery( get_the_ID(), false );
            $gallery_images = explode(',', $gallery['ids']);
        ?>
            <ul class="gallery-images">

             <?php 
                $i = 0;
                foreach($gallery_images as $id) :
                    $size = ($i === 3) || ($i === 6) ? 'portrait' : 'square';
                    $imageThumb = wp_get_attachment_image_src($id, $size);
                    $image = wp_get_attachment_image_src($id, 'mediumSize'); ?>
                <li>    
                <a href="<?php echo $image[0]; ?>" data-lightbox="gallery">
                <img src="<?php echo $imageThumb[0] ?>" alt="">
                </a>
                </li>
                

            <?php 
            $i++;   
            endforeach;  
            ?>    

            </ul>
       
    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>