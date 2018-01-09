<?php
    require("../Modules/Function.php");
?>
<link href="http://i.ebayimg.com/images/i/261982144213-0-1/s-l1000.jpg" rel="shortcut icon">
<style type="text/css">
div {
    margin: auto;
    padding: 50px;
    background-color: #FFFFFF;
    border: dotted #880000 5px;
	font-family: 微軟正黑體;
}
a{
    border: 1px solid #3B8E96;
    border-radius: 5%;
    padding: 1px 1px 1px 1px;
    width: 120px;
    background: #A42D00;
    font-size: 15px;
    font-weight: bold;
    text-decoration-line:none;
    color: #FFFFFF;
    margin: 3px;
}
a:hover{
    background: #3B8E96;
    color: #CCFF99;
}

table tr td {
    background-color: #FFFFBB;
    padding: 10px;
	
}
</style>
<title>查詢結果</title>
<div class = "container">
<?php
    $Keyword = $_REQUEST['Keyword'];
    $Label = $_REQUEST['Label'];
    $Family = $_REQUEST['Family'];
    echo "<table><tr><td colspan=3>你輸入的值為</td></tr>"."
    <tr><td>關鍵字:".$Keyword."
    </td><td>物種:".$Label."
    </td><td>科別:".$Family;
    echo '</td></tr></table>';
    echo '<br><a href="Search.html" >重新輸入</a>';
    echo "<hr/><h1>搜尋結果如下：</h1>";
    echo '<table class = "table"><tr>';
    $results = searchEcology($Keyword, $Label, $Family);
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
