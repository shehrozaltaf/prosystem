<html>
<head>
    <title>PRO System</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
$file = '';
$type = 'text/plain';
if (isset($docs) && isset($docs[0]->docPath) && $docs[0]->docPath != '') {
    $docs = $docs[0];
    $fileName = $docs->docName;
    $file = $docs->docPath;
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    if ($ext == 'doc') {
        $type = 'application/msword';
    } elseif ($ext == 'docx') {
        $type = 'application/msword';
    } elseif ($ext == 'csv') {
        $type = 'text/csv';
    } elseif ($ext == 'xls') {
        $type = 'application/vnd.ms-excel';
    } elseif ($ext == 'xlsx') {
        $type = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
    } elseif ($ext == 'gif') {
        $type = 'image/gif';
    } elseif ($ext == 'html' || $ext == 'htm') {
        $type = 'text/html';
    } elseif ($ext == 'jpeg' || $ext == 'jpg') {
        $type = 'image/jpeg';
    } elseif ($ext == 'png') {
        $type = 'image/png';
    } elseif ($ext == 'pdf') {
        $type = 'application/pdf';
    } elseif ($ext == 'mp3') {
        $type = 'audio/mpeg';
    } elseif ($ext == 'mpeg') {
        $type = 'video/mpeg';
    } elseif ($ext == 'zip') {
        $type = 'application/zip';
    } else {
        $type = 'text/plain';
    }
}
header('Content-disposition: inline');
header('Content-type: ' . $type);
readfile($file);
?>
</body>
</html>