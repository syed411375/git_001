<?php
include "header.php";
?>
<html>
<head>
<link rel="stylesheet" href="index.css">
<title>Wool Page</title>
</head>
<body>
<article id="container1">


 <?php
        include "admin/connection.php";
        $sql = "select * from products where id and category_id=3" ;
        $run = mysqli_query($conn, $sql);
        $id= 1;
        while($row = mysqli_fetch_array($run))
        {
            $uid = $row['id'];
            $name = $row['name'];
            $price = $row['price'];
            $category = $row['category_id'];
	     	$image=$row['image'];
           ?>

<div class="card1">
<div class="image">
<a href='order.php?order=<?php echo $uid ?>'>
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
</a>
</div>	
</div>

	<?php $id++; } ?> 

</article>

<?php
include "footer.php";
?>
</body>
</html>