<?php

include "db.php";

$bus_id = $_POST['bus_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$seats = $_POST['seats'];
$amount = $_POST['amount'];

$travel_date = date("Y-m-d");

$stmt = $conn->prepare(
"INSERT INTO booking
(bus_id, passenger_name, email, phone, travel_date, seat_numbers, total_amount)
VALUES (?, ?, ?, ?, ?, ?, ?)"
);

$stmt->bind_param(
"isssssd",
$bus_id,
$name,
$email,
$phone,
$travel_date,
$seats,
$amount
);

$stmt->execute();

$booking_id = $conn->insert_id;

$bus = mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT * FROM bus WHERE bus_id='$bus_id'")
);

$qrData = "BUS-" . $booking_id;

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Ticket Confirmation</title>

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

.ticket-container{
max-width:1000px;
margin:auto;
}

.success-banner{
background:linear-gradient(135deg,#22c55e,#16a34a);
color:white;
padding:25px;
border-radius:20px;
text-align:center;
margin-bottom:25px;
box-shadow:0 10px 25px rgba(0,0,0,.1);
}

.success-banner h1{
font-size:32px;
}

.ticket{
background:white;
border-radius:20px;
overflow:hidden;
box-shadow:0 10px 25px rgba(0,0,0,.08);
}

.ticket-header{
background:#1e3a8a;
color:white;
padding:25px;
display:flex;
justify-content:space-between;
align-items:center;
}

.ticket-body{
padding:30px;
display:grid;
grid-template-columns:2fr 1fr;
gap:30px;
}

.section{
margin-bottom:25px;
}

.section h3{
margin-bottom:15px;
color:#1e293b;
}

.row{
display:flex;
justify-content:space-between;
padding:10px 0;
border-bottom:1px solid #e5e7eb;
}

.label{
color:#64748b;
}

.value{
font-weight:600;
}

.qr-box{
text-align:center;
padding:20px;
background:#f8fafc;
border-radius:15px;
}

.qr-box img{
width:180px;
}

.amount{
font-size:28px;
font-weight:700;
color:#22c55e;
}

.buttons{
display:flex;
gap:15px;
margin-top:25px;
}

.btn{
flex:1;
padding:14px;
border:none;
border-radius:12px;
font-size:15px;
font-weight:600;
cursor:pointer;
}

.print-btn{
background:#2563eb;
color:white;
}

.home-btn{
background:#e2e8f0;
}

@media(max-width:900px){

.ticket-body{
grid-template-columns:1fr;
}

.buttons{
flex-direction:column;
}

}

</style>
</head>
<body>

<div class="ticket-container">

<div class="success-banner">
<h1>✓ Booking Confirmed</h1>
<p>Your bus ticket has been booked successfully.</p>
</div>

<div class="ticket">

<div class="ticket-header">

<div>
<h2><?php echo $bus['bus_name']; ?></h2>
<p>
<?php echo $bus['source_city']; ?>
 →
<?php echo $bus['destination_city']; ?>
</p>
</div>

<div>
<h3>#BUS<?php echo $booking_id; ?></h3>
</div>

</div>

<div class="ticket-body">

<div>

<div class="section">

<h3>Passenger Details</h3>

<div class="row">
<span class="label">Passenger Name</span>
<span class="value"><?php echo $name; ?></span>
</div>

<div class="row">
<span class="label">Phone</span>
<span class="value"><?php echo $phone; ?></span>
</div>

<div class="row">
<span class="label">Email</span>
<span class="value"><?php echo $email; ?></span>
</div>

</div>

<div class="section">

<h3>Journey Details</h3>

<div class="row">
<span class="label">Travel Date</span>
<span class="value"><?php echo $travel_date; ?></span>
</div>

<div class="row">
<span class="label">Departure</span>
<span class="value">
<?php echo $bus['departure_time']; ?>
</span>
</div>

<div class="row">
<span class="label">Arrival</span>
<span class="value">
<?php echo $bus['arrival_time']; ?>
</span>
</div>

<div class="row">
<span class="label">Seat Numbers</span>
<span class="value">
<?php echo $seats; ?>
</span>
</div>

</div>

<div class="section">

<h3>Payment Summary</h3>

<div class="row">
<span class="label">Amount Paid</span>
<span class="amount">
₹<?php echo $amount; ?>
</span>
</div>

</div>

</div>

<div>

<div class="qr-box">

<h3>E-Ticket QR</h3>

<img src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=<?php echo $qrData; ?>">

<p style="margin-top:15px;">
Booking ID:
<strong>
BUS<?php echo $booking_id; ?>
</strong>
</p>

</div>

</div>

</div>

</div>

<div class="buttons">

<button class="btn print-btn"
onclick="window.print()">
🖨 Print Ticket
</button>

<button class="btn home-btn"
onclick="window.location.href='index.php'">
🏠 Back To Home
</button>

</div>

</div>

</body>
</html>