<?php //echo base64_decode($packageID); die;             ?>                                      
<section class="inner-content">
    <div class="center-block">
        <div class="em-sec">
            <h1>Create New Campaign</h1>
            <?php echo $this->Session->flash(); ?>
            <div class="breadcrumb">
                           <ul>
                                    <li >Step 1: Template</li>
                    <li>Step 2: Design</li>
                    <li class="active">Step 3: Recipients</li>
                    <li>Step 4: Preview</li>
                                </ul>
            </div>
            <div class="clear"></div>

            <div class="em-sec-inner" style="width: 100%;">
                <?php
                echo $this->Form->create("Campaign", array("action" => "campaignDetail", "class" => "event-form", "id" => "payment_form"));
                echo $this->Form->input("Campaign.id", array("type" => "hidden"));
                ?>
                <div class="emsi-part em-pa-lt">

                    <label><strong>Email Subject Line</strong></label>
                    <?php echo $this->Form->input("Campaign.subject_line", array("class" => "txtbx-bg validate[required]", "label" => FALSE, "div" => FALSE, "placeholder" => "Email Subject Line")); ?>
                    <br> <br>

                    <label><strong>Reply Email Address</strong></label>
                    <?php echo $this->Form->input("Campaign.reply_email", array("class" => "txtbx-bg validate[required,custom[email]]", "label" => FALSE, "div" => FALSE, "placeholder" => "Reply Email Address")); ?>
                    <br> <br>
                    <label><strong>Select List</strong></label>
                    <div style="border: 1px solid #DFDFDF; height: 300px;padding: 30px;">
                        <?php
                        if (!empty($this->data["CampaignList"])) {
                            foreach ($this->data["CampaignList"] as $cl) {
                                $emaillist[] = $cl["my_list_id"];
                            }
                        } else {
                            $emaillist = array();
                        }
                       /* foreach ($lists as $list) {
                            if (in_array($list["MyList"]["id"], $emaillist)) {
                                echo $this->Form->input("email", array("type" => "checkbox", "name" => "data[Campaign][email][]","checked"=>"checked", "value" => $list["MyList"]["id"], "label" => $list["MyList"]["list_name"] . "(" . $list["MyList"]["count"] . ")")) . "<br>";
                            } else {
                                echo $this->Form->input("email", array("type" => "checkbox", "name" => "data[Campaign][email][]", "value" => $list["MyList"]["id"], "label" => $list["MyList"]["list_name"] . "(" . $list["MyList"]["count"] . ")")) . "<br>";
                            }
                        }*/
                         $Listoptions = array();
                        foreach ($lists as $list) {
                            $listId = $list["MyList"]["id"];
                            $Listoptions[$listId]=$list["MyList"]["list_name"] . "(" . $list["MyList"]["count"] . ")";
                        }
                      
                       // echo $this->data['CampaignList'][0]['my_list_id'];
                       if(isset($this->data['CampaignList'][0]['my_list_id']))
                       {
                        $ListSelected = $this->data['CampaignList'][0]['my_list_id'];
                       }
                       else
                       {
                        $ListSelected = '';
                       }
                         $ListAttributes = array('legend' => false, 'label' => 'asd', 'id' => 'radio' , 'class'=>'validate[required]', "value"=>$ListSelected);
                        echo $this->Form->radio("emailList", $Listoptions, $ListAttributes);
                        ?>
                    </div>
                     <br> <br>
                       <label><strong>Send / Schedule Campaign</strong></label>
                    <label><?php
                        $options = array('0' => 'Send Now' . "", '1' => 'Shedule Campaign');
                        $attributes = array('legend' => false, 'label' => 'send_camp', 'id' => 'radio' , 'class'=>'send_comm validate[required]');
                        echo $this->Form->radio('send_mode', $options, $attributes);
                        ?></label>
                   
                   
                    <div style="display:none" id="showShed" class="showShed">
                    <label>Date To Send</label>
                    
                    <?php
                   // pr($this->data);
                    if(isset($this->data['Campaign']['date_to_send']) && !empty($this->data['Campaign']['date_to_send']) && $this->data['Campaign']['date_to_send']!="0000-00-00 00:00:00")
                    {
                        $tod = $this->data['Campaign']['date_to_send'];
                    }
                    else
                    {
                        $tod = date("Y-m-d h:i:s");
                    }
                    
                    echo $this->Form->input("Campaign.date_to_send", array("type"=>"text","class" => "startdate txtbx-bg validate[required]", "label" => FALSE, "div" => FALSE, "value"=>$tod)); ?>
                    </div>
                </div>


                <div class="emsi-part em-pa-rt">

                    <label><strong>From Name</strong></label>
                    <?php echo $this->Form->input("Campaign.from_name", array("class" => "txtbx-bg validate[required]", "label" => FALSE, "div" => FALSE, "placeholder" => "From Name")); ?>
                    <br> <br>

                    <label><strong>From Email Address</strong></label>
                    <?php echo $this->Form->input("Campaign.from_email", array("class" => "txtbx-bg validate[required,custom[email]]", "label" => FALSE, "div" => FALSE, "placeholder" => "From Email Address")); ?>
                    <br> <br>
                    <label><strong>Enter Email address(separated by "," )</strong></label>
                    <?php
                    
                    echo $this->Form->input("Campaign.custom_email", array("type" => "textarea", "class" => "txtbx-bg", "style" => "border: 1px solid #DFDFDF; height: 300px;", "label" => FALSE, "div" => FALSE, "placeholder" => "Enter Each Email Address"));
                    ?>


                    <?php
                    echo $this->Form->input("Submit", array("type" => "submit", "label" => false));
                    ?>
                </div>
                <?php echo $this->Form->end(); ?>
                <div class="clear"></div>
            </div></div></section>
<script>
    $(document).ready(function() {
        $("#payment_form").validationEngine();
        $(".startdate").datepicker({
            dateFormat: 'yy-mm-dd'
        });
        
          
          $(".send_comm").click(function() {
        if ($('#radio1').is(':checked')) {
            $('#showShed').show();
        } else {
            $('#showShed').hide();
        }
    });
          
    });
</script>