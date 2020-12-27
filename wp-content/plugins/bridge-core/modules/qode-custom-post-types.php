<?php

/* Create Portfolio, Testimonial, Slider and Carousel post type */
if (!function_exists('bridge_core_create_post_type')) {
	function bridge_core_create_post_type() {
		global $bridge_qode_options;
		$slug = 'portfolio_page';
		if(isset($bridge_qode_options['portfolio_single_slug'])) {
			if($bridge_qode_options['portfolio_single_slug'] != ""){
				$slug = $bridge_qode_options['portfolio_single_slug'];
			}
		}
		register_post_type( 'portfolio_page',
			array(
				'labels' => array(
					'name'			=> esc_html__( 'Portfolio','bridge-core' ),
					'singular_name'	=> esc_html__( 'Portfolio Item','bridge-core' ),
					'add_item'		=> esc_html__('New Portfolio Item','bridge-core'),
					'add_new_item'	=> esc_html__('Add New Portfolio Item','bridge-core'),
					'edit_item'		=> esc_html__('Edit Portfolio Item','bridge-core')
				),
				'public' => true,
				'has_archive' => true,
				'rewrite' => array('slug' => $slug),
				'menu_position' => 4,
				'show_ui' => true,
				'supports' => array('author', 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes', 'comments')
			)
		);

		register_post_type('testimonials',
			array(
				'labels' 		=> array(
					'name' 				=> esc_html__('Testimonials','bridge-core' ),
					'singular_name' 	=> esc_html__('Testimonial','bridge-core' ),
					'add_item'			=> esc_html__('New Testimonial','bridge-core'),
					'add_new_item' 		=> esc_html__('Add New Testimonial','bridge-core'),
					'edit_item' 		=> esc_html__('Edit Testimonial','bridge-core')
				),
				'public'		=>	false,
				'show_in_menu'	=>	true,
				'rewrite' 		=> 	array('slug' => 'testimonials'),
				'menu_position' => 	4,
				'show_ui'		=>	true,
				'has_archive'	=>	false,
				'hierarchical'	=>	false,
				'supports'		=>	array('title', 'thumbnail')
			)
		);

		register_post_type('slides',
			array(
				'labels' 		=> array(
					'name' 				=> esc_html__('Qode Slider','bridge-core' ),
					'menu_name'			=> esc_html__('Qode Slider','bridge-core' ),
					'all_items'			=> esc_html__('Slides','bridge-core' ),
					'add_new'			=> esc_html__('Add New Slide','bridge-core'),
					'singular_name' 	=> esc_html__('Slide','bridge-core' ),
					'add_item'			=> esc_html__('New Slide','bridge-core'),
					'add_new_item' 		=> esc_html__('Add New Slide','bridge-core'),
					'edit_item' 		=> esc_html__('Edit Slide','bridge-core')
				),
				'public'		=>	false,
				'show_in_menu'	=>	true,
				'rewrite' 		=> 	array('slug' => 'slides'),
				'menu_position' => 	4,
				'show_ui'		=>	true,
				'has_archive'	=>	false,
				'hierarchical'	=>	false,
				'supports'		=>	array('title', 'page-attributes'),
				'menu_icon'  =>  QODE_ROOT.'/img/favicon.ico'
			)
		);

		register_post_type('carousels',
			array(
				'labels'    => array(
					'name'			=> esc_html__('Qode Carousel','bridge-core' ),
					'menu_name'		=> esc_html__('Qode Carousel','bridge-core' ),
					'all_items'		=> esc_html__('Carousel Items','bridge-core' ),
					'add_new'		=> esc_html__('Add New Carousel Item','bridge-core'),
					'singular_name'	=> esc_html__('Carousel Item','bridge-core' ),
					'add_item'		=> esc_html__('New Carousel Item','bridge-core'),
					'add_new_item'	=> esc_html__('Add New Carousel Item','bridge-core'),
					'edit_item'		=> esc_html__('Edit Carousel Item','bridge-core')
				),
				'public'    =>  false,
				'show_in_menu'  =>  true,
				'rewrite'     =>  array('slug' => 'carousels'),
				'menu_position' =>  4,
				'show_ui'   =>  true,
				'has_archive' =>  false,
				'hierarchical'  =>  false,
				'supports'    =>  array('title','page-attributes'),
				'menu_icon'  =>  QODE_ROOT.'/img/favicon.ico'
			)
		);

		register_post_type('masonry_gallery',
			array(
				'labels' 		=> array(
					'name' 				=> esc_html__('Masonry Gallery','bridge-core' ),
					'all_items'			=> esc_html__('Masonry Gallery Items','bridge-core'),
					'singular_name' 	=> esc_html__('Masonry Gallery Item','bridge-core' ),
					'add_item'			=> esc_html__('New Masonry Gallery Item','bridge-core'),
					'add_new_item' 		=> esc_html__('Add New Masonry Gallery Item','bridge-core'),
					'edit_item' 		=> esc_html__('Edit Masonry Gallery Item','bridge-core')
				),
				'public'		=>	false,
				'show_in_menu'	=>	true,
				'rewrite' 		=> 	array('slug' => 'masonry_gallery'),
				'menu_position' => 	4,
				'show_ui'		=>	true,
				'has_archive'	=>	false,
				'hierarchical'	=>	false,
				'supports'		=>	array('title', 'thumbnail')
			)
		);

		/* Create Portfolio Categories */

		$labels = array(
			'name'				=> esc_html__( 'Portfolio Categories', 'bridge-core' ),
			'singular_name'		=> esc_html__( 'Portfolio Category', 'bridge-core' ),
			'search_items'		=> esc_html__( 'Search Portfolio Categories','bridge-core' ),
			'all_items'			=> esc_html__( 'All Portfolio Categories','bridge-core' ),
			'parent_item'		=> esc_html__( 'Parent Portfolio Category','bridge-core' ),
			'parent_item_colon'	=> esc_html__( 'Parent Portfolio Category:','bridge-core' ),
			'edit_item'			=> esc_html__( 'Edit Portfolio Category','bridge-core' ),
			'update_item'		=> esc_html__( 'Update Portfolio Category','bridge-core' ),
			'add_new_item'		=> esc_html__( 'Add New Portfolio Category','bridge-core' ),
			'new_item_name'		=> esc_html__( 'New Portfolio Category Name','bridge-core' ),
			'menu_name'			=> esc_html__( 'Portfolio Categories','bridge-core' ),
		);

		register_taxonomy('portfolio_category',array('portfolio_page'), array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'portfolio-category' ),
			'show_admin_column' => true
		));

		/* Create Portfolio Tags */

		$labels = array(
			'name'				=> esc_html__( 'Portfolio Tags', 'bridge-core' ),
			'singular_name'		=> esc_html__( 'Portfolio Tag', 'bridge-core' ),
			'search_items'		=> esc_html__( 'Search Portfolio Tags','bridge-core' ),
			'all_items'			=> esc_html__( 'All Portfolio Tags','bridge-core' ),
			'parent_item'		=> esc_html__( 'Parent Portfolio Tag','bridge-core' ),
			'parent_item_colon'	=> esc_html__( 'Parent Portfolio Tags:','bridge-core' ),
			'edit_item'			=> esc_html__( 'Edit Portfolio Tag','bridge-core' ),
			'update_item'		=> esc_html__( 'Update Portfolio Tag','bridge-core' ),
			'add_new_item'		=> esc_html__( 'Add New Portfolio Tag','bridge-core' ),
			'new_item_name'		=> esc_html__( 'New Portfolio Tag Name','bridge-core' ),
			'menu_name'			=> esc_html__( 'Portfolio Tags','bridge-core' ),
		);

		register_taxonomy('portfolio_tag',array('portfolio_page'), array(
			'hierarchical' => false,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'portfolio-tag' ),
		));

		/* Create Testimonials Category */

		$labels = array(
			'name'				=> esc_html__( 'Testimonials Categories', 'bridge-core' ),
			'singular_name'		=> esc_html__( 'Testimonial Category', 'bridge-core' ),
			'search_items'		=> esc_html__( 'Search Testimonials Categories','bridge-core' ),
			'all_items'			=> esc_html__( 'All Testimonials Categories','bridge-core' ),
			'parent_item'		=> esc_html__( 'Parent Testimonial Category','bridge-core' ),
			'parent_item_colon' => esc_html__( 'Parent Testimonial Category:','bridge-core' ),
			'edit_item'			=> esc_html__( 'Edit Testimonials Category','bridge-core' ),
			'update_item'		=> esc_html__( 'Update Testimonials Category','bridge-core' ),
			'add_new_item'		=> esc_html__( 'Add New Testimonials Category','bridge-core' ),
			'new_item_name'		=> esc_html__( 'New Testimonials Category Name','bridge-core' ),
			'menu_name'			=> esc_html__( 'Testimonials Categories','bridge-core' ),
		);

		register_taxonomy('testimonials_category',array('testimonials'), array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'show_admin_column' => true,
			'rewrite' => array( 'slug' => 'testimonials-category' ),
		));



		/* Create Slider Category */

		$labels = array(
			'name'				=> esc_html__( 'Sliders', 'bridge-core' ),
			'singular_name'		=> esc_html__( 'Slider', 'bridge-core' ),
			'search_items'		=> esc_html__( 'Search Sliders','bridge-core' ),
			'all_items'			=> esc_html__( 'All Sliders','bridge-core' ),
			'parent_item'		=> esc_html__( 'Parent Slider','bridge-core' ),
			'parent_item_colon'	=> esc_html__( 'Parent Slider:','bridge-core' ),
			'edit_item'			=> esc_html__( 'Edit Slider','bridge-core' ),
			'update_item'		=> esc_html__( 'Update Slider','bridge-core' ),
			'add_new_item'		=> esc_html__( 'Add New Slider','bridge-core' ),
			'new_item_name'		=> esc_html__( 'New Slider Name','bridge-core' ),
			'menu_name'			=> esc_html__( 'Sliders','bridge-core' ),
		);

		register_taxonomy('slides_category',array('slides'), array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'show_admin_column' => true,
			'rewrite' => array( 'slug' => 'slides-category' ),
		));

		/* Create Carousel Category */

		$labels = array(
			'name'				=> esc_html__( 'Carousels', 'bridge-core' ),
			'singular_name'		=> esc_html__( 'Carousel', 'bridge-core' ),
			'search_items'		=> esc_html__( 'Search Carousels','bridge-core' ),
			'all_items'			=> esc_html__( 'All Carousels','bridge-core' ),
			'parent_item'		=> esc_html__( 'Parent Carousel','bridge-core' ),
			'parent_item_colon'	=> esc_html__( 'Parent Carousel:','bridge-core' ),
			'edit_item'			=> esc_html__( 'Edit Carousel','bridge-core' ),
			'update_item'		=> esc_html__( 'Update Carousel','bridge-core' ),
			'add_new_item'		=> esc_html__( 'Add New Carousel','bridge-core' ),
			'new_item_name'		=> esc_html__( 'New Carousel Name','bridge-core' ),
			'menu_name'			=> esc_html__( 'Carousels','bridge-core' ),
		);

		register_taxonomy('carousels_category',array('carousels'), array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'show_admin_column' => true,
			'rewrite' => array( 'slug' => 'carousels-category' ),
		));


		$labels = array(
			'name'				=> esc_html__( 'Masonry Gallery Categories', 'bridge-core' ),
			'singular_name'		=> esc_html__( 'Masonry Gallery Category', 'bridge-core' ),
			'search_items'		=> esc_html__( 'Search Masonry Gallery Categories','bridge-core' ),
			'all_items'			=> esc_html__( 'All Masonry Gallery Categories','bridge-core' ),
			'parent_item'		=> esc_html__( 'Parent Masonry Gallery Category','bridge-core' ),
			'parent_item_colon'	=> esc_html__( 'Parent Masonry Gallery Category:','bridge-core' ),
			'edit_item'			=> esc_html__( 'Edit Masonry Gallery Category','bridge-core' ),
			'update_item'		=> esc_html__( 'Update Masonry Gallery Category','bridge-core' ),
			'add_new_item'		=> esc_html__( 'Add New Masonry Gallery Category','bridge-core' ),
			'new_item_name'		=> esc_html__( 'New Masonry Gallery Category Name','bridge-core' ),
			'menu_name'			=> esc_html__( 'Masonry Gallery Categories','bridge-core' ),
		);

		register_taxonomy('masonry_gallery_category', array('masonry_gallery'), array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'show_admin_column' => true,
			'rewrite' => array( 'slug' => 'masonry-gallery-category' ),
		));

	}

    add_action('init', 'bridge_core_create_post_type',0);

}