<?php
	$popup_video_url = get_field( 'popup_video_url' );
?>

<?php
if ( $popup_video_url ) {
	get_template_part( 'includes/partials/hero-popup' );
} else {
	?>
	<div class="absolute-center text-center flex flex-col px-1.5 w-full max-w-screen-md z-auto">
		<?php get_template_part( 'includes/partials/hero-title' ); ?>
	</div>
<?php } ?>
