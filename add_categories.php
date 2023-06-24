<?php
  $page_title = 'Add Product';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
  $all_categories = find_all('categories');
  $all_photo = find_all('media');
?>
<?php
 if(isset($_POST['add_categories'])){
   $req_fields = array('product-brand','product-colorway','ss35','ss36', 'ss37', 'ss38', 'ss39', 'ss40', 'ss41', 'ss42', 'ss43', 'ss44', 'ss45', 'quantity');
   validate_fields($req_fields);

   if(empty($errors)){
     $c_name  = remove_junk($db->escape($_POST['product-brand']));
     $c_col   = remove_junk($db->escape($_POST['product-colorway']));
     $c_s35   = remove_junk($db->escape($_POST['ss35']));
     $c_s36   = remove_junk($db->escape($_POST['ss36']));
     $c_s37   = remove_junk($db->escape($_POST['ss37']));
     $c_s38   = remove_junk($db->escape($_POST['ss38']));
     $c_s39   = remove_junk($db->escape($_POST['ss39']));
     $c_s40   = remove_junk($db->escape($_POST['ss40']));
     $c_s41   = remove_junk($db->escape($_POST['ss41']));
     $c_s42   = remove_junk($db->escape($_POST['ss42']));
     $c_s43   = remove_junk($db->escape($_POST['ss43']));
     $c_s44   = remove_junk($db->escape($_POST['ss44']));
     $c_s45   = remove_junk($db->escape($_POST['ss45']));
     $c_qty   = remove_junk($db->escape($_POST['quantity']));

     if (is_null($_POST['product-photo']) || $_POST['product-photo'] === "") {
       $med_id = '0';
     } else {
       $med_id = remove_junk($db->escape($_POST['product-photo']));
     }
     $query  = "INSERT INTO categories (";
     $query .=" name,colorway,media_id,s35,s36,s37,s38,s39,s40,s41,s42,s43,s44,s45,qty";
     $query .=") VALUES (";
     $query .=" '{$c_name}', '{$c_col}', '{$med_id}', '{$c_s35}', '{$c_s36}', '{$c_s37}', '{$c_s38}', '{$c_s39}', '{$c_s40}', '{$c_s41}', '{$c_s42}', '{$c_s43}', '{$c_s44}', '{$c_s45}', '{$c_qty}' ";
     $query .=")";
     $query .=" ON DUPLICATE KEY UPDATE name ='{$c_name}'";
     if($db->query($query)){
       $session->msg('s',"Product added ");
       redirect('categories.php', false);
     } else {
       $session->msg('d',' Sorry failed to added!');
       redirect('categories.php', false);
     }

   } else{
     $session->msg("d", $errors);
     redirect('categories.php',false);
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
            <span>Add New Product</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
          <form method="post" action="add_categories.php" class="clearfix">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="product-brand" placeholder="Product Brand">
               </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="product-colorway" placeholder="Product Colorway">
                </div>
                </div>
              <div class="form-group">
               <div class="row">
                 <div class="col-md-4">
                   <div class="input-group">
                     <span class="input-group-addon">
                     Size 35
                     </span>
                     <input type="number" class="form-control" name="ss35" placeholder="Quantity">
                  </div>
                 </div>
                 <div class="col-md-4">
                   <div class="input-group">
                     <span class="input-group-addon">
                     Size 36
                     </span>
                     <input type="number" class="form-control" name="ss36" placeholder="Quantity">
                  </div>
                 </div>
                 <div class="col-md-4">
                   <div class="input-group">
                     <span class="input-group-addon">
                     Size 37
                     </span>
                     <input type="number" class="form-control" name="ss37" placeholder="Quantity">
                  </div>
                 </div>
               </div>
              </div>
              <div class="form-group">
               <div class="row">
                 <div class="col-md-4">
                   <div class="input-group">
                     <span class="input-group-addon">
                     Size 38
                     </span>
                     <input type="number" class="form-control" name="ss38" placeholder="Quantity">
                  </div>
                 </div>
                 <div class="col-md-4">
                   <div class="input-group">
                     <span class="input-group-addon">
                     Size 39
                     </span>
                     <input type="number" class="form-control" name="ss39" placeholder="Quantity">
                  </div>
                 </div>
                 <div class="col-md-4">
                   <div class="input-group">
                     <span class="input-group-addon">
                     Size 40
                     </span>
                     <input type="number" class="form-control" name="ss40" placeholder="Quantity">
                  </div>
                 </div>
               </div>
              </div>
              <div class="form-group">
               <div class="row">
                 <div class="col-md-4">
                   <div class="input-group">
                     <span class="input-group-addon">
                     Size 41
                     </span>
                     <input type="number" class="form-control" name="ss41" placeholder="Quantity">
                  </div>
                 </div>
                 <div class="col-md-4">
                   <div class="input-group">
                     <span class="input-group-addon">
                     Size 42
                     </span>
                     <input type="number" class="form-control" name="ss42" placeholder="Quantity">
                  </div>
                 </div>
                 <div class="col-md-4">
                   <div class="input-group">
                     <span class="input-group-addon">
                     Size 43
                     </span>
                     <input type="number" class="form-control" name="ss43" placeholder="Quantity">
                  </div>
                 </div>
               </div>
              </div>
              <div class="form-group">
               <div class="row">
                 <div class="col-md-4">
                   <div class="input-group">
                     <span class="input-group-addon">
                     Size 44
                     </span>
                     <input type="number" class="form-control" name="ss44" placeholder="Quantity">
                  </div>
                 </div>
                 <div class="col-md-4">
                 <div class="input-group">
                     <span class="input-group-addon">
                     Size 45
                     </span>
                     <input type="number" class="form-control" name="ss45" placeholder="Quantity">
                  </div>
                 </div>
                 <div class="col-md-4">
                   <div class="input-group">
                     <span class="input-group-addon">
                      Total
                     </span>
                     <input type="number" class="form-control" name="quantity" placeholder="Quantity">
                  </div>
                 </div>
               </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <select class="form-control" name="product-photo">
                      <option value="">Select Product Photo</option>
                    <?php  foreach ($all_photo as $photo): ?>
                      <option value="<?php echo (int)$photo['id'] ?>">
                        <?php echo $photo['file_name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
              <button type="submit" name="add_categories" class="btn btn-success">Add product</button>
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
