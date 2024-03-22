<html>
<head>
<link rel="stylesheet" href="admin/adminside.css">
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
<h1 id="title">Order List</h1>

<div class="container1">

<table class="content-table">
<thead>
<tr>
<th>Product Name</th>
<th>Meter</th>
<th>Product Price</th>
<th>Name</th>
<th>Email</th>
<th>Phone Number</th>
<th>Address</th>
</tr>
 </thead>
 <tbody>
<tbody>
    <?php
        include "admin/connection.php";
        $sql = "select * from order_details ";
        $run = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($run))
        {
            $uid = $row['id'];
			$pname=$row['productname'];
			$meter=$row['quantity'];
			$price=$row['price'];
            $name = $row['name'];
            $email = $row['email'];
            $phone = $row['phone'];
	     	$address=$row['address'];
            ?>

            <tr>
                <td><?php echo $pname?></td>
                <td><?php echo $meter?></td>
                <td><?php echo $price ?></td>
                <td><?php echo $name ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo $phone ?></td>
                <td><?php echo $address ?></td>
            </tr>  
		<?php }?>			
            </tbody>
        </table>
     </body>

</html>