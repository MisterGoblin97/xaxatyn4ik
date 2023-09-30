<?php
    $conn = new SQLite3("database.db");
    $query="CREATE TABLE IF NOT EXISTS account(id INTEGER PRIMARY KEY AUTOINCREMENT, login TEXT, pass TEXT)";
    $conn->exec($query);

  
?>