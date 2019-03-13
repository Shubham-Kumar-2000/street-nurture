<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$secretKey = '6Ld5HYwUAAAAAM7MXoyuld0W1qEr_MtfHdBYjxb1';
        $captcha = $_POST['g-recaptcha-response'];
         $ip = $_SERVER['REMOTE_ADDR'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
        $responseKeys = json_decode($response,true);

        if(intval($responseKeys["success"]) !== 1) {
            $m= "<span class='red'>Captcha not verified!!!!.</span>";
          header('location: complain.php?m=' . $m);
        } else {

require("includes/common.php");
$type = $_POST['name'];
$m4 = "<span class='red'>Not a valid Problem Type</span>";
if($type=='0'){
header('location: complain.php?m2=&m1=' . $m4);}
$contact = $_POST['contact'];
$locate=$_POST['loc'];
$des=$_POST['des'];
$id=0;
 $regex_num = "/^[6789][0-9]{9}$/";
if (isset($_SESSION['email']))
{ $email=$_SESSION['email'];
    $query = "SELECT id FROM users WHERE email='$email'";
  $result = mysqli_query($con, $query)or die($mysqli_error($con));
$num = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
$id=$row["id"];
}
if (!preg_match($regex_num, $contact)) {
    $m = "<span class='red'>Not a valid phone number</span>";
header('location: auth.php?m3=' . $m . '&m1=&s=1');}
 $query = "SELECT cid FROM complains order by cid desc";
  $result = mysqli_query($con, $query)or die($mysqli_error($con));
$num = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
$num=$row['cid'];

$cid=$num+1;

$target_dir = "uploads/";
$extension = pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION);
$namephoto = $cid;
$target_file = $target_dir . basename($namephoto.".jpg");
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

// Check if file already exists

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $m= "<span class='red'>Sorry, your file is too large.</span>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
) {
    $m= "<span class='red'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</span>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {

    header('location: complain.php?m2=' . $m);
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
       ;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}




$query = "INSERT INTO complains(id, cid,type, contact,address,des )VALUES('" . $id . "','" . $cid . "','" . $type . "','" . $contact . "','" . $locate . "','" . $des . "')";
    mysqli_query($con, $query) or die(mysqli_error($con));
    header('location: success.php?i=' .$cid );
}}
 else {
     $m= "<span class='red'>Captcha not verified!!!!.</span>";
     header('location: complain.php?m=' . $m);
 }
 
?>