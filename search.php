<?php
$conn = new mysqli("localhost","root","1234","travel_booking");

$result = $conn->query("SELECT * FROM trains");
?>

<!DOCTYPE html>
<html>
<head>
<title>Available Trains</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background:#f4f7fc;
}

.card{
    border:none;
    box-shadow:0 4px 10px rgba(0,0,0,.1);
}

.header{
    background:#0d47a1;
    color:white;
    padding:15px;
    text-align:center;
}
</style>

</head>
<body>

<div class="header">
    <h2>🚆 Available Trains</h2>
</div>

<div class="container mt-4">

<table class="table table-bordered table-hover bg-white">

<thead class="table-primary">
<tr>
    <th>Select</th>
    <th>Train No</th>
    <th>Train Name</th>
    <th>From</th>
    <th>To</th>
    <th>Departure</th>
    <th>Arrival</th>
</tr>
</thead>

<tbody>

<?php while($row=$result->fetch_assoc()) { ?>

<tr>

<td>
<input type="radio"
name="train"
value="<?php echo $row['id']; ?>"
form="bookingForm"
required>
</td>

<td><?php echo $row['train_no']; ?></td>
<td><?php echo $row['train_name']; ?></td>
<td><?php echo $row['source']; ?></td>
<td><?php echo $row['destination']; ?></td>
<td><?php echo $row['departure_time']; ?></td>
<td><?php echo $row['arrival_time']; ?></td>

</tr>

<?php } ?>

</tbody>
</table>

<div class="card p-4">

<h4>Passenger Details</h4>

<form id="bookingForm" method="POST" action="book_ticket.php">

<div class="row">

<div class="col-md-4">
<label>Name</label>
<input type="text"
name="passenger_name"
class="form-control"
required>
</div>

<div class="col-md-2">
<label>Age</label>
<input type="number"
name="age"
class="form-control"
required>
</div>

<div class="col-md-3">
<label>Gender</label>
<select name="gender" class="form-control">
<option>Male</option>
<option>Female</option>
<option>Other</option>
</select>
</div>

<div class="col-md-3">
<label>Travel Date</label>
<input type="date"
name="travel_date"
class="form-control"
required>
</div>

</div>

<!-- <button class="btn btn-success mt-4">
Confirm Booking
</button> -->
 <button onclick="openPage()"  class="btn btn-success mt-4" >Confirm Booking </button> 
</form>

</div>

</div>

<script>
// function openPage() {
//   window.location.href = "seat.php";
// }
</script> 

</body>
</html>