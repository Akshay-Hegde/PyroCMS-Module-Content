<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Content Module
 *
 *
 * @author 		Phil Martinez - Philsquare Dev Team
 * @website		http://philsquare.com
 * @package 	PyroCMS
 */

class Admin extends Admin_Controller
{

    /**
     * The current active section
     *
     * @var string
     */
    protected $section = 'content';

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $limit = Settings::get('records_per_page');

        $extra = array(
            'title' => 'Content',

            'buttons' => array(
                array(
                    'label' => 'Edit',
                    'url' => 'admin/content/form/-entry_id-'
                ),
                array(
                    'label' => 'Delete',
                    'url' => 'admin/content/delete/-entry_id-',
                    'confirm' => true
                )
            ),

            'columns' => array()
        );

        $this->streams->cp->entries_table(
            'content',
            'philsquare_content',
            $limit,
            'admin/content/index',
            true,
            $extra
        );
    }

    public function form($id = null)
    {
        $extra = array(
            'return' => 'admin/content',
            'title' => $id ? 'Edit Content' : 'Add Content'
        );

        $this->streams->cp->entry_form(
            'content',
            'philsquare_content',
            $id ? 'edit' : 'new',
            $id,
            true,
            $extra
        );
    }

    public function delete($id = 0)
    {
        $this->streams->entries->delete_entry($id, 'content', 'philsquare_content');
        $this->session->set_flashdata('error', 'Content was deleted.');
        redirect('admin/content');
    }
}