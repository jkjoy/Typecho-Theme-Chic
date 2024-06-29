<?php 
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('part/head.php'); ?>
<div class="wrapper">
<?php $this->need('part/header.php'); ?>
<div class="main">
<div class="post-wrap archive">
    <h2 class="post-title">-&nbsp;<?php $this->archiveTitle(array(
            'category'  =>  _t('    %s  '),
            'search'    =>  _t('包含关键字  %s  的文章'),
            'date'      =>  _t('在   %s  发布的文章'),
            'tag'       =>  _t('标签   %s  下的文章'),
            'author'    =>  _t('作者  %s  发布的文章')
        ), '', ''); ?>&nbsp;-</h2>
<?php
$previousYear = null;
while($this->next()): 
    $currentYear = date('Y', $this->created);
    if ($previousYear !== $currentYear):
        if ($previousYear !== null): ?>
            </div> <!-- 关闭上一年的 div -->
        <?php endif; ?>
        <h3><?php echo $currentYear; ?></h3>
        <div class="archive-year">
    <?php 
        $previousYear = $currentYear;
    endif;
?>
    <article class="archive-item">
        <a class="archive-item-link" href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
        <span class="archive-item-date"><?php $this->date('Y-m-d'); ?></span>
    </article>
<?php endwhile; ?>

<?php if ($previousYear !== null): ?>
    </div> <!-- 关闭最后一年的 div -->
<?php endif; ?>   

</div>
<?php $this->need('part/paginator.php'); ?>
</div>  
<?php $this->need('part/footer.php'); ?>