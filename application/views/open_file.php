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
function downloadFile($type, $file)
{
    header('Content-Description: File Transfer');
    header('Content-Type: ' . $type);
    header('Content-Disposition: attachment; filename="' . basename($file) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
}

function showFile($type, $file)
{
    header('Content-disposition: inline');
    header('Content-type: ' . $type);
    header('Content-Length: ' . filesize($file));
    readfile($file);
}

if (isset($docs) && isset($docs[0]->docPath) && $docs[0]->docPath != '') {


    $docs = $docs[0];
    $fileName = $docs->docName;
    $file = $docs->docPath;
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    if ($ext == 'doc') {
        $type = 'application/msword';
        downloadFile($type, $file);
    } elseif ($ext == 'docx') {
        $type = 'application/msword';
        downloadFile($type, $file);
    } elseif ($ext == 'csv') {
        $type = 'text/csv';
        downloadFile($type, $file);
    } elseif ($ext == 'xls') {
        $type = 'application/vnd.ms-excel';
        downloadFile($type, $file);
    } elseif ($ext == 'xlsx') {
        $type = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
        downloadFile($type, $file);
    } elseif ($ext == 'gif') {
        $type = 'image/gif';
        downloadFile($type, $file);
    } elseif ($ext == 'html' || $ext == 'htm') {
        $type = 'text/html';
        downloadFile($type, $file);
    } elseif ($ext == 'jpeg' || $ext == 'jpg') {
        $type = 'image/jpeg';
        downloadFile($type, $file);
    } elseif ($ext == 'png') {
        $type = 'image/png';
        downloadFile($type, $file);
    } elseif ($ext == 'pdf') {
        $type = 'application/pdf';
        showFile($type, $file);
    } elseif ($ext == 'mp3') {
        $type = 'audio/mpeg';
        downloadFile($type, $file);
    } elseif ($ext == 'mpeg') {
        $type = 'video/mpeg';
        downloadFile($type, $file);
    } elseif ($ext == 'zip') {
        $type = 'application/zip';
        downloadFile($type, $file);
    } else {
        $type = 'text/plain';
        downloadFile($type, $file);
    }
} else {
    echo 'No File Found';
}


?>
</body>
</html>