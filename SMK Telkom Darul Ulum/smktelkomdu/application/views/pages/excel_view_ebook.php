<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=exceldata.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border='1' width="70%">
<tr>
<td>ID EBOOK</td>
<td>EMAIL</td>
<td>KATEGORI</td>
<td>JUDUL</td>
<td>PENGARANG</td>
<td>PENERBIT</td>
<td>TAHUN</td>
<td>SINOPSIS</td>
<td>PATH_EBOOK</td>
<td>TGL_UPLOAD</td>

</tr>
<?php
	foreach($data1 as $item) 
	{
		echo "<tr>";
		echo "<td>".$item['ID_EBOOK']."</td>";
		echo "<td>".$item['EMAIL']."</td>";
		echo "<td>".$item['KATEGORI']."</td>";
		echo "<td>".$item['JUDUL']."</td>";
		echo "<td>".$item['PENGARANG']."</td>";
		echo "<td>".$item['PENERBIT']."</td>";
		echo "<td>".$item['TAHUN']."</td>";
		echo "<td>".$item['SINOPSIS']."</td>";
		echo "<td>".$item['PATH_EBOOK']."</td>";
		echo "<td>".$item['TGL_UPLOAD']."</td>";
		echo "</tr>";
	}
?>
</table>