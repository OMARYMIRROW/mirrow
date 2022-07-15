<?php include('header.php');?>
<body>
    <div id="main">
    <?php include('menu.php');?>

    <?php 
        if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['role'])){
           $username=$_POST['username'];
           $password=$_POST['password'];
           $role=$_POST['role'];

           if($role=="student"){
/// echo $username."<br>".$password;
          $check=mysqli_query($conect,"select * from student where student_username='".$username."' and student_password='".$password."'") or die("IMEGOMA");
          if(mysqli_num_rows($check)>0){
             while($result=mysqli_fetch_array($check)){
                  $_SESSION['username']=$result['student_username'];
                  $_SESSION['userid']=$result['student_id'];
                  $_SESSION['firstname']=$result['student_fname'];
                  $_SESSION['lastname']=$result['student_lname'];
                  $_SESSION['studentgender']=$result['student_gender'];
                  $_SESSION['role']="student";
                  header('location:/hbooking.com/admin.php');
             }
          }
           }elseif($role=="admin"){

          /// echo $username."<br>".$password;
          $check=mysqli_query($conect,"select * from admin where admin_username='".$username."' and admin_password='".$password."'") or die("IMEGOMA");
          if(mysqli_num_rows($check)>0){
             while($result=mysqli_fetch_array($check)){
                  $_SESSION['username']=$result['admin_username'];
                  $_SESSION['userid']=$result['admin_id'];
                  $_SESSION['firstname']=$result['admin_fname'];
                  $_SESSION['lastname']=$result['admin_lname'];
                  $_SESSION['role']="admin";
                  header('location:/hbooking.com/admin.php');
             }
          }
        }
         }
    ?>
       <form action="index.php" method="post">
       <h1><strong><i class="fas fa-user-shield"></i>Account Login</strong></h1>
         <p><span><i class="fa fa-envelope"></i>USERNAME: <input type="text" name="username" required="required"></span></p>
         <p><span><i class="fa fa-key"></i>PASSWORD: <input type="password" name="password" required="required"></span></p>
         <p><select name="role" required="required">
           <option value="">As</option>
           <option value="admin">Admin</option>
           <option value="student">Student</option>
         </select><input type="submit" value="LOGIN"></p>
         <p><a href="newaccount.php">Create Account</a></p>       
       </form>
    </div>
</body>
</html>
