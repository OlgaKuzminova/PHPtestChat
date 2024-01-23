<!DOCTYPE html>
<html>
<head>
    <title>Сообщение</title>
</head>
<body>

<div class="message">
            <h2><?php echo $this->message['title']; ?></h2>
            <p><?php echo $this->message['text']; ?></p>
        </div>
        <div class="comments">
            <h3>Комментарии</h3>
            <?php
        foreach ($this->comments as $comment) {
?>
            <div class="comment">
                <p><?php echo $comment['text']; ?></p>
            </div>
<?php
        }
?>

        </div>

</body>
</html>