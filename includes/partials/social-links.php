<?php if ( get_field( 'facebook_url', 'option' ) || get_field( 'x_url', 'option' ) || get_field( 'instagram_url', 'option' ) || get_field( 'linkedin_url', 'option' ) || get_field( 'youtube_url', 'option' ) ) { ?>
		<ul class="js-stagger flex flex-wrap justify-center space-x-2 mb-2">
			<?php if ( get_field( 'facebook_url', 'option' ) ) { ?>
				<li class="text-center">
					<a href="<?php echo get_field( 'facebook_url', 'option' ); ?>" class="margin-right-0" target="_blank" rel="noopener noreferrer">
						<i class="icon-svg">
							<svg aria-hidden="true" width="30" height="30" viewBox="0 0 20 20" class="w-2 h-2">
								<path class="fill-primary hover:fill-primary-dark" fill="none" d="M11.344,5.71c0-0.73,0.074-1.122,1.199-1.122h1.502V1.871h-2.404c-2.886,0-3.903,1.36-3.903,3.646v1.765h-1.8V10h1.8v8.128h3.601V10h2.403l0.32-2.718h-2.724L11.344,5.71z"></path>
							</svg><span class="sr-only">Like us on Facebook</span>
						</i>
					</a>
				</li>
			<?php } ?>
			<?php if ( get_field( 'instagram_url', 'option' ) ) { ?>
				<li class="text-center">
					<a href="<?php echo get_field( 'instagram_url', 'option' ); ?>" class="margin-right-0" target="_blank" rel="noopener noreferrer">
						<i class="icon-svg">
						<svg x="0px" y="0px" aria-hidden="true" viewBox="0 0 56.7 56.7" enable-background="new 0 0 56.7 56.7" class="w-2 h-2">
							<g>
								<path  class="fill-primary hover:fill-primary-dark" fill="none" d="M28.2,16.7c-7,0-12.8,5.7-12.8,12.8s5.7,12.8,12.8,12.8S41,36.5,41,29.5S35.2,16.7,28.2,16.7z M28.2,37.7
									c-4.5,0-8.2-3.7-8.2-8.2s3.7-8.2,8.2-8.2s8.2,3.7,8.2,8.2S32.7,37.7,28.2,37.7z"/>
								<circle   class="fill-primary hover:fill-primary-dark" cx="41.5" cy="16.4" r="2.9"/>
								<path  class="fill-primary hover:fill-primary-dark" fill="none" d="M49,8.9c-2.6-2.7-6.3-4.1-10.5-4.1H17.9c-8.7,0-14.5,5.8-14.5,14.5v20.5c0,4.3,1.4,8,4.2,10.7c2.7,2.6,6.3,3.9,10.4,3.9
									h20.4c4.3,0,7.9-1.4,10.5-3.9c2.7-2.6,4.1-6.3,4.1-10.6V19.3C53,15.1,51.6,11.5,49,8.9z M48.6,39.9c0,3.1-1.1,5.6-2.9,7.3
									s-4.3,2.6-7.3,2.6H18c-3,0-5.5-0.9-7.3-2.6C8.9,45.4,8,42.9,8,39.8V19.3c0-3,0.9-5.5,2.7-7.3c1.7-1.7,4.3-2.6,7.3-2.6h20.6
									c3,0,5.5,0.9,7.3,2.7c1.7,1.8,2.7,4.3,2.7,7.2V39.9L48.6,39.9z"/>
							</g>
							</svg><span class="sr-only">Follow us on Instagram</span>
						</i>
					</a>
				</li>
			<?php } ?>
			<?php if ( get_field( 'tiktok_url', 'option' ) ) { ?>
				<li class="text-center">
					<a href="<?php echo get_field( 'tiktok_url', 'option' ); ?>" class="margin-right-0" target="_blank" rel="noopener noreferrer">
						<i class="icon-svg">
							<svg aria-hidden="true" width="30" height="30" viewBox="0 0 512 512" class="w-2 h-2">
								<path class="fill-primary hover:fill-primary-dark" fill="none" d="M412.19,118.66a109.27,109.27,0,0,1-9.45-5.5,132.87,132.87,0,0,1-24.27-20.62c-18.1-20.71-24.86-41.72-27.35-56.43h.1C349.14,23.9,350,16,350.13,16H267.69V334.78c0,4.28,0,8.51-.18,12.69,0,.52-.05,1-.08,1.56,0,.23,0,.47-.05.71,0,.06,0,.12,0,.18a70,70,0,0,1-35.22,55.56,68.8,68.8,0,0,1-34.11,9c-38.41,0-69.54-31.32-69.54-70s31.13-70,69.54-70a68.9,68.9,0,0,1,21.41,3.39l.1-83.94a153.14,153.14,0,0,0-118,34.52,161.79,161.79,0,0,0-35.3,43.53c-3.48,6-16.61,30.11-18.2,69.24-1,22.21,5.67,45.22,8.85,54.73v.2c2,5.6,9.75,24.71,22.38,40.82A167.53,167.53,0,0,0,115,470.66v-.2l.2.2C155.11,497.78,199.36,496,199.36,496c7.66-.31,33.32,0,62.46-13.81,32.32-15.31,50.72-38.12,50.72-38.12a158.46,158.46,0,0,0,27.64-45.93c7.46-19.61,9.95-43.13,9.95-52.53V176.49c1,.6,14.32,9.41,14.32,9.41s19.19,12.3,49.13,20.31c21.48,5.7,50.42,6.9,50.42,6.9V131.27C453.86,132.37,433.27,129.17,412.19,118.66Z"/>
							</svg><span class="sr-only">Follow us on TikTok</span>
						</i>
					</a>
				</li>
			<?php } ?>
			<?php if ( get_field( 'x_url', 'option' ) ) { ?>
				<li class="text-center">
					<a href="<?php echo get_field( 'x_url', 'option' ); ?>" class="margin-right-0" target="_blank" rel="noopener noreferrer">
						<i class="icon-svg">
							<svg aria-hidden="true" width="30" height="30" viewBox="-200 -200 1600 1627" class="w-2 h-2">
								<path class="fill-primary hover:fill-primary-dark" fill="none" d="M714.163 519.284L1160.89 0H1055.03L667.137 450.887L357.328 0H0L468.492 681.821L0 1226.37H105.866L515.491 750.218L842.672 1226.37H1200L714.137 519.284H714.163ZM569.165 687.828L521.697 619.934L144.011 79.6944H306.615L611.412 515.685L658.88 583.579L1055.08 1150.3H892.476L569.165 687.854V687.828Z" fill="white"/>
							</svg><span class="sr-only">Follow us on X</span>
						</i>
					</a>
				</li>
			<?php } ?>
			<?php if ( get_field( 'youtube_url', 'option' ) ) { ?>
				<li class="text-center">
					<a href="<?php echo get_field( 'youtube_url', 'option' ); ?>" class="margin-right-0" target="_blank" rel="noopener noreferrer">
						<i class="icon-svg">
							<svg aria-hidden="true" width="30" height="30" viewBox="0 0 1792 1792" class="w-2 h-2">
								<path class="fill-primary hover:fill-primary-dark" fill="none" d="M711 1128l484-250-484-253v503zm185-862q168 0 324.5 4.5t229.5 9.5l73 4q1 0 17 1.5t23 3 23.5 4.5 28.5 8 28 13 31 19.5 29 26.5q6 6 15.5 18.5t29 58.5 26.5 101q8 64 12.5 136.5t5.5 113.5v176q1 145-18 290-7 55-25 99.5t-32 61.5l-14 17q-14 15-29 26.5t-31 19-28 12.5-28.5 8-24 4.5-23 3-16.5 1.5q-251 19-627 19-207-2-359.5-6.5t-200.5-7.5l-49-4-36-4q-36-5-54.5-10t-51-21-56.5-41q-6-6-15.5-18.5t-29-58.5-26.5-101q-8-64-12.5-136.5t-5.5-113.5v-176q-1-145 18-290 7-55 25-99.5t32-61.5l14-17q14-15 29-26.5t31-19.5 28-13 28.5-8 23.5-4.5 23-3 17-1.5q251-18 627-18z"/>
							</svg><span class="sr-only">Subscribe to our channel on YouTube</span>
						</i>
					</a>
				</li>
			<?php } ?>
		</ul>
<?php } ?>
