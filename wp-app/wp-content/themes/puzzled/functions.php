<?php

function puzzled_theme_support(){
    add_theme_support("title-tag");
    add_theme_support( 'post-thumbnails' );
}

add_action("after_setup_theme", "puzzled_theme_support");

function puzzled_register_sidebars() {
	register_sidebar( array(
		'name'          => __( 'secondary sidebar', 'puzzled' ),
		'id'            => 'sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
    register_sidebar( array(
		'name'          => __( 'adress widget', 'puzzled' ),
		'id'            => 'adress-widget',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}

add_action( 'widgets_init', 'puzzled_register_sidebars' );

function puzzled_menus(){
    $locations = array(
        'right' => 'right',
        'navbar' => 'navbar',
        'footer' => 'footer'
    );
    register_nav_menus($locations);
}

add_action('init','puzzled_menus');

//begränsar antalet träffar som visas på search.php
function search_filter($query) {
    if ( !is_admin() && $query->is_main_query() ) {
      if ($query->is_search) {
        $query->set('paged', ( get_query_var('paged') ) ? get_query_var('paged') : 1 );
        //posts_per_page är antalet träffar
        $query->set('posts_per_page', 1);
      }
    }
  }
  add_action( 'pre_get_posts', 'search_filter' );

function puzzled_styles(){
    wp_enqueue_style('puzzled-fontawesome',"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css", array(), '4.6.3', 'all');
    wp_enqueue_style('puzzled-bootstrap3.3.7', "https://cdn.usebootstrap.com/bootstrap/3.3.7/css/bootstrap.min.css", array(), '3.3.7', 'all');
    wp_enqueue_style('puzzled-style', get_template_directory_uri() . "/style.css", array(), '1.1', 'all');
}

function puzzled_scripts(){
    wp_enqueue_script('puzzled-jquery', "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js", array(), '3.1.0', false);
    wp_enqueue_script('puzzled-custom_script', get_template_directory_uri() .  "/js/script.js", array(), '1.0', true);
}

add_action('wp_enqueue_scripts', 'puzzled_styles');
add_action('wp_enqueue_scripts', 'puzzled_scripts');



?>