<?php
session_start();
$db = file("db.txt", FILE_IGNORE_NEW_LINES);
$newpass = '';
foreach ($db as $key => $value){
    $user_login = explode(":", $value);
    if($_POST['login'] == $user_login[0]) {
        $newpass.= $_POST['login'] . ":" . $user_login[1] . ":" . $user_login[2] . ":" . 0;
        $db[$key] = $newpass;
        $_SESSION['db_info'][$key] = $newpass;
        file_put_contents("db.txt", implode("\n", $db));
        break;
    }

}
header("Location: index.php");