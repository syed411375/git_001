<html>
<head>
<link rel="stylesheet" href="adminside.css">
<style>
.btn{
	background-color:#1F7A8C;
	padding:10px;
	border:1px solid #fff;
	border-radius:5px;
	margin-left:120px;
}
.btn1{
	background-color:red;
	padding:10px;
	border:1px solid #fff;
	border-radius:5px;
	float:right;
	margin-right:120px;
}
a{
	text-decoration:none;
}
</style>
</head>
<body>
<h1 id="title">Product List</h1>
<button class="btn"><a href="form.php" style="color:#fff" >Add New Product</a></button>
<button class="btn1"><a href="../login.php" style="color:#fff">Logout</a></button>
<div class="container1">

<table class="content-table">
<thead>
<tr>
<th>Product Name</th>
<th>Photo</th>
<th>Product Price</th>
<th>Category</th>
<th>EDIT</th>
<th>DELETE</th>
</tr>
 </thead>
 <tbody>
<tbody>
    <?php
        include "connection.php";
        $sql = "select * from products";
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

            <tr>
                <td><?php echo $name?></td>
                <td><img src="uploads/<?php echo $image ?>" width='50px' height='50px'></td>
                <td><?php echo $price ?></td>
                <td><?php echo $category ?></td>
                <td><button> <a href='update.php?edit=<?php echo $uid ?>'> Edit </a> </button> </td>
                <td><button ><a href='delete.php?del=<?php echo $uid ?>'> Delete </a> </button> </td>
            </tr>
            <?php $id++; } ?>               
            </tbody>
        </table>
     </body>

</html>