<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="main">
    <div class="container profile-container">
        <div class="intro">
            <div class="avatar"><a href="/"> <img src="<?php $this->options->logoUrl() ?>"></a></div>
            <div class="nickname"> <?php $this->author(); ?></div>
            <div class="description"><p><?php $this->options->description() ?></p></div>
            <div class="links"><?php $this->need('part/sns.php'); ?></div>
        </div>
    </div>
</div>