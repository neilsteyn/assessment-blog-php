<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section>
<?php echo validation_errors(); ?>

	<form method="POST" action="login">
	<input type="text" name="email" placeholder="Email">
	<input type="password" name="password" placeholder="Password">
	<button type="submit">Login</button>
	</form>
</section>