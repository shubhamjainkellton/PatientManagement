<?php  include "includes/admin_header.php";?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php  include "includes/admin_navigation.php";?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            WELCOME TO PMS
                            <small><?php echo $_SESSION['role']; ?></small>
                        </h1>
                        
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="admin_dashboard.php">Dashboard</a>
                            </li>
                            
                        </ol>
                        <h3><b><u>Patients Medical History</u></b></h3>
<table class="table table-bordered table-hover">
  <thead>
  <tr>
  <th>Patient Id</th>
  <th>Patient Name</th>      
  <th>Medical Id</th>    
  <th>Attendee Doctor</th>
  <th>Specialisation</th>    
  <th>Bloodpressure(mm Hg)</th>
  <th>Weight(Kg)</th>
  <th>Temperature(&#8457;)</th>
  <th>Prescription</th>      
  <th>Date</th>      
 </tr>
 </thead>
 <tbody> 
   
<?php
     
$query = "SELECT * FROM medical_history RIGHT JOIN patients ON medical_history.p_id=patients.p_id";     
$pres_query = mysqli_query($connection, $query);
confirmQuery($pres_query); 
while($row = mysqli_fetch_assoc($pres_query)){
    
    $p_id            = protect($row['p_id']);
    $p_name          = protect($row['p_name']);
    $m_id            = protect($row['m_id']);
    $p_doc_name      = protect($row['p_doc_name']);
    $specialisation  = protect($row['p_specialisation']);
    $bloodpressure   = protect($row['bloodpressure']);
    $weight          = protect($row['weight']);
    $temperature     = protect($row['temperature']);
    $prescription    = protect($row['prescription']);
    $date            = date('d-m-y');
      
     echo "<tr>";   
     echo "<td>$p_id</td>";
     echo "<td>$p_name</td>";
     echo "<td>$m_id</td>";
     echo "<td>$p_doc_name</td>";
     echo "<td>$specialisation</td>";                            
     echo "<td>$bloodpressure</td>";
     echo "<td>$weight</td>";
     echo "<td>$temperature</td>";
     echo "<td>$prescription</td>";
     echo "<td>$date</td>";
     echo "</tr>";
}
?>     
 </tbody>
 </table>
                             
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
   <?php include "includes/admin_footer.php";  ?>