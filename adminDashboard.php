<?php
if(!isset($_SESSION)){
    session_start();
}
include('./dbconnection.php');
include('./header.php');

$sql = "SELECT * FROM patients";
$result = $conn->query($sql);
$totalsold = $result->num_rows;
?>

<!-- table -->
<div class="col-sm-9 mt-5" style="padding: 100px;">
       <table class="table">
            <thead>
                <tr>
                <th scoope="col">Patient Id</th>
               <th scoope="col">Patient Name</th>
               <th scoope="col">Patient Age</th>
               <th scoope="col">Patient Admit Date</th>
               <th scoope="col">Patient Admit Status</th>

                </tr>
            </thead>
            <tbody>
    <p class="bg-dark text-white p-2" style="padding: 8rem;"><b>Patients Details</b></p>
    <?php
    $sql = "SELECT * FROM patient";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
    echo' ';
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
               echo '</tbody>
               </table>';
            }else{
                echo"0 Result";
            }
            
if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM patients WHERE p_id = {$_REQUEST['id']}";
    if($conn->query($sql) == TRUE){
        echo '<meta http-equiv = "refresh" content = "0; URL=?deleted"/>';
    }
    else{
        echo "Unable to delete data";
    }
}

?>
</div>
</div>
</div>
</body>

<?php
include('./footer.php');
?>