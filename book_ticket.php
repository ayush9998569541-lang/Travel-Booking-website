<?php

$conn = new mysqli("localhost","root","1234","travel_booking");

$train_id = $_POST['train'];

$name = $_POST['passenger_name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$date = $_POST['travel_date'];

$train = $conn->query(
"SELECT * FROM trains WHERE id=$train_id"
)->fetch_assoc();

$pnr = rand(1000000000,9999999999);

$sql = "INSERT INTO bookings
(pnr,train_no,train_name,passenger_name,age,gender,travel_date)

VALUES
('$pnr',
'{$train['train_no']}',
'{$train['train_name']}',
'$name',
'$age',
'$gender',
'$date')";

$conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-5">

<div class="alert alert-success">

<h2>✅ Ticket Booked Successfully</h2>

<hr>

<h4>PNR : <?php echo $pnr; ?></h4>

<p><b>Passenger:</b> <?php echo $name; ?></p>

<p><b>Train:</b>
<?php echo $train['train_name']; ?>
(<?php echo $train['train_no']; ?>)
</p>

<p><b>Date:</b> <?php echo $date; ?></p>

</div>

<a href="train.php" class="btn btn-primary">
Book Another Ticket
</a>
<a href="ticket_pdf.php?pnr=<?php echo $pnr; ?>"
class="btn btn-danger">

Download Ticket PDF

</a>

</div>

</body>
</html>