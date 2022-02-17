<?php
	$odjDisplayProduct = new Admin;

	$displayProduct = $odjDisplayProduct->display_product();

	if (isset($_GET['status'])) {
		if ($_GET['status']=='Publish') {

			$odjDisplayProduct->publish_product($_GET);
		}
		elseif($_GET['status']=='unPublish'){

			$odjDisplayProduct->un_publish_product($_GET);
		}
		elseif($_GET['status']=='delete'){

			$odjDisplayProduct->delete_product($_GET);
		}
	}
?>
<h2>Manage Products</h2>
<table class="table">
	<head>
		<tr>
			<th>Id</th>
			<th>Image</th>
			<th>Name</th>
			<th>R Price</th>
			<th>D Price</th>
			<th>product</th>
			<th>Status</th>
			<th>Update/Delete</th>
		</tr>
	</head>
	<tbody>
		<?php
			while ($product = mysqli_fetch_assoc($displayProduct)) {
				?>
				<tr>
					<td><?php echo $product['product_id'];?></td>
					<td>
						<img style="width: 100px;" src="products/<?php echo $product['product_image'];?>">	
					</td>
					<td><?php echo $product['product_name'];?></td>
					<td><?php echo $product['product_r_price'];?></td>
					<td><?php echo $product['product_d_price'];?></td>
					<td><?php echo $product['cet_name'];?></td>
					<td>
						<?php
						if ($product['product_status']==1) {
							echo "Published <a href='?status=unPublish&&id=".$product["product_id"]."'><button class='btn btn-sm btn-danger'>Make Un Published</button></a>";

						}
						else{
							echo "Un Published <a href='?status=Publish&&id=".$product["product_id"]."'><button class='btn btn-sm btn-success'>Make Published</button></a>";
						}
						?>
					</td>
					<td>
						<a href="edit-product.php?status=edit&&id=<?php echo $product["product_id"];?>"><button class="btn btn-primary">Edit</button></a>
						<a href="?status=delete&&id=<?php echo $product["product_id"];?>"><button class="btn btn-danger">Delete</button></a>
					</td>
				</tr>
				<?php
			}
		?>
	</tbody>
</table>