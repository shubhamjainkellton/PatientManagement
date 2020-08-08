    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin_dashboard.php"> Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
                <li class="divider"></li>
                <li>
                <a href="admin_dashboard.php"><?php echo $_SESSION['name'] ?></a>
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
                        <a href="admin_dashboard.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    
                    <li>
                        <a href="profile.php"><i class="fa fa-fw fa-user"></i>My Profile</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#users_dropdown"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="users_dropdown" class="collapse in">
                            <li>
                                <a href="users.php?source=add_user">Add Users</a>
                            </li>
                            <li>
                                <a href="./users.php">Manage Users</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#patients_dropdown"><i class="fa fa-fw fa-arrows-v"></i> Patients <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="patients_dropdown" class="collapse in">
                            <li>
                                <a href="patients.php?source=add_patient">Add Patients</a>
                            </li>
                            <li>
                                <a href="./patients.php">Manage Patients</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="wards.php"><i class="fa fa-fw fa-list"></i> Manage Wards </a>
                    </li>
                
                     <div class="well">
                    <h5>Patient Search</h5>
                    
                    <form action="search.php" method="post">
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