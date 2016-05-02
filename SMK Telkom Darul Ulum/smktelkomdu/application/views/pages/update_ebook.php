<div class="row" style="background-color:#003399">
	<div class="col-lg-12" >
		
		<h1><font color="white">Ubah Ebook</font></h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<br />

            
			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Ebook
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
											<th>No</th>
                                            <th>Kategori</th>
                                            <th>Judul</th>                                            
											<th>Pengarang</th>                                            
											<th>Penerbit</th>                                            
											<th>Tahun</th>          
											<th>Lihat Detail</th>											                                            										
                                        </tr>
                                    </thead>
									<!-- show data table-->
									<?php
											$i=1;
											foreach($result as $data)
											{
												echo "<tr class=\"odd gradeX\" align=\"center\">";
												echo "<td>".$i."</td>";
													$i = $i+1;
												echo "<td align='left'>".$data['KATEGORI']."</td>";
												echo "<td align='left'>".$data['JUDUL']."</td>";
												echo "<td align='left'>".$data['PENGARANG']."</td>";
												echo "<td align='left'>".$data['PENERBIT']."</td>";
												echo "<td>".$data['TAHUN']."</td>";
												echo "<form role=\"form\" action=\"".base_url('index.php/pages/update_ebook_detail')."/".$data['ID_EBOOK']."\"> ";												
												echo "<td><button type=\"submit\" class=\"btn btn-primary\">Update Data</button></td>";
												echo "</form>";												
											}
									?>									
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