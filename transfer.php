<?php
include_once 'nav.php';
?>
<style>
    input {
        margin-top: 10px;
        width: 230px;
        height: 40px;
        border-radius: 5px;
        outline: none;
    }

    ::placeholder {
        padding: 10px;
        color: #ff305b;
    }

    button {
        color: #ff305b;
        background: white;
        border-color: #ff305b;
        padding: 14px 20px;
        cursor: pointer;
        width: 100%;

    }

    button:hover {
        color: white;
        background: #ff305b;
        border: none;
        opacity: 0.8;
    }
</style>
<div class="container">
    <div class="row">

        <div class="col-sm-4">
            <div class="card text-center" style="margin-top:76px;background-color:#ff305b;border-radius:10px;color:white">
                <form method="POST">


                    <?php
                    include 'dbconn.php';
                    $ids = $_GET['idtransfer'] - 1;
                    $showquery = "select * from `tbl_cust` where ID=($ids) ";
                    $showdata = mysqli_query($dbc, $showquery);
                    if (!$showdata) {
                        printf("Error: %s\n", mysqli_error($dbc));
                        exit();
                    }
                    $arrdata = mysqli_fetch_array($showdata);

                    ?>

                    <div class="card-body">

                        <h3>Transfer Fromn</h3>



                        <label>Name</label>
                        <input type="text" name="name1" value="<?php echo  $staff[$ids][1]; ?>" required placeholder="Enter your name" /><br><br>
                        <label>Email</label>
                        <input type="text" name="email1" value="<?php echo $staff[$ids][2];; ?>" required placeholder="Enter email id" /><br><br>
                        <label>Amount</label>
                        <input type="text" name="amount1" value="" style="width:210px;" required placeholder="Enter amount" /><br><br>

                    </div>

            </div>
        </div>

        <div class="col-sm-4">
            <div class="card text-center" style="margin-top:60px;height:380px;">
                <div class="card-body">
                    <img src="img/R1111.jfif" style="width:250px;height:220px;margin-top:40px;">
                    <button name="submit">Proceed to Pay</button>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card text-center" style="margin-top:76px;background-color:#ff305b;border-radius:10px;color:white">

                <div class="card-body">
                    <h3>Transfer To</h3>

                    <label>Name</label>
                    <input type="text" name="name2" value="" required placeholder="Enter your name" /><br><br>
                    <label>Email</label>
                    <input type="text" name="email2" value="" required placeholder="Enter email id" /><br><br>



                </div>

            </div>
        </div>

    </div>

</div>
</div>
</form>



<?php

include 'dbconn.php';

if (isset($_POST['submit'])) {


    $Sender_name = $_POST['name1'];
    $Sender_email = $_POST['email1'];
    $Sender = $_POST['amount1'];
    $Receiver_name = $_POST['name2'];
    $Receiver_email = $_POST['email2'];



    $ids = $_GET['idtransfer'];
    $senderquery = "select * from `tbl_cust` where ID=$ids ";
    $senderdata = mysqli_query($dbc, $senderquery);

    if (!$senderdata) {
        printf("Error: %s\n", mysqli_error($dbc));
        exit();
    }
    $arrdata = mysqli_fetch_array($senderdata);

    //receiverquery
    $receiverquery = "select * from `tbl_cust` where Email='$Receiver_email' ";
    $receiver_data = mysqli_query($dbc, $receiverquery);



    if (!$receiver_data) {
        printf("Error: %s\n", mysqli_error($dbc));
        exit();
    }
    $receiver_arr = mysqli_fetch_array($receiver_data);

    $id_receiver = $receiver_arr['Id'];


    if ($arrdata['current_balance'] >= $Sender) {
        $decrease_sender = $arrdata['current_balance'] - $Sender;
        $increase_receiver = $receiver_arr['current_balance'] + $Sender;
        $query = "UPDATE `tbl_cust` SET `ID`=$ids,`current_balance`= $decrease_sender  where `ID`=$ids ";
        $rec_query = "UPDATE`tbl_cust` SET `ID`=$id_receiver,`current_balance`= $increase_receiver where  `ID`=$id_receiver ";
        $res = mysqli_query($dbc, $query);
        $rec_res = mysqli_query($dbc, $rec_query);


        if ($res && $rec_res) {
?>
            <script>
                alert('process Done');
            </script>

        <?php

        } else {
        ?>
            <script>
                alter("Error!");
            </script>

        <?php

        }
    } else {
        ?>
        <script>
            swal("Insufficient Balance", "Transaction Not  Successful!", "warning");
        </script>
<?php

    }
}
?>