<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=exceldata.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border='1' width="70%">
<tr>
<td>EMAIL</td>
<td>NAMA</td>
<td>PRIVILEGE</td>
<td>TANGGAL_DFT</td>

</tr>
<?php
	foreach($data1 as $item) 
	{
		echo "<tr>";
		echo "<td>".$item['EMAIL']."</td>";
		echo "<td>".$item['NAMA']."</td>";
		if($item['PRIVILEGE']==1)
			echo "<td>Admin</td>";
		else if($item['PRIVILEGE']==2)
			echo "<td>Member</td>";
		echo "<td>".$item['TANGGAL_DFT']."</td>";		
		echo "</tr>";
	}
?>
</table>