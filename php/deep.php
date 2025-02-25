<?php
$url = "https://www.flipkart.com/";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36");

$html = curl_exec($ch);
curl_close($ch);


if (!$html) {
    die("Failed to fetch Flipkart homepage.");
}


preg_match('/<title>(.*?)<\/title>/is', $html, $titleMatch);
$title = !empty($titleMatch[1]) ? $titleMatch[1] : "Title not found";

preg_match_all('/<img[^>]+src="([^"]+)"/i', $html, $matches);

$logo_url = "";
foreach ($matches[1] as $img_url) {
    if (strpos($img_url, "logo") !== false) {
        $logo_url = $img_url;
        break;
    }
}

echo "<h1>Flipkat Scraping Demo</h1>";
echo "<h1>Flipkart Page Title:</h1><p>$title</p>";

if ($logo_url) {
    echo "<h1>Flipkart Logo:</h1><img src='$logo_url' alt='Flipkart Logo'>";
} else {
    echo "<h1>Flipkart Logo Not Found.</h1>";
}
?>