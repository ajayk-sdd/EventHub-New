
    <script>
        function dateFilter(datemode)
        {
            document.getElementById('date_filter').value = datemode;
            document.search_forms.submit();

        }
        function orderFilter(ordermode)
        {
            document.getElementById('order_filter').value = ordermode;
            document.search_forms.submit();

        }

        function changeLocOpen()
        {

            document.getElementById("findByNum").style.display = "block";
            document.getElementById("btn_zipfilter").style.display = "none";


        }

        function changeLocClose()
        {

            document.getElementById("findByNum").style.display = "none";
            document.getElementById("btn_zipfilter").style.display = "block";

        }

        function SelectBox() {
            if (document.getElementById('FacebookShow').checked == false && document.getElementById('allFacebookShow').checked == false && document.getElementById('myFacebookShow').checked == false)
            {
                document.getElementById("EventEventShow").selectedIndex = "0";
            }
            else
            {
                document.getElementById('FacebookShow').checked = true;
                document.getElementById("EventEventShow").selectedIndex = "2";
            }
        }

        function resetVibes(cntVibe)
        {
            for (var v = 0; v < cntVibe; v++) {


                document.getElementById('event_vibe' + v).checked = false;

            }

            document.search_forms.submit();
        }

        function resetCat(cntCat)
        {
            for (var c = 0; c < cntCat; c++) {


                document.getElementById('event_cat' + c).checked = false;

            }

            document.search_forms.submit();

        }

        function selectAllCat(cntCat)
        {
            for (var cs = 0; cs < cntCat; cs++) {


                document.getElementById('event_cat' + cs).checked = true;

            }

        }

        function selectAllVibes(cntVibe)
        {
            for (var vs = 0; vs < cntVibe; vs++) {


                document.getElementById('event_vibe' + vs).checked = true;

            }

        }

        function VibeSearch(check, id) {
            if (document.getElementById('event_vibe' + check).checked == true) {

                $.post(base_url + '/Users/vibeSearchCount', {"data[Vibe]": id}, function(data) {

                    //alert(data);

                });

            }

        }

        function CatSearch(check, id) {
            if (document.getElementById('event_cat' + check).checked == true) {

                $.post(base_url + '/Users/catSearchCount', {"data[Category]": id}, function(data) {

                    //alert(data);

                });

            }

        }

        function popCatSearch(id) {
            if (document.getElementById('popcat' + id).checked == true) {
                document.getElementsByName("data[EventCategory][id][" + id + "]")[0].checked = true;
            }
            else
            {
                document.getElementsByName("data[EventCategory][id][" + id + "]")[0].checked = false;
            }
            document.search_forms.submit();
        }

        function popSearch(cv, id, cnt_cat, cnt_vib) {

            for (var v1 = 0; v1 < cnt_vib; v1++) {


                document.getElementById('event_vibe' + v1).checked = false;

            }

            for (var c1 = 0; c1 < cnt_cat; c1++) {


                document.getElementById('event_cat' + c1).checked = false;

            }

            if (cv == '2') {
                document.getElementsByName("data[EventCategory][id][" + id + "]")[0].checked = true;
            }
            else
            {
                document.getElementsByName("data[EventVibe][id][" + id + "]")[0].checked = true;
            }
            document.search_forms.submit();
        }

    </script>
    <?php
if (isset($this->data['EventCategory']) || isset($this->data['EventVibe']) || (isset($this->data['Event']['title']) && !empty($this->data['Event']['title']))) {
    $clss = "show-hide-panel";
    $txt = "Hide";
} else {
    $clss = "";
    $txt = "Show";
}
//pr($this->data);
//pr($events);
//die;
?>
     <div class="em-sec">
            <h1>Create New Campaign</h1>
            <?php echo $this->Session->flash(); ?>
            <div class="breadcrumb">
                           <ul>
                                 <li class="active">Step 1: Event</li>
                                    <li >Step 2: Template</li>
                    <li>Step 3: Design</li>
                    <li>Step 4: Recipients</li>
                
                                </ul>
            </div>
            <div class="clear"></div>
             <div class="search-panel">
            <?php echo $this->Form->create("Event", array("action" => "calendar", "name" => "search_form")); ?>

            <h1><div class="search-top">
                  <label>Find an Event:</label>
                        <?php echo $this->Form->input("Event.title", array('type' => 'text', 'div' => false, 'label' => false, "placeholder" => "Event Title"));
                         echo $this->Form->input("Search", array('type' => 'submit', 'div' => false, 'label' => false, "onclick" => "javascript:document.search_form.submit();"));
                        ?>

            </div>
                <a href="javascript:void(0);" class="bn-hide-show"><?php echo $txt; ?></a>
            </h1>
            <div class="sp-inner">
                <ul class="sp-hide-content <?php echo $clss; ?>" >
                    <li>
                      

                    </li>
                    <?php if ($event_show == "ALH") {
                        ?>
                        <li>
                            <label>Event Categories: &nbsp;</label>
                            <p>
                                <?php
                                if (isset($categoriesS)) {
                                    echo $categoriesS;
                                }
                                ?>
                            </p>
                            <a href="javascript:void(0);" class="show-more-categories">More+</a>
                            <div class="categories-more-option">
                                <?php
                                foreach ($categories as $category):
                                    $cID = $category['Category']['id'];
                                    ?>
                                    <label><input type="checkbox" name="data[EventCategory][id][<?php echo $category['Category']['id']; ?>]"  <?php
                                        if (isset($this->data['EventCategory']['id'][$cID]) && $this->data['EventCategory']['id'][$cID] == "on") {
                                            echo 'checked';
                                        }
                                        ?>><?php echo $category['Category']['name']; ?></label>
                                    <?php endforeach; ?>
                            </div>

                        </li>
                      
                        <li>
                            <label>Event Vibe: &nbsp;</label>
                            <p><?php
                                if (isset($vibesS)) {
                                    echo $vibesS;
                                }
                                ?></p>
                            <a href="javascript:void(0);" class="show-more-vibes">More+</a>
                            <div class="vibes-more-option">
                                <?php
                                foreach ($vibes as $vibe):
                                    $vID = $vibe['Vibe']['id'];
                                    ?>
                                    <label><input type="checkbox" name="data[EventVibe][id][<?php echo $vibe['Vibe']['id']; ?>]" <?php
                                        if (isset($this->data['EventVibe']['id'][$vID]) && $this->data['EventVibe']['id'][$vID] == "on") {
                                            echo 'checked';
                                        }
                                        ?>><?php echo $vibe['Vibe']['name']; ?></label>
                                    <?php endforeach; ?>
                            </div>
                        </li>
                    <?php } ?>
                    <li>
                        <?php
                        echo $this->Form->input("Search", array('type' => 'submit', 'div' => false, 'label' => false, "onclick" => "javascript:document.search_form.submit();"));
                        echo $this->html->link('Clear Search', array('controller' => 'Events', 'action' => 'calendar', "clear"), array("class" => "clear-search"));
                        ?>

                    </li>
                    <div class="clear"></div>
                </ul>
            </div>
             </div>
     </div>
     
    <section class="inner-content inner-contentnew">
        <?php echo $this->Form->create("User", array("action" => "index", "name" => "search_forms")); ?>
        <!--Left Section Starts-->
        <section class="lt_sctn">

            <h2 class="main_heading">search filter</h2>			
            <div class="search_events">
                <?php
                echo $this->Form->input("Event.title", array('type' => 'text', 'div' => false, 'label' => false, "placeholder" => "Search Event"));
                echo $this->Form->input("", array('type' => 'submit', 'div' => false, 'label' => false, "onclick" => "javascript:document.search_forms.submit();", "class" => "search_button"));
                ?>

            </div>
            <p class="show_events">

                <?php if (isset($zip_code_name) && !isset($zip_condition)) { ?>
                    Showing all events within <span><?php echo $distance; ?></span> miles of <span><?php echo $zip_code_name; ?></span>.
                <?php } else if (isset($city_name) && !empty($city_name) && !isset($zip_condition)) {
                    ?>
                    Showing all events within <span><?php echo $distance; ?></span> miles of <span><?php echo $city_name; ?></span>.

                <?php } else {
                    ?>
                <p style="color:red;">Excluding zip code from search result, as it is seems to be wrong.</p>
                <?php
            }
            ?>
            <a href="javascript:changeLocOpen();"  id="btn_zipfilter" class="btn-zipfilter" >Change Location</a>
            </p>

            <div class="zipLocation">
                <div class="findByNum" id="findByNum" style="display:none;">
                    <span>Within</span>
                    <?php echo $this->Form->input("Event.distance", array('type' => 'select', 'options' => array('200' => 'Select All', "5" => "5", "10" => "10", "15" => "15", "20" => "20", "25" => "25", "30" => "30", "50" => "50", "100" => "100"), 'div' => false, 'label' => false)); ?>
                    <?php echo $this->Form->input("Event.lat_long", array("type" => "hidden", "id" => "lat_long")); ?>


                    <span>Mile(s) of</span>
                    <div class="search_events"><?php echo $this->Form->input("Event.zip", array('type' => 'text', 'div' => false, 'label' => false, "placeholder" => "Change location, enter zip.", "maxlength" => 6)); ?>

                        <?php echo $this->Form->input("", array('type' => 'submit', 'div' => false, 'label' => false, "onclick" => "javascript:document.search_forms.submit();", "class" => "search_button")); ?>
                    </div>
                    <p class="show_events">   <a href="javascript:changeLocClose();" class="btn-zipfilter-cancel">Cancel</a></p>

                </div>
            </div>


            <h3>by date</h3>
            <ul class="link_listing">
                <?php
                if (isset($this->data['Event']['date']) && !empty($this->data['Event']['date'])) {
                    $date_value = $this->data['Event']['date'];
                } else {
                    $date_value = '';
                }

                echo $this->Form->input("Event.date", array('type' => 'hidden', 'div' => false, 'label' => false, 'value' => $date_value, 'id' => 'date_filter'));
                ?>

                <li><a  href="javascript:dateFilter('today');" id='today' >Today</a></li>
                <li><a  href="javascript:dateFilter('week');" id="week">This week</a></li>
                <li><a  href="javascript:dateFilter('month');" id="month">This month</a></li>
                <li><a  href="javascript:dateFilter('year');" id="year">This year</a></li>
                <li><a  href="javascript:dateFilter('all');" id="all">All</a></li>
            </ul>
            <h3>Popular Searches</h3>
            <ul class="link_listing">

                <?php
                $popular_cat2 = 0;
                $cnt_vib = count($vibes);
                $cnt_cat = count($categories);
                foreach ($pop_categories as $pop_cat2):
                    $pcID2 = $pop_cat2['Category']['id'];
                    ?>
                    <li><a <?php
                        if (isset($this->data['EventCategory']['id'][$pcID2]) && $this->data['EventCategory']['id'][$pcID2] == "on") {
                            echo 'style="font-weight:bold"';
                        }
                        ?> href="javascript:popSearch(<?php echo "2" . ',' . $pcID2 . ',' . $cnt_cat . ',' . $cnt_vib; ?>)" id="popcats<?php echo $pcID2; ?>"><?php echo $pop_cat2['Category']['name']; ?></a></li>
                            <?php
                            $popular_cat2++;
                        endforeach;

                        foreach ($pop_vibes as $pop_vibe):
                            $pvID = $pop_vibe['Vibe']['id'];
                            ?>
                    <li><a <?php
                        if (isset($this->data['EventVibe']['id'][$pvID]) && $this->data['EventVibe']['id'][$pvID] == "on") {
                            echo 'style="font-weight:bold"';
                        }
                        ?> href="javascript:popSearch(<?php echo "1" . ',' . $pvID . ',' . $cnt_cat . ',' . $cnt_vib; ?>)" id="popvib<?php echo $pvID; ?>"><?php echo $pop_vibe['Vibe']['name']; ?></a></li>
                        <?php endforeach; ?>
            </ul>

            <h3>By Order</h3>
            <ul class="link_listing">

                <?php
                if (isset($this->data['Event']['order']) && !empty($this->data['Event']['order'])) {
                    $order_value = $this->data['Event']['order'];
                } else {
                    $order_value = '';
                }
                echo $this->Form->input("Event.order", array('type' => 'hidden', 'div' => false, 'label' => false, 'value' => $order_value, 'id' => 'order_filter'));
                ?>

                <li><a  href="javascript:orderFilter('Event.title ASC');" id='Event_title_ASC' >Name A-Z</a></li>
                <li><a  href="javascript:orderFilter('Event.title DESC');" id="Event_title_DESC">Name Z-A</a></li>
                <li><a  href="javascript:orderFilter('Event.start_date ASC');" id="Event_start_date_ASC">Date: Soonest</a></li>
                <li><a  href="javascript:orderFilter('Event.created DESC');" id="Event_created_DESC">Date: Lattest</a></li>
            </ul>

            <h3>by type</h3>
            <ul class="checkbox_listing">
                <li>
                    <input type="checkbox" name="data[FacebookShow]" value="1"
                    <?php
                    if (isset($this->data['FacebookShow']) && $this->data['FacebookShow'] == 1) {
                        echo "checked";
                    }
                    ?> id="FacebookShow" onclick="javascript:SelectBox();
                                document.search_forms.submit();"/>
                    <label>FaceBook</label>
                </li>
                <?php if(isset($log_in) && !empty($log_in)) { ?>
                <li class="inner_list">
                    <input type="checkbox" name="data[allFacebookShow]" value="1"
                    <?php
                    if (isset($this->data['allFacebookShow']) && $this->data['allFacebookShow'] == 1) {
                        echo "checked";
                    }
                    ?> id="allFacebookShow" onclick="javascript:SelectBox();
                                document.search_forms.submit();"/>
                    <label>All FaceBook</label>
                </li>	
                <li class="inner_list">
                    <input type="checkbox" name="data[myFacebookShow]" value="1"
                    <?php
                    if (isset($this->data['myFacebookShow']) && $this->data['myFacebookShow'] == 1) {
                        echo "checked";
                    }
                    ?> id="myFacebookShow" onclick="javascript:SelectBox();
                                document.search_forms.submit();"/>
                    <label>My FaceBook</label>
                </li>
<?php } ?>
                <li class="straight-line"></li>


                <li>
                    <h4>Popular</h4>
                </li>

                <li><input type="checkbox" name="data['popsearchcat'][17]" <?php
                    if (isset($this->data['EventCategory']['id'][17]) && $this->data['EventCategory']['id'][17] == "on") {
                        echo 'checked';
                    }
                    ?> onclick="javascript:popCatSearch(17)" id="popcat17"><label>Nightlife</label>
                </li>

                <li><input type="checkbox" name="data['popsearchcat'][1]" <?php
                    if (isset($this->data['EventCategory']['id'][1]) && $this->data['EventCategory']['id'][1] == "on") {
                        echo 'checked';
                    }
                    ?> onclick="javascript:popCatSearch(1)" id="popcat1"><label>Concerts & Tour Dates</label>
                </li>

                <li><input type="checkbox" name="data['popsearchcat'][6]" <?php
                    if (isset($this->data['EventCategory']['id'][6]) && $this->data['EventCategory']['id'][6] == "on") {
                        echo 'checked';
                    }
                    ?> onclick="javascript:popCatSearch(6)" id="popcat6"><label>Festivals</label>
                </li>

                <li><input type="checkbox" name="data['popsearchcat'][48]" <?php
                    if (isset($this->data['EventCategory']['id'][48]) && $this->data['EventCategory']['id'][48] == "on") {
                        echo 'checked';
                    }
                    ?> onclick="javascript:popCatSearch(48)" id="popcat48"><label>Music Events</label>
                </li>

                <li><input type="checkbox" name="data['popsearchcat'][49]" <?php
                    if (isset($this->data['EventCategory']['id'][49]) && $this->data['EventCategory']['id'][49] == "on") {
                        echo 'checked';
                    }
                    ?> onclick="javascript:popCatSearch(49)" id="popcat49"><label>Family / Community Events</label>
                </li>


                <?php /* $popular_cat = 0;
                  foreach ($pop_categories as $pop_cat):
                  $pcID = $pop_cat['Category']['id'];
                  ?>
                  <li><input type="checkbox" name="data['popsearchcat'][<?php echo $pcID; ?>]" <?php
                  if (isset($this->data['EventCategory']['id'][$pcID]) && $this->data['EventCategory']['id'][$pcID] == "on") {
                  echo 'checked';
                  }
                  ?> onclick="javascript:popCatSearch(<?php echo $pcID; ?>)" id="popcat<?php echo $pcID; ?>"><label><?php echo $pop_cat['Category']['name']; ?></label></li>
                  <?php $popular_cat++; endforeach; */ ?>

                <li>
                    <h4>Categories</h4>
                </li>
                <?php
                $cnt_cat = count($categories);
                echo $this->html->link("Apply Filters", "javascript:document.search_forms.submit()", array("class" => "apply-filter")) . "<br>";
                echo $this->html->link("Reset Filters", "javascript:resetCat($cnt_cat);", array("class" => "reset-cat-vib")) . "<br>";
                echo $this->html->link("Select All", "javascript:selectAllCat($cnt_cat);", array("class" => "reset-cat-vib", "id" => "select-all-cat"));
                ?>
                <?php
                $ca = 0;
                foreach ($categories as $category):
                    $cID = $category['Category']['id'];
                    ?>
                    <li><input type="checkbox" name="data[EventCategory][id][<?php echo $category['Category']['id']; ?>]"  <?php
                        if (isset($this->data['EventCategory']['id'][$cID]) && $this->data['EventCategory']['id'][$cID] == "on") {
                            echo 'checked';
                        }
                        ?> onclick="javascript:CatSearch(<?php echo $ca . ',' . $cID; ?>);" id="event_cat<?php echo $ca; ?>" class="cat<?php echo $cID; ?> catsave"><label><?php echo $category['Category']['name']; ?></label></li>
                               <?php
                               $ca++;
                           endforeach;
                           ?>

                <li>
                    <?php
                    if(isset($log_in) && !empty($log_in)) { 
                    echo $this->html->link("Save as Default", "javascript:void(0)", array("class" => "reset-cat-vib save-pref-cat", "id" => "save-pref-cat"));
                    }
                    ?>
                    <span id="load_cats" class="loader" style="display: none;float: left;"><img alt="" src="/img/admin/loader.gif"></span>
                    <span class="save-cat" id="save-cat" style="display: none"></span>
                </li>


                <li>
                    <a href="javascript:void(0)"><h4 id="vibe-flip">Vibes <span id="plus">+</span><span id="minus" style="display:none;">--</span></h4></a>
                </li><div id="vibe-panel">
                    <?php
                    $cnt_vib = count($vibes);
                    echo $this->html->link("Apply Filters", "javascript:document.search_forms.submit()", array("class" => "apply-filter")) . "<br>";
                    echo $this->html->link("Reset Vibes", "javascript:resetVibes($cnt_vib);", array("class" => "reset-cat-vib"));
                    echo $this->html->link("Select All", "javascript:selectAllVibes($cnt_vib);", array("class" => "reset-cat-vib", "id" => "select-all-vibe"));
                    ?>
                    <?php
                    $vi = 0;
                    foreach ($vibes as $vibe):
                        $vID = $vibe['Vibe']['id'];
                        ?>
                        <li><input type="checkbox" name="data[EventVibe][id][<?php echo $vibe['Vibe']['id']; ?>]" <?php
                            if (isset($this->data['EventVibe']['id'][$vID]) && $this->data['EventVibe']['id'][$vID] == "on") {
                                echo 'checked';
                            }
                            ?> onclick="javascript:VibeSearch(<?php echo $vi . ',' . $vID; ?>);" id="event_vibe<?php echo $vi; ?>" class="vib<?php echo $vID; ?> vibsave"><label><?php echo $vibe['Vibe']['name']; ?></label></li>
                                   <?php
                                   $vi++;
                               endforeach;
                               ?>

                    <li>
                        <?php
                        if(isset($log_in) && !empty($log_in)) { 
                        echo $this->html->link("Save as Default", "javascript:void(0)", array("class" => "reset-cat-vib save-pref-vib", "id" => "save-pref-vib"));
                        }
                        ?>
                        <span id="load_vibs" class="loader" style="display: none;float: left;"><img alt="" src="/img/admin/loader.gif"></span>
                        <span class="save-vib" id="save-vib" style="display: none"></span>

                    </li>
                </div>
            </ul>
            <?php echo $this->Form->input("Event.limit", array('type' => 'hidden', "id" => "limit")); ?>
        </section>


        <!--Left Section Ends-->
        <!--Middle Section Starts-->
        <section class="middle_section">
          
           
            <div class="alist_heading">
                <h2 class="main_heading">ALIST Calendar / FaceBook</h2>
                <?php if(isset($log_in) && !empty($log_in)) {
                $log_option = array("all" => "All Events", "ALH" => "ALH Events", "FB" => "Facebook Events", "EF" => "Eventful Events", "mycalendar" => "My Calendar");
                }
                else
                {
                 $log_option =  array("all" => "All Events", "ALH" => "ALH Events", "FB" => "Facebook Events", "EF" => "Eventful Events");  
                }
                echo $this->Form->input("Event.event_show", array('type' => 'select', 'options' => $log_option, 'div' => false, 'label' => false, "onchange" => "javascript:document.search_forms.submit();", "class" => "float-right")); ?>
            </div>
            <ul class="rcmevent_listing">
                <?php
                if (isset($events) && !empty($events)) {
                    //pr($events);
                    foreach ($events as $event) {
                        $event_id_name[$event["Event"]["id"]] = $event["Event"]["title"];
                        $cntDate = count($event['EventDate']);
                        ?>
                        <li>
                            <section class="rcmnded_events" id="<?php echo 'event_box_' . $event['Event']['id']; ?>">


                                <?php
                                $viewDetails = '/Events/viewEvent/' . base64_encode($event["Event"]["id"]);
                                if ($event["Event"]["event_from"] == "facebook") {
                                    $imgPath = '';
                                    $event_icon = 'fb_btn.png';
                                } elseif ($event["Event"]["event_from"] == "eventful") {
                                    $imgPath = '';
                                    $event_icon = 'listhub_icon.png';
                                    $viewDetails = '/Events/viewEventfulEvent/' . $event["Event"]["ef_event_id"];
                                } else {
                                    $imgPath = "EventImages/small/";
                                    $event_icon = 'listhub_icon.png';
                                }
                                ?>

                                <a href="#" class="listhub_icon"><img src="img/<?php echo $event_icon; ?>" alt=""/></a>
                                <?php
                                if (isset($event["Giveaway"]) && $event["Giveaway"]["id"] != '') {
                                    ?> 
                                    <a href="#" class="listhub_icon3"><img src="img/ticon.png" alt=""/></a>
                                <?php }
                                ?>
                                <?php
                                if (!$this->Session->read('Auth.User')) {
                                    $ifLog = 'data-target="#sign_in" data-toggle="modal"';
                                } else {
                                    $ifLog = '';
                                }
                                $log_user = $this->Session->read('Auth.User');
                                ?>
<?php if(isset($log_in) && !empty($log_in)) { ?>
                                <a class="listhub_icon2" href="javascript:void(0);" <?php echo $ifLog; ?> onclick="add_to_mycalender(<?php echo $event['Event']['id'] . ',1'; ?>)"><span id = "<?php echo $event["Event"]["id"]; ?>"><?php
                                        if (in_array($event["Event"]["id"], $my_calendar))
                                            echo $this->html->image("minus.png", array('class' => 'cal-minus', 'alt' => 'Remove From My Calendar', 'title' => 'Remove From My Calendar'));
                                        else
                                            echo $this->html->image("plus.png", array('class' => 'cal-minus', 'alt' => 'Add to My Calendar', 'title' => 'Add to My Calendar'));
                                        ?></span></a>
                                <?php
}
                               
                                ?>
                                <span class="loader" id="load_<?php echo $event['Event']['id']; ?>" style="display: none;"><img src="/img/admin/loader.gif" alt=""></span>

                                <span class="dummy_thumb">
                                    <?php echo $this->html->image($imgPath . $event["Event"]["image_name"], array('class' => 'event_img', 'width' => '120px', 'height' => '100px')); ?>
                                </span>	
                                <section class="events_info">
                                    <a href="<?php echo $viewDetails; ?>"><h3><?php
                                            if (strlen($event["Event"]["title"]) > 40) {
                                                echo substr($event["Event"]["title"], 0, 40) . "..";
                                            } else {
                                                echo $event["Event"]["title"];
                                            }
                                            ?></h3></a>
                                    <label><?php
                                        $n = 1;

                                        sort($event["EventDate"]);

                                        $now = strtotime(date('Y-m-d'));
                                        foreach ($event["EventDate"] as $ed) {
                                            if ($now <= strtotime($ed["date"])) {
                                                if ($n == 1) {
                                                    echo date('l, F d, Y', strtotime($ed["date"]));
                                                    if (!empty($ed["start_time"])) {
                                                        echo "  " . date('h:i A', strtotime($ed['start_time']));
                                                        echo " - " . date('h:i A', strtotime($ed['end_time']));
                                                    }
                                                    echo "<br>";
                                                }
                                                $n++;
                                            }
                                        }
                                        ?></label>
                                    <span><?php
                                        if (!empty($event["Event"]["specify"])) {
                                            echo $event["Event"]["specify"] . ', ';
                                        } echo $event["Event"]["cant_find_city"] . ', ' . $event["Event"]["cant_find_state"];
                                        ?></span>
                                    <div class="detailEvent"> <div class="event-dv-content"><?php echo substr(strip_tags($event["Event"]['short_description']), 0, 195) . '...'; ?></div></div>
                                </section>
                                <?php if (AuthComponent::user("role_id") && AuthComponent::user("role_id") == 1) { ?>

                                    <div class="admin-pnl"> 

                                        <a class="" title="Edit" href="/Events/editEvent/<?php echo base64_encode($event["Event"]["id"]); ?>"><img width="16" height="16" alt="" src="/img/admin/edit1.png" title="Edit"></a>
                                        <?php if ($event["Event"]["is_feature"] == 0) { ?>
                                            <a class="" title="Make Feature" href="javascript:void(0);" onclick="javascript:feature(<?php echo $event["Event"]["id"]; ?>);"><img id ="feature_icon_<?php echo $event["Event"]["id"]; ?>" width="16" height="16" alt="" src="/img/feature.png" title="Make Feature"></a>
                                        <?php } else { ?>
                                            <a class="" title="Make Feature" href="javascript:void(0);" onclick="javascript:feature(<?php echo $event["Event"]["id"]; ?>);"><img id ="feature_icon_<?php echo $event["Event"]["id"]; ?>" width="16" height="16" alt="" src="/img/not_feature.png" title="Remove Feature"></a>
                                        <?php } ?>
                                        <a class="" title="Remove" href="javascript:void(0);" onclick="javascript:remove_event(<?php echo $event["Event"]["id"]; ?>);"><img width="16" height="16" alt="" src="/img/admin/delete.png" title="Delete"></a>
                                        <span id="load_<?php echo $event["Event"]["id"]; ?>" class="loader" style="display: none;"><img alt="" src="/img/admin/loader.gif"></span>
                                    </div>

                                <?php } ?>


                            </section>   	     
                        </li>
                        <?php
                    }
                } else {
                    ?>
                    <?php
                    //foreach ($eevent->events->event as $event) {
                    foreach ($efsorted as $event) {
                        ?>

                        <?php
                        //$er = json_decode(json_encode($event), true);
                        $evnt_id = $event['@attributes']['id'];
                        $evnt_id = str_replace("@", "_", $evnt_id);
                        ?>
                        <li>
                            <section class="rcmnded_events">

                                <?php if (isset($event['image']['url']) && !empty($event['image']['url'])) {
                                    ?>
                                    <span class="dummy_thumb">
                                        <img src="<?php echo $event['image']['url']; ?>" class="event_img" width="120px" height="100px" >
                                    </span>
                                    <?php
                                } else {
                                    //echo $this->html->image("no_image.jpeg", array('class' => 'event_img', 'width' => '120px', 'height' => '100px'));
                                }
                                ?>

                                <section class="events_info">
                                    <h3>
                                        <?php
                                        $title = $event['title'];
                                        if (isset($event['image']['url'])) {
                                            if (strlen($title) > 40) {
                                                $title = substr($title, 0, 40) . "..";
                                            }
                                        } else {
                                            if (strlen($title) > 50) {
                                                $title = substr($title, 0, 50) . "..";
                                            }
                                        }
                                        echo $this->html->link($title, array("controller" => "Events", "action" => "viewEventfulEvent", $evnt_id), array("class" => "evnt-ttl", "target" => "_blank", "title" => $event['title']));
                                        ?>

                                    </h3>	
                                    <label><?php
                                        $today = date("l, F d");
                                        if (strtotime($event['start_time']) <= strtotime($today) && strtotime($event['stop_time']) >= strtotime($today)) {
                                            echo $today;
                                        } else {
                                            echo date("l, F d", strtotime($event['start_time']));
                                        }
                                        ?></label>
                                    <span><?php echo $event['city_name']; ?></span>

                                </section>
                            </section>   	     
                        </li>
                    <?php } ?>
        <?php
    }
    ?>

            </ul>

            <div class="clear"></div>
            <div class="pagination">

                <?php
                if ($limit == 10)
                    $active_10 = "active";
                else
                    $active_10 = "";
                if ($limit == 20)
                    $active_20 = "active";
                else
                    $active_20 = "";
                if ($limit == 40)
                    $active_40 = "active";
                else
                    $active_40 = "";
                ?>
                <div class="paginate-list">
                    <span>Show</span>
                    <a href="javascript:void(0);" onclick="javscript:setLimit(10);" class="<?php echo $active_10; ?>">10</a>
                    <a href="javascript:void(0);" onclick="javscript:setLimit(20);" class="<?php echo $active_20; ?>">20</a>
                    <a href="javascript:void(0);" onclick="javscript:setLimit(40);" class="<?php echo $active_40; ?>">40</a>
                    <span>Per Page</span>
                </div>
                <select class="new-view">
                    <option selected="" value="Detailed View">Detailed View</option>
                    <option value="List View">List View</option>
                </select>
            </div>
        </section>


        <!--Middle Section Ends-->
    <?php echo $this->Form->end(); ?>
        <!--Right Section Starts-->
        <section class="rt_section">
          
            <h2 class="main_heading">Events Feed</h2>
            <ul class="rcmevent_listing eventfeed">
                <?php
                //foreach ($eevent->events->event as $event) {
                foreach ($efsorted as $event) {
                    ?>

                    <?php
                    //$er = json_decode(json_encode($event), true);
                    $evnt_id = $event['@attributes']['id'];
                    $evnt_id = str_replace("@", "_", $evnt_id);
                    ?>
                    <li>
                        <section class="rcmnded_events">

        <?php if (isset($event['image']['url']) && !empty($event['image']['url'])) {
            ?>
                                <span class="dummy_thumb">
                                    <img src="<?php echo $event['image']['url']; ?>" class="event_img" width="120px" height="100px" >
                                </span>
                                <?php
                            } else {
                                //echo $this->html->image("no_image.jpeg", array('class' => 'event_img', 'width' => '120px', 'height' => '100px'));
                            }
                            ?>

                            <section class="events_info">
                                <h3>
                                    <?php
                                    $title = $event['title'];
                                    if (isset($event['image']['url'])) {
                                        if (strlen($title) > 20) {
                                            $title = substr($title, 0, 20) . "..";
                                        }
                                    } else {
                                        if (strlen($title) > 30) {
                                            $title = substr($title, 0, 30) . "..";
                                        }
                                    }
                                    echo $this->html->link($title, array("controller" => "Events", "action" => "viewEventfulEvent", $evnt_id), array("class" => "evnt-ttl", "target" => "_blank", "title" => $event['title']));
                                    ?>

                                </h3>	
                                <label><?php
                                    $today = date("l, F d");
                                    if (strtotime($event['start_time']) <= strtotime($today) && strtotime($event['stop_time']) >= strtotime($today)) {
                                        echo $today;
                                    } else {
                                        echo date("l, F d", strtotime($event['start_time']));
                                    }
                                    ?></label>
                                <span><?php echo $event['city_name']; ?></span>

                            </section>
                        </section>   	     
                    </li>
    <?php } ?>
            </ul>
        </section>
        <!--Right Section Ends-->

        <div class="clear"></div>
    </section>

<?php //} ?>
<style>

    .event-dv-content
    {
        font-size: 11px;}</style>
<script>
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({'address': "01001"},
    function(results_array, status) {
        console.log(status);
        console.log(results_array[0].geometry.location.lat());
        // Check status and do whatever you want with what you get back
        // in the results_array variable if it is OK.
        // var lat = results_array[0].geometry.location.lat()
        // var lng = results_array[0].geometry.location.lng()
    });

    function vistBanner(banner) {
        //alert(banner);
        jQuery.ajax({
            type: "POST",
            data: {banner: banner},
            url: '/Users/visitBanner',
            success: function(data) {

            }
        });
    }
</script>

<script>
    // for getting latitude and longitude from IP address
    $.get("http://ipinfo.io", function(response) {

        $("#lat_long").val(response.loc);
    }, "jsonp");
    $.get("http://freegeoip.net/json/", function(data) {
        //console.log(data);

    });
</script>
<?php
if (isset($this->data['Event']['order']) && !empty($this->data['Event']['order'])) {
    $order_event = str_replace(' ', '_', str_replace('.', '_', $this->data['Event']['order']));
} else {
    $order_event = '';
}
?>
<script>
    $(document).ready(function() {
        $("a").on("click", function() {
            $(window).unbind('beforeunload');
        });

        $('#<?php echo $this->data['Event']['date']; ?>').css('font-weight', 'bold');

        $('#<?php echo $order_event; ?>').css('font-weight', 'bold');

        $('.bn-hide-show').click(function() {
            $('.sp-hide-content').toggleClass('show-hide-panel');
            $(this).text(($(this).text() == 'Show' ? 'Hide' : 'Show'))

        });

        $("#vibe-flip").click(function() {
            $("#vibe-panel").slideToggle("fast");
            $("#plus").toggleClass("plus-hide");
            $("#minus").toggleClass("minus-show");
        });

        $('.show-more').click(function() {
            $('.more-option').toggleClass('show-more-option');
        });

        $('.btn-zipfilter').click(function() {
            $('.findByNum').css('display', 'block');
            $('.btn-zipfilter').css('display', 'none');
        });

        $('.new-view').change(function() {
            $('.detailEvent').toggleClass('event-list-view');
        });
        $('.show-more-vibes').click(function() {
            $('.vibes-more-option').toggleClass('show-more-option');
        });
        $('.show-more-categories').click(function() {
            $('.categories-more-option').toggleClass('show-more-option');
        });

        $("#save-pref-cat").click(function() {
            getCatValueUsingClass();
        });

        $("#save-pref-vib").click(function() {
            getVibValueUsingClass();
        });

    });

    function getCatValueUsingClass() {
        /* declare an checkbox array */
        var chkArray = [];
        $("#load_cats").show();
        /* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
        $(".catsave:checked").each(function() {
            var cval = $(this).attr('class');
            var intval = cval.replace(/[A-Za-z$-]/g, "");
            var catv = parseInt(intval);
            chkArray.push(catv);
        });

        var selected;
        selected = chkArray.join(',') + ",";

        if (selected.length > 1) {

            var dtt;
            $.post(base_url + '/Users/saveprefrence', {"data[Savep]": chkArray}, function(dtt) {

                $("#load_cats").hide();
                $("#save-cat").show();
                $("#save-cat").html("Saved Successfully");
            });
        } else {
            $("#load_cats").hide();
            alert("Please at least one of the checkbox");
        }

    }

    function getVibValueUsingClass() {
        /* declare an checkbox array */
        var chkArray = [];
        $("#load_vibs").show();
        /* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
        $(".vibsave:checked").each(function() {
            var vval = $(this).attr('class');
            var intval = vval.replace(/[A-Za-z$-]/g, "");
            var vibv = parseInt(intval);
            chkArray.push(vibv);
        });

        var selected;
        selected = chkArray.join(',') + ",";

        if (selected.length > 1) {

            var dtt;
            $.post(base_url + '/Users/savevibprefrence', {"data[Savep]": chkArray}, function(dtt) {
                $("#load_vibs").hide();
                $("#save-vib").show();
                $("#save-vib").html("Saved Successfully");
            });
        } else {
            $("#load_vibs").hide();
            alert("Please at least one of the checkbox");
        }

    }
    function setLimit(limit) {
        $("#limit").val(limit);
        document.search_forms.submit();
    }
</script>
