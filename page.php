<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<?php if ($this->options->showprism): ?>
    <script src="<?php $this->options->themeUrl('prism.js'); ?>"></script>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('prism.css'); ?>"  />
<?php endif; ?>
<div class="main">
<div class="container">
    <article class="post-wrap page">
    <div class="post-wrap">
    <h2 class="post-title">-&nbsp;&nbsp;<?php $this->title() ?>&nbsp;&nbsp;-</h2>
    <section class="post-content">
        <?php $this->content(); ?>
    </section>
<!-- 判断如果允许评论则显示评论的div -->
<?php if ($this->allow('comment')): ?>
    <!-- 如果启用了 twikoo 选项，显示 twikoo 评论系统 -->
    <?php if ($this->options->twikoo): ?>
        <?php $this->options->twikoo(); ?> 
    <?php else: ?>
        <!-- 否则调用自带的评论模板 -->
        <?php $this->need('comments.php'); ?>
    <?php endif; ?>
<?php endif; ?>
    </div>   
    </article>
</div></div>
<?php $this->need('footer.php'); ?>
 