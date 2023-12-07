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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/dynamsoft-javascript-barcode@9.0.0/dist/dbr.js"></script>
  </head>
  <body>
     <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="<?php echo base_url('Home');?>">828 Store</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url('Home');?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url('Shop');?>">Shop</a>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Inventory</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="<?php echo base_url('Restock');?>">Re-Stock Items</a>
                        <a class="dropdown-item" href="<?php echo base_url('Add');?>">Add Item</a>
                        <a class="dropdown-item" href="<?php echo base_url('Remove');?>">Remove Item</a>
                        <a class="dropdown-item" href="<?php echo base_url('Update');?>">Update Item</a>
                        <a class="dropdown-item" href="<?php echo base_url('Show');?>">Show Items</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <center>
        <h1 id="tag">Add Items</h1>
        <br>
        <br>
        <form action="<?php echo base_url('Page/add')?>"  method="post" enctype="multipart/form-data">
            <br><br>
            <h3>Item Information</h3>
           <div class="form-group">
                <label for="inputNames">Item Number</label>
                <input type="text" class="form-control" value="<?php echo set_value('itemno')?>" name="itemno" autofocus>  
                <small id="error" style="color:red;" class="form-text"><?php echo form_error('itemno') ?> </small>
            </div> 
            <div class="form-group">
                <label for="inputNames">Item Name</label>
                <input type="text" class="form-control" value="<?php echo set_value('name')?>" name="name">
                <small id="error" style="color:red;" class="form-text"><?php echo form_error('name') ?> </small>
            </div>
            <br>
            <div class="form-group">
                <label>Item Image</label>
                <input type="file" class="form-control-file" name="filename" aria-describedby="fileHelpId">
            </div>
            <br>
            <div class="form-group">
                <label for="inputNames">Item Cost</label>
                <input type="number" class="form-control"  name="cost">
                <small id="error" style="color:red;" class="form-text"><?php echo form_error('cost') ?> </small>
            </div>
            <br>
            <div class="form-group">
                <label for="inputNames">Item Stock</label>
                <input type="number" class="form-control"  name="stock">
                <small id="error" style="color:red;" class="form-text"><?php echo form_error('stock') ?> </small>
            </div>
            <br>
            <input type="submit" value="Add Item" name="submit"  class="btn btn-success"></input>
            <br><br>
        </form>
        <br><br>
    </center>
    
    <!-- Optional JavaScript -->
    <script>
        $(":input").keypress(function(event){
            if(event.which=='10'||event.which=='13'){
                event.preventDefault();
            }
        })
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>