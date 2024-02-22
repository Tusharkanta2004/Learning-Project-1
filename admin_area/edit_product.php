
<?php


if(isset($_GET['edit_products'])) {
    $edit_id = $_GET['edit_products'];
    $get_data = "SELECT * FROM `products` WHERE product_id = $edit_id";
    $result = mysqli_query($con, $get_data);
    $row = mysqli_fetch_assoc($result);

    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_keyword = $row['product_keyword'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    $product_image1 = $row['product_image1'];
    $product_image2 = $row['product_image2'];
    $product_image3 = $row['product_image3'];
    $product_price = $row['product_price'];

    // fetching category name
    $select_category = "SELECT * FROM `brands` WHERE category_id = $category_id";
    $result_category = mysqli_query($con, $select_category);
    $category_title = $row_category['category_title'];
    echo $category_title;

    // fetching brand name
    $select_brand = "SELECT * FROM `categories` WHERE brand_id = $brand_id";
    $result_brand = mysqli_query($con, $select_brand);
    $brand_title = $row_brand['brand_title'];
    echo $brand_title;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomeShop</title>
    <style>
        .product_image{
            width: 75px;
            object-fit:contain;
        }
    </style>
</head>
<body>
    <div class="container mt-5 bg-success">
        <h2 class="text-center">Edit Product</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_title" class="form-label"><b>Product Title</b></label>
                <input type="text" id="product_title" value="<?php echo $product_title ?>" name="product_title" class="form-control" required="required">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_desc" class="form-label"><b>Product Description</b></label>
                <input type="text" id="product_desc" value="<?php echo $product_description ?>" name="product_desc" class="form-control" required="required">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_keywords" class="form-label"><b>Product Keywords</b></label>
                <input type="text" id="product_keywords" value="<?php echo $product_keyword ?>" name="product_keywords" class="form-control" required="required">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_categoty" class="form-label"><b>Product Categories</b></label>
                <select name="product_category" id="" class="form-select">
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                    <option value="">4</option>
                    <option value="">5</option>
                </select>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_brands" class="form-label"><b>Product Brands</b></label>
                <select name="product_brands" id="" class="form-select">
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                    <option value="">4</option>
                    <option value="">5</option>
                </select>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image1" class="form-label"><b>Product Image1</b></label>
                <div class="d-flex">
                    <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto" required="required">
                    <img src="./product_images/<?php echo $product_image1 ?>" alt="" class="product_image">
                </div>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image2" class="form-label"><b>Product Image2</b></label>
                <div class="d-flex">
                    <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto" required="required">
                    <img src="./product_images/<?php echo $product_image2 ?>" alt="" class="product_image">
                </div>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image3" class="form-label"><b>Product Image3</b></label>
                <div class="d-flex">
                    <input type="file" id="product_image3" name="product_image3" class="form-control w-90 m-auto" required="required">
                    <img src="./product_images/<?php echo $product_image3 ?>" alt="" class="product_image">
                </div>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_price" class="form-label"><b>Product Price</b></label>
                <input type="text" id="product_price" value="<?php echo $product_price ?>" name="product_price" class="form-control" required="required">
            </div>
            <div class="text-center">
                <input type="submit" name="edit_product" value="Update Product" class="btn btn-info px-3 mb-3">
            </div>
        </form>
    </div>
</body>
</html>