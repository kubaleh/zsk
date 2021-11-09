<?php
if(isset($_POST)){
    foreach($_POST as $key => $value){
        //echo "$key: $value<br>";
        if(empty($value)){
            header('location: ../bazy_danych/4_bazy_insert.php?error=Wypełnij wszystkie dane w formularzu!');
            exit();
        }
    }
    require_once './connect.php';
    $sql="INSERT INTO `users` (`id`, `city_id`, `name`, `surname`, `birthday`) VALUES (NULL, '$_POST[city_id]', '$_POST[name]', '$_POST[surname]', '$_POST[birthday]');";
    $connect->query($sql);
    if($connect->affected_rows == 1){
        echo "ok";
        header('location: ../bazy_danych/4_bazy_insert.php?error=Prawidłowo dodano użytkownika');
    }
    else{
        echo "error";
        header('location: ../bazy_danych/4_bazy_insert.php?error=Nie dodano użytkownika');
    }
    $connect->close();
}
?>