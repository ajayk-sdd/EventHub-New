<section id="cont_wrapper">
    <section class="content">
        <!--<h1 class="main_heading"><?php //echo $this->Html->link('Add EventTemplate', '/admin/EventTemplates/createEventTemplate');      ?></h1>-->
        <section class="content_info">
            <?php echo $this->Session->flash(); ?>
            <!------------------------------------------------------------ template edit starts below ----------------------------------->

            <link href="/css/evol.colorpicker.css" rel="stylesheet" />
            <script src="/js/ckeditor.js"></script>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js" type="text/javascript"></script>
            <script src="/js/evol.colorpicker.js" type="text/javascript"></script>

            <link href="/css/sample.css" rel="stylesheet">
            <style>

                .ui-widget-content {
                    background-color: #B2B2B2;
                    border: 1px solid #B2B2B2;
                    color: #333333;
                }
                li{
                    margin-top: 6px;
                }
                .evo-palette, .evo-palette-ie {
                    background-color: #B2B2B2;
                    border-collapse: separate;
                    border-spacing: 4px 0;
                }

            </style>
            <script>
                function backgroundColor(color) {
                    $(".my_focus").css("background-color", color);
                    $(".my_focus").removeClass("my_focus");

                }
                function borderColor(color) {
                    $(".my_focus").css("border", "1px solid " + color);
                    $(".my_focus").removeClass("my_focus");
                }
                function textColor(color) {
                    $(".my_focus").css("color", color);
                    $(".my_focus").removeClass("my_focus");
                }
                function fullBackgroundColor(color) {
                    $(".fulckeditor").css("background-color", color);
                    $(".my_focus").removeClass("my_focus");
                }
                function fullBorderColor(color) {
                    $(".fulckeditor").css("border", "1px solid " + color);
                    $(".my_focus").removeClass("my_focus");
                }
                function fullTextColor(color) {
                    $(".fulckeditor").css("color", color);
                    $(".my_focus").removeClass("my_focus");
                }


                $(document).ready(function()
                {
                    $('.cpBoth').colorpicker();
                });
                $('body').click(function() {
                    $(".my_focus").removeClass("my_focus");
                    $(".cke_focus").addClass("my_focus");
                });

                function save() {
                    var html = $(".EventTemplateHtmlDiv").html();
                    $("#EventTemplateHtml").val(html);
                    document.myForm.submit();
                }

            </script>
            <div class="clear"></div>
            <?php
            echo $this->Form->create("Template", array("action" => "view", "id" => "myForm", "name" => "myForm"));
            echo $this->Form->input("EventTemplate.id", array("type" => "hidden", "value" => $data["EventTemplate"]["id"]));
            echo $this->Form->input("EventTemplate.html", array("type" => "hidden", "value" => $data["EventTemplate"]["html"], "id" => "EventTemplateHtml"));
            echo $this->Form->end();
            ?>



            <div class='left-panel-box'>
                <h2>Background Color</h2>
                <input class="cpBoth" value="#31859b" onchange="javascript:backgroundColor(this.value);"/>
                <br>
                <h2>Border Color</h2>
                <input class="cpBoth" value="#31859b" onchange="javascript:borderColor(this.value);"/>
                <br>
                <h2>Text Color</h2>
                <input class="cpBoth" value="#31859b" onchange="javascript:textColor(this.value);"/>
                <br>
                <h2>Full Background Color</h2>
                <input class="cpBoth" value="#31859b" onchange="javascript:fullBackgroundColor(this.value);"/>
                <br>
                <h2>Full Border Color</h2>
                <input class="cpBoth" value="#31859b" onchange="javascript:fullBorderColor(this.value);"/>
                <br>
                <h2>Full Text Color</h2>
                <input class="cpBoth" value="#31859b" onchange="javascript:fullTextColor(this.value);"/>
            </div>
            <div style="width:20%; height: 800px; border: 1px solid #D8E2EA; float: right; padding: 12px; background-color: #D8E2EA;">
                <h4>Template Keywords</h4>
                <ul>
                    <li><b>Event Name</b></li>
                    <li>*|EVENT_NAME|*</li>
                    <li><b>Event Venue</b></li>
                    <li>*|VENUE|*</li>
                    <li><b>Event Cost</b></li>
                    <li>*|COST|*</li>
                    <li><b>Event Date</b></li>
                    <li>*|Date|*</li>
                    <li><b>Event Categories</b></li>
                    <li>*|CATEGORY|*</li>
                    <li><b>Event Vibes</b></li>
                    <li>*|VIBES|*</li>
                    <li><b>Ticket URL</b></li>
                    <li>*|TICKET_URL|*</li>
                    <li><b>Facebook URL</b></li>
                    <li>*|FACEBOOK_URL|*</li>
                    <li><b>Site URL</b></li>
                    <li>*|SITE_URL|*</li>
                    <li><b>Event Detail URL</b></li>
                    <li>*|EVENT_DETAIL_URL|*</li>


                </ul>
            </div>
            <div class="EventTemplateHtmlDiv" style="width:60%; float: right;">
                <!--------------------------------- full editor ---------------------->

                <div id="container" class="fulckeditor">
                    <?php echo $data["EventTemplate"]["html"]; ?>
                </div>



                <!------------------------- full editor------------------------------------------------->

            </div>

            <section class="login_btn" style="float:right; margin-right: 20%;">
                <span class="blu_btn_lt">
                    <a class="blu_btn_rt" style="cursor:pointer;" onclick="javascript:window.back();">Go Back</a>
                </span>
                <span class="blu_btn_lt">
                    <a class="blu_btn_rt" style="cursor:pointer;" onclick="javascript:save();">Save Changes</a>
                </span>
            </section>
            <!------------------------------------------------------------ template edit ends above ------------------------------------->          
            <section class="clr_bth"></section>
        </section>
    </section>
</section>