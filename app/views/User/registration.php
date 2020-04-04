<?php $data = isset($_SESSION['form_data']) ? $_SESSION['form_data'] : null;?>
<div class="container">
	<div class="col-lg-6">
		<h3>Регистрация:</h3>
		<form action="/user/registration" method="post">
			<div class="form-group">
				<label for="exampleInputLogin">Логин</label>
				<input type="text" name="login"
				       class="form-control" id="exampleInputLogin"
				       placeholder="login"
				       value="<?= isset($data['login']) ? htmlspecialchars($data['login']) : '' ?>">
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">E-mail</label>
				<input type="email" name="email"
				       class="form-control" id="exampleInputEmail1"
				       aria-describedby="emailHelp" placeholder="example@example.ru"
				       required value="<?= isset($data['email']) ? htmlspecialchars($data['email']) : '' ?>">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Пароль</label>
				<input type="password" name="password"
				       class="form-control" id="exampleInputPassword1"
				       placeholder="Password" required>
			</div>
			<div class="form-group">
				<label for="exampleInputFirstName">Имя</label>
				<input type="text" name="firstName"
				       class="form-control" id="exampleInputFirstName"
				       placeholder="Иван"
				       value="<?= isset($data['firstName']) ? htmlspecialchars($data['firstName']) : '' ?>">
			</div>
			<div class="form-group">
				<label for="exampleInputLastName">Фамилия</label>
				<input type="text" name="lastName"
				       class="form-control" id="exampleInputLastName"
				       placeholder="Иванов"
				       value="<?= isset($data['lastName']) ? htmlspecialchars($data['lastName']) : '' ?>">
			</div>
			<button type="submit" class="btn btn-primary">Зарегистрироваться</button>
		</form>
		<?php if (isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
	</div>
</div>