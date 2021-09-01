<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section>
	<?php //($this->session->id != null ? '<a href="user/login">Login</a> | <a href="user/register">Register</a>' : '<a href="user/logout">Logout</a>'); ?>

	<a href="user/login">Login</a> | 
	<a href="user/register">Register</a>
</section>
<section>
	<?php 
		echo '<pre>';
		print_r($articles);
		echo '</pre>';
	?>
</section>