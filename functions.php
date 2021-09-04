<?php

//load css
function load_css(){
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css',
    array(), false, 'all');

    wp_enqueue_style('bootstrap');


    wp_register_style('main', get_template_directory_uri() . '/css/main.css',
    array(), false, 'all');

    wp_enqueue_style('main');
}

add_action('wp_enqueue_scripts','load_css');


//load js
function load_js(){

    wp_enqueue_script('jquery');
    wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js',
    'jquery', false, true);

    wp_enqueue_style('bootstrap');
}

add_action('wp_enqueue_scripts','load_js');



//add theme support
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('widgets');





//menus

register_nav_menus(

    array(

        'top-menu' => 'Top Menu Location',
        'mobile-menu' => 'Mobile Menu Location'
    )
    );





//custom imagesizes

add_image_size('blog-large',800,400,false);
add_image_size('blog-large',300,200,true);





//sidebars

function my_sidebars()
{
   register_sidebar(


    array(

        'name' => 'Page Sidebar',
        'id' => 'page-sidebar',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    )

    );

    register_sidebar(
    array(

        'name' => 'Blog Sidebar',
        'id' => 'blog-sidebar',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    )
 
    );

  }

  add_action('widgets_init','my_sidebars');




  //POST TYPES

  function my_first_post_type()

  {
    $args = array(

        'labels' => array(

            'name' => 'Cars',
            'singular_name' => 'Car'

        ),

        'hierarchical' => false,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-images-alt2',
        'supports' => array('title','editor','thumbnail'),
        //'rewrite' => array('slug' => 'my-cars')

    );

    register_post_type('cars',$args);
    
  }

  add_Action('init','my_first_post_type');



  function my_first_taxonomy()
  {
    $args = array(

        'labels' => array(

            'name' => 'Brands',
            'singular_name' => 'Brand'

        ),

        'hierarchical' => false,
        'public' => true,
        
    );

    register_taxonomy('brands',array('cars'),$args);

  }

  add_Action('init','my_first_taxonomy');
