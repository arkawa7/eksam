<?php
	// functions.php
	// siia tulevd funktsioonid, kõik mis seotud AB'ga
	
	// Loon AB'i ühenduse
	require_once("../configglobal.php");
	$database = "if15_arkadi_3";
	
	// tekitatakse sessioon, mida hoitakse serveris
	// kõik session muutujad on kättesaadavad kuni viimase brauseriakna sulgemiseni
	session_start();
	$mysqli = new mysqli($servername, $server_username, $server_password, $database);
	
	
	
	function cleanInput($data) {
  	  $data = trim($data);
  	  $data = stripslashes($data);
  	  $data = htmlspecialchars($data);
  	  return $data;
    }
	
	
	
	
	function addasd($name){
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		$stmt = $mysqli->prepare("INSERT INTO nikerdused (id, name) VALUES (?, ?)");
		echo $mysqli->error;
		$stmt->bind_param("is", $id, $name);
		
		//sõnum
		$message= "";
		
		if($stmt->execute()){
			//kui on tõene, INSERT õnnestus
			$message = "Sai edukalt lisatud";
			
			
		}else{
			//kui on väär, kuvame errori
			echo $stmt->error;
		}
		return $message;
		
		$stmt->close();
		$mysqli->close();
	}
	
	function getNikk1Data(){
		
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("SELECT id, name, cloistered, varnished, packed from nikerdused where cloistered=0");
		$stmt->bind_result($id, $name, $cloistered, $varnished, $packed);
		$stmt->execute();
		$wood_array = array();
		
		while($stmt->fetch()){
		$wood = new StdClass();
		$wood->id = $id;
		$wood->name = $name;
		$wood->cloistered = $cloistered;
		$wood->varnished = $varnished;
		$wood->packed = $packed;
		array_push($wood_array, $wood);
		}
		return $wood_array;
		
		
		
		$stmt->close();
		$mysqli->close();
		
	}
	function getNikk2Data(){
		
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("SELECT id, name, cloistered, varnished, packed from nikerdused where varnished=0 and cloistered=1");
		$stmt->bind_result($id, $name, $cloistered, $varnished, $packed);
		$stmt->execute();
		$wood_array = array();
		
		while($stmt->fetch()){
		$wood = new StdClass();
		$wood->id = $id;
		$wood->name = $name;
		$wood->cloistered = $cloistered;
		$wood->varnished = $varnished;
		$wood->packed = $packed;
		array_push($wood_array, $wood);
		}
		return $wood_array;
		
		
		
		$stmt->close();
		$mysqli->close();
		
	}
	function getNikk3Data(){
		
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("SELECT id, name, cloistered, varnished, packed from nikerdused where packed=0 and cloistered=1 and varnished=1");
		$stmt->bind_result($id, $name, $cloistered, $varnished, $packed);
		$stmt->execute();
		$wood_array = array();
		
		while($stmt->fetch()){
		$wood = new StdClass();
		$wood->id = $id;
		$wood->name = $name;
		$wood->cloistered = $cloistered;
		$wood->varnished = $varnished;
		$wood->packed = $packed;
		array_push($wood_array, $wood);
		}
		return $wood_array;
		
		
		
		$stmt->close();
		$mysqli->close();
		
	}
	
	function updateNikk3Data($id, $cloistered, $varnished, $packed){
		
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("UPDATE nikerdused SET cloistered=?, varnished=?, packed=? WHERE id=?");
		$stmt->bind_param("sssi", $cloistered, $varnished, $packed, $id);
		if($stmt->execute()){
			header("location:tabel1.php");
			
		}
		
		$stmt->close();
		$mysqli->close();
		
		
	}
	function updateNikk1Data($id, $cloistered, $varnished, $packed){
		
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("UPDATE nikerdused SET cloistered=?, varnished=?, packed=? WHERE id=?");
		$stmt->bind_param("sssi", $cloistered, $varnished, $packed, $id);
		if($stmt->execute()){
			header("location:tabel2.php");
			
		}
		
		$stmt->close();
		$mysqli->close();
		
		
	}
	function updateNikk2Data($id, $cloistered, $varnished, $packed){
		
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("UPDATE nikerdused SET cloistered=?, varnished=?, packed=? WHERE id=?");
		$stmt->bind_param("sssi", $cloistered, $varnished, $packed, $id);
		if($stmt->execute()){
			header("location:tabel3.php");
			
		}
		
		$stmt->close();
		$mysqli->close();
		
		
	}
	
	
	
?>	