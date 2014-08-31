<?php

include 'db_conn.php';
$tweets = array();
$post_input = $_POST['tagname'];
$result = mysql_query("select tweets.tweet,users.user_name from tweets INNER JOIN users ON tweets.user_id = users.id where tagname = '$post_input'");         //JOIN Query

while ($row = mysql_fetch_assoc($result)){
    array_push($tweets, $row);
}

echo json_encode($tweets);
?>