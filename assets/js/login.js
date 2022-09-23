<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div id="passwd_error"></div>
                    <script>
                        $("#pass").keyup(function (){
                        var pass = $("#pass").val();
                        var uname = $("#user").val();
                        $.ajax({
                            url: 'assets/js/checkpassword.php',
                            type: 'post',
                            data: {username: uname, password: pass},
                            success: function(response){
                                $("#passwd_error").html(response);
                            }
                        });
                    });
                    </script>
                    <div id="user_error"></div>
                    <script>
                        $("#user").keyup(function (){
                        var uname = $("#user").val();
                        $.ajax({
                            url: 'assets/js/checkusername.php',
                            type: 'post',
                            data: {username: uname},
                            success: function(response){
                                $("#user_error").html(response);
                            }
                        });
                    });   
                    </script>