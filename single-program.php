<?php
	get_header();
	pageBanner( array(
		'subtitle' => 'Join our programs!'
	) );
?>

<div class="container container--narrow page-section">
	<?php while ( have_posts() ) :
		the_post();
		?>
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <a class="metabox__blog-home-link" href="<?php echo site_url( '/programs' ) ?>">
                    <i class="fa fa-home" aria-hidden="true"></i> All Programs </a>
                <span class="metabox__main">
                                <?php the_title(); ?>
                            </span>
            </p>
        </div>
        <div class="generic-content">
			<?php the_content(); ?>
        </div>
        <!--            Related professor query-->
		<?php
		$relatedProfessor = new WP_Query(
			array(
				'posts_per_page' => - 1,
				'post_type'      => 'professor',
				'orderby'        => 'title',
				'order'          => 'ASC',
				'meta_query'     => array(
					array(
						'key'     => 'related_programs',
						'compare' => 'LIKE',
						'value'   => '"' . get_the_ID() . '"'
					)
				)
			)
		);

		if ( $relatedProfessor->have_posts() ) :
			echo "<hr class='section-break'>";
			echo "<h1 class='headline headline--medium'>" . get_the_title() . " Professor:</h1>";

			echo "<ul class='professor-cards'>";
			while ( $relatedProfessor->have_posts() ) :
				$relatedProfessor->the_post();
				?>
                <li class="professor-card__list-item">
                    <a href="<?php the_permalink(); ?>" class="professor-card">
                        <img src="<?php the_post_thumbnail_url( 'professorLandscape' ); ?>"
                             class="professor-card__image">
                        <span class="professor-card__name"><?php the_title(); ?></span>
                    </a>

                </li>
			<?php
			endwhile;
			echo "</ul>";
		endif;
		wp_reset_postdata();
		?>

        <!--            Events and related program query-->
		<?php
		$today             = date( 'Ymd' );
		$programPageEvents = new WP_Query( array(
			'posts_per_page' => 2,
			'post_type'      => 'event',
			'meta_key'       => 'event_date',
			'orderby'        => 'meta_value_num',
			'order'          => 'DESC',
			'meta_query'     => array(
				array(
					'key'     => 'event_date',
					'compare' => '>=',
					'value'   => $today
				),
				array(
					'key'     => 'related_programs',
					'compare' => 'LIKE',
					'value'   => '"' . get_the_ID() . '"'
				)
			)
		) );
		?>
		<?php
		if ( $programPageEvents->have_posts() ) :
			echo "<hr class='section-break'>";
			echo "<h1 class='headline headline--medium'>Upcoming " . get_the_title() . " event</h1>";
			while ( $programPageEvents->have_posts() ) :
				$programPageEvents->the_post();
				?>
				<?php get_template_part( './template-parts/event-content' ); ?>
			<?php
			endwhile;
		endif;
		wp_reset_postdata();

		// Displaying realted campus on the program page
		$relatedCampus = get_field( 'related_campus' );
		if ( $relatedCampus ) :
			echo "<hr class='section-break'>";
			echo "<h1 class='headline headline--medium'>" . get_the_title() . " is availavle at these campus(es):</h1>";
			echo "<ul class='link-list min-list'>";
			foreach ( $relatedCampus as $campus ) :
				?>
                <li>
                    <a href="<?php echo get_the_permalink( $campus ) ?>"><?php echo get_the_title( $campus ); ?></a>
                </li>
			<?php
			endforeach;
			echo "</ul>";
		endif;
	endwhile;
	?>
</div>

<?php
	get_footer();
?>
