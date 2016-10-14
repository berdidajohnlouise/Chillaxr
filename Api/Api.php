<?php 
include("db.php");
if(isset($_GET["image"]))
{
   $go = $_GET["image"];
   header("location: ../Images/".$go);   
}
else
{
 if(isset($_POST["data"]))
{
 $data = json_decode($_POST["data"]);
 if(isset($data))
 {
	switch($data->action)
	{
	case 0: 
        $username = $data->username;
        $password = $data->password;
        $name = $data->name;
        $contact = $data->contact;
        $email = $data->email;
        $address = $data->address;
        $sex = $data->sex;
        $bday = $data->bday;
        addEnthusiast($username,$password,$name,$contact,$email,$address,$sex,$bday);
        echo "Success";
	   break;
	case 1: 
        $username = $data->username;
        $password = $data->password;
        $row = getEnthusiast($username,$password);
        $go = array("id"=>$row["EnthusiastID"],"name"=>$row["enthusiast_name"],"contact"=>$row["enthusiast_contact"],
		"email"=>$row["enthusiast_email"],"address"=>$row["enthusiast_address"],"bday"=>$row["enthusiast_bday"],
		"sex"=>$row["enthusiast_sex"],"username"=>$row["enthusiast_username"],"password"=>$row["enthusiast_password"],"image"=>$row["enthusiast_image"]);
    	echo json_encode($go);
    	break;
    case 2:
    	$id = $data->id;
    	$name = $data->name;
        $contact = $data->contact;
        $email = $data->email;
        $address = $data->address;
        $sex = $data->sex;
        $bday = $data->bday;
        updateEnthusiast($name,$contact,$email,$address,$sex,$bday,$id);
        echo "Success";
        break;
    case 3:
        $id = $data->id;
        $row = getRooms($id);
        $az = array();
        $i=0;
        foreach($row as $r)
        {
         $a = array("name"=>$r["room_name"],"image"=>$r["room_image"],"capacity"=>$r["room_capacity"],"price"=>$r["room_price"]); 
         $az[$i++] = $a;
        }
         echo json_encode($az);
         break;
    case 4:
        $row = getEstablishment();
        $az = array();
        $i=0;
        foreach($row as $r)
        {
         $x = getCategory($r["categoryid"]);
         $a = array("id"=>$r["eeid"],"name"=>$r["establishment_name"],"image"=>$r["establishment_image"],"category"=>$x["categoryid"],"lat"=>$r["lat"],"long"=>$r["long"]); 
         $az[$i++] = $a;
        }
         echo json_encode($az);
         break;
    case 5:
        $id = $data->id;
        $row = getRoomById($id);
        $az = array();
        $i=0;
        foreach($row as $r)
        {
         $zow = getPackage($r["roomid"]);
         $a = array("id"=>$zow["eventbudgetid"],"package"=>$zow["eventbudget_name"],"room"=>$r["room_name"],
        "capacity"=>$r["room_capacity"],"description"=>$zow["eventbudget_description"],
        "price"=>$zow["eventbudget_price"]); 
         $az[$i++] = $a;
        }
         echo json_encode($az);
       break;
    case 6:
        $id = $data->id;
        $date = $data->date;
        $time = $data->time;
        $user = $data->user;
        addReservation($id,$date,$time,$user);
        echo "Success";
        break;
    case 7:
         $id = $data->id;
         deleteHistory($id);
         break;
    case 8:
         $user = $data->user;
         deleteAllHistory($user);
         break;
    case 9:
     $id = $data->id;
     $image = $data->image;
     $name = $data->name;
     $path = $data->path;
     uploadImage($name,$image,$path,$id);
     break;
    case 10:
    $user = $data->user;
    $eeid = $data->eeid;
    $row = getFollow($user,$eeid);
    if($row["id"] == "")
    {
    follow($user,$eeid);
    }
    else
    {
    followz($user,$eeid);
    }
    break;
    case 11:
    $user = $data->user;
    $eeid = $data->eeid;
    unfollow($user,$eeid);
    break;
    case 12:
    $user = $data->user;
    $eeid = $data->eeid;
    $row = getFollow($user,$eeid);
    echo $row["status"];
    break;
    case 13:
    $id = $data->id;
    $row = getAnnouncement($id);
    $az = array();
    $i=0;
    foreach($row as $r)
    {
     $a = array("name"=>$r["announcement_name"],"details"=>$r["announcement_details"],
                "date"=>$r["announcement_date"],"image"=>$r["announcement_img"]);
     $az[$i++] = $a;
    }
    echo json_encode($az);
    break;
    case 98:
        $user = $data->user;
        $row = getHistory($user);
        $az = array();
        $i=0;
        foreach($row as $r)
        {
        $a = array("id"=>$r["id"],"action"=>$r["action"],"date"=>$r["datez"].' '.$r["time"]);
        $az[$i++] = $a;
        }
        echo json_encode($az);
        break;
    case 99:
        $task = $data->task;
        $date = $data->date;
        $time = $data->time;
        $user = $data->user;
        addHistory($user,$task,$date,$time);
        echo "Success";
        break;
	}
 }
}
}	
?>