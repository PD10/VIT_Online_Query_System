<?php include('server.php'); ?>
<html>
<head>
  <title>
    Admin Login
  </title>
  <link rel="icon" type="image/jpg" href="vit_logo.jpg">
  <script type="text/javascript">
  var image1=new Image()
  image1.src="vit1.jpg"
  var image2=new Image()
  image2.src="vit2.jpg"
  var image3=new Image()
  image3.src="vit3.jpg"
  var image4=new Image()
  image4.src="vit4.jpg"
  </script>
</head>
<body>
  <style>
  body
  {
    background: linear-gradient(#D3C7EF,white,#D3C7EF);
  }
  .slideshow
  {
    width: 1000px;
    height: 250px;
    float: right;
  }
  hr
  {
    padding:1px;
    background-color:black;
  }
  h2
  {
    font-family:courier;
    color:	#FF8C00;
  }
  input{
    width:300px;
    border: 1px solid black;
    padding:5px;
    text-align:center;
  }
  p{
    font-family:verdana;
    text-shadow: 1px 1px black;
  }
  .Sign_Up
  {
    position: absolute;
    top:270px;
    right:100px;
  }
  #log
  {
    width: 100px;
    color: black;
  }
  #gender
  {
    width:10px;
  }
  #sign
  {
    width:100px;
    color: black;
  }
  </style>



  <div class="top">
  <img src="vit_logo.jpg" width="500px" height="250px">
  <img src="vit1.jpg" name="slide" class="slideshow">
  <script type="text/javascript">
  var x=1
  function slideit(){
    document.images.slide.src=eval("image"+x+".src")
    if (x<4)
    x++
    else {
      x=1
    }
    setTimeout("slideit()",4000)
  }
  slideit()
  </script>
  </div>
  <hr>
  <div class="form">
    <form class="Login" method="post">
      <h2>Login here</h2>
      <p>
        <input type="text" required placeholder="Admin_ID" name="admin_id" id="facultyid">
      </p>
      <p>
        <input type="password" required placeholder="Password" name="admin_password" id="pwd"
        pattern="{8,30}">
      </p>
    <input type="submit" value="Login" id="log" name="admin">
    </form>
  </div>
</body>
</html>
