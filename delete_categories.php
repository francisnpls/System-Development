<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $categories = find_by_id('categories',(int)$_GET['id']);
  if(!$categories){
    $session->msg("d","Missing Product id.");
    redirect('categories.php');
  }
?>
<?php
  $delete_id = delete_by_id('categories',(int)$categories['id']);
  if($delete_id){
      $session->msg("s","Products deleted.");
      redirect('categories.php');
  } else {
      $session->msg("d","Products deletion failed.");
      redirect('categories.php');
  }
?>