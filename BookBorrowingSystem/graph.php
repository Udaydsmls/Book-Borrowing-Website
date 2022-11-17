<?php

session_start();
ob_start();
if (isset($_SESSION['regno'])) {

    $sql = "SELECT ReqBookName,COUNT(*) FROM Requested
GROUP BY ReqBookName ORDER BY COUNT(*) DESC";

    $con = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($con, 'bookdatabase');

    $result = mysqli_query($con, $sql);
    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_errno($con));
    }
    $chart_data = '';
    while ($data = $result->fetch_assoc()) {
        $chart_data .= "{Book:'" . $data["ReqBookName"] . "',
        Number_of_Request:" . $data["COUNT(*)"] . "},";
    }
    $chart_data = substr($chart_data, 0, -1);
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Graphs for Books</title>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
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



            h1,
            h2,
            h3 {
                text-align: center;
                color: #ffffff;
                font-weight: 500;
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

        <div class="form" style="width:900px;">
            <h1 align="center">Requested Books</h1>
            <div id="chart"></div>
        </div>
    <?php } ?>
    </body>

    </html>

    <script>
        Morris.Bar({
            element: 'chart',
            data: [<?php echo $chart_data; ?>],
            fillOpacity: 0.4,
            xkey: 'Book',
            ykeys: ['Number_of_Request'],
            barColors: ['#1ab188'],
            hideHover: 'auto',
            stacked: true
        });
    </script>