<div class="area"></div><nav class="main-menu">
            <ul>
                <li>
                    <a href="index.php">
                        <i class="fa fa-home fa-2x"></i>
                        <span class="nav-text">
                            Home
                        </span>
                    </a>
                  
                </li>
                 <?php if(isset($_SESSION['username'])&&isset($_SESSION['userid'])){?>
                <li class="has-subnav">
                    <a href="hostels.php">
                        <i class="fa fa-hotel fa-2x"></i>
                        <span class="nav-text">
                            Hostels
                        </span>
                    </a>
                    
                </li>
                <?php if($_SESSION['role']=="adminx"){?>
                <li class="has-subnav">
                    <a href="rooms.php">
                       <i class="fa fa-bed fa-2x"></i>
                        <span class="nav-text">
                            Rooms
                        </span>
                    </a>
                    
                </li>
                <li class="has-subnav">
                    <a href="bookings.php">
                       <i class="fa fa-ticket-alt fa-2x"></i>
                        <span class="nav-text">
                            Bookings
                        </span>
                    </a>
                   
                </li>
            <?php }?>
                <li>
                    <a href="payments.php">
                        <i class="fa fa-dollar-sign fa-2x"></i>
                        <span class="nav-text">
                            Payments
                        </span>
                    </a>
                </li>
            <?php }?>
                <?php if(!isset($_SESSION['username'])||!isset($_SESSION['userid'])){?>
                <li>
                    <a href="newaccount.php">
                        <i class="fa fa-user-plus fa-2x"></i>
                        <span class="nav-text">
                            Create Account
                        </span>
                    </a>
                </li>
            <?php }?>
            </ul>
<?php if(isset($_SESSION['username'])&&isset($_SESSION['userid'])){?>
            <ul class="logout">
                <li>
                   <a href="admin.php?option=logout">
                         <i class="fa fa-power-off fa-2x"></i>
                        <span class="nav-text">
                            Logout
                        </span>
                    </a>
                </li>  
            </ul>
        <?php }?>
        </nav>
