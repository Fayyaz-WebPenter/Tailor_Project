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
            if(!isset($_GET['order_view']))
            {
                include './right-side/hello.php';

            }
            else
            {?>
               <?php
$id = $_GET['order_view'];
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



            <?php  ?>
            <?php
            $id=$_GET['order_view'];
          $order="SELECT * FROM tbl_orders WHERE user_id='$id'";
          $orders=mysqli_query($conn,$order);
          $num=mysqli_num_rows($orders);
    
            ?>
        <!--header -->
        <div class="container mb-4 bg-white" style="height: 83.3%;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center mb-4" style="padding:15px;width: 69%;border-bottom: 1px dotted black;">Order Details</h2>
                <form action="" method="post">
                    <?php if($num>0){
                        while($row=mysqli_fetch_assoc($orders)){
                            ?>
                   
    <div class="form-group">
        <label for="cost">Cost</label>
        <p class="class"  id="cost"><?= $row['cost'] ?></p>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="createdDate">Created Date</label>
            <p class="class" id="createdDate"><?= $row['created_at'] ?></p>
        </div>
        <div class="form-group col-md-6">
            <label for="updatedDate">Updated Date</label>
            <p class="class"  id="updatedDate"><?= $row['updated_at'] ?></p>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="numberOfSuit">Number of Suit</label>
            <p class="class"  id="numberOfSuit"><?= $row['number_of_suit'] ?></p>
        </div>
        <div class="form-group col-md-6">
            <label for="isTrouser">Is Trouser</label>
            <p class="class"  id="isTrouser"><?= $row['is_trouser'] ?></p>
        </div>
    </div>
    <div class="form-group">
        <label for="notes">Notes</label>
        <p class="class"  id="notes"><?= $row['order_notes'] ?></p>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <p class="class"  id="status"><?= $row['order_status'] ?></p>
    </div>
 
</form>
<?php
                        }
                    } ?>    
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
        header('location:http://localhost/whatsAppTailorproject/view-order.php');
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

    <style>
    .class{
      width: 125px;
    border-radius: 6px;
    border: 1px solid #e5e5e5;
    padding: 5px;
    } 
</style>
