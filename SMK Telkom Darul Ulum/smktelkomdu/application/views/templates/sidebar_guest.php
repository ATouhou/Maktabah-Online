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
	
	<!-- Custom CSS -->
    <link href="<?php echo base_url("public/template")?>/css/plugins/timeline.css" rel="stylesheet">
	
	<!-- Custom CSS -->
    <link href="<?php echo base_url("public/template")?>/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url("public/template")?>/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	
	

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                            <a class="" href="<?php echo base_url("index.php/pages/data_ebook_guest")?>"><i class="fa fa-files-o fa-fw"></i> Melihat Data Ebook</a>
                        </li>
						<li>
                            <a class="" href="<?php echo base_url("index.php/pages/register")?>"><i class="fa fa-edit fa-fw"></i> Register Member</a>
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
	
	<script src="<?php echo base_url("public/template")?>/js/plugins/morris/raphael.min.js"></script>
	<script src="<?php echo base_url("public/template")?>/js/plugins/morris/morris.min.js"></script>
	<script src="<?php echo base_url("public/template")?>/js/plugins/morris/morris-data.js"></script>
	

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
