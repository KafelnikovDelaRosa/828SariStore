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
  </head>
  <body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="<?php echo base_url('Page/home');?>">828 Store</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url('Page/home');?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url('Page/shop');?>">Shop</a>
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
        <h1 id="tag">Restock Items</h1>
        <h2>Item Information</h2>
        <table class="table table-dark">
            <thead>
                <tr>
                <th scope="col" style = "text-align: center">Item No.</th>
                <th scope="col" style = "text-align: center">Item Name</th>
                <th scope="col" style = "text-align: center">Item Image</th>
                <th scope="col" style = "text-align: center">Item Price</th>
                <th scope="col" style = "text-align: center">Item Stock</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($item as $info){
                        echo "<tr>";
                        echo "<td>".$info->itemid."</td>";
                        echo "<td>".$info->name."</td>";
                        echo "<td>"."<img src=".base_url('uploads/'.$info->image).">"."</td>";
                        echo "<td>"."₱".$info->price."</td>";
                        echo "<td>".$info->stock."X"."</td>";
                        echo "</tr>";
                    } 
                ?>
            </tbody>
        </table>
        <br><br><br><br><br><br>
        <h2>Item Successfully Restocked</h2>
        <a href="<?php echo base_url('Restock')?>"><input type="submit" value="Go Back" class="btn btn-success"></input></a> 
    </center>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
<