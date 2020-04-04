<?php if (!empty($users)) : ?>
	<?php foreach ($users as $user) : ?>
		<?php $userList[] = $user['email']; ?>
	<?php endforeach; ?>
<?php endif; ?>

<div class="container">
	<div class="jumbotron text-black-50">
		<h3>Зарегистрированные пользователи:</h3>
		<p><?= implode(', ', $userList) ?></p>
	</div>
</div>