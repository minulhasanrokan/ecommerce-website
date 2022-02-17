<?php
	$odjAddProduct = new Admin;

	$infoCategory = $odjAddProduct->display_p_category();

	if (isset($_POST['submit_pdt'])) {
		
		$productImage = $_FILES['pdt_img'];
		
		$returnMesage = $odjAddProduct->add_product($_POST,$productImage);
	}
?>

<h2>Add New Product</h2>
<?php
	if (isset($returnMesage)) {
		echo "<h2>{$returnMesage}</h2>";
	}
?>
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="pdt_name">Product Name</label>
		<input type="text" name="pdt_name" class="form-control">
	</div>
	<div class="form-group">
		<label for="pdt_r_price">Product Regular Price</label>
		<input type="number" name="pdt_r_price" class="form-control">
	</div>
	<div class="form-group">
		<label for="pdt_d_price">Product Discount Price</label>
		<input type="number" name="pdt_d_price" class="form-control">
	</div>
	<div class="form-group">
		<label for="pdt_des">Product Description</label>
		<textarea name="pdt_des" class="form-control"></textarea>
	</div>
	<div class="form-group">
		<label for="pdt_status">Product Category</label>
		<select name="pdt_cat" class="form-control">
			<option>Select Category</option>
			<?php
				while($category=mysqli_fetch_assoc($infoCategory)){
					?>
					<option value="<?php echo $category['cet_id'];?>"><?php echo $category['cet_name'];?></option>
					<?php
				}
			?>
			
		</select>
	</div>
	<div class="form-group">
		<label for="pdt_img">Product Image</label>
		<input type="file" name="pdt_img" class="form-control">
	</div>
	<div style="float: right;" class="form-group">
		<input type="submit" name="submit_pdt" value="Add New category" class="btn btn-primary">
	</div>
	
</form>