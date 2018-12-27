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
	- **`keywords`***  (string) e.g. FODCOF, Shoes, Coffee, Versace, Gucci, H&M, Adidas, Starbucks, B130 {POI, House Number, keyword, tag}
	- **`refLocation`**  {string (latitude[double],longitude[double])}: Provides the location around which the search will be performed. e.g. `refLocation=28.454,77.435`
2.  Optional Parameters:
	- *`page`*  (integer): provides number of the page to provide results from.
	- *`region`* (string): it takes in the country code. LKA, IND, BTN, BGD, NPL for Sri-Lanka, India, Bhutan, Bangladesh, Nepal respectively. Default is India (IND)
	- *`radius*` (integer): provides the range of distance to search over (default: 1000, min: 500, max: 10000).
	- *`bounds`* (x1,y1;x2,y2): Allows the developer to send in map bounds to provide a nearby search of the geobounds; where x1,y1 are the lat-lng of the bound.
	- *`sortBy`* (string): provides configured sorting operations for the client on cloud. Below are the available sorts:
		- *`dist:asc`*  (default) & 
		- *`dist:desc`* - will sort data in order of distance from the passed location.


## Sample Input

https://atlas.mapmyindia.com/api/places/nearby/json?keywords=coffee;beer&refLocation=28.631460,77.217423

For more details, please visit our full documentation.

For any queries and support, please contact: 

![Email](https://www.google.com/a/cpanel/mapmyindia.co.in/images/logo.gif?service=google_gsuite) 
Email us at [apisupport@mapmyindia.co.in](mailto:apisupport@mapmyindia.co.in)

![](https://www.mapmyindia.com/api/img/icons/stack-overflow.png)
[Stack Overflow](https://stackoverflow.com/questions/tagged/mapmyindia-api)
Ask a question under the mapmyindia-api

![](https://www.mapmyindia.com/api/img/icons/support.png)
[Support](https://www.mapmyindia.com/api/index.php#f_cont)
Need support? contact us!

![](https://www.mapmyindia.com/api/img/icons/blog.png)
[Blog](http://www.mapmyindia.com/blog/)
Read about the latest updates & customer stories


> © Copyright 2018. CE Info Systems Pvt. Ltd. All Rights Reserved. | [Terms & Conditions](http://www.mapmyindia.com/api/terms-&-conditions)
>  Written with [StackEdit](https://stackedit.io/) by MapmyIndia.