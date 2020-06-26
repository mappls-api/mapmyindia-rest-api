# Autosuggest API

**Easy To Integrate Maps & Location APIs & SDKs For Web & Mobile Applications**

Powered with India's most comprehensive and robust mapping functionalities.
**Now Available**  for Srilanka, Nepal, Bhutan and Bangladesh

**Full documentation available here**: [https://www.mapmyindia.com/api/advanced-maps/doc/autosuggest-api](https://www.mapmyindia.com/api/advanced-maps/doc/autosuggest-api). 
You can get your api key to be used in this document here: [https://www.mapmyindia.com/api/signup](https://www.mapmyindia.com/api/signup)

## Introduction
The Autosuggest API helps users to complete queries faster by adding intelligent search capabilities to your web or mobile app. This API returns a list of results as well as suggested queries as the user types in the search field. This API also supports hindi language. If a user enters query in hindi language he will get results in hindi.

## Live Demo

[Click here to visit live demonstration page](https://www.mapmyindia.com/api/advanced-maps/doc/sample/mapmyindia-maps-auto-suggest-api-example.php)

## Security Type
This APIs follow OAuth2 based security. **To know more on how to create your authorization tokens, please use our authorization token URL. More details available**  [here](https://www.mapmyindia.com/api/advanced-maps/doc/authentication-api.php)

## Request Headers

The API leverages OAuth 2.0 based security. Hence, the developer would need to send a request for access token using their client_id and client_secret to the OAuth API. Once validated from the OAuth API, the access_token and the token_type need to be sent as Authorization header with the value: “{token_type} {access_token}”.

-  `Authorization:  “token_type access_token”`.

## Input Method
GET

## Input URL

[https://atlas.mapmyindia.com/api/places/search/json?](https://atlas.mapmyindia.com/api/places/search/json?)

## Response Type

JSON


## Request Parameters
The “**bold**” one’s are mandatory, and the “*italic*” one’s are optional.

1. Mandatory Parameters:
	- **`query`***  (string) e.g. Shoes, Coffee, Versace, Gucci, H&M, Adidas, Starbucks, B130, नई दिल्ली {POI, House Number, keyword, tag, place}
2.  Optional Parameters:
	- *`location`*  {string (latitude[double],longitude[double])} e.g. `location=28.454,77.435`. Location is required to get location bias autosuggest results.
	- *`zoom`*  (double): takes the zoom level of the current scope of the map (min: 4, max: 18).
	- *`region`* (string): it takes in the country code. LKA, IND, BTN, BGD, NPL for Sri-Lanka, India, Bhutan, Bangladesh, Nepal respectively. Default is India (IND)
	- *`tokenizeAddress`* (valueless) provides the different address attributes in a structured object.
	- *`pod`*  (string) = it takes in the place type code which helps in restricting the results to certain chosen type.  
    Below mentioned are the codes for the pod -
	    -  *`SLC`*: Sublocality
	    - *`LC`*: Locality
	    - *`CITY`*: City
	    - *`VLG`*: Village
	    - *`SDIST`*: Subdistrict
	    - *`DIST`*: District
	    - *`STATE`*: State
	    - *`SSLC`*: Subsublocality
    - *`filter`*  = this parameter helps you restrict the result either by mentioning a bounded area or to certain eloc (6 digit code to any poi, locality, city, etc.), below mentioned are the both types -  
	    - *`filter = pin: It takes pincode/postal code of an area`* `{e.g. filter=pin:110055}`
	    - *`filter = bounds: lat1, lng1; lat2, lng2`* `(latitude, longitude) 
	    {e.g. filter=bounds: 28.598882, 77.212407; 28.467375, 77.353513`}
	    - *`filter  = cop: {eloc}`* (string) 
	    {e.g. `filter=cop:YMCZ0J`}
	- *`bridge`* (valueless) initiates a bridge to be created to provide applicable nearby API searches in the `suggestedSearches` response object. 

## Response Parameters

Multiple objects: 

a. suggestedLocations ([object array])

1. `eLoc` (string): Place Id of the location 6-char alphanumeric.
2. `placeName` (string): Name of the location.
3. `placeAddress` (string): Address of the location.
4. `type` (string): type of location POI or Country or City
5. `latitude` (double): Latitude of the location.
6. `longitude` (double): longitude of the location.
7. `entryLatitude` (double): Entry point Latitude of the location.
8. `entryLongitude` (double): Entry point longitude of the location.
9. `orderIndex` (integer): the order where this result should be placed
10. `keywords` (object): contains the category code to which the POI result(if applicable) belongs to.
11. `addressTokens` (object)
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
12. `typeX` (integer): Type attribute for internal use only for MapmyIndia.
13. `alternateName` (string): Aliases or alternates names, if available, for the place.

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

c. suggestedSearches ([object array])

1. `keyword` (string): what the user typed in.
2. `Identifier` (string): what did the API use for it to qualify it as a suggested search request
3. `location` (string): the name of the location to which the nearby will run in context to.
4. `hyperlink` (string): the ready-made link for the nearby API pre-initialized with all default parameters and location with code to search for.
5. `orderIndex` (integer): the order where this result should be placed.
6. `eLoc` (string): Place Id of the location 6-char alphanumeric. (if applicable)


## Sample Input

https://atlas.mapmyindia.com/api/places/search/json?query=corona&location=28.550592,77.268770&region=IND&tokenizeAddress&bridge=

## Sample Response
```json
{
    "suggestedLocations": [
        {
            "type": "POI",
            "typeX": 7,
            "placeAddress": "Sant Nirankari Colony, New Delhi, Delhi, 110033",
            "latitude": 28.7230190000001,
            "longitude": 77.1968330000001,
            "eLoc": "DSEC7S",
            "entryLatitude": 28.7225250000001,
            "entryLongitude": 77.1989810000001,
            "placeName": "Coronation Memorial",
            "alternateName": "",
            "keywords": [
                "HISMON"
            ],
            "addressTokens": {
                "houseNumber": "",
                "houseName": "",
                "poi": "Coronation Memorial",
                "street": "",
                "subSubLocality": "",
                "subLocality": "",
                "locality": "Jahangirpuri;Jhangir Puri",
                "village": "",
                "subDistrict": "Model Town",
                "district": "North District",
                "city": "New Delhi",
                "state": "Delhi",
                "pincode": "110033"
            },
            "p": 764,
            "orderIndex": 1,
            "score": 426.3966512712821,
            "suggester": "placeName",
            "richInfo": {}
        }
    ],
    "userAddedLocations": [
        {
            "eLoc": "U09GOU",
            "entryLatitude": 0,
            "entryLongitude": 0,
            "latitude": 10.002463351332818,
            "longitude": 76.35638058185577,
            "orderIndex": 13,
            "placeAddress": "SFC Plus, Nilampathinja Mughal Road Confident Corona Kakkanad Kerala",
            "placeName": "SFC Plus",
            "resultType": "UAP",
            "type": "",
            "userName": "mcitybng"
        }
    ],
    "suggestedSearches": [
        {
            "keyword": "corona testing lab",
            "identifier": "near",
            "location": "me",
            "hyperLink": "https://atlas.mapmyindia.com/api/places/nearby/json?explain&richData&username=atlasuser&refLocation=28.550592,77.26877&keywords=hsptst",
            "orderIndex": 0,
            "eLoc": null
        }
    ]
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