<!-- include the header -->
<?php
if(!isset($_SESSION)){
    session_start();
}
include('./dbconnection.php');
include('./header.php');

?>

<style>
  body{
      padding-left: 3%;
      margin-top: 20px;
      margin: auto;
  }
</style>
<body>
    
<div class="col-sm-9 mt-5" style="padding-top: 100px;">
  <form action="" class="d-print-none" method="post">
     <div class="form-row">
        <div class="form-group col-md-2">
           <input type="date" class="form-control" id="startdate" name="startdate">
        </div><span>to</span>
        <div class="form-group col-md-2">
           <input type="date" class="form-control" id="enddate" name="enddate">
        </div>
        <div class="form-group"><br>
          <input type="submit" name="searchsubmit" value="search" class="btn btn-secondary">
        </div>
     </div>
  </form>

  <?php
       if(isset($_REQUEST['searchsubmit'])){
           $startdate = $_REQUEST['startdate'];
           $enddate = $_REQUEST['enddate'];

           $sql = "SELECT * FROM patient WHERE admit_date BETWEEN '$startdate' AND '$enddate' ";
           $result = $conn->query($sql);
           if($result->num_rows > 0){
               echo'<p class= "bg-dark text-white p-2 mt-4">All Patients Details</p>
               <table class="table">
               <thead>
               <tr>
               <th scoope="col">Patient Id</th>
               <th scoope="col">Patient Name</th>
               <th scoope="col">Patient Age</th>
               <th scoope="col">Patient Admit Date</th>
               <th scoope="col">Status</th>
               </tr>
               </thead>
               <tbody>';
               $count = 0;
               while($row = $result->fetch_assoc()){
                   $count++;
                   echo'<tr>
                   <th scoope="row">'.$count.'</th>
                   <td>'.$row["p_name"].'</td>
                   <td>'.$row["p_age"].'</td>
                   <td>'.$row["admit_date"].'</td>
                   <td>'.$row["admit_status"].'</td>
                   </tr>';
               }
               echo'<tr>
               <td><form class="d-print-none"><input class="btn btn-danger" type="submit" value="Print" onclick="window.print()"></form></td></tr></tbody></table>';
           }else{
               echo "<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'>No Records Found</div>";
           }
       }
  ?>
</div>
</body>
<!-- include footer -->
<?php
include('./footer.php');
?>