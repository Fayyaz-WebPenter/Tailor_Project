<?php
$id = $_GET['user-id'];
$select="SELECT * FROM tbl_users WHERE id='$id' ";
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
                <h4><?php echo $data['name'];  ?></span><br></span></h4>
                
            </div>
            <div class="nav-icons">
                <li><i class="fa-solid fa-magnifying-glass"></i></li>
                <li><i class="fa-solid fa-ellipsis-vertical"></i></li>
            </div>
            <?php
    } ?>
</div>

