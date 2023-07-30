<?php get_header(); ?>
<section class="container mx-auto my-8 w-[80%]">
    <h1 class="text-center font-bold text-[35px] mb-[45px]">
        <?php woocommerce_page_title(); ?>
    </h1>
    <p>
        <?php do_action('woocommerce_archive_description'); ?>
    </p>


    <div class="mx-auto md:ml-0 grid grid-cols-1 md:grid-cols-3 gap-[44px]">
        <?php
        //	woocommerce_product_loop_start();
        
        if (wc_get_loop_prop('total')) {
            while (have_posts()) {
                the_post();

                /**
                 * Hook: woocommerce_shop_loop.
                 *
                 * @hooked WC_Structured_Data::generate_product_data() - 10
                 */
                do_action('woocommerce_shop_loop');


                $id = get_the_ID();
                ?>
                <div class="shadow   p-[22px]  carousel-item  bg-white rounded border rounded-2xl justify-between flex flex-col gap-5">

                    <h2 class="capitalize font-bold"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
                    <p class="text-[14px]  text-slate-600 ">
                        <?php echo wp_trim_words(get_the_excerpt(), 40, '...'); ?>
                    </p>
                    <div class="flex items-center gap-4">
                        <p class="w-1/3 font-bold">
                            <?php
                            $product = new WC_Product(get_the_ID());
                            echo wc_price($product->get_price_including_tax(1, $product->get_price()));
                            ?>
                        </p>
                        <button class="bg-teal-600 py-[8px] px-[25px] rounded-full w-2/3"> <a style="color:white;"
                                href="<?php the_permalink() ?>">Подробнее</a>
                        </button>
                    </div>
                </div>
                <?php
                //			wc_get_template_part( 'content', 'product' );
            }
        }

        //	woocommerce_product_loop_end();
        ?>
    </div>

</section>

<?php get_footer(); ?>