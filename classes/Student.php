<?php
include "DB.php";

class Student
{
	private $table='tbl_student';
	private $name;
	private $dept;
	private $age;
	public function setName($name){
		$this->name=$name;
	}
	public function setDept($dept){
		$this->dept=$dept;
	}
	public function setAge($age){
		$this->age=$age;
	}

	public function insert(){
		$sql="INSERT INTO $this->table(name,dept,age) VALUES(:name,:dept,:age)";
		$stmt=DB::prepare($sql);
		$stmt->bindParam(':name',$this->name);
		$stmt->bindParam(':dept',$this->dept);
		$stmt->bindParam(':age',$this->age);
		return $stmt->execute();


	}

		public function Update($id){
			$sql="Update $this->table SET name=:name,dept=:dept,age=:age WHERE id=:id";
			$stmt=DB::prepare($sql);
		$stmt->bindParam(':name',$this->name);
		$stmt->bindParam(':dept',$this->dept);
		$stmt->bindParam(':age',$this->age);
		$stmt->bindParam(':id',$id);
		return $stmt->execute();
		}

		public function Delete($id){
			$sql = "DELETE FROM $this->table WHERE id=:id";
			$stmt=DB::prepare($sql);
			$stmt->bindParam(':id', $id);
			return $stmt->execute();
		}


	public function readById($id){
		$sql="SELECT * FROM $this->table WHERE id=:id";
		$stmt=DB::prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		return $stmt->fetch();
	}
	
	public function readAll()
	{
		$sql="SELECT * FROM $this->table";
		$stmt=DB::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}
}

?>