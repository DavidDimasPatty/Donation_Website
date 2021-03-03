<table>
<?php echo $_SESSION['name'];
 echo $_GET['var']
?>

<form method="POST" action='checkupdate?var=<?php echo $_GET['var']?>' enctype="multipart/form-data">
<?php
foreach ($result as $key => $row) {
    echo "<tr>";
    echo "<td>Nama Donasi</td>";
	echo '<td><textarea name="nama" rows="4" cols="50">'.$row->getnama().'</textarea><td>';
    echo "<tr>";
    echo "<td>Tanggal Awal</td>";
    echo '<td><input type="date" name="tanggal" value='.$row->gettanggal().'><td>';
    echo "<tr>";
    echo "<td>Tanggal Akhir</td>";
    echo '<td><input type="date" name="tanggalakhir" value='.$row->gettanggalakhir().'><td>';
    echo "<tr>";
    echo "<td>Keterangan</td>";
	echo '<td><textarea name="keterangan" rows="4" cols="50">'.$row->getketerangan().'</textarea><td>';
    echo "</tr>";
    echo "<td>Maksimal Donasi</td>";
    echo '<td><input type="number" name="max" value='.$row->getmax().'><td>';
    echo "</tr>";
    echo "<P>Edit Foto</P>";
echo "<input type='hidden' name='size' value='1000000'>";
echo '<input type="file" name="image" value="'.$row->getimage().'"><br>';
    $_SESSION['gambar']=$row->getimage();
   
}

?>
<input type="submit" name="hasil">
</form>

<a href="riwayat/page?var=0">Back</a>
</table>