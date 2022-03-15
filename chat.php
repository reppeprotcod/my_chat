<?php
include "db.php";
session_start();
$result = mysqli_query($link, "SELECT * FROM `messages`");
if (!isset($_SESSION["nickname"])) {
    $_SESSION["nickname"] = $_POST["name"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="mess.css">
</head>

<body>
    <div class="chatName d-flex">
        <div class="nameC w-100">Beseda</div>
        <form method="POST" action="exit.php">
                <input type="submit" class="btn btn-light mesSend ex" value="Выход">
        </form>
    </div>

    <!--<div>-->
        <form class="container write" method="POST" action="send.php">
            <textarea name="messageText" id="" cols="70" rows="1" placeholder="Напишите сообщение..." required></textarea>
            <input type="submit" class="btn btn-light mesSend" value="Отправить"></input>
        </form>
    <!--</div>-->

    <div class="list">
        <?php
        $i = 0;
        while ($mes = mysqli_fetch_assoc($result)) {
            if ($mes['name']==$_SESSION["nickname"]) {
                if ($i == 0) {
        ?>
                    <div class="mess right first">
                        <p class="nickname"><?php echo $mes['name']; ?></p>
                        <p class="text"><?php echo $mes['message']; ?></p>
                    </div>
                <?php
                } elseif ($i == mysqli_num_rows($result) - 1) {
                ?>
                    <div class="mess right last">
                        <p class="nickname"><?php echo $mes['name']; ?></p>
                        <p class="text"><?php echo $mes['message']; ?></p>
                    </div>
                <?php
                } else {
                ?>
                    <div class="mess right">
                        <p class="nickname"><?php echo $mes['name']; ?></p>
                        <p class="text"><?php echo $mes['message']; ?></p>
                    </div>
                <?php
                }
            } else {
                if ($i == 0) {
                ?>
                    <div class="mess first">
                        <p class="nickname"><?php echo $mes['name']; ?></p>
                        <p class="text"><?php echo $mes['message']; ?></p>
                    </div>
                <?php
                } elseif ($i == mysqli_num_rows($result) - 1) {
                ?>
                    <div class="mess last">
                        <p class="nickname"><?php echo $mes['name']; ?></p>
                        <p class="text"><?php echo $mes['message']; ?></p>
                    </div>
                <?php
                } else {
                ?>
                    <div class="mess">
                        <p class="nickname"><?php echo $mes['name']; ?></p>
                        <p class="text"><?php echo $mes['message']; ?></p>
                    </div>
        <?php
                }
            }

            $i++;
        }
        ?>
    </div>
</body>

</html>