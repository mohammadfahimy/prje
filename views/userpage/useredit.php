
<h1>اطلاعات کاربری تغییر دهید</h1>
<form action="<?= echoRoute('editdetail') ?>" method="post">
        <div class="form-group">
            <label for="name">name</label>
            <input type="text" class="form-control" value="<?= $data['name'] ?>" name="name">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" value="<?= $data['password'] ?>" name="password">
        </div>
        <input type="hidden" class="form-check-input" id="exampleCheck1" value="<?= $data['id'] ?>" name="id" >
        <button type="submit" class="btn btn-primary">Submit</button>
</form>