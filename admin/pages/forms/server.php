<?php
    $target_dir = "https://dev.shouryaacademyedu.com/static/images/upload/result-photo/";
    $uploadOk = 1;
    $errors = array(); 
    $result_title = '';
    $result_desc = '';

    if (isset($_POST['reg_user'])) {

    $target_file = $target_dir.basename($_FILES["img"]["name"]);
    
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $filename = $_FILES["img"]["name"]; 
    $tempname = $_FILES["img"]["tmp_name"];     
    //$folder = "uploads/".$filename; 

    
    //echo $target_file."\n";
    //echo $filename."\n";
    //echo $tempname."\n";
    //echo $folder."\n";
          
    $query = "INSERT INTO t_result_photo (`res_photo_title`, `res_photo_img`, `res_photo_desc`) VALUES ('$result_title', '$filename', '$result_desc')"; 

    echo $query;
    //   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    //   if($check !== false) {
    //     echo "File is an image - " . $check["mime"] . ".";
    //     $uploadOk = 1;
    //   } else {
    //     echo "File is not an image.";
    //     $uploadOk = 0;
    //   }

    // Check if file already exists
    if (file_exists($target_file)) {
        array_push($errors, 'Sorry, file already exists.');
        //echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    // if ($_FILES["fileToUpload"]["size"] > 500000) {
    //   echo "Sorry, your file is too large.";
    //   $uploadOk = 0;
    // }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        array_push($errors, "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
        //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        array_push($errors, "Sorry, your file was not uploaded.");
        //echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file

    } else {
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
            include('https://admin.shouryaacademyedu.com/admin/connection.php');
            $result = mysqli_query($db, $query);
            if($result){
                array_push($errors, "The file has been uploaded.");
                //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded. Database";
            }else{
                //echo $query;
                array_push($errors, "Sorry, there was an error uploading your file. database");
                array_push($errors, $query);
                //echo "Sorry, there was an error uploading your file.";
            }
            //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else { 
            array_push($errors, "Sorry, there was an error uploading your file. upload");
            //echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
  
