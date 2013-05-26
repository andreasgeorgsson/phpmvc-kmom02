<?php
/**
 * Standard controller layout.
 *
 * @package PawCore
 */
class CCIndex implements IController {

	/**
	 * Implementing interface IController. All controllers must have an index action.
	 */
	public function Index() {
		global $paw;
		$paw -> data['title'] = "The Index Controller";
		$paw -> data['main'] = "<h1>The Index Controller</h1>";
	}

}
