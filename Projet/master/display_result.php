<?php
require_once "./db_cmd.php";

$values = get_user_infos($_POST['name']);

?>
<link rel="stylesheet" href="style.css">
<div class="result_div card">
    <div class="name">
        <?php echo $values["name"] ?>
    </div>

    <div class="language">
        <?php echo $values["language"] ?>
    </div>
    <div class="ex_number">
        <?php echo $values["ex_number"] ?>
    </div>
    <div class="date_time">
        <?php echo $values["date_time"] ?>
    </div>
    <div class="grade">
        <?php echo $values["grade"] ?>
    </div>
</div>