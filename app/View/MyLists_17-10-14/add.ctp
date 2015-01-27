<section class="inner-content">
    <div class="center-block">
        <div class="repo-list-wrap width100">
            <h1>Add List</h1>
            <div class="repo-list reli-II">
                <?php
                echo $this->Session->flash();
                echo $this->Form->create("MyList", array("action" => "add", "id" => "addListForm", 'enctype' => 'multipart/form-data'));
                echo $this->Form->input("MyList.id", array("type" => "hidden"));
                echo $this->Form->input("MyList.user_id", array('type' => 'hidden', 'value' => AuthComponent::user("id")));
  
                ?>
                <dl>
                   
                    <dt>List Name: </dt>
                    <dd><?php echo $this->Form->input("MyList.list_name", array("type" => "text", "label" => false, "div" => false, "class" => "validate[required] form_input", "id" => "list_name")); ?></dd>

                    <dt>List Email: </dt>
                    <dd class="list-email">
                        <?php
    // so that this field will not shown on edit time
    if (!isset($this->data["MyList"]["id"])) {
        ?>
                        <table>	
                <tr id="tickets">

                    <td>
                        <?php echo $this->Form->input("ListEmail.email.", array("type" => "text", "label" => false, "div" => false, "class" => "validate[required] form_input", "id" => "ticket_price"));
                        ?>
                    </td>
                </tr>
                <tr style="display:block;" id="add">
                    <td>
                        <?php echo $this->Html->link("+Add more emails", "javascript:void(0);", array('escape' => false, 'id' => 'add_more_single_row', 'id' => 'add_more')); ?>
                    </td>
                </tr>
            </table>
                         <?php
    } else {
        echo $model = "ListEmail";
        $list_email = $this->data["ListEmail"];
        echo "<ul>";
        foreach ($list_email as $lm) {
            ?>
            <li>
                <label></label>
                <label><?php echo $this->Form->input("ListEmail.email", array("id" => $lm["id"], "value" => $lm["email"], "label" => false, "div" => false, "class" => "form_input", "onchange" => "javascript:edit_email(this.id,this.value);")); ?>
                <?php   echo $this->html->link($this->html->image('/img/admin/delete.png'), array("controller" => "admin/Commons", "action" => "Delete", base64_encode($lm["id"]),'ListEmail'), array('escape' => false, 'title' => 'Delete', 'class' => "edidlt", "onclick" => "javascript:return confirm('Are you sure you want to delete this Email-Id?');"));
                                              ?>
                    <span class="loader" style="display:none;" id="load_<?php echo $lm['id']; ?>"><?php echo $this->html->image('/img/admin/loader.gif'); ?></span>
                </label>
            </li>
            <?php
        }
        echo "</ul>";
        
        ?>
            <div class="clear"></div>
             <table>	
                <tr id="tickets">

                    <td>
                        <?php echo $this->Form->input("ListEmail.email.", array("type" => "text", "label" => false, "div" => false, "class" => "validate[required] form_input", "id" => "ticket_price"));
                        ?>
                    </td>
                </tr>
                <tr style="display:block;" id="add">
                    <td>
                        <?php echo $this->Html->link("+Add more emails", "javascript:void(0);", array('escape' => false, 'id' => 'add_more_single_row', 'id' => 'add_more')); ?>
                    </td>
                </tr>
            </table>
    <?php }
    ?>
                    </dd>

                    <dt class="list-label">Categories <br>(choose as many as you think apply)</dt>
                    <dd class="list-cat"><ul>
                        <?php
                    $j = 0;
                    if (!empty($this->data["ListCategory"])) {
                        foreach ($this->data["ListCategory"] as $ec) {
                            $eve_cate[] = $ec["category_id"];
                        }
                    } else {
                        $eve_cate = array();
                    }
                    echo "<li>";
                    foreach ($categories as $cat):
                    
                        if (in_array($cat['Category']['id'], $eve_cate))
                            echo $this->Form->input("ListCategory.category_id", array("checked" => true, "name" => "data[ListCategory][category_id][]", "type" => "checkbox", "label" => $cat['Category']['name'], "div" => false, "class" => "validate[required] form_input", "value" => $cat['Category']['id']));
                        else
                            echo $this->Form->input("ListCategory.category_id", array("name" => "data[ListCategory][category_id][]", "type" => "checkbox", "label" => $cat['Category']['name'], "div" => false, "class" => "validate[required] form_input", "value" => $cat['Category']['id']));
                        $j++;
                        if ($j % 4 == 0)
                            {
                                echo "</li><li><label></label>";
                            }
                            
                    endforeach;
                    echo "</li>";
                    ?></ul>
                    </dd>

                    <dt class="list-label">Vibes <br>(choose as many as you think apply)</dt>
                    <dd class="list-cat"><ul>
                        <?php
                   $i = 0;
                   if (!empty($this->data["ListVibe"])) {
                       foreach ($this->data["ListVibe"] as $ev) {
                           $eve_vib[] = $ev["vibe_id"];
                       }
                   } else {
                       $eve_vib = array();
                   }
                   echo "<li>";
                   foreach ($vibes as $vibe):
                       if (in_array($vibe['Vibe']['id'], $eve_vib))
                           echo $this->Form->input("ListVibe.vibe_id", array("checked" => true, "name" => "data[ListVibe][vibe_id][]", "type" => "checkbox", "label" => $vibe['Vibe']['name'], "div" => false, "class" => "validate[required] form_input", "value" => $vibe['Vibe']['id']));
                       else
                           echo $this->Form->input("ListVibe.vibe_id", array("name" => "data[ListVibe][vibe_id][]", "type" => "checkbox", "label" => $vibe['Vibe']['name'], "div" => false, "class" => "validate[required] form_input", "value" => $vibe['Vibe']['id']));
                       $i++;
                       if ($i % 4 == 0)
                           echo "</li><li><label></label>";
   
                   endforeach;
                    echo "</li>";
                    ?></ul>
                    </dd>
                    <dt class="list-label">Regions <br>(choose as many as you think apply)</dt>
                    <dd class="list-cat"><ul>
                         <?php
                        $i = 0;
                        if (!empty($this->data["ListRegion"])) {
                            foreach ($this->data["ListRegion"] as $re) {
                                $eve_region[] = $re["region_id"];
                            }
                        } else {
                            $eve_region = array();
                        }
                        echo "<li>";
                        foreach ($regions as $region):
                            if (in_array($region['Region']['id'], $eve_region))
                                echo $this->Form->input("ListRegion.region_id", array("checked" => true, "name" => "data[ListRegion][region_id][]", "type" => "checkbox", "label" => $region['Region']['name'], "div" => false, "class" => "validate[required] form_input", "value" => $region['Region']['id']));
                            else
                                echo $this->Form->input("ListRegion.region_id", array("name" => "data[ListRegion][region_id][]", "type" => "checkbox", "label" => $region['Region']['name'], "div" => false, "class" => "validate[required] form_input", "value" => $region['Region']['id']));
                            $i++;
                            if ($i % 4 == 0)
                                echo "</li><li><label></label>";
        
                        endforeach;
                         echo "</li>";
                    ?></ul>
                    </dd>
                </dl>
                <div class="sub-btn">
                   <input class="blu_btn_rt" type="submit" value="Submit">
                    <input type="button" onclick="javascript:history.back();" value="Go Back"> 
                </div>
                <div class="clear"></div>
                <?php echo $this->Form->end(); ?>
                
                <?php if (isset($this->data["MyList"]["id"])) { ?>
                <br><hr><br><center>
    <h2>Import Emails using third party(eg Gmail, Yahoo, Hotmail, Facebook)</h2></center><br>
    <?php
    echo $this->Form->create("MyList", array("action" => "import", "id" => "addEmailForm", 'enctype' => 'multipart/form-data'));
    echo $this->Form->input("MyList.id", array("type" => "hidden"));
    ?>
    <dl>
        <dt>Email: </dt>
        <dd><?php echo $this->Form->input("email", array('type' => 'text', "label" => false, "div" => false, "class" => "validate[required] form_input")); ?>
    </dd>
    <dt>Password: </dt>
        <dd><?php echo $this->Form->input("password", array("type" => "password", "label" => false, "div" => false, "class" => "validate[required] form_input", "id" => "list_name")); ?>
    </dd>
    <dt>Email Provider: </dt>
        <dd><select  name='data[MyList][provider]' class="validate[required] form_input"><option value=''></option><optgroup label='Email Providers'><option value='abv'>Abv</option><option value='aol'>AOL</option><option value='apropo'>Apropo</option><option value='atlas'>Atlas</option><option value='aussiemail'>Aussiemail</option><option value='azet'>Azet</option><option value='bigstring'>Bigstring</option><option value='bordermail'>Bordermail</option><option value='canoe'>Canoe</option><option value='care2'>Care2</option><option value='clevergo'>Clevergo</option><option value='doramail'>Doramail</option><option value='evite'>Evite</option><option value='fastmail'>FastMail</option><option value='fm5'>5Fm</option><option value='freemail'>Freemail</option><option value='gawab'>Gawab</option><option value='gmail'>GMail</option><option value='gmx_net'>GMX.net</option><option value='graffiti'>Grafitti</option><option value='hotmail'>Live/Hotmail</option><option value='hushmail'>Hushmail</option><option value='inbox'>Inbox.com</option><option value='india'>India</option><option value='indiatimes'>IndiaTimes</option><option value='inet'>Inet</option><option value='interia'>Interia</option><option value='katamail'>KataMail</option><option value='kids'>Kids</option><option value='libero'>Libero</option><option value='linkedin'>LinkedIn</option><option value='lycos'>Lycos</option><option value='mail2world'>Mail2World</option><option value='mail_com'>Mail.com</option><option value='mail_in'>Mail.in</option><option value='mail_ru'>Mail.ru</option><option value='meta'>Meta</option><option value='msn'>MSN</option><option value='mynet'>Mynet.com</option><option value='netaddress'>Netaddress</option><option value='nz11'>Nz11</option><option value='o2'>O2</option><option value='operamail'>OperaMail</option><option value='plaxo'>Plaxo</option><option value='pochta'>Pochta</option><option value='popstarmail'>Popstarmail</option><option value='rambler'>Rambler</option><option value='rediff'>Rediff</option><option value='sapo'>Sapo.pt</option><option value='techemail'>Techemail</option><option value='terra'>Terra</option><option value='uk2'>Uk2</option><option value='virgilio'>Virgilio</option><option value='walla'>Walla</option><option value='web_de'>Web.de</option><option value='wpl'>Wp.pt</option><option value='xing'>Xing</option><option value='yahoo'>Yahoo!</option><option value='yandex'>Yandex</option><option value='youtube'>YouTube</option><option value='zapak'>Zapakmail</option></optgroup><optgroup label='Social Networks'><option value='badoo'>Badoo</option><option value='bebo'>Bebo</option><option value='bookcrossing'>Bookcrossing</option><option value='brazencareerist'>Brazencareerist</option><option value='cyworld'>Cyworld</option><option value='eons'>Eons</option><option value='facebook'>Facebook</option><option value='faces'>Faces</option><option value='famiva'>Famiva</option><option value='fdcareer'>Fdcareer</option><option value='flickr'>Flickr</option><option value='flingr'>Flingr</option><option value='flixster'>Flixster</option><option value='friendfeed'>Friendfeed</option><option value='friendster'>Friendster</option><option value='hi5'>Hi5</option><option value='hyves'>Hyves</option><option value='kincafe'>Kincafe</option><option value='konnects'>Konnects</option><option value='koolro'>Koolro</option><option value='lastfm'>Last.fm</option><option value='livejournal'>Livejournal</option><option value='lovento'>Lovento</option><option value='meinvz'>Meinvz</option><option value='mevio'>Mevio</option><option value='motortopia'>Motortopia</option><option value='multiply'>Multiply</option><option value='mycatspace'>Mycatspace</option><option value='mydogspace'>Mydogspace</option><option value='myspace'>MySpace</option><option value='netlog'>NetLog</option><option value='ning'>Ning</option><option value='orkut'>Orkut</option><option value='perfspot'>Perfspot</option><option value='plazes'>Plazes</option><option value='plurk'>Plurk</option><option value='skyrock'>Skyrock</option><option value='tagged'>Tagged</option><option value='twitter'>Twitter</option><option value='vimeo'>Vimeo</option><option value='vkontakte'>Vkontakte</option><option value='xanga'>Xanga</option><option value='xuqa'>Xuqa</option></optgroup></select>
    </dd>
    </dl>
    <div style="text-align:center;">
    <?php echo $this->Form->input("Submit", array("type" => "submit", "label" => false, "div" => false, "class" => "blu_btn_rt")); ?>
    </div>   
    <?php
    echo $this->Form->end();
}
?>
<?php if (isset($this->data["MyList"]["id"])) { ?>
  <br><hr><br><center>
    <h2>Import Emails using CSV file</h2></center><br>
    <?php
    echo $this->Form->create("MyList", array("action" => "importCsv", "id" => "addCsvForm", 'enctype' => 'multipart/form-data'));
    echo $this->Form->input("MyList.id", array("type" => "hidden"));
    ?>
    <dl><dt>Select File From your Computer: </dt>
     <dd>   <?php echo $this->Form->input("file", array('type' => 'file', "label" => false, "div" => false, "class" => "validate[required] form_input")); ?>
    </dd>
    </dl>
    <div style="text-align:center;">
    <?php echo $this->Form->input("Submit", array("type" => "submit", "label" => false, "div" => false, "class" => "blu_btn_rt")); ?>
    </div>
    <?php
    echo $this->Form->end();
}
?>
<?php
echo $this->Html->script("/js/admin/tiny_mce/tiny_mce");
echo $this->Html->script('/js/Front/MyList/add');
?>
                
                
            </div>
            
        </div>
    </div>
</section>

