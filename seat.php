<!DOCTYPE html>
<html>
<head>
  <title>Seat Selection</title>
  <style>
    body {
      font-family: Arial;
      text-align: center;
      background: #f4f7ff;
    }

    h2 { margin-top: 20px; }

    .coach {
      display: grid;
      grid-template-columns: repeat(4, 60px);
      gap: 10px;
      justify-content: center;
      margin-top: 30px;
    }

    .seat {
      width: 60px;
      height: 60px;
      background: #ddd;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      border-radius: 6px;
    }

    .seat.selected {
      background: #0d47a1;
      color: white;
    }

    button {
      margin-top: 20px;
      padding: 10px 20px;
      background: #0d47a1;
      color: white;
      border: none;
      cursor: pointer;
    }
  </style>
</head>

<body>

<h2>🎟 Select Your Seat</h2>
<p id="trainName"></p>

<div class="coach" id="coach"></div>

<button onclick="goPayment()">Continue to Payment</button>

<script>
const train = localStorage.getItem("train");
document.getElementById("trainName").innerText = "Train: " + train;

const coach = document.getElementById("coach");
let selectedSeat = null;

for(let i=1;i<=20;i++){
  const seat = document.createElement("div");
  seat.className = "seat";
  seat.innerText = i;

  seat.onclick = () => {
    document.querySelectorAll(".seat").forEach(s=>s.classList.remove("selected"));
    seat.classList.add("selected");
    selectedSeat = i;
    localStorage.setItem("seat", i);
  };

  coach.appendChild(seat);
}

function goPayment(){
  if(!selectedSeat){
    alert("Select a seat first!");
    return;
  }
  window.location.href = "payment.html";
}
</script>

</body>
</html>