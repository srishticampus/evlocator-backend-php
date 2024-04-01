<?php
require 'connection.php';
$userid=$_REQUEST['userid'];
$data=array();
$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$phone=$_REQUEST['phone'];
 $image=$_FILES['image']['name'];

 $upload_dir="uploads/";
$server_url = '/home/ubuntu/html/Project/Evlocators/api/';
if($image==""){
$sq="select * from user where id=$userid";
$res=$con->query($sq);
$co=$res->num_rows;

	$ro=$res->fetch_assoc();
	$photo=$ro['image'];

}
else{
// 	$random_name = rand(1000,1000000)."-".$image;
 // $image_tmp_name = $_FILES["image"]["tmp_name"];
 //        $upload_name = $upload_dir.strtolower($random_name);
 //        $upload_name = preg_replace('/\s+/', '-', $upload_name);
 //        $upload_name=$server_url."/".$upload_name;
 //        if(move_uploaded_file($image_tmp_name , $upload_name)){
 //           $photo=basename($upload_name); 
 //         // echo $photo;
 //        }





$avatar_name = $_FILES["image"]["name"];
    $avatar_tmp_name = $_FILES["image"]["tmp_name"];
    //$error = $_FILES["image"]["error"];
    //$file_ext = pathinfo($avatar_name,PATHINFO_EXTENSION);
     //$random_name = rand(1000,1000000)."-".$avatar_name;
    $random_name = rand(1000,1000000)."-".$avatar_name;
        $upload_name = $upload_dir.strtolower($random_name);
        $upload_name = preg_replace('/\s+/', '-', $upload_name);
        $upload_name=$server_url."/".$upload_name;
      
$data=array();


      if(move_uploaded_file($avatar_tmp_name , $upload_name))
      {
          $photo = basename($upload_name);
      }
      else
      {
         $photo= "";
      }


















       
}
$sql="update user set name='$name',email='$email',phone_number='$phone',image='$photo' where id=$userid";
$result=$con->query($sql);
if(!$result){
	$data=array("status"=>false,
             "message"=>"updated failed");
}
else{
		$data=array("status"=>true,
            "message"=>"updated successfull");

}
echo json_encode($data);
?>