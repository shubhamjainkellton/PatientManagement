<?php  include "includes/doctor_header.php";?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php  include "includes/doctor_navigation.php";?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            WELCOME TO PMS
                            <small><?php echo $_SESSION['role']; ?></small>
                        </h1>
   


<?php
                     
if(isset($_POST['submit'])){

     $search = $_POST['search'];


    $query = "SELECT * FROM patients WHERE p_doc_name='{$_SESSION['name']}' AND p_specialisation='{$_SESSION['specialisation']}' AND p_name LIKE '%$search%'";
    $search_query = mysqli_query($connection, $query);

                if(!$search_query) {

                    die("QUERY FAILED" . mysqli_error($connection));

                }

                $count = mysqli_num_rows($search_query);

                if($count == 0) {

                    echo "<h1> NO RESULT</h1>";

                } else {  

    

    while($row = mysqli_fetch_assoc($search_query)) {
       
    $p_aadhar        = protect($row['p_aadhar']);
    $p_name          = protect($row['p_name']);
    $p_age           = protect($row['p_age']);
    $p_gender        = protect($row['p_gender']);
    $p_contact       = protect($row['p_contact']);
    $p_address       = protect($row['p_address']);
    $p_email         = protect($row['p_email']);
    $p_doc_name      = protect($row['p_doc_name']);
    $p_specialisation = protect($row['p_specialisation']);
    $p_reg_date      = date('d-m-y');
     
        ?>

<table class="table table-bordered table-hover">
 <thead>
     <tr><h4><b>Name:</b>&nbsp;<?php echo $p_name ?></h4> </tr><br>
     <tr><h4><b>Age:</b>&nbsp;<?php echo $p_age ?></h4> </tr><br>
     <tr><h4><b>Gender:</b>&nbsp;<?php echo $p_gender?></h4> </tr><br>
     <tr><h4><b>Aadhar NO.:</b>&nbsp;<?php echo $p_aadhar ?></h4>   </tr><br>
     <tr><h4><b>Contact No.</b>&nbsp;<?php echo $p_contact ?></h4>   </tr><br>
     <tr><h4><b>Address:</b>&nbsp;<?php echo $p_address ?></h4>   </tr><br>
     <tr><h4><b>Attendee Doctor:</b>&nbsp;<?php echo $p_doc_name ?></h4>   </tr><br>
     <tr><h4><b>Specilisation:</b>&nbsp;<?php echo $p_specialisation ?></h4>   </tr><br>
     <tr><h4><b>Date:</b>&nbsp;<?php echo $p_reg_date ?></h4>   </tr><br>
</thead>
 </table>

<form action ="index.php"  method="post">                      
<div clsss="form-group"> 
   <input class="btn btn-primary" type="submit" value="Dashboard"> 
</div>                        
</form>                         
<?php
       }
      }
}
       
?>  
                        
                        
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
    <?php  include "includes/doctor_footer.php";?>                        