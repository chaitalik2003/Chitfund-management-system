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
		<li><a href="loginpage.php">logout</a></li>
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
        if(empty($_POST['sel_no']))
        {
            $err1="Select No Id must exist!!";
            $fl=1;
        }
        if(empty($_POST['sel_date']))
        {
            $err2="Select Date must exist!!";
            $fl=1;
        }        
        if(empty($_POST['chit_no']))
        {
            $err3="chit no must exist!!";
            $fl=1;
        }               
        if(empty($_POST['mem_id']))
        {
            $err4="Member Id must exist!!";
            $fl=1;
        }
        if(empty($_POST['ch_amt']))
        {
            $err5="Chit amt must exist!!";
            $fl=1;
        }        
              
    }
    
}
?>
<?php
$connects= mysql_connect("localhost", "root");

mysql_select_db("chitfund", $connects);
$sql="select max(sel_no) from chitselect";
$result=mysql_query($sql,$connects);
$row=mysql_fetch_array($result);
$x=$row[0]+1;
$dt=date('Y-m-d');
?>



<!DOCTYPE html>
<html>
<head>
    <title>Chit Select page</title>
    <script language="javascript">
        

    </script>
</head>
<body>
    <form name="chitselect" action="chitselect.php" method="post">
        <center>
            <table>
                <Caption>Chit Select</Caption>
                <tr>
                    <td>Select_No:</td>
                    <td><input type="number" name="sel_no" onkeypress="return nums()" id="" value=<?php echo $x;?>><?php echo $err1; ?></td>
                </tr>
                <tr>
                    <td>Select_Date:</td>
                    <td><input type="date" name="sel_date"  id="" value=<?php echo $dt;?>><?php echo $err2; ?></td>
                </tr>
                <tr>
                    <td>Chit_No:</td>
                    <td><select name="chit_no">
<?php
$cn=mysql_connect("localhost","root");
mysql_select_db("chitfund",$cn);
$sql="select * from chitmaster";
$result=mysql_query($sql,$cn);
while($row=mysql_fetch_array($result))
{
echo "<option value=$row[0]>$row[0]</option>";
}
?>

</td>
                </tr>
                <tr>
                    <td>Member_Id:</td>
                    <td><select name="mem_id">
<?php
$cn=mysql_connect("localhost","root");
mysql_select_db("chitfund",$cn);
$sql="select * from member";
$result=mysql_query($sql,$cn);
while($row=mysql_fetch_array($result))
{
echo "<option value=$row[0]>$row[1]</option>";
}
?>

 </select></td>
                </tr>
                <tr>
                    <td>Chit_Amt:</td>
                    <td><input type="number" name="ch_amt" id=""><?php echo $err5;?></td>
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
                 
                $sql ="insert into chitselect values('$_POST[sel_no]', '$_POST[sel_date]', '$_POST[chit_no]', 
                        '$_POST[mem_id]','$_POST[ch_amt]')";
                mysql_query($sql, $connects);
$sql="select * from chitmaster where chit_no='$_POST[chit_no]'";
$result=mysql_query($sql,$connects);
$row=mysql_fetch_array($result);
$n=$row[3];
                $sql="update member set chit_no='$_POST[chit_no]',ch_amt_paid=0,ch_tot_amt='$_POST[ch_amt]',ch_bal_amt='$_POST[ch_amt]',no_of_intl='$n' where mem_id='$_POST[mem_id]'";
mysql_query($sql,$connects);

                echo "data stored...";
            }

        }
        
        else if($sb=="Update")
        {
            $sql="update chitselect set sel_date='$_POST[sel_date]',chit_no='$_POST[chit_no]',
             mem_id='$_POST[mem_id]',ch_amt='$_POST[ch_amt]' where sel_no=$_POST[sel_no]";
             mysql_query($sql,$connects);
             echo "data updated..";
        }
        else if($sb=="Delete")
        {
            $sql= "delete from chitselect where sel_no='$_POST[sel_no]'";
            mysql_query($sql,$connects);
            echo "Records deleted...";
        }
        else if($sb=="Search")
        {
            echo "<center><table border=1>";
            echo "<caption>Chit Selection Information</caption>";
            echo "<tr>";
            echo "<th>Select No:</th>";
            echo "<th>Select Date:</th>";
            echo "<th>Chit No:</th>";
            echo "<th>Member Id:</th>";
            echo "<th>Chit Amt:</th>";
            echo "</tr>";
            $sql="select * from chitselect where sel_no='$_POST[sel_no]'";
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
            echo "<caption>Chit Selection Information</caption>";
            echo "<tr>";
            echo "<th>Select No:</th>";
            echo "<th>Select Date:</th>";
            echo "<th>Chit NO:</th>";
            echo "<th>Member Id:</th>";
            echo "<th>Chit Amt:</th>";
            echo "</tr>";
            $sql="select * from chitselect";
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

