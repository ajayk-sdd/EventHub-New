<?php
#pr($listdetail);
?>
<section class="inner-content">
    <div class="center-block">
        <div class="repo-list-wrap">
            <h1>Reporting for <?php echo $listdetail['MyList']['list_name']; ?></h1>
            <div class="repo-list reli-II">
               
                <dl>
                    <dt>Date of Last Send:</dt>
                    <dd>12/15/14 - 12:30</dd>
               
                    <dt># Contacts on List: </dt>
                    <dd><?php echo count($listdetail['ListEmail']); ?>
                    </dd>
                    <?php
                             
                        $RateDetail =   $this->Common->listrate($listdetail["OpenRate"]);
                               
                    ?>
                                        
                    <dt>Opens: </dt>
                    <dd><?php echo $RateDetail["OpenRate"] ;?>
                    </dd>
                    
                    <dt>Clicks: </dt>
                    <dd><?php echo $RateDetail["ClickRate"]; ?>
                    </dd>
                    
                    <dt>Region Breakdown: </dt>
                    <dd><div class="list-rgn-break"><?php echo $RateDetail["RegionPer1"] ;?> Northeast US <br> <?php echo $RateDetail["RegionPer2"] ;?> Midwest US <br> <?php echo $RateDetail["RegionPer3"] ;?> South US <br> <?php echo $RateDetail["RegionPer4"] ;?> West US <br> <?php echo $RateDetail["RegionPer5"] ;?> Others
                    </dd>
                </dl>
                <div style="text-align:center;">
                 
                    <input type="button" onclick="javascript:history.back();" value="Go Back"> 
                </div>
                <div class="clear"></div>
             
            </div>
        </div>
    </div>
</section>

