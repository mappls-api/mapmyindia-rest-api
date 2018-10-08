<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <head>
        <title>MapmyIndia Maps API: Geocoding Example</title>
        
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <link rel="icon" href="http://mapmyindia.com/images/favicon.ico" type="image/x-icon">
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
        <style type="text/css">
                /*map css **/
                body,html { height: 100%;font-family:Verdana,sans-serif, Arial;color:#555;margin: 0;/*EOL*/font-size:12px; padding: 0; background:#fafafa}
                #map-container {position: absolute;left: 312px; top: 46px;right: 2px; bottom: 2px;border: 1px solid #cccccc; }
                #menu {position: absolute;left: 2px; top: 46px;width: 306px;bottom: 2px;border: 1px solid #cccccc;background-color: #FAFAFA;overflow-x:hidden;overflow-y: auto;}
                li{padding:0 5px 10px 0;cursor:pointer;color: #333;}
                li:hover{color:#00adff;cursor:pointer;text-decoration:underline}
                .my-div-span{position:relative;}
        </style>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <!--put your map api javascript url with key here-->
        <script src="https://apis.mapmyindia.com/advancedmaps/v1/<js_lic_key>/map_load?v=0.1"></script>
        <script type="text/javascript">
                var lng = 77.22945570945740;
                var lat = 28.6129602407977;
                var url_result;

                var all_result = [];
                var show_marker = new Array();
                var map;
                /*put your REST API URL with key here**/
                var geocode_api_url= "http://apis.mapmyindia.com/advancedmaps/v1/<rest_lic_key>/geo_code?";
                window.onload = function() {
                
                var centre = new L.LatLng(22.268764,82.390136);
                map=new MapmyIndia.Map('map-container',{center:centre,zoomControl: true,hybrid:true });
                /*1.create a MapmyIndia Map by simply calling new MapmyIndia.Map() and passsing it at the minimum div object, all others are optional...
                2.all leaflet mapping functions can be called simply on the L object
                3.MapmyIndia may extend and in future modify the customised/forked Leaflet object to enhance mapping functionality for developers, which will be clearly documented in the MapmyIndia API documentation section.*/
                get_geocode_result();
                };

                /*function to get geocode result from the url*/
                function get_geocode_result()
                {
                    var search_id = document.getElementById('search');
                    if (search_id.value == '') {
                        search_id.focus();
                        return false;
                    }
                    document.getElementById('result').innerHTML = '<div style="padding: 0 12px; color: #777">Loading..</div>';/*update best result */
                    document.getElementById('otherresult').innerHTML = '<div style="padding: 0 12px; color: #777">Loading..</div>';/*update other result */
                    var geocode_api_url_with_param = geocode_api_url +"addr=" + search_id.value.replace(/\s/g, "+");
                    getUrlResult(geocode_api_url_with_param);/*get JSON resp*/
                }

                /*function to get Json response from the url*/
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
                            
                            var jsondata = JSON.parse(result);
                            if (jsondata.responseCode == 200) {
                                /*success*/
                                display_geocode_result(jsondata.results);/*display results on success*/
                            }
                            /*handle the error codes and put the responses in divs more error codes can be seen in the documentation*/
                            else{
                                var error_response="No Result"
                                document.getElementById('result').innerHTML = error_response + '</ul></div>';/***put response result in div****/
                                document.getElementById('otherresult').innerHTML = "" + '</ul></div>';/***put response result in div****/
                            }
                        }
                    });
                }

                /*function to display geocode result*/
                function display_geocode_result(data)
                {
                    details = [];
                    remove_markers();/***********remove existing marker from map**/
                    var result_string = '<div style="padding: 0 12px;color:green;font-size:13px">Best Match</div><div style="font-size: 13px"><ul style="list-style-type:decimal;color:green; padding:2px 2px 0 30px">';
                    var other_result_string = '<div style="padding: 0 12px;color:green;font-size:13px">Others </div><div style="font-size: 13px"><ul style="list-style-type:decimal; padding:2px 2px 0 30px">';
                    var num = 1;
                    var item=data[0];
                    var otheritem=data;

                    /*show the best item data*/
                    if (item!='' && item !=null && item!="undefined" ){

                        var lng = item.lng;
                        var lat = item.lat;
                        var address = item.formatted_address;
                        var pos = new L.LatLng(lat, lng);/***position of marker*****/
                        show_markers(num, pos, address);/**display markers***/
                        var content = new Array();
                        if (item.city != '')
                            content.push('<tr><td style="white-space:nowrap">City</td><td width="10px">:</td><td>' + item.city + '</td></tr>');
                        if (item.district != '')
                            content.push('<tr><td style="white-space:nowrap">District</td><td width="10px">:</td><td>' + item.district + '</td></tr>');
                        if (item.subDistrict != '')
                            content.push('<tr><td style="white-space:nowrap">subDistrict</td><td width="10px">:</td><td>' + item.subDistrict + '</td></tr>');
                        if (item.state != '')
                            content.push('<tr><td style="white-space:nowrap">Area</td><td width="10px">:</td><td>' + item.state + '</td></tr>');
                        if (item.houseName != '')
                            content.push('<tr><td style="white-space:nowrap">House Name</td><td width="10px">:</td><td>' + item.houseName + '</td></tr>');
                        if (item.houseNumber != '')
                            content.push('<tr><td style="white-space:nowrap">House Number</td><td width="10px">:</td><td>' + item.houseNumber + '</td></tr>');
                        if (item.locality != '')
                            content.push('<tr><td style="white-space:nowrap">Locality</td><td width="10px">:</td><td>' + item.locality + '</td></tr>');
                        if (item.subLocality != '')
                            content.push('<tr><td style="white-space:nowrap">SubLocality</td><td width="10px">:</td><td>' + item.subLocality + '</td></tr>');
                        if (item.subSubLocality != '')
                            content.push('<tr><td style="white-space:nowrap">subSubLocality</td><td width="10px">:</td><td>' + item.subSubLocality + '</td></tr>');
                        if (item.pincode != '')
                            content.push('<tr><td style="white-space:nowrap">Pin</td><td width="10px">:</td><td>' + item.pincode + '</td></tr>');
                        if (item.street != '')
                            content.push('<tr><td style="white-space:nowrap">Street</td><td width="10px">:</td><td>' + item.street + '</td></tr>');
                        if (item.poi != '')
                            content.push('<tr><td style="white-space:nowrap">POI</td><td width="10px">:</td><td>' + item.poi + '</td></tr>');
                        
                        if (address != '')
                            content.push('<tr><td style="white-space:nowrap" valign="top">Formatted address</td><td width="10px" valign="top">:</td><td valign="top">' + address + '</td></tr>');
                        details.push(content.join(""));
                        result_string += '<li onclick="show_geocode_details(' + (num++) + ',' + lng + ',' + lat + ')">' + address + '</li>';
                        }
                    else{
                        var error_response="Not Found"
                        document.getElementById('result').innerHTML = error_response + '</ul></div>';/***put response result in div****/   
                    }

                    /*show other item in other result*/
                    var c=0;
                    if (otheritem!='' && otheritem!=null && otheritem!="undefined" && otheritem.length>0){
                            otheritem.forEach(function (item){
                                if (c!=0){
                                other_result_string += '<li onclick="showotherplaces('+"'"+item.place_id+"'"+')">' + item.formatted_address + '</li>';    
                                }
                                c++;
                            });
                    }
                    else{
                        var error_response="Not Found"
                        document.getElementById('otherresult').innerHTML = error_response + '</ul></div>';/***put response result in div****/   
                    }
                   
                    document.getElementById('result').innerHTML = result_string + '</ul></div>';/***put geocode result in div****/
                    document.getElementById('otherresult').innerHTML = other_result_string + '</ul></div>';/***put geocode result in div****/
                    mapmyindia_fit_markers_into_bound(); /***fit map in marker area***/
                }
                var marker = new Array();

                function showotherplaces(place_id){
                    alert("To view this place; access the poi details API with the place_id :"+place_id);
                }
                function show_markers(num, pos, address){
                    var icon_marker = L.divIcon({className: 'my-div-icon', html:"<img style='position:relative;width:35px;height:35px' src="+"'https://maps.mapmyindia.com/images/2.png'>" + '<span style="position: absolute;left:1.5em;right: 1em;top:0.9em;bottom:3.5em; font-size:9px;font-weight:bold;width: 1px; color:black;" class="my-div-span">'+ num +'</span>',  iconSize: [10,10]  ,popupAnchor:[12, -10]});/*creating a div icon*/
                    marker[num] = L.marker(pos, {icon: icon_marker}).addTo(map);
                    show_marker.push(marker[num]);
                }

                function show_geocode_details(num, lng, lat)
                {
                    var pos1 = new L.LatLng(lat, lng);
                    map.setView(pos1, 15);
                    show_info_window(pos1, num - 1, marker[num]);
                }

                /*function to show pop up on marker**/
                function show_info_window(pos, num, marker) {
                    marker.bindPopup("");
                    var popup = marker.getPopup();
                    popup.setContent('<table style=\"width:350px;padding:10px;font-size: 10px;font-type: bold;\">' + details[num] + '</table>').update();
                    marker.openPopup();
                }

                /*function to remove  marker from the map*/
                function remove_markers()
                {
                    for (k = 0; k < show_marker.length; k++) {
                        map.removeLayer(show_marker[k]);/*Remove markers from map*/
                    }
                }

                /*function to fit the maps in the bounds of the marker*/
                function mapmyindia_fit_markers_into_bound()
                {
                    var group = new L.featureGroup(show_marker);
                    map.fitBounds(group.getBounds());
                }
            </script>
    </head>
    <body>
                <div style="border-bottom: 1px solid #e9e9e9;padding:10px 12px;background:#fff;"><span style="font-size: 20px">MapmyIndia Maps API:</span> <span style="font-size:16px;color:#777">Geocoding Example</span></div>
                <div id="menu">
                    <div style="padding: 0 12px 0 17px;line-height:20px"><div style="padding: 5px 0;font-size:13px;color:#222">Enter Location</div>
                        <input type="text" value="rajiv chowk" style="width: 254px; margin-right: 10px;padding:5px;border:1px solid #ddd;color:#555" id="search" placeholder="Address, busines or location" autocomplete="off" autofocus="" onkeypress="if (event.which == 13 || event.keyCode == 13)
                                    get_geocode_result()"/><br/>
                        <button onclick="get_geocode_result()" style="margin-top:10px">Search</button>
                    </div>
                    <!--div to show the best result matching the search-->
                    <div style="border-top: 1px solid #e9e9e9;padding:10px; margin-top: 12px" id="result"></div>
                    <!--div to show the other result-->
                    <div style="border-top: 1px solid #e9e9e9;padding:10px; margin-top: 12px" id="otherresult"></div>
                </div>
                <!--div to show the map-->
                <div id="map-container"></div>
            </body>
</html>