<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<header>
   <nav class="navbar">
        <div class="container">
            <div class="navbar-header header-logo">
                <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a> 
            </div>
            <div class="menu navbar-right">
            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
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
