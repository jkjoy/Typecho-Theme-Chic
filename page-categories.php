<?php 
/**
 * 全部分类
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="main">
<div class="container">
<div class="post-wrap categories">
<h2 class="post-title">-&nbsp;&nbsp;<?php $this->title() ?>&nbsp;&nbsp;-</h2>
<div class="categories-card">
<?php $this->widget('Widget_Metas_Category_List')->to($categories); ?>
<?php while($categories->next()): ?>
    <div class="card-item">
        <div class="categories"> 
            <a href="<?php $categories->permalink(); ?>">
                <h3>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M2 4C2 3.44772 2.44772 3 3 3H10.4142L12.4142 5H21C21.5523 5 22 5.44772 22 6V20C22 20.5523 21.5523 21 21 21L3 21C2.45 21 2 20.55 2 20V4ZM10.5858 6L9.58579 5H4V7H9.58579L10.5858 6ZM4 9V19L20 19V7H12.4142L10.4142 9H4Z"></path></svg>
                    <?php $categories->name(); ?>
                </h3>
            </a>
            <?php 
        // 获取当前分类下的文章
        $this->widget('Widget_Archive@category_' . $categories->mid, 'pageSize=5&type=category', 'mid=' . $categories->mid)->to($posts);
        ?>
        <?php if($posts->have()): ?>
                <?php while($posts->next()): ?>
                  <article class="archive-item">
                    <a class="archive-item-link" href="<?php $posts->permalink(); ?>"><?php $posts->title(25); ?></a>
                  </article>
                  
                <?php endwhile; ?>
                <a class="more-post-link" href="<?php $categories->permalink(); ?>">More >></a>
        <?php else: ?>
            <p>该分类下没有文章。</p>
        <?php endif; ?>
        </div>  
      </div> 
      
        <?php endwhile; ?>
      
 </div>
</div>
</div>
  
<?php $this->need('footer.php'); ?>
 