<? 
include("includes.php");

if ($_POST['submit']=="Postphoto")
	{
	
	
	
		//upload avatar
			
			if ($_FILES["fileToUpload"]["name"]) {
			$filename_time=time();
			$target_dir = "uploads/";
			$target_file = $target_dir .$filename_time."_".
			basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType =
			strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			$check =
			getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
		//	echo "File is an image - " . $check["mime"] .
		//	".";
			$uploadOk = 1;
			}else{
				$errorArray[] =  "File is not an image.";
			$uploadOk = 0;
			}
			}
			// Check if file already exists
			if (file_exists($target_file)) {
				$errorArray[] =  "File already exists.";
			$uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 200000) {
				$errorArray[] =  "Your file is too large.";
			$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" &&
			$imageFileType != "jpeg" && $imageFileType != "gif" ) {
				$errorArray[] = "Only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
			}
			// Check if $upload Ok is set to 0 by an error
			if ($uploadOk == 0) {
				$errorArray[] = "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} 
		}
	
	
		$avatar_filename="";
		if ($uploadOk == 1) {
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file);
			$filename= basename($_FILES["fileToUpload"]["name"]);
			$avatar_filename=$filename_time."_".$filename;
			}
	
	
$query= "INSERT INTO photos (title, des, user,photo) VALUES ('".$_POST['title']."','".$_POST['des']."','".$_SESSION['username']."','".$avatar_filename."')";

		connectDB();
$result=mysqli_query($_SESSION['db'],$query) or die ("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $query . "<br />\nError: (" . mysqli_errno($_SESSION['db']) . ") " . mysqli_error($_SESSION['db']));
		closeDB();
		
		$sucess="1";
		$_SESSION['msg']="User Created";
		$_SESSION['msgType']="success";
	
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Khanh Dzu Do - S328390">
    <meta name="generator" content="Khanh Dzu Do - S328390">
    <title>NT Photography Social Network</title>

    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">

	  
	  <form method="post" action="<?=$_SERVER['php_self'];?>" id="userManagement" class="form-signin" enctype="multipart/form-data">
 NT Photography User
  <h1 class="h3 mb-3 font-weight-normal">Post a photo</h1>
	 <? if ($sucess<>1) { ?>		  
  <label for="des" class="sr-only">Title</label>
  <input type="text" id="title" name="title" class="form-control" placeholder="Title of Photo" >
  <label for="des" class="sr-only">Description</label>
		  <textarea name="des" class="form-control"  placeholder="Description" ></textarea>

  <br>
<p><label for="avatar">Your Photo :</label><input type="file" name="fileToUpload" id="fileToUpload" placeholder="Avatar" class="form-control" ></p>	

<button type="submit" name="submit" value="Postphoto" class="btn btn-lg btn-primary btn-block" >Post Your Photo</button> 		  
		    <? } else { echo "You have posted a photo successfully !";  ?>
		  
		    <p><a class="btn btn-primary btn-lg" href="#" role="button"  onclick="location.href='index.php'">Go to Homepage &raquo;</a></p>
		 
		  
		  <? }?>
		  
		  
		  
  <p class="mt-5 mb-3 text-muted">Khanh Dzu Do - S328390 - 2021</p>
</form> 
	
	  
	  
	  
</body>
</html>
