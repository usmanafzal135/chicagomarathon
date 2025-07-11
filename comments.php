<div id="comments">
	<?php 
		if (post_password_required()) { ?>
			<p>This post is password protected. Enter the password to view any comments</p>
		<?php
			return;
		}
	?>

	<?php if (have_comments()) : ?>
		<h2><?php comments_number(); ?></h2>
		<ol>
			<?php wp_list_comments(array('callback' => 'starkers_comment')); ?>
		</ol>
		<?php
			elseif (!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) :
		?>
	<?php endif; ?>

	<?php comment_form(); ?>
</div>
