<?php

	if($_SERVER["REQUEST_METHOD"] == "POST"){

	}


	/**
	* Row class, each row will become a row class 
	*/
	class Row
	{
		$grade;
		$CATeacher;
		$columns = array();
		function __construct()
		{
			#Constructed!
		}

		public function getGrade(){return $this->grade;}
		public function getCATeacher(){return $this->CATeacher;}
		public function getColumns(){return $this->columns;}

		public function setGrade($grade){$this->grade = $grade;}
		public function setCATeacher($CATeacher){$this->CATeacher = $CATeacher;}
		public function setColumns($columns){$this->columns = $columns;}
		public function setColumn($column,$index){$this-}

	}

	/**
	* column class, each column will become a column class
	*/
	class Column
	{
		private $title = "";
		private $images = array("","");
		private $description = "";


		function __construct()
		{
			#Constructed!
		}

		public function getTitle(){return $this->title;}
		public function getImages(){return $this->images;}
		public function getDescription(){return $this->description;}

		public function setTitle($title){$this->title = $title;}
		public function setImages($images){$this->images = $images;}
		public function setImage($image,$index){$this->images[$index] = $image;}
		public function setDescription($description){$this->description = $description;}
	}




?>
