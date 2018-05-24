<html>
<head>
  <title>Shopping</title>
  <style type = "text/css">
        /*Formatting fro paragraphs*/
        p {text-align: center; color: #dab3ff; text-shadow: -1px -1px 0 #000000, 1px -1px 0 #000000, -1px 1px 0 #000000, 1px 1px 0 #000000}
        /*Formatting for background image*/
        body{
            background-image: url("https://i.pinimg.com/736x/f4/61/c4/f461c4780cda6346f5d19e981e577a30.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }
        /*Formatting for transluscent background box*/
        div.bar{
            background-color: rgba(5,4,2,0.4);
            width:600px;
            height: auto; 
            margin: auto;  
        }
    </style>
</head>
<body>
<!--Output drop down menu to user-->
<b><p><font size=6 face="Lucida Grande"><div style = "text-align: center; color: #000000; text-shadow: -1px -1px 0 #ffffff, 1px -1px 0 #ffffff, -1px 1px 0 #ffffff, 1px 1px 0 #ffffff">
  <form method='POST'>
    What kind of shopping are you looking for?
    <select name= "formShopping">
        <option value = "">Select...</option>
        <option value = "T">Thrift Shops</option>
        <option value = "G">Grocery Stores</option>
        <option value = "M">Markets</option>
</select>
<!--Submit button-->
<input type='submit'></input>
</form>
</font>
</div>
</p>
</b>

<div class = "bar">
<p><font size=5 face="Lucida Grande">
<?php
$servername  = "discoverspokane.c2to5fqkbm6d.us-east-2.rds.amazonaws.com";
$username = "rachelwofford";
$password = "wHITwORTH2018";
$dbname = "discoverspokane";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(isset($_POST['formShopping']))
{
  $shopping = $_POST['formShopping'];
  if(!isset($shopping))
  {
    echo("<p>Please select a category.</p>");
    echo "<br></br>";
  }
  //Executes if user chooses thrift shops 
  else if ($shopping == 'T')
  {
    $sql = "SELECT thriftname FROM ThriftShops ORDER BY thriftname";
    $result = mysqli_query($conn, $sql) or die('oops');
    
    //Outputs thrift shop names in alphabetical order
    while($row = mysqli_fetch_assoc ($result))
    {
        echo $row["thriftname"].  " <br>";
        echo " <br></br> ";
    }

  }
  //Executes if user chooses grocery stores
  else if ($shopping == "G")
  {
    $sql = "SELECT storename FROM GroceryStores ORDER BY storename";
    $result = mysqli_query($conn, $sql) or die('oops');

    //Outputs grocery store names in alphabetical order
    while($row = mysqli_fetch_assoc ($result))
    {
     echo $row["storename"].  " <br>";
     echo "<br></br>";
    }

  }
  //Executes if user chooses markets
  else 
  {
    $sql = "SELECT marketname, website, daysopen, markethours, timeofyear FROM Markets ORDER BY daysopen"; 
    $result = mysqli_query($conn, $sql) or die('oops');
    while($row = mysqli_fetch_assoc ($result))
    {
      //Outputs data about market depending on data stored in database 
      // 0 = open sundays, 1 = open mondays, 2= open tuesdays, 3 = open wednesdays, 4 = open thursdays, 5 = open fridays
      // 6 = open saturdays, 7 = open everyday 
      if ($row["daysopen"]== 2){
        echo $row["marketname"].  " <br>";
        echo "Days open: Tuesday ". "<br>";
        echo "Hours: ". $row["markethours"].  " <br>";
        echo "Time of year: ". $row["timeofyear"].  " <br>";
        echo "Website: ". $row["website"].  " <br>";
      }
      else if ($row["daysopen"]== 3){
        echo $row["marketname"].  " <br>";
        echo "Days open: Wednesday ". "<br>";
        //Two short-term, last-minute fixes for errors made in inputting data in the database
        //Will be permanently fixed next time database is updated
        if ($row["markethours"] == "3:00PM - 7:00PM - " )
        {
          echo "Hours: 3:00PM - 7:00PM". " <br>";
        }
        else
        {
          echo "Hours: ". $row["markethours"].  " <br>";
        }
        if ($row["timeofyear"]== "Second Weednesday in June - October" )
        {
          echo "Time of year: Second Wednesday in June - October". " <br>";
        }
        else
        {
          echo "Time of year: ". $row["timeofyear"].  " <br>";
        }
        echo "Website: ". $row["website"].  " <br>";
      }
      else if ($row["daysopen"]== 4){
        echo $row["marketname"].  " <br>";
        echo "Days open: Thursday ". "<br>";
        echo "Hours: ". $row["markethours"].  " <br>";
        echo "Time of year: ". $row["timeofyear"].  " <br>";
        echo "Website: ". $row["website"].  " <br>";
      }
      else if ($row["daysopen"]== 6){
        echo $row["marketname"].  " <br>";
        echo "Days open: Saturday ". "<br>";
        echo "Hours: ". $row["markethours"].  " <br>";
        echo "Time of year: ". $row["timeofyear"].  " <br>";
        echo "Website: ". $row["website"].  " <br>";
      }
      else if ($row["daysopen"]== 7){
        echo $row["marketname"].  " <br>";
        echo "Days open: Everyday ". "<br>";
        echo "Hours: ". $row["markethours"].  " <br>";
        echo "Time of year: ". $row["timeofyear"].  " <br>";
        echo "Website: ". $row["website"].  " <br>";
      }
      else {
          echo $row["marketname"].  " <br>";
          echo "Hours: ". $row["markethours"].  " <br>";
          echo "Time of year: ". $row["timeofyear"].  " <br>";
          echo "Website: ". $row["website"].  " <br>";
      }
      echo " <br></br> ";

    }
    
    mysqli_close ($conn);
  }
    echo("</p>");
}

?>
</font>
</p>
</div>

</body>
</html>