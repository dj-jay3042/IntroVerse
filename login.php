<?php
require "../assets/database_connection.php";
?>
<!DOCTYPE html>

<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login - IntroVerse</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href='https://fonts.googleapis.com/css?family=Roboto:300,400,600' rel='stylesheet' type='text/css'><link rel="stylesheet" href="./style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
  .alert{
    hight: 50%;
  }
</style>
<script>
  var res = -1;
</script>
</head>
<body>
<!-- partial:index.partial.php -->
<div id="back">
  <canvas id="canvas" class="canvas-back"></canvas>
  <div class="backRight">    
  </div>
  <div class="backLeft">
  </div>
</div>

<div id="slideBox">
  <div class="topLayer">
    <div class="left">
      <div class="content">
        <h2>Sign Up</h2>
        <form id="form-signup" method="post">
          <div class="form-element form-stack">
            <label for="username-signup" class="form-label">Username</label>
            <input id="username-signup" type="text" name="loginid" value="<?php echo $_POST["loginid"]?>">
            <div id="user_error"></div>
            <script>
              $("#username-signup").keyup(function (){
                var uname = $("#username-signup").val();
                var pattern = /^[A-z]+[0-9]+[~`?<>,.;'&":!@#$%^*_+-=]+$/;
                if (!pattern.test(uname))
                {
                  $("#user_error").show();
                  $("#user_error").html('<div class="alert alert-danger" role="alert" >Enter Proper User Name!!!!!</div>');
                  res = 4;
                }
                $.ajax({
                    url: 'checkloginid.php',
                    type: 'post',
                    async: true,
                    data: {login_id: uname},
                    success: function(response){
                        res = response;
                    }
                });
                if (res == 3)
                {
                  $("#user_error").html('<div class="alert alert-danger" role="alert" >User Name Already Exist!!!!!<br>Choose Another User Name!!!!!</div>');
                  res = 6;
                }
                else if(res != 6)
                {
                  $("#user_error").hide();
                  res = 1;
                }
              });   
            </script>
          </div>
          <div class="form-element form-stack">
            <label for="fname" class="form-label">First Name</label>
            <input id="fname" type="text" name="fname" value="<?php echo $_POST["fname"]?>">
            <div id="fname_error"></div>
            <script>
              $("#fname").keyup(function (){
                var text = $("#fname").val();
                var pattern = /^[A-z]+$/;
                if (!pattern.test(text))
                {
                  $("#fname_error").show();
                  $("#fname_error").html('<div class="alert alert-danger" role="alert" >Enter Proper Name</div>');
                  res = 4;
                }
                else
                {
                  $("#fname_error").hide();
                  res = 1;
                }
              });   
            </script>
          </div>
          <div class="form-element form-stack">
            <label for="lname" class="form-label">Last Name</label>
            <input id="lname" type="text" name="lname" value="<?php echo $_POST["lname"]?>">
            <div id="lname_error"></div>
            <script>
              $("#lname").keyup(function (){
                var text = $("#lname").val();
                var pattern = /^[A-z]+$/;
                if (!pattern.test(text))
                {
                  $("#lname_error").show();
                  $("#lname_error").html('<div class="alert alert-danger" role="alert" >Enter Proper Sername</div>');
                  res = 4;
                }
                else
                {
                  $("#lname_error").hide();
                  res = 1;
                }
              });   
            </script>
          </div>
          <div class="form-element form-stack">
            <label for="email" class="form-label">Email Address</label>
            <input id="email" type="email" name="email" value="<?php echo $_POST["email"]?>">
            <div id="email_error"></div>
            <script>
              $("#email").keyup(function (){
                var text = $("#email").val();
                var pattern = /^([-!#-'*+/-9=?A-Z^-~]+(\.[-!#-'*+/-9=?A-Z^-~]+)*|"([]!#-[^-~ \t]|(\\[\t -~]))+")@([0-9A-Za-z]([0-9A-Za-z-]{0,61}[0-9A-Za-z])?(\.[0-9A-Za-z]([0-9A-Za-z-]{0,61}[0-9A-Za-z])?)*|\[((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[1-9]?[0-9])(\.(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[1-9]?[0-9])){3}|IPv6:((((0|[1-9A-Fa-f][0-9A-Fa-f]{0,3}):){6}|::((0|[1-9A-Fa-f][0-9A-Fa-f]{0,3}):){5}|[0-9A-Fa-f]{0,4}::((0|[1-9A-Fa-f][0-9A-Fa-f]{0,3}):){4}|(((0|[1-9A-Fa-f][0-9A-Fa-f]{0,3}):)?(0|[1-9A-Fa-f][0-9A-Fa-f]{0,3}))?::((0|[1-9A-Fa-f][0-9A-Fa-f]{0,3}):){3}|(((0|[1-9A-Fa-f][0-9A-Fa-f]{0,3}):){0,2}(0|[1-9A-Fa-f][0-9A-Fa-f]{0,3}))?::((0|[1-9A-Fa-f][0-9A-Fa-f]{0,3}):){2}|(((0|[1-9A-Fa-f][0-9A-Fa-f]{0,3}):){0,3}(0|[1-9A-Fa-f][0-9A-Fa-f]{0,3}))?::(0|[1-9A-Fa-f][0-9A-Fa-f]{0,3}):|(((0|[1-9A-Fa-f][0-9A-Fa-f]{0,3}):){0,4}(0|[1-9A-Fa-f][0-9A-Fa-f]{0,3}))?::)((0|[1-9A-Fa-f][0-9A-Fa-f]{0,3}):(0|[1-9A-Fa-f][0-9A-Fa-f]{0,3})|(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[1-9]?[0-9])(\.(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[1-9]?[0-9])){3})|(((0|[1-9A-Fa-f][0-9A-Fa-f]{0,3}):){0,5}(0|[1-9A-Fa-f][0-9A-Fa-f]{0,3}))?::(0|[1-9A-Fa-f][0-9A-Fa-f]{0,3})|(((0|[1-9A-Fa-f][0-9A-Fa-f]{0,3}):){0,6}(0|[1-9A-Fa-f][0-9A-Fa-f]{0,3}))?::)|(?!IPv6:)[0-9A-Za-z-]*[0-9A-Za-z]:[!-Z^-~]+)])$/;
                if (!pattern.test(text))
                {
                  $("#email_error").show();
                  $("#email_error").html('<div class="alert alert-danger" role="alert" >Enter Proper Email Address</div>');
                  res = 4;
                }
                else
                {
                  $("#email_error").hide();
                  res = 1;
                }
              });   
            </script>
          </div>
          <div class="form-element form-stack">
            <label for="cntno" class="form-label">Contact Number</label>
            <input id="cntno" type="text" name="cntno" value="<?php echo $_POST["cntno"]?>">
            <div id="cntno_error"></div>
            <script>
              $("#cntno").keyup(function (){
                var text = $("#cntno").val();
                var pattern = /^[0-9]{10}$/;
                if (!pattern.test(text))
                {
                  $("#cntno_error").show();
                  $("#cntno_error").html('<div class="alert alert-danger" role="alert" >Enter Proper Contact Number</div>');
                  res = 4;
                }
                else
                {
                  $("#cntno_error").hide();
                  res = 1;
                }
              });   
            </script>
          </div>
          <div class="form-element form-stack">
            <label for="date" class="form-label">Date Of Birth</label>
            <table>
              <tr>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
                <td><select name="date" class="form-select" id="date">
                  <option value="" <?php echo (isset($_POST["date"])) ? ("") : ("selected");?> disabled>--date--</option>
                  <?php
                  for ($i = 1; $i < 32; $i++)
                  {
                    if ($_POST["date"] == $i)
                      echo '<option value="'.$i.'" selected>'.$i.'</option>';
                    else
                      echo '<option value="'.$i.'">'.$i.'</option>';
                  }
                  ?>
                </select></td>
                <?php
                function month($month)
                {
                  if ($_POST["month"] == $month)
                    echo "Selected";
                }
                ?>
                <td><select name="month" class="form-select" id="month">
                  <option value="" <?php echo (isset($_POST["month"])) ? ("") : ("selected");?> disabled>--month--</option>
                  <option value="1" <?php month(1)?>>January</option>
                  <option value="2" <?php month(2)?>>February</option>
                  <option value="3" <?php month(3)?>>March</option>
                  <option value="4" <?php month(4)?>>April</option>
                  <option value="5" <?php month(5)?>>May</option>
                  <option value="6" <?php month(6)?>>June</option>
                  <option value="7" <?php month(7)?>>July</option>
                  <option value="8" <?php month(8)?>>August</option>
                  <option value="9" <?php month(9)?>>September</option>
                  <option value="10" <?php month(10)?>>October</option>
                  <option value="11" <?php month(11)?>>November</option>
                  <option value="12" <?php month(12)?>>December</option>
                </select></td>
                <td><select name="year" class="form-select" id="year">
                  <option value="" <?php echo (isset($_POST["year"])) ? ("") : ("selected");?> disabled>--year--</option>
                  <?php
                  for ($i = 1947; $i <= (date("Y")); $i++)
                  {
                    if ($_POST["year"] == $i)
                      echo '<option value="'.$i.'" selected>'.$i.'</option>';
                    else
                      echo '<option value="'.$i.'">'.$i.'</option>';
                  }
                  ?>
                </select></td>
              </tr>
            </table>
            <div id="date_error"></div>
            <script>
              $("#year").change(function (){
                var date = new Date($("#year").val(), $("#month").val() - 1, $("#date").val());
                var cdate = new Date();
                if (cdate < date)
                {
                  $("#date_error").html('<div class="alert alert-danger" role="alert">Enter Valid Birth Date</div>');
                  $("#date_error").show();
                  res = 4;
                }
                else
                {
                  $("#date_error").hide();
                  res = 1;
                } 
              });
            </script>
          </div>
          <div class="form-element form-stack">
            <label for="male" class="form-label">Gender</label>
            <table>
              <tr>
                <td><input id="male" type="radio" name="gender" value="Male">&nbsp&nbsp<label for="male" class="form-label">Male</label></td>
                <td><input id="female" type="radio" name="gender" value="Female">&nbsp&nbsp<label for="female" class="form-label">Female</label></td>
                <td><input id="other" type="radio" name="gender" value="Others">&nbsp&nbsp<label for="other" class="form-label">Others</label></td>
              </tr>
            </table>
          </div>
          <div class="form-element form-stack">
            <label for="house" class="form-label">House Number</label>
            <input id="house" type="text" name="house" value="<?php echo $_POST["house"]?>">
            <div id="house_error"></div>
            <script>
              $("#house").keyup(function (){
                var text = $("#house").val();
                var pattern = /^[A-z]+[0-9]+$/;
                if (!pattern.test(text))
                {
                  $("#house_error").show();
                  $("#house_error").html('<div class="alert alert-danger" role="alert" >Enter Proper House Number</div>');
                  res = 4;
                }
                else
                {
                  $("#house_error").hide();
                  res = 1;
                }
              });   
            </script>
          </div>
          <div class="form-element form-stack">
            <label for="socity" class="form-label">Socity Name</label>
            <input id="socity" type="text" name="socity" value="<?php echo $_POST["socity"]?>">
            <div id="socity_error"></div>
            <script>
              $("#socity").keyup(function (){
                var text = $("#socity").val();
                var pattern = /^[A-z]+ ?[A-z]*$/;
                if (!pattern.test(text))
                {
                  $("#socity_error").show();
                  $("#socity_error").html('<div class="alert alert-danger" role="alert" >Enter Proper Socity Name</div>');
                  res = 4;
                }
                else
                {
                  $("#socity_error").hide();
                  res = 1;
                }
              });   
            </script>
          </div>
          <div class="form-element form-stack">
            <label for="area" class="form-label">Area</label>
            <input id="area" type="text" name="area" value="<?php echo $_POST["area"]?>">
            <div id="area_error"></div>
            <script>
              $("#area").keyup(function (){
                var text = $("#area").val();
                var pattern = /^[A-z]+ ?[A-z]*$/;
                if (!pattern.test(text))
                {
                  $("#area_error").show();
                  $("#area_error").html('<div class="alert alert-danger" role="alert" >Enter Proper Area Name</div>');
                  res = 4;
                }
                else
                {  
                  $("#area_error").hide();
                  res = 1;
                }
              });   
            </script>
          </div>
          <div class="form-element form-stack pincode">
            <label for="pincode" class="form-label">Pincode</label>
            <table>
              <tr>
                <td><select name="pincode" class="form-select w-100" data-live-search="true" id="pincode">
                  <option value="" selected disabled>--pincode--</option>
                  <?php
                    $qry = "SELECT tblPincode.pincode, tblPincode.taluka_name, tblDistrict.d_name, tblState.s_name, tblCountry.c_name from tblPincode INNER JOIN tblDistrict ON tblPincode.d_id = tblDistrict.d_id INNER JOIN tblState ON tblState.s_id = tblDistrict.s_id INNER JOIN tblCountry ON tblCountry.c_id = tblState.c_id;";
                    $result = $conn->query($qry);
                    if ($result->num_rows > 0)
                      while ($row = $result->fetch_assoc())
                      {
                        echo '<option value="'.$row["pincode"].'">'.$row["pincode"].' | '.$row["taluka_name"].' | '.$row["d_name"].' | '.$row["s_name"].' | '.$row["c_name"].'</option>';
                      }
                  ?>
                </select></td>
                </tr>
            </table>
            <script>
              $('#pincode').selectpicker();
            </script>
          </div>
          <div class="form-element form-stack">
            <label for="password-signup" class="form-label">Password</label>
            <input id="password-signup" type="password" name="password" value="<?php echo $_POST["password"]?>">
            <div id="password_error"></div>
            <script>
              $("#password-signup").keyup(function (){
                var text = $("#password-signup").val();
                var pattern = /^[A-z]+[0-9]+[~`?<>,.;'&":!@#$%^*_+-=]+$/;
                if (!pattern.test(text))
                {
                  $("#password_error").show();
                  $("#password_error").html('<div class="alert alert-danger" role="alert" >Enter Proper Password</div>');
                  res = 4;
                }
                else
                {
                  $("#password_error").hide();
                  res = 1;
                }
              });   
            </script>
          </div>
          <div class="form-element form-checkbox">
            <input id="confirm-terms" type="checkbox" name="confirm" value="yes" class="checkbox">
            <label for="confirm-terms">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></label>
          </div>
          <div class="form-element form-submit">
            <button id="signUp" class="signup" type="submit" name="signup">Sign up</button>
            <button id="goLeft" class="signup off">Log In</button> 
          </div>
        </form>
        <div id="form_error"></div>
        <script>
          $("#signUp").click(function (){
            if (res == 4)
              $("#form_error").html('<div class="alert alert-danger" role="alert" >Enter All The Valid Details</div>');
          });
        </script>
        <?php
        if (isset($_POST["signup"]))
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
              header("Location: ./login.php");
            else
              echo '<script>$("#form_error").html('.'<div class="alert alert-danger" role="alert" >Something Went Wrong</div>'.');</script>';
        }
        ?>
      </div>
    </div>
    <div class="right">
      <div class="content">
        <h2>Login</h2>
        <form id="form-login" method="post" onsubmit="return false;">
          <div class="form-element form-stack">
            <label for="username-login" class="form-label">Username</label>
            <input id="username-login" type="text" name="username" value="<?php echo $_POST["username"]?>">
          </div>
          <div class="form-element form-stack">
            <label for="password-login" class="form-label">Password</label>
            <input id="password-login" type="password" name="passd" value="<?php echo $_POST["passwd"]?>">
            <div id="passwd_error"></div>
            <script>
              $("#password-login").keyup(function (){
                var pass = $("#password-login").val();
                var uname = $("#username-login").val();
                $.ajax({
                    url: 'checkpassword.php',
                    type: 'post',
                    data: {user_name: uname, passwd: pass},
                    success: function(responce){
                      res = responce;
                    }
                });
                if (res == 2)
                {
                  $("#passwd_error").show()
                  $("#passwd_error").html('<div class="alert alert-danger" role="alert" >User Not Found!!!!!</div>');
                }
                else if (res == 1)
                  $("#passwd_error").hide()
              });
              $("#password-login").focusout(function (){
                if (res == 0)
                {
                  $("#passwd_error").show();
                  $("#passwd_error").html('<div class="alert alert-danger" role="alert" >Incorrect Password!!!!!</div>');
                }
                else
                  $("#passwd_error").hide();
              });
            </script>
          </div>
          <div class="form-element form-submit">
            <button id="logIn" class="login" type="submit" name="login">Log In</button>
            <button id="goRight" class="login off" name="signup">Sign Up</button>
            <script>
              $("#logIn").click(function (){
                if (res == 0)
                {
                  $("#passwd_error").show()
                  $("#passwd_error").html('<div class="alert alert-danger" role="alert">Incorrect Password!!!!!</div>');
                }
                else if (res == 2)
                {
                  $("#passwd_error").show()
                  $("#passwd_error").html('<div class="alert alert-danger" role="alert">User Not Found!!!!!</div>');
                }
                else if (res == 1)
                {
                  $("#passwd_error").hide();
                  window.location.replace("../admin/template/index.php");
                }
                else if (res == -1)
                {
                  $("#passwd_error").show()
                  $("#passwd_error").html('<div class="alert alert-danger" role="alert">Enter All The Details!!!!!</div>');
                }
              });
            </script>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/paper.js/0.11.3/paper-full.min.js'></script><script  src="./script.js"></script>
</body>
</html>