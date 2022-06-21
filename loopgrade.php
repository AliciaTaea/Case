<?php  
    $grade ='';
    $x = 75;

    switch($x){
      case ($x >= 80):
        $grade = 'เกรดที่ได้คือ A';
        break;
      case ($x >= 75):
        $grade = 'เกรดที่ได้คือ B+';
        break;
      case ($x >= 70):
        $grade = 'เกรดที่ได้คือ B';
        break;
      case ($x >= 65):
        $grade = 'เกรดที่ได้คือ C+';
        break;
      case ($x >= 60):
        $grade = 'เกรดที่ได้คือ C';
        break;
      case ($x >= 55):
        $grade = 'เกรดที่ได้คือ D+';
        break;
      case ($x >= 50):
        $grade = 'เกรดที่ได้คือ D';
        break;
      case ($x >= 45):
        $grade = 'เกรดที่ได้คือ F';
        break;
    }
    echo 'เกณฑ์การประเมินการให้คะแนน : ';  
    echo $grade;    

 ?>

