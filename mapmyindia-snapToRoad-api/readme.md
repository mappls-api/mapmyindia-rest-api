![MapmyIndia APIs](https://www.mapmyindia.com/api/img/mapmyindia-api.png)

# MapmyIndia Snap To Road API

**Easy To Integrate Maps & Location APIs & SDKs For Web & Mobile Applications**

Powered with India's most comprehensive and robust mapping functionalities.
## Global Coverage Now Available !

Snap to Road API is **Now Available**  for [238 countries](https://github.com/MapmyIndia/mapmyindia-rest-api/blob/master/docs/countryISO.md) across the world.

You can get your api key to be used in this document here: [https://www.mapmyindia.com/api/](https://www.mapmyindia.com/api/)

## Disclaimer
The document contains sensitive information on parameters and responses that can be accessed only by MapmyIndia.
Redistribution without permissions is prohibited.
It is mandatory to take permissions from the author before sharing with any personnel outside MapmyIndia.

## Document Version History

| Version | Last Updated | Author |
| ---- | ---- | ---- |
| 0.0.2 | July 2021 | MapmyIndia API Team ([KB](https://github.com/kunalbharti)) |
| 0.0.1 | February 2019 | MapmyIndia API Team ([KB](https://github.com/kunalbharti)) |

## API Version History

| Version | Last Updated | Author | Revised Sections |
| ---- | ---- | ---- | ---- |
| 270.19 | 2021-07-13 | MapmyIndia API Team ([PS](https://github.com/map-123)) | [Global](https://github.com/MapmyIndia/mapmyindia-rest-api/blob/master/docs/countryISO.md) support added. |
| 191.17 | 2019-02-07 | MapmyIndia API Team ([PS](https://github.com/map-123)) | Data update to V19.1; Added support for SNBB |
| 1.0 | 2018-06-07 | MapmyIndia API Team ([PS](https://github.com/map-123)) | Initial release |


## Introduction

### Route and Navigation

Snap-To-Road API, snaps given GPS points to the road network in the most plausible way. Maximum number of points are limited to 100 only. Snap to Road API is supported for [238 countries](https://github.com/MapmyIndia/mapmyindia-rest-api/blob/master/docs/countryISO.md) via the region parameter.

#### Note
1. The request might result multiple sub-traces. 
2. Large jumps in the timestamps (> 60s) or improbable transitions lead to trace splits if a complete matching could not be found. 
3. The algorithm might not be able to match all points. Outliers are removed if they cannot be matched successfully. 

## Security Type
- License key based authentication
- IP/domain based whitelisting


## Input Method
GET / POST

## Constructing the request URL

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
							<td class="cellrowborder" headers="d156249e37 ">Resource</td>
							<td class="cellrowborder" headers="d156249e40 ">
							    <code>snapToRoad</code>
							</td>
							<td class="row-nocellborder" headers="d156249e43 ">For Map-matching: snapping the geo-coordinates to road network
							</td>
						</tr>
					</tbody>
				</table>
			</div>

<br>

### Important Note
1. When using POST method, the parameters are sent with `Content-Type` as `application/x-www-form-urlencoded`.


### Example using GET
```json
https://apis.mapmyindia.com/advancedmaps/v1/{rest-api-key}/snapToRoad?pts=78.40573,17.37317;78.40958,17.37314;78.41845,17.37449;78.409992,17.37328;78.420460,17.377443;78.421350,17.380200&timestamps=1527056019;1527056020;1527056021;1527056022;1527056023;1527056024
```

### Example using POST
```c
curl --location --request POST 'https://apis.mapmyindia.com/advancedmaps/v1/{rest-api-key}/snapToRoad' \
--header 'Content-Type: application/x-www-form-urlencoded' \
--data-urlencode 'pts=78.40573,17.37317;78.40958,17.37314;78.41845,17.37449;78.409992,17.37328;78.420460,17.377443;78.421350,17.380200' \
--data-urlencode 'timestamps=1527056019;1527056020;1527056021;1527056022;1527056023;1527056024' \
--data-urlencode 'geometries=polyline' \
--data-urlencode 'radiuses=50;50;50;50;50;50'
```

**Note**: The position input is in decimal degree notation of longitude,latitude.


## Request Parameters

### Mandatory Parameters

The “**bold**” one’s are mandatory, and the “*italic*” one’s are optional.

1.  **`lic_key`**: Allocated REST API license key. (part of URL).
2.  **`pts`**: Coordinate is pair of comma separated longitude & latitude value, First coordinate will be consider as start point; a last coordinate will be as end points and between are via points; like {longitude},{latitude};{longitude},{latitude}[;{longitude},{latitude} ...]. 
At present maximum number of points are limited to 100 in a single request. 
For example 77.983936,28.255904;77.05993,28.487555.

### Optional Parameters

1. *`timestamps`*: Timestamps for the input locations in seconds since UNIX epoch. Timestamps need to be monotonically increasing. Values must be integer {timestamp};{timestamp};{timestamp} ...
2.  *`geometries`*: This parameter used to change the route geometry format/density (influences overview and per step). Default value is `polyline` with 5 digit precision; `polyline6` for 6digit precision; `geojson` for geometries as geojson. **Please note that “timestamps” parameter is mandatory for enabling geometries**
3. *`radiuses`*: Standard deviation of GPS precision used for map matching. If available use GPS accuracy in meters. Default value is `5` metres. Values must be integer {radius};{radius};{radius} ...
4. *`region`*: This parameter is optional for India; for other countries (such as Sri Lanka, Nepal, Bangladesh, Bhutan + many more) this parameter is mandatory. Possible values are listed in a table [here](https://github.com/MapmyIndia/mapmyindia-rest-api/blob/master/docs/countryISO.md).

## Response Type
JSON: response will served as JSON


## Response Parameters

1.	`responseCode`: See the service dependent and general status codes.
2.	`version`: API’s version information.
3.	`results`: array of results, each consisting of the following parameters:
	- `snappedPoints`: Array of Waypoint objects representing all points of the trace in order. If the trace point was omitted by map matching because it is an outlier, the entry will be null. Each Waypoint object has the following additional properties.
		- `location`: Location of Matched point (Longitude, Latitude)
		- `distance`: Distance from the snapped point.
		- `waypoint_index`: Index of the waypoint inside the matched route.
	- `matchings`: An array of Route objects that assemble the trace.
		- `geometry`: Returns the whole geometry of the route as per given parameter ‘geometries’ default is encoded ‘polyline’ with 5 digit accuracy for positional coordinates.


## Response Codes {as HTTP response code}

- 200: To denote a successful API call.
- 400: Bad Request, User made an error while creating a valid request.
- 401: Unauthorized, Developer’s key is not allowed to send a request.
- 403: Forbidden, Developer’s key has hit its daily/hourly limit or IP or domain not white-listed.
- 404: HTTP not found
- 407: Server Authentication failure
- 408: Request Timeout
- 412: Precondition Failed, i.e. Mandatory parameter is missing
- 500: Internal Server Error, the request caused an error in our systems.
- 503: Service Unavailable, during our maintenance break or server down-times.

## Sample Input

`https://apis.mapmyindia.com/advancedmaps/v1/<lic_key>/snapToRoad?pts=78.40573,17.37317;78.40958,17.37314;78.41845,17.37449;78.409992,17.37328;78.420460,17.377443;78.421350,17.380200&timestamps=1527056019;1527056020;1527056021;1527056022;1527056023;1527056024`

## Sample Response
```json
{
    "responseCode": 200,
    "version": "220.19.522",
    "results": {
        "snappedPoints": [
            {
                "location": [
                    78.40573,
                    17.373168
                ],
                "distance": 0.221335,
                "waypoint_index": 0
            },
            {
                "location": [
                    78.40958,
                    17.373151
                ],
                "distance": 1.217342,
                "waypoint_index": 1
            },
            null,
            null,
            {
                "location": [
                    78.420424,
                    17.377454
                ],
                "distance": 4.014843,
                "waypoint_index": 2
            },
            {
                "location": [
                    78.421362,
                    17.380197
                ],
                "distance": 1.317787,
                "waypoint_index": 3
            }
        ],
        "matchings": [
            {
                "geometry": "ie`iByrp}MN{HKeMXmOKuGq@}JaBaHaDmIgB{BuDcCuGeBeP{D"
            }
        ]
    }
}
```

## Live Demo

[Snap To Road API](https://www.mapmyindia.com/api/advanced-maps/doc/sample/mapmyindia-maps-snaptoroad-example)

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