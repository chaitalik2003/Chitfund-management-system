    
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
		<li><a href="index1.html">Homepage</a></li>
		<li class="current_page_item"><a href="member.php">member</a></li>
		<li><a href="user.php">user</a></li>
		<li><a href="chitmaster.php">chitmaster</a></li>
		<li><a href="chitselect.php">chitselect</a></li>
		<li><a href="installment.php">Installment</a></li>
		<li><a href="loginpage.php ">logout</a></li>
	</ul>
</div>
<div id="logo">
	<h1><em>Chit Fund</em></h1>
	<h2>By chaitali kulkarni</h2>
</div>
   <?php
    $err1="";
    $err2="";
    $err3="";
    $err4="";
    $err5="";
    $fl=0;
    
    if(isset($_POST['sbm']))
    {
        if($_POST['sbm']== "Submit")
        {
            if(empty($_POST['user_id']))
            {
                $err1="User Id must exist!!";
                $fl=1;
            }
            if(empty($_POST['user_name']))
            {
                $err2="User Name must exist!!";
                $fl=1;
            }        
            if(empty($_POST['password']))
            {
                $err3="Password must exist!!";
                $fl=1;
            }               
            if(empty($_POST['email_id']))
            {
                $err4="Email Id must exist!!";
                $fl=1;
            }
            if(empty($_POST['cont_no']))
            {
                $err5="Contact No must exist!!";
                $fl=1;
            }        
                  
        }
        
    }
    ?>
    <?php
$connects= mysql_connect("localhost", "root");

mysql_select_db("chitfund", $connects);
$sql="select max(user_id) from user";
$result=mysql_query($sql,$connects);
$row=mysql_fetch_array($result);
$x=$row[0]+1;
?>
    
    
    <!DOCTYPE html>
    <html>
    <head>
        <title>User page</title>
        <script language="javascript">
            
    
        </script>
    </head>
    <body>
        <form name="user" action="user.php" method="post">
            <center>
                <table>
                    <Caption>User page</Caption>
                    <tr>
                        <td>user_id:</td>
                        <td><input type="number" name="user_id" onkeypress="return nums()" id="" value=<?php echo $x;?>><?php echo $err1; ?></td>
                    </tr>
                    <tr>
                        <td>user_name:</td>
                        <td><input type="text" name="user_name"  id=""><?php echo $err2; ?></td>
                    </tr>
                    <tr>
                        <td>password:</td>
                        <td><input type="text" name="password" id=""><?php echo $err3; ?></td>
                    </tr>
                    <tr>
                        <td>email_id:</td>
                        <td><input type="email" name="email_id" onkeypress="return nums()" id=""> <?php echo $err4; ?></td>
                    </tr>
                    <tr>
                        <td>cont_no:</td>
                        <td><input type="number" name="cont_no" id=""><?php echo $err5; ?></td>
                    </tr>
                    
                </table>
                
                <input type="submit" name="sbm" value="Submit">
                <input type="submit" name="sbm" value="Update">
                <input type="submit" name="sbm" value="Delete">
                <input type="submit" name="sbm" value="Search">
                <input type="submit" name="sbm" value="Display">
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
                echo "<caption>UserInformation</caption>";
                echo "<tr>";
                echo "<th>User Id:</th>";
                echo "<th>User Name:</th>";
                echo "<th>Password:</th>";
                echo "<th>Email Id:</th>";
                echo "<th>Contact No :</th>";
                echo "</tr>";
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
                echo "</table> </center>";
           }
        }
           
    ?>          
    
    