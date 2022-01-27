<?php
$url = "https://www.01net.com/rss/info/flux-rss/flux-toutes-les-actualites/"; /* insérer ici l'adresse du flux RSS de votre choix */
$rss = simplexml_load_file($url);
var_dump($rss);
echo '<ul>';
foreach ($rss->channel->item as $item){
 $datetime = date_create($item->pubDate);
 $date = date_format($datetime, 'd M Y, H\hi');
 echo '<li><a href="'.$item->link.'">'.utf8_decode($item->title).'</a> ('.$date.')</li>';
}
echo '</ul>';
?>