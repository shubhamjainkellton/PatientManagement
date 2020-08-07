    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="staff_dashboard.php"> Staff</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
                <li class="divider"></li>
                <li>
                <a href="staff_dashboard.php"><?php echo $_SESSION['name'] ?></a>
                </li>
                <li class="divider"></li>
                        <li>
                            <a href="../logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="staff_dashboard.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="profile.php"><i class="fa fa-fw fa-user"></i>My Profile</a>
                    </li>
                <?php 
                    if(isset($_SESSION['specialisation']) == 'Receptionist'){
                        ?>
                   <li>
                        <a href="add_patients.php"><i class="fa fa-fw fa-users"></i>Add Patient </a>
                    </li>
                    <?php } ?>
                    <div class="well">
                    <h5>Patient Search</h5>
                    
                    <form action="#" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name='submit' class="btn btn-default" type="search">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                        </form>
                    <!-- /.input-group -->
                </div>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>