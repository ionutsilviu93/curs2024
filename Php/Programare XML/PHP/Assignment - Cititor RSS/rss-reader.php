<?php
if (isset($_GET['url'])) {
    $url = $_GET['url'];
    
    $rss = simplexml_load_file($url);
    
    if ($rss) {
        $items = [];
        
        foreach ($rss->channel->item as $item) {
            $items[] = [
                'title' => (string)$item->title,
                'link' => (string)$item->link,
                'description' => (string)$item->description,
            ];
        }

        echo json_encode(['items' => $items]);
    } else {
        echo json_encode(['error' => 'Nu s-a putut încărca feed-ul RSS.']);
    }
} else {
    echo json_encode(['error' => 'Nu a fost furnizată o adresă URL.']);
}
?>
