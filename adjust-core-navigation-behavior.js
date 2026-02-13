// Initialize
document.addEventListener('DOMContentLoaded', function() {
    // Initial adjustment
    adjustCoreNavigationBehavior();
    
    // Adjust on window resize with debouncing
    window.addEventListener('resize', debounce(adjustCoreNavigationBehavior, 250));
});

/**
 * Debounce utility function to limit how often a function can be called
 * @param {Function} func - The function to debounce
 * @param {number} wait - The wait time in milliseconds
 * @returns {Function} - The debounced function
 */
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

/**
 * Adjust navigation behavior based on screen size and when Open on click toogle enabled
 * - On desktop (>1024px): Remove 'open-on-click' class to enable hover behavior
 * - On mobile (≤1024px): Add 'open-on-click' class to maintain click behavior
 */
function adjustCoreNavigationBehavior() {
    const isDesktop = window.innerWidth > 1024;
    const navItems = document.querySelectorAll('.wp-block-navigation .has-child');
    
    navItems.forEach(item => {
        if (isDesktop) {
            // On desktop: remove open-on-click to allow hover behavior
            item.classList.remove('open-on-click');
        } else {
            // On mobile: ensure open-on-click is present for click behavior
            item.classList.add('open-on-click');
        }
    });
}