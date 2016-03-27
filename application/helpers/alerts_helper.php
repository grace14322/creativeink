<?php if(isset($_SESSION['success-message'])): ?>
<div class="alert alert-success alert-dismissible fade in" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> <?php echo ' '.$_SESSION['success-message'] ?>
</div>
<?php endif; ?>
<?php unset($_SESSION['success-message']) ?>

<?php if(isset($_SESSION['error-message'])): ?>
<div class="alert alert-danger alert-dismissible fade in" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Error!</strong> <?php echo ' '.$_SESSION['error-message'] ?>
</div>    
<?php endif; ?>
<?php unset($_SESSION['error-message']) ?>