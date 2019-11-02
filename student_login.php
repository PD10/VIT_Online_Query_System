<html>
<head>
  <title>
    Student Login
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
    background-image: linear-gradient(to bottom, white 0%, lightblue 100%);
    background-blend-mode: color-dodge;
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
    <form class="Login">
      <h2> Existing Users Login here</h2>
      <p>
        <input type="text" required placeholder="Registration Number" name="regno" id="regno">
      </p>
      <p>
        <input type="password" required placeholder="Password" name="password" id="pwd"
        pattern="{8,30}">
      </p>
    <input type="submit" value="Login" id="log">
    </form>


    <form class="Sign_Up">
    <h2> New Users Sign Up here</h2>
    <p>
        <input type="text" required placeholder="First Name" name="firstname" id="firstname">
    </p>
    <p>
        <input type="text" required placeholder="Last Name" name="lastname" id="lastname">
    </p>
    <p>
      <input type="text" required placeholder="Registration Number" name="regnumber" id="reg_number">
    </p>
    <p>
      Gender:
      &nbsp &nbsp Male  <input type="radio" name="gender" value="male" required id="gender">
      &nbsp &nbsp Female  <input type="radio" name="gender" value="female" required id="gender">
    </p>
    <p>Select Block &nbsp &nbsp
      <select name="t1" id="t1">
        <option value="A Block">A Block</option>
        <option value="B Block">B Block</option>
        <option value="C Block">C Block</option>
        <option value="D Block">D Block</option>
        <option value="E Block">E Block</option>
        <option value="F Block">F Block</option>
        <option value="G Block">G Block</option>
        <option value="H Block">H Block</option>
        <option value="I Block">I Block</option>
        <option value="J Block">J Block</option>
        <option value="K Block">K Block</option>
        <option value="L Block">L Block</option>
        <option value="M Block">M Block</option>
        <option value="N Block">N Block</option>
        <option value="P Block">P Block</option>
      </select>
    </p>
    <p>
      <input type="email" required placeholder="Email ID" name="email-id" id="email-id">
    </p>
    <p>
      <input type="text" required placeholder="Phone Number" name="phno" id-"ph_no"
      pattern="{10}">
    </p>
    <p>
      <input type="password" required placeholder="Password (8-30 chars)" name="password" id="password"
      pattern="{8,30}">
    </p>
    <p>
      <input type="submit" value="Sign Up" id="sign">
    </p>
    </form>
  </div>
</body>
</html>
