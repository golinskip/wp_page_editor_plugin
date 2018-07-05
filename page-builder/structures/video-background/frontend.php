<?php
if (!defined('WPINC')) {
    die;
}
?>

<div class="wtst-pb-struct-video-background-wrapper">
    <!-- The video -->
    <video autoplay muted loop class="wtst-pb-struct-video-background-video">
        <source src="<?php echo $cnf['videoUrl']; ?>" type="video/mp4">
    </video>

    <!-- Optional: some overlay text to describe the video -->
    <div class="wtst-pb-struct-video-background-content">
        <?php if (strlen($cnf['title']) > 0): ?>
            <h3><?php echo $cnf['title']; ?></h3>
        <?php endif; ?>
        <p><?php echo $cnf['description']; ?></p>
        <!-- Use a button to pause/play the video with JavaScript -->
        <?php if (strlen($cnf['button1Title']) > 0): ?>
            <button id="myBtn"><?php echo $cnf['button1Title']; ?></button>
        <?php endif; ?>
        <?php if (strlen($cnf['button2Title']) > 0): ?>
            <button id="myBtn"><?php echo $cnf['button2Title']; ?></button>
        <?php endif; ?>
    </div> 
</div>