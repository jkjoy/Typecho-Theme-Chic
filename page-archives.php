<?php 
/**
 * 文章归档
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('part/head.php'); ?>
<div class="wrapper">
<?php $this->need('part/header.php'); ?>
<div class="main">
<div class="post-wrap archive">
    <h2 class="post-title">-&nbsp;&nbsp;<?php $this->title() ?>&nbsp;&nbsp;-</h2>
    <?php
        $stat = Typecho_Widget::widget('Widget_Stat');
        Typecho_Widget::widget('Widget_Contents_Post_Recent', 'pageSize=' . $stat->publishedPostsNum)->to($archives);
        $year = 0; $mon = 0;
        $output = '<div class="post-wrap archive">'; // Start archives container      
        while ($archives->next()) {
            $year_tmp = date('Y', $archives->created);
            $mon_tmp = date('m', $archives->created);         
            // 检查是否需要新的年份标题
            if ($year != $year_tmp) {
                if ($year > 0) {
                    $output .= '</ul> '; // 结束上一个年份的月份列表和包裹的div
                }
                $year = $year_tmp; 
                $mon = 0; // 重置月份
                $output .= '<h3>' . $year . '</h3>'; // 开始新的年份div
            }       
 
            // 输出文章项
            $output .= '<article class="archive-item">';
            $output .= '<a class="archive-item-link" href="' . $archives->permalink . '">' . $archives->title . '</a>';
            $output .= '<span class="archive-item-date">' . date('m月d,Y', $archives->created) . '</span></article>';
        }
        // 循环后，确保所有标签都已经关闭
        if ($mon > 0) {
            $output .= '</ul>'; // 结束最后一个月份的列表
        }
        if ($year > 0) {
            $output .= '</div>'; // 结束最后一个年份的div
        }
        $output .= '</div>'; // End archives container
        echo $output;
    ?>
 </div>
</div>
<br>  

<?php $this->need('part/footer.php'); ?>
 