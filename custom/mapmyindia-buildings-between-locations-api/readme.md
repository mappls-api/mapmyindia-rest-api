
![MapmyIndia APIs](https://www.mapmyindia.com/api/img/mapmyindia-api.png)
# Buildings Between Locations API

The API provides the building information between two geo coordinates. The input is given as start and destination points in which API gives the building information falling under these two locations.

## Security Type
- License key based authentication
- IP/domain based whitelisting


## Input Method
POST

## URL

```
https://app.mapmyindia.com/BuildingAPI/buildingname/getBuildingsBetweenLocations?
```

## Request Parameters

The following input parameters will be supported in the `Buildings Between Locations API` request

### Mandatory Parameters

1. `X` (string) The coordinate of origin location. 
<br>Example: "28.449089,77.058927".
2. `Y` (string) The coordinate of destination location. 
<br>Example: "28.599698,77.227284".
3. `key` (string) The REST API license key authorized to access the API. 

Note: Parameters are case-sensitive.

### Optional Parameters
No Optional Parameter

## Request Validation

If the aerial distance (haversine distance) between the X & Y coordinates is longer than 25 kms (25000 meters), plz respond back with error code 412; with error message “Too Long input”.

## Response Type

JSON

## Response Codes 
**Note**:  as HTTP response code

### Success
1. 200: To denote a successful API call.
2. 204: To denote the API was a success but no results were found.
### Client-Side Issues
3. 400: Bad Request, User made an error while creating a valid request.
4. 401: Unauthorized, Developer’s key is not allowed to send a request with restricted parameters.
5. 403: Forbidden, Developer’s key has hit its daily/hourly limit.
6. 412: Pre-condition failed; incorrect or invalid combination of input coordinates OR length of calculation exceeds valid 25 km limit
### Server-Side Issues:
7. 500: Internal Server Error, the request caused an error in our systems.
8. 503: Service Unavailable, during our maintenance break or server down-times.

## Response Messages 

**Note**: as HTTP response message

1. 200: Success.
2. 204: No matches we’re found for the provided query.
3. 400: Something’s just not right with the request.
4. 401: Access Denied.
5. 403: Services for this key has been suspended due to daily/hourly transactions limit.
6. 412: Pre-condition failed; incorrect or invalid combination of input coordinates OR Too long Input.
7. 500: Something went wrong.
8. 503: Maintenance Break.

## Response Parameters

1. `status` (string): 
2. `message` (string): 
3. `result` (array of objects)
    - `mmi_id`: (number) Internal use of MapmyIndia only.
    - `building_name` (string): The name of the building that falls under start and destination location of the input coordinates.
    - `num_of_floor` (number): The number of floor info the buildings have.
    - `latitude` (number): The centroid latitude of the building geometry.
    - `the_geom`(string): standard GeoJSON geometry of MultiPolygon type.
    - `height` (number): The height information of the building in meters
    - `longitude` (number): The centroid latitude of the building geometry.

## Transaction Strategy Information

Every 50 metres of line of sight distance (Aerial) for which intersecting buildings are queried for contributes to an increase of 1 transaction. 
<br>
Example: a 1000 metres aerial query translates to 20 transactions in a single request.

## Sample request

### cURL

```curl
curl --location --request GET 'https://app.mapmyindia.com/BuildingAPI/buildingname/getBuildingsBetweenLocations?X=28.449089000000000,77.058927000000000&Y=28.59969856049778,77.22728400878896&key=REST-API-KEY-HERE'
```

## Sample Response

```json
{
    "status": "OK",
    "message": "2 Records Found",
    "result": [
        {
            "mmi_id": 4019458.0,
            "building_name": "NA",
            "num_of_floor": 3.0,
            "latitude": 28.530388,
            "the_geom": "{\"type\":\"MultiPolygon\",\"coordinates\":[[[[77.1497910000001,28.5304110000001],[77.149794,28.530375],[77.1496760000001,28.5303650000001],[77.1496730000001,28.530402],[77.1497910000001,28.5304110000001]]]]}",
            "height": 9.0,
            "longitude": 77.149733
        },
        {
            "mmi_id": 4019571.0,
            "building_name": "NA",
            "num_of_floor": 1.0,
            "latitude": 28.546577,
            "the_geom": "{\"type\":\"MultiPolygon\",\"coordinates\":[[[[77.1680950000001,28.5467870000001],[77.1681750000001,28.546728],[77.168141,28.546682],[77.168188,28.5466470000001],[77.1682290000001,28.546703],[77.168372,28.5465970000001],[77.168343,28.5465570000001],[77.1684030000001,28.5465120000001],[77.1684430000001,28.546567],[77.168525,28.5465070000001],[77.168413,28.5463540000001],[77.16835,28.5464000000001],[77.168393,28.546458],[77.1682510000001,28.5465620000001],[77.1682030000001,28.546497],[77.1681390000001,28.546544],[77.1681790000001,28.5465990000001],[77.1680890000001,28.5466650000001],[77.168034,28.546591],[77.1679800000001,28.546631],[77.168031,28.5467],[77.1680610000001,28.546678],[77.1680920000001,28.546721],[77.1680620000001,28.5467420000001],[77.1680950000001,28.5467870000001]]]]}",
            "height": 3.0,
            "longitude": 77.168265
        }
    ]
}
```

For any queries and support, please contact: 

[<img src="https://www.mapmyindia.com/images/logo.png" height="40"/> </p>](https://www.mapmyindia.com/api)
Email us at [apisupport@mapmyindia.com](mailto:apisupport@mapmyindia.com)


![](https://www.mapmyindia.com/api/img/icons/support.png)
[Support](https://www.mapmyindia.com/api/index.php#f_cont)
Need support? contact us!

<br></br>
<br></br>

[<p align="center"> <img src="https://www.mapmyindia.com/api/img/icons/stack-overflow.png"/> ](https://stackoverflow.com/questions/tagged/mapmyindia-api)[![](https://www.mapmyindia.com/api/img/icons/blog.png)](http://www.mapmyindia.com/blog/)[![](https://www.mapmyindia.com/api/img/icons/gethub.png)](https://github.com/MapmyIndia)[<img src="https://mmi-api-team.s3.ap-south-1.amazonaws.com/API-Team/npm-logo.one-third%5B1%5D.png" height="40"/> </p>](https://www.npmjs.com/org/mapmyindia) 



[<p align="center"> <img src="https://www.mapmyindia.com/june-newsletter/icon4.png"/> ](https://www.facebook.com/MapmyIndia)[![](https://www.mapmyindia.com/june-newsletter/icon2.png)](https://twitter.com/MapmyIndia)[![](https://www.mapmyindia.com/newsletter/2017/aug/llinkedin.png)](https://www.linkedin.com/company/mapmyindia)[![](https://www.mapmyindia.com/june-newsletter/icon3.png)](https://www.youtube.com/user/MapmyIndia/)




<div align="center">@ Copyright 2020 CE Info Systems Pvt. Ltd. All Rights Reserved.</div>

<div align="center"> <a href="https://www.mapmyindia.com/api/terms-&-conditions">Terms & Conditions</a> | <a href="https://www.mapmyindia.com/about/privacy-policy">Privacy Policy</a> | <a href="https://www.mapmyindia.com/pdf/mapmyIndia-sustainability-policy-healt-labour-rules-supplir-sustainability.pdf">Supplier Sustainability Policy</a> | <a href="https://www.mapmyindia.com/pdf/Health-Safety-Management.pdf">Health & Safety Policy</a> | <a href="https://www.mapmyindia.com/pdf/Environment-Sustainability-Policy-CSR-Report.pdf">Environmental Policy & CSR Report</a>

<div align="center">Customer Care: +91-9999333223</div>