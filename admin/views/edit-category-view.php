<?php
	$odjEditCetagory = new Admin;

	if (isset($_GET['status'])) {
		
		if ($_GET['status']=='edit') {
			
			$returncategory = $odjEditCetagory->get_category_info($_GET['id']);

			$_SESSION['cat_id'] = $_GET['id'];
		}
		else{
			$data = 'logout';
			$odjEditCetagory->admin_logout($data);
		}
	}
	else{
		$data = 'logout';
		$odjEditCetagory->admin_logout($data);
	}

	if (isset($_POST['update_cet'])) {

		$cetImage = $_FILES['cet_img'];
		
		$returnMesage = $odjEditCetagory->update_category($_POST,$cetImage);
	}

?>
<h1>Edit category</h1>
<?php
	if (isset($returnMesage)) {
		echo "<h2>{$returnMesage}</h2>";
	}
?>
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="cet_name">category Name</label>
		<input type="text" value="<?php echo $returncategory['cet_name'];?>" name="cet_name" class="form-control">
	</div>
	<div class="form-group">
		<label for="cet_des">category Description</label>
		<textarea name="cet_des" class="form-control"><?php echo $returncategory['cet_name'];?></textarea>
	</div>
	<div class="form-group">
		<label for="cet_status">category Status</label>
		<select name="cet_status" class="form-control">
			<option>Select Status</option>
			<option <?php
			if($returncategory['cet_status']==1){
				echo "selected";
			}
		?> value="1">Published</option>
			<option <?php
			if($returncategory['cet_status']==0){
				echo "selected";
			}
		?>
			value="0">Un Published</option>
		</select>
	</div>
	<div class="form-group">
		<label for="cet_img">category Image</label>
		<img style="width:100px;" src="uploads/<?php echo $returncategory['cet_img'];?>">
		<input type="file" name="cet_img" class="form-control">
	</div>
	<div style="float: right;" class="form-group">
		<input type="submit" name="update_cet" value="Update category" class="btn btn-primary">
	</div>
	
</form>