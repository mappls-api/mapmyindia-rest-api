# Route / Driving Directions API

**Easy To Integrate Maps & Location APIs & SDKs For Web & Mobile Applications**

Powered with India's most comprehensive and robust mapping functionalities.
**Now Available**  for Srilanka, Nepal, Bhutan and Bangladesh

**Full documentation available here**: [https://www.mapmyindia.com/api/advanced-maps/doc/route-api](https://www.mapmyindia.com/api/advanced-maps/doc/route-api). 
You can get your api key to be used in this document here: [https://www.mapmyindia.com/api/signup](https://www.mapmyindia.com/api/signup)

## Introduction
Routing and displaying driving directions on map, including instructions for navigation, distance to destination, traffic etc. are few of the most important parts of developing a map based application. This REST API calculates driving routes between specified locations including via points based on route type(fastest or shortest), includes delays for traffic congestion , and is capable of handling additional route parameters like: type of roads to avoid, travelling vehicle type etc.

## Live Demo

[Click here to visit live demonstration page](https://www.mapmyindia.com/api/advanced-maps/doc/sample/mapmyindia-maps-route-rest-api-example)

## Input Method
GET

## Input URL

`https://apis.mapmyindia.com/advancedmaps/v1/<licence_key>/route?<Parameters>`

## Response Type

JSON


## Request Parameters
The “**bold**” one’s are mandatory, and the “*italic*” one’s are optional.

1.  **`start`**: the start (departure) point of the route in WGS-84 coordinates, formatted as latitude,longitude.
2.  **`destination`**: the destination of the route in WGS-84 coordinates, formatted as formatted as latitude,longitude.
3.  **`Licence_key`**: the REST API licence key allocated to you by signing into our services and registering yourself as a developer (28 Char Alphanumeric).
4.  *`region`* (string): it takes in the country code. LKA, IND, BTN, BGD, NPL for Sri-Lanka, India, Bhutan, Bangladesh, Nepal respectively. Default is India (IND)
5. *`viapoints`* the optional list of via-points, pipe ( | ) separated. The complete route will therefore be start – via points in provided order – destination.
Note: "Maximum of 16 via points can be added." Also, look at the pricing pages on our website to know about the pricing and transactions for the use of via points in the API.
6. *`rtype`* ype of route (integer) required for navigation, where values mean:  
	- `0` quickest (default)  
	- `1` shortest
7.  *`vtype`* type of route (integer) required for navigation, where values mean:  
	- `0` quickest (default)  
	- `1` shortest
8. *`avoids`* The parameter to avoid road types along the route with default value “None (0) or (0000)” Please Note: To get correct combination for your preferred avoidances: Refer to the below table:

| Highways | Unpaved Roads | Ferries | Toll Roads |
| ----- | ----- | ----- | ----- |
| x | x | x | x | 

>Here x is replaced by Boolean ‘1’ indicating the type of road you wish to avoid. Combine the above 4 bits and convert the resulting 4-bit binary to decimal notation to derive your valid input value for the API. Examples:  
	- 1: avoid toll roads (binary: 0001)  
	- 2: avoid ferries (binary: 0010)  
	- 6: avoid unpaved roads and ferries (binary: 0110)  
	- 10: avoid highways and ferries (binary: 1010)  
thus, to get avoidances for ferries and highways; avoids=10

9. *`alternatives`* (true or false) : parameter to toggle alternative routes. If “true” is sent, alternative routes will be provided; else not. Default is false.
10. *`with_traffic`* Accepts boolean 0 or 1 values; The default value if not specified is 1. This parameter is used to get ETA and distance details by taking live traffic flow into account while calculating. Default 1 means, that live traffic is taken into account while calculating ETA and distance for a route.


## Sample Input

`http://apis.mapmyindia.com/advancedmaps/v1/<licence_key>/route?start=28.111,77.111&destination=28.22,77.22&alternatives=true&with_advices=1`

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
