<?php
	if (isset($_POST['submit_cet'])) {
		$odjAddcetagory = new Admin;

		$cetImage = $_FILES['cet_img'];
		
		$returnMesage = $odjAddcetagory->add_category($_POST,$cetImage);
	}
?>
<h1>Add New category</h1>
<?php
	if (isset($returnMesage)) {
		echo "<h2>{$returnMesage}</h2>";
	}
?>
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="cet_name">category Name</label>
		<input type="text" name="cet_name" class="form-control">
	</div>
	<div class="form-group">
		<label for="cet_des">category Description</label>
		<input type="text" name="cet_des" class="form-control">
	</div>
	<div class="form-group">
		<label for="cet_status">category Status</label>
		<select name="cet_status" class="form-control">
			<option>Select Status</option>
			<option value="1">Published</option>
			<option value="0">Un Published</option>
		</select>
	</div>
	<div class="form-group">
		<label for="cet_img">category Image</label>
		<input type="file" name="cet_img" class="form-control">
	</div>
	<div style="float: right;" class="form-group">
		<input type="submit" name="submit_cet" value="Add New category" class="btn btn-primary">
	</div>
	
</form>