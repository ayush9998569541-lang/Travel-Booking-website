<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Train Ticket Booking</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      background: linear-gradient(135deg, #e3f2fd, #ffffff);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    /* Header */
    header {
      background: #0d47a1;
      color: white;
      padding: 20px;
      text-align: center;
    }

    header h1 {
      font-size: 28px;
      letter-spacing: 1px;
    }

    /* Main container */
    .container {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 30px;
    }

    /* Booking card */
    .booking-card {
      background: white;
      width: 100%;
      max-width: 500px;
      padding: 25px;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }

    .booking-card h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #0d47a1;
    }

    /* Form styling */
    .form-group {
      margin-bottom: 15px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
      color: #333;
    }

    input, select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
      outline: none;
      transition: 0.3s;
    }

    input:focus, select:focus {
      border-color: #0d47a1;
      box-shadow: 0 0 5px rgba(13,71,161,0.3);
    }

    /* Button */
    .btn {
      width: 100%;
      padding: 12px;
      background: #0d47a1;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      transition: 0.3s;
    }

    .btn:hover {
      background: #1565c0;
    }

    /* Footer */
    footer {
      text-align: center;
      padding: 15px;
      background: #f1f1f1;
      font-size: 14px;
    }

    /* Responsive */
    @media (max-width: 600px) {
      .booking-card {
        padding: 20px;
      }
    }
  </style>
</head>

<body>

  <header>
    <h1>🚆 Train Ticket Booking System</h1>
  </header>

  <div class="container">
    <div class="booking-card">
      <h2>Book Your Journey</h2>

      <form method="POST" action="search.php">
        <div class="form-group">
          <label>From</label>
          <input type="text"   name="from" placeholder="Enter departure city" required />
        </div>

        <div class="form-group">
          <label>To</label>
          <input type="text"  name="to" placeholder="Enter destination city" required />
        </div>

        <div class="form-group">
          <label>Date of Travel</label>
          <input type="date" required />
        </div>

        <div class="form-group">
          <label>Class</label>
          <select>
            <option>General</option>
            <option>Sleeper</option>
            <option>AC 3 Tier</option>
            <option>AC 2 Tier</option>
            <option>AC First Class</option>
          </select>
        </div>

        <div class="form-group">
          <label>Passengers</label>
          <input type="number" min="1" max="6" value="1" />
        </div>

        <button class="btn" type="submit">Search Trains</button>
<!-- <but        ton onclick="openPage()" class="btn" type="submit" >Search Trains </button> -->
      </form>
    </div>
  </div>
  <!-- <script>
function openPage() {
  window.location.href = "seat.php";
}
</script> -->

  <footer>
    © 2026 Train Booking System | Designed for Practice
  </footer>

</body>
</html>