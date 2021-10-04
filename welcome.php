<!DOCTYPE html>
<html>
<style>
    body{
     background: url('image/blk.jpg');
     color:white;
    }
    h1{
        color:yellow;
    }
    a{
        color:yellow;
    }
</style>

    <body>
        <h1>Welcome user you are successfully registered</h1>
        <h4>Your registered id is <?php echo $_GET['uid'];?></h4>
        <p> For go to login page <a href="index00.php">click here</a> </p>
    </body>
</html>