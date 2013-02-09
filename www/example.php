<?php

$template_name = 'templates/base_template.php';
$context['window-title'] = "Some Title for The Window";
$context['title'] = "Page Title";

$context['blocks']['main'] = <<<END
	<div>
		<p>This is a block of text defined in example.php. Some HTML will need to be 
		defined in these files. But the goal is to keep it to a minimum and specific
		to the mission of the PHP script (example.php in this case)</p>
		<p>I think I'll probably change this in the future, though, so that all
		the HTML is defined in the templates.</p>
	</div>
END;

?>