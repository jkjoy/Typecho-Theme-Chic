<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('part/head.php'); ?>
<div class="wrapper">
<?php $this->need('part/header.php'); ?>
<div class="main">
<div class="container">
    <article class="post-wrap">
        <header class="post-header">
            <h1 class="post-title"><?php $this->title() ?></h1>
                <div class="post-meta">
                        <span class="post-time">
                        发布日期: 
                        </span> <?php $this->date('Y-m-d'); ?><span class="dot"></span>
                        <span class="post-category">
                        所属分类:
                        </span><?php $this->category(','); ?> <span class="dot"></span>
                        <span> 浏览:</span><?php get_post_view($this) ?>次<span class="dot"></span>
                    <?php if($this->user->hasLogin() && $this->user->pass('editor', true)): ?>
                        <span><span class="dot"></span>
                <a href="<?php $this->options->adminUrl('write-post.php?cid=' . $this->cid); ?>" target="_blank" title="编辑文章">
                <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="16" height="16">
                <path 
                d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/>
                </svg></a></span>
                <?php endif; ?>
                </div>
        </header>
        <div class="post-content">
        <?php $this->content(); ?>
        </div>
            <section class="post-copyright">
                    <p class="copyright-item">
                        <span>作者:</span>
                        <span><a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a></span>
                    </p>
                    <p class="copyright-item">
                        <span>链接:</span>
                        <span><a href="<?php $this->permalink() ?>"><?php $this->permalink() ?></a></span>
                    </p>
            </section>
        <section class="post-tags">
            <div>
                <span class="tag">
                <?php if ($this->tags): ?>
                  <?php foreach ($this->tags as $tag): ?>
                 <a href="<?php echo $tag['permalink']; ?>">#<?php echo $tag['name']; ?></a>
                     <?php endforeach; ?>
                 <?php else: ?>
                 无标签
                <?php endif; ?>
                </span>
            </div>
            <div>
                <a href="javascript:window.history.back();">返回上一页</a>
                <span>· </span>
                <a href="/">返回首页</a>
            </div>
        </section>
        <section class="post-nav">
        <span class="prev" rel="prev"><?php $this->thePrev('%s', '没有了'); ?></span>
        <span class="next" rel="next"><?php $this->theNext('%s', '没有了'); ?></span>
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
    </article>
    </div>
    </div>  
    <?php if ($this->options->showtoc): ?>
        <?php $this->need('part/toc.php'); ?>
<?php endif; ?>
<?php $this->need('part/footer.php'); ?>

