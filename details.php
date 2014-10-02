<?php defined('BASEPATH') or exit('No direct script access allowed');

class Module_Content extends Module {

	public $version = '1.0.0';

	public function info()
	{
		$info = array(
			
			'name' => array(
				'en' => 'Content'
			),
			
			'description' => array(
				'en' => 'Content'
			),
			
			'frontend' => true,
			
			'backend' => true,
			
			'skip_xss' => false,
			
			'menu' => 'content',
			
			'sections' => array(
				'content' => array(
					'name' => 'content:content:title',
					'uri' => 'admin/content',
					'class' => '',
					'shortcuts' => array(
						'create' => array(
							'name' 	=> 'content:content:add',
							'uri' 	=> 'admin/content/form',
							'class' => 'add'
						)
					)
				)
			),
			
			'roles' => array(
				'custom_fields'
			)
		);
		
		// Add section only if they have permission
		if (function_exists('group_has_role'))
		{
			if(group_has_role('philsquare_philsquare', 'custom_fields'))
			{
				$info['sections']['custom_fields'] = array(
					'name' 	=> 'content:custom_fields:title',
					'uri' 	=> 'admin/content/fields',
					'shortcuts' => array(
						'create' => array(
							'name' 	=> 'content:custom_fields:add',
							'uri' 	=> 'admin/content/fields/form',
							'class' => 'add'
						)
					)
				);
			}
		}
		
		return $info;
	}

	public function install()
	{
		$this->load->driver('Streams');
		$this->streams->utilities->remove_namespace('philsquare_content');
		
		if( ! $eventStreamId = $this->streams->streams->add_stream(
			'Content',
			'content',
			'philsquare_content',
			'philsquare_content_',
			'Content'
		)) return false;

		return true;
	}

	public function uninstall()
	{
		$this->load->driver('Streams');
        $this->streams->utilities->remove_namespace('philsquare_content');

        return true;
	}


	public function upgrade($old_version)
	{
		// Upgrade Logic
		
		return true;
	}
}
/* End of file details.php */
