<?php include('header.php');?>
<body>
    <div id="main">
    <?php include('menu.php');?>
    <?php 
        if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['fname'])&&isset($_POST['lname'])&&isset($_POST['gender'])&&isset($_POST['password1'])){
           $username=$_POST['username'];
           $password=$_POST['password'];
            $password1=$_POST['password1'];
           $fname=$_POST['fname'];
            $lname=$_POST['lname'];
            $gender=$_POST['gender'];

          /// echo $username."<br>".$password;
if($password!=$password1){?>
<script type="text/javascript">
alert("Sorry! Password not matching!");
</script>
<?php }elseif($password==$password1){
          $check=mysqli_query($conect,"select * from student where student_username='".$username."' and student_password='".$password."'") or die("IMEGOMA");
          if(mysqli_num_rows($check)>0){
        ?>
<script type="text/javascript">
alert("Sorry! The Account You Tried to Create, Already exists!, Click the login button to login instead!");
</script>
<?php
}elseif(mysqli_num_rows($check)<1){
             $doit=mysqli_query($conect,"insert into student(student_username, student_password,student_fname,student_lname,student_gender) values('".$username."','".$password."','".$fname."','".$lname."','".$gender."')")or die("Account creation failed");
?>
<script type="text/javascript">
alert("Account Created!Login Now!</a>");
</script>
<?php
          }
         }}
    ?>
       <form action="newaccount.php" method="post">
       <h1><strong><i class="fas fa-user-plus"></i>Student Account</h1>
        <p>First Name: <input type="text" name="fname" autocomplete="off" pattern="[A-Za-z]{3,25}" required="required"></p>
         <p>Surname: <input type="text" name="lname" autocomplete="off" pattern="[A-Za-z]{3,25}" required="required"></p>
         <p>Gender: <select name="gender" required="required">
                   <option valu="">select Gender</option>
<option value="male">Male</option>
<option value="female">Female</option>
                   </select>
<p>Reg Number: <input type="text" placeholder="eg;RU/DCS/2020/011" maxlength="16" name="username" required="required"></p>
         <p>Password: <input type="password" name="password" placeholder="should contain atleast 8 numbers" autocomplete="off" pattern=[0-9]{8,12} required="required"></p>
         <p>Confirm Password: <input type="password" placeholder="should contain atleast 8 numbers" autocomplete="off" pattern=[0-9]{8,12} name="password1" required="required"></p>
         <p><input type="submit" value="SignUp"></p>       
       </form>
    </div>
</body>
</html>
