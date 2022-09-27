<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <table>
            <tr>
                <th>First Name</th>
                <th>:</th>
                <td><input type="text" name="fname"></td>
            </tr>
            <tr>
                <th>Last Name</th>
                <th>:</th>
                <td><input type="text" name="lname"></td>
            </tr>
            <tr>
                <th>Email ID</th>
                <th>:</th>
                <td><input type="email" name="email"></td>
            </tr>
            <tr>
                <th>Salary</th>
                <th>:</th>
                <td><input type="text" name="salary"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><button type="submit" name="insert">Submit</button></td>
            </tr>
        </table>
    </form>
    <?php
        $conn = new mysqli("localhost:3306","djjay","djjay3042","exam");
        if (isset($_POST["insert"]))
        {
            
            $qry = "insert into tblUser (fname,lname,email,salary) values ('".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["email"]."','".$_POST["salary"]."');";
            $result = $conn->query($qry);
            if ($result)
                echo "Inserted";
            else
                echo "Error";
        }
        echo '<table>
        <tr>
            <th>Fname
            <th>Lname
            <th>Email
            <th>salary
            <th>
            <th>
        </tr>';
        $qry = "select * from tblUser;";
        $result = $conn->query($qry);
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                echo '<tr>
                    <td>'.$row["fname"].'
                    <td>'.$row["lname"].'
                    <td>'.$row["email"].'
                    <td>'.$row["salary"].'
                    <td><a href="table.php?update='.$row["id"].'"><button>Update</button></a>
                    <td><a href="table.php?delete='.$row["id"].'">Delete</a>
                </tr>';
            }
            echo '</table>';
        }
        else
            echo "No data";

            if (isset($_GET["delete"]))
            {
                $qry = "delete from tblUser where id=".$_GET["delete"].";";
                $result = $conn->query($qry);
                if ($result)
                {
                    echo "Deleted";
                    header("Location: table.php");
                }
                else
                    echo "Error";
            }

        if (isset($_GET["update"]))
        {
            $qry = "select * from tblUser where id=".$_GET["update"]."";
            $result = $conn->query($qry);
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                    $fname = $row["fname"];
                    $lname = $row["lname"];
                    $email = $row["email"];
                    $salary = $row["salary"];
            }
            echo '</table>';
        }
?>
<form method="post">
        <table>
            <tr>
                <th>First Name</th>
                <th>:</th>
                <td><input type="text" name="ufname" value="<?php echo $fname?>"></td>
            </tr>
            <tr>
                <th>Last Name</th>
                <th>:</th>
                <td><input type="text" name="ulname" value="<?php echo $lname?>"></td>
            </tr>
            <tr>
                <th>Email ID</th>
                <th>:</th>
                <td><input type="email" name="uemail" value="<?php echo $email?>"></td>
            </tr>
            <tr>
                <th>Salary</th>
                <th>:</th>
                <td><input type="text" name="usalary" value="<?php echo $salary?>"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><button type="submit" name="update">Update</button></td>
            </tr>
        </table>
    </form>
<?php 
        if (isset($_POST["update"]))
        {
            $qry = "update tblUser set fname = '".$_POST["ufname"]."', lname='".$_POST["ulname"]."', email='".$_POST["uemail"]."', salary='".$_POST["usalary"]."' where id = ".$_GET["update"].";";
            $result = $conn->query($qry);
            if ($result)
            {
                echo "Updated";
                header("Location: table.php");
            }
            else
                echo "Error";
        }
        }
    ?>
</body>
</html>
<?php
  }
  else
    header("Location: ../../Login/login.php");
?>