#!/usr/bin/env php
<?php 

$args = getopt("",array("file:","unique-combinations:"));


$new_product_file_content = $args["unique-combinations"];


$product_file_content = $args["file"];

$product_file = file_get_contents($product_file_content);

$splitted = preg_split("/[\t,]/",$product_file);

$split_by_new_line = preg_split("/[\n]/",$product_file);

$headers = preg_split("/[\t,]/",$split_by_new_line[0]);

$all_products = array();

$new_product_object ='';

for($j =1; $j<count($split_by_new_line);$j++){
  $product_by_limit = preg_split("/[\t,]/",$split_by_new_line[$j]);
  $all_products[] = $product_by_limit;
 
}

$cnt =0;

  while($cnt < count($all_products)){
    for($i =0; $i<count($headers); $i++){
      if($cnt == count($all_products)-1){
        break;
      }
    echo $headers[$i].":".$all_products[$cnt][$i]."\n";

    $new_product_object.= $headers[$i].":".$all_products[$cnt][$i]."\n";
    
  }

  
  $cnt++;
}

$number_of_products = count($all_products)-1;
  
 $count_object = "count:". $number_of_products."\n";
$final_product_in_file = $new_product_object.$count_object;

file_put_contents($new_product_file_content,$final_product_in_file);

