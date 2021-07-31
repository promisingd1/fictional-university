<?php
	get_header();
	pageBanner();
?>

<div class="container container--narrow page-section">
	<?php while ( have_posts() ) :
		the_post();
		?>
		<div class="generic-content">
            <div class="row group">
                <div class="one-third">
                    <?php the_post_thumbnail('professorPortrait'); ?>
                </div>
                <div class="two-thirds">
                    <?php the_content(); ?>
                </div>
            </div>
		</div>
        <?php
            $relatedPrograms = get_field("related_programs");
//            print_r($relatedPrograms);
            if ($relatedPrograms) :
                echo "<hr class='section-break'>";
	            echo "<h3 class='headline headline--small'>Subject(s) Taught: </h3>";
	            echo "<ul class='link-list min-list'>";
	            foreach ( $relatedPrograms as $professor ) :
		            ?>
                    <li><a href='<?php echo get_the_permalink($professor) ?>'><?php echo get_the_title($professor);
                    ?></a></li>
		            <?php
	            endforeach;
	            echo "</ul>";
            endif;
        ?>
    <?php
        endwhile;
    ?>
</div>

<?php
	get_footer();
?>
