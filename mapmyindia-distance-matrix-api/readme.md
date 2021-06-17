![MapmyIndia APIs](https://www.mapmyindia.com/api/img/mapmyindia-api.png)

# MapmyIndia Driving Distance - Time Matrix API

**Easy To Integrate Maps & Location APIs & SDKs For Web & Mobile Applications**

Powered with India's most comprehensive and robust mapping functionalities.
**Now Available**  for Srilanka, Nepal, Bhutan and Bangladesh

You can get your api key to be used in this document here: [https://www.mapmyindia.com/api/](https://www.mapmyindia.com/api/)


## Document Version History

| Version | Last Updated | Author |
| ---- | ---- | ---- |
| 0.0.4 | December 2020 | MapmyIndia API Team ([KB](https://github.com/kunalbharti)) |
| 0.0.3 | December 2019 | MapmyIndia API Team ([KB](https://github.com/kunalbharti)) |
| 0.0.2 | May 2019 | MapmyIndia API Team ([KB](https://github.com/kunalbharti)) |
| 0.0.1 | February 2019 | MapmyIndia API Team ([KB](https://github.com/kunalbharti)) |

## API Version History

| Version | Last Updated | Author | Revised Sections |
| ---- | ---- | ---- | ---- |
| 250.19.5222 | 2020-12-15 | MapmyIndia API Team ([PS](https://github.com/map-123)) | eLoc support released |
| 220.19.522 | 2019-12-19 | MapmyIndia API Team ([PS](https://github.com/map-123)) | Data update ver 22.0, Many to Many distance matrix released |
| 200.17 | 2018-05-21 | MapmyIndia API Team ([PS](https://github.com/map-123)) | Data update ver 20.0, CORS enabled, “distance_matrix_traffic” introduced as resource |
| 191.17 | 2018-02-07 | MapmyIndia API Team ([PS](https://github.com/map-123)) | Initial release |


## Introduction

### Driving Distance-Time Matrix

Adding driving directions API would help to add predicted travel time & duration from a given origin point to a number of points. This REST API computes the distance and duration of a route between a source/primary position (geographical coordinates) and a list of all supplied secondary positions using to mode of route calculation i.e. optimal and shortest.
Supported region (countries) are India, Sri Lanka, Nepal, Bangladesh & Bhutan. Please note that maximum number of points are limited to 100 only including source and secondary positions.

## Security Type
- License key based authentication
- IP/domain based whitelisting


## Input Method
GET

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
							<td class="cellrowborder" rowspan="3" headers="d156249e37 ">Resources</td>
							<td class="cellrowborder" headers="d156249e40 ">
								<code>distance_matrix</code>
							</td>
							<td class="row-nocellborder" headers="d156249e43 ">to calculate the route & duration without considering traffic conditions.</td>
						</tr>
						<tr class="&#39;&#39;">
							<td class="cellrowborder" headers="d156249e40 ">
								<code>distance_matrix_eta</code>	
							</td>
							<td class="row-nocellborder" headers="d156249e43 ">to get the updated duration  considering live traffic; Applicable for India only “region=ind” and “rtype=1” is not supported. This is different from <code>distance_matrix_traffic</code>; since this doesn't search for a route considering traffic, it only applies delays to the default route. 
							</td>
						</tr>
						<tr class="&#39;&#39;">
							<td class="cellrowborder" headers="d156249e40 ">
								<code>distance_matrix_traffic</code>	
							</td>
							<td class="row-nocellborder" headers="d156249e43 ">to search for routes considering live traffic; Applicable for India only “region=ind” and “rtype=1” is not supported 
							</td>
						</tr>
						<tr class="&#39;&#39; override_background">
							</tr>
						<tr class="&#39;&#39; override_background">
							<td class="cellrowborder" headers="d156249e37" rowspan="3" >Profile</td>
							<td class="cellrowborder" headers="d156249e40 ">
							    <code>driving</code>
							</td>
							<td class="row-nocellborder" headers="d156249e43 ">Meant for car routing
							</td>
						</tr>
						<tr class="&#39;&#39;">
							<td class="cellrowborder" headers="d156249e40 ">
								<code>biking</code>	
							</td>
							<td class="row-nocellborder" headers="d156249e43 ">Meant for two-wheeler routing. Distance calculation with this profile is restricted to <code>distance_matrix</code> resource only. <code>region</code> & <code>rtype</code> request parameters are not supported in two-wheeler routing. 
							</td>
						</tr>
						<tr class="&#39;&#39;">
							<td class="cellrowborder" headers="d156249e40 ">
								<code>trucking</code>	
							</td>
							<td class="row-nocellborder" headers="d156249e43 ">Meant for truck routing. Distance calculation with this profile is restricted to <code>distance_matrix</code> resource only. <code>region</code> & <code>rtype</code> request parameters are not supported in truck routing. 
							</td>
						</tr>
						<tr class="&#39;&#39; override_background">
							<td class="cellrowborder" headers="d156249e37 ">Coordinates</td>
							<td class="cellrowborder" headers="d156249e40 ">
							    <code>
							        "start and secondary coordinates"
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
https://apis.mapmyindia.com/advancedmaps/v1/<assigned_license_key>/distance_matrix/driving/77.983936,28.255904;77.05993,28.487555;17ZUL7?
```
where: 
- "distance_matrix" is the chosen resource.
- profile is "driving"
- "77.983936,28.255904" & other similar parts after it are the positions.

**Note**: The position input is in decimal degree notation of longitude,latitude.


## Request Parameters

### Mandatory Parameters

The “**bold**” one’s are mandatory, and the “*italic*” one’s are optional.

1.  **`lic_key`**: Allocated REST API license key. (part of URL).
2.  **`source`**: The first location is either 
	- a pair of comma separated longitude & latitude value OR
	- an eLoc

	which is taken as the source from which distance and ETA is to be calculated for the other locations specified in the rest of the ‘secondary_locations’ (part of URL).
3. **`secondary_locations`**: The geopositions of _rest of the locations_ whose distance from source will be calculated (part of URL). 
Format for each geoposition is the same as for the source, and they are semi-colon “;” delimited. 
For example `77.983936,28.255904;77.05993,28.487555` OR `mmi000`.

### Optional Parameters

1. *`rtype`* type of route (integer) required for navigation, where values mean:  
	- `0` optimal (default)  
	- `1` shortest (it will calculate route by excluding access penalties like private roads, etc.)
2.  *`region`*(string): This parameter is optional for India; for other countries (Sri Lanka, Nepal, Bangladesh & Bhutan) this parameter is mandatory. Possible values are `ind` (for India, default), `lka` (for Sri Lanka) , `npl` (for Nepal) , `bgd` (for Bangladesh), `mmr` (for Myanmar) and `btn` (for Bhutan)

### Parameters for Many-to-Many Distance Matrix
#### Important Note

1. *`sources`*: (integers) To specify which of the coordinates supplied in the URL are to be treated as *source* position for many to many distance matrix calculation, indicate that coordinate pair's index. E.g. 0;1 means that 0<sup>th</sup> and 1<sup>st</sup> coordinate pairs are source points.
Default value is `0`. The indexes must be semi-colon separated. e.g: 0;1;2;...
2.  *`destinations`*: (integers) To specify which of the coordinates supplied in the URL are to be treated as *destination* position for many to many distance matrix calculation, indicate that coordinate pair's index. E.g. 2;3 means that 0<sup>th</sup> and 1<sup>st</sup> coordinate pairs are destination points.
Default value is `all`. The indexes must be semi-colon separated. e.g: 3;4;5;...


## Response Type
JSON: response will served as JSON


## Response Parameters

1.	`responseCode`: See the service dependent and general status codes.
2.	`version`: API’s version information.
3.	`results`: array of results, each consisting of the following parameters:
	- `code`: if the request was successful, code is ok.
	- `durations`: Duration in seconds for source to source (default 0), 1st, 2nd, 3rd secondary locations... from source.
	- `distances`: Distance in meters for source to source (default 0), 1st, 2nd, 3rd secondary locations... from source.


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

### For 1-to-Many Calculations:

`https://apis.mapmyindia.com/advancedmaps/v1/<lic_key>/distance_matrix/driving/77.983936,28.255904;77.05993,28.487555;77.15993,28.587555;17ZUL7?rtype=0&region=ind`

### For Many-to-Many Calculations: 

`https://apis.mapmyindia.com/advancedmaps/v1/<lic_key>/distance_matrix/driving/77.983936,28.255904;77.05993,28.487555;77.15993,28.587555;17ZUL7?sources=0;1&destinations=2;3`

## Sample Response

### For 1-to-Many Calculations: 

```json
{
	"responseCode": 200,
	"version": "191.17",
	"results": {
		"code": "Ok",
		"distances": [
			[
				0,
				6817.7,
				20475.7
			]
		],
		"durations": [
			[
				0,
				1844.4,
				5307.5
			]
		]
	}
}
```
### For Many-to-Many Calculations: 

```json
{
    "responseCode": 200,
    "version": "191.17",
    "results": {
        "code": "Ok",
        "distances": [
            [
                128266.7,
                125884
            ],
            [
                18709.9,
                29030.3
            ]
        ],
        "durations": [
            [
                10306.6,
                10221.1
            ],
            [
                1213.3,
                2104.9
            ]
        ]
    }
}
```

## Live Demo

[Click Here](https://www.mapmyindia.com/api/advanced-maps/doc/sample/mapmyindia-maps-distance-matrix-api-example)

For more details, please visit our full documentation.

For any queries and support, please contact: 

[<img src="https://www.mapmyindia.com/images/logo.png" height="40"/> </p>](https://www.mapmyindia.com/api)
Email us at [apisupport@mapmyindia.com](mailto:apisupport@mapmyindia.com)


![](https://www.mapmyindia.com/api/img/icons/support.png)
[Support](https://www.mapmyindia.com/api/index.php#f_cont)
Need support? contact us!

<br>

[<p align="center"> <img src="https://www.mapmyindia.com/api/img/icons/stack-overflow.png"/> ](https://stackoverflow.com/questions/tagged/mapmyindia-api)[![](https://www.mapmyindia.com/api/img/icons/blog.png)](http://www.mapmyindia.com/blog/)[![](https://www.mapmyindia.com/api/img/icons/gethub.png)](https://github.com/MapmyIndia)[<img src="https://mmi-api-team.s3.ap-south-1.amazonaws.com/API-Team/npm-logo.one-third%5B1%5D.png" height="40"/> </p>](https://www.npmjs.com/org/mapmyindia) 



[<p align="center"> <img src="https://www.mapmyindia.com/june-newsletter/icon4.png"/> ](https://www.facebook.com/MapmyIndia)[![](https://www.mapmyindia.com/june-newsletter/icon2.png)](https://twitter.com/MapmyIndia)[![](https://www.mapmyindia.com/newsletter/2017/aug/llinkedin.png)](https://www.linkedin.com/company/mapmyindia)[![](https://www.mapmyindia.com/june-newsletter/icon3.png)](https://www.youtube.com/user/MapmyIndia/)




<div align="center">@ Copyright 2020 CE Info Systems Pvt. Ltd. All Rights Reserved.</div>

<div align="center"> <a href="https://www.mapmyindia.com/api/terms-&-conditions">Terms & Conditions</a> | <a href="https://www.mapmyindia.com/about/privacy-policy">Privacy Policy</a> | <a href="https://www.mapmyindia.com/pdf/mapmyIndia-sustainability-policy-healt-labour-rules-supplir-sustainability.pdf">Supplier Sustainability Policy</a> | <a href="https://www.mapmyindia.com/pdf/Health-Safety-Management.pdf">Health & Safety Policy</a> | <a href="https://www.mapmyindia.com/pdf/Environment-Sustainability-Policy-CSR-Report.pdf">Environmental Policy & CSR Report</a>

<div align="center">Customer Care: +91-9999333223</div>