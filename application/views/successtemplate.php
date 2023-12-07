<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('CSS/success.css')?>">
    <link rel="icon" href="<?php echo base_url('images/828Logo.png') ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>828 <?php echo $title ?></title>
</head>
<body>
    <div class="wrapper">
        <?php $root=($root_url==='mrp')?'mrp':$root_url.'/1'; ?>
        <img src="<?php echo base_url('images/828Logo.png') ?>" width=100 height=100 alt="828">
        <h3>
            <?php echo $message ?>
        </h3>   
        <button class="btn" onclick="window.location.href='<?php echo base_url().$root?>'">
            <?php echo $return ?>
        </button>
    </div>
</body>
</html>