<html>
<head>
    <title>Outdoors</title>
    <style type = "text/css">
        /*Formatting for paragraphs*/
        p {text-align: center; color: #dab3ff; text-shadow: -1px -1px 0 #000000, 1px -1px 0 #000000, -1px 1px 0 #000000, 1px 1px 0 #000000}
        /*Formatting for the background image*/
        body{
            background-image: url("http://www.jasonsavagephotography.com/wp-content/gallery/gallery-glacier/Boats-200609002-4106.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }
        /*Formatting for the transluscent box in the background*/
        div.bar{
            background-color: rgba(5,4,2,0.4);
            width:600px;
            height: auto; 
            margin: auto;  
        }
    </style>
</head>
<body>

<!--Drop down menu for user to select their desired page-->
<p><font size=6 face="Lucida Grande"><div style = "text-align: center; color: #000000">
  <form method='POST'>
    What kind of outdoor activities are you looking for?
    <select name= "formOutdoors">
        <option value = "">Select...</option>
        <option value = "T">Trails</option>
        <option value = "R">Rivers</option>
        <option value = "L">Lakes</option>
        <option value = "S">Snowsports</option>
        <option value = "C">Campgrounds</option>
</select>
<!--Submit button-->
<input type='submit'></input>
</form>
</div>
</font>
</p>

<div class = "bar" >
<p><font size=5 face="Lucida Grande">
<?php
$servername  = "discoverspokane.c2to5fqkbm6d.us-east-2.rds.amazonaws.com";
$username = "rachelwofford";
$password = "wHITwORTH2018";
$dbname = "discoverspokane";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(isset($_POST['formOutdoors']))
{
  $outdoors = $_POST['formOutdoors'];
  if(!isset($outdoors))
  {
    echo("<p>Please select a category.</p>");
  }
  //Executes if user selects Trails
  else if ($outdoors == 'T')
  {
    $sql = "SELECT trailname, traillength, variation FROM Trails ORDER BY trailname";
    $result = mysqli_query($conn, $sql) or die('oops');
    
    while($row = mysqli_fetch_assoc ($result))
    {
        //If a specific trail length is recorded in the database, output that length along with other trail data
        if ($row["variation"] == 0)
        {
            echo $row["trailname"]. " <br>";
            echo "Length: ". $row["traillength"]. " miles ". "<br>"; 
            echo " <br> "; 
        }
        //Otherwise, output the trail data and state that the length varies
        else
        {
            echo $row["trailname"]. " <br>";
            echo "Length: Varies ".  "<br>"; 
            echo " <br></br> ";
        }
    }
  }
  //Executes if user selects rivers
  else if ($outdoors == "R")
  {
    $sql = "SELECT rivername FROM Rivers";
    $result = mysqli_query($conn, $sql) or die('oops');
    
    //Output the river names in alphabetical order
    while($row = mysqli_fetch_assoc ($result))
    {
        echo $row["rivername"].  " <br>";
        echo " <br></br> ";
    }
  }
  //Executes if user selects lakes
  else if ($outdoors == "L")
  {
    $sql = "SELECT lakename FROM Lakes";
    $result = mysqli_query($conn, $sql) or die('oops');
    
    //Output the lake names in alphabetical order
    while($row = mysqli_fetch_assoc ($result))
    {
        echo $row["lakename"].  " <br>";
        echo " <br></br> "; 
    }
  }
  //Executes if user selects snowsports
  else if ($outdoors == "S"){
    $sql = "SELECT locationname, website, skisnowboard, tubing, nordic FROM Snowsports";
    $result = mysqli_query($conn, $sql) or die('oops');
    
    while($row = mysqli_fetch_assoc ($result))
    {
        //Outputs snowsport location name 
        echo $row["locationname"].  " <br>";
        //Outputs corresponding website
        echo "Website: " . $row["website"]. "<br>";
        //Outputs which activities are available at the location based on information from the database
        echo "Activities: " ; 
        if ($row["skisnowboard"]== 1){
            echo "Skiing, Snowboarding" ; 
        }
        if ($row["tubing"]== 1){
            echo ", Tubing" ; 
        }
        if ($row["nordic"]== 1){
            echo ", Nordic Skiing" ; 
        }
        echo " <br></br> ";
    }
  }
  //Executes if user selects campgrounds
  else 
  {
    $sql = "SELECT campgroundname FROM Campgrounds";
    $result = mysqli_query($conn, $sql) or die('oops');
    
    //Outputs campground names in alphabetical order
    while($row = mysqli_fetch_assoc ($result))
    {
        echo $row["campgroundname"].  " <br>";
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