<html>
<head>
  <title>Food</title>
  <style type = "text/css">
        /*Formatting for paragraphs*/
        p {text-align: center; color: #dab3ff; text-shadow: -1px -1px 0 #000000, 1px -1px 0 #000000, -1px 1px 0 #000000, 1px 1px 0 #000000}
        /*Formatting for the background image*/
        body{
            background-image: url("https://i.pinimg.com/originals/ed/a4/d9/eda4d96421b61beb3f87b0731979c8b1.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }
        /*Formatting for the user's selection in the menu*/
        input {text-align: center}
        /*Formatting for the transluscent background box*/
        div.bar{
            background-color: rgba(5,4,2,0.4);
            width:550px;
            height: auto; 
            margin: auto;  
        }
    </style>
</head>
<body>
<p><font size=6 face="Lucida Grande"><div style = "text-align: center; color: #000000">
  <!--Drop down menu for user to select options-->
  <form method='POST'>
    What kind of food are you looking for?
    <select name= "formFood">
        <option value = "">Select...</option>
        <option value = "C">Coffee Shops</option>
        <option value = "R">Restaurants</option>
        <option value = "RLTH">Restaurants priced low to high</option>
        <option value = "RFT">Restaurants based on food type</option>
</select>
<!--Submit button-->
<input type='submit'></input>
</form></div></font>
</p>

<div class = "bar">
<p><font size=5 face="Lucida Grande"
<?php
//Connects to database
$servername  = "discoverspokane.c2to5fqkbm6d.us-east-2.rds.amazonaws.com";
$username = "rachelwofford";
$password = "wHITwORTH2018";
$dbname = "discoverspokane";

$conn = mysqli_connect($servername, $username, $password, $dbname);
$oldrow = 1; 

if(isset($_POST['formFood']))
{
  $food = $_POST['formFood'];
  if(!isset($food))
  {
    echo("<font size=10><p>Please select a category.</p></font>");
  }
  //Executes if user selects coffee shops
  else if ($food == 'C')
  {
    $sql = "SELECT shopname FROM CoffeeShops ORDER BY shopname";
    $result = mysqli_query($conn, $sql) or die('oops');
    
    //Outputs coffee shop names alphabetically
    while($row = mysqli_fetch_assoc ($result))
    {
        echo $row["shopname"].  " <br>";
        echo "<br></br>"; 
    }
    
  }
  //Executes if user selects Restaurants
  else if ($food == "R")
  {
    $sql = "SELECT restname, price, foodtype FROM Restaurants ORDER BY restname";
    $result = mysqli_query($conn, $sql) or die('oops');
    
    //Outputs restaurant names alphabetically 
    while($row = mysqli_fetch_assoc ($result))
    {
        //Outputs restaurants name
        echo $row["restname"]. "<br>";
        //Assigns correct number of dollar signs to pricing level stored in database and outputs it 
        if ($row["price"]== 1){
          echo "Price: $". "<br>";
        }
        else if ($row["price"]== 2){
          echo "Price: $$". "<br>";
        }
        else if ($row["price"]== 3){
          echo "Price: $$$". "<br>";
        }
        else {
          echo "Price: Not available". "<br>"; 
        }
        //Outputs type of food restaurant serves
        echo $row["foodtype"]. " <br>";
        echo " <br></br> ";
    }
  }
  //Executes if user selects restaurants priced low to high
  else if ($food == "RLTH")
  {
    $sql = "SELECT restname, price, foodtype FROM Restaurants ORDER BY price, restname";
    $result = mysqli_query($conn, $sql) or die('oops');  
    while($row = mysqli_fetch_assoc ($result))
    {
        //Outputs a break between different price sections
        if ($oldrow != $row["price"]){
            echo " <br> "; 
        }
        //Outputs restaurant data based on price
        if ($row["price"]== 1){
          echo $row["restname"]. "<br>";
          echo "Price: $". "<br>";
          echo $row["foodtype"]. " <br>";
        } 
        else if ($row["price"] == 2){
          echo $row["restname"]. "<br>";
          echo "Price: $$". "<br>";
          echo $row["foodtype"]. " <br>";
        }
        else if ($row["price"]== 3){
          echo $row["restname"]. "<br>";
          echo "Price: $$$". "<br>";
          echo $row["foodtype"]. " <br>";
        }
        else {
          echo $row["restname"]. "<br>";
          echo "Price: Not available". "<br>"; 
          echo $row["foodtype"]. " <br>";
        }
        //Sets variable old row to current restaurant's price
        $oldrow = $row["price"];
    echo " <br></br> ";
      }
  }
  //Executes if user selects restaurants based on food type
  else{ 
      $sql = "SELECT restname, price, foodtype FROM Restaurants ORDER BY foodtype, restname";
      $result = mysqli_query($conn, $sql) or die('oops');
      
      while($row = mysqli_fetch_assoc ($result))
      {
          //Outputs restaurant's name
          echo $row["restname"]. "<br>";
          //Outputs restaurant's price based on values stored in the database
          if ($row["price"]== 1){
            echo "Price: $". "<br>";
          }
          else if ($row["price"]== 2){
            echo "Price: $$". "<br>";
          }
          else if ($row["price"]== 3){
            echo "Price: $$$". "<br>";
          }
          else {
            echo "Price: Not available". "<br>"; 
          }
          //Outputs the type of food
          echo $row["foodtype"]. " <br>";
          echo " <br></br> ";
      }
  }
    
    mysqli_close ($conn);
    echo("</p>");
}

?>
</font></p></div>
</body>
</html>

