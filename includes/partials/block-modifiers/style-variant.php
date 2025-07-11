<?php 
	
	//Set classes based on style variant

	if (get_sub_field('style_variant') == 'narrow') { 
		echo ' container max-w-screen-md ';
	} elseif (get_sub_field('style_variant') == 'full') { 
		echo ' max-w-full ';
	} elseif (get_sub_field('style_variant') == 'wide') { 
		echo ' container max-w-screen-3xl '; 
	} else { 
		echo ' container max-w-screen-xl '; 
	} 
