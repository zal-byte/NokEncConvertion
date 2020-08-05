<?php




class Handler{
	public $code_values;
	public $result_values;
	public $koneksi;
	public function __construct($con){
		$this->koneksi = $con;
	}

	public function setData($values1, $values2){

		$this->code_values = $values1;
		$this->result_values = $values2;
		$this->save();
	}
	function save(){


		if($sql = mysqli_query($this->koneksi, $this->query())){

		}

	}

	function query(){
		$query = "insert into saved (`code_values`,`result_values`,`table_names`) values ('".$this->code_values."','".$this->result_values."','tab')";

		return $query;
	}

	public function search($keywords){
		$array_holder["code_values"] = array();
		$array_holder["result_values"] = array();
		$query = "select * from saved where result_values like '%".$keywords."%'";
		$sq = mysqli_query($this->koneksi, $query);
		if($sq){
			while($row = mysqli_fetch_assoc($sq)){
				array_push($array_holder["code_values"],$row["code_values"]);
				array_push($array_holder["result_values"],$row["result_values"]);
			}
		}

		return $array_holder;
	}

	public function delete_data(){
		$que = "delete from saved where table_names ='tab'";
		$sq = mysqli_query($this->koneksi, $que);

	}

}


?>