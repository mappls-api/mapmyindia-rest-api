# Geocoding API

**Easy To Integrate Maps & Location APIs & SDKs For Web & Mobile Applications**

Powered with India's most comprehensive and robust mapping functionalities.
**Now Available**  for Srilanka, Nepal, Bhutan, Myanmar and Bangladesh

You can get your api key to be used in this document here: [https://www.mapmyindia.com/api/signup](https://www.mapmyindia.com/api/signup)

# Note 
1. The response listed in the below documentation is ONLY indicative of the overall capabilities of MapmyIndia's Search APIs.
2. Not all response parameters mentioned in the below documentation is assured to be present in all the use-cases. The response of any of the below search API is thus, dependent on the use-case agreed upon between MapmyIndia & it's API consumer.
3. For any further clarifications on what all of the response structure is available for your use case, please contact your business relationship manager or contact MapmyIndia API support.
4. PREMIUM APIs/Parameters are not available for evalulation on signup. To get access, please contact API Support.

## Introduction
All mapping APIs that are used in mobile or web apps need some geo-position coordinates to refer to any given point on the map. Our Geocoding API converts real addresses into these geographic positional information(eLoc) to be placed on a map, be it for any street, area, postal code, POI or a house number etc.

## Live Demo

[Click here to visit live demonstration page](https://www.mapmyindia.com/api/advanced-maps/doc/sample/mapmyindia-vector-maps-atlas-geocoding-rest-api-example.php)

## Input URL

`https://atlas.mapmyindia.com/api/places/geocode?`

## Input Method
GET

## Security Type
This APIs follow OAuth2 based security. **To know more on how to create your authorization tokens, please use our authorization token URL. More details available**  [here](https://www.mapmyindia.com/api/advanced-maps/doc/authentication-api.php)

## Request Headers

The API leverages OAuth 2.0 based security. Hence, the developer would need to send a request for access token using their client_id and client_secret to the OAuth API. Once validated from the OAuth API, the access_token and the token_type need to be sent as Authorization header with the value: “{token_type} {access_token}”.

-  `Authorization:  “token_type access_token”`.

## Request Parameters

### Mandatory Parameters

1.  **`address`**: (string) address to be geocoded e.g. 237 Okhla industrial estate phase 3 new delhi, delhi 110020.

### Optional Parameter

2.  *`itemCount`*  (integer): parameter can be set to get maximum number of result items from the API (default: 1).
3. *`bias`*  (integer): This parameter can be used to set Urban or Rural bias. A positive value sets the Urban bias and a negative value sets Rural bias. Allowed values are:
	- `0` : Default: (No bias)
	- `-1` : Rural
	- `1` : Urban
4. *`podFilter`*  (string): This parameter can be used to set admin level restriction. The result will be either the given admin level or equivalent admin or higher in the hierarchy. No lower admin will be considered for geocoding.
Allowed values are:
	- `hno` : house number
	- `hna` : house name
	- `poi` : point of interest
	- `street` : street
	- `sslc` : sub sub locality
	- `village` : village
	- `slc` : sub locality
	- `sdist` : sub district
	- `loc` : locality
	- `city` : city
	- `dist` : district
	- `pincode` :pincode
	- `state` : state
5. *`bound`*  (string): This parameter can be used to set admin boundary, which means geocoding will be done within the given admin. The allowed admin bounds are **Sub-District**, **District**, **City**, **State** and **Pincode**. The parameter accepts the admin eLoc as value.

**Note**: Please note that `podFilter` & `bound` parameters are mutually exclusive. They cannot be used together in an API call.

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
Server-Side Issues:
6. 500: Internal Server Error, the request caused an error in our systems.
7. 503: Service Unavailable, during our maintenance break or server down-times.

## Response Messages 

**Note**: as HTTP response message

1. 200: Success.
2. 204: No matches we’re found for the provided query.
3. 400: Something’s just not right with the request.
4. 401: Access Denied.
5. 403: Services for this key has been suspended due to daily/hourly transactions limit.
6. 500: Something went wrong.
7. 503: Maintenance Break.

## Response Parameters
1. `houseNumber`(string): the houseNumber of the address/location.
2. `houseName`(string): houseName of the address/location.
3. `poi`(string): the point of interest or famous landmark nearby the location.
4. `street`(string): the street or road of the location.
5. `subsubLocality`(string): the subSubLocality of the location.
6. `subLocality`(string): the subLocality of the location.
7. `locality`(string): the locality of the location.
8. `village`(string): the village of the location.
9. `subDistrict`(string): the subDistrict of the location.
10. `district`(string): the district of the location.
11. `city`(string): the city of the location.
12. `state`(string): the state of the location.
13. `pincode`(string): the pincode of the location.
14. `formattedAddress`(string): the general protocol following address.
15. `eloc`(string): eloc of the particular location.
16. `latitude`(double): the latitude for the location.
Geometry information is NOT available in most use-case driven response; and is RESTRICTED.
17. `longitude`(double): the longitude for the location.
Geometry information is NOT available in most use-case driven response; and is RESTRICTED.
18. `geocodeLevel`(string): the best matched address component.
19. `confidenceScore`(float): the confidence for current of geocodelevel.

## Sample Input

`https://atlas.mapmyindia.com/api/places/geocode?address=mapmyindia 237 okhla phase 3`

## Sample Output

### Single item response
```json
{
    "copResults": {
        "houseNumber": "237",
        "houseName": "",
        "poi": "",
        "street": "",
        "subSubLocality": "",
        "subLocality": "",
        "locality": "Okhla Industrial Estate Phase 3",
        "village": "",
        "subDistrict": "Kalkaji",
        "district": "South East Delhi District",
        "city": "New Delhi",
        "state": "Delhi",
        "pincode": "110020",
        "formattedAddress": "237, Okhla Industrial Estate Phase 3, Kalkaji, South East Delhi District, New Delhi, Delhi, 110020",
        "eLoc": "TIYF9Q",
        "latitude": RESTRICTED,
        "longitude": RESTRICTED,
        "geocodeLevel": "houseNumber",
        "confidenceScore": 0.4
    }
}
```

### Multiple item response
```json
{
    "copResults": [
        {
            "houseNumber": "",
            "houseName": "",
            "poi": "",
            "street": "",
            "subSubLocality": "",
            "subLocality": "",
            "locality": "Lady Irwin College Campus",
            "village": "",
            "subDistrict": "Connaught Place",
            "district": "New Delhi District",
            "city": "New Delhi",
            "state": "Delhi",
            "pincode": "110001",
            "formattedAddress": "Lady Irwin College Campus, Connaught Place, New Delhi District, New Delhi, Delhi, 110001",
            "eLoc": "BGKAFR",
            "latitude": RESTRICTED,
            "longitude": RESTRICTED,
            "geocodeLevel": "locality",
            "confidenceScore": 1
        },
        {
            "houseNumber": "",
            "houseName": "",
            "poi": "Lady Irwin College",
            "street": "Sikandra Road",
            "subSubLocality": "",
            "subLocality": "",
            "locality": "Lady Irwin College Campus",
            "village": "",
            "subDistrict": "Connaught Place",
            "district": "New Delhi District",
            "city": "New Delhi",
            "state": "Delhi",
            "pincode": "110001",
            "formattedAddress": "Lady Irwin College, Sikandra Road, Lady Irwin College Campus, Connaught Place, New Delhi District, New Delhi, Delhi, 110001",
            "eLoc": "38FD1E",
            "latitude": RESTRICTED,
            "longitude": RESTRICTED,
            "geocodeLevel": "street",
            "confidenceScore": 0.8
        },
        {
            "houseNumber": "",
            "houseName": "",
            "poi": "Mandi House Metro Station",
            "street": "Sikandra Road",
            "subSubLocality": "",
            "subLocality": "",
            "locality": "Connaught Place",
            "village": "",
            "subDistrict": "Connaught Place",
            "district": "New Delhi District",
            "city": "New Delhi",
            "state": "Delhi",
            "pincode": "110001",
            "formattedAddress": "Mandi House Metro Station, Sikandra Road, Connaught Place, Connaught Place, New Delhi District, New Delhi, Delhi, 110001",
            "eLoc": "DF2F4C",
            "latitude": RESTRICTED,
            "longitude": RESTRICTED,
            "geocodeLevel": "street",
            "confidenceScore": 0.4
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