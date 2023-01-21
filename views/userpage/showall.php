
<h1>لیست تمامی اعضا</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">role</th>
      <th scope="col">edit</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($data as $value): ?>
    <tr>
      <th scope="row">1</th>
      <td><?= $value['name'] ?></td>
      <td><?= $value['password'] ?></td>
      <td><?= $value['role'] ?></td>
      <td>
      <a href="<?= echoRoute('editdetail/'.$value['id']) ?>" title="ویرایش">edit ||</a>
      <a href="" title="حذف">X</a>
      </td>
    </tr>
   <?php endforeach; ?>
  </tbody>
</table>