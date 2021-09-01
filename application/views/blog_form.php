<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section>
<?php echo validation_errors(); ?>
<?= $this->view ?>

	<form method="POST" action="<?php ($this->view == 'edit' ? 'edit/'.$data->id : 'add');?>">
		<input type="text" name="title" placeholder="Title" value="<?= (isset($data->title) ? $data->title : ''); ?>">
		<input type="text" name="description" placeholder="Description" value="<?= (isset($data->description) ? $data->description : ''); ?>">
		<input type="text" name="content" placeholder="Content" value="<?= (isset($data->content) ? $data->content : ''); ?>">
		<!-- <button type="submit">Create</button> -->

		<?php 
			if ($this->view == 'edit'){
				echo "<button type='submit'>Save</button>";
			}
			else {
				echo "<button type='submit'>Create</button>";
			}
		?>
	</form>
</section>