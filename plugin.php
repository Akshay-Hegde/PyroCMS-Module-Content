<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Plugin for content
 *
 * @author 		Phil Martinez - Philsquare Dev Team
 * @website		http://philsquarelabs.com
 * @package 	PyroCMS
 * @subpackage 	Template Module
 */
class Plugin_Content extends Plugin
{

	public $version = '1.0.0';
	public $name = array(
		'en' => 'Content'
	);
	public $description = array(
		'en' => 'Content'
	);
	
	public function _self_doc()
	{
		$info = array(
			'method' => array(
				'description' => array(
					'en' => ''
				),
				'single' => true,
				'double' => false,
				'variables' => '',
				'attributes' => array(
					'id' => array(
						'type' => 'number',
						'flags' => '',
						'default' => '',
						'required' => true,
					),
				),
			)
		);
	
		return $info;
	}
	
	public function content()
	{
		$this->load->driver('streams');
        $this->load->model('philsquare_content_model', 'content');

        $content = $this->content->all();

		return $content['entries'];
	}

}

/* End of file plugin.php */