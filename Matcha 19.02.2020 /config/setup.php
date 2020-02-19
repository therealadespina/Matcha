<?php
include 'database.php';
require_once ('database.php') ; // проверка включен ли файл, елси да, то он не включается
// Создание БД
try {
    $connection = new PDO($dsn, $user, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS camagru";
    // Использую exec() потому что результат не возвращается
    $connection->exec($sql);
    echo "База данных CAMAGRU успешно создана<br>"; 
    }
catch(PDOException $error)
    {
    echo "Ошибка в создании БД: ".$error->getMessage()."Aborting process<br>";
	}
	
try {   
        $db = new PDO($dsn, $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE IF NOT EXISTS users (
            id int(11) NOT NULL AUTO_INCREMENT,
            username varchar(100) NOT NULL,
            email varchar(100) NOT NULL,
            vkey varchar(100) NOT NULL,
            acstatus int(11) NOT NULL DEFAULT 0,
            notifications boolean DEFAULT TRUE,
            -- verified tinyint(1) NOT NULL DEFAULT 0,
            -- token varchar(255) DEFAULT NULL,
            passwd varchar(255) NOT NULL,
            PRIMARY KEY (id)
        )";
        $db->exec($sql);
        echo "Таблица USERS успешно создана<br>";
	}
catch (PDOException $error) {
    echo "Ошибка в создании таблицы USERS: ".$error->getMessage()."Aborting process<br>";
    }

try {
        $db = new PDO($dsn, $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE IF NOT EXISTS password_reset (
            id int(11) NOT NULL AUTO_INCREMENT,
            email varchar(100) NOT NULL,
            token varchar(255) DEFAULT NULL,
            PRIMARY KEY (id)
        )";
        $db->exec($sql);
        echo "Таблица PASSWORD_RESET успешно создана<br>";
	}
catch (PDOException $error) {
    echo "Ошибка в создании PASSWORD_RESET таблицы: ".$error->getMessage()."Aborting process<br>";
    }

try {
        
        $db = new PDO($dsn, $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE IF NOT EXISTS images (
            id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(100) NOT NULL,
            images VARCHAR(100) NOT NULL,
            like_count int(11) NOT NULL
        )";
        $db->exec($sql);
        echo "Таблица IMAGES успешно создана<br>";
    } catch (PDOException $error) {
        echo "Ошибка в создании IMAGES таблицы: ".$error->getMessage()."Aborting process<br>";
    }

    try {
        $db = new PDO($dsn, $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE IF NOT EXISTS tbl_comment (
            comment_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            parent_comment_id int(11) NOT NULL,
            comment varchar(200) NOT NULL,
            comment_sender_name varchar(40) NOT NULL,
            dates timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            image_id int(11) DEFAULT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
          ";
        $db->exec($sql);
        echo "Таблица COMMENTS успешно создана<br>";
    } catch (PDOException $error) {
        echo "Ошибка в создании COMMENTS таблицы: ".$error->getMessage()."Aborting process<br>";
    }
?>