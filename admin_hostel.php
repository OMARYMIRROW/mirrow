<?php
     if(!empty($_POST['hostelname'])&&!empty($_POST['hostellocation'])&&!empty($_POST['hostelgender'])){
       $hostelname=$_POST['hostelname'];
       $hostellocation=$_POST['hostellocation'];
       $hostelgender=$_POST['hostelgender'];
       $checkd=mysqli_query($conect,"select * from hostel where hostel_name='".$hostelname."' and hostel_gender='".$hostelgender."' and hostel_location='".$hostellocation."'") or die("IMEGOMA");
          if(mysqli_num_rows($checkd)>0){
            ?>
            <script type="text/javascript">
              alert("Sorry; The Hostel Exists.");
            </script>
            <?php            
          }else{
            $jok=mysqli_query($conect,"insert into hostel(hostel_name,hostel_location,hostel_gender) values('".$hostelname."','".$hostellocation."','".$hostelgender."')")or die("Saving Failed!".mysqli_error($conect));
            header('location:'.$_SERVER['PHP_SELF']);
          }
     }
    ?>
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
        <div id="ki"><h2>Hostels</h2></div>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
          <p>Hostel Name:<input type="text" name="hostelname" required="required"></p>
          <p>Hostel Location:<select name="hostellocation" required="required">
          <option value=""></option>
            <option>Main Campus</option>
            <option>Off Campus</option></select></p>
          <p>Gender:<select name="hostelgender" required="required">
            <option value="">Select Gender</option>
            <option>Male</option>
            <option>Female</option>
          </select></p>
          <p><input type="submit" value="Save"></p>
        </form>
        <div id="km">
          <?php
           $fer=mysqli_query($conect,"select * from hostel")or die("Samahani sitaki-Uniache kabisa!".mysqli_error($conect));
           $hl=mysqli_num_rows($fer);
           if($hl>0){
            echo"<table><tr><th>S/N</th><th>Hostel Name</th><th>Hostel Gender</th><th>Hostel Location</th><th>Options</th></tr>";
             while($dr=mysqli_fetch_array($fer)){
              extract($dr);
                   echo"<tr><td>".$hostel_id."</td><td>".$hostel_name."</td><td>".$hostel_gender."</td><td>".$hostel_location."</td><td><a href='rooms.php?check=".$hostel_id."&hostel=".$hostel_name."'>Rooms</a></td></tr>";
             }
             echo"</table>";
           }

          ?>
        </div>
