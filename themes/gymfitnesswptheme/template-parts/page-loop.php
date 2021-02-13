<!-- Check if there are posts, if there are posts, display them  -->
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

    <!-- Display Page Title -->
    <h1 class="text-center text-primary"><?php the_title(); ?></h1>

    <!-- Check if there's an image, Display Featured Image -->
    <?php if(has_post_thumbnail()):?>
        <?php the_post_thumbnail('mediumSize', array('class' => 'feature-image')); ?>
    <?php endif; ?>

    <?php if(get_post_type() === 'gymfitness_classes') : ?>
            <?php
                $start_time = get_field('start_time');
                $end_time = get_field('end_time');
            ?>
        <p class="content-class"><?php echo the_field('class_days') . ' - ' . $start_time . ' to ' . $end_time; ?></p>
            
    <?php endif; ?>

    <!-- Display the content of the page -->
    <?php the_content(); ?>

<?php endwhile; endif; ?>