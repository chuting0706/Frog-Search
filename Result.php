<?php
    require("./Modules/Function.php");
    require("./Modules/photoFunction.php");
?>
<link href="http://i.ebayimg.com/images/i/261982144213-0-1/s-l1000.jpg" rel="shortcut icon">
<style type="text/css">
div {
	margin:  auto;
	padding: 50px;
	background-color: #FFFFFF;
	border: dotted #0f5e7f 5px;
	font-family: 微軟正黑體;
}
a{
    border: 1px solid #3B8E96;
    border-radius: 5%;
    padding: 1px 1px 1px 1px;
    width: 120px;
    background: #3B8E96;
    font-size: 15px;
    font-weight: bold;
    text-decoration-line:none;
    color: #CCFF99;
    margin: 3px;
}
a:hover{
    background: #A42D00;
    color: #FFFFFF;
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
    echo "<table><tr><td colspan=4>你輸入的值為</td></tr>"."
	<tr><td>關鍵字:".$Keyword."
	</td><td>物種:".$Label."
	</td><td>科別:".$Family."
	</td><td>屬別:".$Genus;
	echo '</td></tr></table>';
	echo '<br><a href="Search.html" >重新輸入</a>';
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
            echo "<td>圖片</td>";
            echo "</tr><tr>";
            $selector1 = 0;
            foreach ($section as $name => $val) {
                echo "<td>$val</td>";
                $selector1++;
                if($selector1 == 2) {
                  $orga = $val;
                }
            }
            $try = randSpecialOne($orga);
            // echo $orga;
            if ($rs=mysqli_fetch_array($try)) {
            echo "<td><a href='".$rs['path']."'>點擊瀏覽</a></td>";
            } else {
              echo "<td>無</td>";
            }
        } else if ($count > 0) {
            echo "</tr><tr>";
            $selector2 = 0;
            foreach ($section as $name => $val) {
                echo "<td>$val</td>";
                $selector2++;
                if($selector2 == 2) {
                  $orga = $val;
                }
            }
            $try = randSpecialOne('測試2');
            // echo $orga;
            if ($rs=mysqli_fetch_array($try)) {
            echo "<td><a href='".$rs['path']."'>點擊瀏覽</a></td>";
            } else {
              echo "<td>無</td>";
            }
        }
        echo "</tr>";
    }
    echo '</table>'
?>
</div>
