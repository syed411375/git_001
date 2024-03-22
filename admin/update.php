<head>
<link rel="stylesheet" href="adminside.css">
</head>
	<?php

include "connection.php";
$edit = $_GET['edit'];

$sql = "select * from products where id = '$edit'";

$run = mysqli_query($conn,$sql);


while($row=mysqli_fetch_array($run))
{
    $uid = $row['id'];
    $name = $row['name'];
    $price = $row['price'];
    $category_id = $row['category_id'];

}

?>

<?php
include "connection.php";
      if(isset($_POST['submit']))
        {
          $edit = $_GET['edit'];  
          $name = $_POST['name'];
          $price = $_POST['price'];
          $category_id = $_POST['category_id'];
			$sql = "update products set name= '$name',price= '$price',category_id='$category_id' where id =  '$edit'";

           if(mysqli_query($conn,$sql))
           {

            echo '<script> location.replace("aindex.php")</script>';  
           }
           else
           {
           echo "Some thing Error" . $connection->error;

           }
}

?>
<div class="container">
	<div class="title">Update Product</div>
    <div class="content">
	<form method="post" action="" enctype="multipart/form-data">
	<div class="user-details">
          <div class="input-box">
		  <input type="hidden" name="id" value="<?php echo $id ?>">
		<label class="details">Product Name</label>
		<input type="text" name="name" value="<?php echo $name ?>">
	</div>
	<div class="input-box">
		<label>Price</label>
		<input type="number" name="price"  value="<?php echo $price ?>" >
	</div>
	<div class="input-box">
		  <label for="category_id" class="details">Category:</label><br/>
          <select id="category_id" name="category_id" value="<?php echo $category_id ?>">
			<?php
			// Fetch categories from the database
			$conn = mysqli_connect("localhost", "root","", "shop");
			$sql_categories = "SELECT id, name FROM categories";
			$result = $conn->query($sql_categories);
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
				}
			}
			?>
		</select></div></div>
	<div class="button">
	<input type="hidden" name="id" value="<?php echo $product['id']; ?>">
		<input type="submit" name="submit" value="Add Product" class="btn btn-primary">
	</div>
	</form>
</div></div>
