<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section>
	<a href="blog/add">Create</a>

	<?php 
		echo '<pre>';
		print_r('Total articles: '.count($articles));
		echo '</pre>';

		echo '<dl>
				<dt>List of Articles</dt>';
		
		foreach ($articles as $i => $article){
			echo "<dd>{$article->title} - <a href='blog/remove/{$article->id}'>remove</a></dd>";
		}

		echo '</dl>';
	?>
</section>