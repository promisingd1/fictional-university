<?php
	get_header();
	pageBanner( array(
		'subtitle' => 'Our blogs are awesome!'
	) );
?>

<div class="container container--narrow page-section">
	<?php while ( have_posts() ) :
		the_post();
		?>
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <a class="metabox__blog-home-link" href="<?php echo site_url( '/blog' ) ?>">
                    <i class="fa fa-home" aria-hidden="true"></i> Blog Home
                </a>
                <span class="metabox__main">Posted by: <?php the_author_posts_link(); ?>, <?php the_time( 'M' ); ?> in <?php echo
					get_the_category_list( ', ' ) ?></span></p>
        </div>
        <div class="generic-content">
			<?php the_content(); ?>
        </div>
	<?php endwhile; ?>
</div>

<?php
	get_footer();
?>

