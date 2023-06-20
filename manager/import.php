<?php
// require_once('functions/init.php');

// $row = 1;
// $headerLine = true;

// if (($handle = fopen("upload.csv", "r")) !== FALSE) {

//   while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

//     if($headerLine) { $headerLine = false; }
//     else {
//         $stock_id = $data[0];
//         $stock_name = ucfirst(strtolower($data[1]));
//         $stock_desc = $data[2];
//         $stock_desc = escape($stock_desc);
//         $stock_count = $data[3];
//         $stock_price = $data[4];
//         $stock_price = substr($stock_price, 3);
//         $stock_expiry = $data[5];

//         echo $stock_name . "<br />\n";
//         echo $stock_price . "<br />\n";

//         $url = clean_url($stock_name);
//         $stock_keywords = substr($stock_desc, 0, 100);
        

//         $r = query("INSERT INTO tbl_products (title, url_title, keywords, description, price, stock) VALUES ('$stock_name', '$url', '$stock_keywords', '$stock_desc', '$stock_price', '$stock_count')");
//         if($r) {
//             echo("added");
//         } else {
//             echo(mysqli_error($con));
//         }
//     }

//   }
//   fclose($handle);
// }