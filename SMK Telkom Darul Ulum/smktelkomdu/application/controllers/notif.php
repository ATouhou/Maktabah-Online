<?php

class Notif extends CI_Controller {

	function __construct()
    {
        parent::__construct();
	}
	
	function success_update_data_diri()
	{
		$this->load->view('notif/success_update_data_diri');		
	}
	
	function failed_update_password()
	{
		$this->load->view('notif/failed_update_password');
		
	}
	
	function failed_login()
	{
		$this->load->view('notif/failed_login');
		
	}
	function success_pesanEbook()
	{
		$this->load->view('notif/success_pesanEbook');
	}
	
	function success_addEbook_kontributor()
	{
		$this->load->view('notif/success_addEbook_kontributor');
	}
	
	function success_update_password()
	{
		$this->load->view('notif/success_update_password');
	}
	
	function success_approve_pengguna()
	{
		$this->load->view('notif/success_approve_pengguna');
		
	}
	
	function success_update_privilege()
	{
		$this->load->view('notif/success_update_privilege');
		
	}
	
	
	
		
	
}