<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <?php wp_head(); ?>
   <title><?php wp_title(); ?></title>
    
</head>
<body  >
<div class="desktop-nav">
<div class="flex justify-between container mx-auto pt-5 flex-wrap   px-4 gap-8" >
<div class="flex" >
    <div class="flex items-center gap-[10px]"> 
        <img  src="<?php bloginfo('template_url'); ?>/div.icon.svg">
        <?php echo do_shortcode( "[polylang_langswitcher]" ); ?>
        
        
    </div>
</div>


<div class="flex " >
<?php

wp_nav_menu( array(
    'menu' => 'p',
	'menu_class'           => 'flex text-xs gap-[34px] font-semibold ',
	'theme_location' => 'primary',
	'fallback_cb'    => false 
) );

?>

</div>

</div>


<div class="sm:grid sm:grid-cols-4 container mx-auto pt-5 px-4 flex flex-wrap gap-8">
 
    <?php the_custom_logo() ?>
    <div>
        <p class="text-[17.28px] font-semibold">Веб Разработка и Автоматизация</p>
        <p class="text-xs font-semibold text-slate-400">Звонок по телефону +7 707 135 77 97</p>
    </div>
    <div></div>
    <div class="flex gap-2">

  <?php global $woocommerce; ?>

        <?php

wp_nav_menu( array(
  'container' => 'div',
  'container_class' => 'flex',
	'menu_class'           => 'flex text-xs gap-2 items-center font-semibold ',
	'theme_location' => 'auth',
	'fallback_cb'    => false 
) );

?>
  </div>

</div>
<div class="w-screen"> 
<div class="container mx-auto pt-5 pb-5 px-4 ">
  <?php

wp_nav_menu( array(
    
	'menu_class'           => 'flex flex-wrap   text-xs gap-[34px] font-semibold ',
	'theme_location' => 't-services',
	'fallback_cb'    => false 
) );

?>
</div>
</div>
<div class="w-screen h-1 shadow"></div>

</div>

<div class="mobile-nav" >

<nav class="bg-white border-gray-200 dark:bg-gray-900">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
  <?php the_custom_logo() ?>
    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
    
    <?php

wp_nav_menu( array(
  'container'       => 'div',
		'container_id'    => 'navbar-default',
		'container_class' => 'hidden w-full md:block md:w-auto',
  'menu' => 'ul',
	'menu_class' => 'font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700',
	'theme_location' => 'mobile',
	'fallback_cb'    => false 
) );

?>
 
  </div>
</nav>

</div>
