


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
    <title>Member page</title>
    <script language="javascript">
    function show() {
            window.print();
    }

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
    <form name="member_display" action="member_display.php" method="post">
        <center>
        <h2>Member Information Report</h2>
                <input type="submit" name="sbm" value="Display"><br>
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
                        '$_POST[pan]','$_POST[chit_no]','$_POST[mem_date]','$_POST[ch_amt_paid]','$_POST[ch_tot_amt]',
                        '$_POST[Ch_bal_amt]','$_POST[no_of_intl]','$_POST[fees]','$_POST[status]')";
                mysql_query($sql, $connects);
                echo "data stored...";
            }

        }
        
        else if($sb=="Update")
        {
            $sql="update member set name='$_POST[name]', addr='$_POST[addr]', city='$_POST[city]', cont_No='$_POST[cont_no]', 
            altcont_no='$_POST[altcont_no]', email_id='$_POST[email_id]', aadhar='$_POST[aadhar]', pan='$_POST[pan]', 
                chit_No='$_POST[chit_no]', mem_date='$_POST[mem_date]', ch_amt_paid='$_POST[ch_amt_paid]', ch_tot_amt='$_POST[ch_tot_amt]',
                ch_bal_amt='$_POST[Ch_bal_amt]', no_of_intl='$_POST[no_of_intl]', fees='$_POST[fees]', status='$_POST[status]' where mem_id='$_POST[mem_id]'";
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
            echo "<th>Chit No:</th>";
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
            session_start();
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
            echo "</table>";
            echo "<input type=button name=btn value=Print onclick=show()>";
            echo "</center>"; 
       }
    }
       
?>          