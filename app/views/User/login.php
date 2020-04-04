<?php $data = isset($_SESSION['form_data']) ? $_SESSION['form_data'] : null; ?>
<div class="container">
    <div class="col-lg-6">
        <h3>Авторизация:</h3>
        <form action="/user/login" method="post">
            <div class="form-group">
                <label for="exampleInputLogin">Логин</label>
                <input type="text"
                       class="form-control"
                       id="exampleInputLogin"
                       placeholder="login"
                       name="login"
                       value="<?= isset($data['login']) ? htmlspecialchars($data['login']) : '' ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control"
                       name="password"
                       id="exampleInputPassword1" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Авторизоваться</button>
        </form>
	    <?php if (isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
    </div>
</div>