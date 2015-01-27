<section class="inner-content">
    <div class="center-block">
        <div class="repo-list-wrap width100">
            <h1>Add List</h1>
            <div style="clear:both;"></div>
            <div class="repo-list reli-II" style="float: left;">
                <?php
                echo $this->Session->flash();
                echo $this->Form->create("MyList", array("action" => "add", "id" => "addListForm", 'enctype' => 'multipart/form-data'));
                echo $this->Form->input("MyList.id", array("type" => "hidden"));
                echo $this->Form->input("MyList.user_id", array('type' => 'hidden', 'value' => AuthComponent::user("id")));
                ?>
                <dl>

                    <dt>List Name: </dt>
                    <dd><?php echo $this->Form->input("MyList.list_name", array("type" => "text", "label" => false, "div" => false, "class" => "validate[required] form_input")); ?></dd>
                    
                    <dt>Default From Email: </dt>
                    <dd><?php echo $this->Form->input("MyList.from_email", array("type" => "text", "label" => false, "div" => false, "class" => "validate[required] form_input")); ?></dd>
                    
                    <dt>Default From Name: </dt>
                    <dd><?php echo $this->Form->input("MyList.from_name", array("type" => "text", "label" => false, "div" => false, "class" => "validate[required] form_input")); ?></dd>
                    
                    <dt>Reuse: </dt>
                    <dd><?php echo $this->Form->input("MyList.reuse", array("type" => "select","empty"=>"Select From Below List", "label" => false, "div" => false, "class" => "validate[required] form_input","options"=>$reminds,"onchange"=>"javascript:$('#MyListRemindMe').val(this.value);")); ?></dd>
                    
                    <dt>Remind Me About List: </dt>
                    <dd><?php echo $this->Form->input("MyList.remind_me", array("type" => "text", "label" => false, "div" => false, "class" => "validate[required] form_input")); ?></dd>
                    
                    <dt>Contact Information: </dt>
                    <dd><?php echo $this->Form->input("MyList.contact_information", array("type" => "text", "label" => false, "div" => false, "class" => "validate[required] form_input")); ?></dd>
                    
                    <dt><?php ?></dt>
                    <dd><?php echo $this->Form->input("Add", array("type" => "submit", "label" => false, "div" => false, "class" => ".anc_link")); ?></dd>

                </dl>
                <?php echo $this->Form->end();?>
            </div>

        </div>
    </div>
</section>

