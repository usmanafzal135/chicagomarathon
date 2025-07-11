<?php if ( has_nav_menu( 'utility' ) ) { ?>
    <div class="mb-1 flex flex-col lg:flex-row lg:justify-end gap-half lg:gap-x-1 lg:mb-half" :class="!navOpen ? 'max-lg:hidden max-lg:invisible' : ''">
        <?php wp_nav_menu(array(
            'theme_location' => 'utility',
            'container'      => false,
            'menu_class'     => 'no-underline',
            'walker'         => new Utility_Nav_Walker(),
            'depth'          => 1,
            'items_wrap'     => '%3$s'
        )); ?>
    </div>
<?php } ?>
