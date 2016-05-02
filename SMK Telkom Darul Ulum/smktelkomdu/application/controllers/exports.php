<?php

class Exports extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->database();
		$this->load->model('momodel','modelp');		
		$this->load->library('pagination');	
	}
	
	function checkSession()
	{
	    if(!$this->session->userdata('email'))
	    {
	    	redirect(base_url(),'refresh');
	   	}
	}
	
	function  export_data_ebook() 
	{
		$this->checkSession();
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 1)
			{
				$data['title'] = 'Menampilkan Data Ebook';
				$data['detail'] = $this->modelp->getEbook();//call the model and save the result in $detail
				$this->load->view('pages/export_data_ebook', $data);
			}
		}
		else
		{
			redirect('pages/denied');
		}
	}

	//function to export to excel
	function toExcelAllEbook() 
	{
		$query['data1'] = $this->modelp->toExcelAllEbook(); 
		$this->load->view('pages/excel_view_ebook',$query);
	}
	
	function  export_data_pengguna() 
	{
		$this->checkSession();
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 1)
			{
				$data['title'] = 'Menampilkan Data Pengguna';
				$data['detail'] = $this->modelp->getPengguna();//call the model and save the result in $detail
				$this->load->view('pages/export_data_pengguna', $data);
			}
		}
	}

	//function to export to excel
	function toExcelAllPengguna() 
	{
		$query['data1'] = $this->modelp->toExcelAllPengguna(); 
		$this->load->view('pages/excel_view_pengguna',$query);
	}
	
		
	
}