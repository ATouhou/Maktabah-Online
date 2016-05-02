<?php
class Momodel extends CI_Model {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	
	
	
	//---------------------------------------------------EBOOK | INSERT ---------------------------------------------------
	
	
	function insertEbook($email, $judul,$kategori, $pengarang, $penerbit, $tahun, $sinopsis, $path_file)
	{
		// 0 = berasal dari ebook pesanan 	-> tidak ditampilkan pada data ebook	
		// 1 = berasal dari admin 			-> langsung ditampilkan pada  data ebook
		// 2 = berasal dari kontributor 	-> ditampilkan ke data ebook setelah diapprove oleh admin dan statusnya dirubah menjadi 1		
		// 3 = berasal dari pesanan			-> artinya sudah diupdate menjadi tersedia, jika belum tersedia kodenya 0
		// 4 = berasal dari kontributor		-> artinya disapprove
		
		//table pesan ebook, jika ebook sudah tersedia maka status_psn = 1
		//table pesan ebook, jika ebook belum tersedia maka status_psn = 0
		$sql = "insert into ebook (email, kategori, judul, pengarang, penerbit, tahun, sinopsis, path_ebook, tgl_upload,status_ebook) values('".$email."','".$judul."','".$kategori."', '".$pengarang."', '".$penerbit."', '".$tahun."', '".$sinopsis."', '".$path_file."',now(),1)";
		$query=$this->db->query($sql);
	}
	
	function insertEbookKontributor($email, $judul,$kategori, $pengarang, $penerbit, $tahun, $sinopsis, $path_file)
	{
		$sql = "insert into ebook (email, kategori, judul, pengarang, penerbit, tahun, sinopsis, path_ebook, tgl_upload,status_ebook) values('".$email."','".$judul."','".$kategori."', '".$pengarang."', '".$penerbit."', '".$tahun."', '".$sinopsis."', '".$path_file."',now(),2)";
		$query=$this->db->query($sql);
	}
	
	function insertPesanEbook($email, $kategori, $judul)
	{		
		$sql = "insert into ebook (email, kategori, judul,tgl_upload,status_ebook) values('".$email."','".$kategori."','".$judul."', now(),0)";
		$query=$this->db->query($sql);
		$sql = "insert into pesan_ebook (id_ebook,email,status_psn) values(last_insert_id(),'".$email."',0)";
		$query=$this->db->query($sql);
	}
	
	
	
	
	
	//---------------------------------------------------EBOOK | SELECT---------------------------------------------------
	
	function selectEbook()
	{
		$sql = "select * from ebook where status_ebook=1";
    	$query = $this->db->query($sql);
    	return $query->result_array();
	}
	
	function selectLihatKontribusiSaya($email)
	{
		$sql = "select * from ebook where email='".$email."' and status_ebook=1";
    	$query = $this->db->query($sql);
    	return $query->result_array();
	}
	
	function selectEbookByID($id_ebook)
	{
		$sql = "select * from ebook where status_ebook=1 and id_ebook='".$id_ebook."'";
		$query = $this->db->query($sql);
    	return $query->result_array();
	}
	
	function selectApproveEbook()
	{
		$sql = "select * from ebook where status_ebook=2";
    	$query = $this->db->query($sql);
    	return $query->result_array();
	}
	
	function selectEbookDisapprove()
	{
		$sql = "select * from ebook where status_ebook=4";
    	$query = $this->db->query($sql);
    	return $query->result_array();
	}
	
	function selectApproveEbookByID($id_ebook)
	{
		$sql = "select * from ebook where status_ebook=2 and id_ebook='".$id_ebook."'";
    	$query = $this->db->query($sql);
    	return $query->result_array();
	}
	
	function status_pesanan_saya($email)
	{
		$sql = "select distinct pesan_ebook.id_psn, ebook.tgl_upload, ebook.judul, ebook.kategori, pesan_ebook.status_psn
					from `pesan_ebook`,`ebook`					
					where ebook.email = pesan_ebook.email and 
					ebook.email = '".$email."' and
					pesan_ebook.id_ebook = ebook.id_ebook
					";
		$query = $this->db->query($sql);
    	return $query->result_array();
	}

	function status_kontribusi_saya($email)
	{
		$sql = "select *
				from `ebook`
				where email ='".$email."'
				and (status_ebook=1 or status_ebook=2)
				";
			
		$query = $this->db->query($sql);
    	return $query->result_array();
	}
	
	function rekap_pesanan()
	{
		$sql = "select distinct pesan_ebook.id_psn, ebook.tgl_upload, ebook.judul, ebook.kategori, pesan_ebook.status_psn, ebook.email, pesan_ebook.email
					FROM `pesan_ebook`,`ebook`					
					WHERE ebook.email = pesan_ebook.email and 
					pesan_ebook.id_ebook = ebook.id_ebook and
					pesan_ebook.status_psn = 0;
					";
		$query = $this->db->query($sql);
    	return $query->result_array();
	}
	
	function lihat_pesanan_tersedia()
	{
		$sql = "select distinct pesan_ebook.id_psn, ebook.tgl_upload, ebook.judul, ebook.kategori, pesan_ebook.status_psn, ebook.email, pesan_ebook.email
					FROM `pesan_ebook`,`ebook`					
					WHERE ebook.email = pesan_ebook.email and 
					pesan_ebook.id_ebook = ebook.id_ebook and
					pesan_ebook.status_psn = 1;
					";
		$query = $this->db->query($sql);
    	return $query->result_array();
	}
	
	function lihat_pesanan_detail($id_psn)
	{
		$sql = "select distinct pesan_ebook.id_psn, ebook.tgl_upload, ebook.judul, ebook.kategori, pesan_ebook.status_psn, ebook.email, pesan_ebook.email
					FROM `pesan_ebook`,`ebook`					
					WHERE ebook.email = pesan_ebook.email and 
					pesan_ebook.id_ebook = ebook.id_ebook and
					pesan_ebook.id_psn = '".$id_psn."' ";

		$query = $this->db->query($sql);
    	return $query->result_array();
	}
	
	function selectEbookDetail()
	{
		$sql = "select * from ebook 
				   where id_ebook=2";
    	$query = $this->db->query($sql);
    	return $query->result_array();
	}
	
	
	
	
	
	//---------------------------------------------------EBOOK | UPDATE---------------------------------------------------
	
	function update_status_pesanan($id_psn)
	{
		$sql = "update pesan_ebook
					set status_psn=1
					where id_psn='".$id_psn."' ";		
    	$query = $this->db->query($sql);    	
	}
	
	function approveEbookAction($id_ebook, $pilih)
	{
		$sql = "update ebook set status_ebook='".$pilih."'
				where id_ebook = '".$id_ebook."'";
		$query = $this->db->query($sql);
	}
	
	function updateEbook($id_ebook, $judul,$kategori, $pengarang, $penerbit, $tahun, $sinopsis, $path_file)
	{	
		$sql = "update ebook 
					set judul='".$judul."', kategori='".$kategori."', pengarang='".$pengarang."', penerbit='".$penerbit."', tahun='".$tahun."', sinopsis='".$sinopsis."', path_ebook='".$path_file."'
					where id_ebook='".$id_ebook."'";
		
    	$query = $this->db->query($sql);  	
	}
	
	
	
	
	//---------------------------------------------------EBOOK | DELETE---------------------------------------------------
	
	function hapus_ebook_bt($id_ebook)
	{
		$sql = "delete from ebook where id_ebook='".$id_ebook."'";
		
		//echo $sql;
		$query=$this->db->query($sql);		
	}	
	
	
	
	
	//---------------------------------------------------USER | INSERT ---------------------------------------------------
		
	function insertPengguna($email_pgn,$nama_pgn,$password_pgn)
	{
		//privilege pengguna dengan kode status 1 = admin
		//privilege pengguna dengan kode status 2 = member	
		//status pengguna dengan kdoe status 0 = belum  diapprove
		//status pengguna dengan kdoe status 1 = telah diapprove
		//status pengguna dengan kode status 2 = disapprove
		$sql="insert into pengguna(email,nama,passwd,privilege,status_pgn,tanggal_dft) values ('".$email_pgn."','".$nama_pgn."','".$password_pgn."',0,0,now())";
		$query=$this->db->query($sql);
		//echo $sql;
	}	
	
	
	
	
	//---------------------------------------------------USER | SELECT---------------------------------------------------
	
	function selectPengguna()
	{
		$sql = "select * from pengguna where status_pgn = 1";
    	$query = $this->db->query($sql);
    	return $query->result_array();
	}
	
	function selectUpdatePrivilegePengguna()
	{
		$sql = "select * from pengguna where status_pgn = 1 and privilege=2";
    	$query = $this->db->query($sql);
    	return $query->result_array();
	}
	
	function select_email()
	{
		$sql = "select email from pengguna";
    	$query = $this->db->query($sql);
    	return $query->result_array();
	}

	function selectApprovePengguna()
	{
		$sql = "select * from pengguna where status_pgn=0";
    	$query = $this->db->query($sql);
    	return $query->result_array();
	}
		
	function selectDisapprovePengguna()
	{
		$sql = "select * from pengguna where status_pgn=2";
    	$query = $this->db->query($sql);
    	return $query->result_array();
	}
	
	function select_approve_pengguna_action($email)
	{
		$sql = "select * from pengguna 
					where email = '".$email."'";
    	$query = $this->db->query($sql);
    	return $query->result_array();	
	}
	
	function select_update_pengguna_action($email)
	{
		$sql = "select * from pengguna 
					where email = '".$email."'";
    	$query = $this->db->query($sql);
    	return $query->result_array();	
	}
	
	
	
	
	//---------------------------------------------------USER | UPDATE ---------------------------------------------------
	
	function updateStatusUser($email,$tindakan_approve_user)
	{		
		$sql = "update pengguna
			set status_pgn='".$tindakan_approve_user."'
			where email='".$email."'";
		$query=$this->db->query($sql);
	}
	
	function updatePrivilegeUser($email,$privilege)
	{
		$sql = "update pengguna
			set privilege='".$privilege."'
			where email='".$email."'";
		$query=$this->db->query($sql);
	}
	
	function reset_passsword_pengguna_bt($email)
	{
		$sql = "update pengguna
			set passwd= 'db8a38661b2ca54797838699c56e005e'
			where email='".$email."'";		
		$query=$this->db->query($sql);
		//db8a38661b2ca54797838699c56e005e adalah encode md5 dari kata 'pbsb-its'
	}
	
	function update_data_diri_bt($email,$nama)
	{
		$sql = "update pengguna
			set nama= '".$nama."'
			where email='".$email."'";		
		$query=$this->db->query($sql);
	}
	
	function update_password($email, $passwd_baru)
	{
		$sql = "update pengguna
			set passwd = '".$passwd_baru."'
			where email='".$email."'";		
		$query=$this->db->query($sql);
	}
	
	
	

	
	
	
	//---------------------------------------------------EBOOK | KOMENTAR---------------------------------------------------
	
	function selectKomentar($id_ebook)
	{
		 $sql = "select * from komentar,ebook,pengguna 
					where komentar.id_ebook = ebook.id_ebook and
					pengguna.email = komentar.email and
					Ebook.id_ebook = '".$id_ebook."'
					order by komentar.waktu_kmt desc
					"; 
    	$query = $this->db->query($sql);
    	return $query->result_array();
	}
	
	function komentar_bt($id_ebook,$email,$isi)
	{
		$sql = "insert into komentar (id_ebook, email, isi_kmt, waktu_kmt) values('".$id_ebook."','".$email."','".$isi."', now())";	
		$query=$this->db->query($sql);
	}
	
	
	
	
	//---------------------------------------------------USER | LOGIN---------------------------------------------------
	function login($email_pgn, $passwd)
	{
		$this->load->database();
		$this -> db -> select('email, passwd, privilege');
	   	$this -> db -> from('pengguna');
	   	$this -> db -> where('email', $email_pgn);
	   	$this -> db -> where('passwd', md5($passwd));
		 
	   	$query = $this -> db -> get();
		 
	   	if($query -> num_rows() == 1)
	   	{
	   	  	echo "<script>alert('true1');</script>";
	   	  	return $query->result();
	   	}
	   	else
	   	{
	   	  	echo "<script>alert('false1');</script>";
	   	  	return false;
	   	}
	}
	
	function cekLogin($email, $passwd){
		$password = md5($passwd);
		$sql="select email, passwd, privilege, status_pgn from pengguna 
			  where email='".$email."' and passwd='".$passwd."' and status_pgn = 1";
		$result=$this->db->query($sql);
		return $result->result_array();;

	}
	
	//---------------------------------------------------EXPORT | EBOOK---------------------------------------------------
	function getEbook() 
	{
		$this->db->select('*');
		$this->db->from('ebook');
		$this->db->where('STATUS_EBOOK',1);
		$this->db->order_by('ID_EBOOK','DESC');
		$getData = $this->db->get();
		if($getData->num_rows() > 0)
			return $getData->result_array();
		else
			return null;
	}
	
	//query for get all data
	function toExcelAllEbook() 
	{
		$this->db->select('*');		
		$this->db->from('ebook');
		$this->db->where('STATUS_EBOOK',1);
		$this->db->order_by('ID_EBOOK','desc');
		$getData = $this->db->get();
		if($getData->num_rows() > 0)
			return $getData->result_array();
		else
			return null;
	}
	
	//---------------------------------------------------EXPORT | PENGGUNA---------------------------------------------------
	function getPengguna() 
	{
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->where('STATUS_PGN',1);		
		$getData = $this->db->get();
		if($getData->num_rows() > 0)
			return $getData->result_array();
		else
			return null;
	}
	
	//query for get all data
	function toExcelAllPengguna() 
	{
		$this->db->select('*');		
		$this->db->from('pengguna');
		$this->db->where('STATUS_PGN',1);
		$getData = $this->db->get();
		if($getData->num_rows() > 0)
			return $getData->result_array();
		else
			return null;
	}
}
?>