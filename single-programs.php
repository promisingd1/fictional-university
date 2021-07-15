<?php
get_header();
?>

	<div class="page-banner">
		<div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/assets/images/ocean.jpg') ?>);"></div>
		<div class="page-banner__content container container--narrow">
			<h1 class="page-banner__title">
                <?php the_title(); ?>
			</h1>
			<div class="page-banner__intro">
				<p>Join our programs!</p>
			</div>
		</div>
	</div>

	<div class="container container--narrow page-section">
        <?php while ( have_posts() ) :
            the_post();
            ?>
            <div class="metabox metabox--position-up metabox--with-home-link">
                <p>
                     <a class="metabox__blog-home-link" href="<?php echo site_url( '/programs' ) ?>">
                         <i class="fa fa-home" aria-hidden="true"></i> Programs Home</a>
                     <span class="metabox__main">
                                <?php the_title(); ?>
                            </span>
                </p>
            </div>
            <div class="generic-content">
                <?php the_content(); ?>
            </div>
	        <?php
	        $today = date('Ymd');
	        $homePageEvents = new WP_Query( array(
		        'posts_per_page' => 2,
		        'post_type'      => 'events',
		        'meta_key' => 'event_date',
		        'orderby' => 'meta_value_num',
		        'order' => 'DESC',
		        'meta_query' => array(
			        array(
				        'key'     => 'event_date',
				        'compare' => '>=',
				        'value'   => $today
			        ),
			        array(
				        'key'     => 'related_program',
				        'compare' => 'LIKE',
				        'value'   => '"'. get_the_ID() .'"'
			        )
		        )
	        ) );
	        ?>
            <?php
            if ($homePageEvents->have_posts()) {
	        echo "<hr class='section-break'>";
	        echo "<h1 class='headline headline--medium'>Upcoming ".  get_the_title() ." event</h1>";
	        while ( $homePageEvents->have_posts() ) :
		        $homePageEvents->the_post();
		        ?>
                <div class="event-summary">
                    <a class="event-summary__date t-center" href="#">
                        <span class="event-summary__month">
                            <?php
                            $eventDate = new DateTime( get_field( 'event_date', false, false ) );
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
                        <p><?php echo wp_trim_words( get_the_content(), 20 ); ?><a href="<?php the_permalink();
					        ?>" class="nu
                            gray">Read More</a></p>
                    </div>
                </div>
	        <?php
	        endwhile;
	        wp_reset_postdata();
            }
	        ?>
        <?php endwhile;
        ?>
    </div>

<?php
    get_footer();
?>
