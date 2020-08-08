<?php include "includes/admin_header.php"; ?>
    <div id="wrapper">

        <!-- Navigation -->
    <?php include "includes/admin_navigation.php";  ?>

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
                       
                        case 'add_patient':
                        include "includes/add_patient.php"  ;
                        break;
                               
                        case 'edit_patient':
                        include "includes/edit_patient.php";
                        break;
                    
                        default:
                        include "includes/view_all_patient.php"; 
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
   <?php include "includes/admin_footer.php";  ?>