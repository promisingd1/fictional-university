<?php
get_header();
?>

<div class="page-banner">
	<div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/assets/images/ocean.jpg') ?>);"></div>
	<div class="page-banner__content container container--narrow">
		<h1 class="page-banner__title">
		    Past Events
		</h1>
        <div class="page-banner__intro">
            <p>A racap into our past events.</p>
        </div>
	</div>
</div>

<div class="container container--narrow page-section">
	<?php
	$today = date('Ymd');
	$pastPageEvents = new WP_Query( array(
	    'paged'	=> get_query_var('paged', 1),
		'post_type'      => 'events',
		'meta_key' => 'event_date',
		'orderby' => 'meta_value_num',
		'order' => 'DESC',
		'meta_query' => array(
			array(
				'key'     => 'event_date',
				'compare' => '<',
				'value'   => $today
			)
		)
	) );

	while ( $pastPageEvents->have_posts() ) :
		$pastPageEvents->the_post();
		?>
		<div class="event-summary">
			<a class="event-summary__date t-center" href="#">
                            <span class="event-summary__month">
                                <?php
                                $eventDate = new DateTime(get_field('event_date', false, false));
                                echo $eventDate->format( 'M' );
                                ?>
                            </span>
				<span class="event-summary__day">
                                <?php
                                echo $eventDate->format( 'd' );
                                ?>
                            </span>
			</a>
			<div class="event-summary__content">
				<h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink();
					?>"><?php the_title(); ?></a></h5>
				<p>
					<?php if ( has_excerpt() ) {
						echo get_the_excerpt();
					} else {
						echo wp_trim_words( get_the_content(), 20 );

					} ?>
					<a href="<?php the_permalink(); ?>" class="nu gray">Read More</a>
				</p>
			</div>
		</div>
	<?php
	endwhile;
	echo paginate_links( array(
	        'total' => $pastPageEvents->max_num_pages
    ));
	?>
</div>

<?php
get_footer();
?>

