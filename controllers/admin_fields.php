<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Content module
 *
 *
 * @author 		Phil Martinez - Philsquare Dev Team
 * @website		http://philsquare.com
 * @package 	PyroCMS
 */

class Admin_fields extends Admin_Controller
{

	/**
	 * The current active section
	 *
	 * @var string
	 */
	protected $section = 'custom_fields';

    public function __construct()
    {
        parent::__construct();

		role_or_die('philsquare_content', 'custom_fields');
    }

	public function index($offset = 0)
	{
		$limit = Settings::get('records_per_page');
		
		$extra = array(
			'title' => 'Custom Fields',
			
			'buttons' => array(
				array(
			        'label'     => lang('global:edit'),
			        'url'       => 'admin/content/fields/form/-assign_id-'
			    ),
			    array(
			        'label'     => lang('global:delete'),
			        'url'       => 'admin/content/fields/delete/-assign_id-',
			        'confirm'   => true,
			    )
			)
		);
		
		$exclude = array(

		);

		$this->streams->cp->assignments_table(
			'content',
			'philsquare_content',
			$limit,
			'admin/content/fields/index',
			true,
			$extra,
			$exclude
		);
	}
	
	public function form($assign_id = null)
	{
		$this->streams->cp->field_form(
			'content',
			'philsquare_content',
			$assign_id ? 'edit' : 'new',
			'admin/content/fields',
			$assign_id,
			array(),
			true,
			array()
		);
	}
	
	public function delete($assign_id)
	{
		$this->streams->cp->teardown_assignment_field($assign_id, true);
		$this->session->set_flashdata('error', 'Field was deleted.');
		redirect('admin/content/fields');
	}
}