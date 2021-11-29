# Reverse Geocoding API

**Easy To Integrate Maps & Location APIs & SDKs For Web & Mobile Applications**

Powered with India's most comprehensive and robust mapping functionalities.

## Global Coverage Now Available !

Reverse Geocoding API is **Now Available**  for [238 countries](https://github.com/MapmyIndia/mapmyindia-rest-api/blob/master/docs/countryISO.md) across the world.

**Full documentation available here**: [https://www.mapmyindia.com/api/advanced-maps/doc/reverse-geocoding-api](https://www.mapmyindia.com/api/advanced-maps/doc/reverse-geocoding-api). 
You can get your api key to be used in this document here: [https://www.mapmyindia.com/api/](https://www.mapmyindia.com/api/)

## Introduction
Reverse Geocoding is a process to give the closest matching address to a provided geographical coordinates (latitude/longitude). MapmyIndia reverse geocoding API provides real addresses along with nearest popular landmark for any such geo-positions on the map. This API also works in Hindi language so for that you have to add new paramter introduced lang. 

## Live Demo

[Click here to visit live demonstration page](https://www.mapmyindia.com/api/advanced-maps/doc/sample/mapmyindia-maps-reverse-geocoding-rest-api-example)

## Input Method
GET

## Input URL

`https://apis.mapmyindia.com/advancedmaps/v1/<licence_key>/rev_geocode?lat=<latidude>&lng=<longitude>`

## Response Type

JSON


## Request Parameters
The “**bold**” one’s are mandatory, and the “*italic*” one’s are optional.

1.  **`lat`**: The latitude of the location for which the address is required.
2.  **`lng`**: The longitude of the location for which address is required.
3.  **`Licence_key`**: The REST API licence key allocated to you by signing into our services and registering yourself as a developer (32 Char Alphanumeric).
4.  *`region`*(string): This parameter is optional for India; for other countries (such as Sri Lanka, Nepal, Bangladesh, Bhutan + many more) this parameter is mandatory. Possible values are listed in a table [here](https://github.com/MapmyIndia/mapmyindia-rest-api/blob/master/docs/countryISO.md). Default is India (IND)
5.  *`lang`* (string): This parameter accepts the "hi" (ISO 639-1 Language Code for Hindi) as a value. 


## Sample Input

`https://apis.mapmyindia.com/advancedmaps/v1/<licence_key>/rev_geocode?lat=26.5645&lng=85.9914`

## Sample Output
```json
{
    "responseCode": 200,
    "version": "270.191",
    "results": [
        {
            "houseNumber": "",
            "houseName": "",
            "poi": "Panchayat Headquarter",
            "poi_dist": "508",
            "street": "Unnamed Road",
            "street_dist": "7",
            "subSubLocality": "",
            "subLocality": "",
            "locality": "",
            "village": "Basopatti",
            "district": "Madhubani District",
            "subDistrict": "Basopatti",
            "city": "",
            "state": "Bihar",
            "pincode": "847225",
            "lat": "26.5645",
            "lng": "85.9914",
            "area": "India",
            "formatted_address": "Unnamed Road, Basopatti, Basopatti, Madhubani District, Bihar. 508 m from Panchayat Headquarter pin-847225 (India)"
        }
    ]
}
```
<br> <br>



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
