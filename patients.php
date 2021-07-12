<!-- include the header -->
<?php
include('./header.php');
include('./dbconnection.php');
?>

<?php

$sql = "SELECT * FROM patient";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

?>
    
<div class="col-sm-9 mt-5" style="padding: 100px;">
    <p class="bg-dark text-white p-2"><b>Patients List</b></p>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Patient Id</th>
                    <th scope="col">Patient Name</th>
                    <th scope="col">Patient Age</th>
                    <th scope="col">Admit Status</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $count = 0;
                while ($row = $result->fetch_assoc()) {
                    $count++;
                    echo  '<tr>';
                    echo  '<th scope="row">' . $count . '</th>';
                    echo  '<td>' . $row['p_name'] . '</td>';
                    echo  '<td>' . $row['p_age'] . '</td>';
                    echo  '<td>' . $row['admit_status'] . '</td>';
                    echo  '<td>';
                    echo  ' <form action="./editpatient.php"  mehod= "POST" class = "d-inline">
                            <input type = "hidden" name = "id" value = '.$row["p_id"].'>
                             <button type="submit" class="btn btn-info mr-3" name="view" value="View"><i    class="fas fa-pen"></i>
                             </button>
                         </form>
                         <form action=""  mehod= "POST" class = "d-inline">
                         <input type = "hidden" name = "id" value = '.$row["p_id"].'>
                            <button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                        </td>
                   </tr>';
                } ?>
            </tbody>
        </table>
    <?php } else {
    echo "0 Results";
} 

if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM patient WHERE p_id = {$_REQUEST['id']}";
    if($conn->query($sql) == TRUE){
        echo '<meta http-equiv = "refresh" content = "0; URL=?deleted"/>';
    }
    else{
        echo "Unable to delete data";
    }
}

?>
</div>
    <!-- </section> -->
    <div>
    <a href="./addpatient.php" class="btn-danger btn box">
        <i class="fas fa-plus fa-2x"></i>
    </a>
    </div>


    
    <!-- include footer -->
    <?php
    include('./footer.php');
    ?>