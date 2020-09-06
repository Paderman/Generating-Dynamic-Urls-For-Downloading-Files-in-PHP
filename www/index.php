<?php include_once 'includes/includes.php'; ?><!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8" />
 <title>Downloader</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
 
 <style>
 .bottom-spacing { margin-bottom: 10px; }
 </style>
</head>
<body>
 
 <div class="container">
 <h2>Downloads</h2>
 
 <p>Click on any of the download links below</p>
 
 <?php foreach (getFiles() as $row): ?>
 <div class="row bottom-spacing">
 <div class="col-md-6"><strong><?= $row->filename ?></strong></div>
 <div class="col-md-6"><a href="download.php?id=<?= $row->id ?>" class="btn btn-success center-block">Download</a></div>
 </div>
 <?php endforeach ?>
 
 </div>
</body>
</html>
