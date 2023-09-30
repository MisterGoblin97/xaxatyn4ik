<?php
    session_start();
    require_once 'conn.php';
 
    if(ISSET($_POST['login'])){
        $login = $_POST['text'];
        $password = $_POST['password'];
        $query1=$conn->query("SELECT * FROM `account` WHERE `login`='$login' AND `pass`='$pass'");
        $row1=$query1->fetchArray();
 
        $query=$conn->query("SELECT COUNT(*) as count FROM `account` WHERE `login`='$login' AND `pass`='$pass'");
        $row=$query->fetchArray();
        $count=$row['count'];
        if($count > 0){
            $_SESSION['id']=$row1['id'];
            header('location: app.html'); 
        }else{
            echo "<div class='alert alert-danger'>Неверный логин или пароль.</div>";
        }
    }