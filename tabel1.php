<?php require_once("functions.php");
	$array_of_names = getNikk1Data();
	
	if(isset($_POST["save"])){
	updateNikk3Data($_POST["id"], $_POST["cloistered"], 0, 0);
	}
?>


<h2>Tabel</h2>
<table border=1>
	<tr>
		<th>id</th>
		<th>Nimi</th>
		<th>Treitud</th>
		<th>Muuda</th>
	</tr>
	
	<?php
	//var_dump($array_of_names);
	for($i = 0; $i < count($array_of_names); $i++){
		//echo $array_of_names[$i]->id;
		
		if(isset($_GET["edit"]) && $array_of_names[$i]->id == $_GET["edit"]){
		
		echo "<tr>";
		echo "<form action= 'tabel1.php' method='post'>";
		echo "<input type='hidden' name='id' value='".$array_of_names[$i]->id."'>";
		echo "<td>".$array_of_names[$i]->id."</td>";
		echo "<td>".$array_of_names[$i]->name."</td>";
		echo "<td><input name='cloistered' value='".$array_of_names[$i]->cloistered."'></td>";
		echo "<td><a href='tabel1.php'>cancel<a></td>";
		echo "<td><input type='submit' name='save'></td>";
		echo "</form>";
		echo "</tr>";
			
		}else{			
		echo "<tr>";
		echo "<td>".$array_of_names[$i]->id."</td>";
		echo "<td>".$array_of_names[$i]->name."</td>";
		echo "<td>".$array_of_names[$i]->cloistered."</td>";
		echo "<td><a href='?edit=".$array_of_names[$i]->id."'>edit</a></td>";
		echo "</tr>";
		}
	}
	?>
</table>
<br>
<br>
<form action="tabel2.php" method="post" >
	<input type="submit" name="tabel2" value="Suunab lakkimisse tabelisse">
</form>

<form action="tabel3.php" method="post" >
	<input type="submit" name="tabel3" value="Suunab pakkimise tabelisee">
</form>