<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Content_content_model extends Content_base_model {
	
	protected $stream = 'content';
	
	public function __construct()
	{
		$this->ci =& get_instance();
	}
	
}