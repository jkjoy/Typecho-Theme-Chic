<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<footer id="footer" class="footer">
<?php echo allwords(); ?>
    <div class="copyright">
        <span>© <?php $this->options->title() ?> | Powered by <a href="https://typecho.org" target="_blank">Typecho</a> &  <a href="https://github.com/Siricee/hexo-theme-Chic" target="_blank">Chic</a>| Theme by  <a href="https://imsun.org" target="_blank">Sun</a> </span>
    </div>
    <?php $this->options->tongji(); ?>   
</footer>
<?php if ($this->options->showprism): ?>
  <script src="<?php $this->options->themeUrl('prism.js'); ?>"></script>
  <link rel="stylesheet" href="<?php $this->options->themeUrl('prism.css'); ?>"  />
  <script>
  document.addEventListener('DOMContentLoaded', function () {
    var defaultLanguage = 'javascript'; // 设置默认语言
    document.querySelectorAll('pre code').forEach(function (block) {
      if (!block.classList.length) {
        block.classList.add('language-' + defaultLanguage);
      }
    });
    Prism.highlightAll();
  });
</script>
<?php endif; ?>
</div>
</body>
</html>