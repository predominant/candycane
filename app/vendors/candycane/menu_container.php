<?php
/**
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class MenuContainer extends Object {

	protected $top_menu = array();

	protected $project_menu = array();

/**
 * constructor
 */
	public function __construct() {
		$this->_initTopMenu();
	}

/**
 * initialize top menu.
 */
	protected function _initTopMenu() {
		$this->top_menu = array(
			'home' => array(
				'url' => '/',
				'class' => 'home',
				'caption' => 'Home',
				'logged' => false,
				'admin' => false
			),
			'mypage' => array(
				'url' => '/my/page',
				'class' => 'my-page',
				'caption' => 'My page',
				'logged' => true,
				'admin' => false
			),
			'projects' => array(
				'url' => '/projects',
				'class' => 'projects',
				'caption' => 'Projects',
				'logged' => false,
				'admin' => false
			),
			'administration' => array(
				'url' => '/admin',
				'class' => 'administration',
				'caption' => 'Administration',
				'logged' => false,
				'admin' => true
			),
			'help' => array(
				'url' => 'https://groups.google.com/group/candycane-users',
				'class' => 'help',
				'caption' => 'Help',
				'logged' => false,
				'admin' => false
			),
		);
	}

/**
 * get top menu items.
 * @param array $currentuser
 * @return array
 */
	public function getTopMenu($currentuser) {
		$temp = array();
		foreach ($this->top_menu as $val) {
			if (
				array_key_exists('logged', $val) &&
				$val['logged'] &&
				!$currentuser['logged']
			) {
				continue;
			}
			if (
				array_key_exists('admin', $val) &&
				$val['admin'] &&
				array_key_exists('admin', $currentuser) &&
				!$currentuser['admin']
			) {
				continue;
			}
			$temp[] = $val;
		}
		return $temp;
	}

/**
 * add item to topmenu.
 * @param array $item
 * @param boolean $first
 */
	public function addTopMenu($item, $first = false) {
		$this->top_menu[] = $item;
	}

}