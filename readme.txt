=== Adjust Core Navigation Behavior ===
Contributors: wpmywork
Requires at Least: 6.8
Tested Up To: 6.9
Tags: navigation, mobile, responsive, user-experience, core-blocks
Stable tag: 1.0.0
License: GPL v2 or later

A WordPress plugin that intelligently adjusts WordPress core navigation behavior based on screen size, specifically addressing issues with the "Open on click" toggle option.

== Description ==

WordPress core navigation has inconsistent behavior between mobile and desktop devices when the "Open on click" toggle is enabled:

**Mobile Navigation Issues**
* Without "Open on click": Submenus on mobile devices have strange behavior where users cannot easily close an opened submenu item without tapping somewhere else on the screen.
* With "Open on click": This option fixes the mobile navigation issue by requiring explicit clicks to open/close submenus.

**Desktop Navigation Issues**
* With "Open on click" enabled: Desktop users are forced to click on parent menu items to open submenus, which is unexpected and breaks the standard hover behavior that desktop users expect.
* Without "Open on click": Desktop navigation works correctly with hover behavior, but mobile navigation suffers.

**The Solution**

This plugin automatically separates the navigation behavior based on screen size:

* On mobile devices (≤ 1024px): Automatically applies the `open-on-click` class to navigation items with submenus, enabling the click-based interaction that mobile users need.
* On desktop devices (> 1024px): Removes the `open-on-click` class from navigation items, restoring the expected hover behavior for desktop users.

This creates an optimal user experience where:
* Mobile users get click-based navigation that's easy to use on touch devices
* Desktop users get hover-based navigation that's intuitive and expected

**How It Works**

The plugin includes a JavaScript file that:

1. Detects screen size on page load using a 1024px breakpoint (common tablet/desktop boundary)
2. Applies appropriate classes to navigation items with children (`.wp-block-navigation .has-child`)
3. Listens for window resize events with debouncing (250ms delay) for performance
4. Adjusts behavior dynamically when users resize their browser or rotate devices

== Installation ==

1. Upload the `adjust-core-navigation-behavior` folder to `/wp-content/plugins/`
2. Activate the plugin through the 'Plugins' menu in WordPress
3. The script will automatically run on all pages with WordPress core navigation blocks

No configuration required - the plugin works automatically out of the box.

Note: Your theme is utilizing required css for mobile sub menu behavior
which is aria-expanded="false" and aria-expanded="true" so that is on you.

== Frequently Asked Questions ==

= What problem does this plugin solve? =

This plugin solves the WordPress navigation UX problem where mobile and desktop behaviors conflict when using the "Open on click" toggle option. It provides mobile users with click-based navigation while giving desktop users hover-based navigation.

= Does this plugin work with all WordPress themes? =

Yes, this plugin works with any theme that uses WordPress core navigation blocks (`.wp-block-navigation`). It specifically targets the standard WordPress navigation block structure and items that contain sub menu items and when Open on click toogle option is enabled.

= What screen size breakpoint does the plugin use? =

The plugin uses a 1024px breakpoint, which is a common boundary between tablet and desktop screens. You can modify this in the JavaScript file if needed for specific design requirements.

= Does the plugin affect performance? =

No, the plugin is lightweight (less than 2KB) and uses debounced resize events (250ms delay) to prevent performance issues. It has no external dependencies.

= Can I customize the breakpoint? =

Yes, you can modify the breakpoint (1024px) in the JavaScript file if needed for specific design requirements.

== Changelog ==

= 1.0.0 =
* Initial release
* Automatic navigation behavior adjustment based on screen size
* Mobile (≤1024px): Enables click-based navigation
* Desktop (>1024px): Enables hover-based navigation
* Debounced resize events for performance
* Compatible with WordPress core navigation blocks

== Upgrade Notice ==

= 1.0.0 =
Initial release of the plugin.