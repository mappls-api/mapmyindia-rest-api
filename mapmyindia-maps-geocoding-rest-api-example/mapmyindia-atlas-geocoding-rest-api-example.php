<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <head>
        <title>MapmyIndia Maps API: Address Search Example</title>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
        <link rel="icon" href="http://mapmyindia.com/images/favicon.ico" type="image/x-icon"/>
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
        <script src="https://apis.mapmyindia.com/advancedmaps/v1/<Enter your map key>/map_load?v=1.2"></script>
    </head>

    <body>
        <div style="border-bottom: 1px solid #e9e9e9;padding:10px 12px;background:#fff;">
            <span style="font-size: 20px">MapmyIndia Maps API:</span>
            <span style="font-size:16px;color:#777">Atlas Geocode Example</span>
        </div>
        <div id="menu">
            <div style="padding: 0 12px 0 17px;line-height:20px">
                <div style="padding: 5px 0;font-size:13px;color:#222">Enter Address:</div>

                <input type="text" 
                       value="237, okhla industrial estate new delhi 110020" 
                       style="width: 254px; margin-right: 10px;padding:5px;border:1px solid #ddd;color:#555"
                       id="search" 
                       placeholder="address" 
                       autocomplete="off" 
                       autofocus="" 
                       onkeypress="if (event.which == 13 || event.keyCode == 13)
                                   get_geocode_result()"/><br/>


                <div style="margin-top:10px;font-size:13px;color:#222">Result Items: 
                    <input type="number" name="itemCount" id="itemcount" min="1" max="10" value = "1" title  = "Default is 1 maximum 10 items.">
                </div>

                <div style="float: right;position: relative;margin: -32px 12px 29px 3px;">
                    <button onclick="get_geocode_result()" style="margin-top:10px;cursor: pointer;">Geocode</button>
                    <div style="color:red;left: 205px;position: relative;bottom: 21px;display:none" id="loader">Loading...</div>
                </div>
            </div>

            <!--div to show the best result matching the search-->
            <div style="border-top: 1px solid #e9e9e9;padding:10px; margin-top: 12px" id="result"></div>

            <!--div to show the other result-->
            <div style="border-top: 1px solid #e9e9e9;padding:10px; margin-top: 12px" id="otherresult"></div>
        </div>
        <!--div to show the map-->
        <div id="map-container"></div>
    </body>
    <script type="text/javascript">
        var lng = 77.229455;
        var lat = 28.612960;
        var url_result;
        var all_result = [];
        var markerGroup = new Array();
        var markers = new Array();
        var map;
        var fieldList = ["eLoc", "geocodeLevel", "houseNumber", "houseName", "poi", "street", "subSubLocality", "subLocality", "locality", "subDistrict",
            "district", "city", "state", "pincode", "formattedAddress"];
        var labelList = ["eLoc", "Geocode Level", "House Number", "House Name", "POI", "Street", "Sub Sub Locality", "Sub Locality", "Locality", "Sub District",
            "District", "City", "State", "Pincode", "Address"];
        /*
         1.Create a MapmyIndia Map by simply calling new MapmyIndia.Map() and passsing it at the minimum div object, all others are optional...
         2.All leaflet mapping functions can be called simply on the L object
         3.MapmyIndia may extend and in future modify the customised/forked Leaflet object to enhance mapping functionality for developers,
         which will be clearly documented in the MapmyIndia API documentation section.
         */
        window.onload = function () {
            var centre = new L.LatLng(lat, lng);
            map = new MapmyIndia.Map('map-container', {center: centre, zoomControl: true, hybrid: true});
            get_geocode_result();
        };
        /*function to get geocode result from the url*/
        function get_geocode_result() {
            var search_id = document.getElementById('search');
            var itemCount = parseInt(document.getElementById('itemcount').value);
            var address = search_id.value;
            if (address !== undefined && address.trim().length === 0) {
                alert("Please enter address.");
                search_id.focus();
                return false;
            }
            if (!validateInput(itemCount)) {
                alert("Item count can be between 1 and 10.");
                document.getElementById('itemcount').focus();
                return false;
            }
            document.getElementById('result').innerHTML = '<div style="padding: 0 12px; color: #777">Loading..</div>'; /*update best result */
            document.getElementById('otherresult').innerHTML = '<div style="padding: 0 12px; color: #777">Loading..</div>'; /*update other result */
            getUrlResult(address, itemCount); /*get JSON resp*/
        }

        function validateInput(input) {
            var flag = true;
            if (input < 1 || input > 10) {
                flag = false;
            }
            return flag;
        }

        /*function to get Json response from the url*/
        function getUrlResult(address, itemCount) {
            $.ajax({
                type: "GET",
                dataType: 'text',
                url: "getResponseGeocode.php",
                async: false,
                data: {
                    address: address,
                    itemCount: itemCount
                },
                success: function (result) {
                    if (result !== undefined) {
                        var resdata = JSON.parse(result);
                        var copResults;
                        if (resdata.status === 'success') {
                            var jsondata = JSON.parse(resdata.data);
                            copResults = jsondata.copResults;
                            if (!Array.isArray(copResults)) {
                                copResults = Array.from(Object.keys(jsondata), k => jsondata[k])
                            }
                            if (copResults.length > 0) {
                                display_geocode_result(copResults); /*display results on success*/
                            }
                        } else {
                            hideLoader();
                            var error_response = "No result."
                            document.getElementById('result').innerHTML = error_response + '</ul></div>'; /***put response result in div****/
                            document.getElementById('otherresult').innerHTML = "" + '</ul></div>'; /***put response result in div****/
                        }
                    } else {
                        /*handle the error codes and put the responses in divs more error codes can be seen in the documentation*/
                        var error_response = "No result."
                        document.getElementById('result').innerHTML = error_response + '</ul></div>'; /***put response result in div****/
                        document.getElementById('otherresult').innerHTML = "" + '</ul></div>'; /***put response result in div****/
                    }
                }
            });
        }
        /*function to display geocode result*/
        function display_geocode_result(data) {

            details = [];
            /***********remove existing marker from map***********/
            remove_markers();
            var result_string = '<div style="padding: 0 12px;color:green;font-size:13px">Best Match</div><div style="font-size: 13px"><ul style="list-style-type:decimal;color:green; padding:2px 2px 0 30px">';
            var other_result_string = '<div style="padding: 0 12px;color:green;font-size:13px">Others</div><div style="font-size: 13px"><ul style="list-style-type:decimal; padding:2px 2px 0 30px">';
            var num = 1;
            var item = data[0];
            var otheritem = data;
            /*show the best item data*/
            if (item !== '' && item !== null && item !== "undefined") {
                var lng = item.longitude;
                var lat = item.latitude;
                var address = item.formattedAddress;
                var pos = new L.LatLng(lat, lng); /***position of marker*****/
                show_markers(num, pos, address); /**display markers***/


                details.push(createPopupContent(item));

                result_string += '<li onclick="show_geocode_details(' + (num++) + ',' + lng + ',' + lat + ')">' + address + '</li>';
            } else {
                var error_response = "Not found."
                document.getElementById('result').innerHTML = error_response + '</ul></div>'; /***put response result in div***/
            }

            /*show other item in other result*/
            var c = 0;
            if (otheritem !== '' && otheritem !== null && otheritem !== "undefined" && otheritem.length > 0) {
                otheritem.forEach(function (item) {
                    if (c !== 0) {
                        other_result_string += '<li onclick="showotherplaces(' + "'" + item.eLoc + "'" + ')">' + item.formattedAddress + '</li>';
                    }
                    c++;
                });
            } else {
                var error_response = "Not found."
                document.getElementById('otherresult').innerHTML = error_response + '</ul></div>'; /***put response result in div***/
            }
            document.getElementById('result').innerHTML = result_string + '</ul></div>'; /***put geocode result in div***/
            document.getElementById('otherresult').innerHTML = "";
            if (c > 1) {
                document.getElementById('otherresult').innerHTML = other_result_string + '</ul></div>'; /***put geocode result in div***/
            }


            mapmyindia_fit_markers_into_bound(); /***fit map in marker area***/
        }

        function createPopupContent(item) {
            var content = new Array();
            for (var i = 0; i < fieldList.length; i++) {
                if (item[fieldList[i]] !== "") {
                    content.push("<tr><th style='white-space:nowrap;vertical-align: top;text-align: left;'>");
                    content.push(labelList[i]);
                    content.push("</th><th style='width:5px;vertical-align: top;text-align: left;'>:</th><td>");
                    content.push(item[fieldList[i]].trim().split(";")[0]);
                    content.push("</td></tr>");
                }
            }
            return content.join("");
        }

        function showotherplaces(place_id) {
            alert("To view this place, please access 'POI Details API' with the eloc: " + place_id);
        }

        function show_markers(num, pos) {
            var icon_marker = L.divIcon({
                className: 'my-div-icon',
                html: "<img style='position:relative;' \n\
                                             src=" + "'https://maps.mapmyindia.com/images/2.png'>" + '<span style="position: absolute;left:1.6em;right:\n\
                                             1em;top:1.4em;bottom:3.5em; font-size:9px;font-weight:bold;width: 1px; color:black;" class="my-div-span">' + num + '</span>',
                iconSize: [10, 10],
                popupAnchor: [12, -10]
            }); /*creating a div icon*/

            markers[num] = L.marker(pos, {icon: icon_marker}).addTo(map);
            map.setView(pos, 12);
            markerGroup.push(markers[num]);
        }

        function show_geocode_details(num, lng, lat) {
            show_info_window(num - 1, markers[num]);
        }

        /*function to show pop up on marker**/
        function show_info_window(num, marker) {
            marker.bindPopup("");
            var popup = marker.getPopup();
            popup.setContent('<table style="line-height:14px" cellspacing="5">' + details[num] + '</table>').update();
            marker.openPopup();
        }

        /*function to remove  marker from the map*/
        function remove_markers() {
            for (k = 0; k < markerGroup.length; k++) {
                map.removeLayer(markerGroup[k]); /*Remove markers from map*/
            }
        }

        /*function to fit the maps in the bounds of the marker*/
        function mapmyindia_fit_markers_into_bound() {
            var group = new L.featureGroup(markerGroup);
            map.fitBounds(group.getBounds());
        }

        function hideLoader() {
            $("#loader").hide();
        }

        function showLoader() {
            $("#loader").show();
        }

    </script>
</html>