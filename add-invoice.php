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
            if(!isset($_GET['add_invoice']))
            {
                include './right-side/hello.php';

            }
            else
            {?>
        
        <?php
$id = $_GET['add_invoice'];
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
            $id=$_GET['add_invoice'];
          $order="SELECT * FROM tbl_orders WHERE user_id='$id'";
          $orde_r=mysqli_query($conn,$order);
          $num=mysqli_num_rows($orde_r);
    
            ?>
        <!--header -->
        <div class="container mb-4 bg-white" style="padding:14px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <h2>Add Invoice</h2>
            <form action="" method="POST">
             <div class="form-group">
        <label for="order_cost">Order Cost:</label>
        <input type="text" id="order_cost" name="order_cost" required>
            </div>
          <div class="form-row">
        <div class="form-group">
            <label for="created_at">Created Date:</label>
            <input type="datetime-local" id="created_at" name="created_at" required>
        </div>
        <div class="form-group">
            <label for="updated_at">Updated Date:</label>
            <input type="datetime-local" id="updated_at" name="updated_at" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="is_trouser">Is Trouser:</label>
            <select id="is_trouser" name="is_trouser" required>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" id="status" name="status" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="qty_trousers">Quantity of Trousers:</label>
            <input type="number" id="qty_trousers" name="qty_trousers" required>
        </div>
        <div class="form-group">
            <label for="qty_suits">Quantity of Suits:</label>
            <input type="number" id="qty_suits" name="qty_suits" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="amount_trouser">Amount per Trouser:</label>
            <input type="text" id="amount_trouser" name="amount_trouser" required>
        </div>
        <div class="form-group">
            <label for="amount_suit">Amount per Suit:</label>
            <input type="text" id="amount_suit" name="amount_suit" required>
        </div>
    </div>
    <div class="form-group">
        <label for="notes">Notes:</label>
        <textarea id="notes" name="notes"></textarea>
    </div>
    <div class="form-group">
        <button type="submit" name="add-invoice"class="btn" style="background:#76daff;">Add Invoice</button>
    </div>
</form>

</div>
        </div>
    </div>
    <?php
    if(isset($_POST['add-invoice'])){
        $cost=$_POST['order_cost'];
        $cdate=$_POST['created_at'];
        $udate=$_POST['updated_at'];
        $suit=$_POST['suit'];
        $qty_suits=$_POST['qty_suits'];
        $amount_suit=$_POST['amount_suit'];
        $isTrouser=$_POST['is_trouser'];
        $qty_trousers=$_POST['qty_trousers'];
        $amount_trouser=$_POST['amount_trouser'];
        $notes=$_POST['notes'];
        $status=$_POST['status'];
        $update = "INSERT INTO invoices_orders (order_cost,order_date,order_update,issuit,qty_suits,amount_suit,is_trowser,qty_trousers,amount_trowser,decription,order_status, user_id) 
          VALUES ('$cost', '$cdate', '$udate', '$suit','$qty_suits','$amount_suit','$isTrouser',' $qty_trousers','$amount_trouser', '$notes', '$status', '$id')";
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
<style>
    .form-row {
    display: flex;
    gap: 1px; /* Adjust the gap between form groups as needed */
}

.form-group {
    flex: 1; /* Makes form groups take up equal space */
}

.form-group label {
    display: block;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 50%;
}
</style>