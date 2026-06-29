<?php
include 'db.php';

$result = $conn->query("SELECT * FROM bus");
?>

<!DOCTYPE html>
<html>
<head>
<title>Available Buses</title>

<style>
body{
font-family:Arial;
background:#f4f4f4;
padding:30px;
}

.bus-card{
background:white;
padding:20px;
margin-bottom:20px;
border-radius:10px;
box-shadow:0 0 10px rgba(0,0,0,.1);
display:flex;
justify-content:space-between;
}

.btn{
padding:10px 20px;
background:#2563eb;
color:white;
text-decoration:none;
border-radius:5px;
}
</style>

</head>
<body>

<h2>Available Buses</h2>

<?php while($bus=$result->fetch_assoc()){ ?>

<div class="bus-card">

<div>
<h3><?= $bus['bus_name']; ?></h3>
<p>
<?= $bus['source_city']; ?>
 →
<?= $bus['destination_city']; ?>
</p>
</div>

<div>
<?= $bus['departure_time']; ?>
<br>
<?= $bus['arrival_time']; ?>
</div>

<div>
₹<?= $bus['fare']; ?>
</div>

<div>
<a class="btn"
href="seat_bus.php?bus_id=<?= $bus['bus_id']; ?>">
Select Seats
</a>
</div>

</div>

<?php } ?>

</body>
</html>