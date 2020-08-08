<?php include "includes/doctor_header.php"; ?>
    <div id="wrapper">

        <!-- Navigation -->
    <?php include "includes/doctor_navigation.php";  ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                       <h1 class="page-header">
                            WELCOME TO PMS
                            <small><?php echo $_SESSION['role'] ?></small>
                        </h1> 
                        <?php  
                        
                        if(isset($_GET['source'])){
                         $source = $_GET['source'];   
                        }
                        else{
                            $source='';
                        }
                       switch($source){
                       
                        case 'add_pres':
                        include "includes/add_pres.php"  ;
                        break;
                               
                        case 'edit_pres':
                        include "includes/edit_pres.php";
                        break;
                    
                        default:
                        include "includes/view_all_patients.php"; 
                        break;       
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
   <?php include "includes/doctor_footer.php";  ?>