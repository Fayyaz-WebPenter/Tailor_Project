<?php
ob_start();
?>
<?php include 'header.php' ?>
<div class="background-green"></div>
<div class="main-container">
    <div class="left-container">

        <!--header -->
       <?php include './header/header-icon.php' ?>


        <!--notification -->
     <?php include './left-header/notif-box.php' ?>

        <!--search-container -->
      <?php  include './left-header/search-container.php' ?>


        <!--chats -->
       <?php include './left-header/chat-list.php' ?>


    <div class="right-container">
        <?php 
            if(!isset($_GET['add_order']))
            {
                include './right-side/hello.php';

            }
            else
            {?>
        
        <?php
$id = $_GET['add_order'];
$select="SELECT * FROM tbl_users WHERE user_id='$id' ";
$query=mysqli_query($conn,$select);
?>
<div class="header">
    <?php while($data=mysqli_fetch_assoc($query)){
        ?>
 
            <div class="img-text">
                <div class="user-img">
                    <img class="dp"
                         src="<?= $data['image'] ?>"
                         alt="">
                </div>
                <h4><?php echo $data['name'];  ?></span></h4>
            </div>
            <div class="nav-icons">
                <li><i class="fa-solid fa-magnifying-glass"></i></li>
                <li><i class="fa-solid fa-ellipsis-vertical"></i></li>
            </div>
            <?php
    } ?>
</div>



            <?php
            ?>
            <?php
            $id=$_GET['add_order'];
          $order="SELECT * FROM tbl_orders WHERE user_id='$id'";
          $orde_r=mysqli_query($conn,$order);
          $num=mysqli_num_rows($orde_r);
    
            ?>
        <!--header -->
        <div class="container mb-4 bg-white" style="padding-bottom: 35px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center mb-4">Add Order</h2>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="cost">Cost</label>
                        <input type="text" name="cost" class="form-control" id="cost" placeholder="Enter cost" value="">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="createdDate">Created Date</label>
                            <input type="date" class="form-control" name="cdate" id="createdDate" value="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="updatedDate">Updated Date</label>
                            <input type="date" class="form-control" name="udate" id="updatedDate" value="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="numberOfSuit">Number of Suit</label>
                            <input type="number" class="form-control" name="suit" id="numberOfSuit" placeholder="Enter number of suits"value="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="isTrouser">Is Trouser</label>
                            <select class="form-control" id="isTrouser" name="isTrouser">
                               <option value="yes" >Yes</option>
                                <option value="no">No</option>
                                </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="notes">Notes</label>
                        <textarea class="form-control" name="notes" id="notes" rows="3" placeholder="Enter notes"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                             <option value="pending" >Pending</option>
                             <option value="completed" >Completed</option>
                             <option value="cancelled" >Cancelled</option>
                                 </select>

                    </div>
                    <button type="submit" class="btn btn-primary" name="add-order">Add Order
            </div>
        </div>
    </div>
    <?php
    if(isset($_POST['add-order'])){
        $cost=$_POST['cost'];
        $cdate=$_POST['cdate'];
        $udate=$_POST['udate'];
        $suit=$_POST['suit'];
        $isTrouser=$_POST['isTrouser'];
        $notes=$_POST['notes'];
        $status=$_POST['status'];
        $update = "INSERT INTO tbl_orders (cost, created_at, updated_at, number_of_suit, is_trouser, order_notes, order_status, user_id) 
          VALUES ('$cost', '$cdate', '$udate', '$suit', '$isTrouser', '$notes', '$status', '$id')";
        $run=mysqli_query($conn,$update);
        if($run){
        header('location:http://localhost/whatsAppTailorproject/orders.php');
        }else{
            echo 'un';
        }
    }
    ?>

        <!--input-bottom -->
       <!-- <?php include './right-side/input-bottom.php'  ?> -->
       <div class="chatbox-input" style="position: relative;
    bottom: 24px;">
            <i class="fa-regular fa-face-grin"></i>
            <i class="fa-sharp fa-solid fa-paperclip"></i>
            <input type="text" placeholder="Type a message">
            <i class="fa-solid fa-microphone"></i>
        </div>
</div>

</div>
<?php include 'footer.php'; } ?>