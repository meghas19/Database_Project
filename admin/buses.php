<?php include"includes/admin_header.php"; ?>

    <div id="wrapper">
        
        <!-- Navigation -->
        <?php include"includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin
                            <small>Author</small>
                        </h1>


                        <?php 

                        if (isset($_GET['source'])) {
                            $source = $_GET['source'];
                        }
                        else {
                            $source = "";
                        }

                        switch ($source) {
                            case 'add_bus':
                                include "includes/add_bus.php";
                                break;
                            
                            case 'update':
                                include "includes/update.php";
                                break;

                            default: ?>
                                <table class="table table-bordered table-hover"> 
                                <thead>
                                    <tr>
                                        <th>Bus_Id</th>
                                        <th>Source</th>
                                        <th>Destination</th>
                                        <th>Title</th>
                                        <th>Intermediate Stations</th>
                                        <th>Seats</th>
                                        <th>Price</th>
                                        <th>Time</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    
                                    <?php 

                                        $query = "SELECT *  FROM  buses";
                                        $select_posts = mysqli_query($connection,$query);

                                        while($row = mysqli_fetch_assoc($select_posts)) {
                                            $bus_id = $row['bus_id'];
                                            $source = $row['bus_source'];
		                                    $destination = $row['bus_dest'];
                                            $title = $source . " to " . $destination;
                                            $intermediate = $row['bus_intermediate'];
                                            $seat = $row['bus_seat'];
                                            $price = $row['bus_price'];
                                            $time = $row['bus_time'];
                                            $bus_detail = $row['bus_detail'];
                                    ?>
                                    <tr>
                                        <td><?php echo $bus_id ?></td>
                                        <td><?php echo $source ?></td>
                                        <td><?php echo $destination ?></td>
                                        <td><?php echo $title?></td>
                                        <td><?php echo $intermediate ?></td>
                                        <td><?php echo $seat ?></td>
                                        <td><?php echo $price ?></td>
                                        <td><?php echo $time ?></td>
                                        <td><?php echo $bus_detail ?></td>
                                        <?php echo "<td><a href='buses.php?delete=$bus_id'>Delete</a></td>"; ?>
                                       
                                    </tr>
                                    <?php } }?>
                                </tbody>
                                </table><?php
                             
                        
                        ?>


                        <?php 

                        if (isset($_GET['delete'])) {
                            
                            $bus_idd = $_GET['delete'];
                            // echo "$bus_idd";
                            $query = "DELETE FROM buses WHERE bus_id = {$bus_idd} ";

                            $delete_bus = mysqli_query($connection,$query);
                            if(!$delete_bus) {
                                die("Query Failed" . mysqli_error($delete_bus));
                            }
                            header("Location: buses.php");
                        }

                        ?>


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

