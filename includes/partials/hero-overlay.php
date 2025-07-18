<?php
	$popup_video_url = get_field( 'popup_video_url' );
?>

<?php
if ( $popup_video_url ) {
	get_template_part( 'includes/partials/hero-popup' );
} elseif(is_front_page()) {
	?>
	<div class="content max-w-[400px] w-full text-white">
        <?php get_template_part( 'includes/partials/hero-title' ); ?>
    </div>
	<div class="absolute-center text-center flex flex-col px-1.5 w-full max-w-screen-md z-auto">
		
	</div>
<?php } else {
	?>
	<div class="content-block relative z-[1] h-full">
		<div class="container h-full py-3 lg:py-[70px] xl:py-[85px]">
			<div class="content text-center sm:text-left text-white max-w-full sm:max-w-[36%] 2xl:max-w-[32%] w-full">
				<?php get_template_part( 'includes/partials/hero-title' ); ?>
			</div>
		</div>
	</div>
	<div class="absolute-center text-center flex flex-col px-1.5 w-full max-w-screen-md z-auto">
		
	</div>
<?php } ?>
