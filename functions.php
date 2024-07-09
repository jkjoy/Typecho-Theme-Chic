<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
function themeConfig($form) {
    $icoUrl = new Typecho_Widget_Helper_Form_Element_Text('icoUrl', NULL, NULL, _t('站点 Favicon 地址'));
    $form->addInput($icoUrl);
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点 LOGO 地址'));
    $form->addInput($logoUrl);
    $infoUrl = new Typecho_Widget_Helper_Form_Element_Text('infoUrl', NULL, NULL, _t('跳转地址'), _t('自定义点击头像跳转的地址'));
    $form->addInput($infoUrl);
    $instagramurl = new Typecho_Widget_Helper_Form_Element_Text('instagramurl', NULL, NULL, _t('Instagram'), _t('会在个人信息显示'));
    $form->addInput($instagramurl);
    $telegramurl = new Typecho_Widget_Helper_Form_Element_Text('telegramurl', NULL, NULL, _t('电报'), _t('会在个人信息显示'));
    $form->addInput($telegramurl);
    $githuburl = new Typecho_Widget_Helper_Form_Element_Text('githuburl', NULL, NULL, _t('github'), _t('会在个人信息显示'));
    $form->addInput($githuburl);
    $twitterurl = new Typecho_Widget_Helper_Form_Element_Text('twitterurl', NULL, NULL, _t('twitter'), _t('会在个人信息显示'));
    $form->addInput($twitterurl);
    $mastodonurl = new Typecho_Widget_Helper_Form_Element_Text('mastodonurl', NULL, NULL, _t('mastodon'), _t('会在个人信息显示'));
    $form->addInput($mastodonurl);
    $posturl = new Typecho_Widget_Helper_Form_Element_Text('posturl', NULL, NULL, _t('文章列表地址'), _t('自定义文章列表的地址'));
    $form->addInput($posturl);
    $postlisttittle = new Typecho_Widget_Helper_Form_Element_Text('postlisttittle', NULL, NULL, _t('文章列表名称'), _t('自定义文章列表的标题'));
    $form->addInput($postlisttittle);
    $cnavatar = new Typecho_Widget_Helper_Form_Element_Text('cnavatar', NULL, 'https://cravatar.cn/avatar/', _t('Gravatar镜像'), _t('默认https://cravatar.cn/avatar/,建议保持默认'));
    $form->addInput($cnavatar);
    $moresns= new Typecho_Widget_Helper_Form_Element_Textarea('moresns', NULL, NULL, _t('更多的SNS'), _t('支持HTML,请参考文档'));
    $form->addInput($moresns);
    $twikoo = new Typecho_Widget_Helper_Form_Element_Textarea('twikoo', NULL, NULL, _t('引用第三方评论'), _t('不填写则不显示'));
    $form->addInput($twikoo);
    $addhead = new Typecho_Widget_Helper_Form_Element_Textarea('addhead', NULL, NULL, _t('添加head'), _t('支持HTML'));
    $form->addInput($addhead);
    $tongji = new Typecho_Widget_Helper_Form_Element_Textarea('tongji', NULL, NULL, _t('统计代码'), _t('支持HTML'));
    $form->addInput($tongji);
    $showtoc = new Typecho_Widget_Helper_Form_Element_Radio('showtoc',
    array('0'=> _t('否'), '1'=> _t('是')),
    '0', _t('是否显示文章目录'), _t('选择“是”将在文章页面显示文章目录(仅在宽度大于1400px的设备中显示)。'));
    $form->addInput($showtoc);
    $showprism = new Typecho_Widget_Helper_Form_Element_Radio('showprism',
    array('0'=> _t('否'), '1'=> _t('是')),
    '0', _t('是否代码高亮'), _t('选择“是”将引用prism.js代码高亮显示'));
    $form->addInput($showprism);
} 
function get_post_view($archive) {
    $cid = $archive->cid;
    $db = Typecho_Db::get();
    $prefix = $db->getPrefix();
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 0;');
        echo 0;
        return;
    }
    $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
    if ($archive->is('single')) {
        $views = Typecho_Cookie::get('extend_contents_views');
        if (empty($views)) {
            $views = array();
        } else {
            $views = explode(',', $views);
        }
        if (!in_array($cid, $views)) {
            $db->query($db->update('table.contents')->rows(array('views' => (int)$row['views'] + 1))->where('cid = ?', $cid));
            array_push($views, $cid);
            $views = implode(',', $views);
            Typecho_Cookie::set('extend_contents_views', $views); //记录查看cookie
            
        }
    }
    echo $row['views'];
}
// 获取Typecho的选项
$options = Typecho_Widget::widget('Widget_Options');
// 检查cnavatar是否已设置，如果未设置或为空，则使用默认的Gravatar前缀
$gravatarPrefix = empty($options->cnavatar) ? 'https://cravatar.cn/avatar/' : $options->cnavatar;
// 定义全局常量__TYPECHO_GRAVATAR_PREFIX__，用于存储Gravatar前缀
define('__TYPECHO_GRAVATAR_PREFIX__', $gravatarPrefix);
/**
* 页面加载时间
*/
function timer_start() {
    global $timestart;
    $mtime = explode( ' ', microtime() );
    $timestart = $mtime[1] + $mtime[0];
    return true;
    }
    timer_start();
    function timer_stop( $display = 0, $precision = 3 ) {
    global $timestart, $timeend;
    $mtime = explode( ' ', microtime() );
    $timeend = $mtime[1] + $mtime[0];
    $timetotal = number_format( $timeend - $timestart, $precision );
    $r = $timetotal < 1 ? $timetotal * 1000 . " ms" : $timetotal . " s";
    if ( $display ) {
    echo $r;
    }
    return $r;
    }
/*
 * 全站字数
 */
function allwords() {
    $chars = 0;
    $db = Typecho_Db::get();
    $select = $db ->select('text')->from('table.contents');//如果只要统计文章总字数不要统计单页的话可在后面加入->where('type = ?','post')
    $rows = $db->fetchAll($select);
    foreach ($rows as $row) { $chars += mb_strlen(trim($row['text']), 'UTF-8'); }
    if($chars<15000){
    echo '全站共 '.$chars.' 字,还在努力更新中';}
    elseif ($chars<35000 && $chars>15000){
    echo '全站共 '.$chars.' 字，可以写完一部《越女剑》了！';}
    elseif ($chars<80000 && $chars>35000){
    echo '全站共 '.$chars.' 字，已经写完一部《鸳鸯刀》了！';}
    elseif ($chars<130000 && $chars>80000){
    echo '全站共 '.$chars.' 字，写完一本《白马啸西风》了！';}
    elseif ($chars<230000 && $chars>130000){
    echo '全站共 '.$chars.' 字，足以写完《雪山飞狐》了！';}
    elseif ($chars<360000 && $chars>230000){
    echo '全站共 '.$chars.' 字，写完《连城诀》了！';}
    elseif ($chars<420000 && $chars>360000){
    echo '全站共 '.$chars.' 字，超越《侠客行》了！';}
    elseif ($chars<440000 && $chars>420000){
    echo '全站共 '.$chars.' 字，写完一部《碧血剑》了！';}
    elseif ($chars<550000 && $chars>440000){
    echo '全站共 '.$chars.' 字，可以写完《飞狐外传》了！';}
    elseif ($chars<900000 && $chars>550000){
    echo '全站共 '.$chars.' 字，可以写完一部《书剑恩仇录》了！';}
    elseif ($chars<1000000 && $chars>900000){
    echo '全站共 '.$chars.' 字，接近《射雕英雄传》了！';}
    elseif ($chars<1050000 && $chars>1000000){
    echo '全站共 '.$chars.' 字，超越《神雕侠侣》指日可待了！';}
    elseif ($chars<1060000 && $chars>1050000){
    echo '全站共 '.$chars.' 字，写完《倚天屠龙记》了！';}
    elseif ($chars<1250000 && $chars>1060000){
    echo '全站共 '.$chars.' 字，写完《笑傲江湖》了！';}
    elseif ($chars<1300000 && $chars>1250000){
    echo '全站共 '.$chars.' 字，写完《鹿鼎记》了！';}
    elseif ($chars<1400000 && $chars>1300000){
    echo '全站共 '.$chars.' 字，写完《天龙八部》了！';}
    elseif ($chars>1400000){
    echo '全站共 '.$chars.' 字，足以名震江湖！';}
}
//文章目录功能-给文章内标题加上id
function addHeaderLinks($text)
{
    return preg_replace_callback('/<h([1-6])>(.*?)<\/h\1>/', function ($matches) {
        $level = $matches[1];
        $title = $matches[2];
        $id = htmlspecialchars(strip_tags($title), ENT_QUOTES, 'UTF-8');
        return sprintf('<h%s id="%s"><a href="#%s" class="headerlink" title="%s">%s</a></h%s>', $level, $id, $id, $title, $title, $level);
    }, $text);
}