<?php include('header2.php');?>
<body>
    <div id="main">
    <?php include('menu.php');?>
    <?php if($_SESSION['role']=="student"){
      include("student_hostel.php");
    }elseif($_SESSION['role']=="admin"){
      include("admin_hostel.php");
    }?>
    </div>
</body>
</html>
