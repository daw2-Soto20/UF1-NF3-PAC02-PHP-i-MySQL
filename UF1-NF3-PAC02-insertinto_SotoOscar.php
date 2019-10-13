<?php
// connect to mysqli
$db = mysqli_connect('localhost', 'root') or 
    die ('Unable to connect. Check your connection parameters.');

//make sure you're using the correct database
mysqli_select_db($db,'boardgamesite') or die(mysqli_error($db));

// insert data into the movie table
$query = 'INSERT INTO boardgame
        (boardgame_id, boardgame_name, boardgame_type, boardgame_year, boardgame_designer,
        boardgame_artist)
    VALUES
        (1, "Brass: Lancashire", 1, 2007, 1, 2),
        (2, "Agricola", 1, 2007, 4, 6),
        (3, "Caylus", 1, 2005, 4, 3),
        (4, "Azul", 2, 2017, 4, 3),
        (5, "Fantasy Realms", 4, 2017, 4, 3)';
mysqli_query($db,$query) or die(mysqli_error($db));

// insert data into the movietype table
$query = 'INSERT INTO boardgametype 
        (boardgtype_id, boardgtype_label)
    VALUES 
        (1, "Estrategia"),
        (2, "Abstracto"), 
        (3, "Familiar"),
        (4, "Cartas"), 
        (5, "Infantil")';
mysqli_query($db,$query) or die(mysqli_error($db));

// insert data into the people table
$query  = 'INSERT INTO people
        (people_id, people_fullname, people_isdesigner, people_isartist)
    VALUES
        (1, "Martin Wallace", 1, 0),
        (2, "David Forest", 0, 1),
        (3, "Lina Cossette", 0, 1),
        (4, "Uwe Rosenberg", 1, 0),
        (5, "William Attia", 1, 0),
        (6, "Klemens Franz", 0, 1)';
mysqli_query($db,$query) or die(mysqli_error($db));

echo 'Data inserted successfully!';
?>

