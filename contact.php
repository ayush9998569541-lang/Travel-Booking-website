<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Modern Contact Page</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
min-height:100vh;
display:flex;
justify-content:center;
align-items:center;
padding:40px;
background:#0f172a;
overflow-x:hidden;
position:relative;
}

/* Background */

body::before{
content:"";
position:absolute;
width:600px;
height:600px;
background:linear-gradient(135deg,#6C63FF,#00DBDE);
border-radius:50%;
filter:blur(150px);
top:-180px;
right:-180px;
z-index:-1;
}

body::after{
content:"";
position:absolute;
width:500px;
height:500px;
background:linear-gradient(135deg,#ff6ec7,#7873f5);
border-radius:50%;
filter:blur(150px);
bottom:-180px;
left:-180px;
z-index:-1;
}

.contact{
width:1200px;
max-width:100%;
display:grid;
grid-template-columns:1fr 1fr;
background:rgba(255,255,255,.08);
backdrop-filter:blur(20px);
border:1px solid rgba(255,255,255,.15);
border-radius:30px;
overflow:hidden;
box-shadow:0 25px 70px rgba(0,0,0,.45);
}

/* Left */

.left{
padding:70px;
color:white;
display:flex;
flex-direction:column;
justify-content:center;
}

.left h1{
font-size:50px;
margin-bottom:20px;
line-height:1.2;
}

.left p{
opacity:.85;
line-height:1.8;
margin-bottom:40px;
}

.info{
display:flex;
flex-direction:column;
gap:20px;
}

.card{
display:flex;
align-items:center;
gap:18px;
padding:18px;
border-radius:18px;
background:rgba(255,255,255,.08);
transition:.4s;
cursor:pointer;
}

.card:hover{
background:rgba(255,255,255,.15);
transform:translateX(10px);
}

.card i{
width:60px;
height:60px;
display:flex;
align-items:center;
justify-content:center;
font-size:24px;
background:linear-gradient(135deg,#6C63FF,#00DBDE);
border-radius:50%;
}

.social{
margin-top:40px;
display:flex;
gap:15px;
}

.social a{
width:50px;
height:50px;
display:flex;
align-items:center;
justify-content:center;
background:rgba(255,255,255,.1);
border-radius:50%;
text-decoration:none;
color:white;
font-size:20px;
transition:.4s;
}

.social a:hover{
background:#6C63FF;
transform:translateY(-8px) rotate(360deg);
}

/* Right */

.right{
background:white;
padding:70px;
}

.right h2{
font-size:34px;
margin-bottom:35px;
color:#222;
}

.inputBox{
position:relative;
margin-bottom:25px;
}

.inputBox input,
.inputBox textarea{

width:100%;
padding:18px;
border:2px solid #ddd;
border-radius:15px;
outline:none;
font-size:16px;
transition:.3s;
background:none;

}

.inputBox textarea{
height:170px;
resize:none;
}

.inputBox label{

position:absolute;
top:18px;
left:18px;
background:white;
padding:0 8px;
color:#777;
pointer-events:none;
transition:.3s;

}

.inputBox input:focus,
.inputBox textarea:focus{

border-color:#6C63FF;

}

.inputBox input:focus+label,
.inputBox textarea:focus+label,
.inputBox input:valid+label,
.inputBox textarea:valid+label{

top:-11px;
font-size:13px;
color:#6C63FF;

}

button{

width:100%;
padding:18px;
border:none;
border-radius:15px;
background:linear-gradient(135deg,#6C63FF,#00DBDE);
color:white;
font-size:17px;
font-weight:600;
cursor:pointer;
transition:.35s;

}

button:hover{

transform:translateY(-5px);
box-shadow:0 15px 35px rgba(108,99,255,.4);

}

button i{
margin-right:10px;
}

/* Responsive */

@media(max-width:900px){

.contact{
grid-template-columns:1fr;
}

.left,
.right{
padding:40px;
}

.left h1{
font-size:36px;
}

}

@media(max-width:600px){

body{
padding:20px;
}

.left,
.right{
padding:30px;
}

.left h1{
font-size:30px;
}

.right h2{
font-size:28px;
}

}

</style>

</head>

<body>

<div class="contact">

<div class="left">

<h1>Let's Build Something Amazing 🚀</h1>

<p>
Have a project in mind or just want to say hello?
We're always excited to connect with new people and
help bring ideas to life.
</p>

<div class="info">

<div class="card">
<i class="fas fa-location-dot"></i>
<div>
<h3>Address</h3>
<p>New Delhi, India</p>
</div>
</div>

<div class="card">
<i class="fas fa-phone"></i>
<div>
<h3>Phone</h3>
<p>+91 98765 43210</p>
</div>
</div>

<div class="card">
<i class="fas fa-envelope"></i>
<div>
<h3>Email</h3>
<p>hello@example.com</p>
</div>
</div>

</div>

<div class="social">

<a href="#"><i class="fab fa-facebook-f"></i></a>

<a href="#"><i class="fab fa-instagram"></i></a>

<a href="#"><i class="fab fa-linkedin-in"></i></a>

<a href="#"><i class="fab fa-github"></i></a>

</div>

</div>

<div class="right">

<h2>Send a Message</h2>

<form>

<div class="inputBox">
<input type="text" required>
<label>Full Name</label>
</div>

<div class="inputBox">
<input type="email" required>
<label>Email Address</label>
</div>

<div class="inputBox">
<input type="text" required>
<label>Subject</label>
</div>

<div class="inputBox">
<textarea required></textarea>
<label>Your Message</label>
</div>

<button type="submit">
<i class="fas fa-paper-plane"></i>
Send Message
</button>

</form>

</div>

</div>

</body>
</html>