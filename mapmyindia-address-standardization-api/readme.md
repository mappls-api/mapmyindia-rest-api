[![N|Solid](https://www.mapmyindia.com/api/img/mapmyindia-api.png)](https://www.mapmyindia.com/api/)
# MapmyIndia Address Standardization API

**Easy To Integrate Maps & Location APIs & SDKs For Web & Mobile Applications**

Powered with India's most comprehensive and robust mapping functionalities.
**Now Available**  for Srilanka, Nepal, Bhutan and Bangladesh

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

## Sample Input

```css
https://atlas.mapmyindia.com/api/places/woodpecker?address=Sh Krishan Lal Nagpal Marg, Greater Kailash-1, C Block, Greater Kailash I, Greater Kailash, New Delhi, Delhi 110048
```

## Sample Response

```json
{
	"inputAddress": "Sh Krishan Lal Nagpal Marg, Greater Kailash-1, C Block, Greater Kailash I, Greater Kailash, New Delhi, Delhi 110048",
	"remainingAddress": "sh krishan lal nagpal marg, greater kailash, - 1 greater kailash, new",
	"referentialInformation": {
		"pincodes": "110048",
		"floors": null,
		"roads": null,
		"postOffices": null,
		"careOfs": null,
		"landmarks": null,
		"houseNumbers": null
	},
	"addressInformation": {
		"adminDetails": {
			"state": {
				"aliasName": "delhi",
				"originalName": "Delhi",
				"pincode": 110048,
				"finder": "address"
			},
			"city": {
				"aliasName": "delhi",
				"originalName": "New Delhi",
				"pincode": 110048,
				"finder": "address"
			},
			"locality": {
				"aliasName": "greater kailash i",
				"originalName": "Greater Kailash 1",
				"pincode": 110048,
				"finder": "address"
			},
			"subLocality": [
				{
					"aliasName": "block c",
					"originalName": "Block C",
					"pincode": 110048,
					"finder": "address"
				}
			]
		},
		"adminPattern": [
			"state",
			"city",
			"locality",
			"subLocality"
		]
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