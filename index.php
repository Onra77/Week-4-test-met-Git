<?php include 'header.php';?>
<?php include 'user.php';?>

<?php include 'footer.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>R&M Blog</title>
    <form action="index.php" method="POST" id=search>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <input type="text" name="zoekbalk" placeholder="zoeken"><br/>
    <input name="zoek" type="submit" value="zoeken">
</form>
</head>
<body>

<div id=zoekresultaat>

<?php
if(isset($_POST['zoek'])){
 $zoekbalk = $_POST['zoekbalk'];
    $con=mysqli_connect("localhost","root","","blog2");
    $sql = "SELECT * FROM post WHERE title LIKE '%$zoekbalk%'";
    $query=mysqli_query($con, $sql);
    $rowcount=$zoekbalk=0{
    while($row=mysqli_fetch_assoc($query)) {
        if(!isset($_SESSION['username'])) {
            //true al ingelogd
            ?>
            <h3><?php echo $row['title']; ?></h3>
            <?php echo $row['content']; ?>
            <?php
        } else {
            ?>
            <h3><?php echo $row['author']; ?></h3>
            <h3><?php echo $row['title']; ?></h3>
            <?php echo $row['content']; ?>
            <?php
        }  
    }
}
} else { 
    echo "Geen resultaat."
}

?>
</div>
<?php include 'blog.php';?>
</body>
</html>