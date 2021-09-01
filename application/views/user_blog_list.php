<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section>
	<a href="blog/add">Create</a>

	<?php 
		echo '<pre>';
		print_r($articles);
		echo '</pre>';
	?>
</section>