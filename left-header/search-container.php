<?php
$key = '';
if (isset($_POST['searchc'])) {
    $key = $_POST['searchc'];
}
?>
<form method="post" action="">
<div class="search-container">
            <div class="input">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" name="searchc"placeholder="User Search or Add" value="<?= $key; ?>"></div>
            <i class="fa-sharp fa-solid fa-bars-filter"></i>
        </div>
</form>