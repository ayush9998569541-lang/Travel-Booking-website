<?php
$bus_id = $_GET['bus_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Select Seats</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
background:#f4f6fb;
padding:40px;
}

.container{
max-width:1200px;
margin:auto;
display:grid;
grid-template-columns:2fr 1fr;
gap:30px;
}

/* LEFT */

.seat-section{
background:#fff;
padding:30px;
border-radius:20px;
box-shadow:0 5px 25px rgba(0,0,0,.08);
}

.header{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:25px;
}

.header h2{
color:#1e293b;
}

.legend{
display:flex;
gap:20px;
margin-bottom:25px;
}

.legend-item{
display:flex;
align-items:center;
gap:8px;
font-size:14px;
}

.box{
width:18px;
height:18px;
border-radius:5px;
}

.available{
background:#e5e7eb;
}

.selected-box{
background:#22c55e;
}

.booked{
background:#ef4444;
}

.driver{
width:100px;
padding:12px;
background:#1e293b;
color:white;
text-align:center;
border-radius:10px;
margin-left:auto;
margin-bottom:25px;
}

.bus-layout{
display:grid;
grid-template-columns:repeat(4,70px);
gap:18px;
justify-content:center;
}

.seat{
width:60px;
height:60px;
border-radius:12px;
background:#e5e7eb;
display:flex;
justify-content:center;
align-items:center;
cursor:pointer;
font-weight:600;
transition:.3s;
}

.seat:hover{
transform:scale(1.05);
}

.seat.selected{
background:#22c55e;
color:white;
}

.seat.booked{
background:#ef4444;
color:white;
cursor:not-allowed;
}

/* RIGHT */

.summary{
background:white;
padding:30px;
border-radius:20px;
box-shadow:0 5px 25px rgba(0,0,0,.08);
height:fit-content;
}

.summary h2{
margin-bottom:20px;
}

.row{
display:flex;
justify-content:space-between;
margin:15px 0;
}

.selected-seats{
margin:15px 0;
padding:10px;
background:#f8fafc;
border-radius:10px;
min-height:50px;
}

.total{
font-size:22px;
font-weight:700;
color:#22c55e;
}

.btn{
width:100%;
padding:15px;
background:#2563eb;
border:none;
color:white;
border-radius:12px;
font-size:16px;
cursor:pointer;
margin-top:20px;
}

.btn:hover{
background:#1d4ed8;
}

</style>
</head>
<body>

<form action="passenger.php" method="POST">

<input type="hidden" name="bus_id" value="<?php echo $bus_id; ?>">

<input type="hidden" name="seats" id="selectedSeats">

<div class="container">

<div class="seat-section">

<div class="header">
<h2>Select Your Seats</h2>
</div>

<div class="legend">

<div class="legend-item">
<div class="box available"></div>
Available
</div>

<div class="legend-item">
<div class="box selected-box"></div>
Selected
</div>

<div class="legend-item">
<div class="box booked"></div>
Booked
</div>

</div>

<div class="driver">
Driver
</div>

<div class="bus-layout">

<?php

$bookedSeats=[3,7,12,18,24,30];

for($i=1;$i<=40;$i++){

$class="seat";

if(in_array($i,$bookedSeats)){
$class.=" booked";
}

echo "
<div class='$class'
data-seat='$i'>
$i
</div>";
}

?>

</div>

</div>

<div class="summary">

<h2>Fare Summary</h2>

<div class="row">
<span>Seat Fare</span>
<span>₹799</span>
</div>

<div class="row">
<span>Selected</span>
<span id="count">0</span>
</div>

<hr>

<h4 style="margin-top:20px;">
Selected Seats
</h4>

<div class="selected-seats"
id="seatList">
None
</div>

<div class="row total">
<span>Total</span>
<span id="total">
₹0
</span>
</div>

<button class="btn">
Continue Booking
</button>

</div>

</div>

</form>

<script>

const fare = 799;

let selected = [];

document.querySelectorAll('.seat').forEach(seat=>{

if(seat.classList.contains('booked'))
return;

seat.addEventListener('click',()=>{

seat.classList.toggle('selected');

const seatNo = seat.dataset.seat;

if(selected.includes(seatNo)){

selected = selected.filter(
s=>s!==seatNo
);

}else{

selected.push(seatNo);

}

document.getElementById('selectedSeats')
.value = selected.join(',');

document.getElementById('count')
.innerText = selected.length;

document.getElementById('seatList')
.innerText =
selected.length ?
selected.join(', ') :
'None';

document.getElementById('total')
.innerText =
'₹' + (selected.length * fare);

});

});

</script>

</body>
</html>