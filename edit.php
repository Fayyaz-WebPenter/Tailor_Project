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
            if(!isset($_GET['edit_order']))
            {
                include './right-side/hello.php';

            }
            else
            {?>
        
        <?php
$id = $_GET['edit_order'];
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
            $id=$_GET['edit_order'];
          $order="SELECT * FROM tbl_orders WHERE user_id='$id'";
          $orde_r=mysqli_query($conn,$order);
          $num=mysqli_num_rows($orde_r);
    
            ?>
        <!--header -->
        <div class="container mb-4 bg-white" style="padding-bottom: 35px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center mb-4">Order Records</h2>
                <form action="" method="post">
                    <?php  
                    if($num){
                        while($row1=mysqli_fetch_assoc($orde_r)){
                            ?>
                    <div class="form-group">
                        <label for="cost">Cost</label>
                        <input type="text" name="cost" class="form-control" id="cost" placeholder="Enter cost" value="<?= $row1['cost'] ?>">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="createdDate">Created Date</label>
                            <input type="date" class="form-control" name="cdate" id="createdDate" value="<?= $row1['created_at'] ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="updatedDate">Updated Date</label>
                            <input type="date" class="form-control" name="udate" id="updatedDate" value="<?= $row1['updated_at'] ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="numberOfSuit">Number of Suit</label>
                            <input type="number" class="form-control" name="suit" id="numberOfSuit" placeholder="Enter number of suits"value="<?= $row1['number_of_suit'] ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="isTrouser">Is Trouser</label>
                            <select class="form-control" id="isTrouser" name="isTrouser">
                   <option value="yes" <?= $row1['is_trouser'] === 'yes' ? 'selected' : '' ?>>Yes</option>
                <option value="no" <?= $row1['is_trouser'] === 'no' ? 'selected' : '' ?>>No</option>
                                </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="notes">Notes</label>
                        <textarea class="form-control" name="notes" id="notes" rows="3" placeholder="Enter notes"><?= $row1['order_notes'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
           <option value="pending" <?= $row1['order_status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
          <option value="completed" <?= $row1['order_status'] === 'completed' ? 'selected' : '' ?>>Completed</option>
          <option value="cancelled" <?= $row1['order_status'] === 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
                                 </select>

                    </div>
                    <button type="submit" class="btn btn-primary" name="update">Submit</button>
                </form>
                <?php
                        } }
                        ?>
            </div>
        </div>
    </div>
    <?php
    if(isset($_POST['update'])){
        $cost=$_POST['cost'];
        $cdate=$_POST['cdate'];
        $udate=$_POST['udate'];
        $suit=$_POST['suit'];
        $isTrouser=$_POST['isTrouser'];
        $notes=$_POST['notes'];
        $status=$_POST['status'];
        $update="UPDATE tbl_orders SET cost='$cost', created_at='$cdate',updated_at='$udate',
        number_of_suit='$suit', is_trouser='$isTrouser',order_notes='$notes',order_status='$status' WHERE user_id='$id'";
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