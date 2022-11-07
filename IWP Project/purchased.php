<?php
session_start();
ob_start();
if (isset($_SESSION['regno'])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>Purchase History</title>


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
                max-width: 25%;
                margin: 40px auto;
                border-radius: 4px;
                box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
            }



            h1,
            h2 {
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
            <?php
            $regno = $_SESSION['regno'];
            $table = "Transaction";
            $sql = "SELECT * FROM $table WHERE BuyerRegNo = '$regno'";
            $con = mysqli_connect('localhost', 'root', '');
            mysqli_select_db($con, 'iwpproject');

            $result = mysqli_query($con, $sql);
            if (!mysqli_query($con, $sql)) {
                die('Error: ' . mysqli_errno($con));
            }
            while ($data = $result->fetch_assoc()) {
                echo '<div class="form">';
                $bregno = $data['BuyerRegNo'];
                $bookname = $data['BBookName'];
                $seller = $data['SellerRegNo'];
                $price = $data['SePrice'];
                $date = $data['PurchaseDate'];

                $stmt = "<h2>Book Name: {$bookname}</h2>
                        <h2>Seller RegNo: {$seller}</h2>
                        <h2>Price: {$price}</h2>
                        <h2>Time: {$date}</h2>";
                echo $stmt;
                echo "</div>";
            }
            ?>
        </div>

    <?php
}
    ?>