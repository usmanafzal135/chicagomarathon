<?php 

	// Remove bottom margin if true
	
	if (get_field('remove_bottom_margin')) {
		echo ' mb-0 '; 
	} else { 
		echo ' mb-2 xl:mb-3 ';
	}
