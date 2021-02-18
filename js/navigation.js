/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */

(function ($) {
  const $hamburger = $('.menu-toggle');
  const $fullscreenMenu = $('.fullscreen-menu');
  $hamburger.click(() => {
    $fullscreenMenu.toggleClass('toggled');
  });
})(jQuery);
