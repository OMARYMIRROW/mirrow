<?php include('header2.php');?>
<body>
    <div id="main">
    <?php include('menu.php');?>
    <?php if(isset($_GET['check'])&&isset($_GET['roomn'])){?>
        <div id="ki"><h2>Bookings <?=$_SESSION['hostel'];?></h2></div>
            <?php 
        if(isset($_POST['controlnumber'])&&isset($_POST['cost'])&&isset($_POST['roomid'])&&isset($_POST['hostelid'])&&isset($_POST['stid'])&&$_POST['numberbeds']){
          $numberbeds=$_POST['numberbeds'];
           $controlnumber=$_POST['controlnumber'];
           $cost=$_POST['cost'];
            $roomid=$_POST['roomid'];
           $hostelid=$_POST['hostelid'];
            $stid=$_POST['stid'];
                    $checkx=mysqli_query($conect,"select * from booking where student_id='".$stid."'") or die("IMEGOMA");
          if(mysqli_num_rows($checkx)>0){
        ?>
<script type="text/javascript">
alert("Sorry! Only One Booking is allowed, You are already having an unpaid booking, Make Payments!");
</script>
<?php
}elseif(mysqli_num_rows($checkx)<1){
          $check=mysqli_query($conect,"select * from booking where hostel_id='".$hostelid."' and room_id='".$roomid."'") or die("IMEGOMA");
          if(mysqli_num_rows($check)>=$numberbeds){
        ?>
<script type="text/javascript">
alert("Sorry! The room, Already taken!!");
</script>
<?php
}elseif(mysqli_num_rows($check)<$numberbeds){
             $doit=mysqli_query($conect,"insert into booking(student_id,hostel_id, room_id,cost,control_number,status) values('".$stid."','".$hostelid."','".$roomid."','".$cost."','".$controlnumber."','taken')")or die("Booking failed".mysqli_error($conect));
?>
<script type="text/javascript">
alert("Boooking Succeeded!! Make Payment Now! Control Number: <?=$controlnumber;?>");
</script>
<?php
          }
         }
       }
    ?>
       <form action="bookings.php?check=<?=$_GET['check'];?>&roomn=<?=$_GET['roomn'];?>" method="post">
       <p><strong><i class="fas fa-user-plus"></i>You are booking for a bed in room Number(<?=$_GET['roomn'];?>)</p>
        <?php 
             $jh=mysqli_query($conect,"select * from rooms where room_id='".$_GET['check']."'")or die("Haitaki");
             $jk=mysqli_num_rows($jh);
             if($jk>0){
              while($fet=mysqli_fetch_array($jh)){
                extract($fet);
                   switch ($number_beds) {
                     case 6:
                       $cost=300000;
                       break;
                          case 4:
                       $cost=350000;
                       break;
                        case 3:
                       $cost=400000;
                       break;
                          case 2:
                       $cost=450000;
                       break;
                     default:
                       $cost="";
                       break;
                   }
$string=date('Y-m-d');
//php string replace
$dates = str_replace("-", "", $string);

                   $control="RCU999".$dates.$_SESSION['check'].$_GET['roomn'].$_SESSION['userid'];
                   echo"<p>Number of beds (".$number_beds."): Cost: ".$cost."</p>";
                   echo"<p>Control Number: ".$control."</p>";
                   echo"<p>Payments should be completed within 24 hours after creation.</p>";
                   ?>
                   <input type="hidden" name="numberbeds" value="<?=$number_beds;?> "required="required">
                   <input type="hidden" name="controlnumber" value="<?=$control;?> "required="required">
                   <input type="hidden" name="cost" value="<?=$cost;?> "required="required">
                   <input type="hidden" name="hostelid" value="<?=$_SESSION['check'];?> "required="required">
                   <input type="hidden" name="roomid" value="<?=$room_id;?> "required="required">
                   <?php
              }
             }
             //echo"<p>Number of beds (".$fet['nb']."): Cost: ".$cost."</p>";
        ?><input type="hidden" name="stid" value="<?=$_SESSION['userid'];?> "required="required">
         <p><input type="submit" value="BOOK NOW!"></p>       
       </form>
     <?php }else{header('location:hostels.php');}?>
    </div>
</body>
</html>