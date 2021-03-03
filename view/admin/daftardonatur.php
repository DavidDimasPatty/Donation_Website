<form method="POST" action="daftardonatur">
	<fieldset>
		<legend>Search by Name</legend>
		<input type="text" name="filter1" value="<?php echo $name; ?>">
		<input type="submit" value="SEARCH">
	</fieldset>
</form>
<br>
<hr>
<table>
	<tr>
		<th></th>
		<th>id</th>
		<th>nama</th>
		<th>username</th>
		<th>passwrod</th>
		<th>email</th>
		<th>notelp</th>
		<th>norek</th>
	</tr>	
	<?php
		foreach ($result as $key => $row) {
			echo "<tr>";
			echo "<td>".$row->getid()."</td>";
			echo "<td>".$row->getnama()."</td>";
			echo "<td>".$row->getusername()."</td>";
			echo "<td>".$row->getpassword()."</td>";
			echo "<td>".$row->getemail()."</td>";
			echo "<td>".$row->getnotelp()."</td>";
			echo "<td>".$row->getnorek()."</td>";
			echo "</tr>";
		}
	?>
</table>


<a href="/tugasbesar/view/admin/login/halamandepan">Back to home</a>