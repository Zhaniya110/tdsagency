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
<div id="carousel" class="flicking-viewport w-screen">
  <!-- Camera element -->
  <div class="flicking-camera flex gap-8 py-8">
    <!-- Panels -->
	<?php
$args = array(
    'post_type' => 'product',
    'meta_key' => 'total_sales',
    'orderby' => 'meta_value_num',
    'posts_per_page' => 99999,
);
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); 
global $product; ?>

<div class="panel w-auto bg-white shadow-xl h-auto rounded-xl p-[16px] flex gap-[8px] items center">
		<div class="h-[80px] w-[86px]   logo-ss"></div>
		<div class="flex flex-col py-[6.8px] gap[-4px]">
		<a href="<?php the_permalink(); ?>" id="id-<?php the_id(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?><a>
			
			<p class="font-medium"><?php echo $product->get_price_html(); ?></p>
		</div>
	</div>

<?php endwhile; ?>
<?php wp_reset_query(); ?>



	
</div>
</div>
</section>


	
	