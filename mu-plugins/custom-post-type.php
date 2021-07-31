<?php
	function fictionaluni_custom_post_type() {
//		Event Post Type
		register_post_type( 'event',
			array(
				'labels'      => array(
					'name'          => __( 'Events', 'fictional-uni' ),
					'singular_name' => __( 'Event', 'fictional-uni' ),
					'add_new'       => __( 'Add New Event', 'fictional-uni' ),
					'edit_item'     => __( 'Edit Event', 'fictional-uni' ),
				),
				'public'      => true,
				'has_archive' => true,
				'menu_icon'   => 'dashicons-calendar-alt',
				'rewrite'     => array( 'slug' => 'events' ),
				'show_in_rest' => true,
				'supports' => array(
					'title',
					'editor',
					'excerpt'
				)
			),
		);

//		Program Post Type
		register_post_type( 'program',
			array(
				'labels'      => array(
					'name'          => __( 'Programs', 'fictional-uni' ),
					'singular_name' => __( 'Program', 'fictional-uni' ),
					'add_new'       => __( 'Add New Program', 'fictional-uni' ),
					'edit_item'     => __( 'Edit Program', 'fictional-uni' ),
				),
				'public'      => true,
				'has_archive' => true,
				'menu_icon'   => 'dashicons-awards',
				'rewrite'     => array( 'slug' => 'programs' ),
				'show_in_rest' => true,
				'supports' => array(
					'title',
					'editor',
					'excerpt'
				)
			),
		);


//		Professor Post Type
		register_post_type( 'professor',
			array(
				'labels'      => array(
					'name'          => __( 'Professors', 'fictional-uni' ),
					'singular_name' => __( 'Professor', 'fictional-uni' ),
					'add_new'       => __( 'Add New Professor', 'fictional-uni' ),
					'edit_item'     => __( 'Edit Professor', 'fictional-uni' ),
					'all_items' => __('All Professors', 'fictional-uni')
				),
				'public'      => true,
				'has_archive' => true,
				'menu_icon'   => 'dashicons-welcome-learn-more',
				'show_in_rest' => true,
				'supports' => array(
					'title',
					'editor',
					'excerpt'
				)
			),
		);
	}

	add_action( 'init', 'fictionaluni_custom_post_type' );
