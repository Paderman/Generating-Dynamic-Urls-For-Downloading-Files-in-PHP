<?php
include_once 'includes/includes.php'; 
 
if(!isset($_GET['t']) || empty($_GET['t'])) {
 exit('Download identifier missing');
}
 
$fileUrl = getFileUrlByToken($_GET['t']);
 
// if download not exist
if(!$fileUrl) {
 exit('There are no download that match this identifier');
}
 
// if download expired
if($fileUrl->time_before_expire < time()) {
 exit('This download is expired');
}
 
// download
$file = getFile($fileUrl->file_id);
 
if(!empty($file->filename) && file_exists(FILES_DIRECTORY.'/'. $file->filename)) {
 
 $file = urldecode($file->filename);
 
 $filepath = FILES_DIRECTORY.'/' . $file;
 
 header('Content-Description: File Transfer');
    // header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filepath));
    flush(); // Flush system output buffer
    readfile($filepath);
    exit;
}

if(!empty($file->filename) && file_exists(FILES_DIRECTORY.'/'. $file->filename)) {
 
 $file = urldecode($file->filename);
 
 $filepath = FILES_DIRECTORY.'/' . $file;
 
 header('Content-Description: File Transfer');
    // header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filepath));
    flush(); // Flush system output buffer
    readfile($filepath);
    exit;
}
?>
