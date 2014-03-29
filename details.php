<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Robots
 *
 * Display a robots.txt.
 *
 * @package    Robots
 * @author     Lorenzo Garía <contact@lorenzo-garcia.com>
 * @link       http://lorenzo-garcia.com
 * @license    http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Attribution-ShareAlike 3.0 Unported
 */

class module_robots extends Module
{
	public $version = '1.0';

	public function info()
	{
		$info =  array(
			'name' => array(
				'en' => 'Robots',
				),
			'description' => array(
				'en' => 'Display a robots.txt.',
				),
			'skip_xss' => true,
			'frontend' => true,
			'backend' => false,
			'menu' => false,
			);

        return $info;
    }

    public function install()
    {
        return true;
    }

    public function uninstall()
    {
        return true;
    }

    public function upgrade($old_version)
    {
        return true;
    }

    public function help()
    {
        return "No documentation has been added for this module.<br />Contact the module developer for assistance.";
    }
}
/* End of file details.php */
