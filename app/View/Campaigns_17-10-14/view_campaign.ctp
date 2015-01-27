<section class="inner-content">
    <div class="center-block">
        <div class="repo-list-wrap">
            <h1>Campaign Detail</h1>
            <div class="repo-list reli-II">
                <?php if (!empty($campaign)) { ?>
                    <dl>
                        <dt>Campaign ID#:  <strong><?php echo $campaign["Campaign"]["id"]; ?></strong></dt>
                        <dd>&nbsp;</dd>
                        <div class="clear"></div>
                        <dt>Title : </dt>
                        <dd><?php echo $campaign["Campaign"]["title"]; ?></dd>

                        <dt>Subject</dt>
                        <dd><?php echo $campaign["Campaign"]["subject_line"]; ?>
                        </dd>

                        <dt>From</dt>
                        <dd><?php echo $campaign["Campaign"]["from_name"] . '(' . $campaign["Campaign"]["from_email"] . ')'; ?>
                        </dd>

                        <dt>Reply</dt>
                        <dd><?php echo $campaign["Campaign"]["reply_email"]; ?>
                        </dd>

                        <dt>From</dt>
                        <dd><?php echo $campaign["Campaign"]["from_email"]; ?>
                        </dd>

                        <dt>Date To Send</dt>
                        <dd><?php echo date('l, F d, Y', strtotime($campaign["Campaign"]["date_to_send"])); ?>
                        </dd>

                        <dt>Status</dt>
                        <dd><?php
                            $today = date("Y/m/d");
                            if ($campaign['Campaign']['date_to_send'] > $today) {
                                echo "Upcoming";
                            } else {
                                echo "Done";
                            }
                            ?>
                        </dd>
                    </dl>
                <?php
                } else {
                    echo "<span style='color:red;'>Data Not Found</span>";
                }
                ?>
                <div style="text-align:center;">
                    <?php $url = "http://".$_SERVER["HTTP_HOST"]."/Campaigns/previewCampaign/".  base64_encode($campaign['Campaign']['id']);?>
                    <input type="button" onclick="javascript:openWindow('<?php echo $url;?>');" value="Preview Email"> 
                    <input type="button" onclick="javascript:history.back();" value="Go Back"> 
                </div>
                <div class="clear"></div>
<?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</section>
<?php echo $this->Html->script('/js/Front/Events/createEvent'); ?>
<script>
function openWindow(url) {
    window.open(url, "_blank", "toolbar=no, scrollbars=yes, resizable=yes, top=200, left=400, width=640, height=400");
}
</script>