<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Content_base_model extends Philsquare_stream_model {
	
	protected $namespace = 'philsquare_content';
	
	protected $disable = 'id|created|image|updated|created_by';
	
}