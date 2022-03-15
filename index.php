<?php
include "db.php";
session_start();
session_destroy();
$result = mysqli_query($link, "SELECT * FROM `messages`");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nickname</title>
    <link rel="stylesheet" href="nickname.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
            <form method="POST" action="chat.php">
                <div class="row">
                    <div class="col">
                        <p class="entN">Введите никнейм:</p>
                    </div>
                </div>
                <div class="row justify-content-md-center">
                       <div class="col">
                           <input name="name" type="text" class="form-control inpN" required>
                       </div>
                       <div class="col">
                           <input type="submit" class="btn btn-outline-dark mySend" value="отправить">
                       </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<!--<div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">-->