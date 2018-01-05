<?php
    //if ( ! isset($_SESSION['uID']) or $_SESSION['uID'] <= 0) {
      //  header("Location: ../Views/loginForm.php");
        //exit(0);
   // }
    //require("../Modules/loginModel.php");
    require("../Modules/Function.php");
?>
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
<?php
    //include 'footer.php'
?>