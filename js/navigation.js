/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */

(function ($) {
  const siteNavigation = document.getElementById('site-navigation');
  const $hamburger = $('.menu-toggle');
  const $fullscreenMenu = $('.fullscreen-menu');
  const $topLevelMenuItem = $('ul.menu > li');
  const $topLevelSubMenu = $('.level-0'); //The first level under the top level
  const $secondLevelMenuItem = $('ul.level-0 > li');
  const $secondLevelSubMenu = $('.level-1');

  if (!siteNavigation) {
    return;
  }

  if (typeof $hamburger === 'undefined') {
    return;
  }

  if (typeof $fullscreenMenu === 'undefined') {
    return;
  }

  $hamburger.click(() => {
    $fullscreenMenu.toggleClass('toggled');
    $hamburger.toggleClass('change');
  });

  $topLevelMenuItem.click(function () {
    const self = this; // the parent li that is clicked, e.g. About Us
    const target = $(self).find('.level-0'); // the ul submenu under the li e.g. About Us > Our Story
    target.toggleClass('open'); // open and close the submenu of the clicked parent li

    $topLevelSubMenu.not(target).each(function () {
      $(this).removeClass('open'); // close all other submenus
    });
  });
})(jQuery);
