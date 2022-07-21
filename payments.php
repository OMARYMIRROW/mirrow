<?php include('header2.php');?>
<body>
    <div id="main">
    <?php include('menu.php');?>
   
       <div id="ki"><h2>Payments</h2></div>
       <?php if(isset($_GET['delete'])){
        $bookid=$_GET['delete'];
        $j=mysqli_query($conect,"delete from booking where student_id='".$_SESSION['userid']."' and booking_id='".$bookid."'")or die("Not done");
         if($j){
          header('location:payments.php');
         }

       }?>
     <?php 
        if(isset($_POST['controlnumber'])&&isset($_POST['roomid'])&&isset($_POST['hostelid'])&&isset($_POST['cost'])&&isset($_POST['reference'])){
          $controlnumber=$_POST['controlnumber'];
          $hostelid=$_POST['hostelid'];
          $roomid=$_POST['roomid'];
          $cost=$_POST['cost'];
          $reference=$_POST['reference'];
          $date=date("Y-m-d");
          $haya=mysqli_query($conect,"select * from payment where control_number='".$controlnumber."' and hostel_id='".$hostelid."' and room_id='".$roomid."' and cost='".$cost."' and student_id='".$_SESSION['userid']."'")or die("Sitaki");
          $gh=mysqli_num_rows($haya);
          if($gh>0){
?>
<script type="text/javascript">
alert("Sorry! You Payment information is already available!");
</script>
<?php
          }
          elseif($gh<1){
            $weka=mysqli_query($conect,"insert into payment(control_number,payment_reference,room_id,hostel_id,student_id,cost,payment_date) values('".$controlnumber."','".$reference."','".$roomid."','".$hostelid."','".$_SESSION['userid']."','".$cost."','".$date."')")or die("Weee");
?>
<script type="text/javascript">
alert("Payment information Saved!");
</script>
<?php
          }
        }
     ?>
<?php 
    $checko=mysqli_query($conect,"select * from booking where student_id='".$_SESSION['userid']."'") or die("IMEGOMA");
    $ht=mysqli_num_rows($checko);
          if($ht<0){
            echo"<h1>Yo don`t have any Pending Debts!</h1>";
        ?>
<script type="text/javascript">
alert("Sorry! You don`t have any pending Debts!");
</script>
<?php
}elseif($ht>0){
        while($feto=mysqli_fetch_array($checko)){
                extract($feto);
                $checkoy=mysqli_query($conect,"select * from rooms where room_id='".$room_id."' and hostel_id='".$hostel_id."'") or die("IMEGOMA");
       if(mysqli_num_rows($checkoy)>0){
        while($fetoy=mysqli_fetch_array($checkoy)){
                extract($fetoy);
                $checkoyx=mysqli_query($conect,"select * from hostel where hostel_id='".$hostel_id."'") or die("IMEGOMA");
       if(mysqli_num_rows($checkoyx)>0){
        while($fetoyx=mysqli_fetch_array($checkoyx)){
                extract($fetoyx);

              }}
                ?>
       <form action="payments.php" method="post">
       <p><strong><i class="fas fa-dollar-sign"></i>Payments for Room Number(<?=$room_number;?>) - <?=$hostel_name;?></p>
        <?php      
                   echo"<p>Number of beds (".$number_beds."): Cost: ".$cost."</p>";
                   echo"<p>Control Number: ".$control_number."</p>";
                   echo"<p><a href='payments.php?delete=".$booking_id."'>Delete Booking!</a></p>";
                   ?>
                   <input type="hidden" name="controlnumber" value="<?=$control_number;?> "required="required">
                   <input type="hidden" name="cost" value="<?=$cost;?> "required="required">
                   <input type="hidden" name="hostelid" value="<?=$hostel_id;?> "required="required">
                   <input type="hidden" name="roomid" value="<?=$room_id;?> "required="required">
                   <p>Payment Reference:<input type="text" name="reference" value="" required="required"></p>
                   <?php
              }
             }
        ?><input type="hidden" name="stid" value="<?=$_SESSION['userid'];?> "required="required">
         <p><input type="submit" value="Save Payment Details!"></p>       
       </form>
     <?php }}?>
     <?php
       if(isset($_GET['look'])){
        $roomid=$_GET['look'];
        ?>
               <h1>Room: Bookings</h1>
        <?php
       }
     ?>
    </div>
</body>
</html>