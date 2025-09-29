<?php
header('Content-Type: application/json');

$videoDir = 'videos';
$allowedExtensions = ['mp4', 'webm', 'mov', 'ogg', 'avi'];

function scan($dir, $baseDir) {
    $result = [
        'name' => basename($dir),
        'path' => str_replace($baseDir . '/', '', $dir),
        'type' => 'folder',
        'children' => []
    ];

    $items = scandir($dir);
    if ($items === false) {
        return $result;
    }

    // Sort items alphabetically
    sort($items, SORT_NATURAL | SORT_FLAG_CASE);

    $files = [];
    $folders = [];

    foreach ($items as $item) {
        if ($item === '.' || $item === '..') {
            continue;
        }

        $path = $dir . '/' . $item;
        if (is_dir($path)) {
            $folders[] = scan($path, $baseDir);
        } else {
            $extension = strtolower(pathinfo($item, PATHINFO_EXTENSION));
            global $allowedExtensions;
            if (in_array($extension, $allowedExtensions)) {
                $files[] = [
                    'name' => $item,
                    'path' => str_replace($baseDir . '/', '', $path),
                    'type' => 'file'
                ];
            }
        }
    }

    $result['children'] = array_merge($folders, $files);
    return $result;
}

if (file_exists($videoDir)) {
    echo json_encode(scan($videoDir, $videoDir), JSON_PRETTY_PRINT);
} else {
    echo json_encode(['error' => 'The "videos" directory does not exist.'], JSON_PRETTY_PRINT);
}
?>