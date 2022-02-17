<?php
	class Admin{

		// database connection
		private $conn;

		public function __construct(){
			
			$dbHost	= "localhost";
			$dbUser	= "root";
			$dbPass = "";
			$dbname = "ecom";

			$this->conn=mysqli_connect($dbHost,$dbUser,$dbPass,$dbname);
			
			if (!$this->conn) {
				die("Database Connection Error");
			}

		}
		//end database connection

		// admin login
		function admin_login($data){

			$adminEmail	 = $data['email'];
			$adminPass	 = md5($data['password']);


			$loginQuery	 = "SELECT * FROM admin WHERE email = '$adminEmail' AND password = '$adminPass'";

			if (mysqli_query($this->conn,$loginQuery)) {
				
				$result = mysqli_query($this->conn,$loginQuery);

				$adminInfo = mysqli_fetch_assoc($result);

				if ($adminInfo) {
					

					$_SESSION['id'] 	= $adminInfo['id'];
					$_SESSION['email'] 	= $adminInfo['email'];
					$_SESSION['name'] 	= $adminInfo['name'];

					header('location:dashboard.php');
				}
				else{
					$errMsg = "Your User Email Or Password Is Wrong!!!!";
					return $errMsg;
				}
			}
		}
		//end admin login

		// admin logout
		function admin_logout($data){
			$logOut = 'logout';
			if($logOut==$data){
				unset($_SESSION['id']);
				unset($_SESSION['email']);
				unset($_SESSION['name']);
				header('location:index.php');
			}

		}
		//end admin logout

		// add category
		function add_category($data, $cetImage){
			$cet_name = $data['cet_name'];
			$cet_des  = $data['cet_des'];
			$cet_status = $data['cet_status'];
			$file = $cetImage;

			$allow = array('jpg', 'jpeg', 'png');
		   	$exntension = explode('.', $file['name']);
		   	$fileActExt = strtolower(end($exntension));
		   	$fileName = str_replace(' ', '_', $cet_name);
		   	$fileNew = $fileName."." . $fileActExt;
		   	$filePath = 'uploads/'.$fileNew;

		   	if (in_array($fileActExt, $allow)) {
    		          if ($file['size'] > 0 && $file['error'] == 0) {
		            if (move_uploaded_file($file['tmp_name'], $filePath)) {

		            	$addcategoryQuery = "INSERT INTO category (cet_name,cet_des,cet_status,cet_img) VALUES('$cet_name','$cet_des', $cet_status, '$fileNew')";
						if (mysqli_query($this->conn,$addcategoryQuery)) {
							$successMesage = "New category Added Succesfully";
							return $successMesage;
						}
						else{
							$errorMesage = "New category Not Added Succesfully";
							return $errorMesage;
						}
		            }
		        }
		    }
		}
		//end add category

		// display category
		function display_category(){
			$displaycategoryQuery = "SELECT * FROM category";
			if (mysqli_query($this->conn,$displaycategoryQuery)) {
				$returnAllCetefory = mysqli_query($this->conn,$displaycategoryQuery);
				return $returnAllCetefory;
			}

		}
		//end display category

		// display published category
		function display_p_category(){
			$displaycategoryQuery = "SELECT * FROM category Where cet_status=1";
			if (mysqli_query($this->conn,$displaycategoryQuery)) {
				$returnAllCetefory = mysqli_query($this->conn,$displaycategoryQuery);
				return $returnAllCetefory;
			}

		}
		//end display published category

		// update cetegry stauts
		function publish_category($id){
			$cet_id = $id['id'];

			$publish_category_query = "UPDATE category SET cet_status=1 WHERE cet_id=$cet_id";
			if (mysqli_query($this->conn,$publish_category_query)) {
				// code...
			}

		}
		function un_publish_category($id){
			$cet_id = $id['id'];

			$un_publish_category_query = "UPDATE category SET cet_status=0 WHERE cet_id=$cet_id";
			if (mysqli_query($this->conn,$un_publish_category_query)) {
				// code...
			}

			
		}
		//end update cetegry stauts

		// delete category 
		function delete_category($id){
			$cet_id = $id['id'];

			$getcategoryImageNameQuery = "SELECT cet_img FROM category WHERE cet_id=$cet_id";

			if (mysqli_query($this->conn,$getcategoryImageNameQuery)) {

				$result = mysqli_query($this->conn,$getcategoryImageNameQuery);

				$getcategoryImageName = mysqli_fetch_assoc($result);
				
				$path = "uploads/".$getcategoryImageName['cet_img'];

				unlink($path);
			}

			$delete_category_query = "DELETE FROM category WHERE cet_id=$cet_id";
			if (mysqli_query($this->conn,$delete_category_query)) {
				//code...
			}
		}

		// get category info for edit
		function get_category_info($id){
			$getcategoryQuery = "SELECT * FROM category WHERE cet_id = $id";
			if (mysqli_query($this->conn,$getcategoryQuery)) {
				$returncategory = mysqli_query($this->conn,$getcategoryQuery);
				$returncategory = mysqli_fetch_assoc($returncategory);
				return $returncategory;
			}

		}
		//end get category info for edit

		// update category
		function update_category($data, $cetImage){
			
			$cet_name = $data['cet_name'];
			$cet_des  = $data['cet_des'];
			$cet_status = $data['cet_status'];
			
			$file = $cetImage;

			$cet_id = $_SESSION['cat_id'];

			$getcategoryImageNameQuery = "SELECT cet_img FROM category WHERE cet_id=$cet_id";

			if (mysqli_query($this->conn,$getcategoryImageNameQuery)) {
				$result = mysqli_query($this->conn,$getcategoryImageNameQuery);

				$getcategoryImageName = mysqli_fetch_assoc($result);
				
				$categoryImageName = $getcategoryImageName['cet_img'];

				if ($categoryImageName==true) {
					
					$allow = array('jpg', 'jpeg', 'png');
				   	$exntension = explode('.', $file['name']);
				   	$fileActExt = strtolower(end($exntension));
				   	$fileName = $categoryImageName;
				   	$fileNew = $fileName;
				   	$filePath = 'uploads/'.$fileNew;

				   	if (in_array($fileActExt, $allow)) {
	    		          if ($file['size'] > 0 && $file['error'] == 0) {
				            if (move_uploaded_file($file['tmp_name'], $filePath)) {

				            	$update_category_query = "UPDATE category SET cet_name = '$cet_name', cet_des = '$cet_des', cet_status= $cet_status WHERE cet_id=$cet_id";
								if (mysqli_query($this->conn,$update_category_query)) {
									// code...
								}
				            }
			        	}
			        }

				}
				else{
					$allow = array('jpg', 'jpeg', 'png');
				   	$exntension = explode('.', $file['name']);
				   	$fileActExt = strtolower(end($exntension));
				   	$fileName = str_replace(' ', '_', $cet_name);
				   	$fileNew = $fileName."." . $fileActExt;
				   	$filePath = 'uploads/'.$fileNew;

				   	if (in_array($fileActExt, $allow)) {
	    		          if ($file['size'] > 0 && $file['error'] == 0) {
				            if (move_uploaded_file($file['tmp_name'], $filePath)) {

				            	$update_category_query = "UPDATE category SET cet_name = '$cet_name', cet_des = '$cet_des', cet_img = '$fileNew', cet_status= $cet_status WHERE cet_id=$cet_id";
								if (mysqli_query($this->conn,$update_category_query)) {
									// code...
								}
				            }
			        	}
			        }
				}

			}
			else{

			}

		}
		//end update category

		// add new product

		function add_product($data, $productImage){

			$file = $productImage;

			$productName = $data['pdt_name'];
			$productRPrice = $data['pdt_r_price'];
			$productDPrice = $data['pdt_d_price'];
			$productCategory = $data['pdt_cat'];
			$productDescription = $data['pdt_des'];


			$allow = array('jpg', 'jpeg', 'png');
		   	$exntension = explode('.', $file['name']);
		   	$fileActExt = strtolower(end($exntension));
		   	$fileName = str_replace(' ', '_', $productName);
		   	$fileNew = $fileName."." . $fileActExt;
		   	$filePath = 'products/'.$fileNew;

		   	if (in_array($fileActExt, $allow)) {
    		          if ($file['size'] > 0 && $file['error'] == 0) {
		            if (move_uploaded_file($file['tmp_name'], $filePath)) {

		            	$addProductQuery = "INSERT INTO products (product_name, product_r_price, product_d_price, product_cat, product_des, product_image) VALUES('$productName', $productRPrice, $productDPrice, $productCategory, '$productDescription', '$fileNew')";
						if (mysqli_query($this->conn,$addProductQuery)) {
							$successMesage = "New Product Added Succesfully";
							return $successMesage;
						}
						else{
							$errorMesage = "New Product Not Added Succesfully";
							return $errorMesage;
						}
		            }
		        }
		    }
		    else{
		    	$errorMesage = "New Product Not Added Succesfully";
				return $errorMesage;
		    }
		}
		// end add new product

		// display Product

		function display_product(){
			$displayProductyQuery = "SELECT * FROM 	products_cat_info";
			if (mysqli_query($this->conn,$displayProductyQuery)) {
				$returnAllProduct = mysqli_query($this->conn,$displayProductyQuery);
				return $returnAllProduct;
			}	
		}

		// update product stauts
		function publish_product($id){
			$product_id = $id['id'];

			$publish_product_query = "UPDATE products SET product_status=1 WHERE product_id=$product_id";
			if (mysqli_query($this->conn,$publish_product_query)) {

			}
		}
		function un_publish_product($id){
			echo $product_id = $id['id'];

			$un_publish_product_query = "UPDATE products SET product_status=0 WHERE product_id=$product_id";
			if (mysqli_query($this->conn,$un_publish_product_query)) {
		
			}
		}
		//end update product stauts


		// delete product 
		function delete_product($id){
			$product_id = $id['id'];

			$getProductImageNameQuery = "SELECT product_image FROM products WHERE product_id=$product_id";

			if (mysqli_query($this->conn,$getProductImageNameQuery)) {

				$result = mysqli_query($this->conn,$getProductImageNameQuery);

				$getProductImageName = mysqli_fetch_assoc($result);
				
				$path = "products/".$getProductImageName['product_image'];

				unlink($path);
			}

			$delete_product_query = "DELETE FROM products WHERE product_id=$product_id";
			if (mysqli_query($this->conn,$delete_product_query)) {
				//code...
			}
		}
		//end delete product 

		// get product info for edit
		function get_product_info($id){
			$getProductQuery = "SELECT * FROM products WHERE product_id = $id";
			if (mysqli_query($this->conn,$getProductQuery)) {
				$returnProduct = mysqli_query($this->conn,$getProductQuery);
				$returnProduct = mysqli_fetch_assoc($returnProduct);
				return $returnProduct;
			}

		}
		//end get product info for edit


		// update product
		function update_product($data){

			$product_id = $_SESSION['product_id'];

			echo $productName = $data['pdt_name'];
			$productRPrice = $data['pdt_r_price'];
			$productDPrice = $data['pdt_d_price'];
			$productCategory = $data['pdt_cat'];
			$productDescription = $data['pdt_des'];

			$file = $_FILES['pdt_img'];


			if ($file['name']!=null) {

				$getProductImageNameQuery = "SELECT product_image FROM products WHERE product_id=$product_id";
				if (mysqli_query($this->conn,$getProductImageNameQuery)) {
					$result = mysqli_query($this->conn,$getProductImageNameQuery);

					$getProductImageName = mysqli_fetch_assoc($result);
					
					$categoryImageName = $getProductImageName['product_image'];

					if ($categoryImageName==true) {
						
						$allow = array('jpg', 'jpeg', 'png');
					   	$exntension = explode('.', $file['name']);
					   	$fileActExt = strtolower(end($exntension));
					   	$fileName = $categoryImageName;
					   	$fileNew = $fileName;
					   	$filePath = 'products/'.$fileNew;

					   	if (in_array($fileActExt, $allow)) {
		    		          if ($file['size'] > 0 && $file['error'] == 0) {
					            if (move_uploaded_file($file['tmp_name'], $filePath)) {

					            	$update_product_query = "UPDATE products SET product_name = '$productName', product_r_price = '$productRPrice', product_d_price= '$productDPrice', product_cat = $productCategory, product_des = '$productDescription', product_image ='$fileNew' WHERE product_id =$product_id";
									if (mysqli_query($this->conn,$update_product_query)) {
										// code...
									}
					            }
				        	}
				        }

					}
					else{
						$allow = array('jpg', 'jpeg', 'png');
					   	$exntension = explode('.', $file['name']);
					   	$fileActExt = strtolower(end($exntension));
					   	$fileName = str_replace(' ', '_', $cet_name);
					   	$fileNew = $fileName."." . $fileActExt;
					   	$filePath = 'products/'.$fileNew;

					   	if (in_array($fileActExt, $allow)) {
		    		          if ($file['size'] > 0 && $file['error'] == 0) {
					            if (move_uploaded_file($file['tmp_name'], $filePath)) {

					            	$update_product_query = "UPDATE products SET product_name = '$productName', product_r_price = '$productRPrice', product_d_price= '$productDPrice', product_cat = $productCategory, product_des = '$productDescription', product_image ='$fileNew' WHERE product_id =$product_id";
									if (mysqli_query($this->conn,$update_product_query)) {
										// code...
									}
					            }
				        	}
				        }
					}

				}
				else{

				}
			}
			else{
				$update_product_query = "UPDATE products SET product_name = '$productName', product_r_price = '$productRPrice', product_d_price= '$productDPrice', product_cat = $productCategory, product_des = '$productDescription' WHERE product_id =$product_id";
					if (mysqli_query($this->conn,$update_product_query)) {
						// code...
					}
			}
			

		}
		//end update product

		// display product category wise

		public function display_product_category_wise($id){

			$displayProductyQuery = "SELECT * FROM 	products_cat_info Where cet_id=$id";
			
			if (mysqli_query($this->conn,$displayProductyQuery)) {
				$displayProductCategoryWise = mysqli_query($this->conn,$displayProductyQuery);
				return $displayProductCategoryWise;
			}	
		}

		//end display product category wise

		public function display_single_product($id){



			$productId = $id;

			$displayProductQuery = "SELECT * FROM products_cat_info Where product_id=$productId";

			if (mysqli_query($this->conn,$displayProductQuery)) {
				$displayProduct = mysqli_query($this->conn,$displayProductQuery);
				
				return $displayProduct;

			}	


		}

		// user register 
		public function user_register($data){

			$user_name = $data['user_name'];
			$email = $data['email'];
			$f_name = $data['f_name'];
			$l_name = $data['l_name'];
			$mobile = $data['mobile'];
			$pass = md5($data['pass']);
			$c_pass = md5($data['c_pass']);


			$userQuery = "SELECT * FROM users Where user_email='$email'";

			$user=mysqli_query($this->conn,$userQuery);

			$row  = mysqli_num_rows($user);

			if ($row>=1) {
				$errorMesage = "This Email Already In Data base";
				return $errorMesage;
			}
			else{
				if ($pass==$c_pass) {
				
						$insertUser = "INSERT INTO users (user_name,user_f_name,user_l_name,user_email,user_pass,user_mobile) VALUES('$user_name', '$f_name', '$l_name', '$email', '$pass', '$mobile')";

						if (mysqli_query($this->conn,$insertUser)) {
							$successMesage = "New User Created Succesfully";
							return $successMesage;
						}
						else{
							$errorMesage = "New User Not Created";
							return $errorMesage;
						}
					}
					else{
						$errorMesage = "Password Not Match";
						return $errorMesage;
					}
			}

		}

		// user login
		function user_login($data){

			$adminEmail	 = $data['email'];
			$adminPass	 = md5($data['password']);

			if (empty($adminEmail) || empty($adminPass)) {
				
				$errMsg = "Your User Email Or Password Is Empty!!!!";
				return $errMsg;
			}
			else{
				$loginQuery	 = "SELECT * FROM users WHERE user_email = '$adminEmail' AND user_email = '$adminPass'";

				if (mysqli_query($this->conn,$loginQuery)) {
					
					$result = mysqli_query($this->conn,$loginQuery);

					$userInfo = mysqli_fetch_assoc($result);

					if ($userInfo) {
						

						$_SESSION['user_id'] 	= $userInfo['user_id'];
						$_SESSION['user_email'] 	= $userInfo['user_email'];
						$_SESSION['user_name'] 	= $userInfo['user_name'];

						header('location:user-profile.php');
					}
					else{
						$errMsg = "Your User Email Or Password Is Wrong!!!!";
						return $errMsg;
					}
				}
			}
		}
		//end user login
	}

