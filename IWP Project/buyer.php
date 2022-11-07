<?php
session_start();
ob_start();
if (isset($_SESSION['regno'])) { ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>Buyer's Page</title>


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
                min-width: 25%;
                max-width: 25%;
                margin: 40px 60px;
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

            h1,
            h2 {
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

            .topnav a.user {
                float: right;
                color: whitesmoke;
            }

            .row {
                display: flex;
                flex-wrap: wrap;
                /* equal height of the children */
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

        <?php
        $table = 'Books';
        $user = $_SESSION['regno'];
        $sql = "SELECT * FROM $table WHERE RegNo != '$user'";
        ?>

        <!-- <div class="searchbox form" style="max-width: 70%; margin: 40px auto;">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div>
                    <input type="text" placeholder="Search..." name="search" style="width: 80%; float: left; margin-top: -20px;">
                </div>
                <div>
                    <input type="submit" class="button button-block" value="Search" name="searchs" style="width: 20%; float: left; height: 37.5px; font-size: 1rem; margin-top: -20px;">
                </div>
            </form>
        </div> -->
        <?php
        // if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //     if (htmlspecialchars($_REQUEST['searchs'])) {
        //         $value = htmlspecialchars($_REQUEST['search']);

        //         $sql = "SELECT * FROM $table WHERE BookName = '$value'";
        //     }
        // } 
        ?>


        <div class="row">
            <?php
            $con = mysqli_connect('localhost', 'root', '');
            mysqli_select_db($con, 'iwpproject');

            $result = mysqli_query($con, $sql);

            $i = 0;
            while ($data = $result->fetch_assoc()) {
                echo '<div class="form" style="float: left;">';
                $name = $data['BookName'];
                $author = $data['Author'];
                $rprice = $data['RPrice'];
                $sprice = $data['SPrice'];
                $img = $data['imgDir'];
                $regno = $data['RegNo'];

                $stmt =  " <h1>{$name}</h1>
            <h2>{$author}</h2>
            <h2>Rent(Rs): {$rprice}</h2>
            <h2>Price(Rs): {$sprice}</h2>";
                echo '<p style="text-align: center;"><img src="' . $img . '" style="width: 90%; height: 100%;" alt=""></p>';
                echo $stmt;

            ?>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <?php
                        echo '<input type="submit" class="button" name="submit' . $i . '" value="Details">' ?>
                    </div>
                </form>

            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (htmlspecialchars($_REQUEST['submit' . $i])) {
                        $_SESSION['sregno'] = $regno;
                        $_SESSION['nameB'] = $name;
                        ob_end_clean();
                        mysqli_close($con);
                        header('Location: product.php');
                        die();
                    }
                }
                $i = $i + 1;

                echo '</div>';
            }
            ?>
        </div>
    <?php } ?>


    </body>

    </html>