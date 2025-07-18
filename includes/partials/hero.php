<?php
	$background_video_url = get_field( 'background_video_url' );
	$feature_hero = get_field( 'feature_hero' );
?>

<?php if ( has_post_thumbnail() || $background_video_url ) { ?>
	<?php $background_embed_url = apply_filters( 'background_embed_url', $background_video_url ); ?>

	<?php if ( get_the_post_thumbnail() ) { 
		$image_large_url  = get_the_post_thumbnail_url( $post, 'hero-large' );
	?>
		<!-- Preload the largest image -->
		<link rel="preload" href="<?php echo $image_large_url; ?>" as="image">
	<?php } ?>

	<?php if ($feature_hero && is_front_page()) { ?>

	<section class="hero hero-featured js-hidden
		<?php
			if ( ! get_field( 'remove_margin_bottom' ) ) {
				echo 'mb-2 xl:mb-3';
			}
		?>
		">
		<div class="bg-black overflow-hidden relative w-full h-[330px] xl:min-h-[650px] xl:h-[60vh] 2xl:min-h-[800px] 2xl:h-[80vh]

				<?php
				if ( $background_video_url || get_field( 'popup_video_url' ) ) {
					echo 'js-video-hero';
				}
				?>
			"
			>
			<?php if ( get_the_post_thumbnail() ) { ?>
				<?php
					$image_small_url  = get_the_post_thumbnail_url( $post, 'hero-small' );
					$image_medium_url = get_the_post_thumbnail_url( $post, 'hero-medium' );
					$image_large_url  = get_the_post_thumbnail_url( $post, 'hero-large' );
				?>
				
				<picture class="block w-full h-full overflow-hidden !absolute inset-0">
					<source
						media="(min-width: 1200px)"
						srcset="<?php echo $image_large_url; ?>"
					>
					<source
						media="(min-width: 900px)"
						srcset="<?php echo $image_medium_url; ?>"
					>
					<img
						class="object-cover w-full h-full"
						src="<?php echo $image_small_url; ?>"
						style="width:100%"
						alt=""
						loading="eager"
					>
				</picture>
			<?php } ?>

			<?php if ( $background_embed_url ) { ?>
				<div class="absolute-center with-overlay before:bg-opacity-0 before:z-10 w-full h-full">
					<video
						id="hero-video-background"
						preload="none"
						class="lozad h-full w-full object-cover absolute top-0 left-0"
						autoplay
						muted
						loop
						playsinline
						data-src="<?php echo $background_embed_url; ?>"
					>
				</div>
				<button id="hero-video-bg-toggle" class="small clear white absolute left-1 bottom-1 lg:left-2 lg:bottom-2 hidden items-center">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-[1.5em] h-[1.5em]">
						<path d="M15 6.75a.75.75 0 00-.75.75V18a.75.75 0 00.75.75h.75a.75.75 0 00.75-.75V7.5a.75.75 0 00-.75-.75H15zM20.25 6.75a.75.75 0 00-.75.75V18c0 .414.336.75.75.75H21a.75.75 0 00.75-.75V7.5a.75.75 0 00-.75-.75h-.75zM5.055 7.06C3.805 6.347 2.25 7.25 2.25 8.69v8.122c0 1.44 1.555 2.343 2.805 1.628l7.108-4.061c1.26-.72 1.26-2.536 0-3.256L5.055 7.061z" />
					</svg>
					<span id="hero-video-bg-toggle-text" class="ml-0.75">Pause</span><span class="sr-only">background video</span>
				</button>
				<div id="hero-video-loader" class="absolute bottom-2 left-1/2 -translate-x-1/2 mb-1 block">
					<div class="inline-block h-2 w-2 animate-spin rounded-full border-4 border-solid border-current border-r-transparent align-[-0.125em] text-white motion-reduce:animate-[spin_1.5s_linear_infinite]" role="status">
						<span class="sr-only">Loading...</span>
					</div>
				</div>
			<?php } ?>
			
			 <div class="hidden xl:flex items-center justify-center content-overlay absolute top-0 left-0 bottom-0 w-1/3 p-1 bg-no-repeat bg-[length:100vw_auto] bg-[position:left_bottom_-45px]" style="background-color:#012169E6;background-image:url('<?php blogInfo('template_url'); ?>/images/graphics/swoosh-wave.svg');">
				<?php get_template_part( 'includes/partials/hero-overlay' ); ?>
				<?php get_template_part( 'includes/partials/hero-counter' ); ?>
			</div>
		</div>

		<?php get_template_part( 'includes/partials/hero-counter-mobile' ); ?>
	</section>

	<?php } else { ?>
		<?php if(is_front_page()) { ?>
			<section class="hero hero-defualt js-hidden
			<?php
				if ( ! get_field( 'remove_margin_bottom' ) ) {
					echo 'mb-2 xl:mb-3';
				}
			?>
			">
			<div class="bg-black overflow-hidden relative w-full h-auto min-h-[330px]

					<?php
					if ( get_field( 'feature_hero' ) ) {
						echo 'lg:min-h-[650px] lg:h-[60vh] xl:min-h-[800px] xl:h-[80vh]';
					} else {
						echo 'is-default xl:min-h-[500px]';
					}
					?>
					<?php
					if ( $background_video_url || get_field( 'popup_video_url' ) ) {
						echo 'js-video-hero';
					}
					?>
				">
				<?php if ( get_the_post_thumbnail() ) { ?>
					<?php
						$image_small_url  = get_the_post_thumbnail_url( $post, 'hero-small' );
						$image_medium_url = get_the_post_thumbnail_url( $post, 'hero-medium' );
						$image_large_url  = get_the_post_thumbnail_url( $post, 'hero-large' );
					?>

					<picture class="block w-full h-full overflow-hidden !absolute inset-0">
						<source
							media="(min-width: 1200px)"
							srcset="<?php echo $image_large_url; ?>"
						>
						<source
							media="(min-width: 900px)"
							srcset="<?php echo $image_medium_url; ?>"
						>
						<img
							class="object-cover w-full h-full"
							src="<?php echo $image_small_url; ?>"
							style="width:100%"
							alt=""
							loading="eager"
						>
					</picture>
				<?php } ?>

				<?php if ( $background_embed_url ) { ?>
					<div class="absolute-center with-overlay before:bg-opacity-0 before:z-10 w-full h-full">
						<video
							id="hero-video-background" 
							preload="none"
							class="lozad h-full w-full object-cover absolute top-0 left-0" 
							autoplay 
							muted 
							loop 
							playsinline
							data-src="<?php echo $background_embed_url; ?>"
						>
					</div>
					<button id="hero-video-bg-toggle" class="small clear white absolute left-1 bottom-1 lg:left-2 lg:bottom-2 hidden items-center">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-[1.5em] h-[1.5em]">
							<path d="M15 6.75a.75.75 0 00-.75.75V18a.75.75 0 00.75.75h.75a.75.75 0 00.75-.75V7.5a.75.75 0 00-.75-.75H15zM20.25 6.75a.75.75 0 00-.75.75V18c0 .414.336.75.75.75H21a.75.75 0 00.75-.75V7.5a.75.75 0 00-.75-.75h-.75zM5.055 7.06C3.805 6.347 2.25 7.25 2.25 8.69v8.122c0 1.44 1.555 2.343 2.805 1.628l7.108-4.061c1.26-.72 1.26-2.536 0-3.256L5.055 7.061z" />
						</svg>
						<span id="hero-video-bg-toggle-text" class="ml-0.75">Pause</span><span class="sr-only"> background video</span>
					</button>
					<div id="hero-video-loader" class="absolute bottom-2 left-1/2 -translate-x-1/2 mb-1 block">
						<div class="inline-block h-2 w-2 animate-spin rounded-full border-4 border-solid border-current border-r-transparent align-[-0.125em] text-white motion-reduce:animate-[spin_1.5s_linear_infinite]" role="status">
							<span class="sr-only">Loading...</span>
						</div>
					</div>
				<?php } ?>

				<!-- <?php get_template_part( 'includes/partials/hero-overlay' ); ?> -->
			</div>
			
			<?php get_template_part( 'includes/partials/hero-counter' ); ?>

		</section>

		<?php } else { ?>
			<!-- other banner -->
			 <section class="hero js-hidden
				<?php
					if ( ! get_field( 'remove_margin_bottom' ) ) {
						echo 'mb-2 xl:mb-3';
					}
				?>
				">
				<div class="bg-black overflow-hidden relative w-full is-default h-auto min-h-[330px] xl:min-h-[500px]
						
						
						<?php
						if ( $background_video_url || get_field( 'popup_video_url' ) ) {
							echo 'js-video-hero';
						}
						?>
					">
					<?php if ( get_the_post_thumbnail() ) { ?>
						<?php
							$image_small_url  = get_the_post_thumbnail_url( $post, 'hero-small' );
							$image_medium_url = get_the_post_thumbnail_url( $post, 'hero-medium' );
							$image_large_url  = get_the_post_thumbnail_url( $post, 'hero-large' );
						?>
						
						<picture class="block w-full h-full overflow-hidden !absolute inset-0">
							<source
								media="(min-width: 1200px)"
								srcset="<?php echo $image_large_url; ?>"
							>
							<source
								media="(min-width: 900px)"
								srcset="<?php echo $image_medium_url; ?>"
							>
							<img
								class="object-cover w-full h-full"
								src="<?php echo $image_small_url; ?>"
								style="width:100%"
								alt=""
								loading="eager"
							>
						</picture>
					<?php } ?>

					<?php if ( $background_embed_url ) { ?>
						<div class="absolute-center with-overlay before:bg-opacity-0 before:z-10 w-full h-full">
							<video
								id="hero-video-background" 
								preload="none"
								class="lozad h-full w-full object-cover absolute top-0 left-0" 
								autoplay 
								muted 
								loop 
								playsinline
								data-src="<?php echo $background_embed_url; ?>"
							>
						</div>
						<button id="hero-video-bg-toggle" class="small clear white absolute left-1 bottom-1 lg:left-2 lg:bottom-2 hidden items-center">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-[1.5em] h-[1.5em]">
								<path d="M15 6.75a.75.75 0 00-.75.75V18a.75.75 0 00.75.75h.75a.75.75 0 00.75-.75V7.5a.75.75 0 00-.75-.75H15zM20.25 6.75a.75.75 0 00-.75.75V18c0 .414.336.75.75.75H21a.75.75 0 00.75-.75V7.5a.75.75 0 00-.75-.75h-.75zM5.055 7.06C3.805 6.347 2.25 7.25 2.25 8.69v8.122c0 1.44 1.555 2.343 2.805 1.628l7.108-4.061c1.26-.72 1.26-2.536 0-3.256L5.055 7.061z" />
							</svg>
							<span id="hero-video-bg-toggle-text" class="ml-0.75">Pause</span><span class="sr-only"> background video</span>
						</button>
						<div id="hero-video-loader" class="absolute bottom-2 left-1/2 -translate-x-1/2 mb-1 block">
							<div class="inline-block h-2 w-2 animate-spin rounded-full border-4 border-solid border-current border-r-transparent align-[-0.125em] text-white motion-reduce:animate-[spin_1.5s_linear_infinite]" role="status">
								<span class="sr-only">Loading...</span>
							</div>
						</div>
					<?php } ?>

					<div class="side-overlay absolute top-0 left-0 bottom-0 w-full sm:w-[40%] bg-no-repeat bg-[length:200vw_auto] sm:bg-[length:100vw_auto] bg-[position:left_bottom] sm:bg-[position:left_bottom_-40px]" style="background-color:#012169; background-image:url('<?php blogInfo('template_url'); ?>/images/graphics/swoosh-wave.svg')"></div>

					<?php get_template_part( 'includes/partials/hero-overlay' ); ?>
					
				</div>

				<?php get_template_part( 'includes/partials/hero-counter' ); ?>

			</section>
		
		<?php
		}
	}
}