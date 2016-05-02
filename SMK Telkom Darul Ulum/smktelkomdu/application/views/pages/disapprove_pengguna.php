 <div class="row" style="background-color:#003399">
	<div class="col-lg-12" >
		
		<h1><font color="white">Pengguna Ditolak</font></h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<br />
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Tabel Data Pengguna
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>No</th>
								<th>Tanggal</th>
								<th>Email</th>
								<th>Nama</th>
							</tr>
						</thead>						
						
						<?php
										$i=1;
										foreach($result as $data)
										{
											echo "<tr class=\"odd gradeX\" align=\"center\">";
											echo "<td>".$i."</td>";
												$i = $i+1;
											echo "<td align='left'>".$data['TANGGAL_DFT']."</td>";
											echo "<td align='left'>".$data['EMAIL']."</td>";
											echo "<td align='left'>".$data['NAMA']."</td>";

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