<?php
$id=$_GET['user-id'];
if(isset($_GET['user-id'])){
    $select="SELECT * FROM tbl_measurements WHERE user_id='$id'";
    $sql=mysqli_query($conn,$select);
    $num=mysqli_num_rows($sql);
    if($num>0){
        ?>

<div class="chat-container">
      <!-- order DETAILS-->
    <div class="order-details">
        <div class="grid">
        <?php
        while($row=mysqli_fetch_assoc($sql)){
        
        ?>
            <div class="orders">
        <?php
        $s_user="SELECT * FROM tbl_users WHERE id='$id'";
        $run=mysqli_query($conn,$s_user);
        $num1=mysqli_num_rows($run);
        if($num1>0){
            while($row1=mysqli_fetch_assoc($run)){
                ?>
    
                <div class="total-orders">
                    <h3>Total Orders</h3>
                    <h4><?= $row1['total-order'] ?></h4>
                </div>
                <div class="view-orders">
                    <button><a style="text-decoration: none; color:grey;" href="orders.php?user_order=<?= $row1['user_id'] ?>">View Orders</a></button>
                    <button style="width:116px;"><a style="text-decoration: none; color:grey;" href="add-orders.php?add_order=<?= $row1['user_id'] ?>">Add Order</a></button>
                </div>
                <div class="view-orders">
                    <button><a style="text-decoration: none; color:grey;" href="order-invoice.php?view_invoice=<?= $row1['user_id'] ?>">View invoice</a></button>
                    <button><a style="text-decoration: none; color:grey;" href="add-invoice.php?add_invoice=<?= $row1['user_id'] ?>">Add invoice</a></button>
                </div>
            </div>
            <div class="contacts">
                <p>Message On Whatsapp</p>
                <strong><?= $row1['phone'] ?></strong>
                <p>Call From Mobile</p>
                <strong><?= $row1['whatsapp'] ?></strong>
            </div>
            <?php
            }
        }
        ?>
            <div class="measurement-container">
                <p>Last Measurement Update At : <span><?= $row['measurementDate'] ?></span></p>
                <div class="measurements">
                    <div class="box">
                        <label for="">Measurement Date</label>
                        <input type="date" placeholder="" value="<?= $row['measurementDate'] ?>">
                    </div>
                    <div class="box">
                        <label for="">Measurement Time</label>
                        <input type="time" placeholder="" value="<?= $row['measurementTime'] ?>">
                    </div>
                    <div class="box">
                        <label for="">Chest</label>
                        <input type="number" placeholder="" value="<?= $row['chest'] ?>">
                    </div>
                    <div class="box">
                        <label for="">Shoulder</label>
                        <input type="number" placeholder="" value="<?= $row['shoulder'] ?>">
                    </div>
                    <div class="box">
                        <label for="">Sleeves</label>
                        <input type="number" placeholder="" value="<?= $row['sleeves'] ?>">
                    </div>
                    <div class="box">
                        <label for="">Collar</label>
                        <input type="number" placeholder="" value="<?= $row['collar'] ?>">
                    </div>
                    <div class="box">
                        <label for="">Cuff</label>
                        <input type="number" placeholder="" value="<?= $row['cuff'] ?>">
                    </div>
                    <div class="box">
                        <label for="">Shalvaar Length</label>
                        <input type="number" placeholder="" value="<?= $row['shalvaarLength'] ?>">
                    </div>
                    <div class="box">
                        <label for="">Shalvaar Bottom</label>
                        <input type="number" placeholder="" value="<?= $row['shalvaarBottom'] ?>">
                    </div>
                </div>
            </div>
            <?php
             
               }    } }
          
            ?>
        </div>
    </div>
</div>
    
        <style>
/* .search-container .input i {
    position: absolute;
    left: 26px;
    top: 14px;
    color:#bbb;
    font-size: 0.8em;
} */

/* .chat-list {
    position: relative;
    height:calc(100% - 170px);
    overflow-y: auto;
} */
/* 
.chat-list .chat-box { */
    /* position:relative;
    width: 100%;
    display:flex; */
    /*   justify-content: center; */
    /* align-items:center;
    cursor: pointer;
    padding: 15px;
    border-bottom: 1px solid #eee;
}
.chat-list .chat-box .img-box {
    position:relative;
    width: 55px;
    height:45px;
    overflow:hidden;
    border-radius: 50%;
} */

.chat-list .chat-box .chat-details {
    width: 100%;
    margin-left: 10px;
}

.chat-list .chat-box .chat-details .text-head {
    display:flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom:2px;
}

.chat-list .chat-box .chat-details .text-head h4 {
    font-size: 1.1em;
    font-weight: 600;
    color: #000;
}

.chat-list .chat-box .chat-details .text-head .time {
    font-size: 0.8em;
    color: #aaa;
}

.chat-list .chat-box .chat-details .text-message {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.chat-list .chat-box .chat-details .text-message p {
    color: #aaa;
    font-size: 0.9em;
    overlay: hidden;
}

img {
    width: 100%;
    object-fit: cover;
}

.chat-list .chat-box .chat-details .text-message b {
    background: #06e744;
    color: #fff;
    min-width: 20px;
    height: 20px;
    border-radius: 50%;
    /*   text-align: center; */
    font-size: 0.8em;
    font-weight: 400;
    display:flex;
    justify-content:center;
    align-items:center;
}

.chat-list .active {
    background: #ebebeb;
}

.chat-list .chat-box:hover {
    background: #f5f5f5;
}

.chat-list .chat-box .chat-details .text-head .unread {
    color: #06e744;
}


/* right-container */


.right-container .header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.right-container .header .img-text .user-img .dp {
    position:relative;
    top: -2px;
    left: 0px;
    width: 40px;
    height:auto;
    overflow:hidden;
    object-fit: cover;
}

.right-container .header .img-text {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
}

.right-container .header .img-text h4 {
    font-weight: 500;
    line-height: 1.2em;
    margin-left: 15px;
}

.right-container .header .img-text h4 span {
    font-size: 0.8em;
    color: #555;
}

.right-container .header .nav-icons {
    position: relative;
    margin-right:0px;
    /*   padding: 5px; */
}

.right-container .header .nav-icons i {
    padding: 10px;
}

.chat-container {
    position:relative;
    width: 100%;
    height: calc(100% - 120px); 
    padding: 50px;
    overflow-y: auto;
}

.message-box {
    position:relative;
    display: flex;
    width:100%;
    margin: 5px 0;
}

.message-box p {
    position:relative;
    right: 0;
    max-width: 65%;
    padding: 12px;
    background: #dcf8c6;
    border-radius: 10px;
    font-size: 0.9em;
}

.message-box.my-message p::before {
    content : '';
    position: absolute;
    top: 0;
    right: -12px;
    width: 20px;
    height: 20px;
    background: linear-gradient(135deg, #dcf8c6 0%, #dcf8c6 50%, transparent 50%, transparent);
}

.message-box p span {
    display: block;
    margin-top: 5px;
    font-size: 0.8em;
    opacity: 0.5;
}


.my-message {
    justify-content: flex-end;
}

.friend-message p {
    background: #fff;
}

.friend-message {
    justify-content: flex-start;

}

.chat-container .my-message i {
    color: yellow;
}

.message-box.friend-message::before {
    content : '';
    position: absolute;
    top: 0;
    left: -12px;
    width: 20px;
    height: 20px;
    background: linear-gradient(225deg, #fff 0%, #fff 50%, transparent 50%, transparent);
}

.chatbox-input {
    position:relative;
    height: 60px;
    background: #f0f0f0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.chatbox-input i {
    cursor: pointer;
    font-size: 1.8em;
    color: #515855;
}

.chatbox-input i:nth-child(1) {
    margin: 15px;
}

.chatbox-input i:last-child {
    margin-right: 25px;
}

.chatbox-input input {
    position: relative;
    width: 90%;
    margin: 0 20px;
    padding: 10px 20px;
    border-radius:10px;
    font-size: 1em;
    border:none;
    outline:none;
}
/* CHAT DETAILS */
.order-details{
    padding: 20px;
    background-color: #fff;      overflow: auto;
}
.grid{
    display: grid;
    grid-template-columns: 50% 50%;
    grid-row-gap: 20px;
}
.orders,.contacts,.measurement-container{
    border: 1px solid #aaa;
    border-radius: 10px;
    background-color: #fff;
    box-shadow: 2px 2px 5px 1px rgba(0,0,0,0.2);
    padding: 10px;
}
.orders{
    margin-right: 10px;
    /* display: flex;
    justify-content: space-between;
  align-items: center; */
}
.view-orders button{
    color: #06e744;
    border: 1px solid #06e744;
    padding: 10px;
    background: none;
    border-radius: 10px;
}
.view-orders button:hover{
    background:#06e744;
    color: #fff;
    cursor: pointer;
}
.contacts{
    margin-left: 10px;
}
.measurement-container{
    width: 200%;
}
.measurement-container p{
    font-size: 14px;
    margin: 10px 0;
}

.box{
    display: grid;
    grid-template-columns: 50% 50%;
}
.box label,.box input{
    margin: 5px;
    border: #aaa;
    border: 1px solid #ddd;
    padding: 10px;
}
.box label{
    font-size: 17px;
    font-weight: bold;
    background-color: #99999940;
}
        </style>