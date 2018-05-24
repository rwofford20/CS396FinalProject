<html>
<head>
<head>
  <title>Suggestions</title>
  <style type = "text/css">
        /*Formatting for paragraphs*/
        p {text-align: left; color: #ffffff; text-shadow: -1px -1px 0 #000000, 1px -1px 0 #000000, -1px 1px 0 #000000, 1px 1px 0 #000000}
        /*Formatting for background image*/
        body{
            background-image: url("https://farm1.staticflickr.com/49/129967051_211a039ca6_b.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }
        /*Formatting for submit button*/
        input {text-align: center}
    </style>
</head>
</head>
<body>
<p>
<font size=4 face="Lucida Grande">
<?php
$myfile = fopen("testfile.txt", "a");
if (isset($_REQUEST["username"])) {
} else {
?>
  <!--Questions output to user with room for user to input responses-->
  <p>Is something missing on Discover Spokane? Let us know below!<br/>Location:</p>
  <form action="PHPfeedback.php" method="GET">
  <input type="text" name="username">
  <br />
  </form>

  <p>Category (Food, Outdoors, Shopping, Near Whitworth):</p>
  <form action="PHPfeedback.php" method="GET">
  <input type="text" name="username">
  <br />
  </form>

  <p>Price:</p>
  <form action="PHPfeedback.php" method="GET">
  <input type="text" name="username">
  <br />
  </form>

  <p>Distance from Whitworth:</p>
  <form action="PHPfeedback.php" method="GET">
  <input type="text" name="username">
  <br />
  <!--User submits their response-->
  <input type="submit" value="Submit">
  </form>
<?php
}
?>

<!--Output thank you statement to user-->
<p>Thank you for your input!</p>
</font>
</p>
</body>
</html>
