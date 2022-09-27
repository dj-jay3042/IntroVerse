<?php
session_start();
require "../assets/database_connection.php";
if(isset($_POST['passwd']))
{
    $username = $_POST['user_name']; 
    $query = "select password from tblUser where login_id='".$username."';";
    $result = $conn->query($query);
    if($result->num_rows > 0)
    {
        $_POST['res'] = 0;
        while($row = $result->fetch_assoc())
            if (password_verify($_POST["passwd"], $row["password"]))
            {
                $_POST['res'] = 1;
                $_SESSION["Username"] = $username;
            }
    }
    else
        $_POST['res'] = 2;
}
echo $_POST["res"];
die;
?>