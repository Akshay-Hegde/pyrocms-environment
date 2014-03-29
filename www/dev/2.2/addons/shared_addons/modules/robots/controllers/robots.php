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

class robots extends Public_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->template->set_layout('');
		if(ENVIRONMENT == PYRO_STAGING)
			$this->template->build('staging');
		if(ENVIRONMENT == PYRO_PRODUCTION)
			$this->template->build('production');
	}
}
/* End of file robots.php */
