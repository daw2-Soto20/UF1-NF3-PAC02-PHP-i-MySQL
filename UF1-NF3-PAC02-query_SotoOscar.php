<?php
$db = mysqli_connect('localhost', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db,'boardgamesite') or die(mysqli_error($db));


$query = 'SELECT
        boardgame_name as Nombre, boardgtype_label as Tipo, p1.people_fullname as Disenyador, p2.people_fullname as Artista
    FROM
        boardgame bg, boardgametype bgt, people p1, people p2
    WHERE
        (bg.boardgame_type=bgt.boardgtype_id and bg.boardgame_designer=p1.people_id and bg.boardgame_artist=p2.people_id)
    ORDER BY
        boardgtype_label';
$result = mysqli_query($db,$query) or die(mysqli_error($db));

// show the results
while ($row = mysqli_fetch_assoc($result)) {
	extract($row);
	echo $Nombre . ' -- ' . $Tipo . ' -- ' . $Disenyador . ' -- ' . $Asrtista . '<br/><br/>';
}
?>