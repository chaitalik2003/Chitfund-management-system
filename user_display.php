    
    
    
   <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Collaboration
Description: A two-column, fixed-width design suitable for small websites and blogs.
Version    : 1.0
Released   : 20080102

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Collaboration by Free CSS Templates</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<style type="text/css">
#logo h1 em {
    font-family: Cambria, Hoefler Text, Liberation Serif, Times, Times New Roman, serif;
}
#logo h2 {
    font-family: Gotham, Helvetica Neue, Helvetica, Arial, sans-serif;
}
</style>
</head>
<body>
<div id="menu">
	<ul>
		<li><a href="index.html">Homepage</a></li>
		<li class="current_page_item"><a href="aboutus.html">About us</a></li>
		<li><a href="contactus.html">Contact us</a></li>
		<li><a href="loginpage.php">Logout</a></li>
		
	</ul>
</div>
<div id="logo">
	<h1><em>Chit Fund</em></h1>
	<h2>By chaitali kulkarni</h2>
</div>
<div id="splash">
	<img src="images/img05.jpg" alt="" />
</div>
<hr />

    <!DOCTYPE html>
    <html>
    <head>
        <script language="javascript">
          function show() {
            window.print();
          }  
    
        </script>
        <title> User Display Page</title>
    </head>
    <body>
        <form name="user_display" action="user_display.php" method="post">
            <center>
                <h2>User Information Report</h2>
                <input type="submit" name="sbm" value="Display"><br>
        </center>
        </form>
    
    </body>
    </html>
    
    <?php
    $connects= mysql_connect("localhost", "root");
    
        mysql_select_db("chitfund", $connects);
        if(isset($_POST['sbm']))
        {
            $sb= $_POST['sbm'];
            if ($sb=="Submit") 
            {
                if($fl==0)
                {
                     
                    $sql ="insert into user values('$_POST[user_id]]', '$_POST[user_name]', '$_POST[password]', 
                            '$_POST[email_id]','$_POST[cont_no]')";
                    mysql_query($sql, $connects);
                    echo "data stored...";
                }
    
            }
            
            else if($sb=="Update")
            {
                $sql="update user set user_name='$_POST[user_name]',password='$_POST[password]',
                 email_id='$_POST[email_id]',cont_no='$_POST[cont_no]' where user_id=$_POST[user_id]";
                 mysql_query($sql,$connects);
                 echo "data updated..";
            }
            else if($sb=="Delete")
            {
                $sql= "delete from user where user_id='$_POST[user_id]]'";
                mysql_query($sql,$connects);
                echo "Records deleted...";
            }
            else if($sb=="Search")
            {
                echo "<center><table border=1>";
                echo "<caption>User Information</caption>";
                echo "<tr>";
                echo "<th>User Id:</th>";
                echo "<th>User Name:</th>";
                echo "<th>Password</th>";
                echo "<th>Email Id:</th>";
                echo "<th>Contact No:</th>";
                echo "</tr>";
                $sql="select * from user where user_id='$_POST[user_id]'";
                $result= mysql_query($sql, $connects);
                while ($row=mysql_fetch_array($result)) 
                {
                    echo "<tr>";
                    echo "<td>$row[0]</td>";
                    echo "<td>$row[1]</td>";
                    echo "<td>$row[2]</td>";
                    echo "<td>$row[3]</td>";
                    echo "<td>$row[4]</td>";
                    echo "</tr>";
                }
                echo "</table> </center>"; 
               
            }
            else if($sb=="Display")
            {
                echo "<center><table border=1>";
                echo "<caption>User Information</caption>";
                echo "<tr>";
                echo "<th>User Id:</th>";
                echo "<th>User Name:</th>";
                echo "<th>Password:</th>";
                echo "<th>Email Id:</th>";
                echo "<th>Contact No :</th>";
                echo "</tr>";
                session_start();
                $sql="select * from user";
                $result= mysql_query($sql, $connects);
                while ($row=mysql_fetch_array($result)) 
                {
                    echo "<tr>";
                    echo "<td>$row[0]</td>";
                    echo "<td>$row[1]</td>";
                    echo "<td>$row[2]</td>";
                    echo "<td>$row[3]</td>";
                    echo "<td>$row[4]</td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "<input type=button name=btn value=Print onclick=show()>";
                echo "</center>";
           }
        }
           
    ?>          
    
    