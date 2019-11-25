![MapmyIndia APIs](https://www.mapmyindia.com/api/img/mapmyindia-api.png)

# MapmyIndia Aerial Distance API

**Easy To Integrate Maps & Location APIs & SDKs For Web & Mobile Applications**

Powered with India's most comprehensive and robust mapping functionalities.
**Now Available**  for Srilanka, Nepal, Bhutan and Bangladesh

You can get your api key to be used in this document here: [https://www.mapmyindia.com/api/signup](https://www.mapmyindia.com/api/signup)

## Disclaimer
The document contains sensitive information on parameters and responses that can be accessed only by MapmyIndia.
Redistribution without permissions is prohibited.
It is mandatory to take permissions from the author before sharing with any personnel outside MapmyIndia.


## Introduction

### Aerial Distance

Adding Aerial Distance API would help to calculate the distance between two points on the map. For example, you can measure the mileage in a straight line between two cities.

You can now easily estimate how big the lake near your house is, or just the **aerial distance** between Delhi and Mumbai is 1150.06 km (714.61 mi). Same time this **API  doesn't calculate road distance between two points.**

## Security Type

- License key based authentication
- IP/domain based whitelisting

## Input Method
GET


### Example URL: 
```html
https://apis.mapmyindia.com/advancedmaps/v1/<assigned_licence_key>/distanceA?x1=34.506172&y1=76.108652 &x2=28.4586&y2=77.85698&unit=K
```
where: 
- "distanceA" is the chosen resource.
-  profile is "x1y1 & x2y2"
- "34.506172,76.108652"is the start position.
- "28.4586,77.85698" is the end position of the route.

**Note**: The position input is in decimal degree notation of longitude,latitude.


## Request Parameters

###  Mandatory Parameters:

1.  x1: Latitude of start point.
2.  y1: Longitude of start point.
3.  x2: Latitude of destination point
4.  y2: Longitude of destination point.`

### Optional Parameters:

1. Unit: unit of distance (default value is K)
2. K: Kilometre
3. N: Nautical Miles
4. M: Miles


## Response Parameters

1.	`responseCode`: See the service dependent and general status codes.
2.	`version`: API’s version information.
3.	`results`: array of results, each consisting of the following parameters:
	- `code`: if the request was successful, code is ok.
	- `durations`: Duration in seconds for source to source (default 0), 1st, 2nd, 3rd secondary locations... from source.
	- `distances`: Distance in meters for source to source (default 0), 1st, 2nd, 3rd secondary locations... from source.

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

## Response Parameters

The Aerial_Distance API will return only one result object. The following output parameters will be supported in the Aerial_Dstance API response.

1. `responseCode`: See the service dependent and general status codes.
2.  `results`: array of results, each consisting of the following parameters.
	- `distance`: a distance between strart & destinaton.
	- `unit`: unit of distance.
 
## Sample Request:

URL: 
```html
https://apis.mapmyindia.com/advancedmaps/v1/<Assigned_licence_key>/distanceA?x1=34.506172&y1=76.108652&x2=28.4586&y2=77.85698&unit=K
```


## Sample Response data:
```json
{  
	"responseCode": 200, 
	"distance": 692.52185107232, 
	"unit": "K"
}
```

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