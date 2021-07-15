<?php
get_header();
?>

	<div class="page-banner">
		<div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/assets/images/ocean.jpg') ?>);"></div>
		<div class="page-banner__content container container--narrow">
			<h1 class="page-banner__title">
			    <?php the_title(); ?>
			</h1>
		</div>
	</div>

	<div class="container container--narrow page-section">
		<?php while ( have_posts() ) :
			the_post();
			?>
			<div class="metabox metabox--position-up metabox--with-home-link">
				<p>
					<a class="metabox__blog-home-link" href="<?php echo site_url( '/events' ) ?>">
						<i class="fa fa-home" aria-hidden="true"></i> Events Home</a>
					<span class="metabox__main">
                        <?php the_title(); ?>
                    </span>
                </p>
			</div>
            <div class="generic-content">
                <?php the_content(); ?>
            </div>
			<?php
			$relatedPrograms = get_field( 'related_program' );
			if ($relatedPrograms) {
//			print_r( $relatedPrograms );
				echo "<hr class='section-break'>";
				echo "<h3 class='headline headline--small'>Related Program(s): </h3>";
				echo "<ul class='link-list min-list'>";
				foreach ( $relatedPrograms as $program ) {
					?>
                    <li><a href='<?php echo get_the_permalink($program) ?>'><?php echo get_the_title($program); ?></a></li>
					<?php
				}
				echo "</ul>";
            }
			?>
        <?php endwhile;
        ?>
	</div>

<?php
get_footer();
?>