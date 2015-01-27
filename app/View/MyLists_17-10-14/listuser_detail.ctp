<?php
#pr($listemail);
?>
<section class="inner-content">
    <div class="center-block">
        <div class="repo-list-wrap">
            <h1>Edit User Detail</h1>
            <div class="repo-list reli-II">
                <?php echo $this->Session->flash(); ?>
                <?php
                
                echo $this->Form->create("MyLists", array("action" => "listuserDetail/".base64_encode($listemail["ListEmail"]["id"]), "id" => "editUser"));
                echo $this->Form->input("MyLists.id", array("type" => "hidden","value" => $listemail["ListEmail"]["id"]));
                ?>
                <dl>
                    <dt>User ID#:  <strong><?php echo $listemail["ListEmail"]["id"]; ?></strong></dt>
                    <dd>&nbsp;</dd>
                    <div class="clear"></div>
                    <dt>Email-Id</dt>
                    <dd><?php echo $this->Form->input("email", array("type" => "text", "label" => FALSE, "div" => FALSE, "class" => "validate[required,custom[email]] ", "id" => "email", "value" => $listemail["ListEmail"]["email"])); ?></dd>

                    <dt>First Name</dt>
                    <dd><?php echo $this->Form->input("first_name", array("type" => "text", "label" => FALSE, "div" => false, "class" => "validate[required] ", "id" => "fname", "value" => $listemail["ListEmail"]["first_name"])); ?>
                    </dd>

                    <dt>Last Name</dt>
                    <dd><?php echo $this->Form->input("last_name", array("type" => "text", "label" => FALSE, "div" => false, "class" => "validate[required] ", "id" => "lname", "value" => $listemail["ListEmail"]["last_name"])); ?>
                    </dd>

                    <dt>Phone</dt>
                    <dd><?php echo $this->Form->input("phone", array("type" => "text", "label" => FALSE, "div" => false, "class" => "validate[required] ", "id" => "phone_no", "value" => $listemail["ListEmail"]["phone"])); ?>
                    </dd>
                   
                </dl>
                <div style="text-align:center;">
                    <input type="submit" value="Save Changes">
                   
                    <input type="button" onclick="javascript:history.back();" value="Go Back"> 
                </div>
                <div class="clear"></div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</section>

