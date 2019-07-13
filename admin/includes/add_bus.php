<?php 

	if (isset($_POST['insert-bus'])) {
			
		$source = $_POST['source'];
		$destination = $_POST['destination'];
		$title = $source . " to " . $destination;
		$intermediate = $_POST['intermediate'];
		$seat = $_POST['seat'];
		$price = $_POST['price'];
		$time = $_POST['time'];
		$bus_detail = $_POST['bus_detail'];

		
		if ($source=="" || $destination=="" || $intermediate=="" || $seat=="" || $title=="" || $price=="" || $time=="" || $bus_detail=="") {
			echo "**All Fields Mandatory";
		}
		else {
			$query = "INSERT INTO buses(bus_source,bus_dest,bus_intermediate,bus_seat,bus_price,bus_time,bus_detail) VALUES('{$source}', '{$destination}', '{$intermediate}', '{$seat}', '{$price}', '{$time}', '{$bus_detail}')";

			$bus_entry = mysqli_query($connection,$query);

			if (!$bus_entry) {
				die("Query Failed");
			}
		}
	}

?>


<form action="" method="post" enctype="multipart/form-data">
	
	<div class="form-group">
		<label for="source">Source</label>
		<input type="text" class="form-control" name="source">
	</div>

	<div class="form-group">
		<label for="destination">Destination</label>
		<input type="text" class="form-control" name="destination">
	</div>

	<div class="form-group">
		<label for="intermediate">Intermediate stations</label>
		<input type="text" class="form-control" name="intermediate">
	</div>

	<div class="form-group">
		<label for="seat">Seat</label>
		<input type="text" class="form-control" name="seat" placeholder="Max Seats Available">
	</div>

	<div class="form-group">
		<label for="price">Price of single ticket</label>
		<input type="text" class="form-control" name="price" >
	</div>

	<div class="form-group">
		<label for="time">Bus timings</label>
		<input type="text" class="form-control" name="time" placeholder="All times separated by space">
	</div>

	<div class="form-group">
		<label for="bus_detail">Bus Detail</label>
		<textarea class="form-control" name="bus_detail" cols="30" rows="10"></textarea>
	</div>

	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="insert-bus" value="Add Bus">
	</div>
</form>