<?php get_header(); ?>
<div class="bg-slate-100 w-full py-8">
<section class="container  mx-auto min-h-min  flex flex-wrap sm:flex-nowrap gap-8 flex-stretch ">



    <div class="sm:shadow sm:w-2/3  bg-white  px-8 py-16  items-start sm:rounded-xl">
  

    <?php while ( have_posts() ) : the_post(); ?> 
        <h1 class="mb-4 text-2xl font-medium "><?php echo $product->get_title(); ?></h1>
        <p class="mb-2  font-semibold">Цена: <?php echo wc_get_product( $post->ID )->get_price(); ?></p>
        <p class="mb-2 bg-teal-300 rounded-full text-white uppercase font-semibold p-2 px-4 underline underline-offset-8 decoration-4 inline-block"><?php echo wc_get_product( $post->ID )->get_categories(); ?></p>
        <p class=" font-semibold mb-8 text-lg text-base/loose"><?php echo wc_get_product( $post->ID )->get_short_description(); ?></p>  <div class="float-right"><?php echo wc_get_product( $post->ID )->get_image(); ?></div>
        <p class="mb-2">Цена: <?php echo wc_get_product( $post->ID )->get_price(); ?></p>
       <p>  <?php echo wc_get_product( $post->ID )->get_description(); ?></p>
     
        <?php endwhile; // end of the loop. ?>
        
   
    </div>
 
    <div class="sm:w-1/3  ">
        <div class="sm:shadow sm:rounded-xl px-8 py-16 bg-white mb-8">
            <p class=" font-semibold text-lg ">Контакты:</p>
            <?php 
            $phone = get_field( "phone" );
            $telegram = get_field( "telegram" );
            $email = get_field( "email" );
            ?>
            <p class="text-lg ">Телефон: <?php echo $phone ?> </p>
            <p class=" text-lg ">Телеграм: <?php echo $telegram ?> </p>
            <p class=" text-lg ">Email:<?php echo $email ?>  </p>
        </div>


        <div class="sm:shadow sm:rounded-xl px-8 py-16 bg-white mb-8 ">
        <script data-b24-form="inline/4/o2zhfa" data-skip-moving="true">
            (function(w,d,u){
            var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/180000|0);
            var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
            })(window,document,'https://cdn-ru.bitrix24.ru/b26351838/crm/form/loader_4.js');
            </script>
            </div>
            <div class="text-center">
                <p>ИЛИ  </p>
                
            </div>
            <div class="sm:shadow sm:rounded-xl px-16 py-16 bg-white mt-8 ">
                <p class="text-xl mb-4">Оптатить услугу прямо на сайте </p>
                <p class="mb-2">Разработка сайтов</p>
               
                <button class="bg-gradient-to-r from-red-400 to-red-500 hover:from-pink-500 hover:to-yellow-500 font-medium py-3 px-8 rounded-full text-white my-4 w-full"><a class="link-light" href="<?php
                $add_to_cart = do_shortcode('[add_to_cart_url id="'.$post->ID.'"]');
                echo $add_to_cart;
?>" class="more">ОПЛАТИТЬ УСЛУГУ</a></button>
            </div>

    </div>
</section>
</div>
<?php get_footer(); ?>

<style>
			.b24-form-sign-info{
				display: none!important;
			}
			.b24-form-btn{
				border-radius: 9999px !important;
			}
			.b24-form-header{
		 border-bottom: none!important ;
			}
			.b24-form-sign{
				display: none !important;
			}   </style>