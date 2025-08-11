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
$err6="";
$err7="";
$err8="";
$err9="";
$err10="";
$err11="";
$err12="";
$err13="";
$err14="";
$err15="";
$err16="";
$err17="";
$fl=0;

if(isset($_POST['sbm']))
{
    if($_POST['sbm']== "Submit")
    {
        if(empty($_POST['mem_id']))
        {
            $err1="Member id must exist!!";
            $fl=1;
        }
        if(empty($_POST['name']))
        {
            $err2="Name must exist!!";
            $fl=1;
        }        
        if(empty($_POST['addr']))
        {
            $err3="Address must exist!!";
            $fl=1;
        }        
        if(empty($_POST['city']))
        {
            $err4="City must exist!!";
            $fl=1;
        } 
        if(empty($_POST['cont_no']))
        {
            $err5="Contact no must exist!!";
            $fl=1;
        }        
        if(empty($_POST['altcont_no']))
        {
            $err6="Alt Contact No must exist!!";
            $fl=1;
        }        
        if(empty($_POST['email_id']))
        {
            $err7="email must exist!!";
            $fl=1;
        }
        if(empty($_POST['aadhar']))
        {
            $err8="Aadhar must exist!!";
            $fl=1;
        }        
        if(empty($_POST['pan']))
        {
            $err9="PAN must exist!!";
            $fl=1;
        }          
        if(empty($_POST['mem_date']))
        {
            $err10="member date must exist!!";
            $fl=1;
        }        
        if(empty($_POST['fees']))
        {
            $err11="Fees date must exist!!";
            $fl=1;
        }        
        if(empty($_POST['status']))
        {
            $err12="status date must exist!!";
            $fl=1;
        }        
    }
    
}
?>
<?php
$connects= mysql_connect("localhost", "root");

mysql_select_db("chitfund", $connects);
$sql="select max(mem_id) from member";
$result=mysql_query($sql,$connects);
$row=mysql_fetch_array($result);
$x=$row[0]+1;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Member page</title>
    <script language="javascript">
        function nums() {
            var num;
            num= event.keyCode;
            if (num>=48 && num<=57) {
                event.keyCode=num;
                return true;
            }
            else{
                event.keyCode=0;
                return false;
            }    
        }

        function abcd() {
            var abc;
            abc= event.keyCode;
            if((abc>=65 && abc<=90)||(abc>=97 && abc<=122)|| abc==32){
                event.keyCode=abc;
                return true;
            }
            else{
                event.keyCode=0;    
                return false;
            } 
        }
        
        function adhar() {
                var ad;
            ad= event.keyCode;
            if (ad>=48 && ad<=57 || ad==32) {
                event.keyCode=ad;
                return true;
            }
            else{
                event.keyCode=0;
                return false;
            }   
        }

    </script>
</head>
<body>
    <form name="member" action="member.php" method="post">
        <center>
            <table>
                <Caption>Members Information</Caption>
                <tr>
                    <td>Member_Id:</td>
                    <td><input type="number" name="mem_id" onkeypress="return nums()" id="" value=<?php echo $x;?>><?php echo $err1; ?></td>
                </tr>
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="name" onkeypress="return abcd()" id=""><?php echo $err2; ?></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><input type="text" name="addr" id=""> <?php echo $err3; ?></td>
                </tr>
                <tr>
                    <td>City:</td>
                    <td><input type="text" name="city" id="" onkeypress="return abcd()"><?php echo $err4; ?></td>
                </tr>
                <tr>
                    <td>Contact_No:</td>
                    <td><input type="number" name="cont_no" id="" ><?php echo $err5; ?></td>
                </tr>
                <tr>
                    <td>Alt_Contact_No:</td>
                    <td><input type="number" name="altcont_no" id="" ><?php echo $err6; ?></td>
                </tr>
                <tr>
                    <td>Email_ID:</td>
                    <td><input type="email" name="email_id" id=""><?php echo $err7; ?></td>
                </tr>
                <tr>
                    <td>Aadhar_Card_No:</td>
                    <td><input type="text" name="aadhar" onkeypress="return adhar()" maxlength="14" id=""><?php echo $err8; ?></td>
                </tr>
                <tr>
                    <td>PAN_No:</td>
                    <td><input type="text" name="pan" id=""><?php echo $err9; ?></td>
                </tr>
                <tr>
                    <td>Mem_date:</td>
                    <td><input type="date" name="mem_date" id=""><?php echo $err10; ?></td>
                </tr>
                <tr>
                    <td>Fees:</td>
                    <td><input type="number" name="fees" id=""><?php echo $err11; ?></td>
                </tr>
                <tr>
                    <td>Status:</td>
                    <td><input type="text" name="status" onkeypress="return abcd ()" id=""><?php echo $err12; ?></td>
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

    mysql_select_db("chitfund",$connects);
    if(isset($_POST['sbm']))
    {
        $sb= $_POST['sbm'];
        if ($sb=="Submit") 
        {
            if($fl==0)
            {
                 
                $sql ="insert into member values('$_POST[mem_id]', '$_POST[name]', '$_POST[addr]', 
                        '$_POST[city]','$_POST[cont_no]', '$_POST[altcont_no]','$_POST[email_id]', '$_POST[aadhar]',
                        '$_POST[pan]','$_POST[mem_date]','$_POST[fees]','$_POST[status]')";
                mysql_query($sql, $connects);
                $sql="insert into user values('$_POST[mem_id]',$_POST[name]','$_POST[mem_id]','$_POST[email_id]','$_POST[cont_no]')";
                mysql_query($sql,$connects);
                echo "data stored...";
            }

        }
        
        else if($sb=="Update")
        {
            $sql="update member set name='$_POST[name]', addr='$_POST[addr]', city='$_POST[city]', cont_No='$_POST[cont_no]', 
            altcont_no='$_POST[altcont_no]', email_id='$_POST[email_id]', aadhar='$_POST[aadhar]', pan='$_POST[pan]', 
                 mem_date='$_POST[mem_date]', fees='$_POST[fees]', status='$_POST[status]' where mem_id='$_POST[mem_id]'";
            mysql_query($sql, $connects);
            echo "data updated..";
        }
        else if($sb=="Delete")
        {
            $sql="delete from member where Mem_Id='$_POST[mem_id]'";
            mysql_query($sql, $connects);
            echo "Records deleted...";
        }
        else if($sb=="Search")
        {
            echo "<center><table border=1>";
            echo "<caption>member Information</caption>";
            echo "<tr>";
            echo "<th>Member's ID:</th>";
            echo "<th>Name:</th>";
            echo "<th>Address:</th>";
            echo "<th>City:</th>";
            echo "<th>Contact:</th>";
            echo "<th>Alt Contact:</th>";
            echo "<th>Email Id::</th>";
            echo "<th>Aadhar Card:</th>";
            echo "<th>PAN Card:</th>";
            echo "<th>Mem date:</th>";
            echo "<th>Fees:</th>";
            echo "<th>Status:</th>";
            echo "</tr>";
            $sql="select * from member where mem_id='$_POST[mem_id]'";
            $result= mysql_query($sql, $connects);
            while($row=mysql_fetch_array($result)) 
            {
                echo "<tr>";
                echo "<td>$row[0]</td>";
                echo "<td>$row[1]</td>";
                echo "<td>$row[2]</td>";
                echo "<td>$row[3]</td>";
                echo "<td>$row[4]</td>";
                echo "<td>$row[5]</td>";
                echo "<td>$row[6]</td>";
                echo "<td>$row[7]</td>";
                echo "<td>$row[8]</td>";
                echo "<td>$row[9]</td>";
                echo "<td>$row[10]</td>";
                echo "<td>$row[11]</td>";
                echo "</tr>";
            }
            echo "</table> </center>"; 
           
        }
        else if($sb=="Display")
        {
            echo "<center><table border=1>";
            echo "<caption>member Information</caption>";
            echo "<tr>";
            echo "<th>Member's ID:</th>";
            echo "<th>Name:</th>";
            echo "<th>Address:</th>";
            echo "<th>City:</th>";
            echo "<th>Contact:</th>";
            echo "<th>Alt Contact:</th>";
            echo "<th>Email Id::</th>";
            echo "<th>Aadhar Card:</th>";
            echo "<th>PAN Card:</th>";
            echo "<th>Mem date:</th>";
            echo "<th>Fees:</th>";
            echo "<th>Status:</th>";
            echo "</tr>";
            $sql="select * from member";
            $result= mysql_query($sql,$connects);
            while($row=mysql_fetch_array($result)) 
            {
                echo "<tr>";
                echo "<td>$row[0]</td>";
                echo "<td>$row[1]</td>";
                echo "<td>$row[2]</td>";
                echo "<td>$row[3]</td>";
                echo "<td>$row[4]</td>";
                echo "<td>$row[5]</td>";
                echo "<td>$row[6]</td>";
                echo "<td>$row[7]</td>";
                echo "<td>$row[8]</td>";
                echo "<td>$row[9]</td>";
                echo "<td>$row[10]</td>";
                echo "<td>$row[11]</td>";
                echo "</tr>";
            }
            echo "</table> </center>"; 
       }
    }
       
?>          