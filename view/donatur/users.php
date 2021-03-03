
	<?php
		foreach ($result as $key => $row) {
			echo "<tr>";
			echo "<td>".$row->getUserID()."</td>";
			echo "<td>".$row->getName()."</td>";
			echo "<td>".$row->getRole()."</td>";
			echo "</tr>";
		}
	?>
</table>