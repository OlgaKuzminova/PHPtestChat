<!DOCTYPE html>
<html>
<head>
    <title>Сообщения</title>
</head>
<body>
    <h1>Список сообщений</h1>
    <ul>
			   <?php 
		foreach ($this->messages['messages'] as $message) {
			echo $message['title'] . ": " . $message['brief_content'] . "<br>";
		}
		?>

    </ul>
    <div>
		<?php 
		
		$num_pages = ceil($this->messages['rows'] / $this->messages['perPage']);
		
		?>
    Страницы: 
<? while ($this->messages['page']++ < $num_pages): ?>
<? if ($this->messages['page'] == $cur_page): ?>
<b><?=$page?></b>
<? else: ?> 
<a href="?page=<?=$page?>"><?=$page?></a>
<? endif ?> 
<? endwhile ?> 
    
</div>
</body>
</html>
