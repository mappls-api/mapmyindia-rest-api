# Place Details / eLoc API

**Easy To Integrate Maps & Location APIs & SDKs For Web & Mobile Applications**

Powered with India's most comprehensive and robust mapping functionalities.
**Now Available**  for Srilanka, Nepal, Bhutan and Bangladesh

**Full documentation available here**: [https://www.mapmyindia.com/api/advanced-maps/doc/eloc-api](https://www.mapmyindia.com/api/advanced-maps/doc/eloc-api). 
You can get your api key to be used in this document here: [https://www.mapmyindia.com/api/signup](https://www.mapmyindia.com/api/signup)

## Introduction
MapmyIndia eloc is a simple, standardized and precise pan-India digital address system. Every location has been assigned a unique digital address or an eLoc. The eLoc API can be used to extract the details of a place with the help of its eLoc i.e. a 6 digit code or a place_id.

## Live Demo

[Click here to visit live demonstration page](https://www.mapmyindia.com/api/advanced-maps/doc/sample/mapmyindia-maps-place-details-api-example)

## Input Method
GET

## Input URL

`https://apis.mapmyindia.com/advancedmaps/v1/<licence_key>/place_detail?place_id=<eLoc>`

## Response Type

JSON


## Request Parameters
The “**bold**” one’s are mandatory, and the “*italic*” one’s are optional.

1.  **`place_id`**: the id or eLoc of the place whose details are required. The 6-digit alphanumeric code for any location. (e.g. mmi000).
2.  **`Licence_key`**: the REST API licence key allocated to you by signing into our services and registering yourself as a developer (28 Char Alphanumeric).
3.  *`region`* (string): it takes in the country code. LKA, IND, BTN, BGD, NPL for Sri-Lanka, India, Bhutan, Bangladesh, Nepal respectively. Default is India (IND)


## Sample Input

`https://apis.mapmyindia.com/advancedmaps/v1/<licence_key>/place_detail?place_id=D75CA2`

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
