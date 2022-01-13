<?php
include_once("dbconn.php");
$select = "DELETE from sneakers where ID='".$_GET['del_id']."'";
$query = mysqli_query($conn, $select) or die($select);
header ("Location: show_sneakers.php");
?>