![MapmyIndia APIs](https://www.mapmyindia.com/api/img/mapmyindia-api.png)

## [Table of Contents](#Table_of_Contents)
- ***[Introduction](#introduction)***
- ***[Input URL](#input-url)***
- ***[Input Method](#input-method)***
- ***[Request Parameters](#request-parameters)***
     - ***[a. Mandatory Parameters](#a-mandatory-parameters)*** 
- ***[Request Headers](#request-headers)***
- ***[1. Security Type](#1-security-type)***
     - ***[1.1 Response Type](#11-response-type)***
     - ***[1.2 Response Codes {as HTTP response codes}](#12-response-codes-as-http-response-codes)***
     - ***[1.3 Response Messages (as HTTP response messages)](#13-response-messages-as-http-response-messages)***
- ***[Response Parameters](#response-parameters)***
- ***[Claim Request Parameters](#claim-request-parameters)***
- ***[Sample Response](#sample-response)***

# [Place Details API](#Place_Details_API)

## [Introduction](#Introduction)

The Place detail API is to extract the details of a place with the help of its eLoc i.e. a 6 character code. Since a place may or may not have additional attributes associated with it, the response from the place details may be different for each record. However the response will be an extract from an existing set of master key-value pairs grouped as objects.

## [Input URL](#Input_URL) 
https://explore.mapmyindia.com/apis/O2O/entity/{eLoc}

## [Input Method](#Input_Method)

GET

## [Request Parameters](#Request_Parameter)

### [a. Mandatory Parameters](#a_Mandatory_Parameters)

**`eLoc`** :  eLoc of the place whose details are required. The 6-digit alphanumeric code for any location.

## [Request Headers](#Request-Headers)

The Atlas API leverages OAuth 2.0 based security. Hence, the developer would need to send a request for access token using their client_id and client_secret to the OAuth API. Once validated from the OAuth API, the access_token and the token_type need to be sent as Authorization header with the value: “{token_type} {access_token}”.

1. **`Authorization:`** `“{token_type} {access_token}”`

## [1. Security Type](#1_Security_Type)

Atlas OAuth 2.0 based security using AES 256 and SHA-1. **To know more on how to create your authorization tokens, please use our authorization token URL. More details available**  [here](https://www.mapmyindia.com/api/advanced-maps/doc/authentication-api.php)

## [1.1 Response Type](#1_1_Response_Type)

- JSON

## [1.2 Response Codes {as HTTP response codes}](#1_2_Response_Codes_{as_HTTP_response_codes})

#### [Success](#Success)

1. 200: To denote a successful API call.  
2. 204: To denote the API was a success but no results we’re found.  

#### [Client-Side Issues](#Client_Side_Issues) 

3. 400: Bad Request, User made an error while creating a valid request. 
4. 401: Unauthorized, Developer’s key is not allowed to send a request.
5. 403: Forbidden, Developer’s key has hit its daily/hourly limit 

#### [Server-Side Issues](#Server-Side_Issues)

6. 500: Internal Server Error, the request caused an error in our systems.
7. 503: Service Unavailable, during our maintenance break or server downtimes.

## [1.3 Response Messages (as HTTP response messages)](#1_3_Response_Messages_(as_HTTP_response_messages))

1. 200: Success. 
2. 204: No matches we’re found for the provided query. 
3. 400: Something’s just not right with the request. 
4. 401: Access Denied. 
5. 403: Services for this key has been suspended due to daily/hourly transactions limit. 
6. 500: Something went wrong. 
7. 503: Maintenance Break.

## [Place Detail with Sub Template based Configuration](#Place_Detail_with_Sub_Template_based_Configuration)

The API is highly configurable to  configuration enables to provide the required set of attributes to the user on the basis of assigned sub templates.
The default configuration with available with basic pay-as-you-go rates is that of `General Details` subtemplate.

## [Response Parameters for Place Details - Sub Templates](#Response_Parameters_for_Place_Details-Sub_Templates)

The parameters are group in sub templates. Here is the list of attributes with sub template information.  

#### [Subtemplate 1 : General Details](#Subtemplate_1_:_Sbt_general_details)
1.	Eloc (string) : 6 characters alphanumeric unique identifier 
2.	placeName (string) : Name of the place 
3.	address (string) : address of the place 
4.	type: defines the type of location matched (HOUSE_NUMBER, HOUSE_NAME, POI, 
	STREET, SUB_LOCALITY, LOCALITY, VILLAGE, DISTRICT, SUB_DISTRICT, CITY, STATE, 
     SUBSUBLOCALITY, PINCODE)

#### [Subtemplate 2 : Admin Tokens (PREMIUM OFFERING)](#Subtemplate_2_:_sbt_admin_token)
1.	city (string): The name of the city in which the location exists.
2.	district (string): The name of the district in which the location exists.
3.	pincode (string): The pin code of the location area.
4.	subDistrict (string): The name of the sub-district in which the location exists. 
5.	state (string): The name of the state in which the location exists.

#### [Subtemplate 3 : Address Tokens (PREMIUM OFFERING)](#Subtemplate_3_:_sbt_address_token)
1.	houseNumber (string): The house number of the location. 
2.	houseName (string): The name of the location.
3.	locality (string): The name of the locality where the location exists. 
4.	street (string): The name of the street of the location.
5.	subSubLocality (string): The name of the sub-sub-locality where the location exists. 
6.	subLocality (string): The name of the sub-locality where the location exists.
7.	village (string): The name of the village if the location exists in a village.
8.	poi (string): The name of the POI if the location is a place of interest (POI).

#### [Subtemplate 4 : Contact Details (PREMIUM OFFERING)](#Subtemplate_4_:_sbt_contact_details)

1.	Email
2.	Mobile
3.	Telephone
4.	Website


#### [Subtemplate 5 : Location Coordinates (PREMIUM OFFERING)](#Subtemplate_5_:_sbt_loc_coordinates)

1.	latitude(double): The latitude of the location. 
2.	longitude(double): The longitude of the location.

#### [Subtemplate 6 : E/E Coordinates (PREMIUM OFFERING)](#Subtemplate_6_:_sbt_nav_coordinates)

1.	Entry_lat(double):The entry latitude of the location.
2.	Entry_lon(double):The entry longitude of the location.



## [Sample Response](#Sample-Response)

**1.`Subtemplate Claim set`** subTemplates = Admin Tokens, Address Tokens, General Details

**`Input URL:`** https://explore.mapmyindia.com/apis/O2O/entity/3F45CB

**`Response:`**

```
{
    "type": "POI",
    "poi": "The Lalit New Delhi",
    "locality": "Connaught Place",
    "district": "New Delhi District",
    "subDistrict": "Connaught Place",
    "city": "New Delhi",
    "state": "Delhi",
    "pincode": "110001",
    "address": "15, Barakhamba Avenue, Connaught Place, New Delhi, Delhi, 110001",
    "name": "The Lalit New Delhi",
    "eloc": "3F45CB"
}
```

**2. `Provider with subtemplate claim set: `** subTemplates = General Details, Location Coordinates

<**`Input URL:`** https://explore.mapmyindia.com/apis/O2O/entity/3F45CB

**`Response:`**

```
{
    "type": "POI",
    "address": "15, Barakhamba Avenue, Connaught Place, New Delhi, Delhi, 110001",
    "name": "The Lalit New Delhi",
    "eloc": "3F45CB",
    "latitude": RESTRICTED,
    "longitude": RESTRICTED
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