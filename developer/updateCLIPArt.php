<?php



	class Post implements JsonSerializable{

		private $title = "";
		private $message = "";
		private $rows = array();
		private $hash = "";
		private $saveType = "";
		
		function __construct($_title,$_message,$_rows,$_saveType){
			$this->title = $_title;
			$this->hash = hash("crc32b",chop($_POST['title']));
			$this->message = $_message;
			foreach ($_rows as $row) {
				array_push($this->rows, $row);
			}
			$this->saveType = $_saveType;

		}

		public function __toString(){
			$str = "$this->title<br>$this->message<br>";
			foreach ($this->rows as $row) {
				$str = $str . "$row";
			}
			return $str;
		}

		public function addRow($row){
			array_push($this->rows, $row);
		}

		public function jsonSerialize() {
			$json = array();
		    foreach($this as $key => $value) {
		        $json[$key] = $value;
		    }
		    return $json; // or json_encode($json)
		}
		
	}

	class Row implements JsonSerializable{

		private $grade = "";
		private $teacher = "";
		private $columns = array();

		public function __construct($_grade,$_teacher,$_columns){
			$this->grade = $_grade;
			$this->teacher = $_teacher;
			foreach ($_columns as $column) {
				array_push($this->columns, $column);
			}
		}

		//getters
		public function getGrade(){return $this->grade;}
		public function getTeacher(){return $this->teacher;}
		public function getColumns(){return $this->columns;}

		//setter
		public function setGrade($grade){$this->grade = $grade;}
		public function setTeacher($teacher){$this->teacher = $teacher;}
		public function setColumns($columns){$this->columns = $columns;}
		public function setColumn($column,$index){$this->columns[$index] = $column;}

		public function __toString(){
			$str = "&#9;$this->grade CLIP Art Teacher: $this->teacher<br>";
			foreach ($this->columns as $column) {
				$str = $str . "&#9;$column";
			}
			return $str;
		}

		public function jsonSerialize() {
			$json = array();
		    foreach($this as $key => $value){
		        $json[$key] = $value;
		    }
		    return $json; // or json_encode($json)
		}
	}

	class Column implements JsonSerializable{

		private $title = "";
		private $images = array();
		private $description = "";


		public function __construct($_title,$_images,$_description){
			//initialize variables
			$this->title = $_title;
			foreach ($_images as $image) {
				array_push($this->images, $image);
			}
			$this->description = $_description;
		}

		//getters
		public function getTitle(){return $this->title;}
		public function getImages(){return $this->images;}
		public function getDescription(){return $this->description;}

		//setters
		public function setTitle($title){$this->title = $title;}
		public function setImages($images){$this->images = $images;}
		public function setImage($image,$index){$this->images[$index] = $image;}
		public function setDescription($description){$this->description = $description;}

		public function __toString(){
			$str = "&#9;$this->title<br>";
			foreach ($this->images as $image) {
				$str = $str . "&#9;$image<br>";
			}
			$str = $str . "&#9;$this->description<br>";
			return $str;
		}

		public function jsonSerialize() {
			$json = array();
		    foreach($this as $key => $value) {
		        $json[$key] = $value;
		    }
		    return $json; // or json_encode($json)
		}
	}


	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$saveType = $_POST['saveType'];
		$rows = array();
		//get all the rows
		$numRows = $_POST["numRows"];
		for ($i=0; $i < $numRows; $i++) {
			//get the information for columns
			$columns = array();
			for ($j=0; $j < 2; $j++) { 
				$title = "";
				$images = array();
				$description = "";
				if (isset($_POST["row$i-column$j-title"])) { //get the title, if the column exists
					$title = chop($_POST["row$i-column$j-title"]);
					//get the images
					for ($k=0; $k < 2; $k++) {
						if(isset($_FILES["row$i-column$j-image$k"])) {
							$file_tmp = $_FILES["row$i-column$j-image$k"]["tmp_name"];
							$name = $_FILES["row$i-column$j-image$k"]['name'];
							$extension = '.'.strtolower(substr($name, strpos($name, ".") + 1));
							$file = "/home/cusdzern/public_html/images/clipart-$title-$k$extension";
						} else {
							break;
						}
						
						if(explode("/",$_FILES["row$i-column$j-image$k"]["type"])[0] == "image"){
							if(move_uploaded_file($file_tmp, $file)){
								array_push($images, $file);
							} else {
								echo "there was a problem uploading $file<br>";
							}
						} else {
							echo "image is ".$_FILES["row$i-column$j-image$k"]["type"].", only image files are accepted for upload<br>";
						}
					}
				} else { //if it doesn't, then break out of the loop
					break;
				}
				//get the description
				$description = chop($_POST["row$i-column$j-text"]);
				array_push($columns, new Column($title,$images,$description));
			}
			//add the new row to the rows array
			array_push($rows, new Row(chop($_POST["row$i-grade"]),chop($_POST["row$i-teacher"]),$columns));
		}

		//create the post object
		$post = new Post(chop($_POST['title']),chop($_POST['main-description']),$rows,$_POST['saveType']);

		//create a new json file for the clip art page and write it
		$file_name = hash("crc32b",chop($_POST['title']));
		$titles_path = "/home/cusdzern/public_html/clipart_posts/titles.json";
		if(fopen("/home/cusdzern/public_html/clipart_posts/$file_name.json", "x")){
			echo "runing the \"file doesn't already exists\" path<br>";
			//will run if file doesn't already exist
			//add this title to the titles list
			$titles_file = fopen($titles_path, "r");
			$titles_json = fread($titles_file, filesize($titles_path));
			fclose($titles_file);
			$titles = json_decode($titles_json,true);
			array_unshift($titles, $file_name);
			$titles_file = fopen($titles_path, "w");
			fwrite($titles_file, json_encode($titles));
			fclose($titles_file);
		} else {
			echo "runing the \"file already exists\" path<br>";
			//will run if the file already exists
			//don't need to add the file to the titles list because it is already there
			//but we want to move it to the top of the array
			//get the json titles file
			$titles_file = fopen($titles_path, "r");
			//get the json from the file
			$titles_json = fread($titles_file, filesize($titles_path));
			//close the file
			fclose($titles_file);
			//convert json to array
			$titles = json_decode($titles_json,true);
			//find the current key title in the array
			$title_key = array_search($file_name, $titles);
			//remove it from the array
			array_splice($titles, $title_key,1);
			//add the title to the front of the array
			array_unshift($titles, $file_name);
			//open titles file for writing
			$titles_file = fopen($titles_path, "w");
			//write new titles array to titles.json file
			fwrite($titles_file, json_encode($titles));
			fclose($titles_file);
		}

		//write the new file
		$file = fopen("/home/cusdzern/public_html/clipart_posts/$file_name.json", "w");
		fwrite($file, json_encode($post));
		fclose($file);

		echo "file written to /home/cusdzern/public_html/clipart_posts/$file_name.json<br>";
		echo "<a href=\"http://www.cusdclipco.org/developer\">Back to Developer Index</a>";

	}

	else{
		echo "this page is meant to be shown after submitting the <a href=\"http://www.cusdclipco.org/developer/updateCLIPArt.html\">update clip art form</a>.";
	}

?>
