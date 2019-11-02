<?php include('server.php'); ?>
﻿<html>
<title>
Admin Homepage
</title>
<body>
<style>
body
{
  background: linear-gradient(#E3E0D9,white,#E3E0D9);
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
.content
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
<b><a href="admin_login.php"><input type="button" class="btn" value="Log Out"></b></a>
</div>
<div class="content">
<h1>Download Report</h1>
<form action="excel.php" method="POST">
<table>
<tr>
<td>Select Department</td>
<td>
<select name="dept_dload">
<option value="ELECTRICITY">Electricity</option>
<option value="House-Keeping">House-Keeping</option>
<option value="Food">Food</option>
<option value="Furniture">Furniture</option>
<option value="Wi-fi">Wi-Fi</option>
</select>
</td>
</tr>
<tr>
<td><input type="submit" value="Download" name="export_excel"></td>
</tr>
</table>
</form>
</body>
</html>
