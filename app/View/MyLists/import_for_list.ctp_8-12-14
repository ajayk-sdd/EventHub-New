<section class="inner-content">
    <div class="center-block">
        <div class="repo-list-wrap width100">
            <h1>Add Contacts To List</h1>
            <div style="clear:both;"></div>
            <div class="repo-list reli-II">
                <?php
                echo $this->Session->flash();
                //echo $mylist_id;
                ?>
                <!------------------------------------ import using csv files --------------------------------------->
                <h2>Import Emails using CSV file</h2></center><br>
                <?php
                echo $this->Form->create("MyList", array("action" => "importCsv", "id" => "addCsvForm", 'enctype' => 'multipart/form-data'));
                echo $this->Form->input("MyList.id", array("type" => "hidden", "value" => $mylist_id));
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
                ?>
                <!--------------------------------------------------------------------------------------------------->
                <!------------------------------------------- import using open inviter------------------------------>
                <br><hr><br><center>
                    <h2>Import Emails using third party(eg Gmail, Yahoo, Hotmail, Facebook)</h2></center><br>
                <?php
                echo $this->Form->create("MyList", array("action" => "import", "id" => "addEmailForm", 'enctype' => 'multipart/form-data'));
                echo $this->Form->input("MyList.id", array("type" => "hidden", "value" => $mylist_id));
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
                ?>
                <!--------------------------------------------------------------------------------------------------->
                <!---------------------------------- from copy paste contact ---------------------------------------->
                <br><hr><br>
                <center><h2>Import Emails by copy and paste</h2></center>
                <?php
                echo $this->Form->create("MyList", array("action" => "importcopy", "id" => "addEmailFormCopy", 'enctype' => 'multipart/form-data'));
                echo $this->Form->input("MyList.id", array("type" => "hidden","value"=>$mylist_id));
                ?>
                <dl>
                    <dt>Email List: </dt>
                    <dd><?php echo $this->Form->input("copy_email_list", array('type' => 'textarea', "label" => false, "div" => false, "class" => "validate[required] form_input email-textarea")); ?>
                        <div style="font-size:13px;color:#999;margin-top:-15px">Write multiple email which should be seperated by comma.</div>
                    </dd>
                </dl>
                <div class="sub-btn">
                    <input class="blu_btn_rt" type="submit" value="Submit">
                </div>
                <div class="clear"></div>
                <?php
                echo $this->Form->end();
                ?>
                <!--------------------------------------------------------------------------------------------------->
            </div>

        </div>
    </div>
</section>
<?php
echo $this->Html->script("/js/admin/tiny_mce/tiny_mce");
echo $this->Html->script('/js/Front/MyList/add');
?>