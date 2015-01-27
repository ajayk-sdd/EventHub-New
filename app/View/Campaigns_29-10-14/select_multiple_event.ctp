<?php
//pr($this->Session->read("CampaignEvent"));
if ($this->Session->check("CampaignEvent")) {
    $arr = $this->Session->read("CampaignEvent");
    foreach ($arr as $key => $value) {
        echo "<ul>";
        ?>
        <li><?php echo $value; ?><a href="javascript:void(0);" onclick="javascript:selectThisEvent(<?php echo $key; ?>, '<?php echo $value; ?>');">Remove</a></li>
        <?php
        echo "</ul>";
    }
    echo $this->Html->link("Next",array("controller"=>"Campaigns","action"=>"chooseTemplate"));
} else {
    echo "<b style='color:red;'>No Event Selected Yet</b>";
}
?>