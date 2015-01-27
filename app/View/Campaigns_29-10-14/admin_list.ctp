<section id="cont_wrapper">
    <section class="content">
        <!--<h1 class="main_heading"><?php //echo $this->Html->link('Add Campaign', '/admin/Campaigns/createCampaign');  ?></h1>-->
        <section class="content_info">
            <?php echo $this->Session->flash(); ?>
            <section class="tbldata">
                <div class="srch_box">
                    <!------------------------------------ search starts --------------------->
                    <?php
                    echo $this->Form->create("Campaign", array("action" => "list", 'enctype' => 'multipart/form-data', "novalidate" => "novalidate"));
                    echo $this->Form->input('Campaign.title', array('label' => "Title:", 'div' => false, 'maxlength' => '50', 'autocomplete' => 'off', 'class' => 'form_input', 'placeholder' => 'Enter Campaign Title'));

                    echo $this->Form->input('User.username', array('label' => "Sub-Title:", 'div' => false, 'maxlength' => '50', 'autocomplete' => 'off', 'class' => 'form_input', 'placeholder' => 'Enter username'));
                    echo $this->Form->input("Campaign.limit", array('type' => 'select', 'options' => array("10" => "10", "20" => "20", "50" => "50", "100" => "100"), 'div' => false, 'label' => "Show Per Page:"));
                    echo $this->Form->input("Campaign.order", array('type' => 'select', 'options' => array("Campaign.title" => "Campaign Title", "Campaign.sub_title" => "Campaign Sub-Title", "TicketGiveaway.email" => "Email", "Campaign.title" => "Campaign Title", "Campaign.created" => "Created"), 'div' => false, 'label' => "Order by:"));
                    echo $this->Form->input("Campaign.direction", array('type' => 'select', 'options' => array("ASC" => "Ascending", "DESC" => "Descending"), 'div' => false, 'label' => "Direction:"));
                    echo $this->Form->submit('Search', array('label' => false, 'div' => false, "class" => "blu_btn mar_rt"));

                    echo $this->html->link('Clear', array('controller' => 'Campaigns', 'action' => 'list'), array("class" => "blu_btn mar_rt"));

                    echo $this->html->link('Download CSV', array('controller' => 'Campaigns', 'action' => 'list_csv'), array("class" => "blu_btn mar_rt"));
                    echo $this->Form->end();
                    ?>
                </div>
                <!--------------------------------- search ends ------------------------------->
<?php echo $this->Form->create('Common', array('users', 'action' => 'selectMultiple?model=Campaign')); ?>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tabulardata">
                    <tr>
                        <th style="width:6%"><?php echo $this->Form->checkbox('selectAll', array('type' => 'checkbox', 'class' => 'textbox', 'label' => '', 'id' => 'selectall', 'name' => 'selectAll')); ?></th>
                        <th style="width:18%;"><?php echo $this->Paginator->sort('Campaign.title', 'Title'); ?>
                            <span class="<?php echo ('Campaign.title' == $this->Paginator->sortKey()) ? $this->Paginator->sortDir() : 'none'; ?><?php if ($this->Paginator->sortKey() == "title ASC") { ?> asc <?php } ?>">&nbsp;&nbsp;&nbsp;</span></th>
                        <th style="width:18%;"><?php echo $this->Paginator->sort('Campaign.subject_line', 'Subject'); ?>
                            <span class="<?php echo ('Campaign.subject_line' == $this->Paginator->sortKey()) ? $this->Paginator->sortDir() : 'none'; ?><?php if ($this->Paginator->sortKey() == "subject_line ASC") { ?> asc <?php } ?>">&nbsp;&nbsp;&nbsp;</span></th>
                        <th style="width:18%;"><?php echo $this->Paginator->sort('User.username', 'Username'); ?>
                            <span class="<?php echo ('User.username' == $this->Paginator->sortKey()) ? $this->Paginator->sortDir() : 'none'; ?><?php if ($this->Paginator->sortKey() == "username ASC") { ?> asc <?php } ?>">&nbsp;&nbsp;&nbsp;</span></th>
                        <th style="width:12%;"><?php echo $this->Paginator->sort('Campaign.date_to_send', 'Date To Send'); ?>
                            <span class="<?php echo ('Campaign.date_to_send' == $this->Paginator->sortKey()) ? $this->Paginator->sortDir() : 'none'; ?><?php if ($this->Paginator->sortKey() == "date_to_send ASC") { ?> asc <?php } ?>">&nbsp;&nbsp;&nbsp;</span></th>
                        <th style="width:4%;"><?php echo $this->Paginator->sort('Campaign.status', 'Status'); ?>
                            <span class="<?php echo ('Campaign.status' == $this->Paginator->sortKey()) ? $this->Paginator->sortDir() : 'none'; ?><?php if ($this->Paginator->sortKey() == "status ASC") { ?> asc <?php } ?>">&nbsp;&nbsp;&nbsp;</span></th>
                        <th style="width:12%">Current Status</th>
                        <th style="width:12%;">Action</th>
                    </tr>
<?php foreach ($campaigns as $campaign): ?>
                        <tr>
                            <td><?php echo $this->Form->checkbox('checkbox', array('type' => 'checkbox', 'class' => 'textbox case', 'label' => '', 'value' => $campaign['Campaign']['id'], 'name' => 'IDs[]')); ?></td>
                            <td><?php echo $campaign['Campaign']['title']; ?></td>
                            <td><?php echo $campaign['Campaign']['subject_line']; ?></td>
                            <td><?php echo $campaign['User']['username']; ?></td>
                            <td><?php echo date("l, F d, Y", strtotime($campaign['Campaign']['date_to_send'])); ?></td>
                            <td>
                                <?php
                                $model = "Campaign";
                                if ($campaign['Campaign']['status'] == 1) {

                                    echo "<img src='/img/admin/active.png' title='Change Status' id='" . $campaign['Campaign']['id'] . "' value='" . $campaign['Campaign']['status'] . "' dir='" . $model . "' class='statusImg' rel='" . base64_encode($campaign['Campaign']['id']) . "'/>";
                                    ?>
                                    <span class="loader" id="load_<?php echo $campaign['Campaign']['id']; ?>"><?php echo $this->html->image('/img/admin/loader.gif'); ?></span>
                                <?php } else {
                                    echo "<img src='/img/admin/inactive.png' title='Change Status' id='" . $campaign['Campaign']['id'] . "' value='" . $campaign['Campaign']['status'] . "' dir='" . $model . "' class='statusImg' rel='" . base64_encode($campaign['Campaign']['id']) . "'/>";
                                    ?>
                                    <span class="loader" id="load_<?php echo $campaign['Campaign']['id']; ?>"><?php echo $this->html->image('/img/admin/loader.gif'); ?></span>
                                <?php }
                                ?>
                            </td>
                            <td>
                                <?php
                                $today = date("Y/m/d");
                                if ($campaign['Campaign']['date_to_send'] > $today) {
                                    echo "Upcoming";
                                } else {
                                    echo "Done";
                                }
                                ?>
                            </td>
                            <td>
                        <?php //echo $this->Html->link($this->html->image('/img/admin/edit1.png'), array("controller" => "Campaigns", "action" => "createCampaign", base64_encode($campaign['Campaign']['id'])), array('escape' => false, 'title' => 'Edit', 'class' => "edidlt")); ?>
                        <?php echo $this->Html->link($this->html->image('/img/admin/view.png'), array("controller" => "Campaigns", "action" => "view", base64_encode($campaign['Campaign']['id'])), array('escape' => false, 'title' => 'View', 'class' => "edidlt")); ?>
                    <?php echo $this->Html->link($this->html->image('/img/admin/delete.png'), array("controller" => "Commons", "action" => "Delete", base64_encode($campaign['Campaign']['id']), 'Campaign'), array('escape' => false, 'title' => 'Delete', 'class' => "edidlt", 'onclick' => "return confirm('Are you sure you want to delete this event ?');")); ?>
                            </td>    
                        </tr>
                <?php endforeach; ?>  
                </table><br/>
<?php echo $this->Form->submit("Deactivate", array('class' => "blu_btn mar_rt", 'div' => false, 'id' => 'loginButton', 'title' => 'Deactivate', 'name' => 'deactivate', 'onclick' => "return atleastOneChecked('Deactivate selected users?');")); ?>
                <?php echo $this->Form->submit("Activate", array('class' => "blu_btn mar_rt", 'div' => false, 'id' => 'loginButton', 'title' => 'Activate', 'name' => 'activate', 'onclick' => "return atleastOneChecked('Activate selected users?');")); ?>
                <?php echo $this->Form->submit("Delete", array('class' => "blu_btn mar_rt", 'div' => false, 'id' => 'loginButton', 'title' => 'Activate', 'name' => 'delete', 'onclick' => "return atleastOneChecked('Deleted selected users?');")); ?>
                <?php echo $this->Form->end(); ?>
            </section>
            <div class="pagination_new">
                <?php
                echo $this->Paginator->first('<< First', null, null, array('class' => 'disabled'));
                echo $this->Paginator->prev('<< Previous', null, null, array('class' => 'disabled'));
                echo $this->Paginator->numbers(array('separator' => ''));
                echo $this->Paginator->next('Next >>', null, null, array('class' => 'disabled'));
                echo $this->Paginator->Last('Last >>', null, null, array('class' => 'disabled'));
                //echo $this->Paginator->counter(array('format' => 'Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%'));
                ?>
            </div>
            <section class="clr_bth"></section>
        </section>
    </section>
</section>