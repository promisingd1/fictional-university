<?php
	get_header();
	pageBanner( array(
		'title'    => 'Past Events',
		'subtitle' => 'A recap into our past events.'
	) );
?>

<div class="container container--narrow page-section">
	<?php
		$today          = date( 'Ymd' );
		$pastPageEvents = new WP_Query( array(
			'paged'          => get_query_var( 'paged', 1 ),
			'posts_per_page' => 2,
			'post_type'      => 'event',
			'meta_key'       => 'event_date',
			'orderby'        => 'meta_value_num',
			'order'          => 'DESC',
			'meta_query'     => array(
				array(
					'key'     => 'event_date',
					'compare' => '<',
					'value'   => $today
				)
			)
		) );

		while ( $pastPageEvents->have_posts() ) :
			$pastPageEvents->the_post();
		    get_template_part('./template-parts/event-content');
		endwhile;
		echo paginate_links( array(
			'total' => $pastPageEvents->max_num_pages
		) );
	?>
</div>

<?php
	get_footer();
?>

