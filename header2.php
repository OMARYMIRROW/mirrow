<?php  session_start(); ob_start();
       $conect=mysqli_connect("localhost","root","","hostel_booking") or die("Failed to connect");
?>
<?php 
  if(isset($_GET['option'])&&$_GET['option']=="logout"){
      unset($_SESSION['username']);
      unset($_SESSION['userid']);
      unset($_SESSION['firstname']);
      unset($_SESSION['lastname']);
      header('location:/hbooking.com/admin.php');
  }
?>
<?php
if(!isset($_SESSION['username'])||!isset($_SESSION['userid'])){
   header('location:/hbooking.com/index.php');
}
?>
<!doctype html>
<html>
<head>
<title>Online Hostel Booking</title>
<link rel="stylesheet" type="text/css" href="font/css/all.css">
<style type="text/css">
   body{background:#097880;}
   #ki{text-align:center;}
   #km table{text-align:center; margin:auto; border: 1px solid #067;}
   #km table td,th{text-align:center; margin:auto; border: 1px solid #067; padding:1%;}
   #main{background:#fff; max-width:900px;width:100%; margin:auto; min-height:200px; margin-top:50px;margin: bottom 50px; color:#000;border-radius:10px; padding:1%;}
form input{max-width:50%; margin:auto; text-align:center;}
form h1{text-transform:uppercase;}
form{text-align:center;}
@import url(//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css);
}
@import url(https://fonts.googleapis.com/css?family=Titillium+Web:300);
.fa-2x {
font-size: 2em;
}
.fa {
position: relative;
display: table-cell;
width: 60px;
height: 36px;
text-align: center;
vertical-align: middle;
font-size:20px;
}
.main-menu:hover,nav.main-menu.expanded {
width:250px;
overflow:visible;
}

.main-menu {
background:#212121;
border-right:1px solid #e5e5e5;
position:absolute;
top:0;
bottom:0;
height:100%;
left:0;
width:60px;
overflow:hidden;
-webkit-transition:width .05s linear;
transition:width .05s linear;
-webkit-transform:translateZ(0) scale(1,1);
z-index:1000;
}
.main-menu>ul {
margin:7px 0;
}
.main-menu li {
position:relative;
display:block;
width:250px;
}

.main-menu li>a {
position:relative;
display:table;
border-collapse:collapse;
border-spacing:0;
color:#999;
 font-family: arial;
font-size: 14px;
text-decoration:none;
-webkit-transform:translateZ(0) scale(1,1);
-webkit-transition:all .1s linear;
transition:all .1s linear;
  
}

.main-menu .nav-icon {
position:relative;
display:table-cell;
width:60px;
height:36px;
text-align:center;
vertical-align:middle;
font-size:18px;
}

.main-menu .nav-text {
position:relative;
display:table-cell;
vertical-align:middle;
width:190px;
  font-family: 'Titillium Web', sans-serif;
}

.main-menu>ul.logout {
position:absolute;
left:0;
bottom:0;
}

.no-touch .scrollable.hover {
overflow-y:hidden;
}

.no-touch .scrollable.hover:hover {
overflow-y:auto;
overflow:visible;
}

a:hover,a:focus {
text-decoration:none;
}

nav {
-webkit-user-select:none;
-moz-user-select:none;
-ms-user-select:none;
-o-user-select:none;
user-select:none;
}

nav ul,nav li {
outline:0;
margin:0;
padding:0;
}
.main-menu li:hover>a,nav.main-menu li.active>a,.dropdown-menu>li>a:hover,.dropdown-menu>li>a:focus,.dropdown-menu>.active>a,.dropdown-menu>.active>a:hover,.dropdown-menu>.active>a:focus,.no-touch .dashboard-page nav.dashboard-menu ul li:hover a,.dashboard-page nav.dashboard-menu ul li.active a {
color:#fff;
background-color:#5fa2db;
}
.area {
float: left;
background: #e2e2e2;
width: 100%;
height: 100%;
}
@font-face {
  font-family: 'Titillium Web';
  font-style: normal;
  font-weight: 300;
  src: local('Titillium WebLight'), local('TitilliumWeb-Light'), url(http://themes.googleusercontent.com/static/fonts/titilliumweb/v2/anMUvcNT0H1YN4FII8wpr24bNCNEoFTpS2BTjF6FB5E.woff) format('woff');
}

</style>
</head>
