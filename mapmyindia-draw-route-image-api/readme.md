
![MapmyIndia APIs](https://www.mapmyindia.com/api/img/mapmyindia-api.png)
# Draw Route Image API

With POI Along the Route API user will be able to get the details of POIs of a particular category along his set route. The main focus of this API is to provide convenience to the user and help him in locating the place of his interest on his set route.

## Security Type
- License key based authentication
- IP/domain based whitelisting


## Input Method
GET

## URL

```
https://apis.mapmyindia.com/advancedmaps/api/{REST-KEY-HERE}/route_image?
```

## Request Parameters

The following input parameters will be supported in the POI Along The Route API request

### Mandatory Parameters

1. `points` (string) The array of coordinates from origin to destination with optional via points in between. Each coordinate is .separated by a semi-colon. 
<br>Example: "28.550716,77.268928;28.4070,77.8498;27.90,78.0880;27.5981,78.049;27.1767,78.0081;26.7829,79.0276".


### Optional Parameters
1. `size` (string): size of the image is widthXheight. Min 100X100 & Max 1000X1000; default is 400x400.
2. `color` (string): RGB Color in "R,G,B" values. Default is "0,0,255".
3. `strokeWidth` (number): The stroke width of the route polyline. Min: 1;  max: 8; default: 5.
4. `from_icon` (string): URL for the origin marker.
5. `to_icon` (string): URL for the destination marker.
6. `via_icon` (string): URL for the via-point marker.


## Response Type

Content-Type: image/png

## Response Codes 
**Note**:  as HTTP response code

### Success
1. 200: To denote a successful API call.
2. 204: To denote the API was a success but no results were found.
### Client-Side Issues
3. 400: Bad Request, User made an error while creating a valid request.
4. 401: Unauthorized, Developer’s key is not allowed to send a request with restricted parameters.
5. 403: Forbidden, Developer’s key has hit its daily/hourly limit.
6. 412: Pre-condition failed; incorrect or invalid combination of input coordinates
Server-Side Issues:
7. 500: Internal Server Error, the request caused an error in our systems.
8. 503: Service Unavailable, during our maintenance break or server down-times.

## Response Messages 

**Note**: as HTTP response message

1. 200: Success.
2. 204: No matches we’re found for the provided query.
3. 400: Something’s just not right with the request.
4. 401: Access Denied.
5. 403: Services for this key has been suspended due to daily/hourly transactions limit.
6. 412: Pre-condition failed; incorrect or invalid combination of input coordinates
7. 500: Something went wrong.
8. 503: Maintenance Break.


## Transaction Information

One request using the API link will be considered as one transaction.

## Sample request

### cURL

```curl
curl --location --request GET 'https://apis.mapmyindia.com/advancedmaps/api/REST-API-KEY/route_image?points=28.550716,77.268928;28.4070,77.8498;27.90,78.0880;27.5981,78.049;27.1767,78.0081;26.7829,79.0276&size=500X500&color=255,0,0&strokeWidth=5&from_icon=https://img.icons8.com/color/48/000000/green-flag.png&to_icon=https://img.icons8.com/doodle/48/000000/finish-flag.png'
```

## Sample Response

![](https://mmi-api-team.s3.ap-south-1.amazonaws.com/API-Team/Draw-Route-Image-API.png)

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