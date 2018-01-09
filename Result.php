<?php
    require("../Modules/Function.php");
?>
<link href="http://i.ebayimg.com/images/i/261982144213-0-1/s-l1000.jpg" rel="shortcut icon">
<style type="text/css">
div {
margin:  auto;
padding: 50px;
background-color: #FFFFF0;
border: dotted green 5px
}
a{
text-decoration:none;
color:#4B0082
}
table tr td {
background-color: #cfc;
padding: 10px;
}
</style>
<title>查詢結果</title>
<div class = "container">
<?php
    $Keyword = $_REQUEST['Keyword'];
    $Label = $_REQUEST['Label'];
    $Family = $_REQUEST['Family'];
    $Genus = $_REQUEST['Genus'];
    echo  '<a href="Search.html" >重新輸入</a>';
	echo "<table><tr><td colspan=4>你輸入的值為</td></tr>"."
	<tr><td>Keyword:</td><td>".$Keyword."
	</td><td>Label:</td><td>".$Label."
	</td></tr><tr><td>Family: </td><td>".$Family."
	</td><td>Genus:</td><td>".$Genus;
	echo '</td></tr></table>';
    echo "<hr/><h1>搜尋結果如下：</h1>";
    echo '<table class = "table"><tr>';
    $results = searchEcology($Keyword, $Label, $Family, $Genus);
    $count = 0;
    foreach ($results as $key => $section) {
        if($count == 0) {
            foreach ($section as $name => $val) {
                echo "<td>$name</td>";
                $count ++;
            }
            echo "</tr><tr>";
            foreach ($section as $name => $val) {
                echo "<td>$val</td>";
            }
        } else if ($count > 0) {
            echo "</tr><tr>";
            foreach ($section as $name => $val) {
                echo "<td>$val</td>";
            }
        }
        echo "</tr>";
    }
    echo '</table>'
?>
</div>
