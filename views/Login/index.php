<h1>وارد شوید</h1>

<?php if(isset($_SESSION['msg'])): ?>
<div class="alert alert-<?=  $_SESSION['msg']['status'] == false ? 'danger' : 'success' ?>" role="alert">
  <?php 
  echo($_SESSION['msg']['msg']);
  unset($_SESSION['msg']);
  ?>
</div>
<?php endif; ?>

    <form action="<?= echoRoute('login'); ?>" method="post">
        <div class="form-group">
            <label for="name">name</label>
            <input type="text" class="form-control" id="name"  name="name">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <a href="<?= echoRoute('register') ?>">ثبت نام نکرده اید ؟</a>
