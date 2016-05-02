<?php

class Pages extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->database();
		$this->load->model('momodel','modelp');		
	}
	
	
	
	//---------------------------------------------------AKUN ---------------------------------------------------
	function index()
	{	
		$this->load->view('home/home');
		
	}
	
	
	function login_action()
	{
	
		$email = $this->input->post('email');
		$passwd = $this->input->post('passwd');
		
		$data['result']=$this->modelp->cekLogin($email,md5($passwd));
		foreach($data['result'] as $rows)
		{
			$data['privilege'] = $rows['privilege'];
		}
		
		if(isset($data['privilege'])){			
			$this->session->set_userdata(array(
	                            'email'       => $email,
	                            'privilege'	=> $data['privilege']	                            
	                          ));
			redirect('pages/dashboard');
		}
		else{
		
			redirect('notif/failed_login');
		}
	}

	
	function checkSession()
	{
	    if(!$this->session->userdata('email'))
	    {
	    	redirect(base_url(),'refresh');
	   	}
	}
	
	function logout()
	{
		$this->session->sess_destroy();
   		redirect(base_url(),'refresh');
	}	
	
	
	
	
	function v_login($page = 'login')
	{
		if($this->session->userdata('email'))
		{
			$data['isi'] = "pages/dashboard";
			$this->load->view('templates/sidebar',$data);
		}
		else 
		{
			$this->load->view('pages/login');
		}
	}
	
		
	
	
	
	
	//--------------------------------------------------- PAGE | EBOOK ---------------------------------------------------
	
	function register($page = 'register')
	{
		if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter
		$this->load->view('pages/'.$page, $data);		
	}
	
	function dashboard()
	{
		$this->checkSession();
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 1)
			{
				$data['isi'] = "pages/dashboard";
				$this->load->view('templates/sidebar', $data);		
			}
			else if ($this->session->userdata('privilege') == 2)
			{
				$data['isi'] = "pages/dashboard";
				$this->load->view('templates/sidebar_user', $data);						
			}
			else 
			{
				redirect('pages/denied');				
			}
		}
	}
	
	
	function home($page = 'home')
	{
		if ( ! file_exists(APPPATH.'/views/home/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter
		$this->load->view('home/'.$page, $data);		
	} 

	function registrasi_action()
	{
		
		$email_pgn = $this->input->post('Email');
		$nama_pgn = $this->input->post('Name');		
		$password_pgn = $this->input->post('Password');
		
		$data['result'] = $this->modelp->select_email();
		$status = false;
		foreach($data['result'] as $rows)
		{						
			if($email_pgn == $rows['email'])
			{
				$status = true;
				break;
			}	
		}
		if($status == true )
			redirect('pages/failed_register');
		else 
		{
			$this->modelp->insertPengguna($email_pgn,$nama_pgn,md5($password_pgn));
			redirect('pages/waiting');		
		}
			
	}
			
	function data_pengguna()
	{
		$this->checkSession();
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 1)
			{
				
				$data['result'] = $this->modelp->selectPengguna();
				foreach($data['result'] as $rows)
				{
					$data['tanggal_dft'] 	= $rows['TANGGAL_DFT'];
					$data['email'] 			= $rows['EMAIL'];
					$data['nama'] 			= $rows['NAMA'];
					$data['privilege'] 		= $rows['PRIVILEGE'];
					$data['status_pgn'] 	= $rows['STATUS_PGN'];		
				}				
				$data['isi'] = "pages/data_pengguna";
				$this->load->view('templates/sidebar', $data);		
			}
			else 
			{
				redirect('pages/denied');				
			}			
		}			
	}
	
	function pesan_ebook($page = 'pesan_ebook')
	{
		$this->checkSession();
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 2)
			{
				if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
				{
					// Whoops, we don't have a page for that!
					show_404();
				}

				$data['isi'] = "pages/pesan_ebook";
				$this->load->view('templates/sidebar_user', $data);	
			}
			else
			{
				redirect('pages/denied');
			}
		}
	}	
	
	function insertPesanEbook()
	{
		$this->checkSession();
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 2)
			{
				$email = $this->session->userdata('email');
				$kategori = $this->input->post('kategori');		
				$judul = $this->input->post('judul');				
						
				$this->modelp->insertPesanEbook($email, $kategori, $judul);				
				redirect('notif/success_pesanEbook');	
			}
		}
	}	
	
	function data_ebook()
	{
		$this->checkSession();
		//echo "<script>alert('".$this->session->userdata('email')."');</script>";
				//echo "<script>alert('".$this->session->userdata('privilege')."');</script>";
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 1)
			{				
				$data['result'] = $this->modelp->selectEbook();
				foreach($data['result'] as $rows)
				{
					$data['kategori'] 	= $rows['KATEGORI'];
					$data['judul'] 		= $rows['JUDUL'];
					$data['pengarang'] = $rows['PENGARANG'];
					$data['penerbit'] 	= $rows['PENERBIT'];
					$data['tahun'] 		= $rows['TAHUN'];		
				}

				$data['isi'] = "pages/data_ebook";				
				$this->load->view('templates/sidebar', $data);		
			}
			
			else if($this->session->userdata('privilege') == 2)
			{	
							
				$data['result'] = $this->modelp->selectEbook();
				foreach($data['result'] as $rows)
				{
					$data['kategori'] 	= $rows['KATEGORI'];
					$data['judul'] 		= $rows['JUDUL'];
					$data['pengarang'] = $rows['PENGARANG'];
					$data['penerbit'] 	= $rows['PENERBIT'];
					$data['tahun'] 		= $rows['TAHUN'];		
				}

				$data['isi'] = "pages/data_ebook";				
				$this->load->view('templates/sidebar_user', $data);		
			}
			
			else
			{
				redirect('pages/denied');
				
			}
			
		}		
	}
	
	function lihat_kontribusi_saya()
	{
		$this->checkSession();
		
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 2)
			{	
							
				$data['result'] = $this->modelp->selectLihatKontribusiSaya($this->session->userdata('email'));
				foreach($data['result'] as $rows)
				{
					$data['kategori'] 	= $rows['KATEGORI'];
					$data['judul'] 		= $rows['JUDUL'];
					$data['pengarang'] = $rows['PENGARANG'];
					$data['penerbit'] 	= $rows['PENERBIT'];
					$data['tahun'] 		= $rows['TAHUN'];		
				}

				$data['isi'] = "pages/lihat_kontribusi_saya";				
				$this->load->view('templates/sidebar_user', $data);		
			}
			
			else
			{
				redirect('pages/denied');
				
			}
			
		}		
	}
	
	function approve_ebook()
	{
		$this->checkSession();
		
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 1)
			{				
				$data['result'] = $this->modelp->selectApproveEbook($this->session->userdata('id_ebook'));
				foreach($data['result'] as $rows)
				{
					$data['kategori'] 	= $rows['KATEGORI'];
					$data['judul'] 		= $rows['JUDUL'];
					$data['pengarang'] 	= $rows['PENGARANG'];
					$data['penerbit'] 	= $rows['PENERBIT'];
					$data['tahun'] 		= $rows['TAHUN'];		
					
					
				}

				$data['isi'] = "pages/approve_ebook";				
				$this->load->view('templates/sidebar', $data);		
			}
		}		
	}
	
	function approve_detail_ebook()
	{
		$data['id_ebook'] = $this->uri->segment(3);	
		
		$this->checkSession();
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 1)
			{								
				$data['result'] = $this->modelp->selectApproveEbookByID($data['id_ebook']);
				foreach($data['result'] as $rows)
				{
					$data['id_ebook']	= $rows['ID_EBOOK'];
					$data['kategori'] 	= $rows['KATEGORI'];
					$data['judul'] 		= $rows['JUDUL'];
					$data['pengarang'] = $rows['PENGARANG'];
					$data['penerbit'] 	= $rows['PENERBIT'];
					$data['tahun'] 		= $rows['TAHUN'];	
					$data['sinopsis'] 	= $rows['SINOPSIS'];	
					$data['path_ebook']	= $rows['PATH_EBOOK'];		
				}
				$data['isi'] = "pages/approve_detail_ebook";
				$this->load->view('templates/sidebar', $data);		
			}
			
			else
			{
				$this->load->view('pages/denied');
			}
		}
	}
	
	function approve_action()
	{
		$id_ebook = $this->input->post('id_ebook');
		$pilih	= $this->input->post('pilih');
		
		$this->checkSession();
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') ==1)
			{				
				
				
				$this->modelp->approveEbookAction($id_ebook,$pilih);				
				redirect('pages/success_approve_ebook');
			}
			else
			{
				redirect('pages/denied');				
			}		
		}		
	}
	
	function ebook_disapprove()
	{
		$this->checkSession();
		
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 1)
			{				
				$data['result'] = $this->modelp->selectEbookDisapprove($this->session->userdata('id_ebook'));
				foreach($data['result'] as $rows)
				{
					$data['kategori'] 	= $rows['KATEGORI'];
					$data['judul'] 		= $rows['JUDUL'];
					$data['pengarang'] = $rows['PENGARANG'];
					$data['penerbit'] 	= $rows['PENERBIT'];
					$data['tahun'] 		= $rows['TAHUN'];		
				}

				$data['isi'] = "pages/ebook_disapprove";				
				$this->load->view('templates/sidebar', $data);		
			}
		}		
	}
	
	function data_ebook_guest()
	{
		$data['result'] = $this->modelp->selectEbook();
		
		$data['isi'] = "pages/data_ebook_guest";				
		$this->load->view('templates/sidebar_guest', $data);
	}

	function detail_ebook()
	{
		
		$this->checkSession();
		$data['id_ebook'] = $this->uri->segment(3);
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 1)
			{			
				
				$data['id_ebook'] = $this->uri->segment(3);	
		
		
						
				$data['result'] = $this->modelp->selectEbookByID($data['id_ebook']);
				foreach($data['result'] as $rows)
				{
					$data['id_ebook'] 	= $rows['ID_EBOOK'];
					$data['kategori'] 	= $rows['KATEGORI'];
					$data['judul'] 		= $rows['JUDUL'];
					$data['pengarang'] = $rows['PENGARANG'];
					$data['penerbit'] 	= $rows['PENERBIT'];
					$data['tahun'] 		= $rows['TAHUN'];	
					$data['sinopsis'] 	= $rows['SINOPSIS'];
					$data['path_ebook'] 	= $rows['PATH_EBOOK'];
	

				}
				$data['isi'] = "pages/detail_ebook_guest";
				$this->load->view('templates/sidebar', $data);		
			}
			else if($this->session->userdata('privilege') == 2)
			{								
				$data['id_ebook'] = $this->uri->segment(3);	
		
		
						
				$data['result'] = $this->modelp->selectEbookByID($data['id_ebook']);
				foreach($data['result'] as $rows)
				{
					$data['id_ebook'] 	= $rows['ID_EBOOK'];
					$data['kategori'] 	= $rows['KATEGORI'];
					$data['judul'] 		= $rows['JUDUL'];
					$data['pengarang'] = $rows['PENGARANG'];
					$data['penerbit'] 	= $rows['PENERBIT'];
					$data['tahun'] 		= $rows['TAHUN'];	
					$data['sinopsis'] 	= $rows['SINOPSIS'];
					$data['path_ebook'] 	= $rows['PATH_EBOOK'];
	

				}
				$data['isi'] = "pages/detail_ebook_guest";
				$this->load->view('templates/sidebar_user', $data);		
			} 
			else
			{
				$this->load->view('pages/denied');
			}
		}

		
	}

	function detail_ebook_guest()
	{
		$data['id_ebook'] = $this->uri->segment(3);	
		
		
						
				$data['result'] = $this->modelp->selectEbookByID($data['id_ebook']);
				foreach($data['result'] as $rows)
				{
					$data['id_ebook'] 	= $rows['ID_EBOOK'];
					$data['kategori'] 	= $rows['KATEGORI'];
					$data['judul'] 		= $rows['JUDUL'];
					$data['pengarang'] = $rows['PENGARANG'];
					$data['penerbit'] 	= $rows['PENERBIT'];
					$data['tahun'] 		= $rows['TAHUN'];	
					$data['sinopsis'] 	= $rows['SINOPSIS'];
					$data['path_ebook'] 	= $rows['PATH_EBOOK'];
	

				}
				$data['isi'] = "pages/detail_ebook_guest";
				$this->load->view('templates/sidebar_guest', $data);		
			
			
	}
	
	function add_ebook($page = 'add_ebook')
	{
		$this->checkSession();
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 1)
			{
				if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
				{
					// Whoops, we don't have a page for that!
					show_404();
				}

				$data['isi'] = "pages/add_ebook";
				$this->load->view('templates/sidebar', $data);		
			}
			else
			{
				$this->load->view('pages/denied');
			}
		}
	}
	
	function status_pesanan_saya()
	{
		$this->checkSession();
		
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 2)
			{

				
				$data['result']	= $this->modelp->status_pesanan_saya($this->session->userdata('email'));
				foreach($data['result'] as $rows)
				{						
					$data['id_psn']							= $rows['id_psn'];
					$data['tgl_upload']						= $rows['tgl_upload'];
					$data['judul']								= $rows['judul'];
					$data['kategori']						= $rows['kategori'];
					$data['status_psn']						= $rows['status_psn'];
				}
				
				$data['isi'] = "pages/status_pesanan_saya";
				$this->load->view('templates/sidebar_user', $data);	
			}
			else
			{
				$this->load->view('pages/denied');
			}
		}
	}
	
	function status_kontribusi_saya()
	{
		$this->checkSession();
		
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 2)
			{
				$data['result']	= $this->modelp->status_kontribusi_saya($this->session->userdata('email'));
				foreach($data['result'] as $rows)
				{											
					$data['tgl_upload']						= $rows['TGL_UPLOAD'];
					$data['judul']							= $rows['JUDUL'];
					$data['kategori']						= $rows['KATEGORI'];
					$data['status_ebook']					= $rows['STATUS_EBOOK'];
				}
				
				$data['isi'] = "pages/status_kontribusi_saya";
				$this->load->view('templates/sidebar_user', $data);	
			}
			else
			{
				$this->load->view('pages/denied');
			}
		}
	}
	
	function approve_pengguna()
	{		
		$this->checkSession();
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 1)
			{

				$data['result'] = $this->modelp->selectApprovePengguna();
				foreach($data['result'] as $rows)
				{
					$data['tanggal_dft'] 	= $rows['TANGGAL_DFT'];
					$data['email'] 			= $rows['EMAIL'];
					$data['nama'] 			= $rows['NAMA'];
					$data['privilege'] 		= $rows['PRIVILEGE'];
					$data['status_pgn'] 	= $rows['STATUS_PGN'];		
				}
				
				$data['isi'] = "pages/approve_pengguna";
				$this->load->view('templates/sidebar', $data);		
			}
			else
			{
				$this->load->view('pages/denied');
			}
		}		
	}
	
	function disapprove_pengguna()
	{		
		$this->checkSession();
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 1)
			{

				$data['result'] = $this->modelp->selectDisapprovePengguna();
				foreach($data['result'] as $rows)
				{
					$data['tanggal_dft'] 	= $rows['TANGGAL_DFT'];
					$data['email'] 			= $rows['EMAIL'];
					$data['nama'] 			= $rows['NAMA'];
					$data['privilege'] 		= $rows['PRIVILEGE'];
					$data['status_pgn'] 	= $rows['STATUS_PGN'];		
				}
				
				$data['isi'] = "pages/disapprove_pengguna";
				$this->load->view('templates/sidebar', $data);		
			}
			else
			{
				$this->load->view('pages/denied');
			}
		}		
	}
	
	function approve_pengguna_action()
	{
		$data['email']=urldecode($this->uri->segment(3));
		
		$this->checkSession();
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 1)
			{
				$data['result'] = $this->modelp->select_approve_pengguna_action($data['email']);
				foreach($data['result'] as $rows)
				{
					$data['tanggal_dft'] 	= $rows['TANGGAL_DFT'];
					$data['email'] 			= $rows['EMAIL'];
					$data['nama'] 			= $rows['NAMA'];	
				}
				
				$data['isi'] = "pages/approve_pengguna_action";
				$this->load->view('templates/sidebar', $data);		
			}
			else
			{
				$this->load->view('pages/denied');
			}
		}
	}
	
	function approve_pengguna_bt()
	{
		$this->checkSession();
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 1)
			{
					$email					= $this->input->post('email_user');
					$tindakan_approve_user 	= $this->input->post('tindakan_approve_user');
					$privilege				= $this->input->post('tindakan_approve_privilege');
					
					if($tindakan_approve_user == 1)
					{
						$this->modelp->updateStatusUser($email,$tindakan_approve_user);
						if($privilege == 1)
						{
							$this->modelp->updatePrivilegeUser($email,$privilege);							
						}
						else if($privilege == 2)
						{
							$this->modelp->updatePrivilegeUser($email,$privilege);
						}						
					}
					else if($tindakan_approve_user == 2)
					{
						$this->modelp->updateStatusUser($email,$tindakan_approve_user);					
					}
					
					redirect('notif/success_approve_pengguna');
			}
		}
	}
		
	function update_data_diri()
	{
		$this->checkSession();		
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') >= 1)
			{
				$data['result'] = $this->modelp->select_update_pengguna_action($this->session->userdata('email'));
				foreach($data['result'] as $rows)
				{
					$data['tanggal_dft'] 	= $rows['TANGGAL_DFT'];
					$data['email'] 			= $rows['EMAIL'];
					$data['nama'] 			= $rows['NAMA'];
					$data['privilege'] 		= $rows['PRIVILEGE'];
					$data['status_pgn'] 	= $rows['STATUS_PGN'];		
				}
				
				$data['isi'] = "pages/update_data_diri";
				if($this->session->userdata('privilege')==1)
				{
					$this->load->view('templates/sidebar', $data);		
				}				
				else if($this->session->userdata('privilege')==2)
				{
					$this->load->view('templates/sidebar_user',$data);
				}	
			}
			else
			{
				$this->load->view('pages/denied');
			}
		}			
	}
	
	function update_data_diri_bt()
	{
		$this->checkSession();
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') >=1 )
			{	
				$nama		= $this->input->post('nama');
				$email		= $this->input->post('email_user');
				
				$this->modelp->update_data_diri_bt($email,$nama); 					
				
			}
		}
		redirect('notif/success_update_data_diri');
	}
	
	
	function update_password()
	{
		$this->checkSession();		
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') >= 1)
			{
				$data['result'] = $this->modelp->select_update_pengguna_action($this->session->userdata('email'));
				foreach($data['result'] as $rows)
				{
					$data['tanggal_dft'] 	= $rows['TANGGAL_DFT'];
					$data['email'] 			= $rows['EMAIL'];
					$data['nama'] 			= $rows['NAMA'];
					$data['privilege'] 		= $rows['PRIVILEGE'];
					$data['status_pgn'] 	= $rows['STATUS_PGN'];		
				}
				
				$data['isi'] = "pages/update_password";
				if($this->session->userdata('privilege')==1)
				{
					$this->load->view('templates/sidebar', $data);		
				}				
				else if($this->session->userdata('privilege')==2)
				{
					$this->load->view('templates/sidebar_user',$data);
				}	
			}
			else
			{
				$this->load->view('pages/denied');
			}
		}			
	}
	
	function update_password_bt()
	{
		$this->checkSession();
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') >=1 )
			{	
				$nama							= $this->input->post('nama');
				$email							= $this->input->post('email_user');
				$passwd_lama					= $this->input->post('passwd_lama');
				$passwd_baru					= $this->input->post('passwd_baru');
				
				$data['result'] = $this->modelp->select_update_pengguna_action($this->session->userdata('email'));
				foreach($data['result'] as $rows)
				{
					if(md5($passwd_lama) == $rows['PASSWD'])
					{
						$this->modelp->update_password($email,md5($passwd_baru)); 					
						redirect('notif/success_update_password');
					}	
					else 
					{
						redirect('notif/failed_update_password');
						
					}
				}
			}
		}
		
	}
	
	function update_pengguna()
	{
		$this->checkSession();
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 1)
			{
				
				$data['result'] = $this->modelp->selectUpdatePrivilegePengguna();
				foreach($data['result'] as $rows)
				{
					$data['tanggal_dft'] 	= $rows['TANGGAL_DFT'];
					$data['email'] 			= $rows['EMAIL'];
					$data['nama'] 			= $rows['NAMA'];
					$data['privilege'] 		= $rows['PRIVILEGE'];
					$data['status_pgn'] 	= $rows['STATUS_PGN'];		
				}
				
				$data['isi'] = "pages/update_pengguna";
				$this->load->view('templates/sidebar', $data);		

			}
			else
			{
				$this->load->view('pages/denied');
			}
		}			
	}
	
	function update_pengguna_action()
	{
		$data['email']=urldecode($this->uri->segment(3));
		
		$this->checkSession();
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 1)
			{
				$data['result'] = $this->modelp->select_update_pengguna_action($data['email']);
				foreach($data['result'] as $rows)
				{
					$data['tanggal_dft'] 	= $rows['TANGGAL_DFT'];
					$data['email'] 			= $rows['EMAIL'];
					$data['nama'] 			= $rows['NAMA'];	
					$data['privilege']		= $rows['PRIVILEGE'];
				}
				
				$data['isi'] = "pages/update_pengguna_action";
				$this->load->view('templates/sidebar', $data);		
			}
			else
			{
				$this->load->view('pages/denied');
			}
		}
	}
	
	function update_pengguna_bt()
	{
		$this->checkSession();
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 1)
			{
				$email								= $this->input->post('email_user');					
				$privilege							= $this->input->post('tindakan_approve_privilege');
				
				if($privilege == 1)
				{
					$this->modelp->updatePrivilegeUser($email,$privilege);							
				}
				else if($privilege == 2)
				{
					$this->modelp->updatePrivilegeUser($email,$privilege);
				}						

				redirect('notif/success_update_privilege');
			}
		}
	}
	
	function reset_password_pengguna()
	{
		$this->checkSession();
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 1)
			{
				$data['result'] = $this->modelp->selectUpdatePrivilegePengguna();
				foreach($data['result'] as $rows)
				{
					$data['tanggal_dft'] 	= $rows['TANGGAL_DFT'];
					$data['email'] 			= $rows['EMAIL'];
					$data['nama'] 			= $rows['NAMA'];
					$data['privilege'] 		= $rows['PRIVILEGE'];
					$data['status_pgn'] 	= $rows['STATUS_PGN'];		
				}
				
				$data['isi'] = "pages/reset_password_pengguna";
				$this->load->view('templates/sidebar', $data);		

			}
			else
			{
				$this->load->view('pages/denied');
			}
		}			
	}
	
	function reset_password_pengguna_action()
	{
		$data['email']=urldecode($this->uri->segment(3));
		
		$this->checkSession();
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 1)
			{
				$data['result'] = $this->modelp->select_update_pengguna_action($data['email']);
				foreach($data['result'] as $rows)
				{
					$data['tanggal_dft'] 	= $rows['TANGGAL_DFT'];
					$data['email'] 			= $rows['EMAIL'];
					$data['nama'] 			= $rows['NAMA'];	
					$data['privilege']		= $rows['PRIVILEGE'];
				}
				
				$data['isi'] = "pages/reset_password_pengguna_action";
				$this->load->view('templates/sidebar', $data);		
			}
			else
			{
				$this->load->view('pages/denied');
			}
		}
	}
	
	function reset_passsword_pengguna_bt()
	{
		$this->checkSession();
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 1)
			{
					$email = $this->input->post('email_user');					
					$this->modelp->reset_passsword_pengguna_bt($email);					
			}
		}
		redirect('pages/success_reset_password');
	}
	
	function insert_ebook()
	{
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 1)
			{
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'pdf|doc|docx';
				$config['max_size']	= '20480';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload())
				{
					$upload_data = $this->upload->data();
					$email = $this->session->userdata('email');
					$kategori = $this->input->post('kategori');		
					$judul = $this->input->post('judul');		
					$pengarang = $this->input->post('pengarang');
					$penerbit= $this->input->post('penerbit');
					$tahun= $this->input->post('tahun');
					$sinopsis= $this->input->post('sinopsis');					
					$temp_path_file=$upload_data['full_path'];
					
					$path_file = basename($temp_path_file,".pdf");
					
					$this->modelp->insertEbook($email, $kategori, $judul, $pengarang, $penerbit, $tahun, $sinopsis, $path_file);		
					redirect('pages/success_addEbook');
					
				}
				else
				{
					echo $this->upload->display_errors();
				}			
			}
			else 
			{
				redirect('pages/data_ebook');
			}
		}		
	}
	
	function insert_ebook_kontributor()
	{
		
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 2)
			{
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'pdf|doc|docx';
				$config['max_size']	= '20480';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload())
				{
					$upload_data = $this->upload->data();
					$email = $this->session->userdata('email');
					$kategori = $this->input->post('kategori');		
					$judul = $this->input->post('judul');		
					$pengarang = $this->input->post('pengarang');
					$penerbit= $this->input->post('penerbit');
					$tahun= $this->input->post('tahun');
					$sinopsis= $this->input->post('sinopsis');					
					$temp_path_file=$upload_data['full_path'];
					
					$path_file = basename($temp_path_file,".pdf");
					
					$this->modelp->insertEbookKontributor($email, $kategori, $judul, $pengarang, $penerbit, $tahun, $sinopsis, $path_file);		
					redirect('pages/success_addEbook_kontributor');
					
				}
				else
				{
					echo $this->upload->display_errors();
				}			
			}
			else 
			{
				redirect('pages/data_ebook');
			}
		}	
	}
	
	
	
	function update_ebook()
	{
		$this->checkSession();
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 1)
			{			
				
				$data['result'] = $this->modelp->selectEbook($this->session->userdata('id_ebook'));
				foreach($data['result'] as $rows)
				{
					$data['id_ebook'] 	= $rows['ID_EBOOK'];
					$data['kategori'] 	= $rows['KATEGORI'];
					$data['judul'] 		= $rows['JUDUL'];
					$data['pengarang'] = $rows['PENGARANG'];
					$data['penerbit'] 	= $rows['PENERBIT'];
					$data['tahun'] 		= $rows['TAHUN'];	
					$data['sinopsis'] 	= $rows['SINOPSIS'];	
					
				}
				$data['isi'] = "pages/update_ebook";
				$this->load->view('templates/sidebar', $data);	
			}
			else
			{
				$this->load->view('pages/denied');
			}
		}
	}
	
	function update_ebook_detail()
	{
		$data['id_ebook'] = $this->uri->segment(3);	
		
		$this->checkSession();
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 1)
			{								
				$data['result'] = $this->modelp->selectEbookByID($data['id_ebook']);
				foreach($data['result'] as $rows)
				{
					$data['id_ebook'] 	= $rows['ID_EBOOK'];
					$data['kategori'] 	= $rows['KATEGORI'];
					$data['judul'] 		= $rows['JUDUL'];
					$data['pengarang'] = $rows['PENGARANG'];
					$data['penerbit'] 	= $rows['PENERBIT'];
					$data['tahun'] 		= $rows['TAHUN'];	
					$data['sinopsis'] 	= $rows['SINOPSIS'];	
				}
				$data['isi'] = "pages/update_ebook_detail";
				$this->load->view('templates/sidebar', $data);		
			}			
			else
			{
				$this->load->view('pages/denied');
			}
		}
	}
	
	function update_ebook_data()
	{
		$this->checkSession();
		
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 1)
			{
				$id_ebook		= $this->input->post('id_ebook');
				$kategori 		= $this->input->post('kategori');
				$judul 			= $this->input->post('judul');		
				$pengarang 	= $this->input->post('pengarang');
				$penerbit		= $this->input->post('penerbit');
				$tahun			= $this->input->post('tahun');
				$sinopsis		= $this->input->post('sinopsis');				
				$path_file		= $this->input->post('path_file');
				
				$this->modelp->updateEbook($id_ebook,$judul,$kategori, $pengarang, $penerbit, $tahun, $sinopsis, $path_file);
				redirect('pages/update_ebook');
			}
			else
			{
				redirect('pages/denied');
				
			}
		}		
	}
	
	function hapus_ebook()
	{
		$this->checkSession();
		
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') ==1)
			{			
				
				$data['result'] = $this->modelp->selectEbook();
				
				foreach($data['result'] as $rows)
				{
					$data['kategori'] 	= $rows['KATEGORI'];
					$data['judul'] 		= $rows['JUDUL'];
					$data['pengarang'] = $rows['PENGARANG'];
					$data['penerbit'] 	= $rows['PENERBIT'];
					$data['tahun'] 		= $rows['TAHUN'];		
				}
				
				$data['isi'] = "pages/hapus_ebook";
				$this->load->view('templates/sidebar', $data);	
			}
			else
			{
				$this->load->view('pages/denied');
			}
		}
	}
		
	function hapus_ebook_detail()
	{
		$data['id_ebook'] = $this->uri->segment(3);	
		
		$this->checkSession();
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 1)
			{	
				$data['result'] = $this->modelp->selectEbookByID($data['id_ebook']);
				foreach($data['result'] as $rows)
				{
					$data['kategori'] 	= $rows['KATEGORI'];
					$data['judul'] 		= $rows['JUDUL'];
					$data['pengarang'] = $rows['PENGARANG'];
					$data['penerbit'] 	= $rows['PENERBIT'];
					$data['tahun'] 		= $rows['TAHUN'];	
					$data['sinopsis'] 	= $rows['SINOPSIS'];	
				}
				
				$data['isi'] = "pages/hapus_ebook_detail";
				$this->load->view('templates/sidebar', $data);	
			}
			else
			{
				$this->load->view('pages/denied');
			}
		}
	}
	
	function hapus_ebook_bt()
	{
		$data['id_ebook'] = $this->uri->segment(3);	
		
		$this->checkSession();
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 1)
			{				
				$this->modelp->hapus_ebook_bt($data['id_ebook']);
				redirect('pages/success_hapus_ebook');
			}
			else
			{
				redirect('pages/denied');
			}
		}
		
	}
	
	function lihat_pesanan()
	{
		$this->checkSession();
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 1)
			{			
				
				$data['result']=$this->modelp->rekap_pesanan();
				foreach($data['result'] as $rows)
				{
					$data['tgl_upload']	= $rows['tgl_upload'];
					$data['id_psn']		= $rows['id_psn'];			
					$data['judul'] 		= $rows['judul'];
					$data['kategori'] 	= $rows['kategori'];
					$data['status_psn'] = $rows['status_psn'];			
				}
				$data['isi'] = "pages/lihat_pesanan";
				$this->load->view('templates/sidebar', $data);	
			}
			else
			{
				$this->load->view('pages/denied');
			}
		}
	}
	
	function lihat_pesanan_tersedia()
	{
		$this->checkSession();
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 1)
			{			
				$data['result']=$this->modelp->lihat_pesanan_tersedia();
				foreach($data['result'] as $rows)
				{
					$data['tgl_upload']	= $rows['tgl_upload'];
					$data['id_psn']		= $rows['id_psn'];			
					$data['judul'] 		= $rows['judul'];
					$data['kategori'] 	= $rows['kategori'];
					$data['status_psn'] = $rows['status_psn'];			
				}
				$data['isi'] = "pages/lihat_pesanan_tersedia";
				$this->load->view('templates/sidebar', $data);	
			}
			else
			{
				$this->load->view('pages/denied');
			}
		}
	}
	
	function lihat_pesanan_detail()
	{
		$data['id_psn'] = $this->uri->segment(3);	
		
		$this->checkSession();
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 1)
			{				
				$data['result'] = $this->modelp->lihat_pesanan_detail($data['id_psn']);
				foreach($data['result'] as $rows)
				{
					$data['id_psn'] 	= $rows['id_psn'];
					$data['tgl_upload'] = $rows['tgl_upload'];
					$data['email'] 		= $rows['email'];
					$data['judul'] 		= $rows['judul'];
					$data['kategori'] 	= $rows['kategori'];			
				}
				
				$data['isi'] = "pages/lihat_pesanan_detail";
				$this->load->view('templates/sidebar', $data);
			}
			else
			{
				$this->load->view('pages/denied');
			}
		}		
	}
	
	function update_status_pesanan()
	{
		$this->checkSession();
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 1)
			{
				$id_psn = $this->input->post('id_psn');
				//echo $id_psn;
				$this->modelp->update_status_pesanan($id_psn);
				redirect('pages/success_update_pesanan');
			}
			else
			{
				redirect('pages/denied');				
			}			
		}		
	}
	
	function kontributor_ebook()
	{
		$this->checkSession();
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') ==2)
			{
				
				$data['isi'] = "pages/kontributor_ebook";
				$this->load->view('templates/sidebar_user', $data);		
			}
			else
			{
				$this->load->view('pages/denied');
			}
		}
	}

	
	function komentar_bt()
	{
		$data['id_ebook'] = $this->uri->segment(3);	
		$isi		 	= $this->input->post('isi');
		$email 			= $this->session->userdata('email');

		$this->checkSession();
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') >= 1)
			{				
				$this->modelp->komentar_bt($data['id_ebook'],$email,$isi);
			}
		}
		
		redirect("pages/detail_ebook/".$data['id_ebook'].""); 
		
	}
	
	//--------------------------------------------------- NOTIFIKASI ---------------------------------------------------
	
	function success_pesanEbook($page = 'success_pesanEbook')
	{
		$this->checkSession();
		
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 2)
			{
				if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
				{
					// Whoops, we don't have a page for that!
					show_404();
				}

				$data['title'] = ucfirst($page); // Capitalize the first letter
				$this->load->view('pages/'.$page, $data);	
			}
		}
	}

	function success_approve_pengguna($page = 'success_approve_pengguna')
	{
		$this->checkSession();
		
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 1)
			{
				if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
				{
					// Whoops, we don't have a page for that!
					show_404();
				}

				$data['title'] = ucfirst($page); // Capitalize the first letter
				$this->load->view('pages/'.$page, $data);		
			}
			else
			{
				redirect('pages/denied');				
			}
		}
	}
	
	function success_approve_ebook($page = 'success_approve_ebook')
	{
		$this->checkSession();
		
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 1)
			{
				if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
				{
					// Whoops, we don't have a page for that!
					show_404();
				}

				$data['title'] = ucfirst($page); // Capitalize the first letter
				$this->load->view('pages/'.$page, $data);		
			}
			else
			{
				redirect('pages/denied');				
			}
		}
	}
	
	function success_update_privilege($page = 'success_update_privilege')
	{
		$this->checkSession();
		
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 1)
			{
				if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
				{
					// Whoops, we don't have a page for that!
					show_404();
				}

				$data['title'] = ucfirst($page); // Capitalize the first letter
				$this->load->view('pages/'.$page, $data);		
			}
			else
			{
				redirect('pages/denied');				
			}
		}
	}
	
	function success_update_data_diri($page = 'success_update_data_diri')
	{
		$this->checkSession();
		
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') >= 1)
			{
				if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
				{
					// Whoops, we don't have a page for that!
					show_404();
				}

				$data['title'] = ucfirst($page); // Capitalize the first letter
				$this->load->view('pages/'.$page, $data);		
			}
			else
			{
				redirect('pages/denied');				
			}
		}
	}
		
	function success_update_password($page = 'success_update_password')
	{
		$this->checkSession();
		
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') >= 1)
			{
				if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
				{
					// Whoops, we don't have a page for that!
					show_404();
				}

				$data['title'] = ucfirst($page); // Capitalize the first letter
				$this->load->view('pages/'.$page, $data);		
			}
			else
			{
				redirect('pages/denied');				
			}
		}
	}
	
	
	function success_addEbook($page = 'success_addEbook')
	{
		$this->checkSession();
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 1)
			{
				if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
				{
					// Whoops, we don't have a page for that!
					show_404();
				}

				$data['title'] = ucfirst($page); // Capitalize the first letter
				$this->load->view('pages/'.$page, $data);		
			}
			else
			{
				$this->load->view('pages/denied');
			}
		}
	}
	
	function success_hapus_ebook($page = 'success_hapus_ebook')
	{
		$this->checkSession();
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 1)
			{
				if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
				{
					// Whoops, we don't have a page for that!
					show_404();
				}

				$data['title'] = ucfirst($page); // Capitalize the first letter
				$this->load->view('pages/'.$page, $data);		
			}
			else
			{
				$this->load->view('pages/denied');
			}
		}
	}
	
	function success_reset_password($page = 'success_reset_password')
	{
		$this->checkSession();
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 1)
			{
				if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
				{
					// Whoops, we don't have a page for that!
					show_404();
				}

				$data['title'] = ucfirst($page); // Capitalize the first letter
				$this->load->view('pages/'.$page, $data);		
			}
			else
			{
				$this->load->view('pages/denied');
			}
		}
	}
	
	function success_update_pesanan($page = 'success_update_pesanan')
	{
		$this->checkSession();
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 1)
			{
				if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
				{
					// Whoops, we don't have a page for that!
					show_404();
				}

				$data['title'] = ucfirst($page); // Capitalize the first letter
				$this->load->view('pages/'.$page, $data);		
			}
			else
			{
				$this->load->view('pages/denied');
			}
		}
	}

	function success_addEbook_kontributor($page = 'success_addEbook_kontributor')
	{
		$this->checkSession();
		if($this->session->userdata('email'))
		{
			if($this->session->userdata('privilege') == 2)
			{
				if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
				{
					// Whoops, we don't have a page for that!
					show_404();
				}

				$data['title'] = ucfirst($page); // Capitalize the first letter
				$this->load->view('pages/'.$page, $data);
			}
			else
			{
				$this->load->view('pages/denied');
			}
		}						
	}
	
	public function waiting($page = 'waiting')
	{
		if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter
		$this->load->view('pages/'.$page, $data);		
	}
	
	function denied()
	{
		
		$this->load->view('pages/denied');
	}
	
	function failed_login()
	{
		
		$this->load->view('notif/failed_login');
	}
	
	function failed_register($page = 'failed_register')
	{		
		if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter
		$this->load->view('pages/'.$page, $data);		
	}
	
	function failed_update_password($page = 'failed_update_password')
	{		
		if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter
		$this->load->view('pages/'.$page, $data);		
	}
	
	
}