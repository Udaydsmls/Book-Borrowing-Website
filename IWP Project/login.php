<?php
session_start();
ob_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login Page</title>


    <style>
        *,
        *:before,
        *:after {
            box-sizing: border-box;
        }

        html {
            overflow-y: scroll;
        }

        body {
            background: #c1bdba;
            font-family: 'Courier New', Courier, monospace;
        }

        a {
            text-decoration: none;
            color: #1ab188;
            transition: .5s ease;
        }

        a:hover {
            color: #179b77;
        }

        .form {
            background: rgba(19, 35, 47, 0.9);
            padding: 40px;
            max-width: 600px;
            margin: 40px auto;
            border-radius: 4px;
            box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
        }

        .tab-group {
            list-style: none;
            padding: 0;
            margin: 0 0 40px 0;
        }

        .tab-group:after {
            content: "";
            display: table;
            clear: both;
        }

        .tab-group li a {
            display: block;
            text-decoration: none;
            padding: 15px;
            background: rgba(160, 179, 176, 0.25);
            color: #a0b3b0;
            font-size: 20px;
            float: left;
            width: 50%;
            text-align: center;
            cursor: pointer;
            transition: .5s ease;
        }

        .tab-group li a:hover {
            background: #179b77;
            color: #ffffff;
        }

        .tab-group .active a {
            background: #1ab188;
            color: #ffffff;
        }

        .tab-content>div:last-child {
            display: none;
        }

        h1 {
            text-align: center;
            color: #ffffff;
            font-weight: 300;
            margin: 0 0 40px;
        }

        label {
            position: absolute;
            transform: translateY(6px);
            left: 13px;
            color: rgba(255, 255, 255, 0.5);
            transition: all 0.25s ease;
            backface-visibility: hidden;
            pointer-events: none;
            font-size: 22px;
        }

        label .req {
            margin: 2px;
            color: #1ab188;
        }

        label.active {
            transform: translateY(50px);
            left: 2px;
            font-size: 14px;
        }

        label.active .req {
            opacity: 0;
        }

        label.highlight {
            color: #ffffff;
        }

        input,
        textarea {
            font-size: 22px;
            display: block;
            width: 100%;
            height: 100%;
            padding: 5px 10px;
            background: none;
            background-image: none;
            border: 1px solid #a0b3b0;
            color: #ffffff;
            border-radius: 0;
            transition: border-color .25s ease, box-shadow .25s ease;
        }

        input:focus,
        textarea:focus {
            outline: 0;
            border-color: #1ab188;
        }

        textarea {
            border: 2px solid #a0b3b0;
            resize: vertical;
        }

        .field-wrap {
            position: relative;
            margin-bottom: 40px;
        }

        .top-row:after {
            content: "";
            display: table;
            clear: both;
        }

        .top-row>div {
            float: left;
            width: 48%;
            margin-right: 4%;
        }

        .top-row>div:last-child {
            margin: 0;
        }

        .button {
            border: 0;
            outline: none;
            border-radius: 0;
            padding: 15px 0;
            font-size: 2rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .1em;
            background: #1ab188;
            color: #ffffff;
            transition: all 0.5s ease;
            -webkit-appearance: none;
        }

        .button:hover,
        .button:focus {
            background: #179b77;
        }

        .button-block {
            display: block;
            width: 100%;
        }

        .forgot {
            margin-top: -20px;
            text-align: right;
        }

        .topnav {
            overflow: hidden;
            background-color: rgba(19, 35, 47, 0.9);
            margin-top: -8px;
            margin-left: -7px;
            margin-right: -6px;
            box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
        }

        .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .topnav a:active {
            background-color: #1ab188;
            color: white;
        }
    </style>

</head>

<body>

    <div class="topnav">
        <a href="mailto:udaysonawane@gmail.com">Contact</a>
        <a href="https://udaydsmls.github.io/" target="_blank">About</a>
    </div>


    <div class="form">


        <ul class="tab-group">
            <li class="tab active"><a href="#signup">Sign Up</a></li>
            <li class="tab"><a href="#login">Log In</a></li>
        </ul>

        <div class="tab-content">
            <div id="signup">
                <h1>Sign Up for Free</h1>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

                    <div class="top-row">
                        <div class="field-wrap">
                            <label>
                                First Name<span class="req">*</span>
                            </label>
                            <input type="text" name="fname" required autocomplete="off" />
                        </div>

                        <div class="field-wrap">
                            <label>
                                Last Name<span class="req">*</span>
                            </label>
                            <input type="text" name="lname" required autocomplete="off" />
                        </div>
                    </div>

                    <div class="field-wrap">
                        <label>
                            Registration Number<span class="req">*</span>
                        </label>
                        <input type="text" name="regno" required autocomplete="off" />
                    </div>

                    <div class="field-wrap">
                        <label>
                            Email Address<span class="req">*</span>
                        </label>
                        <input type="email" name="email" required autocomplete="off" />
                    </div>

                    <div class="field-wrap">
                        <label>
                            Set A Password<span class="req">*</span>
                        </label>
                        <input type="password" name="pass" required autocomplete="off" />
                    </div>

                    <input type="submit" class="button" name="signup" value="GET STARTED"><br>

                </form>

            </div>

            <div id="login">
                <h1>Welcome Back!</h1>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

                    <div class="field-wrap">
                        <label>
                            Registration Number<span class="req">*</span>
                        </label>
                        <input type="text" required autocomplete="off" name="regnol" />
                    </div>

                    <div class="field-wrap">
                        <label>
                            Password<span class="req">*</span>
                        </label>
                        <input type="password" required autocomplete="off" name="passl" />
                    </div>

                    <p class="forgot"><a href="#">Forgot Password?</a></p>

                    <input type="submit" class="button" name="login" value="LOGIN"><br>

                </form>

            </div>

        </div>
    </div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (htmlspecialchars($_REQUEST['login'])) {
            $regno = htmlspecialchars($_REQUEST['regnol']);
            $pass = htmlspecialchars($_REQUEST['passl']);

            $sql = "SELECT * FROM Registered WHERE RegNumber = '$regno' AND Passwords = '$pass' ";
            $con = mysqli_connect('localhost', 'root', '');
            mysqli_select_db($con, 'iwpproject');
            $cred = mysqli_query($con, $sql);
            mysqli_close($con);
            if ($cred->num_rows != 0) {
                if (isset($_SESSION['regno'])) {
                } else {
                    $_SESSION['regno'] = $regno;
                }
                ob_end_clean();
                header('Location: choice.php');
                die();
            }
        }

        if (htmlspecialchars($_REQUEST['signup'])) {
            $regno = htmlspecialchars($_REQUEST['regno']);
            $pass = htmlspecialchars($_REQUEST['pass']);
            $fname = htmlspecialchars($_REQUEST['fname']);
            $lname = htmlspecialchars($_REQUEST['lname']);
            $email = htmlspecialchars($_REQUEST['email']);

            $sql = "SELECT * FROM Registered WHERE RegNumber = '$regno'";
            $con = mysqli_connect('localhost', 'root', '');
            mysqli_select_db($con, 'iwpproject');

            $cred = mysqli_query($con, $sql);
            if ($cred->num_rows == 0) {
                $sql = "INSERT INTO Registered (RegNumber, FirstName, LastName, Passwords, Email) VALUES ('$regno', '$fname', '$lname', '$pass', '$email')";
                if (!mysqli_query($con, $sql)) {
                    die('Error: ' . mysqli_errno($con));
                } else {
                    if (isset($_SESSION['regno'])) {
                    } else {
                        $_SESSION['regno'] = $uname;
                    }
                    mysqli_close($con);
                    ob_end_clean();
                    header('Location: choice.php');
                    die();
                }
            }
            mysqli_close($con);
        }
    }
    ?>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script>
        $('.form').find('input, textarea').on('keyup blur focus', function(e) {

            var $this = $(this),
                label = $this.prev('label');

            if (e.type === 'keyup') {
                if ($this.val() === '') {
                    label.removeClass('active highlight');
                } else {
                    label.addClass('active highlight');
                }
            } else if (e.type === 'blur') {
                if ($this.val() === '') {
                    label.removeClass('active highlight');
                } else {
                    label.removeClass('highlight');
                }
            } else if (e.type === 'focus') {

                if ($this.val() === '') {
                    label.removeClass('highlight');
                } else if ($this.val() !== '') {
                    label.addClass('highlight');
                }
            }

        });

        $('.tab a').on('click', function(e) {

            e.preventDefault();

            $(this).parent().addClass('active');
            $(this).parent().siblings().removeClass('active');

            target = $(this).attr('href');

            $('.tab-content > div').not(target).hide();

            $(target).fadeIn(600);

        });
    </script>

</body>

</html>