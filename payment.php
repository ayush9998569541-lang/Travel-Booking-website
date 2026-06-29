<?php
session_start();

$type = $_GET['type'] ?? "Flight";
$amount = $_GET['amount'] ?? 0;

if(isset($_POST['pay'])){

    $_SESSION['payment_status'] = "Paid";
    $_SESSION['payment_method'] = $_POST['payment_method'];

    echo "<script>
        alert('Payment Successful!');
        window.location='confirmation.php';
    </script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<title>Secure Payment</title>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Poppins,Arial,sans-serif;
}

body{
background:#eef3ff;
}

.container{
max-width:1100px;
margin:40px auto;
display:grid;
grid-template-columns:2fr 1fr;
gap:30px;
}

.card{
background:#fff;
padding:30px;
border-radius:15px;
box-shadow:0 10px 25px rgba(0,0,0,.1);
}

h2{
margin-bottom:20px;
color:#0d47a1;
}

.payment-method{
display:flex;
gap:20px;
margin-bottom:25px;
}

.payment-method label{
flex:1;
padding:15px;
border:2px solid #ddd;
border-radius:10px;
cursor:pointer;
text-align:center;
font-weight:bold;
}

.payment-method input{
display:none;
}

.payment-method input:checked+span{
color:#0d47a1;
}

input,select{
width:100%;
padding:13px;
margin-bottom:18px;
border:1px solid #ccc;
border-radius:8px;
font-size:15px;
}

button{
width:100%;
padding:15px;
border:none;
background:#0d6efd;
color:white;
font-size:18px;
border-radius:8px;
cursor:pointer;
}

button:hover{
background:#084298;
}

.summary .row{
display:flex;
justify-content:space-between;
margin:15px 0;
}

.total{
font-size:24px;
font-weight:bold;
color:#198754;
}

.icon{
font-size:22px;
margin-right:8px;
}

</style>

</head>

<body>

<div class="container">

<div class="card">

<h2>💳 Secure Payment</h2>

<form method="POST">

<div class="payment-method">

<label>
<input type="radio" name="payment_method" value="Card" checked>
<span><i class="fa-solid fa-credit-card icon"></i>Card</span>
</label>

<label>
<input type="radio" name="payment_method" value="UPI">
<span><i class="fa-brands fa-google-pay icon"></i>UPI</span>
</label>

<label>
<input type="radio" name="payment_method" value="Net Banking">
<span><i class="fa-solid fa-building-columns icon"></i>Bank</span>
</label>

</div>

<input type="text" placeholder="Card Holder Name" required>

<input type="text"
placeholder="Card Number"
maxlength="16"
required>

<div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;">

<input type="text"
placeholder="MM/YY"
required>

<input type="password"
placeholder="CVV"
maxlength="3"
required>

</div>

<button name="pay">
Pay ₹<?php echo $amount; ?>
</button>

</form>

</div>

<div class="card summary">

<h2>Booking Summary</h2>

<div class="row">
<span>Booking Type</span>
<span><?php echo htmlspecialchars($type); ?></span>
</div>

<div class="row">
<span>Booking Charge</span>
<span>₹<?php echo $amount; ?></span>
</div>

<div class="row">
<span>Convenience Fee</span>
<span>₹50</span>
</div>

<hr><br>

<div class="row total">
<span>Total</span>
<span>₹<?php echo $amount+50; ?></span>
</div>

<br>

<p style="color:green;font-weight:bold;">
🔒 Your payment is secured with 256-bit SSL encryption.
</p>

</div>

</div>

</body>
</html>