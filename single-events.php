<?php
get_header();
?>

	<div class="page-banner">
		<div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/assets/images/ocean.jpg') ?>);"></div>
		<div class="page-banner__content container container--narrow">
			<h1 class="page-banner__title">
				Welcome to our events
			</h1>
			<div class="page-banner__intro">
				<p>Join our events!</p>
			</div>
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
            <div>
        <?php endwhile;
        ?>
	</div>

<?php
get_footer();
?>
<?php
