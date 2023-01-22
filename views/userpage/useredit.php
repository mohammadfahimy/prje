

<h1>اطلاعات کاربری تغییر دهید</h1>
<form action="<?= echoRoute('editdetail') ?>" method="post">
        <div class="form-group">
            <label for="name">name</label>
            <input type="text" class="form-control" value="<?= $user['name'] ?>" name="name">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" value="<?= $user['password'] ?>" name="password">
        </div>

        <?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin'): ?>
        <div class="form-group">
            <select name="role" id="">
                <?php foreach($role as  $valu): ?>
                <option value="<?= $valu ?>" <?= $user['role'] == $valu ? 'selected': '' ?> ><?= $valu ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <?php endif; ?>
        <input type="hidden" class="form-check-input" id="exampleCheck1" value="<?= $user['id'] ?>" name="id" >
        <button type="submit" class="btn btn-primary">Submit</button>
</form>