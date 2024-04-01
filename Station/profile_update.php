<?php 
require 'connection.php';
session_start();
$query="";
// File upload folder 
 $upload_dir="uploads/";
$server_url = '/home/ubuntu/html/Project/Evlocators/Station/'; 
$password=$_REQUEST['password'];
 $image=$_FILES['image']['name'];
  $profile=$_FILES['profile']['name'];
   $cover_photo=$_FILES['cover_photo']['name'];
 $id=$_POST['id'];
 $icons="";
    $s="select * from station where id=$id ";
    $r=$con->query($s);
    $ro=$r->fetch_assoc();
   
 if($image=="")
 {
 $photo=$ro['file'];
 }
 else{
$random_name = rand(1000,1000000)."-".$image;
 $image_tmp_name = $_FILES["image"]["tmp_name"];
        $upload_name = $upload_dir.strtolower($random_name);
        $upload_name = preg_replace('/\s+/', '-', $upload_name);
        $upload_name=$server_url."/".$upload_name;
        if(move_uploaded_file($image_tmp_name , $upload_name)){
           $photo=basename($upload_name); 
        }
       
    }

if($profile==""){
     $photo1=$ro['profile'];
}
else{
    $random_name1 = rand(1000,1000000)."-".$profile;
 $image_tmp_name1 = $_FILES["profile"]["tmp_name"];
        $upload_name1 = $upload_dir.strtolower($random_name1);
        $upload_name1 = preg_replace('/\s+/', '-', $upload_name1);
        $upload_name1=$server_url."/".$upload_name1;
        if(move_uploaded_file($image_tmp_name1 , $upload_name1)){
           $photo1=basename($upload_name1); 
        }
        
}
if($cover_photo==""){
     $photo2=$ro['cover_photo'];
}
else{


         $random_name2 = rand(1000,1000000)."-".$cover_photo;
 $image_tmp_name2 = $_FILES["cover_photo"]["tmp_name"];
        $upload_name2 = $upload_dir.strtolower($random_name2);
        $upload_name2 = preg_replace('/\s+/', '-', $upload_name2);
        $upload_name2=$server_url."/".$upload_name2;
        if(move_uploaded_file($image_tmp_name2 , $upload_name2)){
           $photo2=basename($upload_name2); 
        }
        }
 

    // Get the submitted form data 
        
    $name = $_POST['name']; 
    $email = $_POST['email']; 
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $address=$_POST['address'];
    $lattitude=$_POST['lattitude'];
    $longitude=$_POST['longitude'];
    $amenities=($_POST['amenities']==1)?1:0;

    $sql = "UPDATE `station` SET `name`='$name',`email`='$email',`phone`='$phone',`password`='$password',`address`='$address',`lattitude`='$lattitude',`longitude`='$longitude',`file`='$photo',`profile`='$photo1',`cover_photo`='$photo2',is_amenities='$amenities' WHERE id=$id"; 
    $result=$con->query($sql);

    if($amenities==true){
           $query1 = "delete from amenities where station_id=$id";
  $result51 =$con->query($query1); 

    foreach($_POST["ame"] as $loc_id)
{
if($loc_id=='Juice Bar'){
    $icons='cocktail.png';

}
else if($loc_id=='Parking'){
    $icons='parked-car.png';
}
else if($loc_id=='Wifi'){
    $icons='wi-fi.png';
}
else if($loc_id=='Wash Room'){
    $icons='restroom.png';
}
else if($loc_id=='Locker'){
    $icons='protect.png';
}
else if($loc_id=='Purified Water'){
    $icons='water-filter.png';
}
else if($loc_id=='Dressing Room'){
    $icons='dressing-room.png';
}
else if($loc_id=='Restaurant'){
    $icons='restaurant.png';
}
else if($loc_id=='First Aid Kit'){
    $icons='first-aid-kit.png';
}
else if($loc_id=='Mobile Recharge'){
    $icons='charging.png';
}
else{
    $icons="abcd";
}




  $query = "INSERT INTO amenities(name, icons,station_id) VALUES('$loc_id', '$icons','$id')";
  $result5 =$con->query($query);



}

    }

    //$count=$con->affected_rows;
    if(!$result){
        header("location:profile.php?status=failed");

    }
    else{
        header("location:profile.php?status=success");
    }

     
