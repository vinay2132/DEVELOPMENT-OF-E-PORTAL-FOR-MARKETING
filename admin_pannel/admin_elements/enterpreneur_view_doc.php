<?php
session_start();
include("../dbconfig.php");
$email = $_GET['email'];
if( isset($_SESSION['password']) && ($_SESSION['acctype']=='admin')){
  // $email=$_SESSION['email'];
   $password=$_SESSION['password'];
   $acctype=$_SESSION['acctype'];
  // $email = $_GET['email'];

}
else{
   header("location: ../pages/samples/lock-screen.html");
   exit;
}

$sql = "select * from entrepreneurs where email = '".$email."'";
    $result1 = $db->query($sql);
        if ($result1->num_rows > 0) {
          $row = $result1->fetch_assoc();

         $full_name = $row['full_name'];
//$email = $row['email'];
$phone = $row['phone'];
$password = $row['password'];

$skills = $row['skills'];
$video_link = $row['video_link'];
$company_name = $row['company_name'];
$stage = $row['stage'];
$sector = $row['sector'];
$about_founder = $row['about_founder'];
$message = $row['message'];
$file_memo = $row['file_memo'];
$mentorship = $row['mentorship'];
$mentor_describe = $row['mentor_describe'];
        }


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Digital Trend</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/style.css">
  <!-- endinject -->

</head>

<body>
  <div class="container-scroller">
    <!-- partial:../partials/_horizontal-navbar.html -->
        <div class="horizontal-menu">
      <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container-fluid">
          <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
            <ul class="navbar-nav navbar-nav-left">
              <li class="nav-item ml-0 mr-5 d-lg-flex d-none">
                <a href="#" class="nav-link horizontal-nav-left-menu"><i class="mdi mdi-format-list-bulleted"></i></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-bell mx-0"></i>
                  <span class="count bg-success">2</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                  <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-success">
                          <i class="mdi mdi-information mx-0"></i>
                        </div>
                    </div>
                    <div class="preview-item-content">
                        <h6 class="preview-subject font-weight-normal">Application Error</h6>
                        <p class="font-weight-light small-text mb-0 text-muted">
                          Just now
                        </p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-warning">
                          <i class="mdi mdi-settings mx-0"></i>
                        </div>
                    </div>
                    <div class="preview-item-content">
                        <h6 class="preview-subject font-weight-normal">Settings</h6>
                        <p class="font-weight-light small-text mb-0 text-muted">
                          Private message
                        </p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-info">
                          <i class="mdi mdi-account-box mx-0"></i>
                        </div>
                    </div>
                    <div class="preview-item-content">
                        <h6 class="preview-subject font-weight-normal">New user registration</h6>
                        <p class="font-weight-light small-text mb-0 text-muted">
                          2 days ago
                        </p>
                    </div>
                  </a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-email mx-0"></i>
                  <span class="count bg-primary">4</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                  <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <img src="../images/faces/face4.jpg" alt="image" class="profile-pic">
                    </div>
                    <div class="preview-item-content flex-grow">
                        <h6 class="preview-subject ellipsis font-weight-normal">David Grey
                        </h6>
                        <p class="font-weight-light small-text text-muted mb-0">
                          The meeting is cancelled
                        </p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <img src="../images/faces/face2.jpg" alt="image" class="profile-pic">
                    </div>
                    <div class="preview-item-content flex-grow">
                        <h6 class="preview-subject ellipsis font-weight-normal">Tim Cook
                        </h6>
                        <p class="font-weight-light small-text text-muted mb-0">
                          New product launch
                        </p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <img src="../images/faces/face3.jpg" alt="image" class="profile-pic">
                    </div>
                    <div class="preview-item-content flex-grow">
                        <h6 class="preview-subject ellipsis font-weight-normal"> Admin
                        </h6>
                        <p class="font-weight-light small-text text-muted mb-0">
                          Upcoming board meeting
                        </p>
                    </div>
                  </a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link count-indicator "><i class="mdi mdi-message-reply-text"></i></a>
              </li>
              <li class="nav-item nav-search d-none d-lg-block ml-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="search">
                        <i class="mdi mdi-magnify"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control" placeholder="search" aria-label="search" aria-describedby="search">
                </div>
              </li>	
            </ul>
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                            <a class="navbar-brand brand-logo" href="index.html"> <strong>Digital Trend</strong></a>

                            <a class="navbar-brand brand-logo-mini" href="index.html"><strong>DT</strong></a>
                        </div>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item dropdown  d-lg-flex d-none">
                  <button type="button" class="btn btn-inverse-primary btn-sm">Product </button>
                </li>
                <li class="nav-item dropdown d-lg-flex d-none">
                  <a class="dropdown-toggle show-dropdown-arrow btn btn-inverse-primary btn-sm" id="nreportDropdown" href="#" data-toggle="dropdown">
                  Reports
                  </a>
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="nreportDropdown">
                      <p class="mb-0 font-weight-medium float-left dropdown-header">Reports</p>
                      <a class="dropdown-item">
                        <i class="mdi mdi-file-pdf text-primary"></i>
                        Pdf
                      </a>
                      <a class="dropdown-item">
                        <i class="mdi mdi-file-excel text-primary"></i>
                        Exel
                      </a>
                  </div>
                </li>
                <li class="nav-item dropdown d-lg-flex d-none">
                  <button type="button" class="btn btn-inverse-primary btn-sm">Settings</button>
                </li>
                <li class="nav-item nav-profile dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                    <span class="nav-profile-name">Admin</span>
                    <span class="online-status"></span>
                    <img src="../images/faces/face28.png" alt="profile"/>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                      <a class="dropdown-item">
                        <i class="mdi mdi-settings text-primary"></i>
                        Settings
                      </a>
                      <a class="dropdown-item">
                        <i class="mdi mdi-logout text-primary"></i>
                        Logout
                      </a>
                  </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </div>
      </nav>
      <nav class="bottom-navbar">
                <div class="container">
                    <ul class="nav page-navigation">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">
                                <i class="mdi mdi-file-document-box menu-icon"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="http://localhost/pp/college_majorproject/general_homepage/index.html" class="nav-link">
                                <i class="mdi mdi-home-variant menu-icon"></i>
                                <span class="menu-title">Home Page</span>
                                <i class="menu-arrow"></i>
                            </a>
                        </li>
                        <!--<li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="mdi mdi-finance menu-icon"></i>
                                <span class="menu-title">Charts</span>
                                <i class="menu-arrow"></i>
                            </a>
                        </li>-->
                        <li class="nav-item active">
                            <a href="#" class="nav-link ">
                                <i class="mdi mdi-cube-outline menu-icon"></i>
                                <span class="menu-title">Entrepreneurs</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="submenu">
                                <ul>
                                <li class="nav-item"><a class="nav-link" href="entrepreneur_profile.php">Entrepreneur Profile</a></li>
                                    <li class="nav-item"><a class="nav-link" href="enterprens_form_sub.php">Mentorship Forms</a></li>
                                    <li class="nav-item"><a class="nav-link" href="enterprens_contact.php">Enterpreners Contacts</a></li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="mdi mdi-finance menu-icon"></i>
                                <span class="menu-title">Mentors</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="submenu">
                                <ul>
                                    <li class="nav-item"><a class="nav-link" href="mentors_profile.php">Mentors Profile</a></li>
                                    <li class="nav-item"><a class="nav-link" href="mentors_contact.php">Mentors Contacts</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="mdi mdi-grid menu-icon"></i>
                                <span class="menu-title">Investors</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="submenu">
                                <ul>
                                    <li class="nav-item"><a class="nav-link" href="investor_profile.php">Investors Profile</a></li>
                                    <li class="nav-item"><a class="nav-link" href="investor_contact.php">Investors Contacts</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="contactus_details.php" class="nav-link">
                                <i class="mdi mdi-phone-log menu-icon"></i>
                                <span class="menu-title">Contact Us</span>
                                <i class="menu-arrow"></i>
                            </a>
                        </li>

                        <!---- <li class="nav-item">
                            <a href="admin_elements/contactus_details.php" class="nav-link">
                                <i class="mdi mdi-codepen menu-icon"></i>
                                <span class="menu-title">Contact Us</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="submenu">
                                <ul class="submenu-item">
                                    <li class="nav-item"><a class="nav-link" href="pages/samples/login.html">Login</a></li>
                                    <li class="nav-item"><a class="nav-link" href="pages/samples/login-2.html">Login 2</a></li>
                                    <li class="nav-item"><a class="nav-link" href="pages/samples/register.html">Register</a></li>
                                    <li class="nav-item"><a class="nav-link" href="pages/samples/register-2.html">Register 2</a></li>
                                    <li class="nav-item"><a class="nav-link" href="pages/samples/lock-screen.html">Lockscreen</a></li>
                                </ul>
                            </div>
                        </li>-->
                        <li class="nav-item">
                            <a href="docs/documentation.html" class="nav-link">
                                <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                                <span class="menu-title">Documentation</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="../pages/samples/lock_logout.php" class="nav-link">
                                <i class="mdi mdi-logout menu-icon"></i>
                                <span class="menu-title">Log Out</span>
                                <i class="menu-arrow"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
    </div>
        <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          
           
            
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">FDD-General[Attempted]</h4>
                  <p class="card-description">
                   <a  href ="#"><code> Name:<?php  echo $full_name;  ?></code></a>
                   <a  href ="#"><code> Phone: <?php  echo $phone;  ?></code></a>
                   <a href ="#"><code> Email:<?php  echo $email;  ?></code></a>
                  </p>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                         
                          <th>
                          Sl. No
                          </th>
                          <th>
                          Question
                          </th>
                          <th>
                         Resent Doc/Comments
                          </th>
                          <th>
                          View All Doc/Comments
                          </th>
                          <th>
                             Share
                          </th>
     
                        </tr>
                      </thead>
                      <tbody>
                      <tr>
                      <td>
                      1.
                      </td>
                      <td>
                      Business Presentation:
                      </td>

                     
                       <?php


                       $sql = "select file1,commentfile1,email from bad where email = '$email' ORDER BY createdat DESC LIMIT 1";
                       $result1 = $db->query($sql);
                       if ($result1->num_rows > 0) {
while($row = $result1->fetch_assoc()) {
    
?>
<td>
<a target="_blank" href="../../general_homepage\innerhtml\enterpreners\enterpreners-inside\enterprenersignin/membersinfo/<?php echo $email; ?>/<?php echo  $row['file1']; ?>?edit=<?php echo  $row['file1']; ?>" class="edit_btn" ><?php echo  $row['file1']; ?></a>     
</br>
</br>
<?php echo $row['commentfile1'] ?>
</td>
<?php
  echo  "<td>
 
  <a href=view_all/view_all1.php?email=".$row['email']." ><button type=\"button\" class=\"btn btn-info btn-icon-text\"><i class=\"mdi mdi-printer btn-icon-append\"></i> View</button></a></td>";
  
  echo  "<td><a href=mentorship_update_2.php?email=".$row['email']." ><button type=\"button\" class=\"btn btn-primary btn-icon-text\"> <i class=\"mdi mdi-file-check btn-icon-append\"></i>Share</button></a></td>";

  echo "</tr>";
  
}

}

                        ?>


<tr>
                      <td>
                      2.a.
                      </td>
                      <td>
                      Detailed description of the Company and its Business Model:
                      </td>

                     
                       <?php


                       $sql = "select * from bad where email = '$email' ORDER BY createdat DESC LIMIT 1";
                       $result1 = $db->query($sql);
                       if ($result1->num_rows > 0) {
while($row = $result1->fetch_assoc()) {
    
?>
<td>
<a target="_blank" href="../../general_homepage\innerhtml\enterpreners\enterpreners-inside\enterprenersignin/membersinfo/<?php echo $email; ?>/<?php echo  $row['file2']; ?>?edit=<?php echo  $row['file2']; ?>" class="edit_btn" ><?php echo  $row['file2']; ?></a>     
</br>
</br>
<?php echo $row['commentfile2'] ?>
</td>
<?php
  echo  "<td>
 
  <a href=view_all/view_all2.php?email=".$row['email']." ><button type=\"button\" class=\"btn btn-info btn-icon-text\"><i class=\"mdi mdi-printer btn-icon-append\"></i> View</button></a></td>";
  
  echo  "<td><a href=mentorship_update_2.php?email=".$row['email']." ><button type=\"button\" class=\"btn btn-primary btn-icon-text\"> <i class=\"mdi mdi-file-check btn-icon-append\"></i>Share</button></a></td>";

  echo "</tr>";
  
}

}

                        ?>

<tr>
                      <td>
                      2.b.
                      </td>
                      <td>
                       Revenue Streams:
                      </td>

                     
                       <?php


                       $sql = "select * from bad where email = '$email' ORDER BY createdat DESC LIMIT 1";
                       $result1 = $db->query($sql);
                       if ($result1->num_rows > 0) {
while($row = $result1->fetch_assoc()) {
    
?>
<td>
<a target="_blank" href="../../general_homepage\innerhtml\enterpreners\enterpreners-inside\enterprenersignin/membersinfo/<?php echo $email; ?>/<?php echo  $row['file3']; ?>?edit=<?php echo  $row['file3']; ?>" class="edit_btn" ><?php echo  $row['file3']; ?></a>     
</br>
</br>
<?php echo $row['commentfile3'] ?>
</td>
<?php
  echo  "<td>
 
  <a href=view_all/view_all3.php?email=".$row['email']." ><button type=\"button\" class=\"btn btn-info btn-icon-text\"><i class=\"mdi mdi-printer btn-icon-append\"></i> View</button></a></td>";
  
  echo  "<td><a href=#?email=".$row['email']." ><button type=\"button\" class=\"btn btn-primary btn-icon-text\"> <i class=\"mdi mdi-file-check btn-icon-append\"></i>Share</button></a></td>";

  echo "</tr>";
  
}

}

                        ?>

<tr>
<td>
                      2.c.
                      </td>
                      <td>
                      Areas of Focus – Target Customer types
                      </td>

                     
                       <?php


                       $sql = "select * from bad where email = '$email' ORDER BY createdat DESC LIMIT 1";
                       $result1 = $db->query($sql);
                       if ($result1->num_rows > 0) {
while($row = $result1->fetch_assoc()) {
    
?>
<td>
<a target="_blank" href="../../general_homepage\innerhtml\enterpreners\enterpreners-inside\enterprenersignin/membersinfo/<?php echo $email; ?>/<?php echo  $row['file4']; ?>?edit=<?php echo  $row['file4']; ?>" class="edit_btn" ><?php echo  $row['file4']; ?></a>     
</br>
</br>
<?php echo $row['commentfile4'] ?>
</td>
<?php
  echo  "<td>
 
  <a href=view_all/view_all4.php?email=".$row['email']." ><button type=\"button\" class=\"btn btn-info btn-icon-text\"><i class=\"mdi mdi-printer btn-icon-append\"></i> View</button></a></td>";
  
  echo  "<td><a href=#?email=".$row['email']." ><button type=\"button\" class=\"btn btn-primary btn-icon-text\"> <i class=\"mdi mdi-file-check btn-icon-append\"></i>Share</button></a></td>";

  echo "</tr>";
  
}

}

                        ?>

                        
<tr>
<td>
                      2.d.
                      </td>
                      <td>
                      Detailed description of the product offerings provided
                      </td>

                     
                       <?php


                       $sql = "select * from bad where email = '$email' ORDER BY createdat DESC LIMIT 1";
                       $result1 = $db->query($sql);
                       if ($result1->num_rows > 0) {
while($row = $result1->fetch_assoc()) {
    
?>
<td>
<a target="_blank" href="../../general_homepage\innerhtml\enterpreners\enterpreners-inside\enterprenersignin/membersinfo/<?php echo $email; ?>/<?php echo  $row['file5']; ?>?edit=<?php echo  $row['file5']; ?>" class="edit_btn" ><?php echo  $row['file5']; ?></a>     
</br>
</br>
<?php echo $row['commentfile5'] ?>
</td>
<?php
  echo  "<td>
 
  <a href=view_all/view_all5.php?email=".$row['email']." ><button type=\"button\" class=\"btn btn-info btn-icon-text\"><i class=\"mdi mdi-printer btn-icon-append\"></i> View</button></a></td>";
  
  echo  "<td><a href=#?email=".$row['email']." ><button type=\"button\" class=\"btn btn-primary btn-icon-text\"> <i class=\"mdi mdi-file-check btn-icon-append\"></i>Share</button></a></td>";

  echo "</tr>";
  
}

}

                        ?>

<tr>
<td>
                      2.e.
                      </td>
                      <td>
                      List of all existing and under development products and services
                      </td>

                     
                       <?php


                       $sql = "select * from bad where email = '$email' ORDER BY createdat DESC LIMIT 1";
                       $result1 = $db->query($sql);
                       if ($result1->num_rows > 0) {
while($row = $result1->fetch_assoc()) {
    
?>
<td>
<a target="_blank" href="../../general_homepage\innerhtml\enterpreners\enterpreners-inside\enterprenersignin/membersinfo/<?php echo $email; ?>/<?php echo  $row['file6']; ?>?edit=<?php echo  $row['file6']; ?>" class="edit_btn" ><?php echo  $row['file6']; ?></a>     
</br>
</br>
<?php echo $row['commentfile6'] ?>
</td>
<?php
  echo  "<td>
 
  <a href=view_all/view_all6.php?email=".$row['email']." ><button type=\"button\" class=\"btn btn-info btn-icon-text\"><i class=\"mdi mdi-printer btn-icon-append\"></i> View</button></a></td>";
  
  echo  "<td><a href=#?email=".$row['email']." ><button type=\"button\" class=\"btn btn-primary btn-icon-text\"> <i class=\"mdi mdi-file-check btn-icon-append\"></i>Share</button></a></td>";

  echo "</tr>";
  
}

}

                        ?>

                        
<tr>
<td>
                      2.f.
                      </td>
                      <td>
                      List of large customers 
                      </td>

                     
                       <?php


                       $sql = "select * from bad where email = '$email' ORDER BY createdat DESC LIMIT 1";
                       $result1 = $db->query($sql);
                       if ($result1->num_rows > 0) {
while($row = $result1->fetch_assoc()) {
    
?>
<td>
<a target="_blank" href="../../general_homepage\innerhtml\enterpreners\enterpreners-inside\enterprenersignin/membersinfo/<?php echo $email; ?>/<?php echo  $row['file7']; ?>?edit=<?php echo  $row['file7']; ?>" class="edit_btn" ><?php echo  $row['file7']; ?></a>     
</br>
</br>
<?php echo $row['commentfile7'] ?>
</td>
<?php
  echo  "<td>
 
  <a href=view_all/view_all7.php?email=".$row['email']." ><button type=\"button\" class=\"btn btn-info btn-icon-text\"><i class=\"mdi mdi-printer btn-icon-append\"></i> View</button></a></td>";
  
  echo  "<td><a href=#?email=".$row['email']." ><button type=\"button\" class=\"btn btn-primary btn-icon-text\"> <i class=\"mdi mdi-file-check btn-icon-append\"></i>Share</button></a></td>";

  echo "</tr>";
  
}

}

                        ?>

<tr>
<td>
                      2.g.
                      </td>
                      <td>
                       List of Key Vendors and Partners and a brief on transactions
                      </td>

                     
                       <?php


                       $sql = "select * from bad where email = '$email' ORDER BY createdat DESC LIMIT 1";
                       $result1 = $db->query($sql);
                       if ($result1->num_rows > 0) {
while($row = $result1->fetch_assoc()) {
    
?>
<td>
<a target="_blank" href="../../general_homepage\innerhtml\enterpreners\enterpreners-inside\enterprenersignin/membersinfo/<?php echo $email; ?>/<?php echo  $row['file8']; ?>?edit=<?php echo  $row['file8']; ?>" class="edit_btn" ><?php echo  $row['file8']; ?></a>     
</br>
</br>
<?php echo $row['commentfile8'] ?>
</td>
<?php
  echo  "<td>
 
  <a href=view_all/view_all8.php?email=".$row['email']." ><button type=\"button\" class=\"btn btn-info btn-icon-text\"><i class=\"mdi mdi-printer btn-icon-append\"></i> View</button></a></td>";
  
  echo  "<td><a href=#?email=".$row['email']." ><button type=\"button\" class=\"btn btn-primary btn-icon-text\"> <i class=\"mdi mdi-file-check btn-icon-append\"></i>Share</button></a></td>";

  echo "</tr>";
  
}

}

                        ?>

<tr>
<td>
                      2.h.
                      </td>
                      <td>
                      List of Competitors in India and globally
                      </td>

                     
                       <?php


                       $sql = "select * from bad where email = '$email' ORDER BY createdat DESC LIMIT 1";
                       $result1 = $db->query($sql);
                       if ($result1->num_rows > 0) {
while($row = $result1->fetch_assoc()) {
    
?>
<td>
<a target="_blank" href="../../general_homepage\innerhtml\enterpreners\enterpreners-inside\enterprenersignin/membersinfo/<?php echo $email; ?>/<?php echo  $row['file9']; ?>?edit=<?php echo  $row['file9']; ?>" class="edit_btn" ><?php echo  $row['file9']; ?></a>     
</br>
</br>
<?php echo $row['commentfile9'] ?>
</td>
<?php
  echo  "<td>
 
  <a href=view_all/view_all9.php?email=".$row['email']." ><button type=\"button\" class=\"btn btn-info btn-icon-text\"><i class=\"mdi mdi-printer btn-icon-append\"></i> View</button></a></td>";
  
  echo  "<td><a href=#?email=".$row['email']." ><button type=\"button\" class=\"btn btn-primary btn-icon-text\"> <i class=\"mdi mdi-file-check btn-icon-append\"></i>Share</button></a></td>";

  echo "</tr>";
  
}

}

                        ?>


<tr>
<td>
                      2.i.
                      </td>
                      <td>
                      Description or copy of company's purchasing policy, credit policy
                      </td>

                     
                       <?php


                       $sql = "select * from bad where email = '$email' ORDER BY createdat DESC LIMIT 1";
                       $result1 = $db->query($sql);
                       if ($result1->num_rows > 0) {
while($row = $result1->fetch_assoc()) {
    
?>
<td>
<a target="_blank" href="../../general_homepage\innerhtml\enterpreners\enterpreners-inside\enterprenersignin/membersinfo/<?php echo $email; ?>/<?php echo  $row['file10']; ?>?edit=<?php echo  $row['file10']; ?>" class="edit_btn" ><?php echo  $row['file10']; ?></a>     
</br>
</br>
<?php echo $row['commentfile10'] ?>
</td>
<?php
  echo  "<td>
 
  <a href=view_all/view_all10.php?email=".$row['email']." ><button type=\"button\" class=\"btn btn-info btn-icon-text\"><i class=\"mdi mdi-printer btn-icon-append\"></i> View</button></a></td>";
  
  echo  "<td><a href=#?email=".$row['email']." ><button type=\"button\" class=\"btn btn-primary btn-icon-text\"> <i class=\"mdi mdi-file-check btn-icon-append\"></i>Share</button></a></td>";

  echo "</tr>";
  
}

}

                        ?>

<tr>
<td>
                      2.j.
                      </td>
                      <td>
                      All surveys and market research reports, done by the company 
                      </td>

                     
                       <?php


                       $sql = "select * from bad where email = '$email' ORDER BY createdat DESC LIMIT 1";
                       $result1 = $db->query($sql);
                       if ($result1->num_rows > 0) {
while($row = $result1->fetch_assoc()) {
    
?>
<td>
<a target="_blank" href="../../general_homepage\innerhtml\enterpreners\enterpreners-inside\enterprenersignin/membersinfo/<?php echo $email; ?>/<?php echo  $row['file11']; ?>?edit=<?php echo  $row['file11']; ?>" class="edit_btn" ><?php echo  $row['file11']; ?></a>     
</br>
</br>
<?php echo $row['commentfile11'] ?>
</td>
<?php
  echo  "<td>
 
  <a href=view_all/view_all11.php?email=".$row['email']." ><button type=\"button\" class=\"btn btn-info btn-icon-text\"><i class=\"mdi mdi-printer btn-icon-append\"></i> View</button></a></td>";
  
  echo  "<td><a href=#?email=".$row['email']." ><button type=\"button\" class=\"btn btn-primary btn-icon-text\"> <i class=\"mdi mdi-file-check btn-icon-append\"></i>Share</button></a></td>";

  echo "</tr>";
  
}

}

                        ?>


<tr>
<td>
                      2.k.
                      </td>
                      <td>
                      Problems faced by the management of the Company 
                      </td>

                     
                       <?php


                       $sql = "select * from bad where email = '$email' ORDER BY createdat DESC LIMIT 1";
                       $result1 = $db->query($sql);
                       if ($result1->num_rows > 0) {
while($row = $result1->fetch_assoc()) {
    
?>
<td>
<a target="_blank" href="../../general_homepage\innerhtml\enterpreners\enterpreners-inside\enterprenersignin/membersinfo/<?php echo $email; ?>/<?php echo  $row['file12']; ?>?edit=<?php echo  $row['file12']; ?>" class="edit_btn" ><?php echo  $row['file12']; ?></a>     
</br>
</br>
<?php echo $row['commentfile12'] ?>
</td>
<?php
  echo  "<td>
 
  <a href=view_all/view_all12.php?email=".$row['email']." ><button type=\"button\" class=\"btn btn-info btn-icon-text\"><i class=\"mdi mdi-printer btn-icon-append\"></i> View</button></a></td>";
  
  echo  "<td><a href=#?email=".$row['email']." ><button type=\"button\" class=\"btn btn-primary btn-icon-text\"> <i class=\"mdi mdi-file-check btn-icon-append\"></i>Share</button></a></td>";

  echo "</tr>";
  
}

}

                        ?>
                  
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
           
         
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../partials/_footer.html -->
        <footer class="footer">
          <div class="footer-wrap">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span>
            </div>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
