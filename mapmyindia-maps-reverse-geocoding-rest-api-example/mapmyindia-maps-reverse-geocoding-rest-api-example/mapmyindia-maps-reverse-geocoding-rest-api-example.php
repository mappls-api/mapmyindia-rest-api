
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <head>
        <title>MapmyIndia Maps API: Reverse Geocoding Example</title>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
            <link rel="icon" href="http://mapmyindia.com/images/favicon.ico" type="image/x-icon">
            <script type="text/javascript" src="/MmiApiDemos/js/jquery.min.js"></script>
            <!--put your map api javascript url with key here-->
            <script src="https://apis.mapmyindia.com/advancedmaps/v1/<js_lic_key>/map_load?v=0.1"></script>
            <style type="text/css">
                /*map css **/
                body,html { height: 100%;font-family:Verdana,sans-serif, Arial;color:#555;margin: 0; font-size:12px; padding: 0; background:#fafafa}
                #map-container {position: absolute;left: 312px; top: 46px;right: 2px; bottom: 2px;border: 1px solid #cccccc; }
                #menu {position: absolute;left: 2px; top: 46px;width: 306px;bottom: 2px;border: 1px solid #cccccc;background-color: #FAFAFA;overflow-x:hidden;overflow-y: auto;}
            </style>
            <script>
                var lng = 77.22945570945740;
                var lat = 28.6129602407977;
                var url_result;
                var marker;
                /*put your REST API URL with key here**/
                var rev_geocode_api_url="http://apis.mapmyindia.com/advancedmaps/v1/<rest_lic_key>/rev_geocode?";

                window.onload = function () {
                    document.getElementById('lat').value = lat;
                    document.getElementById('lan').value = lng;
                    var centre = new L.LatLng(lat,lng);
                    map=new MapmyIndia.Map('map-container',{center:centre,zoomControl: true,hybrid:true });
                        /*1.create a MapmyIndia Map by simply calling new MapmyIndia.Map() and passsing it at the minimum div object, all others are optional...
                        2.all leaflet mapping functions can be called simply on the L object
                        3.MapmyIndia may extend and in future modify the customised/forked Leaflet object to enhance mapping functionality for developers, which will be clearly documented in the MapmyIndia API documentation section.*/
                    marker = L.marker(centre, {draggable: 'true'}).addTo(map);/*add marker at center position*/
                    var rev_geocode_api_url_with_param = rev_geocode_api_url+"lng=" + lng + "&lat=" + lat;
                    getUrlResult(rev_geocode_api_url_with_param);/***get revgeocode result corresponding to the position***/
                    marker.bindPopup(url_result, {closeButton: true, autopan: true, zoomAnimation: true}).openPopup();
                    
                    /***get revgeocode result corresponding to the position after drag***/
                    marker.on('dragend', function (event) {
                        var position = event.target.getLatLng();
                        rev_geocode_api_url_with_param = rev_geocode_api_url+"lng=" + position.lng + "&lat=" + position.lat;
                        getUrlResult(rev_geocode_api_url_with_param);/*get JSON resp*/
                        var popup = marker.getPopup();
                        popup.setContent(url_result).update()
                        marker.openPopup();
                        document.getElementById('lat').value = position.lat;/***set div elements values***/
                        document.getElementById('lan').value = position.lng;
                        
                    });
                    //map events
                    map.on('dblclick',function(e){
                        document.getElementById('otherresult').innerHTML="Lat Lng of clicked  position: "+e.latlng.lat+","+e.latlng.lng;
                    });
                };

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
                                    display_rev_geocode_result(jsondata.results[0]);
                                    
                            }
                            /*handle the error codes and put the responses in divs. more error codes can be viewed in the documentation*/
                            else{
                               document.getElementById('result').innerHTML="No Result found" ;
                            }
                        }
                    });
                }

                /*function to display revgeocode result*/
                function display_rev_geocode_result(data)
                 {          
                 var content = new Array();               
                 if(data.city!='') content.push('<tr><td style="white-space:nowrap;color:#222">City</td><td width="10px">:</td><td>'+data.city+'</td></tr>');
                 if(data.district!='') content.push('<tr><td style="white-space:nowrap;color:#222">District</td><td width="10px">:</td><td>'+data.district+'</td></tr>');
                 if(data.state!='') content.push('<tr><td style="white-space:nowrap;color:#222">state</td><td width="10px">:</td><td>'+data.state+'</td></tr>');
                 if(data.pincode!='') content.push('<tr><td style="white-space:nowrap;color:#222">Pin</td><td width="10px">:</td><td>'+data.pincode+'</td></tr>');
                 if(data.street!='') content.push('<tr><td style="white-space:nowrap;color:#222">Street</td><td width="10px">:</td><td>'+data.street+'</td></tr>');
                 if(data.houseNumber!='') content.push('<tr><td style="white-space:nowrap;color:#222">House No.</td><td width="10px">:</td><td>'+data.houseNumber+'</td></tr>');

                 if(data.houseName!='') content.push('<tr><td style="white-space:nowrap;color:#222">House Name</td><td width="10px">:</td><td>'+data.houseName+'</td></tr>');
                 if(data.locality!='') content.push('<tr><td style="white-space:nowrap;color:#222">Locality</td><td width="10px">:</td><td>'+data.locality+'</td></tr>');
                 if(data.subSubLocality!='') content.push('<tr><td style="white-space:nowrap;color:#222">subSubLocality</td><td width="10px">:</td><td>'+data.subSubLocality+'</td></tr>');
                 if(data.poi!='') content.push('<tr><td style="white-space:nowrap;color:#222">Poi</td><td width="10px">:</td><td>'+data.poi+'</td></tr>');
                 if(data.poi_dist!='') content.push('<tr><td style="white-space:nowrap;color:#222">Poi_dist</td><td width="10px">:</td><td>'+data.poi_dist+'</td></tr>');
                 if(data.street_dist!='') content.push('<tr><td style="white-space:nowrap;color:#222">street_dist</td><td width="10px">:</td><td>'+data.street_dist+'</td></tr>');
                 if(data.village!='') content.push('<tr><td style="white-space:nowrap;color:#222">Village</td><td width="10px">:</td><td>'+data.village+'</td></tr>');
                 if(data.formatted_address!='') content.push('<tr><td style="white-space:nowrap;color:#222" valign="top">Formatted address</td><td width="10px" valign="top">:</td><td valign="top">'+data.formatted_address+'</td></tr>');
                 if(content=="") content.push('<br>No details found for this place!!<br>');

                 info_content= '<table style=\"width:306px;padding:10px;font-size: 12px;font-type: bold;\">'+content.join("")+'</table>';
                 url_result=info_content;
                 document.getElementById('result').innerHTML=info_content;/*update the result div*/
                 document.getElementById('otherresult').innerHTML='';/*update the result div*/
                 }

                 /*function to get geocode result corresponding to lat, lng*/
                function get_rev_geocode_result(search_lat,search_lng,st)
                {
                    lat=search_lat;lng=search_lng;
                    document.getElementById('result').innerHTML='Loading...';
                    var rev_geocode_api_url_with_param = rev_geocode_api_url+"&lng=" + lng + "&lat=" + lat;
                    getUrlResult(rev_geocode_api_url_with_param);
                    marker.setLatLng([lat,lng]).update();

                    var popup = marker.getPopup();
                    popup.setContent(url_result).update();
                    marker.openPopup();
                    map.setView([lat,lng]);
                    document.getElementById('lat').value = lat;   /***set div elements values**/
                    document.getElementById('lan').value = lng;
                }
            </script>
    </head>
    <!--html portion---->
    <body>
        <div style="border-bottom: 1px solid #e9e9e9;padding:10px 12px;background:#fff;"><span style="font-size: 20px">MapmyIndia Maps API:</span> <span style="font-size:16px;color:#777">Reverse Geocoding Example</span></div>
        <div id="menu">
            <div style="padding: 0 12px 0 12px"> <div style="padding: 5px 0;font-size:13px;color:#222">Enter Latitude</div>
                <input type="text" style="width: 254px; margin-right: 10px;padding:5px;border:1px solid #ddd;color:#555" id="lat" placeholder="Latitude" autocomplete="off" autofocus="" /><br/>
                <div style="padding: 5px 0;font-size:13px;color:#222">Enter Longitude</div>
                <input type="text" style="width: 254px; margin-right: 10px;padding:5px;border:1px solid #ddd;color:#555" id="lan" placeholder="longitude" autocomplete="off" autofocus="" />
                <br/><br/><button onclick="get_rev_geocode_result(document.getElementById('lat').value, document.getElementById('lan').value, 'search')">Search</button>
            </div>
            <div style="margin-top: 20px">
                <ul style=" line-height: 20px; font-size: 12px;">
                    <li>Drag marker to get your desired location</li>
                    <li>Double click anywhere on the map</li>
                </ul>
            </div>
            <div style="border-top: 1px solid #e9e9e9;margin-top: 20px;padding: 10px 10px 5px 17px;font-size: 13px;">Search Result</div>
            <div id="result" style="border-bottom: 1px solid #e9e9e9;">loading..</div>
            <div id="otherresult" style="border-bottom: 1px solid #e9e9e9;"></div>
            
        </div>
        <div id="map-container"></div>
    </body>
</html>