<section class="inner-content">
    <div class="center-block">
        <div class="em-sec">
            <h1>Preview Compaign</h1>
            <div class="breadcrumb">
                              <ul>
                                    <li>Step 1: Template</li>
                                    <li>Step 2: Design</li>
                                    <li >Step 3: Recipients</li>
                                    <li class="active">Step 4: Preview</li>
                                </ul>
            </div>
            <div class="clear"></div>
            <div class="mo-sec-inner previewcampaign-whole">

                <div class="previewcampgn-inner">
                    <h3>Please review the details of your campaign before sending:</h3>
                    <label><strong>Email Subject Line</strong></label>
                    <label><?php echo $campaign["Campaign"]["subject_line"]; ?></label><br>

                    <label><strong>Email From Name</strong></label>
                    <label><?php echo $campaign["Campaign"]["from_name"]; ?></label><br>

                    <label><strong>Email From Email</strong></label>
                    <label><?php echo $campaign["Campaign"]["from_email"]; ?></label><br>

                    <label><strong>Email Reply Email</strong></label>
                    <label><?php echo $campaign["Campaign"]["reply_email"]; ?></label><br>

                    <label><strong>Custom Email</strong></label>
                    <label><?php echo $campaign["Campaign"]["custom_email"]; ?></label><br>
                    <?php if (!empty($campaignLists)) { ?>
                        <label><strong>Lists Email</strong></label>
                        <label><?php
                        foreach ($campaignLists as $cl) {
                            echo $cl."<br>";
                        }
                        echo '</label>';
                    }
                    ?>
<br>
                    <div class="previewinner-sbmt-btn">
                        <?php echo $this->Html->link("Change", array("controller" => "Campaigns", "action" => "campaignDetail", base64_encode($campaign["Campaign"]["id"])), array("class" => "violet_button")); ?>
                    </div>
                </div>

            </div>


            <div class="offer-ld previewcampaign-img">
                <h3>Preview Email</h3>
                <?php echo $campaign["Campaign"]["html"] ?>
                <div class="previewinner-sbmt-btn">
                    <?php echo $this->Html->link("Change", array("controller" => "Campaigns", "action" => "designTemplate", base64_encode($campaign["Campaign"]["id"])), array("class" => "violet_button")); ?>
                </div>
            </div>
<?php if($campaign["Campaign"]["send_mode"]==1) { ?>
            <div class="previewcampgn-inner">
                <h3>Scheduled to send : <?php echo date("F d, Y",strtotime($campaign["Campaign"]["date_to_send"])); ?></h3>


                <div class="previewinner-sbmt-btn">
                    <?php echo $this->Html->link("Change", array("controller" => "Campaigns", "action" => "campaignDetail", base64_encode($campaign["Campaign"]["id"])), array("class" => "violet_button")); ?>
                </div>
            </div>
<?php } ?>

            <div class="clear"></div>
            <?php echo $this->Form->create("Campaign", array("action" => "previewCampaign", "class" => "event-form", "id" => "payment_form"));
                echo $this->Form->input("Campaign.id", array("type" => "hidden","value" => $campaign_id)); ?>
            <div class="previewinner-sbmt-btn">
                 <?php
                    echo $this->Form->input("Confirm", array("type" => "submit", "label" => false, "class" => "violet_button"));
                    ?>
               
            </div>
            <?php echo $this->Form->end(); ?>
            <div class="breadcrumb">
                <!--                <ul>
                                    <li>Step 1: Design</li>
                                    <li>Step 2: Set Up</li>
                                    <li class="active">Step 3: Preview</li>
                                    <li>Step 4: Recipients</li>
                                </ul>-->
            </div>
        </div>
    </div>
</section>
<!--Bottom Details Section Ends-->
<script>
    $("div").attr("contenteditable","false");
    function remove_event(id) {
        jQuery.ajax({
            url: '/Campaigns/removeEvent/' + id,
            success: function(data) {
                if (data == 1) {
                    $("#addedEvent_" + id).remove();
                } else {
                    alert(data);
                }


            }
        });
    }
</script>