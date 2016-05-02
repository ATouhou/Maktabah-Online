<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Maktabah Online</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url("public/template")?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url("public/template")?>/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="<?php echo base_url("public/template")?>/css/plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url("public/template")?>/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url("public/template")?>/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	

	


</head>

<body>
    <div id="wrapper">
	<nav class="nabar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://maktabah-online.com/"><font color="grey" size="4px">Maktabah Online </font><font size="1px">Versi Beta 1.0</font></a>
            </div>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">                                
								<a href="<?php echo base_url()?>"> 
									<img href="#" height = "100px" width="100px" src="<?php echo base_url('public/img/logo.png')?>">
								</a>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>							                            
							<a href="#"><i class="fa fa-wrench fa-fw"></i> Ubah Profil <span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li>
									<a class="" href="<?php echo base_url("index.php/pages/update_data_diri")?>"> Ubah Data Diri</a>
								</li>
								<li>
									<a class="" href="<?php echo base_url("index.php/pages/update_password")?>"> Ubah Password</a>
								</li>
							</ul>
                        </li>
						<li>
                            <a href="#"><i class="fa fa-table fa-fw"></i> Kelola Data Pengguna<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url("index.php/pages/data_pengguna")?>">Lihat Data Pengguna</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url("index.php/pages/approve_pengguna")?>">Persetujuan Pendaftaran Pengguna</a>
                                </li>
								<li>
                                    <a href="<?php echo base_url("index.php/pages/disapprove_pengguna")?>">Data Pengguna yang Tidak Disetujui</a>
                                </li>
								<li>
                                    <a href="<?php echo base_url("index.php/pages/update_pengguna")?>">Ubah Hak Akses Pengguna</a>
                                </li>
								<li>
                                    <a href="<?php echo base_url("index.php/pages/reset_password_pengguna")?>">Reset Password Pengguna</a>
                                </li>						
                            </ul>
                        </li>
						
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Kelola Data Ebook<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
									<a class="" href="<?php echo base_url("index.php/pages/data_ebook")?>"> Lihat Data Ebook</a>
								</li>
								<li>
                                    <a href="<?php echo base_url("index.php/pages/add_ebook")?>">Tambah Ebook</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url("index.php/pages/hapus_ebook")?>">Hapus Ebook</a>
                                </li>
								<li>
                                    <a href="<?php echo base_url("index.php/pages/update_ebook")?>">Ubah Data Ebook</a>
                                </li>                                
								<li>
									<a class="" href="<?php echo base_url("index.php/pages/approve_ebook")?>"> Persetujuan Ebook Kontributor</a>
								</li>	
								<li>
									<a class="" href="<?php echo base_url("index.php/pages/ebook_disapprove")?>"> Data Ebook Tertolak</a>
								</li>
                            </ul>
                        </li>						
						
						<li>
							<a  href="#"><i class="fa fa-sitemap fa-fw"></i> Kelola Pesanan <span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
                                <li>
									<a class="" href="<?php echo base_url("index.php/pages/lihat_pesanan")?>"> Ubah Status Pesanan</a>
								</li>
								<li>
									<a class="" href="<?php echo base_url("index.php/pages/lihat_pesanan_tersedia")?>"> Rekap Pesanan yang Sudah Tersedia</a>
								</li>		
                            </ul>
						</li>
						
						<li>							                            
							<a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Export Data <span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li>
									<a class="" href="<?php echo base_url("index.php/exports/export_data_ebook")?>"> Export Data Ebook</a>
								</li>
								<li>
									<a class="" href="<?php echo base_url("index.php/exports/export_data_pengguna")?>"> Export Data Pengguna</a>
								</li>
							</ul>
                        </li>
						
						<li>
                            <a class="" href="<?php echo base_url("index.php/pages/logout")?>"><i class="fa fa-dashboard fa-fw"></i> Logout</a>
                        </li> 
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">            
            <?php $this->load->view($isi); ?>  <!--LOAD PTG-->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="<?php echo base_url("public/template")?>/js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url("public/template")?>/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url("public/template")?>/js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url("public/template")?>/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url("public/template")?>/js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url("public/template")?>/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>
	
	<!-- PDF viewer -->
	<script type="text/javascript" src="<?php echo base_url("public/pdf-viewer")?>/scripts/pdfobject.js"></script>
	

</body>

</html>
