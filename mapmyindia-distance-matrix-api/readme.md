![MapmyIndia APIs](https://www.mapmyindia.com/api/img/mapmyindia-api.png)

# MapmyIndia Driving Distance - Time Matrix API - beta

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
| 0.0.1 | February 2019 | MapmyIndia API Team ([KB](https://github.com/kunalbharti)) |

## API Version History

| Version | Last Updated | Author | Revised Sections |
| ---- | ---- | ---- | ---- |
| 191.17 | 2018-02-07 | MapmyIndia API Team ([PS](https://github.com/map-123)) | Initial release |


## Introduction

### Route and Navigation

Adding driving directions API would help to add predicted travel time & duration from a given origin point to a number of points. This REST API computes the distance and duration of a route between a source/primary position (geographical coordinates) and a list of all supplied secondary positions using to mode of route calculation i.e. optimal and shortest.
Supported region (countries) are India, Sri Lanka, Nepal, Bangladesh & Bhutan. Please note that maximum number of points are limited to 100 only including source and secondary positions.

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
							<td class="cellrowborder" rowspan="12" headers="d156249e37 ">Resources</td>
							<td class="cellrowborder" headers="d156249e40 ">
								<code>distance_matrix</code>
							</td>
							<td class="row-nocellborder" headers="d156249e43 ">to calculate the route & duration without considering traffic conditions.</td>
						</tr>
						<tr class="&#39;&#39;">
							</tr>
						<tr class="&#39;&#39; override_background">
						</tr>
						<tr class="&#39;&#39;">
						</tr>
						<tr class="&#39;&#39; override_background">
						</tr>
						<tr class="&#39;&#39;">
						</tr>
						<tr class="&#39;&#39; override_background">
						</tr>
						<tr class="&#39;&#39;">
						</tr>
						<tr class="&#39;&#39; override_background">
							</tr>
						<tr class="&#39;&#39;">
						</tr>
						<tr class="&#39;&#39;">
							<td class="cellrowborder" headers="d156249e40 ">
								<code>distance_matrix_eta</code>	
							</td>
							<td class="row-nocellborder" headers="d156249e43 ">to get the updated duration considering live traffic; Applicable for India only “region=ind” and “rtype=1” is not supported 
							</td>
						</tr>
						<tr class="&#39;&#39; override_background">
							</tr>
						<tr class="&#39;&#39; override_background">
							<td class="cellrowborder" headers="d156249e37 ">Profile</td>
							<td class="cellrowborder" headers="d156249e40 ">
							    <code>driving</code>
							</td>
							<td class="row-nocellborder" headers="d156249e43 ">Meant for car routing
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
https://apis.mapmyindia.com/advancedmaps/v1/<assigned_license_key>/distance_matrix/driving/77.983936,28.255904;77.05993,28.487555;77.15993,28.587555?
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
2.  **`source`**: The first location is pair of comma separated longitude & latitude value which is taken as the source from which distance and ETA is to be calculated for the other locations specified in the rest of the ‘secondary_locations’ (part of URL).
3. **`secondary_locations`**: The coordinates of _rest of the locations_ whose distance from source will be calculated (part of URL). 
Format for each coordinate is the same as for the source, and they are semi-colon “;” delimited. 
For example 77.983936,28.255904;77.05993,28.487555.

### Optional Parameters

1. *`rtype`* type of route (integer) required for navigation, where values mean:  
	- `0` optimal (default)  
	- `1` shortest (it will calculate route by excluding access penalties like private roads, etc.)
2.  *`region`*(string): This parameter is optional for India; for other countries (Sri Lanka, Nepal, Bangladesh & Bhutan) this parameter is mandatory. Possible values are `ind` (for India, default), `lka` (for Sri Lanka) , `npl` (for Nepal) , `bgd` (for Bangladesh) and `btn` (for Bhutan)

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

`https://apis.mapmyindia.com/advancedmaps/v1/<lic_key>/distance_matrix/driving/90.33687,23.470314;90.379249,23.497178;90.497009,23.546286?rtype=1&region=bgd`

## Sample Response
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

## Live Demo

[Click Here](https://www.mapmyindia.com/api/advanced-maps/doc/sample/mapmyindia-maps-distance-matrix-api-example)

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