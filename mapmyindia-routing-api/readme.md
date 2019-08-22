![MapmyIndia APIs](https://www.mapmyindia.com/api/img/mapmyindia-api.png)

# MapmyIndia Route / Driving Directions API - beta

**Easy To Integrate Maps & Location APIs & SDKs For Web & Mobile Applications**

Powered with India's most comprehensive and robust mapping functionalities.
**Now Available**  for Srilanka, Nepal, Bhutan and Bangladesh

You can get your api key to be used in this document here: [https://www.mapmyindia.com/api/signup](https://www.mapmyindia.com/api/signup)

## Disclaimer
The document contains sensitive information on parameters and responses that can be accessed only by MapmyIndia.
Redistribution without permissions is prohibited.
It is mandatory to take permissions from the author before sharing with any personnel outside MapmyIndia.

## Document Version History

| Version | Last Updated | Author |
| ---- | ---- | ---- |
| 0.0.2 | May 2019 | MapmyIndia API Team ([KB](https://github.com/kunalbharti)) |
| 0.0.1 | February 2019 | MapmyIndia API Team ([KB](https://github.com/kunalbharti)) |

## API Version History

| Version | Last Updated | Author | Revised Sections |
| ---- | ---- | ---- | ---- |
| 210.17.5221 | 2019-06-07 | MapmyIndia API Team ([PS](https://github.com/map-123)) | “foot” introduced as profile |
| 200.17 | 2019-06-07 | MapmyIndia API Team ([PS](https://github.com/map-123)) | “biking” introduced as profile |
| 200.17 | 2019-05-21 | MapmyIndia API Team ([PS](https://github.com/map-123)) | Data update ver 20.0, CORS enabled, “route_traffic” introduced as resource |
| 191.17 | 2019-02-07 | MapmyIndia API Team ([PS](https://github.com/map-123)) | Data update ver 19.1, Document detailing, “route_eta” introduced as resource |
| 1.3 | 2018-12-24 | MapmyIndia API Team ([PS](https://github.com/map-123)) | Shortest route calculation (Optional) |
| 1.2 | 2018-05-03 | MapmyIndia API Team ([PS](https://github.com/map-123)) | Slip Road issue resolution, Toll Road avoidance enabled |
| 1.1 | 2018-05-03 | MapmyIndia API Team ([PS](https://github.com/map-123)) | Added support for SNBB and other parameters |
| 1.0 | 2018-05-01 | MapmyIndia API Team ([PS](https://github.com/map-123)) | Intial Release |

## Introduction

### Route and Navigation

Routing and displaying driving directions on map, including instructions for navigation, distance to destination, traffic etc. are few of the most important parts of developing a map based application. This REST API calculates driving routes between specified locations including via points based on route calculation type(optimal or shortest).
Supported region (countries) are India, Sri Lanka, Nepal, Bangladesh & Bhutan

## Security Type
- License key based authentication
- IP/domain based whitelisting


## Input Method
GET

## Contructing the request URL

<div class="tablenoborder">
	<table cellpadding="4" cellspacing="0" summary="" id="request-constructing__table-basic-request-elements" frame="hsides" border="1" rules="all">
		<caption>
			<span class="tablecap">
				<span class="table--title-label">Table 1. </span>Requesting a Route
			</span>
		</caption>
		<colgroup>
			<col style="width:28.57142857142857%">
				<col style="width:28.57142857142857%">
					<col style="width:42.857142857142854%">
					</colgroup>
					<thead>
						<tr class="&#39;&#39;">
							<th class="cellrowborder" id="d156249e37">Element</th>
							<th class="cellrowborder" id="d156249e40">Value</th>
							<th class="row-nocellborder" id="d156249e43">Description</th>
						</tr>
					</thead>
					<tbody>
						<tr class="&#39;&#39;">
							<td class="cellrowborder" rowspan="2" headers="d156249e37 ">Base URL</td>
							<td class="cellrowborder" headers="d156249e40 ">
								<code>
									<span class="keyword">https://apis.mapmyindia.com/advancedmaps/v1/</span>
								</code>
							</td>
							<td class="row-nocellborder" headers="d156249e43 ">Production environment</td>
						</tr>
						<tr class="&#39;&#39; override_background">
							</tr>
						<tr class="&#39;&#39; override_background">
							<td class="cellrowborder" headers="d156249e37 ">Authorization</td>
							<td class="cellrowborder" headers="d156249e40 ">
								<code>
									<span class="keyword">"assigned_REST_license_key"</span>
								</code>
							</td>
							<td class="row-nocellborder" headers="d156249e43 ">The REST API license key authorized to access the resource</td>
						</tr>
						<tr class="&#39;&#39; override_background">
							<td class="cellrowborder" rowspan="3" headers="d156249e37 ">Resources</td>
							<td class="cellrowborder" headers="d156249e40 ">
								<code>route_adv</code>
							</td>
							<td class="row-nocellborder" headers="d156249e43 ">to calculate a route & its duration without considering traffic conditions.</td>
						</tr>
						<tr class="&#39;&#39;">
							<td class="cellrowborder" headers="d156249e40 ">
								<code>route_eta</code>	
							</td>
							<td class="row-nocellborder" headers="d156249e43 ">to get the updated duration of a route considering live traffic; Applicable for India only “region=ind” and “rtype=1” is not supported. This is different from <code>route_traffic</code>; since this doesn't search for a route considering traffic, it only applies delays to the default route. 
							</td>
						</tr>
						<tr class="&#39;&#39; override_background">
                        	<td class="cellrowborder" headers="d156249e40 ">
								<code>route_traffic</code>	
							</td>
							<td class="row-nocellborder" headers="d156249e43 ">to search for routes considering live traffic; Applicable for India only “region=ind” and “rtype=1” is not supported 
							</td>
							</tr>
						<tr class="&#39;&#39; override_background">
							<td class="cellrowborder" headers="d156249e37 " rowspan="3">Profile</td>
							<td class="cellrowborder" headers="d156249e40 ">
							    <code>driving</code>
							</td>
							<td class="row-nocellborder" headers="d156249e43 ">Meant for car routing
							</td>
						</tr>
                        <tr class="&#39;&#39; override_background">
							<td class="cellrowborder" headers="d156249e40 ">
							    <code>biking</code>
							</td>
							<td class="row-nocellborder" headers="d156249e43 ">Meant for two-wheeler routing. Routing with this profile is restricted to <code>route_adv</code> only. <code>region</code> & <code>rtype</code>  request parameters are not supported in two-wheeler routing.
							</td>
						</tr>
                        <tr class="&#39;&#39; override_background">
							<td class="cellrowborder" headers="d156249e40 ">
							    <code>foot</code>
							</td>
							<td class="row-nocellborder" headers="d156249e43 ">Meant for pedestrian routing. Routing with this profile is restricted to <code>route_adv</code> only. <code>region</code> & <code>rtype</code>  request parameters are not supported in pedestrian routing.
							</td>
						</tr>
						<tr class="&#39;&#39; override_background">
							<td class="cellrowborder" headers="d156249e37 ">Coordinates</td>
							<td class="cellrowborder" headers="d156249e40 ">
							    <code>
							        "start and destination coordinates"
							    </code>
							</td>
							<td class="row-nocellborder" headers="d156249e43 ">The coordinates pairs on which route is to be calculated. Minumum two pairs needed.
							</td>
						</tr>
					</tbody>
				</table>
			</div>

### Example URL: 
```html
https://apis.mapmyindia.com/advancedmaps/v1/<assigned_license_key>/route_adv/driving/77.131123,28.552413;77.113091,28.544649?
```
where: 
- "route_adv" is the chosen resource.
- profile is "driving"
- "77.131123,28.552413" is the start position.
- "77.113091,28.544649" is the end position of the route.
**Note**: The position input is in decimal degree notation of longitude,latitude.


## Request Parameters

### Mandatory Parameters

The “**bold**” one’s are mandatory, and the “*italic*” one’s are optional.

1.  **`lic_key`**: Allocated REST API license key. (part of URL).
2.  **`coordinates`**: Coordinate is pair of comma separated longitude & latitude value. First coordinate will be consider as start point (**mandatory**); a last coordinate will be considered as end point (**mandatory**) and those in between are via points (*optional*). Example:  {longitude},{latitude};{longitude},{latitude}[;{longitude},{latitude} ...] (part of URL).

### Optional Parameters

1.  *`geometries`*(string): This parameter used to change the route geometry format/density (influences overview and per step). Default value is
	- `polyline` with 5 digit precision; 
	- `polyline6` for 6 digit precision;
	- `geojson` for geometries as geojson.
2.  *`steps`*(boolean): Return route steps for each route leg. Possible values are true/false. By default it will be used as false. <Recommended=false; unless otherwise recommended by MapmyIndia>
3. *`exclude`*(string): Additive list of road classes to avoid, order does not matter. Possible values are `toll`, `motorway` & `ferry`. Multiple values can be sent separated by .
4. *`rtype`* type of route (integer) required for navigation, where values mean:  
	- `0` optimal (default)  
	- `1` shortest (it will calculate route by excluding access penalties like private roads, etc.)
5.  *`region`*(string): This parameter is optional for India; for other countries (Sri Lanka, Nepal, Bangladesh & Bhutan) this parameter is mandatory. Possible values are `ind` (for India, default), `lka` (for Sri Lanka) , `npl` (for Nepal) , `bgd` (for Bangladesh) and `btn` (for Bhutan)
6. *`bearings`*(integer): Limits the search to segments with given bearing in degrees. The referencing will be to the true north and in clockwise direction. (shall be part of premium offering)
7. *`alternatives`* Search for alternative routes. Passing a number:  e.g. alternatives=n searches for up to n alternative routes. Please note that even if alternative routes are requested, a result cannot be guaranteed.
8. *`radiuses`* Limits the search to given radius in meters. For all way-points including start and end points. {radius};{radius}[;{radius} ...]. (shall be part of premium offering).
9. *`overview`*(string): Add overview geometry either `full`, `simplified` according to highest zoom level it could be display on, or not at all. Possible values could be `simplified` (default), `full`, `false`. (shall be part of premium offering)

## Response Parameters

1.	`code`: if request is successful, response is ‘ok’. Else, see the service dependent and general status codes. In case of error, “NoRoute” code is supported (in addition to the general ones) which means “no route found”.
2.	`routes`: An array of route objects, each having potentially multiple via points.
	- `geometry`: returns the whole geometry of the route as per given parameter ‘geometries’ default is encoded ‘polyline’ with 5 digit accuracy for positional coordinates.
	- `legs`: The legs between the given waypoints, representing an array of routes between two waypoints.
		- `steps`: Return route steps for each route leg depending upon steps parameter.
			- `intersections`: A list of Intersection objects<SUP>1</SUP>  that are passed along the segment, the very first belonging to the StepManeuver<SUP>2</SUP>. 
				- `classes`: Categorised types of road segments e.g. Motorway
				- `locations`: longitude, latitude  pair describing the location of the turn.
				- `bearings`: A list of bearing values (e.g. [0,90,180,270]) thxat are available at the intersection. The bearings describe all available roads at the intersection.
				- `entry`: A list of entry flags, corresponding in a 1:1 relationship to the bearings. A value of true indicates that the respective road could be entered on a valid route. false indicates that the turn onto the respective road would violate a restriction.
				- `in`: index into bearings/entry array. Used to calculate the bearing just before the turn. Namely, the clockwise angle from true north to the direction of travel immediately before the maneuver/passing the intersection. Bearings are given relative to the intersection. To get the bearing in the direction of driving, the bearing has to be rotated by a value of 180. The value is not supplied for depart maneuvers.
				- `out`: index into the bearings/entry array. Used to extract the bearing just after the turn. Namely, The clockwise angle from true north to the direction of travel immediately after the maneuver/passing the intersection. The value is not supplied for arrive maneuvers.
				- `lanes`: Array of Lane objects that denote the available turn lanes at the intersection. If no lane information is available for an intersection, the lanes property will not be present.
					- `valid`: verifying lane info.
					- `indications`: Indicating a sign of directions like Straight, Slight Left, Right, etc. To see the complete list of indications, please see [article](https://github.com/MapmyIndia/mapmyindia-rest-api/wiki/indications) in wiki.
			- `driving_side`: “Left” (default) for India, Sri Lanka, Nepal, Bangladesh & Bhutan.
			- `mode`: signifies the mode of transportation; driving as default.
			- `maneuver`: A StepManeuver object representing a maneuver
				- `location`: A [longitude, latitude] pair describing the location of the turn.
				- `bearing_before`: The clockwise angle from true north to the direction of travel immediately before the maneuver.
				- `bearing_after`: The clockwise angle from true north to the direction of travel immediately after the maneuver.
				- `modifier`: An optional string indicating the direction change of the maneuver. To see the complete list of modifiers, please see [article](https://github.com/MapmyIndia/mapmyindia-rest-api/wiki/modifiers) in wiki.
				- `type`: A string indicating the type of maneuver. New identifiers might be introduced without API change. Types unknown to the client should be handled like the ‘turn’ type, the existence of correct modifier values is guaranteed. To see the complete list of types, please see [article](https://github.com/MapmyIndia/mapmyindia-rest-api/wiki/types) in wiki.
			- `distance`: The distance of travel to the subsequent step, in float meters
			- `duration`: The estimated travel time, in float number of seconds
			- `geometry`: The un-simplified geometry of the route segment, depends on the given geometries parameter.
			- `weight`: Parameter for internal use only.
			- `name`: The name of the way along which travel proceeds.
			- `ref`: Highway numbers for the way, if available.
		- `distance`: The distance travelled by the route, in float; unit is meter.
		- `duration`: The estimated travel time, in float; unit is second.
		- `weight_name`: Parameter for internal purpose only.
		- `weight`: Parameter for internal use only.
3.	`waypoints`: Array of Waypoint objects representing all waypoints in order
	- `hint`: Unique internal identifier of the segment (ephemeral, not constant over data updates) This can be used on subsequent request to significantly speed up the query and to connect multiple services. E.g. you can use the hint value obtained by the nearest query as hint values for route inputs.
	- `name`:  Name of the street the coordinate snapped to.
	- `location`: longitude, latitude pair describing the snapped location of the waypoint.
	- `distance`: distance to snapped location from actual location.

### Notes
1. An intersection gives a full representation of any cross-way the path passes bay. For every step, the very first intersection (intersections[0]) corresponds to the location of the StepManeuver. Further intersections are listed for every cross-way until the next turn instruction.
2. An object type representing maneuver.

## Response Type
JSON: response will served as JSON

## Response Codes {as HTTP response code}

- 200: To denote a successful API call.
- 204: DB Connection error.
- 400: Bad Request, User made an error while creating a valid request.
- 401: Unauthorized, Developer’s key is not allowed to send a request.
- 403: Forbidden, Developer’s key has hit its daily/hourly limit or IP or domain not white-listed.
- 404: HTTP not found
- 412: Precondition Failed, i.e. Mandatory parameter is missing
- 500: Internal Server Error, the request caused an error in our systems.
- 503: Service Unavailable, during our maintenance break or server down-times.

## Sample Input

`https://apis.mapmyindia.com/advancedmaps/v1/<lic_key>/route_adv/driving/77.131123,28.552413;77.113091,28.544649?steps=false&rtype=1`

## Sample Response
```json
{
"code": "Ok",
"waypoints": [
	{
		"hint": "bEADgP___39tAAAA6QAAAChAAAB4CAAASdEuQaohRUHInMxEeg6MQwYAAAANAAAArAMAAHwAAADoAAAAiu2YBNCsswFz7ZgE3ayzAQ8AXw3Mm4K5",
		"location": [77.131146,28.5524],
		"name": "Delhi Gurgaon Expressway"
	},
	{
		"hint": "laesgP___3_uAQAABAcAAAAAAAAAAAAAF1xGQsRMAkMAAAAAAAAAADkAAADRAAAAAAAAAAAAAADoAAAAAaeYBIOOswEDp5gEiY6zAQAA3xHMm4K5",
		"location": [77.113089,28.544643],
		"name": "International Airport Road"
	}],
"routes": [
{

	"legs": [
	{
		"steps": [],
		"weight": 2282.2,
		"distance": 2282.3,
		"summary": "",
		"duration": 252.4
	}],
	"weight_name": "distance",
	"geometry": "osgmDutwuMjA~@vEfGx@X~RlXLnAhGbJfHjQzBxDb@jEpAj@nAFt@`A?fAQn@aDbBcAhBmChQ",
	"weight": 2282.2,
	"distance": 2282.3,
	"duration": 252.4
}]
}
```

## Live Demo

[Click Here](https://www.mapmyindia.com/api/advanced-maps/doc/sample/mapmyindia-maps-route-adv-api-example)

## Addendums

### JavaScript Methods

#### [Decoding Geometry](https://github.com/MapmyIndia/mapmyindia-rest-api/wiki/Decoding-Geometry---JavaScript)
This method is utilized for decoding the geometry sent in the response of the Routing API. 
#### [Parsing Instructions](https://github.com/MapmyIndia/mapmyindia-rest-api/wiki/Parsing-Instructions---JavaScript)
This method is utilized for parsing instructions from the Routing API in easy to understand manner for all possible routes offered in the response.
Apart from the JavaScript methods, this method also utilizes the following CSS for providing the corresponding icons for the instructions.
##### [CSS for Instruction Icons](https://github.com/MapmyIndia/mapmyindia-rest-api/wiki/Instruction-Icons---CSS)

For more details, please visit our full documentation.

For any queries and support, please contact: 

![Email](https://www.google.com/a/cpanel/mapmyindia.co.in/images/logo.gif?service=google_gsuite) 
Email us at [apisupport@mapmyindia.com](mailto:apisupport@mapmyindia.com)

![](https://www.mapmyindia.com/api/img/icons/stack-overflow.png)
[Stack Overflow](https://stackoverflow.com/questions/tagged/mapmyindia-api)
Ask a question under the mapmyindia-api

![](https://www.mapmyindia.com/api/img/icons/support.png)
[Support](https://www.mapmyindia.com/api/index.php#f_cont)
Need support? contact us!

![](https://www.mapmyindia.com/api/img/icons/blog.png)
[Blog](http://www.mapmyindia.com/blog/)
Read about the latest updates & customer stories


> © Copyright 2019. CE Info Systems Pvt. Ltd. All Rights Reserved. | [Terms & Conditions](http://www.mapmyindia.com/api/terms-&-conditions)
>  Written with [StackEdit](https://stackedit.io/) by MapmyIndia.