<?php
session_start();
ob_start();
if (isset($_SESSION['regno'])) { ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>Products's Page</title>


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

        <div class="row">
            <div class="form" style="float: left; max-width: 35%;">

                <?php


                $table = 'Books';
                $sregno = $_SESSION['sregno'];
                $nameB = $_SESSION['nameB'];

                $sql = "SELECT * FROM $table WHERE RegNO = '$sregno' AND BookName = '$nameB'";

                $con = mysqli_connect('localhost', 'root', '');
                mysqli_select_db($con, 'iwpproject');

                $result = mysqli_query($con, $sql);

                $data = $result->fetch_assoc();

                $name = $data['BookName'];
                $author = $data['Author'];
                $rprice = $data['RPrice'];
                $sprice = $data['SPrice'];
                $edition = $data['Edition'];
                $yop = $data['YoP'];
                $img = $data['imgDir'];
                $regno = $data['RegNo'];
                $review = $data['Review'];

                echo '<p style="text-align: center;"> <img src="' . $img . '" style="width: 100%; height: 100%;" alt=""></p>';
                ?>

            </div>

            <div class="form" style="float: right; max-width: 75%; width: 45%;">
                <ul class="tab-group">
                    <li class="tab active"><a href="#Buy">Buying Details</a></li>
                    <li class="tab"><a href="#Rent">Renting Details</a></li>
                </ul>
                <?php
                $sellerName = "SELECT * FROM Registered WHERE RegNumber = '$regno'";
                $result = mysqli_query($con, $sellerName);

                $data = $result->fetch_assoc();

                $fname = $data['FirstName'];
                $lname = $data['LastName'];

                $stmt = "<h1>{$name}</h1>
                <h2>{$author}</h2>
                <h2>Edition: {$edition}</h2>
                <h2>Year of Publication: {$yop}</h2>
                <h2>Seller' Name: {$fname} {$lname}</h2>
                <h2>Ratings: {$review}</h2>";
                echo $stmt;
                ?>

                <div class="tab-content">
                    <div id="Buy"><?php
                                    echo "<h2>Price(in RS): " . $sprice . "</h2>"; ?>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <input type="submit" class="button button-block" name="buy" value="BUY" style="margin: 7px;">
                        </form>

                    </div>

                    <div id="Rent"><?php
                                    echo "<h2>Price(in RS): " . $rprice . "</h2>"; ?>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <input type="submit" class="button button-block" name="rent" value="RENT" style="margin: 7px;">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (htmlspecialchars($_REQUEST['buy'])) {
        $bregno = $_SESSION['regno'];
        $sql = "INSERT INTO Transaction (BuyerRegNo, BBookName, SellerRegNo, SePrice) 
            VALUES('$bregno','$name','$regno','$sprice')";
        mysqli_query($con, $sql);

        ob_end_clean();
        header('Location: choice.php');
        mysqli_close($con);
        die();
    }

    if (htmlspecialchars($_REQUEST['rent'])) {
        $bregno = $_SESSION['regno'];
        $sql = "INSERT INTO Rented (RenterRegNo, RBookName, ProviderRegNo, RePrice) 
            VALUES('$bregno','$name','$regno','$rprice')";
        mysqli_query($con, $sql);

        ob_end_clean();
        header('Location: choice.php');
        mysqli_close($con);
        die();
    }
}



    ?>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script>
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