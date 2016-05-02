<div class="row" style="background-color:#003399">
	<div class="col-lg-12" >
		
		<h1><font color="white">Lihat Pesanan Detail</font></h1>
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
								<th>Tanggal Pesan</th>  
								<th>Pemesan</th>  								
								<th>Judul</th>                                            
								<th>Kategori</th>         											
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
												echo "<td align='left'>".$data['tgl_upload']."</td>";
												echo "<td align='left'>".$data['email']."</td>";
												echo "<td align='left'>".$data['judul']."</td>";
												echo "<td align='left'>".$data['kategori']."</td>";																								
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