<?php
  $page_title = 'Edit product';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>
<?php
$products = find_by_id('products',(int)$_GET['id']);
$all_categories = find_all('categories');

if(!$products){
  $session->msg("d","Missing product id.");
  redirect('product.php');
}
?>
<?php
 if(isset($_POST['product'])){
    $req_fields = array('product-title','product-categorie','product-color','product-quantity','buying-price', 'saleing-price' );
    validate_fields($req_fields);

   if(empty($errors)){
       $p_name  = remove_junk($db->escape($_POST['product-title']));
       $p_cat   = (int)$_POST['product-categorie'];
       $p_color  = (int)$_POST['product-color'];
       $p_qty   = remove_junk($db->escape($_POST['product-quantity']));
       $p_sale  = remove_junk($db->escape($_POST['saleing-price']));
       $p_buy   = remove_junk($db->escape($_POST['buying-price']));
       
       $query   = "UPDATE products SET";
       $query  .=" name ='{$p_name}', product_id ='{$p_cat}', product_color ='{$p_color}', quantity = '{$p_qty}', buy_price ='{$p_buy}', sale_price ='{$p_sale}'";
       $query  .=" WHERE id ='{$products['id']}'";
       $result = $db->query($query);
               if($result && $db->affected_rows() === 1){
                 $session->msg('s',"Order updated ");
                 redirect('product.php', false);
               } else {
                 $session->msg('d',' Sorry failed to updated!');
                 redirect('edit_product.php?id='.$products['id'], false);
               }

   } else{
       $session->msg("d", $errors);
       redirect('edit_product.php?id='.$products['id'], false);
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
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Edit Order</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-7">
           <form method="post" action="edit_product.php?id=<?php echo (int)$products['id'] ?>">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="product-title" value="<?php echo remove_junk($products['name']);?>">
               </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                      <select class="form-control" name="product-categorie">
                      <option value=""> Select Product Brand</option>
                   <?php  foreach ($all_categories as $cat): ?>
                     <option value="<?php echo (int)$cat['id'] ?>" <?php if($products['product_id'] === $cat['id']): echo "selected"; endif; ?> >
                       <?php echo $cat['name'] ?></option>
                   <?php endforeach; ?>
                   </select>
                  </div>
                  <div class="col-md-6">
                    <select class="form-control" name="product-color">
                      <option value="">Select Product Colorway</option>
                    <?php  foreach ($all_categories as $cat): ?> 
                      <option value="<?php echo (int)$cat['id'] ?>" <?php if($products['product_color'] === $cat['id']): echo "selected"; endif; ?> >
                        <?php echo $cat['colorway'] ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
               <div class="row">
                 <div class="col-md-4">
                  <div class="form-group">
                    <label for="qty">Quantity</label>
                    <div class="input-group">
                      <span class="input-group-addon">
                       <i class="glyphicon glyphicon-shopping-cart"></i>
                      </span>
                      <input type="number" class="form-control" name="product-quantity" value="<?php echo remove_junk($products['quantity']); ?>">
                   </div>
                  </div>
                 </div>
                 <div class="col-md-4">
                   <div class="form-group">
                     <label for="qty">Selling price</label>
                     <div class="input-group">
                       <span class="input-group-addon">
                       ₱
                       </span>
                       <input type="number" class="form-control" name="saleing-price" value="<?php echo remove_junk($products['sale_price']);?>">
                       <span class="input-group-addon">.00</span>
                    </div>
                   </div>
                  </div>
                 <div class="col-md-4">
                  <div class="form-group">
                    <label for="qty">Buying price</label>
                    <div class="input-group">
                      <span class="input-group-addon">
                      ₱
                      </span>
                      <input type="number" class="form-control" name="buying-price" value="<?php echo remove_junk($products['buy_price']);?>">
                      <span class="input-group-addon">.00</span>
                   </div>
                  </div>
                 </div>
               </div>
              </div>
              <button type="submit" name="product" class="btn btn-danger">Update Order</button>
          </form>
         </div>
        </div>
      </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
