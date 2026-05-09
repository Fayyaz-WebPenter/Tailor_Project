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
            if(!isset($_GET['view_invoice']))
            {
                include './right-side/hello.php';

            }
            else
            {?>
              <?php
$id = $_GET['view_invoice'];
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
    
</div>

            <?php

            ?>
            <?php
            $id=$_GET['view_invoice'];
          $order="SELECT * FROM invoices_orders WHERE user_id='$id'";
          $orde_r=mysqli_query($conn,$order);
          $num=mysqli_num_rows($orde_r);
        
            ?>
        <!--header -->
<div style="padding: 30px;">
<h4 style="padding: 15px;background:white;position:relative;top:10px;"><?=  $data['name'];  ?> Invoices</h4>        <?php
    } ?>
<div class="table-responsive" style="margin-bottom: 14.8rem; font-size: 24px; z-index: 99999999999; position: relative;">
  <table class="table table-striped">
    <thead style="background: #e9e9e9;">
      <tr>
      <th>Product</th>
                    <th>Amount</th>
                    <th>QTY</th>
                    <th>Total Price</th>
              <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($num > 0) {
        while ($row = mysqli_fetch_assoc($orde_r)) {
      ?>
      <tr style="background: white; font-size: 15px;">
        <td style="vertical-align: middle;" scope="row"><?= $row['product'] ?></td>
        <td style="vertical-align: middle;" scope="row"><?= $row['order_cost'] ?></td>
        <td style="vertical-align: middle;"><?= $row['is_trowser'] ?></td>
        <td style="vertical-align: middle;"><?= $row['total_price'] ?></td>
        <td>
          <a href="./invoice.php?invoice=<?php echo $id; ?>" class="btn btn-info" style="background:#ededed;border:none;color:black;">View</a>
          <a href="./edit.php1?edit_order=<?php echo $id; ?>" class="btn btn-primary" style=" margin-bottom: 10px; margin-top:10px;background:#76daff;border:none;color:black;">Edit</a>
          <a href="./delete.php1?order_delete=<?php echo $id; ?>" class="btn btn-danger" >Delete</a>
        </td>
      </tr>
      <?php
        }
      }
      ?>
    </tbody>
  </table>
</div>

<button class="btn " style="position: relative;bottom: 240px;background-color: #76daff; padding: 7px;"><a style="text-decoration: none; color:black;color:black;" href="./index.php">Back</a></button>

        
</div>
        <!--input-bottom -->
       <?php include './right-side/input-bottom.php'  ?>
</div>
</div>
<?php include 'footer.php'; } ?>