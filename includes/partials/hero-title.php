<?php if ( is_archive() ) { ?>
	<?php wp_reset_postdata(); ?>
	<?php if ( is_category() ) { ?>
		<h1><?php single_cat_title( 'Category: ' ); ?></h1>
	<?php } elseif ( is_tag() ) { ?>
		<h1><?php single_tag_title( 'Tag: ' ); ?></h1>
	<?php } elseif ( is_day() ) { ?>
		<h2>Archive: <?php echo get_the_date( 'D M Y' ); ?></h2>
	<?php } elseif ( is_month() ) { ?>
		<h1>Archive: <?php echo get_the_date( 'M Y' ); ?></h1>
	<?php } elseif ( is_year() ) { ?>
		<h1>Archive: <?php echo get_the_date( 'Y' ); ?></h1>
	<?php } else { ?>
		<?php
			$post = get_option( 'page_for_posts' );
			setup_postdata( $post );
		?>
		<?php if ( get_the_title() ) { ?>
			<h1 class="js-stagger"><?php the_title(); ?></h1>
		<?php } else { ?>
			<h1 class="js-stagger">Archive</h1>
		<?php } ?>
	<?php } ?>
<?php } else { ?>
	<h1 class="js-stagger h2 md:h1 !text-white">
		<?php
		if ( get_field( 'hero_title' ) ) {
			echo get_field( 'hero_title' );
		} else {
			the_title();
		}
		?>
	</h1>
	<?php if ( get_field( 'hero_tagline' ) ) { ?>
		<p class="js-stagger text-white"><?php echo get_field( 'hero_tagline' ); ?></p>
	<?php } ?>
<?php } ?>
