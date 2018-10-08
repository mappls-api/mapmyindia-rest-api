<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <head>
        <title>MapmyIndia Maps API: Auto Suggest Example</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
            <link rel="icon" href="http://mapmyindia.com/images/favicon.ico" type="image/x-icon">

                <link rel="stylesheet" href="css/jquery-ui.min.css" />
                <script type="text/javascript" src="js/jquery.min.js"></script>
                <script type="text/javascript" src="js/jquery-ui.min.js"></script>

                <!--put your map api javascript url with key here-->
                <script src="https://apis.mapmyindia.com/advancedmaps/v1/<Enter your map key>/map_load?v=0.1"></script>
                <style>
                    body,html { height: 100%;font-family:Verdana,sans-serif, Arial;color:#555;margin: 0;/*EOL*/font-size:12px; padding: 0; background:#fafafa}

                    .loading{
                        background-image: url(loading.gif);
                        background-position: right center;
                        background-repeat: no-repeat;
                    }
                    .ui-autocomplete .highlight {
                        text-decoration: underline;
                    }
                    .ui-autocomplete{
                    }
                    /*marker css*/
                    .map_marker{
                        position:relative;width:34px;height:48px
                    }
                    /*marker text span css*/
                    .my-div-span{
                        position: absolute;left:1.5em;right: 1em;top:1.4em;bottom:2.5em;font-size:9px;font-weight:bold;width:1px;color:black;
                    }
                    .tab-details{
                        width:300px;padding:3px;font-size: 11px;text-align:left
                    }
                    .tab-details th{
                        white-space:nowrap
                    }
                    .details-header{
                        padding: 0 12px;color:green;font-size:13px;
                    }
                    .details-list{
                        list-style-type:decimal;color:green; padding:2px 2px 0 30px;
                    }
                    #result{
                        border-top: 1px solid #e9e9e9;padding:10px; margin-top: 12px;
                    }
                    #suggestdetail{
                        border-bottom: 1px solid #e9e9e9;display: none
                    }

                    .searchbox-title{
                        padding: 5px 0;font-size:13px;color:#222
                    }
                    .searchbox-container{
                        padding: 0 12px 0 17px;line-height:20px
                    }
                    .txt-search{
                        width: 254px;margin-right: 10px;padding:5px;border:1px solid #ddd;color:#555;   
                    }

                    /*map css **/
                    #map-container {
                        position: absolute;left: 312px; top: 46px;right: 2px; bottom: 2px;border: 1px solid #cccccc; 
                    }
                    #menu{
                        position: absolute;left: 2px; top: 46px;width: 306px;bottom: 2px;border: 1px solid #cccccc;background-color: #FAFAFA;overflow-x:hidden;overflow-y: auto;
                    }
                    li{
                        padding:0 5px 10px 0;cursor:pointer;color: #333;
                    }
                    li:hover{
                        color:#00adff;cursor:pointer;text-decoration:underline
                    }
                    .top-div{
                        border-bottom: 1px solid #e9e9e9;padding:10px 12px;background:#fff;
                    }
                    #ui-id-1{
                        width: 20em !important; 
                        border: none;
                        word-wrap: break-word !important;
                        background: #FFF 50% bottom repeat-x;
                        color: #fff;
                        height: 40%;
                        overflow: scroll;
                    }
                    ::-webkit-scrollbar {
                        width: 5px;
                        height: 12px;
                    }
                    ::-webkit-scrollbar-thumb {
                        background: #4DB6AC;
                        border-radius: 10px;
                    }
                </style>

                </head>
                <body>
                    <div class="top-div">
                        <span style="font-size: 20px">MapmyIndia Maps API:</span> 
                        <span style="font-size:16px;color:#777">Auto-Suggest Example</span>
                    </div>
                    <div id="menu">
                        <div class="searchbox-container">
                            <div class="searchbox-title"><b>Enter Location:</b></div>
                            <input class="txt-search" id="autocomplete" type="text" placeholder="Address, business or location" name="search" 
                                   onkeypress="if (event.which == 13 || event.keyCode == 13)
                                               result()">
                        </div>
                        <div id="result"></div>
                        <div id="suggestdetail" ></div>
                    </div>
                    <div id="map-container"></div>
                    <script>
                        var result_string = '';
                        var latitudeArr = [];
                        var longitudeArr = [];
                        var url_result;
                        var all_result = [];
                        var show_marker = new Array();
                        var isselected = 0;
                        var map;
                        var centre = new L.LatLng(22.268764, 82.390136);

                        /**map initialization with tiles of MapmyIndia with MapmyIndia.Map**/
                        var map = new MapmyIndia.Map('map-container', {center: centre, zoomControl: true, hybrid: true});

                        /***function that modifies both center map position and zoom level.***/
                        map.setView(centre, 4);
                        MapmyIndia.geo(map_o[0]);
                            var current_lat="";
                            var current_lng="";
                                if (navigator.geolocation) {
                                    navigator.geolocation.getCurrentPosition(showPosition);
                                } else { 
                                    x.innerHTML = "Geolocation is not supported by this browser.";
                                }

                            function showPosition(position) {
                                current_lat=position.coords.latitude;
                                current_lng=position.coords.longitude;
                            }
                            $('.srch_dv').hide();

                        /***autosuggest function.***/
                        $(function () {
                            $("#autocomplete").keypress(function(){
                                $('#autocomplete').addClass('loading');
                            })
                            $("#autocomplete").autocomplete({
                                delay: 500,
                                minLength: 0,
                                source: function (request, response) {
                                    if ($("#autocomplete").val().length > 0) {
                                        if(current_lat=='' || current_lng=='')
                                        {
                                            var map_center = map.getCenter();
                                            current_lat = map_center.lat;
                                            current_lng = map_center.lng;
                                        }
                                        $.ajax({
                                            type: "GET",
                                            dataType: 'text',
                                            url: "getResponse.php",
                                            async: false,
                                            data: {
                                                query: JSON.stringify($(autocomplete).val().replace(/\s/g, "+")),
                                                current_lng :JSON.stringify(current_lng),
                                                current_lat :JSON.stringify(current_lat)
                                            },
                                            success: function (result) {
                                                hideLoader();
												remove_markers();
                                                var resdata = JSON.parse(result);
                                                console.log(resdata);
                                                if (resdata.status == 'success') {
                                                    var jsondata = JSON.parse(resdata.data);

                                                    result_string = '<div class="details-header">Auto Suggested Pois</div><div style="font-size: 13px"><ul class = "details-list">';
                                                    /*success*/
                                                    if (typeof jsondata.suggestedLocations!="undefined") {
                                                        var m = (jsondata.suggestedLocations);
                                                        var c = 0;
                                                        var array = $.map(jsondata.suggestedLocations, function (item) {
                                                            var param = '';
                                                            var address = item["placeAddress"];
                                                            if (c >= 0) {
                                                                param = (c + "|" + item["longitude"] + "|" + item["latitude"] + "|" + item["type"] + "|" + item["placeAddress"] + "|" + item["eLoc"]);
                                                            }
                                                            c = c + 1;
                                                            result_string += '<li>' + address + '</li>';
                                                            return{
                                                                label: item["placeAddress"],
                                                                placeName: item["placeName"],
                                                                url: param
                                                            }
                                                        });
                                                        response(array);
                                                        showDiv("suggestdetail");
                                                        clearDiv("suggestdetail");
                                                        clearDiv("result");
                                                    }
                                                    /*handle the error codes and put the responses in divs*/
                                                    else {
                                                        hideLoader();
                                                        var error_response = "No result found."
                                                        hideDiv("suggestdetail");
                                                        document.getElementById('ui-id-1').style.display = "none";
                                                        document.getElementById('result').innerHTML = error_response;/***put response result in div**/
                                                        return{
                                                            label: '0'
                                                        }
                                                    }
                                                } else {
                                                    var error_message = resdata.data;
                                                    /***put response result in div****/
                                                    document.getElementById('result').innerHTML = error_message;
                                                    hideDiv("suggestdetail");
                                                    $('#ui-id-1').hide();
                                                }
                                            }
                                        });
                                    } else {
                                        /**clear autosuggest**/
                                        $('#autocomplete').autocomplete('close').val('');

                                        /**hide loader**/
                                        hideLoader();
                                        $("#autocomplete").val("");
                                        clearDiv("suggestdetail");
                                        hideDiv("suggestdetail");

                                        document.getElementById('result').innerHTML = "Please type any location in the search box.";
                                        remove_markers();
                                    }
                                },
                                focus: function (event, ui) {
                                    //prevent autocomplete from updating the textbox
                                    event.preventDefault();
                                },
                                select: function (event, ui) {
                                    isselected = 1;
                                    event.preventDefault();
                                    details = [];
                                    var val = ui.item.url;
                                    var res = val.split("|");
                                    if (res.length >= 0) {
                                        var content = new Array();
                                        if (res[3] != '')
                                            content.push('<tr><th>Type</th><td width="10px">:</td><td>' + res[3] + '</td></tr>');
                                        if (res[4] != '')
                                            content.push('<tr><th>Formatted Address</th><td width="10px">:</td><td>' + res[4] + '</td></tr>');
                                        if (res[5] != '')
                                            content.push('<tr><th>Place Id</th><td width="10px">:</td><td>' + res[5] + '</td></tr>');
                                        details.push(content.join(""));

                                        /***put autosuggest result in div***/
                                        document.getElementById('result').innerHTML = '<table class="tab-details">' + details[0] + '</table>';

                                        /***display markers***/
                                        show_markers(1, new L.LatLng(res[2], res[1]), 0);

                                    } else {
                                        hideLoader();
                                        remove_markers();
                                    }
                                }
                            }).data("ui-autocomplete")._renderItem = function (ul, item) {
                                var $a = $("<a></a>").append("<span style='font-weight: 650 !important;'>"+item.placeName+"</span><br>"+item.label);
                                return $("<li style='border-bottom:1px solid #f1efef !important;'></li>").append($a).appendTo(ul);
                            };
                        });
                        function show_markers(num, pos, detail_num) {
                            hideLoader();
                            var html="<img class='map_marker' src=" + "'https://maps.mapmyindia.com/images/2.png'>" + '<span class="my-div-span" style="left: 1.6em !important;">' + num + '</span>';
                            /*creating a div icon*/
                            var icon_marker = L.divIcon({className: 'my-div-icon',
                                html:html,
                                iconSize:[10, 10],
                                popupAnchor: [12, -10]
                            });
                            var m = L.marker(pos, {icon: icon_marker}).bindPopup('<table class="tab-details">' + details[detail_num] + '</table>').openPopup();
                            m.addTo(map);
                            map.setView(pos, 17);
                            show_marker.push(m);
                        }
                        function remove_markers() {
                            if (show_marker.length > 0) {
                                map.removeLayer(show_marker[0]);
                            }

                        }
                        function result() {
                            if (isselected == 0) {
                                var menu = $("#autocomplete").autocomplete("widget");
                                $(menu[0].children[0]).click();
                                console.log($(menu[0].children[0]).text());
                                document.getElementById('autocomplete').value = $(menu[0].children[0]).text();
                                document.getElementById('suggestdetail').innerHTML = result_string + '</ul></div>';
                            }
                        }
                        function hideLoader() {
                            /**hide loader**/
                            $("#autocomplete").removeClass("loading");
                        }
                        function showLoader() {
                            $("#autocomplete").addClass("ui-autocomplete-loading");
                        }
                        function clearDiv(id) {
                            document.getElementById(id).innerHTML = "";
                        }
                        function showDiv(id) {
                           document.getElementById(id).style.display = "block";
                        }
                        function hideDiv(id) {
                            document.getElementById(id).style.display = "none";
                        }
                        $(function () {
                            $(document).on('click', 'input[type=text]', function () {
                                this.select();
                            });
                        });
                    </script>
                </body>
                <!--html portion---->
                </html>