[<img src="https://www.mapmyindia.com/api/img/mapmyindia-api.png" height="40"/> </p>](https://www.mapmyindia.com/api)
# Autosuggest API

**Easy To Integrate Maps & Location APIs & SDKs For Web & Mobile Applications**

Powered with India's most comprehensive and robust mapping functionalities.
## Global Coverage Now Available !

Autosuggest API is **Now Available**  for [238 countries](https://github.com/MapmyIndia/mapmyindia-rest-api/blob/master/docs/countryISO.md) across the world.

You can get your api key to be used in this document here: [https://www.mapmyindia.com/api/](https://www.mapmyindia.com/api/)

# Note 
1. The response listed in the below documentation is ONLY indicative of the overall capabilities of MapmyIndia's Search APIs.
2. Not all response parameters mentioned in the below documentation is assured to be present in all the use-cases. The response of any of the below search API is thus, dependent on the use-case agreed upon between MapmyIndia & it's API consumer.
3. For any further clarifications on what all of the response structure is available for your use case, please contact your business relationship manager or contact MapmyIndia API support.
4. PREMIUM APIs/Parameters are not available for evalulation on signup. To get access, please contact API Support.
5. `lang` is a premium response parameter linked to our regional language support. Only clients who have specific agreements for its usage will be able to get this in their response parameter.

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
	- *`zoom`*  (double): takes the zoom level of the current scope of the map (min: 4, max: 18). This optional parameter & its related effect on response is not applicable for regions apart from India (IND). 
	- *`region`* (string): it takes in the country code. Possible values are listed in a table [here](https://github.com/MapmyIndia/mapmyindia-rest-api/blob/master/docs/countryISO.md). Default is India (IND)
	- *`tokenizeAddress`* (valueless) provides the different address attributes in a structured object.
	- *`pod`*  (string) = it takes in the place type code which helps in restricting the results to certain chosen type. This optional parameter & its related effect on response is not applicable for regions apart from India (IND).
    Below mentioned are the codes for the pod -
	    -  *`SLC`*: Sublocality
	    - *`LC`*: Locality
	    - *`CITY`*: City
	    - *`VLG`*: Village
	    - *`SDIST`*: Subdistrict
	    - *`DIST`*: District
	    - *`STATE`*: State
	    - *`SSLC`*: Subsublocality
    - *`filter`*  = this parameter helps you restrict the result either by mentioning a bounded area or to certain eloc or to a PIN(6 digit code to any poi, locality, city, etc.). This optional parameter & its related effect on response is not applicable for regions apart from India (IND). Below mentioned are the both types -  
	    - *`filter = pin: It takes pincode/postal code of an area`* `{e.g. filter=pin:110055}`
	    - *`filter = bounds: lat1, lng1; lat2, lng2`* `(latitude, longitude) 
	    {e.g. filter=bounds: 28.598882, 77.212407; 28.467375, 77.353513`}
	    - *`filter  = cop: {eloc}`* (string) 
	    {e.g. `filter=cop:YMCZ0J`}
	- *`bridge`* (valueless): initiates a bridge to be created to provide applicable nearby API searches in the `suggestedSearches` response object. This optional parameter & its related effect on response is not applicable for regions apart from India (IND).
    - *`hyperLocal`* (valueless): This parameter lets the search give results that are hyper-localized to the reference location passed in the `location` parameter. This means that nearby results are given higher ranking than results far from the reference location. Highly prominent results will still appear in the search results, however theu will be lower in the list of results. This parameter will work ONLY in conjunction with the `location` parameter. This optional parameter & its related effect on response is not applicable for regions apart from India (IND).

## Response Parameters

Multiple objects: 

a. suggestedLocations ([object array])

1. `eLoc` (string): Place Id of the location 6-char alphanumeric.
2. `placeName` (string): Name of the location.
3. `placeAddress` (string): Address of the location.
4. `type` (string): type of location POI or Country or City
5. `latitude` (double): Latitude of the location.
Geometry information is NOT available in most use-case driven response; and is RESTRICTED.
6. `longitude` (double): longitude of the location.
Geometry information is NOT available in most use-case driven response; and is RESTRICTED.
7. `entryLatitude` (double): Entry point Latitude of the location.
Geometry information is NOT available in most use-case driven response; and is RESTRICTED.
8. `entryLongitude` (double): Entry point longitude of the location.
Geometry information is NOT available in most use-case driven response; and is RESTRICTED.
9. `orderIndex` (integer): the order where this result should be placed
10. `keywords` (object): contains the category code to which the POI result(if applicable) belongs to.
11. `addressTokens` (object) Address token information is NOT available in generic response; and is RESTRICTED.
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

c. suggestedSearches ([object array])

1. `keyword` (string): what the user typed in.
2. `Identifier` (string): what did the API use for it to qualify it as a suggested search request
3. `location` (string): the name of the location to which the nearby will run in context to.
4. `hyperlink` (string): the ready-made link for the nearby API pre-initialized with all default parameters and location with code to search for.
5. `orderIndex` (integer): the order where this result should be placed.
6. `eLoc` (string): Place Id of the location 6-char alphanumeric. (if applicable)

d. `lang`<sup>1</sup> (string): used to indicate if the response is in some language other than the default(which is `en`). Valid values are `hi`, which indicates Hindi response.


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
            "latitude": RESTRICTED,
            "longitude": RESTRICTED,
            "eLoc": "DSEC7S",
            "entryLatitude": RESTRICTED,
            "entryLongitude": RESTRICTED,
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
            "latitude": RESTRICTED,
            "longitude": RESTRICTED,
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