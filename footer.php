<?php wp_footer(); ?>
<!--
  Heads up! 👋

  Plugins:
    - @tailwindcss/forms
-->
<div class="bg-[#181818] pb-20 ">
<footer class="container mx-auto">
    <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
      
        <div
          class="mt-8 grid gap-8 lg:mt-0 lg:grid-cols-5 lg:gap-y-16"
        >
      
        <div class="col-span-2 sm:col-span-1">
            <p class="font-medium text-white">О компании</p>

           
        <?php

wp_nav_menu( array(
 
	'menu_class'           => 'mt-6 space-y-4 text-sm text-white',
	'theme_location' => 'footer-1',
	'fallback_cb'    => false 
) );

?>
          
          </div>

          <div class="col-span-2 sm:col-span-1">
            <p class="font-medium text-white">Услуги</p>
            <?php

wp_nav_menu( array(
 
	'menu_class'           => 'mt-6 space-y-4 text-sm text-white',
	'theme_location' => 'footer-2',
	'fallback_cb'    => false 
) );

?>
          </div>

          <div class="col-span-2 sm:col-span-1">
            <p class="font-medium text-white">Контакты</p>

            <?php

wp_nav_menu( array(
 
	'menu_class'           => 'mt-6 space-y-4 text-sm text-white',
	'theme_location' => 'footer-3',
	'fallback_cb'    => false 
) );

?>
          </div>

          
     
     
     
        </div>
      </div>

      <div class="mt-8 border-t border-gray-100 px-4 pt-8">
        <div class="sm:flex sm:justify-between">
          <p class="text-xs text-white">
           TechLab @ 2023 
          </p>

         
          <?php get_template_part( 'menu', 'social' ); ?>
        </div>
      </div>
    </div>
</footer>
</div>

</body>
</html>