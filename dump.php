$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc'); // valid extensions
			$path = 'uploads/'; // upload directory
			//image upload check	
			$_FILES['image'];
			$img = $_FILES['image']['name'];
			$tmp = $_FILES['image']['tmp_name'];
			$ext = strtolower(pathdanger($img, PATHdanger_EXTENSION));
			$final_image = rand(1000,1000000).$img;
			if(in_array($ext, $valid_extensions))
			$path = $path.strtolower($final_image); 
			if(move_uploaded_file($tmp,$path))
			
		//end