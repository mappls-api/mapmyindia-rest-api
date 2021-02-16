# Text Search API

**Easy To Integrate Maps & Location APIs & SDKs For Web & Mobile Applications**

Powered with India's most comprehensive and robust mapping functionalities.
**Now Available**  for Srilanka, Nepal, Bhutan and Bangladesh

You can get your api key to be used in this document here: [https://www.mapmyindia.com/api/signup](https://www.mapmyindia.com/api/signup)

# Note 
1. The response listed in the below documentation is ONLY indicative of the overall capabilities of MapmyIndia's Search APIs.
2. Not all response parameters mentioned in the below documentation is assured to be present in all the use-cases. The response of any of the below search API is thus, dependent on the use-case agreed upon between MapmyIndia & it's API consumer.
3. For any further clarifications on what all of the response structure is available for your use case, please contact your business relationship manager or contact MapmyIndia API support.
4. PREMIUM APIs/Parameters are not available for evalulation on signup. To get access, please contact API Support.

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
Geometry information is NOT available in most use-case driven response; and is RESTRICTED.
5. `longitude` (double): longitude of the location.
Geometry information is NOT available in most use-case driven response; and is RESTRICTED.
6. `eLoc` (string): Place Id of the location 6-char alphanumeric.
7. `entryLatitude` (double): latitude of the entrance of the location.
Geometry information is NOT available in most use-case driven response; and is RESTRICTED.
8. `entryLongitude` (double): longitude of the entrance of the location.
Geometry information is NOT available in most use-case driven response; and is RESTRICTED.
9. `placeName` (string): Name of the location.
10. `alternateName` (string): Alternate name of the location.
11. `keywords` (nullable [ string ] ): provides an array of matched keywords or codes.
12. `p` (long integer): for internal use only.
13. `distance` (nullable integer): for internal use only.
14. `orderIndex` (integer): the order where this result should be placed
15. `score` (double): for internal use only.
16. `suggester` (string): for internal use only.
17. `addressTokens` (array of objects): It shows the admin details along with the house address. Address token information is NOT available in generic response; and is RESTRICTED.
18. `richInfo` (array of objects): for internal use only.

b. userAddedLocations ([object array])

1. `eLoc` (string): Place Id of the location 6-char alphanumeric.
2. `placeName` (string): Name of the location.
3. `placeAddress` (string): Address of the location.
4. `type` (string): type of location POI or Country or City (if available)
5. `latitude` (double): Latitude of the location.
Geometry information is NOT available in most use-case driven response; and is RESTRICTED.
6. `longitude` (double): longitude of the location.
Geometry information is NOT available in most use-case driven response; and is RESTRICTED.
7. `orderIndex` (integer): the order where this result should be placed
8. `entryLatitude` (double): Entry point Latitude of the location.
Geometry information is NOT available in most use-case driven response; and is RESTRICTED.
9. `entryLongitude` (double): Entry point longitude of the location.
Geometry information is NOT available in most use-case driven response; and is RESTRICTED.
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
            "latitude": RESTRICTED,
            "longitude": RESTRICTED,
            "eLoc": "38FD1E",
            "entryLatitude": RESTRICTED,
            "entryLongitude": RESTRICTED,
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


For more details, please visit our full documentation.

For any queries and support, please contact: 

[<img src="https://www.mapmyindia.com/images/logo.png" height="40"/> </p>](https://www.mapmyindia.com/api)
Email us at [apisupport@mapmyindia.com](mailto:apisupport@mapmyindia.com)


![](https://www.mapmyindia.com/api/img/icons/support.png)
[Support](https://www.mapmyindia.com/api/index.php#f_cont)
Need support? contact us!

<br></br>

[<p align="center"> <img src="https://www.mapmyindia.com/api/img/icons/stack-overflow.png"/> ](https://stackoverflow.com/questions/tagged/mapmyindia-api)[![](https://www.mapmyindia.com/api/img/icons/blog.png)](http://www.mapmyindia.com/blog/)[![](https://www.mapmyindia.com/api/img/icons/gethub.png)](https://github.com/MapmyIndia)[<img src="https://mmi-api-team.s3.ap-south-1.amazonaws.com/API-Team/npm-logo.one-third%5B1%5D.png" height="40"/> </p>](https://www.npmjs.com/org/mapmyindia) 



[<p align="center"> <img src="https://www.mapmyindia.com/june-newsletter/icon4.png"/> ](https://www.facebook.com/MapmyIndia)[![](https://www.mapmyindia.com/june-newsletter/icon2.png)](https://twitter.com/MapmyIndia)[![](https://www.mapmyindia.com/newsletter/2017/aug/llinkedin.png)](https://www.linkedin.com/company/mapmyindia)[![](https://www.mapmyindia.com/june-newsletter/icon3.png)](https://www.youtube.com/user/MapmyIndia/)




<div align="center">@ Copyright 2020 CE Info Systems Pvt. Ltd. All Rights Reserved.</div>

<div align="center"> <a href="https://www.mapmyindia.com/api/terms-&-conditions">Terms & Conditions</a> | <a href="https://www.mapmyindia.com/about/privacy-policy">Privacy Policy</a> | <a href="https://www.mapmyindia.com/pdf/mapmyIndia-sustainability-policy-healt-labour-rules-supplir-sustainability.pdf">Supplier Sustainability Policy</a> | <a href="https://www.mapmyindia.com/pdf/Health-Safety-Management.pdf">Health & Safety Policy</a> | <a href="https://www.mapmyindia.com/pdf/Environment-Sustainability-Policy-CSR-Report.pdf">Environmental Policy & CSR Report</a>

<div align="center">Customer Care: +91-9999333223</div>