/* eslint-disable no-unused-vars */
import accessibleMenu from 'accessible-menu';

const nav = document.querySelector('.js-main-nav');
const menuElement = nav.querySelector('ul');
const controllerElement = document.querySelector('button.menu-toggle');

const menu = new accessibleMenu.TopLinkDisclosureMenu({
    menuElement,
    submenuItemSelector: '.dropdown',
    menuItemSelector: '.menu-item',
    submenuSubtoggleSelector: 'button',
    containerElement: nav,
    controllerElement,
    optionalKeySupport: true,
    hoverType: 'on', // "on", "dynamic"
});
