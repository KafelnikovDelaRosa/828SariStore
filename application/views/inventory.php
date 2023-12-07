<!doctype html>
<html lang="en">
    <head>
        <title>828 Home</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url('CSS/style.css'); ?>">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
        <?php include('crudtemplate.php')?>
        <?php $this->load->view('header') ?>  
        <main>
            <?php
                $config=array(
                    'table_type'=>'inventory',
                    'header'=>'Inventory',
                    'placeholder'=>'e.g id, code, name',
                    'categories'=>array(
                        'all'=>'all',
                        'name'=>'name',
                        'itemid'=>'itemid',
                    ),
                    'category'=>$category,
                    'filter_selection'=>$level,
                    'filter_name'=>'Level',
                    'filter_values'=>array(
                        'all',
                        'full',
                        'empty'
                    ),
                    'cur_page'=>$cur_page,
                    'per_page'=>$per_page,
                    'total_entries'=>$total_entries,
                    'last_entries'=>$last_entries,
                    'table_name'=>'Inventory Summary',
                    'table_headers'=>array('Itemid','Name','Image','Price','Stock','Status','Action'),
                    'root_url'=>'inventory',
                    'entry_keys'=>array('itemid','name','image','price','stock','status'),
                    'entries' =>$entries
                );
                crud($config);
            ?>
        </main>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <?php crudScript($config)?>
    </body>
</html>