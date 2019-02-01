<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <head>
        <title>MapmyIndia Maps API: Route Example</title>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
            <link rel="icon" href="http://mapmyindia.com/images/favicon.ico" type="image/x-icon">
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
                <script type="text/javascript" src="js/jquery.min.js"></script>
                <!--put your map api javascript url with key here-->
                <script src="https://apis.mapmyindia.com/advancedmaps/v1/<js_lic_key>/map_load?v=1.2"></script>

                <style type="text/css">
                    /*map css **/
                    body,html{
                        height: 100%;font-family:Verdana,sans-serif, Arial;color:#555;margin: 0; font-size:12px; padding: 0; background:#fafafa;
                    }
                    a, img{
                        outline:none; border:none; color:#047CC8; text-decoration:none;
                    }
                    a:hover{
                        text-decoration:underline;
                    }
                    #map-container{
                        position: absolute;left: 312px; top: 46px;right: 2px; bottom: 2px;border: 1px solid #cccccc; 
                    }
                    #menu{
                        position: absolute;left: 2px; top: 46px;width: 306px;bottom: 2px;border: 1px solid #cccccc;background-color: #FAFAFA;overflow-x:hidden;overflow-y: auto;
                    }
                    .textbox{
                        width: 240px; margin:0 10px 5px 0px;padding:5px;border:1px solid #ddd;color:#555
                    }
                    select{
                        color:#555;border:1px solid #ddd;
                    }
                    .top-div{
                        border-bottom: 1px solid #e9e9e9;padding:10px 12px;background:#fff;
                    }
                    .top-div-span1{
                        font-size: 20px;
                    }
                    .top-div-span2{
                        font-size:16px;color:#777
                    }
                    .control-cont{
                        padding: 0 12px 0 17px;font-size:11px;
                    }
                    .div-lbl-sp{
                        padding: 5px 0;font-size:12px;color:#222;font-weight: bold;

                    }
                    .api-param-list{
                        padding:10px 0 15px 0;font-size:12px;width:250px;
                    }

                    #alternate{
                        padding:2px 5px 2px 5px;border:1px solid #ccc;border-radius: 10px;width:254px;display: none;
                    }
                    #sh-aval-rt{
                        padding:3px 0px 3px 10px;float:left;
                    }
                    #info{
                        border-top: 1px solid #e9e9e9;font-size:12px;padding-left: 10px;background:#f7f7f7;margin-top: 10px;  
                    }
                    .advice-div {
                        padding:10px;font-size:11px ;overflow:auto
                    }
                </style>

                </head>            
                <body>
                    <div class="top-div">
                        <span class="top-div-span1">MapmyIndia Maps API:</span>
                        <span class="top-div-span2">Route Example</span>
                    </div>

                    <div id="menu">
                        <div class="control-cont">
                            <div class="div-lbl-sp">Start Points</div>
                            <input type="text" class="textbox" id="start" value="28.610981,77.227434" placeholder="e.g:28.612960,77.229455" autocomplete="off" /><br/>
                            <div class="div-lbl-sp">Via Points (Optional) </div>
                            <input type="text" class="textbox"  id="via" value="" placeholder="e.g:28.570841,77.325929" autocomplete="off" /><br>
                                <div class="div-lbl-sp">Destination Points</div>
                                <div>
                                    <input type="text" class="textbox"  id="destination" value="28.616679,77.212021" placeholder="e.g:27.157015,77.991600" autocomplete="off" />
                                </div>
                                <div class="api-param-list">
                                    <div style="float:left">Route Type</div>
                                    <div style="float:right">
                                        <select id="rtype" style="width:165px">
                                            <option value="0">Quickest</option>
                                            <option value="1">Shortest</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="api-param-list">
                                    <div style="float:left">Vehicle Type</div>
                                    <div style="float:right">
                                        <select id="vtype" style="width:165px">
                                            <option value="1" selected="">Taxi</option>
                                            <option value="0">Passenger</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="api-param-list">
                                    <div style="float:left">Avoids</div>
                                    <div style="float:right">
                                        <select id="avoids" style="width:165px">
                                            <option value="1" selected="">Toll Roads</option>
                                            <option value="2">Ferries</option>
                                            <option value="4" >Unpaved Roads</option>
                                            <option value="8">Highways</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="api-param-list">
                                    <div style="float:left">Advices</div>
                                    <div style="float:right">
                                        <select id="advices_o" style="width:165px">
                                            <option value="1" selected="">With Advices</option>
                                            <option value="0">Without Advices</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="api-param-list">
                                    <div style="float:left">With Alternatives Route</div>
                                    <div style="float:right">
                                        <select id="alternatives_o" style="width:96px">
                                            <option value="true" >True</option>
                                            <option value="false" selected="">False</option>
                                        </select>
                                    </div>
                                </div>

                                <div style="margin:20px 0 5px 0px;">
                                    <button onclick="get_route_result()" >Get Route</button>
                                </div><br>
                                    <div id="alternate">
                                        <label>
                                            <input type="checkbox" id="alternatives"  onclick="alternative_route()" style="float: left" />
                                            <div id="sh-aval-rt">Show Available Alternative Route</div>
                                        </label>
                                    </div>
                                    </div>
                                    <div id="info" ></div>
                                    <div class="advice-div" id="direct_advices"></div>
                                    <div class="advice-div" style="display:none" id="alternatives_advices"></div>			
                                    </div>
                                    <div id="map-container"></div>

                                    <script>
                                        var alternate_route = null;
                                        var poly = [];
                                        var advice_direct_route;
                                        var direct_route_info;
                                        var polyList = [];
                                        var start_end_markersList = new Array();
                                        var advicemarkersList = [];
                                        var via_points = "";
                                        var alternatives_o;
                                        var map;
                                        var pathArrdir = [];
                                        var pth = window.location.href;/*get path of image folder*/
                                        var full_path = pth.replace(pth.substr(pth.lastIndexOf('/') + 1), '');
                                        //var centre = new L.LatLng(28.610981,77.227434);

                                        /*put your REST API URL with key here**/
                                        var route_api_url = 'http://apis.mapmyindia.com/advancedmaps/v1/<rest_lic_key>/route?';
                                        window.onload = function () {
                                            /***
                                             1. Create a MapmyIndia Map by simply calling new MapmyIndia.Map() and passing it a html div id, all other parameters are optional...
                                             2. All leaflet mapping functions can be called simply by using "L" object.
                                             3. In future, MapmyIndia may extend the customised/forked Leaflet object to enhance mapping functionality for developers, 
                                             which will be clearly documented in the MapmyIndia API documentation section.
                                             ****/
                                            map = new MapmyIndia.Map('map-container', {zoomControl: true, hybrid: true});
                                            /***call route api***/
                                            get_route_result();
                                        };
                                        function get_route_result() {
                                            remove_start_end_markersList();
                                            remove_advice_marker();
                                            remove_polyList();
                                            /*  for (poly1 in polyList){
                                             map.removeLayer(poly1);
                                             }*/
                                            poly = [];
                                            pathArrdir = [];
                                            polyList = [];

                                            var start_points = document.getElementById('start').value;/***get start points**/
                                            var destination_points = document.getElementById('destination').value;/**get destination points**/
                                            via_points = document.getElementById('via').value;/**get via points**/
                                            var rtype = document.getElementById('rtype').value;/**get route type**/
                                            var vtype = document.getElementById('vtype').value;/**get vehicle type**/
                                            var avoids = document.getElementById('avoids').value;/**get avoids**/
                                            var advices_o = document.getElementById('advices_o').value;/**get advices option**/
                                            alternatives_o = document.getElementById('alternatives_o').value;/**get alternatives option**/

                                            var route_api_url_with_param = route_api_url + "start=" + start_points + "&destination=" + destination_points
                                                    + "&viapoints=" + via_points + "&rtype=" + rtype + "&vtype=" + vtype + "&avoids=" + avoids + "&with_advices="
                                                    + advices_o + "&alternatives=" + alternatives_o;

                                            var start_points_array = start_points.split(",");
                                            var destination_points_array = destination_points.split(",");
                                            show_markers("start", start_points_array);/*********show start points marker********/
                                            show_markers("destination", destination_points_array); /*********show destination points marker********/

                                            mapmyindia_fit_markers_into_bound(start_points_array, destination_points_array);

                                            document.getElementById('direct_advices').style.display = "inline-block";
                                            document.getElementById('direct_advices').innerHTML = "<font color='red'>loading..</font>";
                                            document.getElementById('alternatives_advices').innerHTML = "";

                                            if (poly['direct'] in polyList) {
                                                polyList.pop(poly['direct']);
                                                map.removeLayer(poly['direct']);
                                            }
                                            if (poly['alternate'] in polyList) {
                                                polyList.pop(poly['alternate']);
                                                map.removeLayer(poly['alternate']);
                                            }
                                            getUrlResult(route_api_url_with_param);
                                        }

                                        function getUrlResult(api_url) {
                                            $.ajax({
                                                type: "POST",
                                                dataType: 'text',
                                                url: "getResponse.php",
                                                async: false,
                                                data: {
                                                    url: JSON.stringify(api_url),
                                                },
                                                success: function (result) {
                                                    var resdata = JSON.parse(result);
                                                    if (resdata.status == 'success') {
                                                        var jsondata = JSON.parse(resdata.data);
                                                        if (jsondata.responseCode == 200) {
                                                            route_api_result(jsondata.results);
                                                        }
                                                    } else {
                                                        var error_response = "No response from API Server. Kindly check the api keys or requested server urls.";
                                                    }
                                                }
                                            });
                                        }

                                        function route_api_result(data) {
                                            if (data.trips.duration != 0) {
                                                var alternate_route1_text = "";
                                                var alternate_route2_text = "";
                                                var direct_route = 'Route';
                                                alternate_route = data.alternatives;
                                                document.getElementById("alternate").style.display = "none";
                                                if (typeof alternate_route[0] != 'undefined') { /***get first alternative route***/
                                                    var duration1 = alternate_route[0].duration;/**time in seconds*************/
                                                    var hours1 = Math.floor(duration1 / 3600);
                                                    duration1 %= 3600;
                                                    var minutes1 = Math.floor(duration1 / 60);
                                                    var total_time1 = (hours1 >= 1 ? hours1 + " hrs " : '') + (minutes1 >= 1 ? minutes1 + " min" : '');
                                                    var length1 = (alternate_route[0].length) / 1000;
                                                    alternate_route1_text = '<td ><div style="padding:5px 5px 5px 15px;color:#000;border-left:1px solid #ddd;cursor:pointer"\n\
                                                    onclick="document.getElementById(\'direct_advices\').style.display=\'none\';\n\
                                                    document.getElementById(\'alternatives_advices\').style.display=\'inline-block\';alternative_route(0)">\n\
                                                    <span style="font-size:13px;padding:2px 0 20px 0;color:#222">Route 2</span><br>\n\
                                                    <span style="font-size:11px;line-height:16px;color:#555">' + total_time1 + '<br>' + length1.toFixed(1) + ' km</div></td>';
                                                    direct_route = 'Route 1';
                                                }
                                                /***get second alternative route***/
                                                if (typeof alternate_route[1] != 'undefined') {
                                                    var duration2 = alternate_route[1].duration;/**time in seconds*************/
                                                    var hours2 = Math.floor(duration2 / 3600);
                                                    duration2 %= 3600;
                                                    var minutes2 = Math.floor(duration2 / 60);
                                                    var total_time2 = (hours2 >= 1 ? hours2 + " hrs " : '') + (minutes2 >= 1 ? minutes2 + " min" : '');
                                                    var length2 = (alternate_route[1].length) / 1000;
                                                    alternate_route2_text = '<td ><div style="padding:5px 5px 5px 15px;color:#000;border-left:1px solid #ddd;cursor:pointer" \n\
                                                    onclick="document.getElementById(\'direct_advices\').style.display=\'none\';\n\
                                                    document.getElementById(\'alternatives_advices\').style.display=\'inline-block\';alternative_route(1)">\n\
                                                    <span style="font-size:13px;padding:2px 0 20px 0;color:#222">Route 3</span><br>\n\
                                                    <span style="font-size:11px;line-height:16px;color:#555">' + total_time2 + '<br>' + length2.toFixed(1) + ' km</div></td>';
                                                }
                                                /***check & display alternative route option*****/
                                                var way = data.trips[0];
                                                var way1 = data.trips[1];
                                                var total_time;
                                                var length;
                                                if (via_points == "") {
                                                    var trips = data.trips;
                                                    var duration = way.duration;/**time in seconds*************/
                                                    var hours = Math.floor(duration / 3600);
                                                    duration %= 3600;
                                                    var minutes = Math.floor(duration / 60);
                                                    total_time = (hours >= 1 ? hours + " hrs " : '') + (minutes >= 1 ? minutes + " min" : '');
                                                    length = (way.length) / 1000;

                                                    var pts = decode_path(way.pts);
                                                    var advices = way.advices; /****advice & display **************/
                                                } else {
                                                    /*******if via points is provided use trip[0] & trip[1] also************/
                                                    var duration = way.duration + way1.duration;/**time in seconds*************/
                                                    var hours = Math.floor(duration / 3600);
                                                    duration %= 3600;
                                                    var minutes = Math.floor(duration / 60);
                                                    total_time = (hours >= 1 ? hours + " hrs " : '') + (minutes >= 1 ? minutes + " min" : '');
                                                    length = (way.length + way1.length) / 1000;
                                                    var pts = decode_path(way.pts).concat(decode_path(way1.pts));/****points trip[0] & trip[1] to display **************/
                                                    var advices = way.advices.concat(way1.advices); /****advice trip[0] & trip[1] to display **************/
                                                }
                                                /***********display advices***********/
                                                direct_route_info = '<table width="100%"><tr><td ><div style="padding:5px;cursor:pointer;background:#f7f7f7" \n\
                                                onclick="document.getElementById(\'direct_advices\').style.display=\'inline-block\';\n\
                                                document.getElementById(\'alternatives_advices\').style.display=\'none\';removeMapLayer(\'alternate\')\n\
                                                draw_polyline(\'direct\', pathArrdir);"><span style="font-size:13px;padding:2px 0 20px 0;color:#222">' + direct_route +
                                                        '</span><br><span style="font-size:11px;line-height:16px">' + total_time + '<br>' + length.toFixed(1)
                                                        + ' km</span></div></td>' + alternate_route1_text + alternate_route2_text + '</tr></table>';

                                                document.getElementById('info').innerHTML = direct_route_info;
                                                advice_direct_route = '<span style="font-size:13px;padding-left:5px">' + direct_route + '</span><table width="100%" align="center">';
                                                var num_rec = 1;
                                                var distance;
                                                var go = "";
                                                advices.forEach(function (advice) {
                                                    var icon = advice.icon_id;
                                                    var meters = advice.meters;
                                                    var distance_meters = meters - distance;
                                                    distance = meters;
                                                    var advice_meters = (distance_meters >= 1000 ? (distance_meters / 1000).toFixed(1) + " km " : distance_meters + " mts ")
                                                    var text = advice.text;
                                                    if (meters != 0) {
                                                        go = "<br>Go " + advice_meters;
                                                        advice_direct_route += go + '</td></tr>';
                                                    }
                                                    var advice_pt = advice.pt;
                                                    advice_direct_route += '<tr onclick="show_route_details(' + advice_pt.lat + ',' + advice_pt.lng + ',\'' + text + '\')"\n\
                                                    style="cursor:pointer;"><td valign="top" style="padding:5px 0px 5px 0px"><img src="https://api.mapmyindia.com/images/step_'
                                                            + icon + '.png" width="30px"></td><td style="padding:5px;border-top: 1px solid #e9e9e9;">' + text;
                                                });
                                                /***********display path***********/
                                                var pathArr = [];
                                                pts.forEach(function (pt) {
                                                    pathArrdir.push(new L.LatLng(pt[0], pt[1]));
                                                });
                                                document.getElementById('direct_advices').innerHTML = advice_direct_route + "</table>";
                                                draw_polyline("direct", pathArrdir);/***********draw polyline***/
                                            } else {
                                                document.getElementById('info').innerHTML = "";
                                                document.getElementById('direct_advices').innerHTML = "Invalid points";
                                                remove_start_end_markersList();/***remove if any existing marker***/
                                            }
                                        }
                                        /*function to show alternative route with route_no*/
                                        function alternative_route(route_no) {
                                            if (advice_marker) {
                                                map.removeLayer(advice_marker);/***remove advices marker *****/
                                            }
                                            map.removeLayer(poly['direct']);
                                            var way = alternate_route[route_no];
                                            var way1 = alternate_route[1];
                                            var pts = decode_path(way.pts);
                                            var advices = way.advices; /****advice & display **************/
                                            var advice_alternative_route = '<span style="font-size:13px;padding-left:5px">Route ' + (route_no + 2) + '</span>\n\
                                            <table width="100%" align="center">';
                                            var num_rec = 1;
                                            var distance;
                                            var go = "";
                                            advices.forEach(function (advice) {
                                                var icon = advice.icon_id;
                                                var meters = advice.meters;
                                                var distance_meters = meters - distance;
                                                distance = meters;
                                                var advice_meters = (distance_meters >= 1000 ? (distance_meters / 1000).toFixed(1) + " km " : distance_meters + " mts ")
                                                var text = advice.text;
                                                if (meters != 0) {
                                                    go = "<br>Go " + advice_meters;
                                                    advice_alternative_route += go + '</td></tr>';
                                                }
                                                var advice_pt = advice.pt;
                                                advice_alternative_route += '<tr onclick="show_route_details(' + advice_pt.lat + ',' + advice_pt.lng + ',\'' + text + '\')" \n\
                                                style="cursor:pointer;"><td valign="top" style="padding:5px 0px 5px 0px"><img src="https://api.mapmyindia.com/images/step_'
                                                        + icon + '.png" width="30px"></td><td style="padding:5px;border-top: 1px solid #e9e9e9;">' + text;
                                            })
                                            document.getElementById('alternatives_advices').innerHTML = advice_alternative_route + "</table>";
                                            document.getElementById('direct_advices').style.display = 'none';/************hide direct advices******/
                                            document.getElementById('alternatives_advices').style.display = 'inline-block';/************hide direct advices******/
                                            /***********display path***********/
                                            var pathArr = [];
                                            pts.forEach(function (pt) {
                                                pathArr.push(new L.LatLng(pt[0], pt[1]));
                                            })

                                            if (poly["alternate"] in polyList) {
                                                polyList.pop(poly["alternate"]);
                                                map.removeLayer(poly["alternate"]);
                                            }
                                            // map.removeLayer(poly['alternate']);
                                            draw_polyline("alternate", pathArr);/***draw polyline***/
                                        }

                                        function draw_polyline(route, pathArr) {
                                            remove_polyList();
                                            if (poly[route] in polyList) {
                                                polyList.pop(poly[route]);
                                                map.removeLayer(poly[route]);
                                            }
                                            /**draw polyline***/
                                            var polyline_color = 'blue';
                                            if (route == 'direct') {
                                                if (poly[route] in polyList) {
                                                    polyList.pop(poly[route]);
                                                    map.removeLayer(poly[route]);
                                                    var polyline_color = 'orange';
                                                }
                                            }
                                            /***polyline display, for more about polyline, please refer our polyline documentation***/

                                            poly[route] = new L.Polyline(pathArr, {
                                                color: polyline_color,
                                                weight: 6,
                                                opacity: 0.5,
                                                smoothFactor: 1
                                            });
                                            polyList.push(poly[route]);
                                            poly[route].addTo(map);
                                        }
                                        function show_markers(marker_name, points) {
                                            var show_marker;
                                            var pos = new L.LatLng(points[0], points[1]);
                                            var title;
                                            var icon_marker = '';
                                            if (marker_name == 'start') {
                                                var title = "Start Point";
                                                icon_marker = L.icon({
                                                    iconUrl: full_path + '/images/3.png',
                                                    iconRetinaUrl: full_path + '/images/3.png',
                                                    iconSize: [34, 48],
                                                    popupAnchor: [-3, -15]
                                                });
                                            } else {
                                                var title = "Destination Point";
                                                icon_marker = L.icon({
                                                    iconUrl: 'https://maps.mapmyindia.com/images/2.png',
                                                    iconRetinaUrl: 'https://maps.mapmyindia.com/images/2.png',
                                                    iconSize: [34, 48],
                                                    popupAnchor: [-3, -15]
                                                });
                                            }
                                            /***marker display, for more about marker, please refer our marker documentation***/
                                            //if (icon_marker != '') {
                                            show_marker = new L.marker(pos, {draggable: 'true', icon: icon_marker, title: title}).addTo(map);
                                            //} else {

                                            //  show_marker = new L.marker(pos, {draggable: 'true', title: title}).addTo(map);
                                            //}

                                            show_marker.bindPopup(title, {closeButton: true, autopan: true, zoomAnimation: true}).openPopup();
                                            start_end_markersList.push(show_marker);

                                            show_marker.on('dragend', function (event) {
                                                var marker = event.target;
                                                var position = marker.getLatLng();
                                                document.getElementById(marker_name).value = position.lat + "," + position.lng;
                                                get_route_result();
                                            });
                                        }

                                        var advice_marker;
                                        function show_route_details(advice_lat, advice_lng, advice_text) {
                                            remove_advice_marker();
                                            var advice_pos = new L.LatLng(advice_lat, advice_lng);
                                            var adv_icon_marker = L.icon({
                                                iconUrl: 'https://maps.mapmyindia.com/images/7.png',
                                                iconRetinaUrl: 'https://maps.mapmyindia.com/images/7.png',
                                                iconSize: [34, 48],
                                                popupAnchor: [-3, -15]
                                            });
                                            advice_marker = L.marker(advice_pos, {draggable: 'true', icon: adv_icon_marker, title: advice_text}).addTo(map);
                                            advice_marker.bindPopup(advice_text, {advice_text: true, autopan: true, zoomAnimation: true}).openPopup();
                                            advicemarkersList.push(advice_marker);
                                            map.setView(advice_pos, 17);

                                        }
                                        function remove_advice_marker() {
                                            for (var k = 0; k < advicemarkersList.length; k++) {
                                                map.removeLayer(advicemarkersList[k]);
                                            }
                                            advicemarkersList = new Array();
                                        }

                                        function remove_polyList() {
                                            for (var k = 0; k < polyList.length; k++) {
                                                map.removeLayer(polyList[k]);
                                            }
                                            polyList = new Array();
                                        }
                                        function removeMapLayer(layer) {
                                            if (poly[layer] !== undefined) {
                                                map.removeLayer(poly[layer]);
                                            }

                                        }
                                        function remove_start_end_markersList() {
                                            for (var k = 0; k < start_end_markersList.length; k++) {
                                                map.removeLayer(start_end_markersList[k]);
                                            }
                                            start_end_markersList = new Array();
                                        }
                                        function mapmyindia_fit_markers_into_bound(start_points_array, destination_points_array) {
                                            var bounds = new L.LatLngBounds([start_points_array[0], start_points_array[1]], [destination_points_array[0], destination_points_array[1]]);
                                            map.fitBounds(bounds);
                                        }
                                        /***************decode pts****************/
                                        function decode_path(encoded) {
                                            if (encoded != 'undefined') {
                                                var pts = [];
                                                var index = 0, len = encoded.length;
                                                var lat = 0, lng = 0;
                                                while (index < len) {
                                                    var b, shift = 0, result = 0;
                                                    do {
                                                        b = encoded.charAt(index++).charCodeAt(0) - 63;
                                                        result |= (b & 0x1f) << shift;
                                                        shift += 5;
                                                    } while (b >= 0x20);

                                                    var dlat = ((result & 1) != 0 ? ~(result >> 1) : (result >> 1));
                                                    lat += dlat;
                                                    shift = 0;
                                                    result = 0;
                                                    do {
                                                        b = encoded.charAt(index++).charCodeAt(0) - 63;
                                                        result |= (b & 0x1f) << shift;
                                                        shift += 5;
                                                    } while (b >= 0x20);
                                                    var dlng = ((result & 1) != 0 ? ~(result >> 1) : (result >> 1));
                                                    lng += dlng;
                                                    pts.push([lat / 1E6, lng / 1E6]);
                                                }
                                                return pts;
                                            } else {
                                                return '';
                                            }
                                        }
                                        ;
                                        Array.max = function (array) {
                                            return Math.max.apply(Math, array);
                                        };
                                        Array.min = function (array) {
                                            return Math.min.apply(Math, array);
                                        };
                                    </script>
                                    </body>
                                    </html>