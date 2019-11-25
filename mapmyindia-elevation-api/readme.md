
![MapmyIndia APIs](https://www.mapmyindia.com/api/img/mapmyindia-api.png)
# Elevation API

**Easy To Integrate Maps & Location APIs & SDKs For Web & Mobile Applications**

Powered with India's most comprehensive and robust mapping functionalities.
**Now Available**  for Srilanka, Nepal, Bhutan, Bangladesh and Myanmar

You can get your api key to be used in this document here: [https://www.mapmyindia.com/api/signup](https://www.mapmyindia.com/api/signup)

## Introduction

The **Elevation API** provides elevation data above the sea level for location on Earth’s surface. The **Elevation API** allows you to retrieve sampled elevation data along a path. This API can be useful for biking, trucking & in other routing applications.

## Input Method
GET

## Input URL

`https://apis.mapmyindia.com/advancedmaps/v1/<REST_KEY>/elevation?locations=lat1,lon1|lat2,lon2`

## Response Type

JSON: Response will served as JSON

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

## Request Parameters
### Mandatory Parameters
- **`locations:`** The location coordinates are expressed in pairs of (latitude,longitude|latitude,longitude).
- **`REST_KEY`**: The REST API licence key allocated to you by signing into our services and registering yourself as a developer (28 Char Alphanumeric).


## Sample Input

`https://apis.mapmyindia.com/advancedmaps/v1/<REST_KEY>/elevation?locations=9.538350,76.998825|8.930019,76.655587`

## Sample Response

```json
{
    "responseCode": 200,
    "version": "211.18",
    "results": [
        {
            "longitude": 76.998825,
            "latitude": 9.53835,
            "elevation": 523
        },
        {
            "longitude": 76.655587,
            "latitude": 8.930019,
            "elevation": 31
        }
    ]
}
```

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