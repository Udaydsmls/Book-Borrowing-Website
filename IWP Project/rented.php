<?php
session_start();
ob_start();
if (isset($_SESSION['regno'])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>Rent History</title>


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
            $table = "Rented";
            $sql = "SELECT * FROM $table WHERE RenterRegNo = '$regno'";
            $con = mysqli_connect('localhost', 'root', '');
            mysqli_select_db($con, 'iwpproject');

            $result = mysqli_query($con, $sql);
            if (!mysqli_query($con, $sql)) {
                die('Error: ' . mysqli_errno($con));
            }
            $i = 0;
            while ($data = $result->fetch_assoc()) {
                echo '<div class="form">';
                $bregno = $data['RenterRegNo'];
                $bookname = $data['RBookName'];
                $seller = $data['ProviderRegNo'];
                $price = $data['RePrice'];
                $date = $data['RentDate'];
                $reviewed = $data['Reviewd'];

                $stmt = "<h2>Book Name: {$bookname}</h2>
                        <h2>Provider RegNo: {$seller}</h2>
                        <h2>Rent: {$price}</h2>
                        <h2>Time: {$date}</h2>";
                echo $stmt;
                if ($reviewed) {
            ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                        <div class="top-row">
                            <div class="field-wrap" style="width: 35%;">
                                <label>
                                    Rate<span class="req">*</span>
                                </label>
                                <input type="number" min=0 max=5 name="rate" />
                            </div>

                            <div class="field-wrap" style="width: 55%; float: right;">
                                <label>
                                    <span class="req">*</span>
                                </label>
                                <?php echo '<input type="submit" value="submit" name="submit'.$i.'" class="button" />' ?>
                            </div>
                        </div>
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (htmlspecialchars($_REQUEST['submit'.$i])) {
                            $rating = htmlspecialchars($_REQUEST['rate']);
                            $sql = "SELECT * FROM Books WHERE RegNo = '$seller' AND BookName = '$bookname'";
                            $result = mysqli_query($con, $sql);

                            $data = $result->fetch_assoc();

                            $rate = $data['Review'];
                            $num = $data['NumReviews'];

                            $rate = $rate * $num;

                            $rate = $rate + $rating;
                            $num += 1;

                            $rate = $rate / $num;

                            $sql = "UPDATE Rented
                        SET 
                            Reviewd = 0
                        WHERE
                            RenterRegNo = '$bregno' AND RBookName = '$bookname' AND ProviderRegNo = '$seller'";

                            if (!mysqli_query($con, $sql)) {
                                die('Error: ' . mysqli_errno($con));
                            }
                            $sql = "UPDATE Books 
                            SET 
                                Review = '$rate',
                                NumReviews = '$num'
                            WHERE
                                RegNo = '$seller' AND BookName = '$bookname'";

                            mysqli_query($con, $sql);
                            ob_end_clean();
                            header('Location: choice.php');
                            die();
                        }
                    }
                }
                echo "</div>";
                $i += 1;
            }

                ?>
        </div>

    <?php
}
    ?>