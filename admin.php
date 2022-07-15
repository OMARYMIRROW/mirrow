<?php include('header2.php');?>
<body>
    <div id="main">
    <?php include('menu.php');?>
    <?php 
        if(isset($_POST['username'])&&isset($_POST['password'])){
           $username=$_POST['username'];
           $password=$_POST['password'];

          /// echo $username."<br>".$password;
          $check=mysqli_query($conect,"select * from admin where admin_username='".$username."' and admin_password='".$password."'") or die("IMEGOMA");
          if(mysqli_num_rows($check)>0){
             while($result=mysqli_fetch_array($check)){
                  $_SESSION['username']=$result['admin_username'];
                  $_SESSION['userid']=$result['admin_id'];
                  $_SESSION['firstname']=$result['admin_fname'];
                  $_SESSION['lastname']=$result['admin_lname'];
                  header('location:/hbooking.com/admin.php');
             }
          }
         }
    ?>
      <div id="ki"><h2>Welcome: <?=$_SESSION['firstname'];?></h2></div> 

    </div>
</body>
</html>