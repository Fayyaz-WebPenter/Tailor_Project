 <?php
  if (isset($_POST['searchc'])) {
    $search = $_POST['searchc'];
    $searchQuery = "SELECT * FROM tbl_users WHERE id='$search' OR name LIKE '%$search%' ";
    $select = mysqli_query($conn, $searchQuery);
} else {
    $select = mysqli_query($conn, "SELECT * FROM tbl_users");
}
//  $select="SELECT * FROM tbl_users";
//  $sql=mysqli_query($conn,$select);
?>
<div class="chat-list">
<?php
if(mysqli_num_rows($select)){
    while($data=mysqli_fetch_assoc($select)){
    ?>
    <input type="hidden" name="user_id" value="<?= $data['id'] ?>">
    <a style="text-decoration: none;" href="index.php?user-id=<?php echo $data['id'];?>">

            <div class="chat-box">
                <div class="img-box">
                    <img class="img-cover"
                         src="<?= $data['image'] ?>"
                         alt="">
                </div>
                <div class="chat-details">
                    <div class="text-head">
                        <h4><?= $data['name'] ?></h4>
                        <p class="time unread"><?= $data['time'] ?></p>
                    </div>
                    <div class="text-message">
                        <p><?= $data['whatsapp'] ?></p>
                        <b>1</b>
                    </div>
                </div>
            </div>
            <?php
} }else
{
    echo '<p style="text-align:center; color:red; border-radius:10px; padding: 10px;">User not found</p>';

}
?>
        </div>
        </a>
    </div>