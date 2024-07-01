<?php 
/**
 * 友情链接
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="main">
<div class="container">
    <article class="post-wrap page">
    <div class="post-wrap">
    <h2 class="post-title">-&nbsp;&nbsp;<?php $this->title() ?>&nbsp;&nbsp;-</h2>
    <section class="post-content">
    <div id="links">
        <div class="links-content">
            <div class="link-navigation">
    <?php
            Links_Plugin::output('
            <div class="card">
            <img class="ava" src="{image}" onerror=this.onerror=null,this.src="https://cdn.jsdelivr.net/gh/jkjoy/14e@0.0.1/img/loading.svg">
            <div class="card-header">
            <div><a href="{url}" target="_blank" title="{name}">{name}</a></div>
            <div class="info" title="{title}">{title}</div>
            </div></div>
            ');
    ?>
            </div> </div> </div>
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
<style>
#links {
  padding-left: 3.5em;
}
.container .main-inner {
  width: 100%;
}
.links-content {
  margin-top: 1rem;
}
.link-navigation::after {
  content: " ";
  display: block;
  clear: both;
}
.card {
  width: 40%;
  font-size: 1rem;
  padding: 20px 10px;
  border-radius: 4px;
  transition-duration: 0.15s;
  margin-bottom: 1rem;
  display: flex;
}
.card:nth-child(odd) {
  float: left;
}
.card:nth-child(even) {
  float: right;
}
.card:hover {
  transform: scale(1.1);
  box-shadow: 0 2px 6px 0 rgba(0,0,0,0.12), 0 0 6px 0 rgba(0,0,0,0.04);
}
.card a {
  border: none;
}
.card .ava {
  width: 64px;
  height: 48px;
  margin: 0;
  margin-right: 1em;
  border-radius: 50%;
  display: block;
  transition: all 0.75s;
}

.card .ava:hover {
  -webkit-transform: rotate(360deg);
  -moz-transform: rotate(360deg);
  -o-transform: rotate(360deg);
  -ms-transform: rotate(360deg);
  transform: rotate(360deg);
}
.card .card-header {
  font-style: italic;
  overflow: hidden;
  width: 100%;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.card .card-header a {
  font-style: normal;
  color: #2bbc8a;
  font-weight: bold;
  text-decoration: none;
}
.card .card-header a:hover {
  color: #d480aa;
  text-decoration: none;
}
.card .card-header .info {
  font-style: normal;
  color: #a3a3a3;
  font-size: 12px;
  min-width: 0;
  word-break: break-word;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}    
</style>