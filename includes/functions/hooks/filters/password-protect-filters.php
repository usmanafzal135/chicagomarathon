<?php 
/*
    Custom the_password_form form.
 */
function password_protect_form_tzo() {
    global $post;
    $label = 'pwbox-' . ( empty( $post->ID ) ? rand() : $post->ID );
    $output = '<section class="block block-html-content block">
                <div class="grid-container narrow">
                    <form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" class="form-inline post-password-form" method="post">
                        <p>' . __( 'This content is password protected. To view it please enter your password below:' ) . '</p>
                        <label for="' . $label . '">' . __( 'Password:' ) . ' <input name="post_password" id="' . $label . '" type="password" size="20" class="form-control" /></label><button type="submit" name="Submit" class="button primary">' . esc_attr_x( 'Enter', 'post password form' ) . '</button>
                    </form>
                </div>
            </section>
            ';
    return $output;
}

add_filter('the_password_form', 'password_protect_form_tzo', 99);

/*
    Do not show password protected pages in archive pages
 */
function hide_password_protected_posts_tzo( $where = '' ) {

    if (!is_single() && !is_admin() && !is_page()) {
        $where .= " AND post_password = ''";
    }

    return $where;
}

add_filter( 'posts_where', 'hide_password_protected_posts_tzo' );