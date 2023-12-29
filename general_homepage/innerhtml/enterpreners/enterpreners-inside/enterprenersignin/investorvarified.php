<?php
if(isset($_GET['vkey'])){
    $vkey =$_GET['vkey'];
    include("../../../../dbconfig.php");
    $s ="select * from investor where varefied=0 && vkey='$vkey'";
    $result = mysqli_query($db,$s);
    $num=mysqli_num_rows($result);
    if($num==1){
       // $update $mysqli->query("update companyregs set varefied=1 where vkey = '$vkey' limit 1");
       $ss="update investor set varefied=1 where vkey = '$vkey'";
       mysqli_query($db,$ss);
       if($ss){
        $sql = "select * from investor where vkey = '$vkey'";
        $result1 = $db->query($sql);
            if ($result1->num_rows > 0) {
              $row = $result1->fetch_assoc();
              $email = $row['email'];
              
              $dirs = "membersinfo/$email";

	
              $dirss = str_replace(" ", "", $_POST['dirs']);
              if(!file_exists($dirss)){
                  mkdir($dirs);
              
                  //echo "<script>alert('You create directory successfully')</script>";
                  //echo "<script>window.location='index.php'</script>";
              }
              else{
                  echo "sorry";
              }


            echo'<script>alert("Thanks for varifing the account. Login with you Email id and Password. ")</script> ';
            echo "<meta http-equiv='refresh' content='0; url=../../investor.html' />";

        }
    }
        else{
            echo"error";
        }
    }
    else{
        echo"this account is invalied or alredy varified";
    }
}
else{
    die("somthing went wrong");
}
?>