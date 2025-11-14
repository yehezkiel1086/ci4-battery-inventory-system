<?php 
echo view('components/header.php');
echo view("components/sidebar.php");
?>
<div class='p-4 sm:ml-64 font-mono'>
  <?= $this->renderSection('content') ?>
</div>
<?php
echo view('components/footer.php');
?>