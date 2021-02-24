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
  const $topLevelMenuItem = $('ul.menu > li > a'); // select the a element because of a styling quirk - the border bottom
  const $topLevelSubMenu = $('.level-0'); //The first level under the top level
  const $secondLevelMenuItem = $('ul.level-0 > li'); //no need to select the a element because the border was applied to the submenu
  const $secondLevelSubMenu = $('.level-1');
  const $fistLevelMenuItemHasChildren = $(
    '.menu > .menu-item-has-children > a'
  );
  const $secondLevelMenuItemHasChildren = $(
    '.level-0 > .menu-item-has-children'
  );

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

    // close all submenus when the hamburger is closed
    $topLevelSubMenu.removeClass('open');
    $secondLevelSubMenu.removeClass('open');
  });

  $topLevelMenuItem.on('click', function (event) {
    if (event.target !== this) {
      return;
    }
    const self = this; // the parent li that is clicked, e.g. About Us
    const target = $(self).parent().find('.level-0'); // the ul submenu under the li e.g. About Us > Our Story
    $(this).parent().find('.level-1').removeClass('open'); //the sub-submenus are always closed when openining a top level menu
    target.toggleClass('open'); // open and close the submenu of the clicked parent li
    $topLevelSubMenu.not(target).each(function () {
      // if the .level-0 ul is not the ul that is the child for the clicked a element
      $(this).removeClass('open'); // close all other submenus
      $(this).find('.level-1').removeClass('open'); // close the sub-submenus
    });
  });

  $secondLevelMenuItem.click(function () {
    const self = this;
    const target = $(self).find('.level-1');
    target.toggleClass('open');

    $secondLevelSubMenu.not(target).each(function () {
      $(this).removeClass('open'); // close all other submenus
    });
  });

  $fistLevelMenuItemHasChildren.click(function () {
    const self = this;
    const target = $(self).parent();
    target.toggleClass('chevron-up');

    $fistLevelMenuItemHasChildren.not($(self)).each(function () {
      $(this).parent().removeClass('chevron-up');
      $secondLevelMenuItemHasChildren.removeClass('chevron-up'); //rotate the chevrons of all submenus to point down
    });
  });

  $secondLevelMenuItemHasChildren.click(function () {
    const self = this;
    $(self).toggleClass('chevron-up');

    $secondLevelMenuItemHasChildren.not($(self)).each(function () {
      $(this).removeClass('chevron-up');
    });
  });

  const $searchForm = $('#searchform');
  const $searchField = $('#search');
  const $searchButton = $('.search-icon');
  $searchForm.submit(function (event) {
    if ($searchField.val() === '') {
      event.preventDefault();
    }
  });
  $searchButton.on('click', function (event) {
    $searchForm.toggleClass('opened');
  });
})(jQuery);
