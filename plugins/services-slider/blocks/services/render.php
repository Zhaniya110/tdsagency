<?php
/**
 * Carousel Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 *
 * 
 */
global $post;

$posts_field = get_field( 'services' );
?>

<section  <?php echo ( ! $is_preview ) ? get_block_wrapper_attributes() : ''; ?>>
<?php if ( $posts_field ) : ?>
		<div class="service-carousel">
			<?php foreach ( $posts_field as $post ) : ?>
				<?php setup_postdata( $post ); ?>
				<div class="services-acf-carousel  w-80 mr-4  p-4 pt-5 h-[366px] carousel-item  bg-white rounded border rounded-2xl  flex flex-col gap-5">
				
              
					<h2 class="capitalize font-bold" ><a  style="color:black;"  href="<?php echo esc_url( get_the_permalink() ); ?>"><?php the_title( ) ?></a></h2>
                     <p class="text-[14px] "><?php echo wp_trim_words( get_the_excerpt(), 40, '...' ); ?></p>
                    
					
					 <?php $price = get_post_meta( get_the_ID(), '_price', true ); ?>
					 <div class="flex justify-items-stretch">
<p class="w-1/2 font-bold"><?php  echo wc_price( $price ); ?></p>
					 <button class="bg-teal-400 p-4 rounded-full w-1/2"> <a  style="color:white;"  href="<?php the_permalink()   ?>">Подробнее</a>
                    </button>
                     
					</div>
               
                
				</div>
			<?php endforeach; ?>
		</div>
		<?php wp_reset_postdata(); ?>
	<?php else : ?>
		<p>No posts selected.</p>
	<?php endif; ?>
</section>