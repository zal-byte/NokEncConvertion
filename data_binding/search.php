<?php

include "connection/connection.php";
include "sql/handler.php";


$handler = new Handler($con);
if(isset($_GET["q"])){



	if(isset($_GET["is_json"])){
		if($_GET["is_json"] == "true"){
			echo json_encode($handler->search($_GET["q"]));
		}else{
			for($i=0; $i < count($handler->search($_GET['q'])); $i++){
		print_r("[code values][ ".$i." ] ".$handler->search($_GET["q"])["code_values"][$i]."<br/>");
	}for($is =0; $is < count($handler->search($_GET["q"])); $is++){
		print_r("[result values][ ".$is." ] ".$handler->search($_GET["q"])["result_values"][$is]."<br/>");
	}
		}
	}else{
			echo '<a href="'.$_SERVER["HOST"].'search.php?q='.$_GET["q"].'&is_json=true">JSON MODE</a><br/><br/>';
		$int = 0;
		foreach($handler->search($_GET["q"])["code_values"] as $well){
			print_r("[ ".$int." ] CODE : ".$well."<br/>");
			$int++;
		}
		echo "<hr>";
		$ints = 0;
		foreach ($handler->search($_GET["q"])["result_values"] as $well) {
			# code...
			print_r("[ ".$ints." ] RESULT : ".$well."<br/>");
			$ints++;
		}

	}



}else{
	echo "HELLO WORLD !.";
	if(isset($_GET["cmd"])){
		if($_GET["cmd"] == 'delete'){
		$handler->delete_data();	
		}
	}
}


?>