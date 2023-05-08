<div>
	<form method="post">

		<div class="row ">
			<div class="col-md-4">
				<div class="form-group">
					<label for="first_name" class="col-form-label-sm">First Name</label>
					<input type="text" name="first_name" value="<?= set_value('first_name') ?>"
						class="form-control form-control-sm <?= set_form_error('first_name', false); ?>"
						placeholder="First name">
					<?= set_form_error('first_name'); ?>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="last_name" class="col-form-label-sm">Last Name</label>
					<input type="text" name="last_name" value="<?= set_value('last_name') ?>"
						class="form-control form-control-sm <?= set_form_error('last_name', false); ?>"
						placeholder="Last name">
					<?= set_form_error('last_name'); ?>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="phone" class="col-form-label-sm">Phone</label>
					<input type="text" name="phone" value="<?= set_value('phone') ?>"
						class="form-control form-control-sm <?= set_form_error('phone', false); ?>" placeholder="Phone">
					<?= set_form_error('phone'); ?>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="email" class="col-form-label-sm">Email</label>
					<input type="email" name="email" value="<?= set_value('email') ?>"
						class="form-control form-control-sm <?= set_form_error('email', false); ?>" placeholder="Email">
					<?= set_form_error('email'); ?>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="password" class="col-form-label-sm">M Pin</label>
					<input type="password" name="password" value="<?= set_value('password') ?>"
						class="form-control form-control-sm <?= set_form_error('password', false); ?>"
						placeholder="M Pin">
					<?= set_form_error('password'); ?>
				</div>
			</div>
		</div>
		<button type="submit" class="btn btn-primary mt-3">Submit</button>
	</form>
</div>
