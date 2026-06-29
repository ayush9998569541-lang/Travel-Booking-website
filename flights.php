<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SkyBook - Flight Booking</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:#f4f7fc;
}

.navbar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:20px 8%;
    background:#fff;
    box-shadow:0 2px 10px rgba(0,0,0,0.08);
}

.logo{
    font-size:28px;
    font-weight:700;
    color:#0066ff;
}

.nav-links a{
    text-decoration:none;
    color:#333;
    margin-left:25px;
    font-weight:500;
}

.hero{
    height:90vh;
    background:linear-gradient(rgba(0,0,0,.45),rgba(0,0,0,.45)),
    url('https://images.unsplash.com/photo-1436491865332-7a61a109cc05?auto=format&fit=crop&w=1600&q=80');
    background-size:cover;
    background-position:center;
    display:flex;
    align-items:center;
    justify-content:center;
}

.booking-card{
    width:90%;
    max-width:1100px;
    background:#fff;
    padding:35px;
    border-radius:20px;
    box-shadow:0 15px 40px rgba(0,0,0,.15);
}

.booking-card h1{
    text-align:center;
    margin-bottom:25px;
    color:#222;
}

.trip-type{
    display:flex;
    gap:20px;
    margin-bottom:25px;
}

.trip-type label{
    font-weight:500;
}

.form-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:20px;
}

.input-group{
    display:flex;
    flex-direction:column;
}

.input-group label{
    margin-bottom:8px;
    font-size:14px;
    font-weight:500;
    color:#555;
}

.input-group input,
.input-group select{
    padding:14px;
    border:1px solid #ddd;
    border-radius:10px;
    outline:none;
    transition:.3s;
}

.input-group input:focus,
.input-group select:focus{
    border-color:#0066ff;
}

.search-btn{
    margin-top:30px;
    width:100%;
    padding:16px;
    border:none;
    background:#0066ff;
    color:#fff;
    font-size:18px;
    border-radius:10px;
    cursor:pointer;
    transition:.3s;
}

.search-btn:hover{
    background:#0050cc;
}

.features{
    padding:70px 8%;
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:25px;
}

.feature-box{
    background:#fff;
    padding:30px;
    border-radius:15px;
    text-align:center;
    box-shadow:0 5px 15px rgba(0,0,0,.08);
}

.feature-box h3{
    margin:15px 0;
    color:#0066ff;
}

.footer{
    background:#111827;
    color:#fff;
    text-align:center;
    padding:25px;
    margin-top:40px;
}

@media(max-width:768px){
    .navbar{
        flex-direction:column;
        gap:10px;
    }

    .booking-card{
        padding:25px;
    }

    .hero{
        height:auto;
        padding:60px 0;
    }
}
</style>
</head>
<body>

<nav class="navbar">
    <div class="logo">✈ TravelGo</div>

    <div class="nav-links">
        <a href="#">Flights</a>
        <a href="#">Hotels</a>
        <a href="#">Offers</a>
        <a href="#">Support</a>
    </div>
</nav>

<section class="hero">

    <div class="booking-card">

        <h1>Book Your Flight</h1>

        <div class="trip-type">
            <label>
                <input type="radio" name="trip" checked>
                One Way
            </label>

            <label>
                <input type="radio" name="trip">
                Round Trip
            </label>
        </div>

        <form action="search-results.php" method="GET">

            <div class="form-grid">

                <div class="input-group">
                    <label>From</label>
                    <input type="text" placeholder="Departure City">
                </div>

                <div class="input-group">
                    <label>To</label>
                    <input type="text" placeholder="Destination City">
                </div>

                <div class="input-group">
                    <label>Departure Date</label>
                    <input type="date">
                </div>

                <div class="input-group">
                    <label>Return Date</label>
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

                <div class="input-group">
                    <label>Class</label>
                    <select>
                        <option>Economy</option>
                        <option>Premium Economy</option>
                        <option>Business</option>
                        <option>First Class</option>
                    </select>
                </div>

            </div>

            <button type="submit" class="search-btn">
                Search Flights
            </button>

        </form >

    </div>

</section>

<section class="features">

    <div class="feature-box">
        <h3>Best Prices</h3>
        <p>Compare hundreds of airlines and find the best deals instantly.</p>
    </div>

    <div class="feature-box">
        <h3>Secure Booking</h3>
        <p>Safe payment processing with industry-standard encryption.</p>
    </div>

    <div class="feature-box">
        <h3>24/7 Support</h3>
        <p>Get assistance anytime from our dedicated travel experts.</p>
    </div>

</section>

<footer class="footer">
    © 2025 SkyBook Airlines | All Rights Reserved
</footer>

</body>
</html>