<?php
include 'connection.php';

/*---------------Admains-----------------*/

//add
if (isset($_POST['add_admin'])) {
    $name       = $_POST['admin_name'];
    $email      = $_POST['admin_email'];
    $password   = $_POST['admin_password'];
    $file       = $_FILES['fileToUpload'];//return image information ia assoc array 
    $image      = $file["name"];//$file is the array name 
    $new_image  = uniqid("IMG-", true).'.png';
    $file_des   = "../uploads/".$new_image;//file destination
    move_uploaded_file($file['tmp_name'], $file_des);
    $conn->query("INSERT INTO admins ( admin_name, admin_email , admin_password,admin_img) 
                   VALUES            ('$name', '$email', '$password', '$new_image')") or die($conn->error);
    header('location:admin_dashboard.php');
    }

//To delete Admin 
if (isset($_GET['delete_admin'])) {
    $id = $_GET["delete_admin"];
    $conn->query("DELETE FROM admins WHERE admin_id=$id") or die($conn->error);
    header('location:admin_dashboard.php');
}

//save the info after editting it for admain
if (isset($_POST['update_admin'])) {
    $id             = $_POST['admin_id_hidden'];
    $admin_name     = $_POST['admin_name'];
    $admin_email    = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];

    $file       = $_FILES['fileToUpload'];//return image information ia assoc array 
    $image      = $file["name"];//$file is the array name 
    $new_image  = uniqid("IMG-", true).'.png';
    $file_des   = "../uploads/".$new_image;//file destination
    move_uploaded_file($file['tmp_name'], $file_des);
   
   $conn->query("UPDATE admins SET admin_img = '$new_image', admin_name = '$admin_name', admin_email='$admin_email', admin_password ='$admin_password'
                  WHERE admin_id = '$id' ") or die($conn->error);
   header('location:admin_dashboard.php');
}
/*-----------------Users--------------------*/
//adding new user
if (isset($_POST['add_user'])) {
    $name       = $_POST['user_name'];
    $email      = $_POST['user_email'];
    $password   = $_POST['user_password'];
    
    $file       = $_FILES['fileToUpload'];
    $image      = $file["name"];
    $new_image  = uniqid("IMG-", true).'.png';
    $file_des   = "../uploads/".$new_image;
    
    move_uploaded_file($file['tmp_name'], $file_des);
    $conn->query("INSERT INTO users ( user_name ,user_email ,user_password ,user_img )
                 VALUES ( '$name', '$email','$password' , '$new_image')") or die($conn->error);
   header('location:manage_users.php');

}

//delete user
if (isset($_GET['delete_user'])) {
    $id = $_GET["delete_user"];
    $conn->query("DELETE FROM users WHERE user_id= $id") or die($conn->error);
   header('location:manage_users.php');
}


//save the info after editting it
if (isset($_POST['update_user'])) {
    $id         = $_POST['user_id_hidden'];
    $name       = $_POST['user_name'];
    $email      = $_POST['user_email'];
    $password   = $_POST['user_password'];
    //to uploade img
    $file       = $_FILES['fileToUpload'];
    $user_image = $file["name"];
    $new_image  = uniqid("IMG-", true) . '.png';
    $file_des   = "../uploads/" . $new_image;
    
    move_uploaded_file($file['tmp_name'], $file_des);
    $conn->query("UPDATE users 
                  SET user_name = '$name', user_email='$email', user_password='$password', user_img='$new_image'  
                  WHERE user_id = '$id' ") or die($conn->error);
   
    header('location:manage_users.php?');
}

/*---------------Categories-----------------*/
//add to categories
$category = $new_image = $update = '';
if (isset($_POST['add_category'])) {
    $category       = $_POST['category_name'];
    $file           = $_FILES['fileToUpload'];
    $caterory_image = $file["name"];
    $new_image      = uniqid("IMG-", true) . '.png';
    $file_des       = "../uploads/" . $new_image;
    move_uploaded_file($file['tmp_name'], $file_des);
    $conn->query("INSERT INTO categories (category_name, category_img) VALUES ('$category', '$new_image')") or die($conn->error);
    header('location:manage_categories.php');
}

// delete category
if (isset($_GET['delete_cat'])) {
    $id = $_GET["delete_cat"];
    $conn->query("DELETE FROM categories WHERE category_id = $id ") or die($conn->error);
    header('location:manage_categories.php');
}

//To edit category name
$category_name = '';
if (isset($_GET['edit_cat'])) {
    $id             = $_GET['edit_cat'];
    $update         = true;
    $result         = $conn->query("SELECT * FROM categories WHERE category_id ='$id'") or die($conn->error);
    $row            = $result->fetch_array();
    $category       = $row['category_name'];  
}

//To save the changes after edittig
if (isset($_POST['update_category'])) {
    $id             = $_POST['category_id'];
    $category       = $_POST['category_name'];
    $file           = $_FILES['fileToUpload'];
    $caterory_image = $file["name"];
    $new_image      = uniqid("IMG-", true) . '.png';
    $file_des       = "../uploads/" . $new_image;
    move_uploaded_file($file['tmp_name'], $file_des);
    $conn->query("UPDATE categories SET category_name = '$category', category_img = '$new_image '  WHERE category_id = '$id' ") or die($conn->error);
    header('location:manage_categories.php');
}

/*---------------Orders-----------------*/
//  To delete order
if (isset($_GET['delete_order'])) {
    $id = $_GET["delete_order"];
    $conn->query("DELETE FROM orders WHERE order_id = $id ") or die($conn->error);
    header('location:manage_orders.php');
}


/*---------------Comments-----------------*/
//  To delete comments
if (isset($_GET['delete_comment'])) {
    $id = $_GET["delete_comment"];
    $conn->query("DELETE FROM comments WHERE comment_id = $id ") or die($conn->error);
    header('location:manage_orders.php');
}
 //---------------------------------------------------------------------------------
 //---------------------------------------------------------------------------------


 //add to categories
$p_name = $p_des = $p_img1 = $p_img2 = $p_img3 = $sale_q= $price 
        = $sale_price = $sale_status = $tags = $category = '';
if (isset($_POST['add_product'])) {
    $p_name         = $_POST["name"];
    $p_des          = $_POST['product_des'];
    //main img 
    $file           = $_FILES['fileToUpload'];
    $p_img1         = $file["name"];
    $new_image1      = uniqid("IMG-", true) . '.png';
    $file_des       = "../uploads/" . $new_image1 ;
    move_uploaded_file($file['tmp_name'], $file_des);
    //main img2
    $file           = $_FILES['fileToUpload2'];
    $p_img2         = $file["name"];
    $new_image2      = uniqid("IMG-", true) . '.png';
    $file_des       = "../uploads/" . $new_image2;
    move_uploaded_file($file['tmp_name'], $file_des);
    //main img3
    $file           = $_FILES['fileToUpload3'];
    $p_img3         = $file["name"];
    $new_image3      = uniqid("IMG-", true) . '.png';
    $file_des       = "../uploads/" .$new_image3;
    move_uploaded_file($file['tmp_name'], $file_des);
    //
    $price         = $_POST['product_price'];
    $sale_price    = $_POST['product_on_sale'];
    $sale_flage    = $_POST['product_sale_flag'];
    $sale_q        = $_POST['product_quantity'];
    $tags          = $_POST['product_tag'];
    $category      = $_POST['category_name'];
    
   echo  $category,  $p_name, $p_des ;

    $conn->query("INSERT INTO products ( product_name, product_description, 
                              product_main_img, product_sub1_img,
                              product_sub2_img, product_price, product_sale_price,
                              product_quantity,category_id,product_tags, product_sale_status
                              ) 
    
                 VALUES ('$p_name ', '$p_des',  '$new_image1', '$new_image2', '$new_image3'
                 , '$price ','$sale_price', '  $sale_q', '$category' , '  $tags ','$sale_flage')") or die($conn->error);
   
  header('location:manage_products.php');
}

//delete Products
if (isset($_GET['delete_product'])) {
    $id = $_GET["delete_product"];
    $conn->query("DELETE FROM products WHERE product_id = $id ") or die($conn->error);
    header('location:manage_products.php');
}

///
if (isset($_POST['update_product'])) {
    $id             = $_POST['product_id_hidden'];
    $p_name         = $_POST["name"];
    $p_des          = $_POST['product_des'];
    //main img 
    $file           = $_FILES['fileToUpload'];
    $p_img1         = $file["name"];
    $new_image1      = uniqid("IMG-", true) . '.png';
    $file_des       = "../uploads/".$new_image1 ;
    move_uploaded_file($file['tmp_name'], $file_des);
    //main img2
    $file           = $_FILES['fileToUpload2'];
    $p_img2         = $file["name"];
    $new_image2      = uniqid("IMG-", true) . '.png';
    $file_des       = "../uploads/".$new_image2;
    move_uploaded_file($file['tmp_name'], $file_des);
    //main img3
    $file           = $_FILES['fileToUpload3'];
    $p_img3         = $file["name"];
    $new_image3      = uniqid("IMG-", true) . '.png';
    $file_des       = "../uploads/".$new_image3;
    move_uploaded_file($file['tmp_name'], $file_des);
    //
    $price         = $_POST['product_price'];
    $sale_price    = $_POST['product_on_sale'];
    $sale_flage    = $_POST['product_sale_flag'];
    $sale_q        = $_POST['product_quantity'];
    $tags          = $_POST['product_tag'];
    $category      = $_POST['category_name'];
    
  echo  $category,  $p_name, $p_des ;

    $conn->query("UPDATE products 
                  SET    product_name = '$p_name' , product_description = '$p_des', 
                         product_main_img = '$new_image1', product_sub1_img = '$new_image2',
                         product_sub2_img = '$new_image3', product_price = '$price' , product_sale_price = '$sale_price',
                         product_quantity = '$sale_q' ,category_id = '$category' ,product_tags = '$tags ', product_sale_status = '$sale_flage'
                  WHERE  product_id = '$id' ") or die($conn->error);
   
   header('location:manage_products.php');
}
