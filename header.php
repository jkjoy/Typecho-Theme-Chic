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
<link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>">
<script src="<?php $this->options->themeUrl('script.js'); ?>"></script>
<?php $this->header("generator=&template=&pingback=&wlw=&xmlrpc=&rss1=&atom=&rss2=/feed"); ?>
<?php $this->options->addhead(); ?>
<?php $this->header(); ?> 
</head>
<body>
<div class="wrapper">
<header>
   <nav class="navbar">
        <div class="container">
            <div class="navbar-header header-logo">
                <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a> 
            </div>
            <div class="menu navbar-right">
            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
            <a class="menu-item"  href="<?php $this->options->posturl() ?>"><?php $this->options->postlisttittle() ?></a>
                    <?php while($pages->next()): ?>
                    <a <?php if($this->is('page', $pages->slug)): ?> <?php endif; ?>class="menu-item" href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a> 
                    <?php endwhile; ?>
                <input id="switch_default" type="checkbox" class="switch_default">
                <label for="switch_default" class="toggleBtn"></label>
            </div>
        </div>
    </nav>
    <nav class="navbar-mobile" id="nav-mobile">
        <div class="container">
            <div class="navbar-header">
                <div>
                    <a href="/"><?php $this->options->title() ?></a>
                    <a id="mobile-toggle-theme">·&nbsp;Light</a>
                </div>
                <div class="menu-toggle" onclick="mobileBtn()">&#9776; Menu</div>
            </div>
            <div class="menu" id="mobile-menu">
            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
            <a class="menu-item"  href="<?php $this->options->posturl() ?>"><?php $this->options->postlisttittle() ?></a>
                    <?php while($pages->next()): ?>
                    <a <?php if($this->is('page', $pages->slug)): ?> <?php endif; ?>class="menu-item" href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a> 
                    <?php endwhile; ?>	
            </div>
        </div>
    </nav>
</header>
<script>
    var mobileBtn = function f() {
        var toggleMenu = document.getElementsByClassName("menu-toggle")[0];
        var mobileMenu = document.getElementById("mobile-menu");
        if(toggleMenu.classList.contains("active")){
           toggleMenu.classList.remove("active")
            mobileMenu.classList.remove("active")
        }else{
            toggleMenu.classList.add("active")
            mobileMenu.classList.add("active")
        }
    }
</script>
