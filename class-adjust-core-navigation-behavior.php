<?php
/**
 * Plugin Name:       Adjust Core Navigation Behavior
 * Description:       Intelligently adjusts WordPress core navigation behavior based on screen size.
 * Plugin URI:        https://github.com/dimikjones/adjust-core-navigation-behavior
 * Version:           1.0.0
 * Requires at least: 6.8
 * Requires PHP:      7.4
 * Author:            Marko Dimitrijevic
 * Author URI:        https://www.linkedin.com/in/diwebdeveloper/
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       adjust-core-navigation-behavior
 *
 * @package AdjustCoreNavigationBehavior
 */

namespace AdjustCoreNavigationBehavior;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main plugin class.
 */
class Adjust_Core_Navigation_Behavior {

	/**
	 * Plugin version.
	 *
	 * @var string
	 */
	const VERSION = '1.0.0';

	/**
	 * Plugin instance.
	 *
	 * @var Adjust_Core_Navigation_Behavior|null
	 */
	private static $instance = null;

	/**
	 * Initialize the plugin.
	 *
	 * @return Adjust_Core_Navigation_Behavior
	 */
	public static function init() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Constructor.
	 */
	private function __construct() {
		$this->init_hooks();
	}

	/**
	 * Initialize hooks.
	 */
	private function init_hooks() {
		// Enqueue frontend scripts.
		\add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}

	/**
	 * Enqueue frontend scripts.
	 */
	public function enqueue_scripts() {
		// Only enqueue on frontend.
		if ( \is_admin() ) {
			return;
		}

		// Get plugin URL.
		$plugin_url = \plugin_dir_url( __FILE__ );

		// Enqueue the main JavaScript file.
		\wp_enqueue_script(
			'adjust-core-navigation-behavior',
			$plugin_url . 'assets/adjust-core-navigation-behavior.js',
			array(),
			self::VERSION,
			array(
				'in_footer' => true,
				'strategy'  => 'defer',
			)
		);
	}

	/**
	 * Activation hook.
	 */
	public static function activate() {
		// Add activation logic here if needed.
	}

	/**
	 * Deactivation hook.
	 */
	public static function deactivate() {
		// Add deactivation logic here if needed.
	}

	/**
	 * Uninstall hook.
	 */
	public static function uninstall() {
		// Add uninstall logic here if needed.
	}
}

// Initialize the plugin.
\add_action( 'plugins_loaded', array( 'AdjustCoreNavigationBehavior\Adjust_Core_Navigation_Behavior', 'init' ) );

// Register activation and deactivation hooks.
\register_activation_hook( __FILE__, array( 'AdjustCoreNavigationBehavior\Adjust_Core_Navigation_Behavior', 'activate' ) );
\register_deactivation_hook( __FILE__, array( 'AdjustCoreNavigationBehavior\Adjust_Core_Navigation_Behavior', 'deactivate' ) );
