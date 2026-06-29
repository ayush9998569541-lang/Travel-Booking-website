<?php
// ============================
// Database Connection
// ============================

$host = "localhost";
$user = "root";
$password = "1234";
$database = "airline_booking";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

// Get values from previous page
$flight_id = $_POST['flight_id'] ?? '';
$seat = $_POST['seat'] ?? '';

// Process form only after passenger details are filled
if (
    $_SERVER["REQUEST_METHOD"] == "POST" &&
    isset($_POST['firstname'])
) {

    $firstname   = trim($_POST['firstname']);
    $lastname    = trim($_POST['lastname']);
    $gender      = trim($_POST['gender']);
    $age         = (int)$_POST['age'];
    $email       = trim($_POST['email']);
    $phone       = trim($_POST['phone']);
    $passport    = trim($_POST['passport']);
    $nationality = trim($_POST['nationality']);
    $seat        = trim($_POST['seat']);
    $request     = trim($_POST['request']);

    $sql = "INSERT INTO bookings_flights
    (
        first_name,
        last_name,
        gender,
        age,
        email,
        phone,
        passport_no,
        nationality,
        seat_preference,
        special_request
    )
    VALUES
    (?,?,?,?,?,?,?,?,?,?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "sssissssss",
        $firstname,
        $lastname,
        $gender,
        $age,
        $email,
        $phone,
        $passport,
        $nationality,
        $seat,
        $request
    );

    if (mysqli_stmt_execute($stmt)) {

        $totalAmount = 5999;

        header("Location: payment.php?type=Flight&amount=".$totalAmount);
        exit();

    } else {

        die(mysqli_error($conn));

    }

    mysqli_stmt_close($stmt);
}

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

background:linear-gradient(135deg,#0f4c81,#1e88e5,#42a5f5);
min-height:100vh;
display:flex;
justify-content:center;
align-items:center;
padding:40px;

}

.container{

width:100%;
max-width:1000px;
background:white;
border-radius:20px;
overflow:hidden;
display:flex;
box-shadow:0 20px 50px rgba(0,0,0,.25);

}

.left{

width:35%;
background:linear-gradient(135deg,#003366,#0059b3);
color:white;
padding:40px;

display:flex;
flex-direction:column;
justify-content:center;

}

.left h1{

font-size:32px;
margin-bottom:15px;

}

.left p{

line-height:28px;
opacity:.9;

}

.summary{

margin-top:40px;

background:rgba(255,255,255,.15);

padding:20px;
border-radius:10px;

}

.summary h3{

margin-bottom:15px;

}

.summary p{

margin:10px 0;

}

.right{

width:65%;
padding:40px;

}

.right h2{

margin-bottom:30px;
color:#003366;

}

.form-grid{

display:grid;
grid-template-columns:repeat(2,1fr);
gap:20px;

}

.input-group{

display:flex;
flex-direction:column;

}

.input-group label{

font-weight:500;
margin-bottom:6px;
color:#333;

}

.input-group input,
.input-group select,
.input-group textarea{

padding:13px;
border:1px solid #ccc;
border-radius:8px;
font-size:15px;
transition:.3s;

}

.input-group input:focus,
.input-group select:focus,
.input-group textarea:focus{

border-color:#1976d2;
outline:none;
box-shadow:0 0 10px rgba(25,118,210,.2);

}

textarea{

resize:none;

}

.full{

grid-column:1/3;

}

button{

margin-top:30px;
width:100%;
padding:15px;
border:none;
border-radius:8px;
background:#1976d2;
color:white;
font-size:18px;
font-weight:600;
cursor:pointer;
transition:.3s;

}

button:hover{

background:#0d47a1;
transform:translateY(-2px);

}

@media(max-width:900px){

.container{

flex-direction:column;

}

.left,
.right{

width:100%;

}

.form-grid{

grid-template-columns:1fr;

}

.full{

grid-column:auto;

}

}

</style>

</head>

<body>

<div class="container">

<div class="left">

<h1>✈ Airline Booking</h1>

<p>
Complete your passenger information to confirm your flight booking.
</p>

<div class="summary">

<h3>Booking Summary</h3>

<p><strong>Flight ID:</strong> <?php echo htmlspecialchars($flight_id); ?></p>

<p><strong>Seat:</strong> <?php echo htmlspecialchars($seat); ?></p>

<p><strong>Total:</strong> ₹5,999</p>

</div>

</div>

<div class="right">

<h2>Passenger Details</h2>

<form method="POST">

<input type="hidden" name="flight_id" value="<?php echo $flight_id; ?>">
<input type="hidden" name="seat" value="<?php echo $seat; ?>">

<div class="form-grid">

<div class="input-group">
<label>First Name</label>
<input type="text" name="firstname" required>
</div>

<div class="input-group">
<label>Last Name</label>
<input type="text" name="lastname" required>
</div>

<div class="input-group">
<label>Gender</label>
<select name="gender" required>
<option>Male</option>
<option>Female</option>
<option>Other</option>
</select>
</div>

<div class="input-group">
<label>Age</label>
<input type="number" name="age" required>
</div>

<div class="input-group">
<label>Email</label>
<input type="email" name="email" required>
</div>

<div class="input-group">
<label>Phone</label>
<input type="text" name="phone" required>
</div>

<div class="input-group">
<label>Passport Number</label>
<input type="text" name="passport" required>
</div>

<div class="input-group">
<label>Nationality</label>
<input type="text" name="nationality" required>
</div>

<div class="input-group full">
<label>Special Request</label>
<textarea rows="4" name="request" placeholder="Meal preference, wheelchair assistance etc."></textarea>
</div>

</div>

<button type="submit">
Proceed to Payment →
</button>

</form>

</div>

</div>

</body>
</html>