<?php
// Initialize the session
session_start();
include("../../../../dbconfig.php");
// Check if the user is logged in, if not then redirect him to login page
if(isset($_SESSION['email']) && isset($_SESSION['password']) && ($_SESSION['acctype']=='entrep')){
    $email=$_SESSION['email'];
    $password=$_SESSION['password'];
    $acctype=$_SESSION['acctype'];

    #file name with a random number so that similar dont get replaced
    $tname1 = $_FILES["file1"]["tmp_name"];
    $tname2 =$_FILES['file2']['tmp_name'];
    $tname3 =$_FILES['file3']['tmp_name'];
    $tname4 =$_FILES['file4']['tmp_name'];
    $tname5 =$_FILES['file5']['tmp_name'];
    $tname6 =$_FILES['file6']['tmp_name'];
    $tname7 =$_FILES['file7']['tmp_name'];
    $tname8 =$_FILES['file8']['tmp_name'];
    $tname9 =$_FILES['file9']['tmp_name'];
    $tname10 =$_FILES['file10']['tmp_name'];
    $tname11 =$_FILES['file11']['tmp_name'];
    $tname12 = $_FILES['file12']['tmp_name'];
    if($tname1 == ''){
    $pname1 = $_FILES['file1']['name'];
    }
else{
    $pname1 = rand(1000,10000)."-".$_FILES["file1"]["name"];
}
if($tname2 == ''){
    $pname2 = $_FILES['file2']['name'];
    }
else{
    $pname2 = rand(1000,10000)."-".$_FILES['file2']['name'];
}
if($tname3 == ''){
    $pname3 = $_FILES['file3']['name'];
    }
else{
    $pname3 = rand(1000,10000)."-".$_FILES['file3']['name'];
}
if($tname4 == ''){
    $pname4 = $_FILES['file4']['name'];
    }
else{
$pname4 = rand(1000,10000)."-".$_FILES['file4']['name'];
}
if($tname5 == ''){
    $pname5 = $_FILES['file5']['name'];
    }
else{
$pname5 = rand(1000,10000)."-".$_FILES['file5']['name'];
}
if($tname6 == ''){
    $pname6 = $_FILES['file6']['name'];
    }
else{
$pname6 = rand(1000,10000)."-".$_FILES['file6']['name'];
}
if($tname7 == ''){
    $pname7 = $_FILES['file7']['name'];
    }
else{
$pname7 = rand(1000,10000)."-".$_FILES['file7']['name'];
}
if($tname8 == ''){
    $pname8 = $_FILES['file8']['name'];
    }
else{
$pname8 = rand(1000,10000)."-".$_FILES['file8']['name'];
}
if($tname9 == ''){
    $pname9 = $_FILES['file9']['name'];
    }
else{
$pname9 = rand(1000,10000)."-".$_FILES['file9']['name'];
}
if($tname10 == ''){
    $pname10 = $_FILES['file10']['name'];
    }
else{
$pname10 = rand(1000,10000)."-".$_FILES['file10']['name'];
}
if($tname11 == ''){
    $pname11 = $_FILES['file11']['name'];
    }
else{
$pname11 = rand(1000,10000)."-".$_FILES['file11']['name'];
}
if($tname12 == ''){
    $pname12 = $_FILES['file12']['name'];
    }
else{
$pname12 = rand(1000,10000)."-".$_FILES['file12']['name'];
}
    #temporary file name to store file
   
    #=====================================================application/pdf
    $imageFileType1 = strtolower(pathinfo($pname1,PATHINFO_EXTENSION));
    $imageFileType2 = strtolower(pathinfo($pname2,PATHINFO_EXTENSION));
    $imageFileType3 = strtolower(pathinfo($pname3,PATHINFO_EXTENSION));
    $imageFileType4 = strtolower(pathinfo($pname4,PATHINFO_EXTENSION));
    $imageFileType5 = strtolower(pathinfo($pname5,PATHINFO_EXTENSION));
    $imageFileType6 = strtolower(pathinfo($pname6,PATHINFO_EXTENSION));
    $imageFileType7 = strtolower(pathinfo($pname7,PATHINFO_EXTENSION));
    $imageFileType8 = strtolower(pathinfo($pname8,PATHINFO_EXTENSION));
    $imageFileType9 = strtolower(pathinfo($pname9,PATHINFO_EXTENSION));
    $imageFileType10 = strtolower(pathinfo($pname10,PATHINFO_EXTENSION));
    $imageFileType11 = strtolower(pathinfo($pname11,PATHINFO_EXTENSION));
    $imageFileType12 = strtolower(pathinfo($pname12,PATHINFO_EXTENSION));
  
 
   if( $imageFileType1 != "pdf" && $imageFileType1 != ""){
       echo "<script>alert('Sorry, only Application , PDF files are allowed.')</script>";
       echo "<meta http-equiv='refresh' content='0; url=general_A.php' />";
   }
   elseif($imageFileType2 != "pdf" && $imageFileType2 != ""){
       echo "<script>alert('Sorry, only Application , PDF files are allowed.')</script>";
       echo "<meta http-equiv='refresh' content='0; url=general_A.php' />";
   }
    elseif($imageFileType3 != "xlsx" && $imageFileType3 != ""){
       echo "<script>alert('Sorry, only Application , xlsx files are allowed.')</script>";
       echo "<meta http-equiv='refresh' content='0; url=general_A.php' />";
   }
   elseif($imageFileType4 != "pdf" && $imageFileType4 != ""){
       echo "<script>alert('Sorry, only Application , PDF files are allowed.')</script>";
       echo "<meta http-equiv='refresh' content='0; url=general_A.php' />";
   }
    elseif($imageFileType5 != "pdf" && $imageFileType5 != ""){
       echo "<script>alert('Sorry, only Application , PDF files are allowed.')</script>";
       echo "<meta http-equiv='refresh' content='0; url=general_A.php' />";
   }
    elseif($imageFileType6 != "pdf" && $imageFileType6 != ""){
       echo "<script>alert('Sorry, only Application , PDF files are allowed.')</script>";
       echo "<meta http-equiv='refresh' content='0; url=general_A.php' />";
   }
    elseif($imageFileType7 != "pdf" && $imageFileType7 != ""){
       echo "<script>alert('Sorry, only Application , PDF files are allowed.')</script>";
       echo "<meta http-equiv='refresh' content='0; url=general_A.php' />";
   }
    elseif($imageFileType8 != "pdf" && $imageFileType8 != ""){
       echo "<script>alert('Sorry, only Application , PDF files are allowed.')</script>";
       echo "<meta http-equiv='refresh' content='0; url=general_A.php' />";
   }
    elseif($imageFileType9 != "pdf" && $imageFileType9 != ""){
       echo "<script>alert('Sorry, only Application , PDF files are allowed.')</script>";
       echo "<meta http-equiv='refresh' content='0; url=general_A.php' />";
   }
    elseif($imageFileType10 != "pdf" && $imageFileType10 != ""){
       echo "<script>alert('Sorry, only Application , PDF files are allowed.')</script>";
       echo "<meta http-equiv='refresh' content='0; url=general_A.php' />";
   }
    elseif($imageFileType11 != "pdf" && $imageFileType11 != ""){
       echo "<script>alert('Sorry, only Application , PDF files are allowed.')</script>";
       echo "<meta http-equiv='refresh' content='0; url=general_A.php' />";
   }
    elseif($imageFileType12 != "pdf" && $imageFileType12 != ""){
       echo "<script>alert('Sorry, only Application , PDF files are allowed.')</script>";
       echo "<meta http-equiv='refresh' content='0; url=general_A.php' />";
   }

else{
    #===================================================
    $commentfile1 = $_POST['commentfile1'];
    $commentfile2 = $_POST['commentfile2'];
    $commentfile3 = $_POST['commentfile3'];
    $commentfile4 = $_POST['commentfile4'];
    $commentfile5 = $_POST['commentfile5'];
    $commentfile6 = $_POST['commentfile6'];
    $commentfile7 = $_POST['commentfile7'];
    $commentfile8 = $_POST['commentfile8'];
    $commentfile9 = $_POST['commentfile9'];
    $commentfile10 = $_POST['commentfile10'];
    $commentfile11 = $_POST['commentfile11'];
    $commentfile12 = $_POST['commentfile12'];
    
    #demo starts======================================================
    $file_name1 = $_FILES['file1']['name'];
    $file_name2 = $_FILES['file2']['name'];
    $file_name3 = $_FILES['file3']['name'];
    $file_name4 = $_FILES['file4']['name'];
    $file_name5 = $_FILES['file5']['name'];
    $file_name6 = $_FILES['file6']['name'];
    $file_name7 = $_FILES['file7']['name'];
    $file_name8 = $_FILES['file8']['name'];
    $file_name9 = $_FILES['file9']['name'];
    $file_name10= $_FILES['file10']['name'];
    $file_name11 = $_FILES['file11']['name'];
    $file_name12 = $_FILES['file12']['name'];
   
  
     $uploads_dir =  "membersinfo/$email";
     //$uploads_dir = "images";
    #TO move the uploaded file to specific location
    move_uploaded_file($tname1, $uploads_dir.'/'.$pname1);
    move_uploaded_file($tname2, $uploads_dir.'/'.$pname2);
    move_uploaded_file($tname3, $uploads_dir.'/'.$pname3);
    move_uploaded_file($tname4, $uploads_dir.'/'.$pname4);
    move_uploaded_file($tname5, $uploads_dir.'/'.$pname5);
    move_uploaded_file($tname6, $uploads_dir.'/'.$pname6);
    move_uploaded_file($tname7, $uploads_dir.'/'.$pname7);
    move_uploaded_file($tname8, $uploads_dir.'/'.$pname8);
    move_uploaded_file($tname9, $uploads_dir.'/'.$pname9);
    move_uploaded_file($tname10, $uploads_dir.'/'.$pname10);
    move_uploaded_file($tname11, $uploads_dir.'/'.$pname11);
    move_uploaded_file($tname12, $uploads_dir.'/'.$pname12);
 
    $date = date('Y-m-d H:i:s');
  
$sql = "insert into bad(email,file1,file2,file3,file4,file5,file6,file7,file8,file9,file10,file11,file12,commentfile1,commentfile2,commentfile3,commentfile4,commentfile5,commentfile6,commentfile7,commentfile8,commentfile9,commentfile10,commentfile11,commentfile12,createdat)values('$email','$pname1','$pname2','$pname3','$pname4','$pname5','$pname6','$pname7','$pname8','$pname9','$pname10','$pname11','$pname12','$commentfile1','$commentfile2','$commentfile3','$commentfile4','$commentfile5','$commentfile6','$commentfile7','$commentfile8','$commentfile9','$commentfile10','$commentfile11','$commentfile12','$date')";
    if(mysqli_query($db,$sql)){
 
    echo "<script>alert('File Uploaded Successfully')</script>";
    ///echo "<meta http-equiv='refresh' content='0; url=general_A2.php' />";
    }

    else{
        echo "Error";
    }
}






}


    ?>