<div class="row" style="background-color:#003399">
	<div class="col-lg-12" >
		
		<h1><font color="white">Status Pesanan Ebook</font></h1>
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
								<!--th>ID PESAN</th-->                                            
								<th>TANGGAL</th>                                            
								<th>JUDUL</th>                                            
								<th>KATEGORI</th>                                            
								<th>STATUS</th>                                            
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
										echo "<td>".$data['tgl_upload']."</td>";
										echo "<td>".$data['judul']."</td>";
										echo "<td>".$data['kategori']."</td>";
										$temp = true;
										if($data['status_psn'] == 0) $temp = false;
										else $temp = true;
										
										if($temp==true)
										{
											echo "<td ><font color='blue'>Sudah Tersedia</font></td>";
										}
										else
										{
											echo "<td ><font color='red'>Masih Diproses</font></td>";
										}
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