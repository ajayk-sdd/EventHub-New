<?php //pr($mylist);      ?>
<?php
if (isset($_POST['data']['MyList']['title']) && !empty($_POST['data']['MyList']['title'])) {
    $clss = "show-hide-panel";
    $txt = "Hide";
} else {
    $clss = "";
    $txt = "Show";
}
?>

<div class="center-block">
    <div class="em-sec">

        <h1>Contact & List Management</h1>

        <div class="list-view-head">
            <div class="one">All Contacts (<?php echo $this->Paginator->counter(array('format' => '%count%')); ?>)</div>
            <div  class="two">
                <?php
                echo $this->html->link('View Reports for this List', array('controller' => 'MyLists', 'action' => 'listReporting', $list_id));

                echo $this->Form->input('choose', array('options' => array("1" => "Add Contact", "2" => "Import Contact"), 'type' => 'select', "div" => FALSE, "label" => FALSE, "empty" => "Choose Add Action", "onchange" => "javascript:addAction(this.value);"));

                echo $this->Form->input('manage', array('options' => array("1" => "Manage Subscriber", "2" => "View Subscriber", "3" => "Unsubscribe People", "4" => "Segments", "5" => "Subscribe Export"), 'type' => 'select', "div" => FALSE, "label" => FALSE, "onchange" => "javascript:manageAction(this.value);"));

                echo $this->Form->input('setting', array('options' => array("1" => "setting"), "empty" => "Select Setting", 'type' => 'select', "div" => FALSE, "label" => FALSE, "onchange" => "javascript:setting(this.value);"));
                ?>
            </div>
            <div><select id="changeList" >
                    <option value="Choose List to View..." >Choose List to View...</option>
                    <?php
                    foreach ($mylists_link as $myl_list) {
                        echo "<option value='" . base64_encode($myl_list['MyList']['id']) . "'>" . $myl_list['MyList']['list_name'] . "</option>";
                    }
                    ?>

                </select></div>
        </div>

<!--p class="">Showing Search Results for: <strong>"bikram yoga"</strong></p-->


        <?php echo $this->Session->flash(); ?>

        <!-- search panel start here -->
        <div class="search-panel">
            <?php echo $this->Form->create("MyList", array("action" => "view/" . $list_id, 'enctype' => 'multipart/form-data', "novalidate" => "novalidate")); ?>

            <h1>Search and Filtering
                <?php echo $this->Html->link("Add Contact", array("controller" => "MyLists", "action" => "listuserDetail", base64_encode($listdetail["MyList"]["id"]))); ?>
                <a href="javascript:void(0);" class="bn-hide-show"><?php echo $txt; ?></a>
            </h1>
            <div class="sp-inner">
                <ul class="sp-hide-content <?php echo $clss; ?>" >
                    <li>

                        <?php echo $this->Form->input('ListEmail.email', array('type' => 'text', 'label' => "List Email:", 'div' => false, 'maxlength' => '150', 'autocomplete' => 'off', 'placeholder' => 'Enter Email'));
                        ?>


                    </li>


                    <li>
                        <?php
                        echo $this->Form->input("Search", array('type' => 'submit', 'div' => false, 'label' => false, "onclick" => "javascript:document.search_form.submit();"));
                        echo $this->html->link('Clear Search', array('controller' => 'MyLists', 'action' => 'view/' . $list_id), array("class" => "clear-search"));
                        ?> &nbsp;&nbsp; <?php
                        echo $this->html->link('Download CSV', array('controller' => 'MyLists', 'action' => 'exportCsv/' . $list_id), array("class" => "clear-search"));
                        ?>

                    </li>
                    <div class="clear"></div>
                </ul>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>
        <div class="clm-wrap">
            <?php echo $this->Form->create('admin/Common', array('users', 'action' => 'selectMultiple?model=ListEmail')); ?>

            <table>
                <thead>
                    <tr>
                        <th style="width:2%"><?php echo $this->Form->checkbox('selectAll', array('type' => 'checkbox', 'class' => 'textbox', 'label' => '', 'id' => 'selectall', 'name' => 'selectAll')); ?></th>
                        <th style="width:14%;"><?php echo $this->Paginator->sort('ListEmail.email', 'Email'); ?>
                            <span class="<?php echo ('ListEmail.email' == $this->Paginator->sortKey()) ? $this->Paginator->sortDir() : 'none'; ?><?php if ($this->Paginator->sortKey() == "email ASC") { ?> asc <?php } ?>">&nbsp;&nbsp;&nbsp;</span></th>
                        <th style="width:12%;">Status
                        </th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_emails as $listemail) { ?>
                        <tr>
                            <td><?php echo $this->Form->checkbox('checkbox', array('type' => 'checkbox', 'class' => 'textbox case', 'label' => '', 'value' => $listemail['ListEmail']['id'], 'name' => 'IDs[]')); ?></td>
                            <td><div class="list-editUser"><?php echo $listemail["ListEmail"]["email"]; ?>
                                </div><div>  <?php
                                    echo $this->html->link('Edit User', array('controller' => 'MyLists', 'action' => 'listuserDetail', base64_encode($listdetail["MyList"]["id"]), base64_encode($listemail["ListEmail"]["id"])));
                                    echo $this->html->link("Delete User", array("controller" => "admin/Commons", "action" => "Delete", base64_encode($listemail["ListEmail"]["id"]), 'ListEmail'), array('escape' => false, 'title' => 'Delete', 'class' => "", "onclick" => "javascript:return confirm('Are you sure you want to delete this Email-Id?');"));
                                    ?> 
                                </div>
                            </td>
                            <td><?php
                                $model = "ListEmail";

                                if ($listemail["ListEmail"]['status'] == 1) {

                                    echo "<img src='/img/admin/active.png' title='Change Status' id='" . $listemail["ListEmail"]['id'] . "' value='" . $listemail["ListEmail"]['status'] . "' dir='" . $model . "' class='statusImg' rel='" . base64_encode($listemail["ListEmail"]['id']) . "'/>";
                                    ?>
                                    <span class="loader" id="load_<?php echo $listemail["ListEmail"]['id']; ?>"><?php echo $this->html->image('/img/admin/loader.gif'); ?></span>
                                    <?php
                                } else {
                                    echo "<img src='/img/admin/inactive.png' title='Change Status' id='" . $listemail["ListEmail"]['id'] . "' value='" . $listemail["ListEmail"]['status'] . "' dir='" . $model . "' class='statusImg' rel='" . base64_encode($listemail["ListEmail"]['id']) . "'/>";
                                    ?>
                                    <span class="loader" id="load_<?php echo $listemail["ListEmail"]['id']; ?>"><?php echo $this->html->image('/img/admin/loader.gif'); ?></span>
                                <?php }
                                ?></td>

                        </tr>	
                    <?php } ?>
                </tbody></table>


            <br/>
            <?php echo $this->Form->submit("Deactivate", array('class' => "clear-search", 'div' => false, 'id' => 'loginButton', 'title' => 'Deactivate', 'name' => 'deactivate', 'onclick' => "return atleastOneChecked('Deactivate selected users?');")); ?>
            <?php echo $this->Form->submit("Activate", array('class' => "clear-search", 'div' => false, 'id' => 'loginButton', 'title' => 'Activate', 'name' => 'activate', 'onclick' => "return atleastOneChecked('Activate selected users?');")); ?>
            <?php echo $this->Form->submit("Delete", array('class' => "clear-search", 'div' => false, 'id' => 'loginButton', 'title' => 'Activate', 'name' => 'delete', 'onclick' => "return atleastOneChecked('Deleted selected users?');")); ?>
            <?php echo $this->Form->end(); ?>
            <div class="clear"></div>

            <div class="event-pagination paginate-list mar-bot30">
                <span class="peginationTxt"><?php echo $this->Paginator->counter(array('format' => 'List %start% - %end% of %count%')); ?></span>
                <?php
                ;
                echo $this->Paginator->first('', null, null, array());

                echo $this->Paginator->prev('', null, null, array());
                //echo $this->Paginator->numbers(array('separator' => ''));
                echo $this->Paginator->next('', null, null, array());
                echo $this->Paginator->Last('', null, null, array());
                //echo $this->Paginator->counter(array('format' => 'Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%'));
                ?>
                <div class="clear"></div>
            </div>
        </div></div>
    <script>
        $(document).ready(function() {
            $('.bn-hide-show').click(function() {
                $('.sp-hide-content').toggleClass('show-hide-panel');
                $(this).text(($(this).text() == 'Show' ? 'Hide' : 'Show'))

            });

            $('.show-more').click(function() {
                $('.more-option').toggleClass('show-more-option');
            });

            $('.btn-changeLoc').click(function() {
                $('.findByNum').css('display', 'block');
                $('.btn-changeLoc').css('display', 'none');
            });

            $('.ld-view').change(function() {
                $('.event-container .event-box').toggleClass('event-list-view');
            });
            $('.show-more-vibes').click(function() {
                $('.vibes-more-option').toggleClass('show-more-option');
            });
            $('.show-more-categories').click(function() {
                $('.categories-more-option').toggleClass('show-more-option');
            });

        });

        function setLimit(limit) {
            $("#limit").val(limit);
            document.search_form.submit();
        }

        $('#changeList').change(function() {
            // set the window's location property to the value of the option the user has selected
            window.location = "<?php echo "http://" . $_SERVER["HTTP_HOST"]; ?>/MyLists/view/" + $(this).val();
        });


        function addAction(whereToRedirect) {
            var myListId = "<?php echo base64_encode($listdetail["MyList"]["id"]); ?>";
            if (whereToRedirect == 1) {
                window.location = "<?php echo "http://" . $_SERVER["HTTP_HOST"]; ?>/MyLists/listuserDetail/" + myListId;
            } else if (whereToRedirect == 2) {
                window.location = "<?php echo "http://" . $_SERVER["HTTP_HOST"]; ?>/MyLists/importForList/" + myListId;
            }
        }
        function manageAction(whereToRedirect) {
            var myListId = "<?php echo base64_encode($listdetail["MyList"]["id"]); ?>";
            if (whereToRedirect == 1) {
                window.location = "<?php echo "http://" . $_SERVER["HTTP_HOST"]; ?>/MyLists/view/" + myListId;
            } else if (whereToRedirect == 2) {
                window.location = "<?php echo "http://" . $_SERVER["HTTP_HOST"]; ?>/MyLists/view/" + myListId;
            } else if (whereToRedirect == 3) {
                window.location = "<?php echo "http://" . $_SERVER["HTTP_HOST"]; ?>/MyLists/importForList/" + myListId;
            } else if (whereToRedirect == 4) {
                window.location = "<?php echo "http://" . $_SERVER["HTTP_HOST"]; ?>/MyLists/segmentList/" + myListId;
            } else if (whereToRedirect == 5) {
                window.location = "<?php echo "http://" . $_SERVER["HTTP_HOST"]; ?>/MyLists/exportCsv/" + myListId;
            }
        }
        function setting(whereToRedirect) {
            var myListId = "<?php echo base64_encode($listdetail["MyList"]["id"]); ?>";
            if (whereToRedirect == 1) {
                window.location = "<?php echo "http://" . $_SERVER["HTTP_HOST"]; ?>/MyLists/add/" + myListId;
            }
        }
    </script>