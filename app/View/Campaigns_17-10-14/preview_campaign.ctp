<?php 
if (isset($campaign["Campaign"]["html"]) && !empty($campaign["Campaign"]["html"])) {
    echo $campaign["Campaign"]["html"];
} else {
    echo "No Data Found";
}
?>