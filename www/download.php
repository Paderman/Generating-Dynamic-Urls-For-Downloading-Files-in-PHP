<?php include_once 'includes/includes.php'; ?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Download</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
 
 <style>
 .download-box {
     border: 2px solid #ccc;
     box-shadow: 0 0 1px 1px #ccc inset;
     padding: 10px;
 }
 
 #download-counter {
 font-weight: bold;
 color: blue;
 font-size: 15px;
 }
 </style>
 
</head>
<body>
 
 <div class="container">
 <div class="row">
 <?php $file = checkId(); ?>
 
 <?php if(($data = getFileUrl($file->id))) { ?>
 <div class="col-md-12">
 <p class="text-center">Use this direct link</p>
 
 <div class="text-center download-wrapper">
 <?php 
 $token_identifier = $data->token_identifier;
 
 $time_before_expire = round(($data->time_before_expire - time())/(60*60)); 
 
 include_once 'includes/download-box.php'; 
 ?>
 </div>
 
 
 
 </div>
 <?php } else { ?>
    <div class="col-md-12">
 <p class="text-center">Please wait until we generate your download link</p>
 
 <div class="text-center" id="download-counter"></div>
 
 <div class="text-center download-wrapper"></div>
    </div>
 <?php } ?>
 </div>
 </div>
 
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
 
 <script>
     var file_id = '<?= $file->id ?>';
     var project_url = '<?= PROJECT_URL ?>';
 </script>
 
 <script src="./scripts/scripts.js" type="text/javascript"></script>
</body>
</html>
