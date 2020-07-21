# Text Search API

**Easy To Integrate Maps & Location APIs & SDKs For Web & Mobile Applications**

Powered with India's most comprehensive and robust mapping functionalities.
**Now Available**  for Srilanka, Nepal, Bhutan and Bangladesh

You can get your api key to be used in this document here: [https://www.mapmyindia.com/api/signup](https://www.mapmyindia.com/api/signup)

## Introduction
Text Search API is a service that aims to provide information about a list of places on the basis of a text string entered by the user. It uses the location information that is provided along with the query to try to understand the request. This API now supports Hindi language so you can now search queries in Hindi too.


## Security Type
This APIs follow OAuth2 based security. **To know more on how to create your authorization tokens, please use our authorization token URL. More details available**  [here](https://www.mapmyindia.com/api/advanced-maps/doc/authentication-api.php)

## Request Headers

The API leverages OAuth 2.0 based security. Hence, the developer would need to send a request for access token using their client_id and client_secret to the OAuth API. Once validated from the OAuth API, the access_token and the token_type need to be sent as Authorization header with the value: “{token_type} {access_token}”.

-  `Authorization:  “token_type access_token”`.

## Input Method
GET

## Input URL

[https://atlas.mapmyindia.com/api/places/textsearch/json?](https://atlas.mapmyindia.com/api/places/textsearch/json?)

## Request Parameters

### Mandatory Parameters:
1.  **`query`**  (string) e.g. FODCOF, Shoes, Coffee, Versace, Gucci, H&M, Adidas, Starbucks, B130 {POI, House Number, keyword, tag}


### Optional Parameters:
1. *`region`* (string): it takes in the country code. LKA, IND, BTN, BGD, NPL for Sri-Lanka, India, Bhutan, Bangladesh, Nepal respectively. Default is India (IND)
2. *`location`*  {string (latitude[double],longitude[double])}: Provides the location around which the search will be performed. e.g. `location=28.454,77.435`
It is STRONGLY RECOMMENDED to use this parameter for accurate location biased results.
1. *`filter`*  {filter=pin:110020}: Filter parameter helps you restrict the result by mentioning pincode. e.g. `filter=pin:110020`

## Response Parameters

Multiple objects: 

a. suggestedLocations ([object array])

1.  `type` (string): Type of location POI or Country or City.
2. `typeX` (integer): for internal use only.
3. `placeAddress` (string): Address of the location.
4. `latitude` (double): Latitude of the location.
5. `longitude` (double): longitude of the location.
6. `eLoc` (string): Place Id of the location 6-char alphanumeric.
7. `entryLatitude` (double): latitude of the entrance of the location.
8. `entryLongitude` (double): longitude of the entrance of the location.
9. `placeName` (string): Name of the location.
10. `alternateName` (string): Alternate name of the location.
11. `keywords` (nullable [ string ] ): provides an array of matched keywords or codes.
12. `p` (long integer): for internal use only.
13. `distance` (nullable integer): for internal use only.
14. `orderIndex` (integer): the order where this result should be placed
15. `score` (double): for internal use only.
16. `suggester` (string): for internal use only.
17. `addressTokens` (array of objects): for internal use only.
18. `richInfo` (array of objects): for internal use only.

b. userAddedLocations ([object array])

1. `eLoc` (string): Place Id of the location 6-char alphanumeric.
2. `placeName` (string): Name of the location.
3. `placeAddress` (string): Address of the location.
4. `type` (string): type of location POI or Country or City (if available)
5. `latitude` (double): Latitude of the location.
6. `longitude` (double): longitude of the location.
7. `orderIndex` (integer): the order where this result should be placed
8. `entryLatitude` (double): Entry point Latitude of the location.
9. `entryLongitude` (double): Entry point longitude of the location.
10. `resultType` (string): Type of the result according to user generated content (UGC). Mostly is 'UAP'.
11. `userName` (string): The username of the person who has added this place.

## Response Type

JSON

## Response Codes {as HTTP response code}

### Success:

1. `200`: To denote a successful API call. 
2. `204`: To denote the API was a success but no results we’re found.

### Client-Side Issues:
1. `400`: Bad Request, User made an error while creating a valid request. 
2. `401`: Unauthorized, Developer’s key is not allowed to send a request with restricted parameters. 
3. `403`: Forbidden, Developer’s key has hit its daily/hourly limit

### Server-Side Issues:
1. `500`: Internal Server Error, the request caused an error in our systems. 
2. `503`: Service Unavailable, during our maintenance break or server downtime.


## Sample Input
```html
https://atlas.mapmyindia.com/api/places/textsearch/json?query=okhla phase 3&region=ind&filter=pin:110020
```

## Sample Response

```json
{
    "suggestedLocations": [
        {
            "type": "POI",
            "typeX": 7,
            "placeAddress": "Sikandra Road, Connaught Place, New Delhi, Delhi, 110001",
            "latitude": 28.626337,
            "longitude": 77.2364640000001,
            "eLoc": "38FD1E",
            "entryLatitude": 28.625615,
            "entryLongitude": 77.235811,
            "placeName": "Lady Irwin College",
            "alternateName": "",
            "keywords": [
                "COMCLG"
            ],
            "p": 3493,
            "distance": 0,
            "orderIndex": 1,
            "score": 19905.639213316852,
            "suggester": "placeName",
            "addressTokens": {},
            "richInfo": {}
        }
    ],
    "userAddedLocations": []
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