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
    echo '<br><a href="SearchLepidoptera.html" >重新輸入</a>';
    echo "<hr/><h1>搜尋結果如下：</h1>";
    echo '<table class = "table"><tr>';
    $results = searchEcology($Keyword, $Label, $Family);
    $count = 0;
    foreach ($results as $key => $section) {
      if($count == 0) {
        //從db撈出資料欄位名稱
          foreach ($section as $name => $val) {
              echo "<td>$name</td>";
              $count ++;
          }
          /*
           * 因`library`資料庫無圖片欄位，因此個別對圖片處理
           * 此處為印出圖片欄位名稱
           */
          echo "<td>圖片</td>";
          echo "</tr><tr>";
          $selector1 = 0;
          //從db撈出第一筆資料~
          foreach ($section as $name => $val) {
              echo "<td>$val</td>";
              $selector1++; //第一筆欄位是id
              if($selector1 == 2) { //第二筆欄位是orga
                $orga = $val; //存取資料，用來撈圖片資料
              }
          }
          $try = randSpecialOne($orga); //針對同一個物種，隨機撈出這個物種的一張圖片 (如有超過1筆是random，無則唯一)
          if ($rs=mysqli_fetch_array($try)) {
          echo "<td><a href='".$rs['path']."'>點擊瀏覽</a></td>"; //用鏈接方式開啟
          } else {
            echo "<td>無</td>"; //如果沒資料，則渲染‘無’
          }
      } else if ($count > 0) {
          echo "</tr><tr>";
          $selector2 = 0;
          foreach ($section as $name => $val) {
              echo "<td>$val</td>";
              $selector1++; //第一筆欄位是id
              if($selector1 == 2) { //第二筆欄位是orga
                $orga = $val; //存取資料，用來撈圖片資料
              }
          }
          $try = randSpecialOne($orga); //針對同一個物種，隨機撈出這個物種的一張圖片 (如有超過1筆是random，無則唯一)
          // echo $orga;
          if ($rs=mysqli_fetch_array($try)) {
          echo "<td><a href='".$rs['path']."'>點擊瀏覽</a></td>"; //用鏈接方式開啟
          } else {
            echo "<td>無</td>"; //如果沒資料，則渲染‘無’
          }
      }
        echo "</tr>";
    }
    echo '</table>'
?>
</div>
