<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="main">
<div class="container">
<?php if ($this->options->showtoc): ?>
        <?php $this->need('toc.php'); ?>
    <?php endif; ?>
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
                        <span> 浏览:</span><?php get_post_view($this) ?>次 
                    <?php if($this->user->hasLogin() && $this->user->pass('editor', true)): ?>
                <a href="<?php $this->options->adminUrl('write-post.php?cid=' . $this->cid); ?>" target="_blank" title="编辑文章">
                <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="16" height="16">
                <path 
                d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/>
                </svg></a></span>
                <?php endif; ?>
                </div>
        </header>
        <div class="post-content">
        <?php $content = $this->content; echo addHeaderLinks($content); ?>
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
                 <a href="<?php echo $tag['permalink']; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="14" height="14" fill="rgba(87,107,79,1)"><path d="M7.78428 14L8.2047 10H4V8H8.41491L8.94043 3H10.9514L10.4259 8H14.4149L14.9404 3H16.9514L16.4259 8H20V10H16.2157L15.7953 14H20V16H15.5851L15.0596 21H13.0486L13.5741 16H9.58509L9.05957 21H7.04855L7.57407 16H4V14H7.78428ZM9.7953 14H13.7843L14.2047 10H10.2157L9.7953 14Z"></path></svg>
                    <?php echo $tag['name']; ?></a>
                     <?php endforeach; ?>
                 <?php else: ?>
              
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
<?php $this->need('footer.php'); ?>

