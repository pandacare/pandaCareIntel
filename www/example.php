<?php

$template_name = 'templates/base_template.php';
$context['window-title'] = "Some Title for The Window";
$context['title'] = "Page Title";

$context['blocks']['main'] = <<<END
	<div>
		<p>This is a block of text defined in example.php</p>
	</div>
END;

?>