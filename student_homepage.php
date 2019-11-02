<html>
<title>
Student Homepage
</title>
<body>
<style>
body
{
background:linear-gradient(lightblue,white,lightblue);
}
#logo
{
position:absolute;
top:0px;
left:10px;
}
.btn
{
position:absolute;
top:70px;
right:50px;
width:100px;
height:30px;
color:black;
border:2px solid black;
background-color:#FDFAC0;
}
.top
{
position:absolute;
top:0px;
width:100%;
height:110px;
background-color:lightgreen;
text-align:center;
}
.query_status
{
position:absolute;
top:350px;
width:100%;
height:110px;
}
h1
{
color:#B391D8;
text-shadow: 3px 2px #3E2E50;
font-size:60;
}
form
{
position:absolute;
top:150px;
left:10px;
}
</style>
 <div class="top">
  <h1> VIT Online Query System</h1>
  <img src="vit_logo.jpg" id="logo" width="200px" height="100px">
  </div>
<div class="back">
<b><a href="student_login.html"><input type="button" class="btn" value="Log Out"></b></a>
</div>
<div class="content">
<form name="New Query" action="" method="post">
<h2>NEW QUERY</h2>
<table>
<tr>
<td>Query Type</td>
<td><select name="t1" id="t1">
<option value="Electricity">Electricity</option>
<option value="Medicine">Medicine</option>
<option value="Food">Food</option>
<option value="Food">Academics</option>
<option value="Furniture">Furniture</option>
<option value="WiFi">WiFi</option>
<option value="WiFi">Academics</option>
</select></td>
</tr>
<tr>
<td>Query Statement</td>
<td><textarea rows="4" cols="50">
</textarea></td>
</tr>
<tr>
<td><input type="submit" value="Get it Solved"></td>
</tr>
</table>
</form>
</div>
<div class="query_status">
<p>Check the status of your previous queries by <a href="query.html">clicking here.</a></p>
</div>
</body>
</html>