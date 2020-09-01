
![MapmyIndia APIs](https://www.mapmyindia.com/api/img/mapmyindia-api.png)
# Draw Route Image API

With POI Along the Route API user will be able to get the details of POIs of a particular category along his set route. The main focus of this API is to provide convenience to the user and help him in locating the place of his interest on his set route.

## Security Type
- License key based authentication
- IP/domain based whitelisting


## Input Method
GET/POST

## URL

https://atlas.mapmyindia.com/api/places/along_route/


## Request Parameters

The following input parameters will be supported in the POI Along The Route API request

### Mandatory Parameters

1. `path` (string) This parameter takes the encoded route along which POIs to be searched.
2. `category` {string} The POI category code to be searched. Only one category input supported.

### Optional Parameters
3. `sort` (valueless): Gets the sorted POIs along route.
4. `geometries` (string): Type of geometry encoding, accepted values are `polyline5`, `polyline6`, and `base64`. Default value is `polyline5`.
5. `buffer` (number): Buffer of the road. Minimum value is `25`, maximum is `1000` and default is `25`.
6. `page` (number): Used for pagination. By default, a request returns maximum `10` results and to get the next `10` or so on pass the page value accordingly. Default is 1.



### Important Note
1. When using POST method, the parameters are sent as `multipart/form-data`
2. The length of polyline as input is limited as of now. The API can take in polyline of length not more than 30 kms long.


## Response Type

JSON

## Response Codes 
**Note**:  as HTTP response code

### Success
1. 200: To denote a successful API call.
2. 204: To denote the API was a success but no results were found.
### Client-Side Issues
3. 400: Bad Request, User made an error while creating a valid request.
4. 401: Unauthorized, Developer’s key is not allowed to send a request with restricted parameters.
5. 403: Forbidden, Developer’s key has hit its daily/hourly limit.
Server-Side Issues:
6. 500: Internal Server Error, the request caused an error in our systems.
7. 503: Service Unavailable, during our maintenance break or server down-times.

## Response Messages 

**Note**: as HTTP response message

1. 200: Success.
2. 204: No matches we’re found for the provided query.
3. 400: Something’s just not right with the request.
4. 401: Access Denied.
5. 403: Services for this key has been suspended due to daily/hourly transactions limit.
6. 500: Something went wrong.
7. 503: Maintenance Break.

## Reponse Parameters

suggestedPOIs ([object array])

1. `distance`(integer): distance of the POI.
2. `place_id`(string): eLoc of the POI
3. `poi`(string): Name of the POI
4. `subSubLocality`(string): Subsublocality of the POI
5. `subLocality`(string): Sublocality of the POI
6. `locality`(string): Locality of the POI
7. `city`(string): City of the POI
8. `subDistrict`(string): Sub district of the POI
9. `district`(string): District of the POI
10. `state`(string): State of the POI
11. `poplrName`(string): Popular name of the POI
12. `address`(string): Address of the POI
13. `tel`(string): Telephone number of the POI
14. `email`(string): Email of the POI
15. `website`(string): Website of the POI
16. `longitude`(double): Longitude of the POI
17. `latitude`(double): Latitude of the POI
18. `e_lng`(double): Entry latitude of the POI
19. `e_lat`(double): Entry latitude of the POI
20. `brand_code`(string): Brand id of the POI

## Transaction Information

One request using the API link will be considered as one transaction.

## Sample request

### cURL

```curl
curl --location --request POST 'https://atlas.mapmyindia.com/api/places/along_route' \
--header 'Authorization: bearer c8502ff0-c0ed-44d3-a114-3a7bcd3c415b' \
--form 'geometries=polyline5' \
--form 'path=mfvmDcalvMB?B?@EB}@lABzABrBDAaAFoDFuCFuC@{@@m@DoAFu@D_@VmAFWHSHKBCFCbA]n@S`@IX?^BdAL|ANtCV~ANXBfBDfBBl@Bp@BrA@Pa@FKHMf@@`CHXDLBJFHJHRbD@`D@Z?h@@f@@h@@bAB^@jDDlBB~@BT@N?dDDV?x@Bt@@dCFdCFzB@nD?N?|BEzBEzBE`@AJ?lCOxCMfAClCGnCIlCIlCIhDKfDIhDIzCK|AG|AEbBG`A@d@FVD^FjARlBVn@D`AD|@Fn@DnCZnCZtBTH@J?V@`A@lC@nC@lCB`AGNCTCPEl@SRI|@a@~BqAb@OZGt@E|BEl@AxA?|@?pA@T?V@bCB`AJNBn@L^NpAl@t@`@d@V~BlA`CnA~BnA`A`@VJd@NXF~@JN@xBBL?hA?x@Ar@?x@A@?vCAvCAvCAxCAj@F`@Fd@Nf@RrAn@|@b@dBz@fBz@nBfAJF~Ax@`CfAXLRHp@XtCpAtCrAf@V|@Rf@Px@TxAZ\\F`BL`BLZEPERGNKPQR_@BaBPeEHeAXo@NcDLaDNaDNaDAkB?kAKqDIoD_@mAI{BI{BGgBIgBGiBCm@ASAi@Cu@Cc@Ag@Aa@GgBGgBGkBAu@IeCAUJARARA~@GB?f@C|AK`BIbBIt@IPCPCZO`@[FKLOR]Vk@Pi@DUL{@D[P}CP{C@i@@a@Ae@EiBCiBAyC?_ACaB?QAeBAgB?WB_@BSDSDOTu@dA{Cr@sBRi@JU^q@j@cATYZ_@TUbBsAHIhA}@jA_AlAaA`Ay@bAy@d@c@pAgAv@q@`AcA^_@tAoAVSVQLGdAg@f@Yz@e@W_@KSWIoAuCmAwCLMBCDCNE@AJ?H@F@v@fB\\GNGb@W\\YfAcALI@C@CBADCD@JBDBBBBD@D?DDLBFJNFDHDF@J@|CKbCItAEHCHA@EBEDCDABAF?D@DB@BDH@D?JADL@l@?j@BbAGGcAGiACc@Cm@C[' \
--form 'category=FODCOF' \
--form 'buffer=300' \
--form 'page=1' \
--form 'sort='
```


```json
{
    "suggestedPOIs": [
        {
            "distance": 1065,
            "place_id": "74835C",
            "poi": "Cafe Nescafe",
            "subSubLocality": "",
            "subLocality": "",
            "locality": "Pragati Maidan",
            "city": "New Delhi",
            "subDistrict": "Connaught Place",
            "district": "New Delhi District",
            "state": "Delhi",
            "poplrName": null,
            "address": "K 10, Pragati Maidan, New Delhi, Delhi, 110001",
            "tel": "+911122205205",
            "email": null,
            "website": "www.nescafe.com",
            "longitude": 77.2411440000001,
            "latitude": 28.6191640000001,
            "e_lng": 77.241316,
            "e_lat": 28.619444,
            "brand_code": "0"
        },
        {
            "distance": 3205,
            "place_id": "KBFG0E",
            "poi": "Starbucks",
            "subSubLocality": "",
            "subLocality": "Prithviraj Market",
            "locality": "Khan Market",
            "city": "New Delhi",
            "subDistrict": "Chanakya Puri",
            "district": "New Delhi District",
            "state": "Delhi",
            "poplrName": null,
            "address": "Shop 45, 1st and 2nd Floor, Khan Market, Near Forest Essential, New Delhi, Delhi, 110003",
            "tel": null,
            "email": null,
            "website": null,
            "longitude": 77.22533,
            "latitude": 28.6004300000001,
            "e_lng": 77.2252760000001,
            "e_lat": 28.6004830000001,
            "brand_code": "0"
        },
        {
            "distance": 3260,
            "place_id": "CBME9Q",
            "poi": "Market Cafe",
            "subSubLocality": "",
            "subLocality": "",
            "locality": "Khan Market",
            "city": "New Delhi",
            "subDistrict": "Chanakya Puri",
            "district": "New Delhi District",
            "state": "Delhi",
            "poplrName": null,
            "address": "Khan Market, New Delhi, Delhi, 110003",
            "tel": null,
            "email": null,
            "website": null,
            "longitude": 77.2264670000001,
            "latitude": 28.599608,
            "e_lng": 77.226525,
            "e_lat": 28.5995350000001,
            "brand_code": "0"
        },
        {
            "distance": 3982,
            "place_id": "TEBF71",
            "poi": "Cafe Coffee Day",
            "subSubLocality": "",
            "subLocality": "",
            "locality": "CGO Complex",
            "city": "New Delhi",
            "subDistrict": "Defence Colony",
            "district": "South East Delhi District",
            "state": "Delhi",
            "poplrName": "CCD",
            "address": "Shell Petrol Bunk, Bharat Petroleum Petrol Pump, Next To HUDCO, Lodhi Road, New Delhi, Delhi, 110003",
            "tel": "+911132967812, +911164580769",
            "email": null,
            "website": "www.cafecoffeeday.com",
            "longitude": 77.2374390000001,
            "latitude": 28.592161,
            "e_lng": 77.2374,
            "e_lat": 28.5925140000001,
            "brand_code": "0"
        },
        {
            "distance": 4880,
            "place_id": "671A2A",
            "poi": "Cafe Coffee Day",
            "subSubLocality": "",
            "subLocality": "Mehar Chand Market",
            "locality": "Lodhi Colony",
            "city": "New Delhi",
            "subDistrict": "Defence Colony",
            "district": "South East Delhi District",
            "state": "Delhi",
            "poplrName": "CCD",
            "address": "Shop No-58, Ground Floor, Mehar Chand Market, Lodhi Road, New Delhi, Delhi, 110003",
            "tel": "+911132212130, +911164580767",
            "email": null,
            "website": "www.cafecoffeeday.com",
            "longitude": 77.226588,
            "latitude": 28.5849630000001,
            "e_lng": 77.2265090000001,
            "e_lat": 28.584954,
            "brand_code": "0"
        },
        {
            "distance": 5013,
            "place_id": "K42JYV",
            "poi": "Novelty Cafe",
            "subSubLocality": "",
            "subLocality": "Block I",
            "locality": "Jangpura Extension",
            "city": "New Delhi",
            "subDistrict": "Defence Colony",
            "district": "South East Delhi District",
            "state": "Delhi",
            "poplrName": null,
            "address": "43, Hawkers House, Birbal Road, Jangpura Extension, Jangpura, New Delhi, Delhi, 110014",
            "tel": "+911124324168, +911124314168",
            "email": null,
            "website": null,
            "longitude": 77.2437300000001,
            "latitude": 28.583653,
            "e_lng": 77.243909,
            "e_lat": 28.5838220000001,
            "brand_code": "0"
        },
        {
            "distance": 6101,
            "place_id": "2651B8",
            "poi": "Brown Sugar",
            "subSubLocality": "",
            "subLocality": "Defence Colony Market",
            "locality": "Defence Colony",
            "city": "New Delhi",
            "subDistrict": "Defence Colony",
            "district": "South East Delhi District",
            "state": "Delhi",
            "poplrName": null,
            "address": "Shop No-36, 2nd Floor, Defence Colony Market, Defence Colony, New Delhi, Delhi, 110024",
            "tel": "+911146568950, +911146568951",
            "email": null,
            "website": null,
            "longitude": 77.2305160000001,
            "latitude": 28.5736870000001,
            "e_lng": 77.2307030000001,
            "e_lat": 28.5737060000001,
            "brand_code": "0"
        },
        {
            "distance": 6132,
            "place_id": "4S84S3",
            "poi": "Barista",
            "subSubLocality": "",
            "subLocality": "Defence Colony Market",
            "locality": "Defence Colony",
            "city": "New Delhi",
            "subDistrict": "Defence Colony",
            "district": "South East Delhi District",
            "state": "Delhi",
            "poplrName": null,
            "address": "Shop No-15, Ground, 1st and 2nd Floor, Defence Colony Market, Defence Colony, New Delhi, Delhi, 110024",
            "tel": "+911141552472",
            "email": null,
            "website": "www.barista.co.in",
            "longitude": 77.2300880000001,
            "latitude": 28.5734430000001,
            "e_lng": 77.230149,
            "e_lat": 28.5734610000001,
            "brand_code": "0"
        },
        {
            "distance": 6339,
            "place_id": "5ZLODU",
            "poi": "Cafe Coffee Day",
            "subSubLocality": "",
            "subLocality": "Block C",
            "locality": "Lajpat Nagar 2",
            "city": "New Delhi",
            "subDistrict": "Defence Colony",
            "district": "South East Delhi District",
            "state": "Delhi",
            "poplrName": "CCD",
            "address": "55-56, Ground Floor, Central Market Lajpat Nagar - 2, Near Axis Bank, New Delhi, Delhi, 110024",
            "tel": null,
            "email": null,
            "website": null,
            "longitude": 77.2382900000001,
            "latitude": 28.5714580000001,
            "e_lng": 77.238253,
            "e_lat": 28.5713680000001,
            "brand_code": "0"
        },
        {
            "distance": 6534,
            "place_id": "TSFBC6",
            "poi": "Cafe Coffee Day",
            "subSubLocality": "",
            "subLocality": "Block A",
            "locality": "Lajpat Nagar 2",
            "city": "New Delhi",
            "subDistrict": "Defence Colony",
            "district": "South East Delhi District",
            "state": "Delhi",
            "poplrName": "CCD",
            "address": "A-10, 1st Floor, Lajpat Nagar 2, New Delhi, Delhi, 110024",
            "tel": "+911126463858, +911132483408, +911164638586",
            "email": null,
            "website": "www.cafecoffeeday.com",
            "longitude": 77.238612,
            "latitude": 28.569762,
            "e_lng": 77.238593,
            "e_lat": 28.569714,
            "brand_code": "0"
        }
    ]
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