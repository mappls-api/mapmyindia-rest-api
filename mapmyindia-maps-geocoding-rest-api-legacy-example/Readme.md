# Geocoding API

**Easy To Integrate Maps & Location APIs & SDKs For Web & Mobile Applications**

Powered with India's most comprehensive and robust mapping functionalities.
**Now Available**  for Srilanka, Nepal, Bhutan and Bangladesh

**Full documentation available here**: [https://www.mapmyindia.com/api/advanced-maps/doc/geocoding-api](https://www.mapmyindia.com/api/advanced-maps/doc/geocoding-api). 
You can get your api key to be used in this document here: [https://www.mapmyindia.com/api/signup](https://www.mapmyindia.com/api/signup)

## Introduction
All mapping APIs that are used in mobile or web apps need some geo-position coordinates to refer to any given point on the map. Our Geocoding API converts real addresses into these geographic coordinates (latitude/longitude) to be placed on a map, be it for any street, area, postal code, POI or a house number etc.

## Live Demo

[Click here to visit live demonstration page](https://www.mapmyindia.com/api/advanced-maps/doc/sample/mapmyindia-maps-geocoding-rest-api-example)

## Input Method
GET

## Input URL

`https://apis.mapmyindia.com/advancedmaps/v1/<licence_key>/geo_code?addr=<query>&pin=<query`

## Response Type

JSON


## Request Parameters
The “**bold**” one’s are mandatory, and the “*italic*” one’s are optional.

1.  **`addr`**: The below are the supported input queries,  
    a.  eLoc: The 6-digit alphanumeric code for any location. (e.g. mmi000).  
    b.  address: The address of a location (e.g. 237 Okhla Phase-III).  
    c.  POI: The name of the location (e.g. MapmyIndia Head Office).  
    d.  House Number: The house number of the location in case full address is unknown  
    (e.g. P 18/114).
2.  *`pin`*: The pin-code of area (e.g. 110020).
3.  **`Licence_key`**: the REST API licence key allocated to you by signing into our services and registering yourself as a developer (28 Char Alphanumeric).
4.  *`region`* (string): it takes in the country code. LKA, IND, BTN, BGD, NPL for Sri-Lanka, India, Bhutan, Bangladesh, Nepal respectively. Default is India (IND)


## Sample Input

`https://apis.mapmyindia.com/advancedmaps/v1/<licence_key>/geo_code?addr=saket`

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