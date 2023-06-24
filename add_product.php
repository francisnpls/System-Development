<?php
  $page_title = 'Add Order';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(3);
  $all_products = find_all('products');
  $all_categories = find_all('categories');
?>
<?php
 if(isset($_POST['add_product'])){
   $req_fields = array('product-title','product-categorie','product-color','product-size','product-quantity','buying-price', 'saleing-price' );
   validate_fields($req_fields);
   if(empty($errors)){
     $p_name  = remove_junk($db->escape($_POST['product-title']));
     $p_cat   = remove_junk($db->escape($_POST['product-categorie']));
     $p_color   = remove_junk($db->escape($_POST['product-color']));
     $p_size   = remove_junk($db->escape($_POST['product-size']));
     $p_qty   = remove_junk($db->escape($_POST['product-quantity']));
     $p_sale  = remove_junk($db->escape($_POST['saleing-price']));
     $p_buy   = remove_junk($db->escape($_POST['buying-price']));

     
     $date    = make_date();
     $query  = "INSERT INTO products (";
     $query .=" name,product_color,size_product,quantity,buy_price,sale_price,product_id,date";
     $query .=") VALUES (";
     $query .=" '{$p_name}', '{$p_color}', '{$p_size}', '{$p_qty}', '{$p_buy}', '{$p_sale}', '{$p_cat}', '{$date}'";
     $query .=")";
     $query .=" ON DUPLICATE KEY UPDATE name='{$p_name}'";
     if($db->query($query)){
       $session->msg('s',"Product added ");
       redirect('product.php', false);
     } else {
       $session->msg('d',' Sorry failed to added!');
       redirect('product.php', false);
     }

   } else{
     $session->msg("d", $errors);
     redirect('add_product.php',false);
   }

 }

?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
</div>
  <div class="row">
  <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Add New Order</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
          <form method="post" action="add_product.php" class="clearfix">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="product-title" placeholder="Customer Name">
               </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <select class="form-control" name="product-categorie">
                      <option value="">Select Product Brand</option>
                    <?php  foreach ($all_categories as $cat): ?>
                      <option value="<?php echo (int)$cat['id'] ?>">
                        <?php echo $cat['name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <select class="form-control" name="product-color">
                      <option value="">Select Product Colorway</option>
                    <?php  foreach ($all_categories as $cat): ?>
                      <option value="<?php echo (int)$cat['id'] ?>">
                        <?php echo $cat['colorway'] ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
               <div class="row">
               <div class="col-md-4">
                   <div class="input-group">
                     <span class="input-group-addon">
                      <i class="glyphicon glyphicon-shopping-cart"> </i>
                     </span>
                     <input type="number" class="form-control" name="product-size" placeholder="Size">
                  </div>
                 </div>
                 <div class="col-md-4">
                   <div class="input-group">
                     <span class="input-group-addon">
                      <i class="glyphicon glyphicon-shopping-cart"></i>
                     </span>
                     <input type="number" class="form-control" name="product-quantity" placeholder="Quantity">
                  </div>
                 </div>
               </div>
              </div>

              <div class="form-group">
                <div class="row">
                <div class="col-md-5">
                    <div class="input-group">
                      <span class="input-group-addon">
                        ₱
                      </span>
                      <input type="number" class="form-control" name="saleing-price" placeholder="Selling Price">
                      <span class="input-group-addon">.00</span>
                   </div>
                </div>
                 <div class="col-md-5">
                   <div class="input-group">
                     <span class="input-group-addon">
                       ₱
                     </span>
                     <input type="number" class="form-control" name="buying-price" placeholder="Buying Price">
                     <span class="input-group-addon">.00</span>
                  </div>
                </div>
                </div>
              </div>
              <button type="submit" name="add_product" class="btn btn-success">Add Order</button>
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
