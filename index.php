<?php include 'header.php' ?>
<div class="background-green"></div>
<div class="main-container">
    <div class="left-container">

        <!--header -->
       <?php include 'header/header-icon.php' ?>


        <!--notification -->
     <?php include 'left-header/notif-box.php' ?>

        <!--search-container -->
      <?php  include 'left-header/search-container.php' ?>


        <!--chats -->
       <?php include 'left-header/chat-list.php' ?>


    <div class="right-container">
        <?php 
            if(!isset($_GET['user-id']))
            {
                include 'right-side/hello.php';
                include '../whatsapptailorProject/footer.php';
            }
            else
            {
                include 'right-side/header.php';

            
            ?>
        <!--header -->
        <?php  ?>

        <!--chat-container -->
        <?php include 'right-side/chat-container.php';  }?>

        <!--input-bottom -->
       <?php include 'right-side/input-bottom.php'  ?>

    </div>

</div>
<?php include 'footer.php'; ?>