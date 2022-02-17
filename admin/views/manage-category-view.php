<?php
	$odjDisplaycetagory = new Admin;

	$displaycategory = $odjDisplaycetagory->display_category();

	if (isset($_GET['status'])) {
		if ($_GET['status']=='Publish') {

			$odjDisplaycetagory->publish_category($_GET);
		}
		elseif($_GET['status']=='unPublish'){

			$odjDisplaycetagory->un_publish_category($_GET);
		}
		elseif($_GET['status']=='delete'){

			$odjDisplaycetagory->delete_category($_GET);
		}
	}
?>
<h2>Manage Cetagory</h2>
<table class="table">
	<head>
		<tr>
			<th>category Id</th>
			<th>category Image</th>
			<th>category Name</th>
			<th>Status</th>
			<th>Update/Delete</th>
		</tr>
	</head>
	<tbody>
		<?php
			while ($category = mysqli_fetch_assoc($displaycategory)) {
				?>
				<tr>
					<td><?php echo $category['cet_id'];?></td>
					<td>
						<img style="width: 100px;" src="uploads/<?php echo $category['cet_img'];?>">	
					</td>
					<td><?php echo $category['cet_name'];?></td>
					<td>
						<?php
						if ($category['cet_status']==1) {
							echo "Published <a href='?status=unPublish&&id=".$category["cet_id"]."'><button class='btn btn-sm btn-danger'>Make Un Published</button></a>";

						}
						else{
							echo "Un Published <a href='?status=Publish&&id=".$category["cet_id"]."'><button class='btn btn-sm btn-success'>Make Published</button></a>";
						}
						?>
					</td>
					<td>
						<a href="edit-category.php?status=edit&&id=<?php echo $category["cet_id"];?>"><button class="btn btn-primary">Edit</button></a>
						<a href="?status=delete&&id=<?php echo $category["cet_id"];?>"><button class="btn btn-danger">Delete</button></a>
					</td>
				</tr>
				<?php
			}
		?>
	</tbody>
</table>