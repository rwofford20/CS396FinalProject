<html>
<head>
    <title>Discover Spokane</title>
    <style type = "text/css">
        /*Formatting for all types of headers, paragraphs, and links*/
        h1 {text-align: center; color: #dab3ff; text-shadow: -1px -1px 0 #000000, 1px -1px 0 #000000, -1px 1px 0 #000000, 1px 1px 0 #000000}
        h2 {text-align: center; color: #239090}
        h3 {text-align: center; color: #003366}
        p {text-align: center; color: #239090}
        a {text-align: center;}
        /*Attempt to make links change color when you hover over them -- still not working */
        a:hover {color: #5c00b3;}
        /*Formatting for background image*/
        body{
            background-image: url("https://farm1.staticflickr.com/49/129967051_211a039ca6_b.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }
    </style>
</head>
<body>
<!--Links taking user to various pages -->
<p><br/><br/><br/><br/><br/><br/><br/><br/></p>
    <font size=18><h1>Discover Spokane</h1></font>
        <font size=5 face="Lucida Grande"><div style= "text-align: center">
            <!--Reference to Whitworth page -->
            <a href="OnCampus.php" style="color: #ffffff">Near Whitworth</a>
            </div></font>
       <font size=5 face="Lucida Grande"><div style= "text-align: center">
            <!--Reference to Shopping page -->
            <a href="Shopping.php" style="color: #ffffff">Shopping</a>
            </div></font>
        <font size=5 face="Lucida Grande"><div style= "text-align: center">
            <!--Reference to Outdoors page -->
            <a href="Outdoors.php" style="color: #ffffff">Outdoors</a>
            </div></font>
        <font size=5 face="Lucida Grande"><div style= "text-align: center">
            <!--Reference to Food page -->
            <a href="Food.php" style="color: #ffffff">Food</a>
            </div></font>
            <p><br></br></p>
        <font size=5 face="Lucida Grande"><div style= "text-align: center">
            <!--Reference to Suggestions Form -->
            <a href="PHPfeedback.php" style="color: #ffffff">Suggestions</a>
            </div></font>
    
    <script type="text/javascript">

</script>


<!--Sample php, doesn't output anything but used for testing-->
<?php
$servername  = "discoverspokane.c2to5fqkbm6d.us-east-2.rds.amazonaws.com";
$username = "rachelwofford";
$password = "wHITwORTH2018";
$dbname = "discoverspokane";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$sql = "SELECT shopname, latitude FROM CoffeeShops";
$result = mysqli_query($conn, $sql) or die('oops');

mysqli_close ($conn);

?>

</body>
</html>
