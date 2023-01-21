<h1>اطلاعات کاربری</h1>
<?php 
if(isset($_SESSION['msg'])):
?>
<div class="alert alert-<?=  $_SESSION['msg']['status'] == false ? 'danger' : 'success' ?>" role="alert">
  <?php 
  echo($_SESSION['msg']['msg']);
  unset($_SESSION['msg']);
  ?>
</div>
<?php endif ?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">pass</th>
      <th scope="col">edit</th>
    </tr>
  </thead>
  <tbody>
    
    <tr>
      <th >1</th>
      <td><?= $data['name'] ?></td>
      <td><?= $data['password'] ?></td>
      <td><a href="<?= echoRoute('description/'.$data['id']) ?>">نمایش یاد داشت شما</a></td>
      <td>
        <a href="<?= echoRoute('editdetail/'.$data['id']) ?>">edit</a>
      </td>
    </tr>
  </tbody>
</table>