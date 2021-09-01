<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section>
<?php echo validation_errors(); ?>

	<form method="POST" action="register">
		<input type="text" name="email" placeholder="Email">
		<input type="password" name="password" placeholder="Password">
		<input type="password" name="password_confirm" placeholder="Confirm Password">
		<button type="submit">Register</button>
	</form>
</section>