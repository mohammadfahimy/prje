<h1>یاد داشت شما</h1>

<?php 
if(isset($_SESSION['msg'])):
?>
<div class="alert alert-<?=  $_SESSION['msg']['status'] == false ? 'danger' : 'success' ?>" role="alert">
  <?php 
  echo($_SESSION['msg']['msg']);
  unset($_SESSION['msg']);
  ?>
</div>
<?php endif; ?>
<form action="<?= echoRoute("description/$id/update") ?>" method="post">

<textarea name="description" id="" cols="100" rows="20">
    <?php if(!empty($description)):  ?>
        <?= $description ?>
    <?php endif; ?>
</textarea>
<button>submit</button>
</form>