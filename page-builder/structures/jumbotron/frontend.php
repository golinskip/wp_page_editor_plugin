<?php
if (!defined('WPINC')) {
    die;
}
?>
<div class="jumbotron">
    <h1 class="display-4"><?php echo $cnf['title']; ?></h1>
    <p class="lead"><?php echo $cnf['text1']; ?></p>
    <hr class="my-4">
    <p><?php echo $cnf['text2']; ?></p>
    <p class="lead">
        <a class="btn btn-primary btn-lg" href="<?php echo $cnf['link']; ?>" role="button"><?php echo $cnf['button_text']; ?></a>
    </p>
</div>