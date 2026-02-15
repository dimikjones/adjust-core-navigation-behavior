# Adjust Core Navigation Behavior

A WordPress plugin that intelligently adjusts WordPress core navigation behavior based on screen size, specifically addressing issues with the "Open on click" toggle option.

## The Problem

WordPress core navigation has inconsistent behavior between mobile and desktop devices when the "Open on click" toggle is enabled:

### Mobile Navigation Issues
- **Without "Open on click"**: Submenus on mobile devices have strange behavior where users cannot easily close an opened submenu item without tapping somewhere else on the screen.
- **With "Open on click"**: This option fixes the mobile navigation issue by requiring explicit clicks to open/close submenus.

### Desktop Navigation Issues
- **With "Open on click" enabled**: Desktop users are forced to click on parent menu items to open submenus, which is unexpected and breaks the standard hover behavior that desktop users expect.
- **Without "Open on click"**: Desktop navigation works correctly with hover behavior, but mobile navigation suffers.

## The Solution

This plugin automatically separates the navigation behavior based on screen size:

- **On mobile devices (≤ 1024px)**: Automatically applies the `open-on-click` class to navigation items with submenus, enabling the click-based interaction that mobile users need.
- **On desktop devices (> 1024px)**: Removes the `open-on-click` class from navigation items, restoring the expected hover behavior for desktop users.

This creates an optimal user experience where:
- Mobile users get click-based navigation that's easy to use on touch devices
- Desktop users get hover-based navigation that's intuitive and expected

## How It Works

The plugin includes a JavaScript file that:

1. **Detects screen size** on page load using a 1024px breakpoint (common tablet/desktop boundary)
2. **Applies appropriate classes** to navigation items with children (`.wp-block-navigation .has-child`)
3. **Listens for window resize events** with debouncing (250ms delay) for performance
4. **Adjusts behavior dynamically** when users resize their browser or rotate devices

### Technical Implementation

```javascript
// Core logic:
const isDesktop = window.innerWidth > 1024;
const navItems = document.querySelectorAll('.wp-block-navigation .has-child');

navItems.forEach(item => {
    if (isDesktop) {
        item.classList.remove('open-on-click');  // Desktop: hover behavior
    } else {
        item.classList.add('open-on-click');     // Mobile: click behavior
    }
});
```

## Installation

1. Upload the `adjust-core-navigation-behavior` folder to `/wp-content/plugins/`
2. Activate the plugin through the 'Plugins' menu in WordPress
3. The script will automatically run on all pages with WordPress core navigation blocks

## Requirements

- WordPress 6.8+ (with core navigation blocks)
- Modern browser with JavaScript enabled
- Your theme is utilizing required css for mobile sub menu behavior
which is aria-expanded="false" and aria-expanded="true" so that is on you.

## Browser Compatibility

- Chrome 60+
- Firefox 55+
- Safari 11+
- Edge 79+
- iOS Safari 11+
- Android Chrome 60+

## Performance Considerations

- Uses debounced resize events (250ms) to prevent performance issues
- Lightweight implementation (less than 2KB)
- No external dependencies
- Runs only on pages with WordPress core navigation blocks with sub menu items and with Open on click option

## Customization

The breakpoint (1024px) can be modified in the JavaScript file if needed for specific design requirements.

## License

GPL v2 or later