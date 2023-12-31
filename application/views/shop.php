<!doctype html>
<html lang="en">
    <head>
        <title>828 Home</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url('../CSS/style.css'); ?>">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <?php $this->load->view('header')?>
    <center>
        <h1 id="tag">Shop</h1> 
        <?php if($_SESSION['count']==0){?>
            <table class="table table-stripe">
            <thead>
                <tr>
                <th scope="col" style = "text-align: center">Item No.</th>
                <th scope="col" style = "text-align: center">Item Name</th>
                <th scope="col" style = "text-align: center">Item Image</th>
                <th scope="col" style = "text-align: center">Item Price</th>
                <th scope="col" style = "text-align: center">Item Stock</th> 
                </tr>
            </thead>
            </table> 
            <br><br><br><br><br><br><br><br>
            <h1 style="font-weight:lighter; font-size:3rem">Scan An Item To begin</h1>
            <form action="<?php base_url("Shop") ?>" method="post">
                <div class="form-group">
                    <label for=""></label>
                    <input type="text"
                    class="form-control" name="inputno" aria-describedby="helpId" placeholder="" autofocus>
                    <small id="helpId" class="form-text text-muted">Help text</small>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            <?php echo $_SESSION['count'];?>
        <?php }else{ ?>
            <table class="table table-stripe">
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
                <?php for($i=0;$i<$_SESSION['count'];$i++){ ?>
                    <tr>
                        <td><?php print_r($_SESSION['items']) ?></td>
                    </tr>
                <?php } ?>
            </tbody>
            </table> 
            <br><br><br><br><br><br><br><br>
            <h1 style="font-weight:lighter; font-size:3rem">Scan An Item To begin</h1>
            <form action="<?php base_url("Shop") ?>" method="post">
                <div class="form-group">
                  <label for=""></label>
                  <input type="text"
                    class="form-control" name="inputno" aria-describedby="helpId" placeholder="" autofocus>
                  <small id="helpId" class="form-text text-muted">Help text</small>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            <?php echo $_SESSION['count'];?>
        <?php } ?>
    </center>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>