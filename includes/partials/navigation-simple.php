<div class="main-navigation js-main-navigation" id="main-navigation">
    <?php if ( has_nav_menu( 'primary' ) ) {
        wp_nav_menu( array(
            'theme_location' => 'primary',
            'container'      => false,
            'menu_class'     => 'vertical large-horizontal menu',
            'items_wrap'     => '<ul id="%1$s" class="%2$s" data-responsive-menu="accordion large-dropdown" data-submenu-toggle="true">%3$s</ul>',
            'walker'         => new FoundationMenu()
        ) );
    } ?>

    <button class="close-menu hide-for-large js-toggle-active" data-toggleclass="js-main-navigation">
        <i class="icon-svg icon-white icon-small">
            <svg aria-hidden="true" viewBox="0 0 20 20">
                <path fill="none" d="M11.469,10l7.08-7.08c0.406-0.406,0.406-1.064,0-1.469c-0.406-0.406-1.063-0.406-1.469,0L10,8.53l-7.081-7.08
                c-0.406-0.406-1.064-0.406-1.469,0c-0.406,0.406-0.406,1.063,0,1.469L8.531,10L1.45,17.081c-0.406,0.406-0.406,1.064,0,1.469
                c0.203,0.203,0.469,0.304,0.735,0.304c0.266,0,0.531-0.101,0.735-0.304L10,11.469l7.08,7.081c0.203,0.203,0.469,0.304,0.735,0.304
                c0.267,0,0.532-0.101,0.735-0.304c0.406-0.406,0.406-1.064,0-1.469L11.469,10z"></path>
            </svg>
            <span class="show-for-sr">Close Menu</span>
        </i>
    </button>
</div>