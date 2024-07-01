<?php 
/**
 * 全部标签
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="main">
<div class="container">
<div class="post-wrap tags">
    <h2 class="post-title">-&nbsp;&nbsp;<?php $this->title() ?>&nbsp;&nbsp;-</h2>
    <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=mid&ignoreZeroCount=1&desc=0')->to($tags); ?>
                        <?php if($tags->have()): ?>
                            <div class="tag-cloud-tags">
                                <?php while ($tags->next()): ?>
                                        <a role="listitem" target="<?php $this->options->sidebarLinkOpen(); ?>" data-toggle="tooltip" data-placement="top" href="<?php $tags->permalink(); ?>" rel="tag" title="<?php $tags->count(); ?> 篇文章"><?php $tags->name(); ?> <small>(<?php $tags->count(); ?>)</small></a>
                                <?php endwhile; ?>
                                </div>  
                        <?php else: ?>
                            <p class="text-center pb-2"><?php _e('没有任何标签'); ?></p>
                        <?php endif; ?>
</div></div></div>
<?php $this->need('footer.php'); ?>