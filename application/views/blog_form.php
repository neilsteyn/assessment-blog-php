<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section>
<?php echo validation_errors(); ?>

	<form method="POST" action="">
		<input type="text" name="title" placeholder="Title" value="<?= $data->title; ?>">
		<input type="text" name="description" placeholder="Description" value="<?= $data->description; ?>">
		<input type="text" name="content" placeholder="Content" value="<?= $data->content; ?>">
		<button type="submit">Create</button>
	</form>
</section>