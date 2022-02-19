<html>

<head>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .navbar .main_div {
            width: 100%;
            height: 100vh;

        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .display_table {
            width: 100vw;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
        }

        .center_div {
            width: 90vw;
            height: 80vh;
            background-image: url('images/2.jpg');
            background-repeat: no-repeat;
            background-size: 100%;
            padding: 20px 0 0 0;
            box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.03);
            border-radius: 10px;
            margin-left: 30px;
        }

        h1 {
            font-size: 18px;
            color: #f2f2f2;
            text-align: center;
            margin-top: -20px;
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            background-color: black;
            box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.03);
            border-radius: 10px;
            border-collapse: collapse;
            table-layout: fixed;
            opacity: 0.7;
            color: #F7CC1A;
            font-weight: bold;
            margin: auto;
        }

        th,
        td {
            border: 1px solid #f2f2f2;
            padding: 8px 30px;
            text-align: center;
            opacity: 0.9;
            color: #ff305b;
        }

        th {
            text-transform: uppercase;
            font-weight: 500;
        }

        td {
            font-size: 13px;
        }
    </style>
</head>

<body>

    <?php
    include_once  'nav.php';
    ?>

    <div class="main_div">




        <div class="display_table">
            <h1>Our Customers </h1>
            <div class="center_div">
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Current Amount</th>

                                <th colspan="2">operation</th>
                            </tr>
                        </thead>
                        <tbody>
                </div>
                <?php
                include 'dbconn.php';

                $numofrows = mysqli_num_rows($res);

                for ($i = 0; $i < $numofrows; $i++) {
                ?>
                    <tr>
                        <td><?php echo $staff[$i][0]; ?></td>
                        <td><?php echo $staff[$i][1]; ?></td>
                        <td><?php echo $staff[$i][2]; ?></td>
                        <td><?php echo $staff[$i][3]; ?></td>
                        <td><a href="transfer.php?idtransfer=<?php echo $staff[$i][0]; ?>"><i class=" fa fa-user-circle large" aria-hidden="true" style="color:#04FB73;"></i></a></td>
                    </tr>
                <?php
                }
                ?>


                </tbody>
                </table>
            </div>

        </div>

    </div>
    </div>

</body>

</html>