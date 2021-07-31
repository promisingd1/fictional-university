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
    <?php endwhile; ?>
</div>

<?php
	get_footer();
?>
