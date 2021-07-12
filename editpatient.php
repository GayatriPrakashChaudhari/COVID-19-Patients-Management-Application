<!-- include the header -->
<?php
include('./header.php');
include('./dbconnection.php');


// Update the data from database
if (isset($_REQUEST['reupdate'])) {
    // checking for empty fields

    if (($_REQUEST['p_name'] == "") || ($_REQUEST['p_age'] == "") || ($_REQUEST['p_income'] == "") || ($_REQUEST['admit_status'] == "")|| ($_REQUEST['admit_date'] == "")) {

        $msg = '<div class = "alert alert-warning col-sm-6 ml-5 mt-2" role = "alert">"Fill All Fields"</div>';
    } else {
        $p_id = $_REQUEST['p_id'];
        $p_name = $_REQUEST['p_name'];
        $p_age = $_REQUEST['p_age'];
        $p_income = $_REQUEST['p_income'];
        $admit_status = $_REQUEST['admit_status'];
        $admit_date = $_REQUEST['admit_date'];


        $sql = "UPDATE patient SET p_id = '$p_id', p_name = '$p_name', p_age = '$p_age', p_income = '$p_income', admit_status = '$admit_status', admit_date = '$admit_date' WHERE p_id = '$p_id' ";

        if ($conn->query($sql) == TRUE) {
            $msg = '<div class = "alert alert-success col-sm-6 ml-5 mt-2" role="alert>p Added Successfully</div>';
            echo 'Updated Successfully';
        } else {
            $msg = '<div class = "alert alert-danger col-sm-6 ml-5 mt-2" role = "alert">Unable to add p</div>';
            echo 'Unable to Update';
        }
    }
}

?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Update Patient Detail</h3>

    <?php

    if (isset($_REQUEST['view'])) {
        $sql = "SELECT * FROM patient WHERE p_id = {$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }

    ?>


    <style>
        body {
            margin-top: 150px;
            margin-left: 200px;
        }

        form {
            border: 2px solid black;
            padding: 50px;
            padding-left: 100px;
            /* padding-right: 50px; */
            width: 280%;
            display: inline-block;
            /* margin-left: 20%; */
            /* margin-right: 10%; */
            text-align: left;
            /* background-color: lightgray; */
            /* word-spacing: 30%; */
            font-weight: bold;
        }

        input {
            width: 160%;
        }

        input[type=text] {
            font-weight: bold;
            border: 1px solid black;
            width: 80%;
        }


        h3 {
            text-align: center;
            margin-left: 100%;
            margin-right: 100%;
            margin: auto;
            font-weight: bold;
        }
    </style>

    <body>

        <div class="col-sm-9 mt-5">
            <div class="row">
                <div class="col-sm-6">

                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="p_id">Patient Id</label>
                            <input type="text" class="form-control" id="p_id" name="p_id" value="<?php if (isset($row['p_id'])) {echo $row['p_id'];} ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="p_name">Patient Name</label>
                            <input type="text" class="form-control" id="p_name" name="p_name" value="<?php if (isset($row['p_name'])) { echo $row['p_name']; } ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="p_age">Patient Age</label>
                            <input type="text" class="form-control" id="p_age" name="p_age" value="<?php if (isset($row['p_age'])) { echo $row['p_age']; } ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="p_income">Patient Income</label>
                            <input type="text" class="form-control" id="p_income" name="p_income" value="<?php if (isset($row['p_income'])) {echo $row['p_income']; } ?>" readonly>
                       </div>
                        <div class="form-group">
                            <label for="admit_status">Patient Admit Status</label>
                            <input type="text" class="form-control" id="admit_status" name="admit_status" value="<?php if (isset($row['admit_status'])) { echo $row['admit_status']; } ?>">
                        </div>
                        <div class="form-group">
                            <label for="admit_date">Patient Admit Date</label>
                            <input type="text" class="form-control" id="admit_date" name="admit_date" value="<?php if (isset($row['admit_date'])) { echo $row['admit_date']; } ?>"readonly>
                        </div>
    <br>
    <div class="text-center">
    <button class="btn btn-primary" type="submit" name="reupdate" id="reupdate">Update</button>
    <a href="./patients.php" class="btn btn-secondary">Close</a>
    </div>
    <?php
    if (isset($smg)) {
   echo '<small>Updated Successfully</small>';
   } ?>
 </form>
 </div>
</div>
</div>
</body>

    <!-- include footer -->
    <?php
    include('./footer.php');
    ?>