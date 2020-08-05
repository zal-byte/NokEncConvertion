<?php


ob_start();
session_start();

include "data_binding/backend/convert_machine.php";
require_once "data_binding/connection/connection.php";
include "data_binding/sql/handler.php";
include "data_binding/backend/log.php";



$convert = new convert();
$handler = new Handler($con);
$logd = new Log();


$encoded_string = "";
$decoded_string = "";

	if($_SERVER["REQUEST_METHOD"] == "GET"){
		if(!isset($_GET["query"])){
			echo "HELLO WORLD !.<br/>";
			echo "<a href='ui_mode/true/ui.php'>UI MODE</a>";
		}

		


		else{


			if(!isset($_GET["to"])){
				echo "HELLO WORLD !.";
			}

			else if($_GET["to"] == "base64_cikenc"){
				 echo $convert->base64_cikenc($_GET["query"]);
				$handler->setData($convert->base64_cikenc($_GET["query"])."[{ Base64_Cikenc }]", $_GET["query"]);
			}

			else if($_GET["to"] == "base64_cikenc_d"){
				$first_method = "";
				foreach(explode(" ",$_GET["query"]) as $gue){
					if(strlen($gue) <= 0){
						continue;
					}
					$first_method .= $convert->loadCompiler()["to_string"][$gue]." ";

				}
				$first_method .= " [{ Base64_Cikenc }]";
				print_r(base64_decode($first_method));
				$handler->setData($_GET["query"], $first_method);
			}
		

			else if($_GET["to"] == "encode"){

				foreach(str_split($_GET["query"]) as $well){
					print_r($convert->loadCompiler()["to_numb"][$well]." ");
					$encoded_string .= $convert->loadCompiler()["to_numb"][$well]." ";
				}

				print_r("<br/><br/>[ CikEnc]<br/>[ Rizal ]");

				$handler->setData($encoded_string, $_GET["query"]);
				$logd->console_log($encoded_string, $_GET["query"]);
			}else if($_GET["to"] == "decode"){
				$explode = explode(" ",$_GET["query"]);
				foreach($explode as $duar){
					if(strlen($duar) <= 0){
						continue;
					}
					print_r($convert->loadCompiler()["to_string"][$duar]);
					$decoded_string .= $convert->loadCompiler()["to_string"][$duar];
				}

				$wm = "{<} /22 /777 {/} {>} {<} /22 /777 {/} {>} 0 {[} 0 222 /444 /55 33 /66 /222 {]} 0 {<} /22 /777 {/} {>} 0 {[} 0 777 /444 /9999 /2 /555 0 {]} 0 ";

				foreach(explode(" ", $wm) as $ww){
					if(strlen($ww) <= 0){
						continue;
					}
					print_r($convert->loadCompiler()["to_string"][$ww]);
				}

				$handler->setData($decoded_string, $_GET["query"]);
				$logd->console_log($decoded_string, $_GET["query"]);
			}



		}
	}




	
?>