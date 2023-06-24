<?php
  $page_title = 'All Product';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
  $categories = join_categorie_table();

?>
<?php include_once('layouts/header.php'); ?>
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>products</span>
          </strong>
         <div class="pull-right">
           <a href="add_categories.php" class="btn btn-primary">Add New</a>
         </div>
        </div>
        <div class="panel-body table-responsive">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th class="text-center" style="width: 50px;">ID</th>
                <th class="text-center"> Photo </th>
                <th class="text-center"> Brand </th>
                <th class="text-center"> Colorway </th>
                <th class="text-center"> 35 </th>
                <th class="text-center"> 36 </th>
                <th class="text-center"> 37 </th>
                <th class="text-center"> 38 </th>
                <th class="text-center"> 39 </th>
                <th class="text-center"> 40 </th>
                <th class="text-center"> 41 </th>
                <th class="text-center"> 42 </th>
                <th class="text-center"> 43 </th>
                <th class="text-center"> 44 </th>
                <th class="text-center"> 45 </th>
                <th class="text-center"> Qty </th>
                <th class="text-center" style="width: 100px;"> Actions </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($categories as $categorie):?>
              <tr>
                <td class="text-center"><?php echo count_id();?></td>
                <td class="text-center">
                  <?php if($categorie['media_id'] === '0'): ?>
                    <img class="img-avatar img-circle" src="uploads/products/no_image.jpg" alt="">
                  <?php else: ?>
                    <img class="img-avatar img-circle" src="uploads/products/<?php echo $categorie['images']; ?>" alt="">
                <?php endif; ?>
                </td>
                <td class="text-center"> <?php echo remove_junk($categorie['name']); ?></td>
                <td class="text-center"> <?php echo remove_junk($categorie['colorway']); ?></td>
                <td class="text-center"> <?php echo remove_junk($categorie['s35']); ?></td>
                <td class="text-center"> <?php echo remove_junk($categorie['s36']); ?></td>
                <td class="text-center"> <?php echo remove_junk($categorie['s37']); ?></td>
                <td class="text-center"> <?php echo remove_junk($categorie['s38']); ?></td>
                <td class="text-center"> <?php echo remove_junk($categorie['s39']); ?></td>
                <td class="text-center"> <?php echo remove_junk($categorie['s40']); ?></td>
                <td class="text-center"> <?php echo remove_junk($categorie['s41']); ?></td>
                <td class="text-center"> <?php echo remove_junk($categorie['s42']); ?></td>
                <td class="text-center"> <?php echo remove_junk($categorie['s43']); ?></td>
                <td class="text-center"> <?php echo remove_junk($categorie['s44']); ?></td>
                <td class="text-center"> <?php echo remove_junk($categorie['s45']); ?></td>
                <td class="text-center"> <?php echo remove_junk($categorie['qty']); ?></td>

                <td class="text-center">
                  <div class="btn-group">
                    <a href="edit_categories.php?id=<?php echo (int)$categorie['id'];?>" class="btn btn-info btn-xs"  title="Update" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    <a href="delete_categories.php?id=<?php echo (int)$categorie['id'];?>" class="btn btn-danger btn-xs"  title="Delete" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-trash"></span>
                    </a>
                  </div>
                </td>
              </tr>
             <?php endforeach; ?>
            </tbody>
          </tabel>
        </div>
      </div>
    </div>
  </div>
  <?php include_once('layouts/footer.php'); ?>
