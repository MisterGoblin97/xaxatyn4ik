<?php
    $conn=new SQLite3('database') or die("Unable to open database!");
    $query="CREATE TABLE IF NOT EXISTS `account`(id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, login TEXT, pass TEXT)";    
    $conn->exec($query);
?>