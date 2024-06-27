<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="author" content="<?php $this->options->author() ?>">
<meta name="description" content="<?php $this->options->description() ?>">
<meta name="keywords" content="<?php $this->options->keywords() ?>">
<title>
    <?php if($this->_currentPage>1) echo '第 '.$this->_currentPage.' 页 - '; ?><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'date'      =>  _t('在<span> %s </span>发布的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php if ($this->is('post')) $this->category(',', false);?><?php if ($this->is('post')) echo ' - ';?><?php $this->options->title(); ?><?php if ($this->is('index')) echo ' - '; ?><?php if ($this->is('index')) $this->options->description() ?>
</title>
<link rel="icon" href="<?php $this->options->icoUrl() ?>">
<link rel="stylesheet" href="<?php $this->options->themeUrl('/dist/css/style.css'); ?>">
<script src="<?php $this->options->themeUrl('/dist/js/script.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('/dist/js/tocbot.min.js'); ?>"></script>
<?php $this->header("generator=&template=&pingback=&wlw=&xmlrpc=&rss1=&atom=&rss2=/feed"); ?>
<?php $this->options->addhead(); ?>
<?php $this->header(); ?> 
</head>
<body>