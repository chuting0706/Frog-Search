<?php
    require("../Modules/Function.php");
?>
<link href="http://i.ebayimg.com/images/i/261982144213-0-1/s-l1000.jpg" rel="shortcut icon">
<title>查詢結果</title>
<div class = "container">
<?php
    $Keyword = $_REQUEST['Keyword'];
    $Label = $_REQUEST['Label'];
    $Family = $_REQUEST['Family'];
    $Genus = $_REQUEST['Genus'];
    echo "你輸入的值為："."<br/>Keyword: ".$Keyword."<br/>Label: ".$Label."<br/>Family: ".$Family."<br/>Genus: ".$Genus;
    echo "<br/><hr/><h1>搜尋結果如下：</h1>";
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
