<?php 
error_reporting(0);
class DB{
	function executeQuery($q){
		$con = mysqli_connect("localhost","root","","minicar");
		return $data=mysqli_query($con,$q);
		mysqli_close($con);
	}
	
	function getConnection(){
		return $con = mysqli_connect("localhost","root","","minicar");
	}
}

class m_fact{
	var $name="";
	function validateName(){
		if(!empty($this->name)){
			return true;
		}
	}
	function saveData($name){
		$this->name=$name;
		
		if($this->validateName()){
			$xcon = new DB();
			$q = "INSERT INTO manufacturer set man_name='".$this->name."'";
			$xcon->executeQuery($q);
			return true;
		}
		else{
			echo "Error";
			return false;
		}
	}

}
class model{
	function saveData($name,$id){
		if(!empty($name) and !empty($id) ){
			$Dbo = new DB();
			$q = "select * from model where model_name like '".$name."' and man_id='".$id."'";
			$con=$Dbo->getConnection();
			$rdata = mysqli_query($con,$q);
			$count = mysqli_num_rows($rdata);
			$data = mysqli_fetch_array($rdata);
			if($count>0){
				$q = "update model set unit=unit+1 where m_id='".$data['m_id']."'";
			}
			else{
				$q = "INSERT INTO model set model_name='".$name."',man_id='".$id."',unit=unit+1";
			}
			$Dbo->executeQuery($q);
			return true;
		}
		else{
			echo "Error";
			return false;
		}
	}
	
	function soldCar($rowid){
		if(!empty($rowid)){
		$q = "update model set unit=unit-1 where m_id='".$rowid."'";
		$Dbo = new DB();
		$Dbo->executeQuery($q);
		}
	}
	function listAllmodels(){
		$Dbo = new DB();
		$q = "select manufacturer.man_name,model.model_name,model.unit,model.m_id from model,manufacturer where manufacturer.id=model.man_id and unit>0";
		return $data = $Dbo->executeQuery($q);
	}
}
?>