<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
    
    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php 

                if(isset($_POST['submit'])) {
                    $source = $_POST['source'];
                    $destination = $_POST['destination'];
                    $date = $_POST['date'];

                    if ($source=="" || $destination=="") {
                        echo "<h2>*Source And Destination Fields Are Mandatory To Fill</h2>";
                    }
                    else {


                    //echo $date;
                    $query = "SELECT * FROM buses WHERE bus_source='$source' AND bus_dest='$destination' ";

                    $search_query = mysqli_query($connection,$query);

                    if(!$search_query) {
                        die("Query Failed" . mysqli_error($connection));
                    }

                    $count = mysqli_num_rows($search_query);
                    if($count == 0) {
                        echo "<h1>NO RESULT</h1>";
                    }
                    else { 

                        while($row = mysqli_fetch_assoc($search_query)) {
                            $bus_id = $row['bus_id'];
                            $bus_source = $row['bus_source'];
                            $bus_dest = $row['bus_dest'];
                            
                            ?>

                            <!-- First Blog Post -->
                            <h2>
                                <?php echo $bus_id; ?>
                            </h2>
                            
                            
                            <hr>
                            
                            <!-- <img class="img-responsive" src="images/" alt=""> -->
                            <hr>
                            
                            

                            <hr>
                        <?php }  
                    }
                }
                }?>

     

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

