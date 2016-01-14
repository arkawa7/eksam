<?php require_once("functions.php");

	$name = "";
	$name_error = "";
	
	
	if(isset($_POST["object"])){
		if ( empty($_POST["name"]) ) {
			$name_error = "See väli on kohustuslik";
		}else{
			$name = cleanInput($_POST["name"]);
		}
		
		
		if($name_error == ""){
			$msg = addasd($name);
			
			if($msg != ""){
				$name = "";
				
				echo $msg;
				
			}
			
		}
	}
?>

<h1>Lisa nikerdus</h1>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"><br>
		<label for ="name">Nikerdused</label><br>
		<input id="name" name="name" type="text" placeholder="Lisa nikerduse nimi" value="<?php echo $name; ?>" > <?php echo $name_error; ?><br><br>
		<input type="submit" name="object" value="Sisesta">
</form>
<br>
<form action="tabel1.php" method="post" >
	<input type="submit" name="Treitud" value="Suunab treimise tabelisse">
</form>
<br>
<form action="tabel2.php" method="post" >
	<input type="submit" name="tabel2" value="Suunab lakkimise tabelisse">
</form>
<form action="tabel3.php" method="post" >
	<input type="submit" name="tabel3" value="Suunab pakkimisse tabelisse">
</form>