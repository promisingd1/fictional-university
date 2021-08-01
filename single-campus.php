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
				<a class="metabox__blog-home-link" href="<?php echo site_url( '/campuses' ) ?>">
					<i class="fa fa-home" aria-hidden="true"></i> All Campuses
                </a>
				<span class="metabox__main">
                                <?php the_title(); ?>
                            </span>
			</p>
		</div>
		<div class="generic-content">
			<?php the_content(); ?>
		</div>
		<?php
//        Displaying programs related to campus
		$relatedProgram = new WP_Query(
			array(
				'posts_per_page' => - 1,
				'post_type'      => 'program',
				'orderby'        => 'title',
				'order'          => 'ASC',
				'meta_query'     => array(
					array(
						'key'     => 'related_campus',
						'compare' => 'LIKE',
						'value'   => '"'. get_the_ID() .'"'
					)
				)
			)
		);

//		print_r($relatedProgram);

		if ( $relatedProgram->have_posts() ) :
			echo "<hr class='section-break'>";
			echo "<h1 class='headline headline--medium'>Programs available at this campus:</h1>";
			echo "<ul class='link-list min-list'>";

			while ( $relatedProgram->have_posts() ) :
				$relatedProgram->the_post();
				?>
                <li>
                   <a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a>
                </li>
			<?php
			endwhile;
			echo "</ul>";
		endif;
		?>
    <?php
    wp_reset_postdata();
    endwhile; ?>
</div>

<?php
	get_footer();
?>
