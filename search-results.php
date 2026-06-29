



<?php
include('database.php');

$result=mysqli_query($conn,"SELECT * FROM flights");
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    min-height:100vh;
    background:linear-gradient(
        135deg,
        #0f172a,
        #1e293b,
        #0f172a
    );
    color:#fff;
    padding:40px 20px;
}

/* Page Container */
.container{
    max-width:1200px;
    margin:auto;
}

/* Heading */
.container h1{
    text-align:center;
    margin-bottom:40px;
    font-size:36px;
    font-weight:700;
}

/* Flight Card */
.flight-card{
    background:rgba(255,255,255,0.08);
    backdrop-filter:blur(15px);
    border:1px solid rgba(255,255,255,0.15);
    border-radius:20px;
    padding:25px;
    margin-bottom:25px;

    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:20px;

    transition:0.3s ease;
}

.flight-card:hover{
    transform:translateY(-5px);
    box-shadow:0 15px 35px rgba(0,0,0,0.3);
}

/* Airline */
.airline{
    min-width:180px;
}

.airline h2{
    font-size:22px;
    margin-bottom:5px;
}

.airline p{
    color:#cbd5e1;
    font-size:14px;
}

/* Departure & Arrival */
.flight-time{
    text-align:center;
}

.flight-time h3{
    font-size:24px;
    margin-bottom:5px;
}

.flight-time p{
    color:#cbd5e1;
    font-size:14px;
}

/* Flight Duration */
.duration{
    text-align:center;
}

.duration hr{
    width:100px;
    border:none;
    border-top:2px dashed #64748b;
    margin:10px auto;
}

.duration p{
    font-size:14px;
    color:#94a3b8;
}

/* Price */
.price{
    text-align:right;
}

.price h2{
    color:#22c55e;
    font-size:30px;
    margin-bottom:10px;
}

.price p{
    font-size:13px;
    color:#cbd5e1;
}

/* Select Button */
.select-btn{
    margin-top:10px;
    background:#2563eb;
    color:#fff;
    border:none;
    padding:12px 25px;
    border-radius:10px;
    cursor:pointer;
    font-weight:600;
    transition:.3s;
}

.select-btn:hover{
    background:#1d4ed8;
    transform:scale(1.05);
}

/* Search Filter Bar */
.search-bar{
    background:rgba(255,255,255,0.08);
    backdrop-filter:blur(15px);
    border-radius:15px;
    padding:20px;
    margin-bottom:30px;

    display:flex;
    justify-content:space-between;
    align-items:center;
    flex-wrap:wrap;
    gap:15px;
}

.search-bar input,
.search-bar select{
    padding:12px;
    border:none;
    border-radius:10px;
    min-width:180px;
    outline:none;
}

/* Cheapest Tag */
.tag{
    background:#22c55e;
    color:white;
    padding:5px 12px;
    border-radius:20px;
    font-size:12px;
    font-weight:600;
    display:inline-block;
    margin-bottom:10px;
}

/* Responsive */
@media(max-width:900px){

    .flight-card{
        flex-direction:column;
        text-align:center;
    }

    .price{
        text-align:center;
    }

    .container h1{
        font-size:28px;
    }
}
    </style>
</head>

<body>

<div class="container">

<h1>Available Flights</h1>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<div class="flight-card">

<div class="airline">
✈ <?php echo $row['airline']; ?>
</div>

<div>
<h3><?php echo $row['source_city']; ?></h3>
<p><?php echo $row['departure_time']; ?></p>
</div>

<div>
<h2>→</h2>
</div>

<div>
<h3><?php echo $row['destination_city']; ?></h3>
<p><?php echo $row['arrival_time']; ?></p>
</div>

<div class="price">
₹<?php echo $row['price']; ?>
</div>

<a href="seat-selection.php?id=<?php echo $row['id']; ?>">
<button>Select Flight</button>
</a>

</div>
<?php

$id = $_GET['id'];

$result = mysqli_query(
    $conn,
    "SELECT * FROM flights WHERE id='$id'"
);

$flight = mysqli_fetch_assoc($result);

$baseFare = $flight['price'];
$tax = 350;
$fee = 149;
$total = $baseFare + $tax + $fee;

?>
<div class="fare-row">
    <span>Base Fare</span>
    <span>₹<?php echo $baseFare; ?></span>
</div>

<div class="fare-row">
    <span>Airport Tax</span>
    <span>₹<?php echo $tax; ?></span>
</div>

<div class="fare-row">
    <span>Convenience Fee</span>
    <span>₹<?php echo $fee; ?></span>
</div>

<div class="fare-total">
    <span>Total</span>
    <span>₹<?php echo $total; ?></span>
</div>

<?php } ?>

</div>

</body>
</html>