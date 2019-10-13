<?php
//connect to MySQL
$db = mysqli_connect('localhost', 'root') or 
    die ('Unable to connect. Check your connection parameters.');

//create the main database if it doesn't already exist
$query = 'CREATE DATABASE IF NOT EXISTS boardgamesite';
mysqli_query($db,$query) or die(mysqli_error($db));

//make sure our recently created database is the active one
mysqli_select_db($db,'boardgamesite') or die(mysqli_error($db));

//create the boardgame table
$query = 'CREATE TABLE boardgame (
        boardgame_id        INTEGER UNSIGNED  NOT NULL AUTO_INCREMENT, 
        boardgame_name      VARCHAR(255)      NOT NULL, 
        boardgame_type      TINYINT           NOT NULL DEFAULT 0, 
        boardgame_year      SMALLINT UNSIGNED NOT NULL DEFAULT 0, 
        boardgame_designer  INTEGER UNSIGNED  NOT NULL DEFAULT 0, 
        boardgame_artist    INTEGER UNSIGNED  NOT NULL DEFAULT 0, 

        PRIMARY KEY (boardgame_id),
        KEY boardgame_type (boardgame_type, boardgame_year) 
    ) 
    ENGINE=MyISAM';
mysqli_query($db,$query) or die (mysqli_error($db));

//create the boardgametype table
$query = 'CREATE TABLE boardgametype ( 
        boardgtype_id    TINYINT UNSIGNED NOT NULL AUTO_INCREMENT, 
        boardgtype_label VARCHAR(100)     NOT NULL, 
        PRIMARY KEY (boardgtype_id) 
    ) 
    ENGINE=MyISAM';
mysqli_query($db,$query) or die(mysqli_error($db));

//create the people table
$query = 'CREATE TABLE people ( 
        people_id           INTEGER UNSIGNED    NOT NULL AUTO_INCREMENT, 
        people_fullname     VARCHAR(255)        NOT NULL, 
        people_isdesigner   TINYINT(1) UNSIGNED NOT NULL DEFAULT 0, 
        people_isartist     TINYINT(1) UNSIGNED NOT NULL DEFAULT 0, 

        PRIMARY KEY (people_id)
    ) 
    ENGINE=MyISAM';
mysqli_query($db,$query) or die(mysqli_error($db));

echo 'Boardgame database successfully created!';
?>

