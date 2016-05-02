<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIPOS - Sistem Informasi Perpustakaan Online Sekolah</title>

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

<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
						<table>
							<tr>
								<td>
									<form role="form" action="<?php echo base_url('index.php/pages/dashboard')?>">
										<button type="submit" class="btn btn-primary">&nbsp&nbsp Kembali &nbsp&nbsp</button>   
									</form>
								</td>
								<td width="20px"></td>
								<td>
									<form role="form" action="toExcelAllEbook">
										<button type="submit" class="btn btn-primary">Export Data</button>   
									</form>
								</td>
							</tr>
						</table>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID_EBOOK</th>
											<th>EMAIL</th>
											<th>KATEGORI</th>
											<th>JUDUL</th>
											<th>PENGARANG</th>
											<th>PENERBIT</th>
											<th>TAHUN</th>
											<th>SINOPSIS</th>
											<th>PATH EBOOK</th>
											<th>TANGGAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>                                        
                                        <?php
											foreach($detail as $rows) 
											{		
												echo "<tr>";
												echo "<td>".  $rows['ID_EBOOK']."</td>";
												echo "<td>". $rows['EMAIL'] ."</td>";
												echo "<td>". $rows['KATEGORI'] ."</td>";
												echo "<td>". $rows['JUDUL'] ."</td>";
												echo "<td>". $rows['PENGARANG'] ."</td>";
												echo "<td>". $rows['PENERBIT'] ."</td>";
												echo "<td>". $rows['TAHUN'] ."</td>";
												echo "<td>". $rows['SINOPSIS'] ."</td>";
												echo "<td>". $rows['PATH_EBOOK'] ."</td>";
												echo "<td>". $rows['TGL_UPLOAD'] ."</td>";
											} 
											
										?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->