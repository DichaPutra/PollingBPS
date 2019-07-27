<?php

$target_dir = "images/background/";
$target_temp = $target_dir . basename($_FILES["input-file-preview"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_temp, PATHINFO_EXTENSION);
$target_file = $target_dir . "user_upload." . $imageFileType;

echo $imageFileType;

// Check if image file is a actual image or fake image
//if (isset($_POST["submit"])) {
//    $check = getimagesize($_FILES["input-file-preview"]["tmp_name"]);
//    if ($check !== false) {
//        $uploadOk = 1;
//    } else {
//        $uploadOk = 0;
//    }
//}

//chmod($target_file, 0755);
//unlink($target_file);

// Check file size
//if ($_FILES["input-file-preview"]["size"] > 5000) {
//    echo "Sorry, your file is too large.";
//    $uploadOk = 0;
//}

//Allow certain file formats
//if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
//    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//    $uploadOk = 0;
//}

//if ($uploadOk == 0) {
//    echo "Sorry, your file was not uploaded.";
//} else {
//    if (move_uploaded_file($_FILES["input-file-preview"]["tmp_name"], $target_file)) {
//        echo "The file $target_file has been uploaded.";
//    } else {
//        echo "Sorry, there was an error uploading your file.";
//    }
//}

//echo "";

//header('location:cn_admin.php?id=background');
?>