<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <head>
        <title>MapmyIndia Maps API: Place Details Example</title>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
            <link rel="icon" href="http://mapmyindia.com/images/favicon.ico" type="image/x-icon">
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
                <script type="text/javascript" src="js/jquery.min.js"></script>

                <!--put your map api javascript url with key here-->
                <script src="https://apis.mapmyindia.com/advancedmaps/v1/<js_lic_key>/map_load?v=1.2"></script>
                <style type="text/css">
                    /*map css **/
                    body,html {
                        height: 100%;font-family:Verdana,sans-serif, Arial;color:#555;margin: 0;/*EOL*/font-size:12px; padding: 0; background:#fafafa
                    }
                    #map-container{
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
                    .my-div-span{
                        position: absolute;left:1.5em;right: 1em;top:1.4em;bottom:2.5em;font-size:9px;font-weight:bold;width:1px;color:black;
                    }
                    .searchbox-container{
                        padding: 0 5px 0 8px;line-height:20px
                    }
                    .searchbox-title{
                        padding: 5px 0;font-size:13px;color:#222;font-weight: bold;
                    }
                    .txt-search{
                        width: 254px;margin-right: 10px;padding:5px;border:1px solid #ddd;color:#555;   
                    }
                    #result{
                        border-top: 1px solid #e9e9e9;padding:4px; margin-top: 12px;
                    }
                    #poidetail{
                        border-bottom: 1px solid #e9e9e9;
                    }
                    .top-div{
                        border-bottom: 1px solid #e9e9e9;padding:10px 12px;background:#fff;
                    }
                    .details-header{
                        padding: 0 3px;color:green;font-size:13px;
                    }
                    .details-list{
                        list-style-type:decimal;color:green; padding:2px 2px 0 30px;
                    }
                    .loader{
                        padding: 0 12px; color: #777;
                    }
                    .tab-details{
                        width:300px;padding:3px;font-size: 11px;text-align:left
                    }
                    .tab-details th{
                        white-space:nowrap;
                        text-transform: capitalize;
                    }
                </style>
                </head>

                <body>
                    <div class="top-div">
                        <span style="font-size: 20px">MapmyIndia Maps API:</span> 
                        <span style="font-size:16px;color:#777">Place Details Example</span>
                    </div>

                    <div id="menu">
                        <div class="searchbox-container">
                            <div class="searchbox-title">Enter Place Id:</div>
                            <input type="text" class ="txt-search" id="search" value="9ONCQG" 
                                   placeholder="Address, business or location" autocomplete="off" autofocus="" onkeypress="if (event.which == 13 || event.keyCode == 13)
                                               get_place_result()"/><br/>
                            <button onclick="get_place_result()" style="margin-top:10px">Search</button>
                        </div>

                        <div  id="result"></div>
                        <div id="poidetail"></div>
                    </div>
                    <!--map container-->
                    <div id="map-container"></div>
                </body>
                <script type="text/javascript">
                    var url_result;
                    var marker = new Array();
                    var all_result = [];
                    var map;
                    var show_marker = new Array();
                    var centre = new L.LatLng(22.268764, 82.390136);
                    /*put your place details url with the licence key*/
                    var place_details_api_url = "https://apis.mapmyindia.com/advancedmaps/v1/<rest_lic_key>/place_detail?place_id=";

                    /*
                     1. Create a MapmyIndia Map by simply calling new MapmyIndia.Map() and passing it a html div id, all other parameters are optional...
                     2. All leaflet mapping functions can be called simply by using "L" object.
                     3. In future, MapmyIndia may extend the customised/forked Leaflet object to enhance mapping functionality for developers, 
                     which will be clearly documented in the MapmyIndia API documentation section.
                     */
                    map = new MapmyIndia.Map('map-container', {center: centre, zoomControl: true, hybrid: true});

                    get_place_result();

                    /***function to get place details result from the url***/
                    function get_place_result() {
                        var search_id = document.getElementById('search');
                        if (search_id.value == '') {
                            search_id.focus();
                            return false;
                        }
                        /***update  result***/
                        document.getElementById('result').innerHTML = '<div class="loader">Loading...</div>';
                        var place_details_api_url_with_param = place_details_api_url + search_id.value;

                        /***get JSON response***/
                        getUrlResult(place_details_api_url_with_param);
                    }

                    /***function to get Json response from the url***/
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
                                    /***success***/
                                    if (jsondata.responseCode == 200) {
                                        /***display results on success***/
                                        display_place_details_result(jsondata.results[0]);
                                    }
                                    /***Handle the error codes and put the responses in divs. Error codes can be found in the documentation***/
                                    else {
                                        var error_response = "No result found."
                                        remove_markers();
                                        document.getElementById('poidetail').innerHTML = "";
                                        /***Put response result in div***/
                                        document.getElementById('result').innerHTML = error_response + '</ul></div>';
                                    }
                                } else {
                                    remove_markers();
                                    document.getElementById('poidetail').innerHTML = "";
                                    var error_response = "No response from API Server. Kindly check the keys or requested server urls";
                                    /***Put error response in div***/
                                    document.getElementById('result').innerHTML = error_response + '</ul></div>';
                                }
                            }
                        });
                    }
                    /***function to display geocode result***/
                    function display_place_details_result(item) {
                        details = [];
                        remove_markers();/***********remove existing marker from map**/

                        var result_string = '<div class="details-header">Place Details</div><div style="font-size: 13px">';
                        var num = 0;

                        /***show the item data***/
                        if (item !== '' && item !== null && item !== "undefined") {
                            var lat = item.latitude;
                            var lng = item.longitude;
                            var pos = new L.LatLng(lat, lng);/***position of marker*****/

                            var content = new Array();
                            if (checkValue(item.city))
                                content.push('<tr><th>City</th><td width="10px">:</td><td>' + item.city + '</td></tr>');
                            if (checkValue(item.district))
                                content.push('<tr><th>district</th><td width="10px">:</td><td>' + item.district + '</td></tr>');
                            if (checkValue(item.houseName))
                                content.push('<tr><th>houseName</th><td width="10px">:</td><td>' + item.houseName + '</td></tr>');
                            if (checkValue(item.houseNumber))
                                content.push('<tr><th>houseNumber</th><td width="10px">:</td><td>' + item.houseNumber + '</td></tr>');
                            if (checkValue(item.name))
                                content.push('<tr><th>name</th><td width="10px">:</td><td>' + item.name + '</td></tr>');
                            if (checkValue(item.pincode))
                                content.push('<tr><th>pincode</th><td width="10px">:</td><td>' + item.pincode + '</td></tr>');
                            if (checkValue(item.place_id))
                                content.push('<tr><th>place id</th><td width="10px">:</td><td>' + item.place_id + '</td></tr>');
                            if (checkValue(item.poi))
                                content.push('<tr><th>poi</th><td width="10px">:</td><td>' + item.poi + '</td></tr>');
                            if (checkValue(item.street))
                                content.push('<tr><th>street</th><td width="10px">:</td><td>' + item.street + '</td></tr>');
                            if (checkValue(item.subDistrict))
                                content.push('<tr><th>subDistrict</th><td width="10px">:</td><td>' + item.subDistrict + '</td></tr>');
                            if (checkValue(item.subLocality))
                                content.push('<tr><th>subLocality</th><td width="10px">:</td><td>' + item.subLocality + '</td></tr>');
                            if (checkValue(item.subSubLocality))
                                content.push('<tr><th>subSubLocality</th><td width="10px">:</td><td>' + item.subSubLocality + '</td></tr>');
                            if (checkValue(item.type))
                                content.push('<tr><th>type</th><td width="10px">:</td><td>' + item.type + '</td></tr>');
                            if (checkValue(item.village))
                                content.push('<tr><th>village</th><td width="10px">:</td><td>' + item.village + '</td></tr>');

                            details.push(content.join(""));
                            /***display markers***/
                            show_markers(num, pos);
                            var info_content = '<table class="tab-details">' + content.join("") + '</table>';
                            document.getElementById('poidetail').innerHTML = info_content;
                        } else {
                            remove_markers();
                            document.getElementById('poidetail').innerHTML = "";
                            var error_response = "No result found.";
                            /***put error response result in div***/
                            document.getElementById('result').innerHTML = error_response + '</div>';
                        }
                        /***put place details result in div***/
                        document.getElementById('result').innerHTML = result_string + '</div>';
                        /***fit map in marker area***/
                        mapmyindia_fit_markers_into_bound();
                    }

                    function checkValue(v) {
                        var f = false;
                        if (v !== "" && v !== undefined && v !== null && v !== 'null') {
                            f = true;
                        }
                        return f;
                    }

                    function show_markers(num, pos) {
                        var html = "<img class='map_marker' src=" + "'https://maps.mapmyindia.com/images/2.png'>" + '<span class="my-div-span">' + (num + 1) + '</span>';
                        /*creating a div icon*/
                        var icon_marker = L.divIcon({className: 'my-div-icon',
                            html: html,
                            iconSize: [10, 10],
                            popupAnchor: [12, -10]
                        });
                        marker[num] = L.marker(pos, {icon: icon_marker}).bindPopup('<table class="tab-details">' + details[num] + '</table>').openPopup();
                        marker[num].addTo(map);
                        show_marker.push(marker[num]);
                    }
                    /***function to remove  marker from the map***/
                    function remove_markers() {
                        if (show_marker.length > 0) {
                            for (var k = 0; k < show_marker.length; k++) {
                                /*Remove markers from map*/
                                map.removeLayer(show_marker[k]);
                            }
                            show_marker = new Array();
                        }
                    }
                    /***Function to fit the maps in the bounds of the marker***/
                    function mapmyindia_fit_markers_into_bound() {
                        var group = new L.featureGroup(show_marker);
                        map.fitBounds(group.getBounds());
                    }
                </script>
                <!--html portion---->
                </html>