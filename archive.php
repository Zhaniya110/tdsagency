<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tdsagency
 */
get_header( ); ?>
<div class="content-container container pt-5 pb-5 px-4">
<h1 class="text-center font-bold text-[35px] mt-[45px] mb-[45px]"> <?php the_archive_title(); ?></h1>    
<p>
        <?php the_archive_description() ?>
    </p>

    <div class="container">
        <div class="row">
            <div class="blog-posts col-md-8">
                
            <?php if ( have_posts() ): ?>
                <?php while( have_posts() ): ?>
                    <?php the_post(); ?>
                    <div class=" container mx-auto md:w-[75%]  md:shadow md:rounded-2xl md:p-24 flex flex-col gap-4">
                   <a href="<?php the_permalink( ); ?>"> <h1 class="text-[#19B297] font-semibold text-5xl underline mb-8">
                      Кейс: <?php the_title(); ?>
                    </h1>
                    </a>
                    <div class="border w-full h-96 rounded-2xl mb-[50px]"
                        style="background-image: url('<?php  echo  get_the_post_thumbnail_url(  )  ?>'); background-position: center; background-size: cover;">
                    </div>

                </div>
                
                <?php endwhile; ?>
               
            <?php else: ?>
                <p><?php _e( 'No Blog Posts found', 'nd_dosth' ); ?></p>
            <?php endif; ?>
            </div>
            <div id="blog-sidebar" class="col-md-4">
                <?php if ( is_active_sidebar( 'blog' ) ) : ?>
                    <div class="blog-widgets-container">
                        <?php dynamic_sidebar( 'blog' ); ?>
                    </div>
                <?php endif; ?> 
                               
            </div>
        </div>
    </div>
</div>
<?php
get_footer();