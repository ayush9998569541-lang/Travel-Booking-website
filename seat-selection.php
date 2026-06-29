<?php
 include("connection.php");

$flight_id = $_POST['id'];

// Fetch booked seats
$booked = [];

$sql = "SELECT seat_preference FROM bookings_flights WHERE flight_id='$flight_id'";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result)){
    $booked[] = $row['seat'];
}
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Select Seat</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Poppins,sans-serif;
}

body{
background:#edf5ff;
}

.container{
max-width:1000px;
margin:auto;
padding:30px;
}

h1{
text-align:center;
color:#0f172a;
margin-bottom:20px;
}

.legend{
display:flex;
justify-content:center;
gap:20px;
margin-bottom:25px;
flex-wrap:wrap;
}

.legend div{
display:flex;
align-items:center;
gap:8px;
font-weight:500;
}

.box{
width:22px;
height:22px;
border-radius:6px;
}

.available{
background:#22c55e;
}

.booked{
background:#ef4444;
}

.selected{
background:#2563eb;
}

.aircraft{

background:white;
padding:30px;
border-radius:20px;
box-shadow:0 15px 35px rgba(0,0,0,.1);

}

.screen{

width:80%;
margin:auto;
padding:12px;
background:#dbeafe;
text-align:center;
font-weight:bold;
border-radius:50px;
margin-bottom:30px;

}

.row{

display:grid;
grid-template-columns:40px repeat(3,60px) 40px repeat(3,60px);
justify-content:center;
gap:12px;
margin-bottom:15px;

}

.row-number{

display:flex;
justify-content:center;
align-items:center;
font-weight:bold;
color:#64748b;

}

.seat{

height:55px;
border-radius:12px;
display:flex;
justify-content:center;
align-items:center;
cursor:pointer;
font-weight:600;
transition:.3s;

}

.seat:hover{

transform:translateY(-4px);

}

.available-seat{

background:#22c55e;
color:white;

}

.booked-seat{

background:#ef4444;
color:white;
cursor:not-allowed;

}

.selected-seat{

background:#2563eb!important;

}

input{

display:none;

}

.fare{

margin-top:30px;
background:white;
padding:20px;
border-radius:15px;
box-shadow:0 10px 25px rgba(0,0,0,.08);

}

.fare h3{

margin-bottom:10px;
color:#0f172a;

}

.fare p{

display:flex;
justify-content:space-between;
margin:8px 0;

}

button{

width:100%;
padding:15px;
margin-top:20px;
background:#2563eb;
color:white;
border:none;
border-radius:10px;
font-size:18px;
cursor:pointer;
transition:.3s;

}

button:hover{

background:#1d4ed8;

}

button:disabled{

background:gray;
cursor:not-allowed;

}

.type{

font-size:12px;
color:#64748b;
text-align:center;
margin-top:4px;

}

@media(max-width:700px){

.row{

grid-template-columns:25px repeat(3,45px) 25px repeat(3,45px);
gap:8px;

}

.seat{

height:42px;
font-size:13px;

}

}

</style>

</head>

<body>

<div class="container">

<h1>✈ Select Your Seat</h1>

<div class="legend">

<div><span class="box available"></span>Available</div>

<div><span class="box booked"></span>Booked</div>

<div><span class="box selected"></span>Selected</div>

</div>

<form action="passenger-details.php" method="POST">

<input type="hidden" name="flight_id" value="<?php echo $flight_id; ?>">

<div class="aircraft">

<div class="screen">COCKPIT</div>

<?php

$rows=['A','B','C','D','E','F','G','H','I','J'];

foreach($rows as $r){

echo '<div class="row">';

echo '<div class="row-number">'.$r.'</div>';

for($i=1;$i<=6;$i++){

$seat=$r.$i;

$type="";

if($i==1 || $i==6)
$type="Window";

elseif($i==2 || $i==5)
$type="Middle";

else
$type="Aisle";

if(in_array($seat,$booked)){

echo "<div class='seat booked-seat'>$seat</div>";

}else{

echo "

<label>

<input type='radio' name='seat' value='$seat' required>

<div class='seat available-seat'>$seat
<div class='type'>$type</div>
</div>

</label>

";

}

if($i==3)

echo "<div></div>";

}

echo '</div>';

}

?>

</div>

<div class="fare">

<h3>Fare Summary</h3>

<p><span>Base Fare</span><span>₹4,500</span></p>

<p><span>Taxes</span><span>₹650</span></p>

<hr>

<p style="font-size:20px;font-weight:bold;">

<span>Total</span>

<span>₹5,150</span>

</p>

<p>Selected Seat:
<strong id="seatName">None</strong>
</p>

<button id="continueBtn" disabled>

Continue →

</button>

</div>

</form>

</div>

<script>

const seats=document.querySelectorAll("input[name='seat']");
const btn=document.getElementById("continueBtn");
const seatName=document.getElementById("seatName");

document.querySelectorAll(".available-seat").forEach(x=>{

x.onclick=function(){

document.querySelectorAll(".available-seat").forEach(s=>{

s.classList.remove("selected-seat");

});

this.classList.add("selected-seat");

seatName.innerHTML=this.innerText.replace("Window","").replace("Middle","").replace("Aisle","").trim();

btn.disabled=false;

}

});

</script>

</body>
</html>