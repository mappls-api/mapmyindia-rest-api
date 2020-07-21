# Nearby API

**Easy To Integrate Maps & Location APIs & SDKs For Web & Mobile Applications**

Powered with India's most comprehensive and robust mapping functionalities.
**Now Available**  for Srilanka, Nepal, Bhutan and Bangladesh

**Full documentation available here**: [https://www.mapmyindia.com/api/advanced-maps/doc/nearby-api](https://www.mapmyindia.com/api/advanced-maps/doc/nearby-api). 

You can get your api key to be used in this document here: [https://www.mapmyindia.com/api/signup](https://www.mapmyindia.com/api/signup)

## Introduction
Nearby Places API, enables you to add discovery and search of nearby POIs by searching for a generic keyword used to describe a category of places or via the unique code assigned to that category.

## Live Demo

[Click here to visit live demonstration page](https://www.mapmyindia.com/api/advanced-maps/doc/sample/mapmyindia-maps-near-by-api-example)


## Security Type
This APIs follow OAuth2 based security. **To know more on how to create your authorization tokens, please use our authorization token URL. More details available**  [here](https://www.mapmyindia.com/api/advanced-maps/doc/authentication-api.php)

## Request Headers

The API leverages OAuth 2.0 based security. Hence, the developer would need to send a request for access token using their client_id and client_secret to the OAuth API. Once validated from the OAuth API, the access_token and the token_type need to be sent as Authorization header with the value: “{token_type} {access_token}”.

-  `Authorization:  “token_type access_token”`.

## Input Method
GET

## Input URL

[https://atlas.mapmyindia.com/api/places/nearby/json?](https://atlas.mapmyindia.com/api/places/nearby/json?)

## Response Type

JSON


## Request Parameters
The “**bold**” one’s are mandatory, and the “*italic*” one’s are optional.

1. Mandatory Parameters:
	- ***`keywords`***  (string) e.g. FODCOF, Shoes, Coffee, Versace, Gucci, H&M, Adidas, Starbucks, B130 {POI, House Number, keyword, tag}
	- ***`refLocation`***  {string (latitude[double],longitude[double])}: Provides the location around which the search will be performed. e.g. `refLocation=28.454,77.435`
2.  Optional Parameters:
	- *`page`*  (integer): provides number of the page to provide results from.
	- *`region`* (string): it takes in the country code. LKA, IND, BTN, BGD, NPL for Sri-Lanka, India, Bhutan, Bangladesh, Nepal respectively. Default is India (IND)
	- *`radius`* (integer): provides the range of distance to search over (default: 1000, min: 500, max: 10000).
	- *`bounds`* (x1,y1;x2,y2): Allows the developer to send in map bounds to provide a nearby search of the geobounds; where x1,y1 are the lat-lng of the bound.
	- *`filter`* (): It uses key:value pair(s) to fine tune discovery of places by filtering the results. e.g. categoryCode:FODCOF
        - valid IDs for key value pairs are: 
            - `categoryCode`: can take in category codes as input
	- *`sortBy`* (string): provides configured sorting operations for the client on cloud. Below are the available sorts:
		- *`dist:asc`*  (default) & 
		- *`dist:desc`* - will sort data in order of distance from the passed 
        location.
        - *`imp`* - will sort data in order of decreasing prominence of the place.
    - *`searchBy`* (string): provides configurable search operations for the client on cloud. Below are the available sorts:
		- *`dist`*  (default) & 
		- *`imp`* - will search data in order of prominence of the place. 


### Operators in `keywords` parameter

To send multiple keywords in a request, we’ve defined a couple of operators that can help the developers wrap their applications around this functionality. Below are the operators:

1. The “ ; ” Operator: This operator is an “or” operator. Defining multiple keywords separated with a “ ; ” would provide results that satisfies either of the keywords.
2. The “ $ ” Operator: This operator is a “and” operator. Defining multiple keywords separated with a “ $ ” would provide results that satisfy all the provided keywords. (default).

To use these operators, simple just send in the keywords parameter like below:
```html
&keywords=coffee ; tea $ sea food ; alcohol
```

The above nearby search would yield in results that either provide coffee or tea but must provide either sea food or alcohol.

Please Note: the spacing in the above example is of no relevance to the search result. It’s just there to provide better understanding.

## Response Parameters

a. suggestedLocations ([object array])

1. `distance` (integer): provides the distance from the provided location bias in meters.
2. `eLoc` (string): Place Id of the location 6-char alphanumeric.
3. `email` (string): Email for contact.
4. `entryLatitude` (double): latitude of the entrance of the location.
5. `entryLongitude` (double): longitude of the entrance of the location.
6. `keywords` ( [ string ] ): provides an array of matched keywords or codes.
7. `landlineNo` (string): Email for contact.
8. `latitude` (double): Latitude of the location.
9. `longitude` (double): longitude of the location.
10. `mobileNo` : Phone number for contact.
11. `orderIndex` (integer): the order where this result should be placed
12. `placeAddress` (string): Address of the location.
13. `placeName` (string): Name of the location.
14. `type` (string): Type of location POI or Country or City.
15. `hourOfOperation`<sup>1</sup> (string): The hours of operation of the POI in a day.
16. `addressTokens`<sup>2</sup> (object)
    - `houseNumber` (string): house number of the location.
    - `houseName` (string): house name of the location.
    - `poi` (string): name of the POI (if applicable)
    - `street` (string): name of the street. (if applicable)
    - `subSubLocality` (string): the sub-sub-locality to which the location belongs. (if applicable)
    - `subLocality` (string): the sub-locality to which the location belongs. (if applicable)
    - `locality` (string): the locality to which the location belongs. (if applicable)
    - `village` (string): the village to which the location belongs. (if applicable)
    - `subDistrict` (string): the sub-district to which the location belongs. (if applicable)
    - `district` (string): the district to which the location belongs. (if applicable)
    - `city` (string): the city to which the location belongs. (if applicable)
    - `state` (string): the state to which the location belongs. (if applicable)
    - `pincode` (string): the PIN code to which the location belongs. (if applicable)

b. pageInfo (object)

1. `pageCount` (integer): The number of pages with results.
2. `totalHits` (integer): Total number of places in the results.
3. `totalPages` (integer): Total number of pages as per page size and no of results.
4. `pageSize` (integer): The number of results per page.

Footnotes: 
1. Beta available for extremely limited users. Not part of standard commercial agreements; unless specifically mentioned.
2. Beta available for extremely limited users. Not part of standard commercial agreements; unless specifically mentioned.

## Sample Input

https://atlas.mapmyindia.com/api/places/nearby/json?keywords=coffee;beer&refLocation=28.631460,77.217423&filter=categoryCode:FODCOF


## Sample Response
```json
{
    "suggestedLocations": [
        {
            "distance": 192,
            "eLoc": "TPIGXI",
            "email": "",
            "entryLatitude": 28.5506790000001,
            "entryLongitude": 77.2705480000001,
            "keywords": [
                "FODCOF"
            ],
            "landlineNo": "",
            "latitude": 28.550736,
            "longitude": 77.2707380000001,
            "mobileNo": "",
            "orderIndex": 1,
            "placeAddress": "Okhla Industrial Estate Phase 3, New Delhi, Delhi, 110020",
            "placeName": "Urban Sip Cafe",
            "type": "POI"
        }
    ],
    "pageInfo": {
        "pageCount": 1,
        "totalHits": 1,
        "totalPages": 1,
        "pageSize": 10
    }
}
```

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