<?php get_header(); ?>

<div class="container mx-auto   pt-5   px-4">
            <?php if (have_posts()):
                while (have_posts()):
                    the_post(); ?>



                    <?php the_content(); ?>

                <?php endwhile; else: endif; ?>

         
           
                </div>

                 
<?php get_footer(); ?>         

