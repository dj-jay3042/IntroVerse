<?php
require "../assets/database_connection.php";
if (isset($_POST["signnUp"]))
{
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $cntno = $_POST["cntno"];
    $loginid = $_POST["loginid"];
    $house = $_POST["house"];
    $socity = $_POST["socity"];
    $area = $_POST["area"];
    $pincode = $_POST["pincode"];
    $passwd = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $date = $_POST["year"]."-".(($_POST["month"] < 10) ? ('0'.$_POST["month"]) : ($_POST["month"]))."-".(($_POST["date"] < 10) ? ('0'.$_POST["date"]) : ($_POST["date"]));
    $gender = $_POST["gender"];
    $query = "Insert Into tblUser (login_id, password, first_name, last_name, email, contact_no, date_of_birth, gender, user_type, flat_no, building_name, area_name, pincode, created_date) values ('".$loginid."', '".$passwd."', '".$fname."', '".$lname."', '".$email."', '".$cntno."', '".$date."', '".$gender."', 2, '".$house."', '".$socity."', '".$area."', ".$pincode.", '".date("Y-m-d")."');";
    if ($conn->query($query) == true)
        echo "Success";
}
?>