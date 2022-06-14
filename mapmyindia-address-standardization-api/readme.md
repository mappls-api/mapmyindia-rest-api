[<img src="https://www.mapmyindia.com/api/img/mapmyindia-api.png" height="40"/> </p>](https://about.mappls.com/api/)

# MapmyIndia Address Standardization API

**Easy To Integrate Maps & Location APIs & SDKs For Web & Mobile Applications**

Powered with India's most comprehensive and robust mapping functionalities.
**Now Available**  for Srilanka, Nepal, Bhutan, Myanmar and Bangladesh

You can get your api key to be used in this document here: [https://www.mapmyindia.com/api/](https://www.mapmyindia.com/api/)

## Introduction
Address Standardization API is a process to convert the non formatted address into the user readable format by omitting unnecessary information in the address. MapmyIndia address standardization API provides real addresses along with admin and other information.

## Live Demo

You can also experience this address standardization API through our demo. For experience please [click here](https://www.mapmyindia.com/api/advanced-maps/woodpecker_demo/)

## Security Type
This APIs follow OAuth2 based security. **To know more on how to create your authorization tokens, please use our authorization token URL. More details available**  [here](https://www.mapmyindia.com/api/advanced-maps/doc/authentication-api.php)

## Request Headers

The API leverages OAuth 2.0 based security. Hence, the developer would need to send a request for access token using their client_id and client_secret to the OAuth API. Once validated from the OAuth API, the access_token and the token_type need to be sent as Authorization header with the value: “{token_type} {access_token}”.

-  `Authorization:  “token_type access_token”`.


## Input Method
GET

## Input URL

[https://atlas.mapmyindia.com/api/places/woodpecker?address=237, Okhla industrial estate phase 3 new Delhi, Delhi 110020](https://atlas.mapmyindia.com/api/places/woodpecker?address=237,%20Okhla%20industrial%20estate%20phase%203%20new%20Delhi,%20Delhi%20110020)

## Request Parameters

### Mandatory Parameters

 - `address`(string): e.g. 237 Okhla industrial estate phase 3 new Delhi, Delhi 110020

### Optional Parameters

- `bias`(float): parameter value can be set to get the bias result towards the urban or rural side. (Default is 1.5 : urban). Where 1 is neutral and < 1 is rural biased and > 1 is Urban biased.

## Response Parameters

1. `inputAddress`(string): Address given by the user.
2. `remainingAddress`(string): Part of input address left after tagging the admin and other information.
3. `referentialInformation`: (object)
	- `pincode`(string): PIN code tagged from input address if found any.
	- `floors` (string): Floor info tagged from input address if found any.
	- `roads` (string): 
	- `postOffices`(list): Post offices tagged from the input address if found any.
	- `careOfs`(string): Care of (C/O) tagged from the input address if found any.
	- `landmarks`(string): Landmark tagged from the input address if found any.
	- `houseNumber`(string): House number information tagged from the input address if found any.
4. `addressInformation` (object): 
	- `adminDetails` (object): 
		- [`adminType`](#adminTypes) (array of objects or a single object): name & aliases of the state of the input address and how it was deduced from provided info.
			- `aliasName`(string): Alternate name of the admin.
			- `originalName` (string): Original name of the admin.
			- `pincode` (number):  the pincode deduced for the admin.
			- `finder` (string): the mechanism & component used to deduce the admin.
			- `typedName` (string): The sub-string that was typed in the query.
	- `adminPattern` (array of strings): list of standardized [`adminType`](#adminTypes) tags extracted from the input address.
5. `alternatives` (array of objects): This array contains address objects which are detected as alternatives to the provided list of address information present in the `addressInformation` object. Each object contains: 
	- `adminPattern` (string): one of the list of standardized [`adminType`](#adminTypes) tags extracted from the input address.
	- `originalName` (string): Original name of the admin.
	- `addressParts` (string): the input address sub-string againsts which this alternate address object is provided.
6. `formattedAddress` (string): The full fomatted human readable address provided after address standardization.

### <a name="adminTypes">Admin Types</a>
1. `state`
2. `city`
3. `locality`
4. `subLocality`
5. `subsubLocality`
6. `subDistrict`
7. `district`
8. `village`

## Response Type

- JSON

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

## Sample Input cURL

```js
curl --location --request GET 'https://atlas.mapmyindia.com/api/places/woodpecker?address=Shri Krishan Lal Nagpal Marg, Greater Kailash 1, E Block, Greater Kailash I, Greater Kailash, New Delhi, Delhi 110048&bias=1.5' \
--header 'Authorization: bearer 6xxxxxx4-9xxx-xxx7-xxxb-8dxxa7xxxdc'
```

## Sample Response

```json
{
    "inputAddress": "Shri Krishan Lal Nagpal Marg, Greater Kailash 1, E Block, Greater Kailash I, Greater Kailash, New Delhi, Delhi 110048",
    "remainingAddress": "",
    "referentialInformation": {
        "pincodes": "110048",
        "floors": null,
        "roads": [
            "Shri Krishan Lal Nagpal Marg"
        ],
        "postOffices": null,
        "careOfs": null,
        "landmarks": null,
        "houseNumbers": {
            "prefix": null,
            "houseNo": "1",
            "formatted": "1"
        }
    },
    "addressInformation": {
        "adminDetails": {
            "state": {
                "originalName": "Delhi"
            },
            "city": {
                "originalName": "New Delhi"
            },
            "locality": {
                "originalName": "Greater Kailash 1"
            },
            "subLocality": {
                "originalName": "Block E"
            },
            "pincodes": {
                "originalName": "110048"
            }
        },
        "adminPattern": [
            "state",
            "city",
            "locality",
            "subLocality",
            "pincodes"
        ]
    },
    "alternatives": [],
    "formattedAddress": "1, Shri Krishan Lal Nagpal Marg, Block E, Greater Kailash 1, New Delhi, Delhi, 110048"
}
```

<br>

For any queries and support, please contact: 

[<img src="https://www.mapmyindia.com/images/logo.png" height="40"/> </p>](https://www.mapmyindia.com/api)
Email us at [apisupport@mapmyindia.com](mailto:apisupport@mapmyindia.com)


![](https://www.mapmyindia.com/api/img/icons/support.png)
[Support](https://www.mapmyindia.com/api/index.php#f_cont)
Need support? contact us!

<br>

[<p align="center"> <img src="https://www.mapmyindia.com/api/img/icons/stack-overflow.png"/> ](https://stackoverflow.com/questions/tagged/mapmyindia-api)[![](https://www.mapmyindia.com/api/img/icons/blog.png)](http://www.mapmyindia.com/blog/)[![](https://www.mapmyindia.com/api/img/icons/gethub.png)](https://github.com/mappls-api)[<img src="https://mmi-api-team.s3.ap-south-1.amazonaws.com/API-Team/npm-logo.one-third%5B1%5D.png" height="40"/> </p>](https://www.npmjs.com/org/mapmyindia) 



[<p align="center"> <img src="https://www.mapmyindia.com/june-newsletter/icon4.png"/> ](https://www.facebook.com/MapmyIndia)[![](https://www.mapmyindia.com/june-newsletter/icon2.png)](https://twitter.com/MapmyIndia)[![](https://www.mapmyindia.com/newsletter/2017/aug/llinkedin.png)](https://www.linkedin.com/company/mapmyindia)[![](https://www.mapmyindia.com/june-newsletter/icon3.png)](https://www.youtube.com/user/MapmyIndia/)




<div align="center">@ Copyright 2022 CE Info Systems Ltd. All Rights Reserved.</div>

<div align="center"> <a href="https://www.mapmyindia.com/api/terms-&-conditions">Terms & Conditions</a> | <a href="https://www.mapmyindia.com/about/privacy-policy">Privacy Policy</a> | <a href="https://www.mapmyindia.com/pdf/mapmyIndia-sustainability-policy-healt-labour-rules-supplir-sustainability.pdf">Supplier Sustainability Policy</a> | <a href="https://www.mapmyindia.com/pdf/Health-Safety-Management.pdf">Health & Safety Policy</a> | <a href="https://www.mapmyindia.com/pdf/Environment-Sustainability-Policy-CSR-Report.pdf">Environmental Policy & CSR Report</a>

<div align="center">Customer Care: +91-9999333223</div>