<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>O/P from cURL</h1>

    <div class="container">
        <div class="login-form" id="PersonalLogin">
            <form action="personal_login.php" method="post">
                <center>
                    <h2>Login</h2>
                </center>

                <div>                   
                    <label>Email:</label>
                    <input type="email" name="PEmail" placeholder="Enter your email here!" required>
                </div>
                <br>

                <div>                  
                    <label>Password:</label>
                    <input type="password" name="PersonalPass" placeholder="Enter your password here!" required>
                </div>
                <br>

                <div>
                    <button type="submit" name="login_submit">Login</button>
                </div>
                <br>

                <div>
                    <button onclick="SwitchSignup()" type="button">SignUp!</button>
                </div>
            </form>
        </div>

        <div class="signup-form" id="PersonalSignup">
            <form action="personal_signup.php" method="post" enctype="multipart/form-data">
                <center>
                    <h2>Sign Up</h2>
                </center>

                <div>
                    Name : <input class="input" type="text" name="PersonalName" id="" required placeholder="Enter your Name here!">
                </div>
                <br>

                <div>
                    <label>Email:</label>
                    <input type="email" name="newPEmail" id="newPEmail" placeholder="Enter your email here!" required>
                </div>

                <br>

                <div>
                    LinkedIn : <input class="input" type="url" name="LinkedIn" id="" placeholder="LinkedIn link!">
                </div>
                <br>

                <div>
                    Choose profile Image : <input type="file" name="image" id="">
                </div>
                <br>

                <div>
                    <label>Password:</label>
                    <input type="password" name="newPersonalPass" placeholder="Enter password here!" required>
                </div>
                <br>

                <div>
                    <button type="submit" name="signup_btn">Sign Up</button>
                </div>
                <br>

                <div>
                    <button onclick="SwitchLogin()" type="button">Login!</button>
                </div>
            </form>
        </div>
    </div>




    <script src="function.js"></script>
</body>

</html>