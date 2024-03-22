<?php
include "header.php";
?>
<style>
section{
width:100%;
height:auto;
display:flex;

}
section .article2{
	padding-top:40px;
	width:50%;
}
section .article3{
	padding-top:40px;
	width:50%;
	text-align:center;
	
}
.article2 .card1{
	width:40%;
    display: block;
    border: 1px solid black;
    margin-left: 150px;
	margin-top: 10px;
    height: 380px;
    border-radius: 10px;
    box-sizing: border-box;
    box-shadow: 0 14px 28px rgba(0,0,0,0.2), 0 10px 10px rgba(0,0,0,0.22);
    cursor: pointer;
    transition: .4s;
    background: #f2f2f2;
}
	
.input{
	padding:10px;
	margin:10px;
}
article3 span{
	color:red;
}
.meter{
	width:15%;
}
</style>
</head>
<body>
<section>
<article class="article2">
<?php

include "admin/connection.php";
$order = $_GET['order'];

$sql = "select * from products where id = '$order'";

$run = mysqli_query($conn,$sql);


while($row=mysqli_fetch_array($run))
{
    $uid = $row['id'];
    $name = $row['name'];
    $price = $row['price'];
    $category_id = $row['category_id'];
	$image=$row['image'];

}

?>


<div class="card1">
<div class="image">
<img src="admin/uploads/<?php echo $image?>" class="img1">
</div>
<div class="product-name">
<p><span><?php echo $name ?><span> </p>
<p><span class="offer">₹<?php echo $price ?></span></p>
<p><span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span></p>
</div>	
</div>
</article>
<article class="article3">
<h2>ORDER FORM</h2>
<form action="oinsert.php" method="post">
<input type="number" placeholder="Meter" class="input meter" name="meter" value=1>
<br>
<input type="text" class="input" name="name" placeholder="Enter Your Name">
</br>
<input type="email"class="input" name="mail" placeholder="Enter Your Email">
</br>
<input type="number"class="input"name="number" placeholder="Enter Your Mobile Number">
</br>
<input type="hidden" value="<?php echo $order?>" name="pid">
<input type="hidden"value="<?php echo $name?>" name="pname">
<input type="hidden"value="<?php echo $price?>" name="price">
<input type="hidden"value="<?php echo $image?>" name="image">
<textarea cols="20" rows="6" name="location" placeholder="Location" class="input"></textarea>
<span id="er4"></span>
</br>
<input type="Submit" value="submit"class="input"name="submit">
</form>
</article>
</section>
<?php
	if(isset($_GET["err"]))
	{
		echo "<p id=err>Order Not Stored</p>";
	}
?>
<?php
include "footer.php";
?>