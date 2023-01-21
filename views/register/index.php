<h1>ثبت نام کنید</h1>

<?php if(isset($_SESSION['msg'])): ?>
<div class="alert alert-<?=  $_SESSION['msg']['status'] == false ? 'danger' : 'success' ?>" role="alert">
  <?php 
  echo($_SESSION['msg']['msg']);
  unset($_SESSION['msg']);
  ?>
</div>
<?php endif; ?>
    <form action="<?= echoRoute('register/store') ?>" method="post">
        <div class="form-group">
            <label for="name">Email address</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your name" name="name">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <a href="<?= echoRoute('login') ?>">قبلا ثبت نام کرده اید ؟</a>
