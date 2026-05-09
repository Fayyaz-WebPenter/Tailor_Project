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
            if(!isset($_GET['invoice'])) {
                include './right-side/hello.php';
            } else {
                $id = $_GET['invoice'];
                $select = "SELECT * FROM tbl_users WHERE user_id='$id'";
                $query = mysqli_query($conn, $select);
        ?>
        <div class="header">
            <?php while($data = mysqli_fetch_assoc($query)) { ?>
                <div class="img-text">
                    <div class="user-img">
                        <img class="dp" src="<?= $data['image'] ?>" alt="">
                    </div>
                    <h4><?php echo $data['name']; ?></h4>
                </div>
                <div class="nav-icons">
                    <li><i class="fa-solid fa-magnifying-glass"></i></li>
                    <li><i class="fa-solid fa-ellipsis-vertical"></i></li>
                </div>
            <?php } ?>
        </div>

        <?php
            $order_query = "SELECT * FROM invoices_orders WHERE user_id='$id'";
            $orders = mysqli_query($conn, $order_query);
            $num = mysqli_num_rows($orders);

            // Check if there are orders
            if($num > 0) {
                while($data = mysqli_fetch_assoc($orders)) {
                    // Assign variables from the fetched data
                    $order_cost = $data['order_cost']; // Example Order Cost
                    $created_at = $data['order_date']; // Correct column name for Date Created
                    $updated_at = $data['order_update']; // Correct column name for Date Updated
                    $is_trouser = $data['is_trowser']; // Is this order for trousers? (Assuming column exists)
                    $number_of_suit = $data['issuit']; // Number of suits (Assuming column exists)
                    $qty_trousers = $data['qty_trousers']; // Quantity of trousers (Assuming column exists)
                    $qty_suits = $data['qty_suits']; // Quantity of suits (Assuming column exists)
                    $amount_trouser = $data['amount_trowser']; // Amount per trouser (Assuming column exists)
                    $amount_suit = $data['amount_suit']; // Amount per suit (Assuming column exists)
                    $notes = $data['decription']; // Additional notes (Assuming column exists)
                    $status = $data['order_status']; // Status of the order (Assuming column exists)

                    // Calculate total prices
                    $total_price_trousers = $qty_trousers * $amount_trouser;
                    $total_price_suits = $qty_suits * $amount_suit;
                    $total_order_cost = $total_price_trousers + $total_price_suits;
                }
            }
        ?>

        <!-- Invoice Template -->
        <?php if ($num > 0): ?>
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Invoice</title>
            <style>
                body { font-family: Arial, sans-serif; }
                .invoice-box { max-width: 800px; margin: auto; padding: 30px; border: 1px solid #eee; box-shadow: 0 0 10px rgba(0, 0, 0, 0.15); }
                .invoice-title { text-align: center; font-size: 24px; margin-bottom: 20px; }
                .invoice-details { width: 100%; margin-bottom: 20px; }
                .details-left, .details-right { width: 48%; display: inline-block; vertical-align: top; }
                .details-left { float: left; }
                .details-right { float: right; text-align: right; }
                .invoice-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
                .invoice-table th, .invoice-table td { border: 1px solid #ddd; padding: 8px; text-align: left; }
                .invoice-table th { background-color: #f2f2f2; }
                .total { font-weight: bold; }
            </style>
        </head>
        <body>
        <!-- <a href="./view.php?order_view=<?php echo $id; ?>" class="btn btn-info" style="background:#ededed;border:none;color:black;z-index:1;position:relative">PDF</a> -->
            <div class='invoice-box bg-white mt-5'>
                <div class='invoice-title'>Invoice</div>
                <div class='invoice-details'>
                    <div class='details-left'>
                        <p><strong>Order Date:</strong> <?= $created_at ?></p>
                        <p><strong>Last Updated:</strong> <?= $updated_at ?></p>
                        <p><strong>Order Status:</strong> <?= $status ?></p>
                    </div>
                    <div class='details-right'>
                        <p><strong>Is Trouser:</strong> <?= ($is_trouser ? 'Yes' : 'No') ?></p>
                        <p><strong>Number of Suits:</strong> <?= $number_of_suit ?></p>
                    </div>
                </div>
                <table class='invoice-table'>
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Amount</th>
                            <th>QTY</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Trouser</td>
                            <td><?= $amount_trouser ?></td>
                            <td><?= $qty_trousers ?></td>
                            <td><?= $total_price_trousers ?></td>
                        </tr>
                        <tr>
                            <td>Suit</td>
                            <td><?= $amount_suit ?></td>
                            <td><?= $qty_suits ?></td>
                            <td><?= $total_price_suits ?></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan='3' class='total'>Total Order Cost</td>
                            <td class='total'><?= $total_order_cost ?></td>
                        </tr>
                    </tfoot>
                </table>
                <div class='invoice-notes'>
                    <p><strong>Notes:</strong> <?= $notes ?></p>
                </div>
            </div>
            
        </body>
        </html>
        <?php endif; ?>
        
        <!--input-bottom -->
        <div class="chatbox-input" style="position: relative;top:65px; ">
            <i class="fa-regular fa-face-grin"></i>
            <i class="fa-sharp fa-solid fa-paperclip"></i>
            <input type="text" placeholder="Type a message">
            <i class="fa-solid fa-microphone"></i>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
<?php } ?>
<style>
    .class {
        width: 125px;
        border-radius: 6px;
        border: 1px solid #e5e5e5;
        padding: 5px;
    }
</style>
