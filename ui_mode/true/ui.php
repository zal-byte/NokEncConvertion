<?php

	ob_start();
	session_start();

	include "../../data_binding/backend/convert_machine.php";
	include "../../data_binding/connection/connection.php";
	include "../../data_binding/sql/handler.php";
	include "../../data_binding/backend/log.php";

	$log = new Log();
	$convert = new convert();
	$handler = new Handler($con);
	$ui = new UI($convert, $handler);


	echo $ui->createHTML();
	
	class UI{
		public $convert;
		public $handler;
		public function __construct($convert, $handler){
			$this->convert = $convert;
			$this->handler = $handler;
		}

		public function conv($val){
			$final = "";
			// foreach(str_split($val) as $wel){
			// 	$final .= $this->convert->loadCompiler()["to_numb"][$wel]." ";
			// }


			$base = base64_encode($val);
			foreach(str_split($base) as $goes){
				$final .= $this->convert->loadCompiler()["to_numb"][$goes]." ";
			}


			return $final;
		}
		
		public function deco($vas){
			$finfin =  "";
			foreach(explode(" ",$vas) as $gue){
				if(strlen($gue) <=0){
					continue;
				}
				$finfin .= $this->convert->loadCompiler()["to_string"][$gue];
			}
			return base64_decode($finfin);
		}




		public function basecamp($var){
			$fin = base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($var)))));


			return $fin;
		}

		public function basecamp_dec($var){
			$fin = base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($var)))));


			return $fin;
		}











		public function createHTML(){
			?>






			<!DOCTYPE html>
			<html>
			<head>
				<title>CikEnc UI</title>
			</head>
			<body>
			


				<center>
				<form method="post" action="#">
					
					<textarea name="value" style="width: 50%; height: 350px; "></textarea>
					<br/>
					<input type="submit" name="encode" value="Encode [{ Base64_Cikenc }]"/> <input type="submit" name="decode" value="Decode [{ Base64_Cikenc }]"/>
					<br/>
					<?php
						if(isset($_GET["res"])){
							if($_SESSION["result"]){
								?>
								<textarea name="result" style="width: 50%; height: 350px;"><?php echo $_SESSION["result"];?></textarea>
								<?php
							}
						}
					?>
				</form>
				</center>

			




			</body>
			</html>

			<?php
			if(isset($_POST["encode"])){
				unset($_SESSION["result"]);
				$value = $_POST["value"];
				$_SESSION["result"] = $this->conv($value);
				header("location: ui.php?req=".$this->basecamp("encode")."&s=success&res=resources");
			}
			else if(isset($_POST["decode"])){
				unset($_SESSION["result"]);
				$isi = $_POST["value"];
				$_SESSION["result"] = $this->deco($isi);
				header("location: ui.php?req=".$this->basecamp("decode")."&s=success&res=resources");
			}
			?>














			<?php
		}
















	}

?>
