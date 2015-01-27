<?php //pr($mylists);die;    ?>
<div class="center-block">
    <div class="head-new">
<h1>Email Lists</h1>
    </div>
<?php echo $this->html->link("Add New List", array("controller" => "MyLists", "action" => "add"), array("class" => "btn-all")); ?>
 <div class="clear"></div> <div class="clm-wrap">
                        <table>
                            <thead>
                                <tr>
                                <th width="5%">Sr. No</th>
                                <th width="10%"><?php echo $this->Paginator->sort('MyList.list_name', 'List Name'); ?>
                                    <span class="<?php echo ('MyList.list_name' == $this->Paginator->sortKey()) ? $this->Paginator->sortDir() : 'none'; ?><?php if ($this->Paginator->sortKey() == "list_name ASC") { ?> asc <?php } ?>">&nbsp;&nbsp;&nbsp;</span></th>
                                <th width="20%">Vibes</th>
                                <th width="20%">Regions</th>
                                <th width="12%"><?php echo $this->Paginator->sort('MyList.created', 'Created DateTime'); ?>
                                    <span class="<?php echo ('MyList.created' == $this->Paginator->sortKey()) ? $this->Paginator->sortDir() : 'none'; ?><?php if ($this->Paginator->sortKey() == "created ASC") { ?> asc <?php } ?>">&nbsp;&nbsp;&nbsp;</span></th>
                                <th width="23%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                                if (empty($mylists)) {
                                    echo "<tr><td colspan='6'><center>No Data Found</center></td></td>";
                                } else {
                                    $i = 0;
                                    foreach ($mylists as $mylist) {
                                        $i++;
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $mylist["MyList"]["list_name"]; ?></td>
                                            <td><?php foreach($mylist['ListVibe'] as $listvib) {
                                                            $list_vib[] = $listvib['Vibe']['name'];
                                                            }
                                                            echo substr(implode(', ',$list_vib), 0, 50) . '...';
                                                            ?></td>
                                            <td><?php foreach($mylist['ListRegion'] as $listreg) {
                                                            $list_reg[] = $listreg['Region']['name'];
                                                            }
                                                            echo substr(implode(', ',$list_reg), 0, 50) . '...';
                                                            ?></td>
                                            <td><?php echo $mylist["MyList"]["created"]; ?></td>
                                            <td style="min-width: 246px;"><?php
                                                echo "&nbsp;" . $this->html->link("View", array("controller" => "MyLists", "action" => "view", base64_encode($mylist["MyList"]["id"])));
                                                echo "&nbsp;" . $this->html->link("Edit", array("controller" => "MyLists", "action" => "add", base64_encode($mylist["MyList"]["id"])));
                                                echo "&nbsp" . $this->html->link("Delete", array("controller" => "MyLists", "action" => "delete", base64_encode($mylist["MyList"]["id"])), array("onclick" => "javascript:return confirm('Are you sure you want to delete this list?');"));
                                                echo "&nbsp;" . $this->html->link("CSV", array("controller" => "MyLists", "action" => "exportCsv", base64_encode($mylist["MyList"]["id"])));
                                                ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="clear"></div>
                    
                    <div class="event-pagination paginate-list">
                        <span class="peginationTxt"><?php echo $this->Paginator->counter(array('format' => 'List %start% - %end% of %count%')); ?></span>
                        <?php
                        echo $this->Paginator->first('', null, null, array());

                        echo $this->Paginator->prev('', null, null, array());
                        //echo $this->Paginator->numbers(array('separator' => ''));
                        echo $this->Paginator->next('', null, null, array());
                        echo $this->Paginator->Last('', null, null, array());
                        //echo $this->Paginator->counter(array('format' => 'Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%'));
                        ?>
                        <div class="clear"></div>
                    </div>
</div>