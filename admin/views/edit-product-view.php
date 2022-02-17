<?php
	$odjEditProduct = new Admin;

	if (isset($_GET['status'])) {
		
		if ($_GET['status']=='edit') {

			$returnProduct = $odjEditProduct->get_product_info($_GET['id']);

			$_SESSION['product_id'] = $_GET['id'];

			$infoCategory = $odjEditProduct->display_category();

		}
		else{
			$data = 'logout';
			$odjEditProduct->admin_logout($data);
		}
	}
	else{
		$data = 'logout';
		$odjEditProduct->admin_logout($data);
	}

	if (isset($_POST['update_product'])) {

		$returnMesage = $odjEditProduct->update_product($_POST);

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
		<input type="text" name="pdt_name" value="<?php echo $returnProduct['product_name'];?>" class="form-control">
	</div>
	<div class="form-group">
		<label for="pdt_r_price">Product Regular Price</label>
		<input type="number" name="pdt_r_price" value="<?php echo $returnProduct['product_r_price'];?>" class="form-control">
	</div>
	<div class="form-group">
		<label for="pdt_d_price">Product Discount Price</label>
		<input type="number" name="pdt_d_price" value="<?php echo $returnProduct['product_d_price'];?>" class="form-control">
	</div>
	<div class="form-group">
		<label for="pdt_des">Product Description</label>
		<textarea name="pdt_des" class="form-control"><?php echo $returnProduct['product_d_price'];?></textarea>
	</div>
	<div class="form-group">
		<label for="pdt_status">Product Category</label>
		<select name="pdt_cat" class="form-control">
			<option>Select Category</option>
			<?php
				while($category=mysqli_fetch_assoc($infoCategory)){
					?>
					<option <?php if ($returnProduct['product_cat']==$category['cet_id']){ echo "selected"; } ?>
						 value="<?php echo $category['cet_id'];?>"><?php echo $category['cet_name'];?></option>
					<?php
				}
			?>
		</select>
	</div>
	<div class="form-group">
		<label for="pdt_img">Product Image</label>
		<img src="products/<?php echo $returnProduct['product_image'];?>">
		<input type="file" name="pdt_img" class="form-control">
	</div>
	<div style="float: right;" class="form-group">
		<input type="submit" name="update_product" value="Update Product" class="btn btn-primary">
	</div>
	
</form>