<?php


class Log{
	public $code_values;
	public $result_values;


	public function __construct(){

	}
	public function console_log($code, $result){
		$this->code_values = $code;
		$this->result_values = $result;
		$this->logs();
	}
	public function logs(){
		$final_result = "";
		$final_result .= "=================".date("Y/m/d")."===================\n";
		$final_result .= "Code : ".$this->code_values."\n";
		$final_result .= "==============================================\n";
		$final_result .= "Result : ".$this->result_values."\n";
		$final_result .= "==============================================\n";
		$dir = "data_binding/log_data";
		if(!file_exists($dir)){
			mkdir($dir);
		}
		$files = fopen("data_binding/log_data/log.txt", "a");
		fwrite($files, $final_result);
		fclose($files);
	}
}

?>