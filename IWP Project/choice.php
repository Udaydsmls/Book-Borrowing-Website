<?php
session_start();
ob_start();
if (isset($_SESSION['regno'])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>Choice Page</title>


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


            .form {
                background: rgba(19, 35, 47, 0.9);
                padding: 40px;
                max-width: 70%;
                margin: 40px auto;
                border-radius: 4px;
                box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
            }



            h1 {
                text-align: center;
                color: #ffffff;
                font-weight: 300;
                margin: 0 0 40px;
            }


            .button,
            .logout {
                border: 0;
                outline: none;
                border-radius: 4px;
                padding: 15px 30px;
                font-size: 1.5rem;
                font-weight: 400;
                text-transform: uppercase;
                text-align: center;
                letter-spacing: .1em;
                background: #1ab188;
                color: #ffffff;
                transition: all 0.5s ease;
                -webkit-appearance: none;
            }

            .logout {
                background: #ff4860;
            }

            .logout:hover,
            .logout:focus {
                background: #f00048;
            }


            .button:hover,
            .button:focus {
                background: #179b77;
            }

            .button-block {
                display: block;
                width: 100%;
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

            .topnav a.active {
                background-color: #1ab188;
                color: white;
            }

            .topnav a.user {
                float: right;
                color: whitesmoke;
            }
        </style>

    </head>

    <body>
        <div class="topnav">
            <a href="choice.php">Home</a>
            <a href="graph.php">Graphs</a>
            <a href="mailto:udaysonawane@gmail.com">Contact</a>
            <a href="https://udaydsmls.github.io/" target="_blank">About</a>
            <?php echo '<a class="user">' . $_SESSION['regno'] . '</a>' ?>
            <a href="purchased.php" class="user">Purchased</a>
            <a href="rented.php" class="user">Rented</a>
        </div>



        <div class="form">
            <h1>What do you want to do Today?</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <input type="submit" class="tab button button-block" name="Buy" value="Buy a book?"><br>
                <input type="submit" class="tab button button-block" name="Sell" value="Sell a book?"><br>
                <input type="submit" class="tab button button-block" name="Request" value="Request a book?"><br>
                <input type="submit" class="logout button-block" name="logout" value="LOG OUT">
            </form>

        </div>

    <?php
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (htmlspecialchars($_REQUEST['logout'])) {
        ob_end_clean();
        session_destroy();
        header('Location: login.php');
        die();
    }
    if (htmlspecialchars($_REQUEST['Buy'])) {
        ob_end_clean();
        header('Location: buyer.php');
        die();
    }
    if (htmlspecialchars($_REQUEST['Sell'])) {
        ob_end_clean();
        header('Location: seller.php');
        die();
    }
    if (htmlspecialchars($_REQUEST['Request'])) {
        ob_end_clean();
        header('Location: request.php');
        die();
    }
}
    ?>
    </body>

    </html>