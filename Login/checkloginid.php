<?php
require "../assets/database_connection.php";
if(isset($_POST['login_id']))
{
    $username = $_POST['login_id']; 
    $query = "select login_id from tblUser where login_id='".$username."'";
    $result = $conn->query($query);
    if($result->num_rows > 0)
        $res = 3;
    else
        $res = 1;
}
echo $res;
die;
?>