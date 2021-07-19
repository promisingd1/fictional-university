<?php
	function fictionaluni_custom_post_type() {
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
	}

	add_action( 'init', 'fictionaluni_custom_post_type' );
