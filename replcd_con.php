<!---TemplateInfo codeOutsideHTMLIsLocked = "true"---> 

<?php
$link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';
mysql_close($link);
 {
	$dbselect = mysql_select_db("misict1");
$myquery_string = "SELECT * FROM replacementcard1 LIMIT 30";
        }
   

 function display_db_table($pf_matric_no, $connect)
{

$result_id = mysql_query($query_string, $connect); 
}
?>
