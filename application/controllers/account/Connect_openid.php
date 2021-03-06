<?php
/**
 * A3M (Account Authentication & Authorization) is a CodeIgniter 3.x package.
 * It gives you the CRUD to get working right away without too much fuss and tinkering!
 * Designed for building webapps from scratch without all that tiresome login / logout / admin stuff thats always required.
 *
 * @link https://github.com/donjakobo/A3M GitHub repository
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Page to put in adress to openid provider
 * 
 * @package A3M
 * @subpackage Controllers
 */
class Connect_openid extends CI_Controller
{

	/**
	 * Constructor
	 */
	function __construct()
	{
		parent::__construct();

		// Load the necessary stuff...
		$this->load->helper(array('language', 'account/ssl', 'url'));
		$this->load->library(array('account/authentication', 'account/authorization'));
		$this->load->model(array('account/Account_model'));
		$this->load->language(array('general', 'account/sign_in', 'account/account_linked', 'account/connect_third_party'));
	}
	
	/**
	 * Page to specify OpenID provider
	 */
	function index()
	{
		// Enable SSL?
		maintain_ssl($this->config->item("ssl_enabled"));

		// Retrieve sign in user
		if ($this->authentication->is_signed_in())
		{
			$data['account'] = $this->Account_model->get_by_id($this->session->userdata('account_id'));
		}
		
		$this->load->library('form_validation');
		
		// Setup form validation
		$this->form_validation->set_error_delimiters('<span class="alert alert-danger">', '</span>');
		$this->form_validation->set_rules(array(array('field' => 'connect_openid_url', 'label' => 'lang:connect_openid_url', 'rules' => 'trim|required')));

		// Run form validation
		if ($this->form_validation->run())
		{
			$identifier = $this->input->post('connect_openid_url');
			
			//redirect back to connect
			redirect('account/connect/OpenID/'.$identifier);
		}

		$data['content'] = $this->load->view('account/connect_openid', isset($data) ? $data : NULL, TRUE);
		$this->load->view('template', $data);
	}
}
/* End of file Connect_openid.php */
/* Location: ./application/controllers/account/Connect_openid.php */