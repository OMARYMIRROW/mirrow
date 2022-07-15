<?php
if(isset($_GET['check'])&&isset($_GET['hostel'])){
     if(!empty($_POST['hostelid'])&&!empty($_POST['roomnumber'])&&!empty($_POST['numberbeds'])){
       $roomnumber=$_POST['roomnumber'];
       $numberbeds=$_POST['numberbeds'];
       $hostelid=$_POST['hostelid'];
       $checkd=mysqli_query($conect,"select * from rooms where room_number='".$roomnumber."' and hostel_id='".$hostelid."'") or die("IMEGOMA");
          if(mysqli_num_rows($checkd)>0){
            ?>
            <script type="text/javascript">
              alert("Sorry; The Room Exists.");
            </script>
            <?php
          }else{
            $jok=mysqli_query($conect,"insert into rooms(room_number,hostel_id,number_beds) values('".$roomnumber."','".$hostelid."','".$numberbeds."')")or die("Saving Failed!".mysqli_error($conect));
            header('location:'.$_SERVER['PHP_SELF'].'?check='.$_SESSION['check'].'&hostel='.$_SESSION['hostel']);
          }
     }
    ?>
<?php
 if(isset($_GET['check'])&&isset($_GET['hostel'])){
 $_SESSION['hostel']=$_GET['hostel'];
       $_SESSION['check']=$_GET['check'];
 }
?>        <div id="ki"><h2>Rooms: (<?php if(isset($_SESSION['hostel'])){echo $_SESSION['hostel'];}?>)</h2></div>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>?check=<?=$_SESSION['check'];?>&hostel=<?=$_SESSION['hostel'];?>" method="post">
          <p>Room Number:<input type="number" name="roomnumber" min="1" required="required"></p>
          <p>Number of Beds:<input type="number" name="numberbeds" min="1" required="required"></p>
          <input type="hidden" name="hostelid" value="<?php if(isset($_SESSION['check'])){echo $_SESSION['check'];}?>"/>
           <input type="hidden" name="hostel" value="<?php if(isset($_SESSION['hostel'])){echo $_SESSION['hostel'];}?>"/>
          <p><input type="submit" value="Save"></p>
        </form>
        <div id="km">
          <?php
           $fer=mysqli_query($conect,"select * from rooms where hostel_id='".$_SESSION['check']."'")or die("Samahani sitaki-Uniache kabisa!".mysqli_error($conect));
           $hl=mysqli_num_rows($fer);
           if($hl>0){
            echo"<table><tr><th>S/N</th><th>Room Number</th><th>Number of Beds</th><th>Status</th><th>Options</th></tr>";
             while($dr=mysqli_fetch_array($fer)){
              extract($dr);
                    $ferx=mysqli_query($conect,"select * from booking where hostel_id='".$hostel_id."' and room_id='".$room_id."' and status='taken'")or die("Samahani sitaki-Uniache kabisa!".mysqli_error($conect));
           $hlx=mysqli_num_rows($ferx);
                   echo"<tr><td>".$room_id."</td><td>".$room_number."</td><td>".$number_beds."</td><td>".$hlx." bed(s) taken</td><td><a href='payments.php?look=".$room_id."'>View!</a></td></tr>";
             }
             echo"</table>";
           }

          ?>
        </div>
        <?php }else{header('location:hostels.php');}?>
