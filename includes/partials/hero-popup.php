<div class="absolute-center text-center flex flex-col px-1.5 w-full max-w-screen-md z-auto">
	<?php get_template_part( 'includes/partials/hero-title' ); ?>

	<?php
		$popup_video_url   = get_field( 'popup_video_url' );
		$popup_video_title = get_field( 'popup_video_title' );
		$popup_embed_url   = get_video_embed_url( $popup_video_url );
	?>
	<?php if ( $popup_embed_url ) { ?>
		<a id="hero-popup-btn" href="<?php echo $popup_embed_url; ?>" data-type="iframe" class="lightbox js-lightbox js-stagger my-0 mx-auto inline-block">
			<i class="icon-svg icon-play">
				<svg version="1.1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16 16" xml:space="preserve" role="img" class="stroke-none h-[60px] w-[60px] lg:h-[80px] lg:w-[80px]">
					<g transform="translate(-892 -1563.118)">
						<circle class="stroke-none" fill="#008066" cx="899.8" cy="1570.9" r="7.8"/>
						<path class="text-white" fill="#fff" d="M898,1567.7l5.4,3.3l-5.4,3.3V1567.7z"/>
						<title>Play Video</title>
					</g>
				</svg>
			</i>
			<span class="sr-only">Play video about <?php echo $popup_video_title; ?> (opens in a modal window)</span>
		</a>
	<?php } ?>
</div>
