<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Content Events
 *
 *
 * @author 		Phil Martinez - Philsquare Dev Team
 * @website		http://philsquare.com
 * @package 	PyroCMS
 */
class Events_content {
    
    protected $ci;
    
    public function __construct()
    {
        $this->ci =& get_instance();
		$this->ci->load->model('search/search_index_m');

		Events::register('whatever', array($this, 'custom'));
    }

	public function custom()
	{
		// Custom trigger set with Events::trigger('whatever')
	}
}