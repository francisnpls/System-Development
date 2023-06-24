<?php
  $page_title = 'Edit Product';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php
$categories = find_by_id('categories',(int)$_GET['id']);
$all_categories = find_all('categories');
$all_photo = find_all('media');

if(!$categories){
  $session->msg("d","Missing product id.");
  redirect('categories.php');
}
?>
<?php
 if(isset($_POST['categories'])){
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
         $media_id = '0';
       } else {
         $media_id = remove_junk($db->escape($_POST['product-photo']));
       }
       $query   = "UPDATE categories SET";
       $query  .=" name ='{$c_name}', colorway ='{$c_col}',";
       $query  .=" s35 ='{$c_s35}', s36 ='{$c_s36}', s37 ='{$c_s37}', s38 ='{$c_s38}', s39 ='{$c_s39}', s40 ='{$c_s40}',";
       $query  .=" s41 ='{$c_s41}', s42 ='{$c_s42}', s43 ='{$c_s43}', s44 ='{$c_s44}', s45 ='{$c_s45}', qty ='{$c_qty}',";
       $query  .=" media_id='{$media_id}'";
       $query  .=" WHERE id ='{$categories['id']}'";
       $result = $db->query($query);
               if($result && $db->affected_rows() === 1){
                 $session->msg('s',"Product updated ");
                 redirect('categories.php', false);
               } else {
                 $session->msg('d',' Sorry failed to updated!');
                 redirect('edit_categories.php?id='.$categories['id'], false);
               }
     } else{
       $session->msg("d", $errors);
       redirect('edit_categories.php?id='.$categories['id'], false);
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
             <span>Update Product</span>
          </strong>
         </div>
         <div class="panel-body">
          <div class="col-md-12">
           <form method="post" action="edit_categories.php?id=<?php echo (int)$categories['id'] ?>">
               <div class="form-group">
                 <div class="input-group">
                   <span class="input-group-addon">
                    <i class="glyphicon glyphicon-th-large"></i>
                   </span>
                   <input type="text" class="form-control" name="product-brand" value="<?php echo remove_junk($categories['name']);?>">
                </div>
               </div>
               <div class="form-group">
                 <div class="input-group">
                   <span class="input-group-addon">
                    <i class="glyphicon glyphicon-th-large"></i>
                   </span>
                   <input type="text" class="form-control" name="product-colorway" value="<?php echo remove_junk($categories['colorway']);?>"placeholder="Product Colorway">
                 </div>
                 </div>
               <div class="form-group">
                <div class="row">
                  <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon">
                      Size 35
                      </span>
                      <input type="number" class="form-control" name="ss35" value="<?php echo remove_junk($categories['s35']);?>">
                   </div>
                  </div>
                  <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon">
                       Size 36
                      </span>
                      <input type="number" class="form-control" name="ss36" value="<?php echo remove_junk($categories['s36']);?>">
                   </div>
                  </div>
                  <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon">
                       Size 37
                      </span>
                      <input type="number" class="form-control" name="ss37" value="<?php echo remove_junk($categories['s37']);?>">
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
                      <input type="number" class="form-control" name="ss38" value="<?php echo remove_junk($categories['s38']);?>">
                   </div>
                  </div>
                  <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon">
                       Size 39
                      </span>
                      <input type="number" class="form-control" name="ss39" value="<?php echo remove_junk($categories['s39']);?>">
                   </div>
                  </div>
                  <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon">
                       Size 40
                      </span>
                      <input type="number" class="form-control" name="ss40" value="<?php echo remove_junk($categories['s40']);?>">
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
                      <input type="number" class="form-control" name="ss41" value="<?php echo remove_junk($categories['s41']);?>">
                   </div>
                  </div>
                  <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon">
                       Size 42
                      </span>
                      <input type="number" class="form-control" name="ss42" value="<?php echo remove_junk($categories['s42']);?>">
                   </div>
                  </div>
                  <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon">
                       Size 43
                      </span>
                      <input type="number" class="form-control" name="ss43" value="<?php echo remove_junk($categories['s43']);?>">
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
                      <input type="number" class="form-control" name="ss44" value="<?php echo remove_junk($categories['s44']);?>">
                   </div>
                  </div>
                  <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon">
                       Size 45
                      </span>
                      <input type="number" class="form-control" name="ss45" value="<?php echo remove_junk($categories['s45']);?>">
                   </div>
                  </div>
                  <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon">
                       Total
                      </span>
                      <input type="number" class="form-control" name="quantity" value="<?php echo remove_junk($categories['qty']);?>">
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
                       <option value="<?php echo (int)$photo['id'] ?>" <?php if($categories['media_id'] === $photo['id']): echo "selected"; endif; ?> >
                         <?php echo $photo['file_name'] ?></option>
                     <?php endforeach; ?>
                     </select>
                   </div>
                 </div>
               </div>
               <button type="submit" name="categories" class="btn btn-success">Update product</button>
           </form>
          </div>
         </div>
       </div>
     </div>
   </div>
 
 <?php include_once('layouts/footer.php'); ?>
 
