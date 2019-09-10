
![MapmyIndia APIs](https://www.mapmyindia.com/api/img/mapmyindia-api.png)
# POI Along The Route

With POI Along the Route API user will be able to get the details of POIs of a particular category along his set route. The main focus of this API is to provide convenience to the user and help him in locating the place of his interest on his set route.

## API URL

1.  Basic URL structure:  
    https://apis.mapmyindia.in/advancedmaps/v1/<lic_key>/along_route?cat=FINATM&path=&buffer=1000&page=1&geometries=polyline5
2.  **Output**:The output format would be JSON.
3.  **HTTP Request Method**: POST

## Request Parameters

The following input parameters will be supported in the POI Along The Route API request

1.  `cat`: the unique code assigned to that POI category. (See Appendix B).
2.  `path`: Google Polyline Encoding
3.  `license_key`: the REST API licence key allocated to you.
4.  `buffer`: the radius on a particular point. (Min: 50mtr & Max: 1000mtr)
5.  `page`(integer): provides number of the page to provide results from.
6.  `geometries`=polyline5 or polyline6 or base64 (bydefault - geometries=polyline5)

**Note**: Buffer must be passed in body parameter and the request parameters would be sent in the format of .x-www-form-urlencoded..

## Response Parameters

The API returns an enveloped response with the POI Along the Route data in the results object.

The following output parameters will be supported in the POI along the route API response .

1.  `responseCode`:
2.  `version`:
3.  `results`: array of results, each consisting of the following parameters
4.  `poi`: the name of the POI
5.  `subSubLocality`:
6.  `subLocality`:
7.  `locality`:
8.  `city`:
9.  `subDistrict`:
10.  `district`:
11.  `poplrName`: the name by which the POI is popularly known as.
12.  `address`:
13.  `el`:
14.  `email`:
15.  `website`:
16.  `longitude`: longitude of the location.
17.  `latitude`: latitude of the location.
18.  `e_lng`: longitude of the location entry point.
19.  `e_lat`: latitude of the location entry point.
20.  `state`:
21.  `place_id`:
22.  `page_no.`: displays the current page number out of total

## Transaction Information

One request using the API link will be considered as one transaction.

## Example

**Input**:  
https://apis.mapmyindia.in/advancedmaps/v1/>licence_key/along_route?cat=FINATM&path=ypfmDe}rvMxCpGz@~FrCXdCnUbCe@mb@tMmDqF}ZwKuFpAyY|V{DzF}CxJRnZcB`PwB~B}Lz@q@b  
AtBjx@eDxy@mPvp@cEr_ByB@aBcEcEyAoTeBwNeEqIhCwAaBd@{XvKa_@c@mEuCwC&buffer=1000&page=1&geometries=polyline5
```json
{ 
	"responseCode": 200, 
	"version": "181.16", 
	"results": [ 
		{ 
			"poi": "HDFC ATM", 
			"subSubLocality": "", 
			"subLocality": "", 
			"locality": "Okhla Industrial Estate Phase 3", 
			"city": "New Delhi", 
			"subDistrict": "Kalkaji", 
			"district": "South East Delhi District", 
			"poplrName": null, 
			"address": "Okhla Industrial Estate Phase 3, New Delhi, Delhi, 110020", 
			"tel": null, 
			"email": null, 
			"website": null, 
			"longitude": "77.2715460000001", 
			"latitude": "28.5486020000001", 
			"e_lng": "77.271297", 
			"e_lat": "28.549", 
			"state": "Delhi", 
			"brand_code": "0", 
			"place_id": "9W5MZO" 
		}, 
		{ 
			"poi": "ICICI ATM", 
			"subSubLocality": "", 
			"subLocality": "", 
			"locality": "Harkesh Nagar", 
			"city": "New Delhi", 
			"subDistrict": "Kalkaji", 
			"district": "South East Delhi District", 
			"poplrName": null, 
			"address": "Harkesh Nagar, New Delhi, Delhi, 110020", 
			"tel": null, 
			"email": null, 
			"website": null, 
			"longitude": "77.2758620000001", 
			"latitude": "28.5457290000001", 
			"e_lng": "77.275918", 
			"e_lat": "28.54573", 
			"state": "Delhi", 
			"brand_code": "0", 
			"place_id": "MWCOK5" 
		}, 
		{ 
			"poi": "Punjab National Bank ATM", 
			"subSubLocality": "", 
			"subLocality": "", 
			"locality": "Kalkaji", 
			"city": "New Delhi", 
			"subDistrict": "Kalkaji", 
			"district": "South East Delhi District", 
			"poplrName": "PNB ATM", 
			"address": "Kalkaji, New Delhi, Delhi, 110019", 
			"tel": null, 
			"email": null, 
			"website": null, 
			"longitude": "77.258989", 
			"latitude": "28.5493920000001", 
			"e_lng": "77.258806", 
			"e_lat": "28.549349", 
			"state": "Delhi", 
			"brand_code": "0", 
			"place_id": "3CQV3N" 
		}, 
		{ 
			"poi": "State Bank of India ATM", 
			"subSubLocality": "", 
			"subLocality": "Tribhuwan Complex", 
			"locality": "Ishwar Nagar", 
			"city": "New Delhi", 
			"subDistrict": "Kalkaji", 
			"district": "South East Delhi District", 
			"poplrName": "SBI ATM", 
			"address": "Tribhuwan Complex, Ishwar Nagar, New Delhi, Delhi, 110065", 
			"tel": null, 
			"email": null, 
			"website": null, 
			"longitude": "77.266826", 
			"latitude": "28.5602250000001", 
			"e_lng": "77.26701", 
			"e_lat": "28.560301", 
			"state": "Delhi", 
			"brand_code": "0", 
			"place_id": "135S48" 
		}, 
		{ 
			"poi": "Federal Bank ATM", 
			"subSubLocality": "", 
			"subLocality": "", 
			"locality": "Nehru Place", 
			"city": "New Delhi", 
			"subDistrict": "Kalkaji", 
			"district": "South East Delhi District", 
			"poplrName": "FedBank ATM", 
			"address": "Nehru Place, New Delhi, Delhi, 110019", 
			"tel": null, 
			"email": null, 
			"website": null, 
			"longitude": "77.254128", 
			"latitude": "28.5479470000001", 
			"e_lng": "77.254221", 
			"e_lat": "28.547725", 
			"state": "Delhi", 
			"brand_code": "0", 
			"place_id": "53CFS2" 
		}, 
		{ 
			"poi": "Oriental Bank of Commerce ATM", 
			"subSubLocality": "", 
			"subLocality": "", 
			"locality": "Nehru Place", 
			"city": "New Delhi", 
			"subDistrict": "Kalkaji", 
			"district": "South East Delhi District", 
			"poplrName": "OBC ATM", 
			"address": "Nehru Place, New Delhi, Delhi, 110019", 
			"tel": null, 
			"email": null, 
			"website": null, 
			"longitude": "77.253343", 
			"latitude": "28.547939", 
			"e_lng": "77.253221", 
			"e_lat": "28.547868", 
			"state": "Delhi", 
			"brand_code": "0", 
			"place_id": "1A1178" 
		}, 
		{ 
			"poi": "HDFC ATM", 
			"subSubLocality": "", 
			"subLocality": "", 
			"locality": "Kalkaji", 
			"city": "New Delhi", 
			"subDistrict": "Kalkaji", 
			"district": "South East Delhi District", 
			"poplrName": null, 
			"address": "Kalkaji, New Delhi, Delhi, 110019", 
			"tel": null, 
			"email": null, 
			"website": null, 
			"longitude": "77.261736", 
			"latitude": "28.5398080000001", 
			"e_lng": "77.26182", 
			"e_lat": "28.540005", 
			"state": "Delhi", 
			"brand_code": "0", 
			"place_id": "M0SVTO" 
		}, 
		{ 
			"poi": "ICICI ATM", 
			"subSubLocality": "The India Mall", 
			"subLocality": "Commercial Complex", 
			"locality": "Friends Colony East", 
			"city": "New Delhi", 
			"subDistrict": "Kalkaji", 
			"district": "South East Delhi District", 
			"poplrName": null, 
			"address": "The India Mall, Commercial Complex, Friends Colony East, New Delhi, Delhi, 110025", 
			"tel": null, 
			"email": null, 
			"website": null, 
			"longitude": "77.2689310000001", 
			"latitude": "28.5617280000001", 
			"e_lng": "77.269097", 
			"e_lat": "28.561832", 
			"state": "Delhi", 
			"brand_code": "0", 
			"place_id": "D688T7" 
		}, 
		{ 
			"poi": "State Bank of India ATM", 
			"subSubLocality": "", 
			"subLocality": "", 
			"locality": "Garhi Jharia Maria", 
			"city": "New Delhi", 
			"subDistrict": "Defence Colony", 
			"district": "South East Delhi District", 
			"poplrName": "SBI ATM", 
			"address": "Garhi Jharia Maria, New Delhi, Delhi, 110065", 
			"tel": null, 
			"email": null, 
			"website": null, 
			"longitude": "77.2515300000001", 
			"latitude": "28.559288", 
			"e_lng": "77.251516", 
			"e_lat": "28.559282", 
			"state": "Delhi", 
			"brand_code": "0", 
			"place_id": "Y6UN28" 
		}, 
		{ 
			"poi": "HDFC ATM", 
			"subSubLocality": "", 
			"subLocality": "Block G", 
			"locality": "Sriniwaspuri", 
			"city": "New Delhi", 
			"subDistrict": "Defence Colony", 
			"district": "South East Delhi District", 
			"poplrName": null, 
			"address": "Block G, Sriniwaspuri, New Delhi, Delhi, 110065", 
			"tel": null, 
			"email": null, 
			"website": null, 
			"longitude": "77.25534", 
			"latitude": "28.565005", 
			"e_lng": "77.255407", 
			"e_lat": "28.564914", 
			"state": "Delhi", 
			"brand_code": "0", 
			"place_id": "TC3B3S" 
		} 
	] 
}
```
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
> mapbox-gl-native copyright (c) 2014-2019 Mapbox.
>  Written with [StackEdit](https://stackedit.io/) by MapmyIndia.




