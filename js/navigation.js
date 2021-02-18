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
    if ($topLevelSubMenu.hasClass('open')) {
      $topLevelSubMenu.removeClass('open');
    }
    $(this).find('.level-0').toggleClass('open');
  });
})(jQuery);
