<?php
/**
 * @var $APPLICATION
 */

use Bitrix\Main\Application;
use Bitrix\Main\Page\Asset;

?>
<?php
$curPage = $APPLICATION->GetCurPage(false);
$request = Application::getInstance()->getContext()->getRequest();
$canonical = 'http' . ($request->isHttps() == 1 ? 's' : '') . '://' . $_SERVER["HTTP_HOST"] . $curPage;

$title = $APPLICATION->GetPageProperty('title');

if ($title == '') {
    $title = $APPLICATION->GetTitle();
}
if ($title == '') {
    $title = $APPLICATION->GetDirProperty('title');
}

$type = 'website';
if (CSite::InDir('/info/articles/')) {
    $type = 'article';
}

$description = $APPLICATION->GetPageProperty('description');
if ($description == '') {
    $description = $APPLICATION->GetDirProperty('description');
}

$image = $APPLICATION->GetPageProperty('og_image');
if ($image == '') {
    $image = $canonical . SITE_STYLE_PATH . '/img/content/grandmemoria@512x512.png';
}

Asset::getInstance()->addString('<meta property="og:title" content="' . $title . '"/>', true, 'BEFORE_CSS');
Asset::getInstance()->addString('<meta property="og:type" content="' . $type . '"/>', true, 'BEFORE_CSS');
Asset::getInstance()->addString('<meta property="og:url" content="' . $canonical . '" />', true, 'BEFORE_CSS');

if ($description != '') {
    Asset::getInstance()->addString('<meta property="og:description" content="' . $description . '"/>', true, 'BEFORE_CSS');
}

Asset::getInstance()->addString('<meta property="og:image" content="' . $image . '"/>', true, 'BEFORE_CSS');
Asset::getInstance()->addString('<meta property="og:image:type" content="image/png">', true, 'BEFORE_CSS');
Asset::getInstance()->addString('<meta property="og:image:width" content="512">', true, 'BEFORE_CSS');
Asset::getInstance()->addString('<meta property="og:image:height" content="512">', true, 'BEFORE_CSS');
?>
