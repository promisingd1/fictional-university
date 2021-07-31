<?php
	get_header();
	while ( have_posts() ) :
		the_post();
		?>

        <!--        Page Banner Section -->
		<?php
		pageBanner( array(
			'subtitle' => "Learn how the school of your dreams got started.",
			'photo'    => 'https://images.unsplash.com/photo-1593642634402-b0eb5e2eebc9?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80'
		) ); ?>


        <div class="container container--narrow page-section">
            <!-- Breadcrumb Area -->
			<?php
				$parentPage = wp_get_post_parent_id( get_the_ID() );
				if ( $parentPage ) :
					?>
                    <div class="metabox metabox--position-up metabox--with-home-link">
                        <p>
                            <a class="metabox__blog-home-link" href="<?php echo get_the_permalink( $parentPage ); ?>">
                                <i class="fa fa-home" aria-hidden="true"></i> Back
                                to <?php echo get_the_title( $parentPage )
								?></a>
                            <span class="metabox__main"><?php the_title(); ?></span></p>
                    </div>
				<?php
				endif;

				//  Getting the children of a parent page. get_the_id() will return an array if there's child page
                // else it'll return an empty array
				$isParent = get_pages( array(
					'child_of' => get_the_ID()
				) );

				//  Checking whether the page has parent or is parent
				if ( $parentPage or $isParent ) :
					?>
                    <div class="page-links">
                        <h2 class="page-links__title">
                            <a href="<?php echo get_the_permalink( $parentPage ); ?>">
								<?php echo get_the_title( $parentPage ); ?>
                            </a>
                        </h2>

                        <ul class="min-list">
							<?php
								if ( $parentPage ) {
									$findChildrenOf = $parentPage;
								} else {
									$findChildrenOf = get_the_ID();
								}
							?>

							<?php
								wp_list_pages( array(
									'title_li'    => null,
									'child_of'    => $findChildrenOf,
									'sort_column' => 'menu_order'
								) )
							?>
                        </ul>
                    </div>
				<?php
				endif;
			?>
            <!--        Page Content -->
            <div class="generic-content">
				<?php the_content(); ?>
            </div>

        </div>

	<?php
	endwhile;
	get_footer();
?>