<?php
include('./header.php');
include('./dbconnection.php');

if(isset($_REQUEST['addPatient'])){
    // checking for empty fields

    if(($_REQUEST['p_name'] == "") || ($_REQUEST['p_age'] == "") || ($_REQUEST['p_income'] == "") || ($_REQUEST['admit_status'] == "")|| ($_REQUEST['admit_date'] == "")){

        $msg = '<div class = "alert alert-warning col-sm-6 ml-5 mt-2" role = "alert">"Fill All Fields"</div>';
    }
    else{

        $p_name = $_REQUEST['p_name'];
        $p_age = $_REQUEST['p_age'];
        $p_income = $_REQUEST['p_income'];
        $admit_status = $_REQUEST['admit_status'];
        $admit_date = $_REQUEST['admit_date'];

        $sql = "INSERT INTO patient (p_name, p_age, p_income, admit_status, admit_date) VALUES ('$p_name','$p_age','$p_income','$admit_status','$admit_date')";

        if($conn->query($sql) == TRUE){
            $msg = '<div class = "alert alert-success col-sm-6 ml-5 mt-2" role = "alert">p Added Successfully</div>';
            echo 'Patient Added Successfully';
        }else{
            $msg = '<div class = "alert alert-danger col-sm-6 ml-5 mt-2" role = "alert">Unable to add p</div>';
            echo 'Unable to add Patient';
        }
    }
}


?>

<style>
   body{
       margin-top: 150px; 
   }
   
   form{
       border: 2px solid black;
       padding: 20px;
       padding-left: 50px;
       padding-right: 20px;
       width: 100%; 
       display: inline-block;
       margin-left: 20%; 
       margin-right: 10%;
       text-align: left;
       font-weight: bold;
   }

   input{
       width: 80%;
   }

   input[type=text]{
       font-weight: bold;
       border: 1px solid black;
       width: 80%;
   }

   
   h3{
       text-align: center;
       margin-left: 100%;
       margin-right: 100%;
       margin: auto;
       font-weight: bold;
   }
</style>

<body>
<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Fill New Patient Details</h3>
    <form action="" method="POST" enctype="multipart/form-data">
       <div class="form-group">
           <label for="p_name">Patient Name</label>
           <input type="text" class="form-control" id="p_name" name="p_name">
       </div>
       <div class="form-group">
           <label for="p_age">Paitent Age</label>
           <textarea class="form-control" name="p_age" id="p_age" rows="2" style="width: 80%; border: 1px solid black;"></textarea>
       </div>
       <div class="form-group">
           <label for="p_income">Income</label>
           <input type="text" class="form-control" id="p_income" name="p_income">
       </div>
       <div class="form-group">
           <label for="admit_status">Admit Status</label>
           <input type="text" class="form-control" id="admit_status" name="admit_status" placeholder="eg. Positive,Negative,Discharged">
       </div>
       <div class="form-group">
           <label for="admit_date">Admit Date</label>
           <input type="text" class="form-control" id="admit_date" name="admit_date">
       </div>
       <div class="text-center"><br>
           <button class="btn btn-primary" type="submit" name="addPatient" id="addPatient">Submit</button>
           <a href="patients.php" class="btn btn-secondary">Close</a>
       </div>
       <?php
       if(isset($smg)){
       echo '<small>Patient Added Successfully</small>';
       }?>
   </form>
</div>

</body>
<!-- include footer -->
<?php
include('./footer.php');
?>