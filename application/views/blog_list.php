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
		print_r('Total articles: '.count($articles));
		echo '</pre>';

		echo '<dl>
		<dt>List of Articles</dt>';

		foreach ($articles as $i => $article){
			echo "<dd>Article: {$article->title} - Rate: <a href=''>1</a><a href=''>2</a><a href=''>3</a><a href=''>4</a><a href=''>5</a></dd>";
		}

		echo '</dl>';
	?>
</section>