<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bus Ticket Booking</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:linear-gradient(135deg,#0f172a,#1e3a8a);
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:30px;
}

.booking-container{
    width:100%;
    max-width:1100px;
    background:#fff;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 20px 50px rgba(0,0,0,0.25);
    display:grid;
    grid-template-columns:1fr 1.2fr;
}

.left-section{
    background:linear-gradient(rgba(0,0,0,.6),rgba(0,0,0,.6)),
    url('https://images.unsplash.com/photo-1509749837427-ac94a2553d0e?auto=format&fit=crop&w=1200&q=80');
    background-size:cover;
    background-position:center;
    color:white;
    padding:50px;
    display:flex;
    flex-direction:column;
    justify-content:center;
}

.left-section h1{
    font-size:42px;
    margin-bottom:15px;
}

.left-section p{
    font-size:15px;
    line-height:1.8;
    color:#e5e7eb;
}

.features{
    margin-top:30px;
}

.features div{
    margin-bottom:15px;
    font-size:15px;
}

.right-section{
    padding:45px;
}

.form-title{
    font-size:28px;
    font-weight:700;
    color:#111827;
    margin-bottom:25px;
}

.form-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:18px;
}

.input-group{
    display:flex;
    flex-direction:column;
}

.input-group.full{
    grid-column:span 2;
}

label{
    margin-bottom:7px;
    font-size:14px;
    color:#374151;
    font-weight:500;
}

input,
select{
    padding:14px;
    border:1px solid #d1d5db;
    border-radius:10px;
    font-size:15px;
    transition:0.3s;
}

input:focus,
select:focus{
    outline:none;
    border-color:#2563eb;
    box-shadow:0 0 0 4px rgba(37,99,235,.15);
}

.search-btn{
    margin-top:25px;
    width:100%;
    padding:15px;
    border:none;
    border-radius:12px;
    background:#2563eb;
    color:white;
    font-size:16px;
    font-weight:600;
    cursor:pointer;
    transition:.3s;
}

.search-btn:hover{
    background:#1d4ed8;
    transform:translateY(-2px);
}

.footer-text{
    text-align:center;
    margin-top:20px;
    font-size:13px;
    color:#6b7280;
}

@media(max-width:900px){

.booking-container{
    grid-template-columns:1fr;
}

.left-section{
    min-height:300px;
}

.form-grid{
    grid-template-columns:1fr;
}

.input-group.full{
    grid-column:span 1;
}

}
</style>
</head>
<body>

<div class="booking-container">

    <div class="left-section">
        <h1>Travel Smart</h1>
        <p>
            Book your bus tickets quickly and securely.
            Find the best routes, comfortable seats, and affordable fares
            for your next journey.
        </p>

        <div class="features">
            <div>✓ Instant Booking Confirmation</div>
            <div>✓ Safe & Secure Payments</div>
            <div>✓ Live Seat Availability</div>
            <div>✓ 24/7 Customer Support</div>
        </div>
    </div>

    <div class="right-section">

        <h2 class="form-title">Bus Ticket Booking</h2>

        <form  action="search_bus.php" method="POST">

            <div class="form-grid">

                <div class="input-group">
                    <label>From</label>
                    <input type="text" placeholder="Enter Source City">
                </div>

                <div class="input-group">
                    <label>To</label>
                    <input type="text" placeholder="Enter Destination City">
                </div>

                <div class="input-group">
                    <label>Journey Date</label>
                    <input type="date">
                </div>

                <div class="input-group">
                    <label>Passengers</label>
                    <select>
                        <option>1 Passenger</option>
                        <option>2 Passengers</option>
                        <option>3 Passengers</option>
                        <option>4 Passengers</option>
                    </select>
                </div>

                <div class="input-group full">
                    <label>Passenger Name</label>
                    <input type="text" placeholder="Enter Full Name">
                </div>

                <div class="input-group">
                    <label>Phone Number</label>
                    <input type="tel" placeholder="+91 XXXXX XXXXX">
                </div>

                <div class="input-group">
                    <label>Email Address</label>
                    <input type="email" placeholder="example@email.com">
                </div>

            </div>

            <button class="search-btn">
                Search & Book Bus
            </button>

        </form>

        <div class="footer-text">
            Fast • Secure • Reliable Bus Booking System
        </div>

    </div>

</div>

</body>
</html>