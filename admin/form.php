<head>
<link rel="stylesheet" href="adminside.css">
</head>
<div class="container">
	<div class="title">Add Product</div>
    <div class="content">
	<form method="post" action="insert.php" enctype="multipart/form-data">
	<div class="user-details">
          <div class="input-box">
		<label class="details">Product Name</label>
		<input type="text" name="name" class="form-control">
	</div>
	<div class="input-box">
		<label>Price</label>
		<input type="number" name="price" class="form-control">
	</div>
	<div class="input-box">
		<label>Profile Pic</label>
		<input type="file" name="pic" class="form-control">
	</div>
	<div class="input-box">
		  <label for="category_id" class="details">Category:</label><br/>
          <select id="category_id" name="category_id">
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
		<input type="submit" name="submit" value="Add Product" class="btn btn-primary">
	</div>
	<?php
	if(isset($_GET["err"]))
	{
		echo "<p id=err>File Size Too Small</p>";
	}
	?>
	</form>
</div></div>
