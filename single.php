<?php get_header(); ?>
<div class="container mx-auto p-4 py-8">
    <div class="flex flex-wrap md:flex-nowrap gap-16 ">

        <?php if (have_posts()):
            while (have_posts()):
                the_post(); ?>
                <div class=" container mx-auto md:w-[75%]  md:shadow md:rounded-2xl md:p-24 flex flex-col gap-4">
                   <a href="<?php get_the_permalink( ); ?>"> <h1 class="text-[#19B297] font-semibold text-5xl underline mb-8">
                        <?php the_title(); ?>
                    </h1>
                    </a>
                    <?php 
                        if ( has_post_thumbnail() ) {
                        echo ' <div class="border w-full h-96 rounded-2xl mb-[50px]"
                        style="background-image: url("<?php the_post_thumbnail_url(); ?>"); background-position: center; background-size: cover;">
                    </div>';

                        } else{ // Set the first    image from the editor
                            echo "";
                        } ?>




                   
                    <p class="font-medium">
                        <?php the_date(); ?>
                    </p>
                    <p class="font-medium">
                        <?php the_content(); ?>
                    </p>
                </div>

            <?php endwhile; else: endif; ?>









        <div class="container mx-auto md:w-[25%] flex flex-col gap-8 " style="list-style:none"  >
        <?php get_sidebar() ?>
        </div>
    </div>



</div>
<?php get_footer(); ?>