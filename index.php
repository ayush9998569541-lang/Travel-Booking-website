<?php
session_start();
$logged_in_status= false;
if (isset($_SESSION["logged_in_status"]) && $_SESSION["logged_in_status"]) {
  $logged_in_status = $_SESSION["logged_in_status"];
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Travel Booking</title>

  <style>
    *{
      margin:0;
      padding:0;
      box-sizing:border-box;
      font-family: Arial, sans-serif;
    }

    body{
      background:#f4f7fb;
      color:#333;
    }

    /* HEADER */

    header{
      background:#0d6efd;
      color:white;
      padding:20px 50px;
      display:flex;
      justify-content:space-between;
      align-items:center;
    }

    .logo{
      font-size:28px;
      font-weight:bold;
    }

    nav{
      display:flex;
      align-items:center;
      gap:20px;
    }

    nav a{
      color:white;
      text-decoration:none;
      font-weight:bold;
    }

    .login-btn{
      background:white;
      color:#0d6efd;
      padding:10px 20px;
      border-radius:8px;
      text-decoration:none;
      font-weight:bold;
      transition:0.3s;
    }

    .login-btn:hover{
      background:#dbe8ff;
    }

    /* HERO SECTION */

    .hero{
      height:90vh;
      background:
      linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
      url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e');

      background-size:cover;
      background-position:center;

      display:flex;
      justify-content:center;
      align-items:center;
      padding:20px;
    }

    .booking-box{
      background:white;
      width:100%;
      max-width:950px;
      padding:30px;
      border-radius:15px;
      box-shadow:0 10px 30px rgba(0,0,0,0.2);
    }

    .tabs{
      display:flex;
      gap:15px;
      margin-bottom:25px;
    }

    .tab{
      flex:1;
      padding:12px;
      border:none;
      background:#e9ecef;
      border-radius:10px;
      cursor:pointer;
      font-weight:bold;
      transition:0.3s;
      font-size:16px;
    }

    .tab:hover{
      background:#0d6efd;
      color:white;
    }

    form{
      display:grid;
      grid-template-columns:repeat(auto-fit, minmax(200px, 1fr));
      gap:20px;
    }

    .input-group{
      display:flex;
      flex-direction:column;
    }

    .input-group label{
      margin-bottom:8px;
      font-weight:bold;
    }

    .input-group input,
    .input-group select{
      padding:12px;
      border:1px solid #ccc;
      border-radius:8px;
      font-size:15px;
    }

    .search-btn{
      grid-column:1/-1;
      padding:15px;
      border:none;
      background:#0d6efd;
      color:white;
      font-size:18px;
      border-radius:10px;
      cursor:pointer;
      transition:0.3s;
    }

    .search-btn:hover{
      background:#084298;
    }

    /* SERVICES */

    .services{
      padding:60px 40px;
      display:grid;
      grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
      gap:25px;
    }

    .card{
      background:white;
      padding:25px;
      border-radius:15px;
      text-align:center;
      box-shadow:0 5px 15px rgba(0,0,0,0.1);
      transition:0.3s;
    }

    .card:hover{
      transform:translateY(-8px);
    }

    .card h3{
      margin:15px 0;
      color:#0d6efd;
    }

    /* FOOTER */

    footer{
      background:#111;
      color:white;
      text-align:center;
      padding:20px;
      margin-top:30px;
    }

    /* RESPONSIVE */

    @media(max-width:768px){

      header{
        flex-direction:column;
        gap:15px;
      }

      nav{
        flex-wrap:wrap;
        justify-content:center;
      }

      .tabs{
        flex-direction:column;
      }
    }

  </style>
</head>

<body>

  <!-- HEADER -->

  <header>

    <div class="logo">TravelGo</div>

    <nav>
      <a href="index.php">Home</a>
      <a href="train.php">Train</a>
      <a href="bus.php">Bus</a>
      <a href="flights.php">Flights</a>
      <a href="contact.php">Contact</a>

      <!-- LOGIN BUTTON -->
       <?php
       if($logged_in_status){
        echo '<a href="./auth/profile.php" class="login-btn">PROFILE</a>';
       }else{
        echo '<a href="./auth/login.php" class="login-btn">Login</a>';
       }


?>
      
    </nav>

  </header>

  <!-- HERO -->

  <section class="hero">

    <div class="booking-box">

      <div class="tabs">
        <button class="tab">🚆 Train</button>
        <button class="tab">🚌 Bus</button>
        <button class="tab">✈ Flight</button>
      </div>

      <form>

        <div class="input-group">
          <label>From</label>
          <input type="text" placeholder="Enter city">
        </div>

        <div class="input-group">
          <label>To</label>
          <input type="text" placeholder="Destination">
        </div>

        <div class="input-group">
          <label>Departure Date</label>
          <input type="date">
        </div>

        <div class="input-group">
          <label>Passengers</label>

          <select>
            <option>1 Passenger</option>
            <option>2 Passengers</option>
            <option>3 Passengers</option>
            <option>4+ Passengers</option>
          </select>
        </div>

        <button class="search-btn">
          Search Tickets
        </button>

      </form>

    </div>

  </section>

  <!-- SERVICES -->

  <section class="services">

    <div class="card">
      <h3>🚆 Train Booking</h3>
      <p>
        Book train tickets instantly with live seat availability and fast confirmation.
      </p>
    </div>

    <div class="card">
      <h3>🚌 Bus Booking</h3>
      <p>
        Find affordable buses with multiple operators and easy online booking.
      </p>
    </div>

    <div class="card">
      <h3>✈ Flight Booking</h3>
      <p>
        Compare airfare prices and book domestic & international flights easily.
      </p>
    </div>

  </section>

  <!-- FOOTER -->

  <footer>
    <p>© 2026 TravelGo. All Rights Reserved.</p>
  </footer>

</body>
</html>