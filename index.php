<?php 
/**
 * 移植自 Hexo主题 Chic  
 * @package Chic
 * @author  老孙 
 * @version 1.0.3
 * @link https://www.imsun.org
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="main">
<div class="post-wrap archive">
    <h2 class="post-title">-&nbsp; 文章列表 &nbsp;-</h2>
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
<?php
            $this->pagenav(
                '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z" fill="var(--main)"></path></svg>',
                '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M13.1714 12.0007L8.22168 7.05093L9.63589 5.63672L15.9999 12.0007L9.63589 18.3646L8.22168 16.9504L13.1714 12.0007Z" fill="var(--main)"></path></svg>',
                1,
                '...',
                array(
                    'wrapTag' => 'div',
                    'wrapClass' => 'pagination_page',
                    'itemTag' => '',
                    'textTag' => 'a',
                    'currentClass' => 'active',
                    'prevClass' => 'prev',
                    'nextClass' => 'next'
                )
            );
        ?>   
</div>  
<script>
    function truncateTitle() {
        var links = document.getElementsByClassName('archive-item-link');
        var width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
        if (width < 420) {
            for (var i = 0; i < links.length; i++) {
                var title = links[i].innerHTML;
                if (title.length > 20) {
                    links[i].innerHTML = title.substring(0, 20) + '...';
                }
            }
        }
    }

    window.addEventListener('resize', truncateTitle);
    truncateTitle();
</script>
<?php $this->need('footer.php'); ?>