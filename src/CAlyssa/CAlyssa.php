<?php
/**
 * Main class for Alyssa, holds everything.
 *
 * @package AlyssaCore
 */

class CAlyssa implements ISingleton {

	private static $instance = null;

	/**
	 * Constructor
	 */
	protected function __construct() {
		// include the site specific config.php and create a ref to $ly to be used by config.php
		$ly = &$this;
		require (ALYSSA_SITE_PATH . '/config.php');
	}

	/**
	 * Singleton pattern. Get the instance of the latest created object or create a new one.
	 * @return CAlyssa The instance of this class.
	 */
	public static function Instance() {
		if (self::$instance == null) {
			self::$instance = new CAlyssa();
		}
		return self::$instance;
	}

	/**
	 * Frontcontroller, check url and route to controllers.
	 */
	public function FrontControllerRoute() {
		// Take current url and divide it in controller, method and parameters
		$this -> request = new CRequest();
		$this -> request -> Init();
		$controller = $this -> request -> controller;
		$method = $this -> request -> method;
		$arguments = $this -> request -> arguments;

		// Is the controller enabled in config.php?
		$controllerExists = isset($this -> config['controllers'][$controller]);
		$controllerEnabled = false;
		$className = false;
		$classExists = false;

		if ($controllerExists) {
			$controllerEnabled = ($this -> config['controllers'][$controller]['enabled'] == true);
			$className = $this -> config['controllers'][$controller]['class'];
			$classExists = class_exists($className);
		}

		// Check if controller has a callable method in the controller class, if then call it
		if ($controllerExists && $controllerEnabled && $classExists) {
			$rc = new ReflectionClass($className);
			if ($rc -> implementsInterface('IController')) {
				if ($rc -> hasMethod($method)) {
					$controllerObj = $rc -> newInstance();
					$methodObj = $rc -> getMethod($method);
					$methodObj -> invokeArgs($controllerObj, $arguments);
				} else {
					die("404. " . get_class() . ' error: Controller does not contain method.');
				}
			} else {
				die('404. ' . get_class() . ' error: Controller does not implement interface IController.');
			}
		} else {
			die('404. Page is not found.');
		}
	}

	/**
	 * ThemeEngineRender, renders the reply of the request.
	 */
	public function ThemeEngineRender() {
		// Get the paths and settings for the theme
		$themeName = $this -> config['theme']['name'];
		$themePath = ALYSSA_INSTALL_PATH . "/themes/{$themeName}";
		$themeUrl = "themes/{$themeName}";

		// Add stylesheet path to the $ly->data array
		$this -> data['stylesheet'] = "{$themeUrl}/style_base.css";

		// Include the global functions.php and the functions.php that are part of the theme
		$ly = &$this;
		$functionsPath = "{$themePath}/functions.php";
		if (is_file($functionsPath)) {
			include $functionsPath;
		}

		// Extract $ly->data to own variables and handover to the template file
		extract($this -> data);
		include ("{$themePath}/default.tpl.php");
	}

}
