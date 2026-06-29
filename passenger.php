<?php
include "db.php";

$bus_id = $_POST['bus_id'];
$seats = $_POST['seats'];

$seat_count = count(explode(",", $seats));

$bus = mysqli_fetch_assoc(
    mysqli_query($conn,
    "SELECT * FROM bus WHERE bus_id='$bus_id'")
);

$fare = $bus['fare'];
$tax = 50;
$total = ($seat_count * $fare) + $tax;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Passenger Details</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
background:#f4f7fc;
padding:40px;
}

.container{
max-width:1200px;
margin:auto;
display:grid;
grid-template-columns:2fr 1fr;
gap:30px;
}

.card{
background:#fff;
padding:30px;
border-radius:20px;
box-shadow:0 5px 20px rgba(0,0,0,.08);
}

.title{
font-size:28px;
font-weight:700;
margin-bottom:25px;
color:#1e293b;
}

.form-group{
margin-bottom:20px;
}

label{
display:block;
margin-bottom:8px;
font-weight:500;
color:#374151;
}

input,
select{
width:100%;
padding:14px;
border:1px solid #d1d5db;
border-radius:12px;
font-size:15px;
}

input:focus,
select:focus{
outline:none;
border-color:#2563eb;
box-shadow:0 0 0 4px rgba(37,99,235,.1);
}

.grid{
display:grid;
grid-template-columns:1fr 1fr;
gap:20px;
}

.summary h3{
margin-bottom:20px;
}

.row{
display:flex;
justify-content:space-between;
margin:15px 0;
}

.badge{
background:#dbeafe;
color:#1d4ed8;
padding:8px 15px;
border-radius:30px;
display:inline-block;
margin-top:10px;
font-weight:600;
}

.total{
font-size:24px;
font-weight:700;
color:#22c55e;
}

.btn{
width:100%;
padding:15px;
background:#2563eb;
color:white;
border:none;
border-radius:12px;
font-size:16px;
font-weight:600;
cursor:pointer;
margin-top:20px;
}

.btn:hover{
background:#1d4ed8;
}

.route{
font-size:18px;
font-weight:600;
margin-bottom:10px;
}

@media(max-width:900px){

.container{
grid-template-columns:1fr;
}

.grid{
grid-template-columns:1fr;
}

}

</style>
</head>
<body>

<form action="confirm.php" method="POST">

<input type="hidden" name="bus_id" value="<?= $bus_id ?>">
<input type="hidden" name="seats" value="<?= $seats ?>">
<input type="hidden" name="amount" value="<?= $total ?>">

<div class="container">

<div class="card">

<h2 class="title">Passenger Details</h2>

<div class="grid">

<div class="form-group">
<label>Full Name</label>
<input type="text" name="name" required>
</div>

<div class="form-group">
<label>Mobile Number</label>
<input type="text" name="phone" required>
</div>

<div class="form-group">
<label>Email Address</label>
<input type="email" name="email" required>
</div>

<div class="form-group">
<label>Gender</label>
<select name="gender">
<option>Male</option>
<option>Female</option>
<option>Other</option>
</select>
</div>

<div class="form-group">
<label>Age</label>
<input type="number" name="age" min="1" max="100">
</div>

<div class="form-group">
<label>Emergency Contact</label>
<input type="text" name="emergency_contact">
</div>

</div>
<?php
header("Location: payment.php?type=Bus&amount=".$totalAmount);
?>

<button class="btn">
Proceed To Confirmation
</button>

</div>

<div class="card summary">

<h3>Journey Summary</h3>

<div class="route">
<?= $bus['source_city']; ?>
 →
<?= $bus['destination_city']; ?>
</div>

<p>
<?= $bus['bus_name']; ?>
</p>

<br>

<div class="row">
<span>Departure</span>
<span><?= $bus['departure_time']; ?></span>
</div>

<div class="row">
<span>Arrival</span>
<span><?= $bus['arrival_time']; ?></span>
</div>

<hr>

<br>

<h3>Selected Seats</h3>

<div class="badge">
<?= $seats ?>
</div>

<br><br>

<div class="row">
<span>Seat Fare</span>
<span>₹<?= $fare ?></span>
</div>

<div class="row">
<span>No. of Seats</span>
<span><?= $seat_count ?></span>
</div>

<div class="row">
<span>Taxes & Fees</span>
<span>₹<?= $tax ?></span>
</div>

<hr>

<br>

<div class="row total">
<span>Total</span>
<span>₹<?= $total ?></span>
</div>

</div>

</div>

</form>

</body>
</html>