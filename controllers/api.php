<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Content module
 *
 *
 * @author 		Phil Martinez - Philsquare Dev Team
 * @website		http://philsquare.com
 * @package 	PyroCMS
 */

class Api extends Public_Controller
{
	public function __construct()
    {
        parent::__construct();

		// Only AJAX gets through!
	   	if( ! $this->input->is_ajax_request() ) die('Invalid request.');
    }
	
	public function get()
	{
	}
}