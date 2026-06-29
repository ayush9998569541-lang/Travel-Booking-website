<?php
session_start();

if(!isset($_SESSION['payment_status'])){
    header("Location:index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Booking Confirmed</title>

<style>

body{
font-family:Arial;
background:#eef7ee;
display:flex;
justify-content:center;
align-items:center;
height:100vh;
}

.card{
background:white;
padding:40px;
border-radius:15px;
text-align:center;
box-shadow:0 10px 25px rgba(0,0,0,.1);
}

h1{
color:green;
}

a{
display:inline-block;
margin-top:20px;
padding:12px 25px;
background:#0d6efd;
color:white;
text-decoration:none;
border-radius:8px;
}

</style>

</head>

<body>

<div class="card">

<h1>✅ Payment Successful</h1>

<p>Your booking has been confirmed.</p>

<p>Payment Method:
<b><?php echo $_SESSION['payment_method']; ?></b>
</p>

<p>Status:
<b style="color:green;">
<?php echo $_SESSION['payment_status']; ?>
</b>
</p>

<a href="index.php">
Go to Home
</a>

</div>

</body>
</html>