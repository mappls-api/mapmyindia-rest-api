# Driving Distance-Time Matrix API

**Easy To Integrate Maps & Location APIs & SDKs For Web & Mobile Applications**

Powered with India's most comprehensive and robust mapping functionalities.
**Now Available**  for Srilanka, Nepal, Bhutan and Bangladesh

**Full documentation available here**: [https://www.mapmyindia.com/api/advanced-maps/doc/distance-api](https://www.mapmyindia.com/api/advanced-maps/doc/distance-api). 
You can get your api key to be used in this document here: [https://www.mapmyindia.com/api/signup](https://www.mapmyindia.com/api/signup)

## Introduction
Adding driving directions API would help to add predicted travel time & duration from a given origin point to a number of points. The Driving Distance Matrix API provides driving distance and estimated time to go from a start point to multiple destination points, based on recommended routes from MapmyIndia Maps and traffic flow conditions.

## Live Demo

[Click here to visit live demonstration page](https://www.mapmyindia.com/api/advanced-maps/doc/sample/mapmyindia-maps-distance-rest-api-example)

## Input Method
GET

## Input URL

`http://apis.mapmyindia.com/advancedmaps/v1/<licence_key>/distance?<Parameters>`

## Response Type

JSON


## Request Parameters
The “**bold**” one’s are mandatory, and the “*italic*” one’s are optional.

1.  **`center`**: the start (departure) point of the route in WGS-84 coordinates, formatted as latitude,longitude.
2.  **`pts`**: coordinates of location whose distance from centre are calculated. Format for each coordinate is the same as for the centre, and they are | delimited, for example 29.2074,78.9475|30.0763,78.0807.
**Note**: **A maximum of 10 locations** can be used for distance calculation from centre.
3.  **`Licence_key`**: the REST API licence key allocated to you by signing into our services and registering yourself as a developer (28 Char Alphanumeric).
4.  *`region`* (string): it takes in the country code. LKA, IND, BTN, BGD, NPL for Sri-Lanka, India, Bhutan, Bangladesh, Nepal respectively. Default is India (IND)
5. *`rtype`* ype of route (integer) required for navigation, where values mean:  
	- `0` quickest (default)  
	- `1` shortest
6.  *`vtype`* type of route (integer) required for navigation, where values mean:  
	- `0` quickest (default)  
	- `1` shortest
7. *`avoids`* The parameter to avoid road types along the route with default value “None (0) or (0000)” Please Note: To get correct combination for your preferred avoidances: Refer to the below table:

| Highways | Unpaved Roads | Ferries | Toll Roads |
| ----- | ----- | ----- | ----- |
| x | x | x | x | 

>Here x is replaced by Boolean ‘1’ indicating the type of road you wish to avoid. Combine the above 4 bits and convert the resulting 4-bit binary to decimal notation to derive your valid input value for the API. Examples:  
	- 1: avoid toll roads (binary: 0001)  
	- 2: avoid ferries (binary: 0010)  
	- 6: avoid unpaved roads and ferries (binary: 0110)  
	- 10: avoid highways and ferries (binary: 1010)  
thus, to get avoidances for ferries and highways; avoids=10

8. *`with_traffic`* Accepts boolean 0 or 1 values; The default value if not specified is 1. This parameter is used to get ETA and distance details by taking live traffic flow into account while calculating. Default 1 means, that live traffic is taken into account while calculating ETA and distance for a route.


## Sample Input

`http://apis.mapmyindia.com/advancedmaps/v1/<licence_key>/distance?center=28.54589623,77.285698&pts=28.453003,77.499817|28.610242,77.229277|28.619392,77.288911`

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
>  Written with [StackEdit](https://stackedit.io/) by MapmyIndia.