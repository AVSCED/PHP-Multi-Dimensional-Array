<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi Dimensional Array Task</title>
    <style>
      table{
      border:1px solid green;
    }
      table th{
        border:1px solid green;
      }
      table td {
        border:1px solid green;
      }
    </style>
</head>
<?php 
echo "<h3>1.)Create Multidimensional array of the following table</h3><br>";
    $parent_data =array(
              array(
                array("Time"=>"Q1","Location"=>"Kolkata","Milk"=>"340" , "Egg"=>"604" , "Bread"=>"38"),
                array("Time"=>"Q1","Location"=>"Delhi","Milk"=>"335" , "Egg"=>"365" , "Bread"=>"35"),
                array("Time"=>"Q1","Location"=>"Mumbai","Milk"=>"336" , "Egg"=>"484" , "Bread"=>"80")
                   ),
              array( 
                array("Time"=>"Q2","Location"=>"Kolkata","Milk"=>"680" , "Egg"=>"583" , "Bread"=>"10"),
                array("Time"=>"Q2","Location"=>"Delhi","Milk"=>"684" , "Egg"=>"490" , "Bread"=>"48"),
                array("Time"=>"Q2","Location"=>"Mumbai","Milk"=>"595" , "Egg"=>"594" , "Bread"=>"39")
                   ),
              array(
                array("Time"=>"Q3","Location"=>"Kolkata","Milk"=>"535" , "Egg"=>"490" , "Bread"=>"50"),
                array("Time"=>"Q3","Location"=>"Delhi","Milk"=>"389" , "Egg"=>"385" , "Bread"=>"15"),
                array("Time"=>"Q3","Location"=>"Mumbai","Milk"=>"366" , "Egg"=>"385" , "Bread"=>"20")
                   )
                );

                $str="<table style='border:1px solid green;'><tr><td rowspan=3> Time:</td><td colspan=3> Location =".$parent_data[0][0]["Location"]."</td><td colspan=3> Location =".$parent_data[0][1]["Location"]."</td><td colspan=3> Location =".$parent_data[0][2]["Location"]."</td></tr>";
                $str.="<tr><td colspan=3> Item</td><td colspan=3> Item</td><td colspan=3> Item</td></tr>";
                $str.="<tr><td>Milk</td><td>Egg</td><td>Bread</td><td>Milk</td><td>Egg</td><td>Bread</td><td>Milk</td><td>Egg</td><td>Bread</td></tr>";


    foreach ($parent_data as $key => $value) {
        $str.="<tr> <td>".$value[0]["Time"]."</td><td>".$value[0]["Milk"]."</td><td>".$value[0]["Egg"]."</td><td>".$value[0]["Bread"]."</td>
        <td>".$value[1]["Milk"]."</td><td>".$value[1]["Egg"]."</td><td>".$value[1]["Bread"]."</td>
        <td>".$value[2]["Milk"]."</td><td>".$value[2]["Egg"]."</td><td>".$value[2]["Bread"]."</td></tr>";
    }
    $str.="</table>";
    echo $str;
    echo "<hr>";
    echo "<br>";
    echo "<h3>2.)Identify the Quarter with maximum sale of Egg </h3><br>";
    $max_egg=array();
    foreach ($parent_data as $key => $value) {
      $sum=$value[0]["Egg"]+$value[1]["Egg"]+$value[2]["Egg"];
      array_push($max_egg,$sum);
    }
    $max = max($max_egg);
    $index=array_search($max,$max_egg);
    
    echo "Max sale of egg in Quater".$index;
    echo "<hr>";
    echo "<br>";

    echo"<h3>3.)Identify the Location with minimum consumption of Milk</h3>";
    $milk=array(0,0,0);
    foreach ($parent_data as $key => $value) {
        if($value[0]['Location'] == "Kolkata"){
            $milk[0]+=$value[0]['Milk'];
        }
        if($value[1]['Location'] == "Delhi"){
            $milk[1]+=$value[1]['Milk'];
        }
        if($value[2]['Location'] == "Mumbai"){
            $milk[2]+=$value[2]['Milk'];
        }
    }
    $min = min($milk);
    $index = array_search($min,$milk);
    if($index == 0){
      echo "Minumum consumption of milk is in Kolkata";
    }
    if($index == 1){
        echo "Minumum consumption of milk is in Delhi";
      }
      if($index == 2){
        echo "Minumum consumption of milk is in Mumbai";
      }
      echo "<hr>";
      echo "<br>";
      echo "<h3>4.)Delete location with Minimum sale of Bread</h3><br>";
      $bread_sum=array(0,0,0);
      foreach ($parent_data as $key => $value) {
          if($value[0]['Location']== "Kolkata"){
              $bread_sum[0] += $value[0]["Bread"];
            }
            if($value[1]['Location']== "Delhi"){
                $bread_sum[1] += $value[1]["Bread"];
            }
            if($value[2]['Location']== "Mumbai"){
                $bread_sum[2] += $value[2]["Bread"];
            }
        }
      $min =min($bread_sum);
      $ind=array();
      for($i=0;$i<count($bread_sum);$i++){
        if($bread_sum[$i]==$min){
            array_push($ind,$i);
        }
      }
      foreach ($parent_data as $key => $value) {
          for($i=count($ind)-1;$i>=0;$i--){
            array_splice($parent_data[$key],$i,1);
              
        }
      };
      
      $str = "<table><tr><td rowspan=3 >Time</td><td colspan=3 >Location=".$parent_data[0][0]['Location']."  </td></tr>";
      $str.= "<tr><td colspan=3> Item</td></tr>";
      $str.= "<tr><td>Milk</td><td>Egg</td><td>Bread</td></tr>";
      foreach($parent_data as $key => $value){
        $str.="<tr><td>".$value[0]["Time"]."</td><td>".$value[0]["Milk"]."</td><td>".$value[0]["Egg"]."</td><td>".$value[0]["Bread"]."</td></tr>";
      }
      $str.="</table>";
      echo $str;
          ?>
</body>
</html>