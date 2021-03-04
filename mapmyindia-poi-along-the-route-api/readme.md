
![MapmyIndia APIs](https://www.mapmyindia.com/api/img/mapmyindia-api.png)

# Note 
1. The response listed in the below documentation is ONLY indicative of the overall capabilities of MapmyIndia's Search APIs.
2. Not all response parameters mentioned in the below documentation is assured to be present in all the use-cases. The response of any of the below search API is thus, dependent on the use-case agreed upon between MapmyIndia & it's API consumer.
3. For any further clarifications on what all of the response structure is available for your use case, please contact your business relationship manager or contact MapmyIndia API support.
4. PREMIUM APIs/Parameters are not available for evalulation on signup. To get access, please contact API Support.

# POI Along The Route

With POI Along the Route API user will be able to get the details of POIs of a particular category along his set route. The main focus of this API is to provide convenience to the user and help him in locating the place of his interest on his set route.

## Security Type
This APIs follow OAuth2 based security. **To know more on how to create your authorization tokens, please use our authorization token URL. More details available**  [here](https://www.mapmyindia.com/api/advanced-maps/doc/authentication-api.php)

## Request Headers

The API leverages OAuth 2.0 based security. Hence, the developer would need to send a request for access token using their client_id and client_secret to the OAuth API. Once validated from the OAuth API, the access_token and the token_type need to be sent as Authorization header with the value: “{token_type} {access_token}”.

-  `Authorization:  “token_type access_token”`.

## Input Method
GET/POST

## URL

https://atlas.mapmyindia.com/api/places/along_route/


## Request Parameters

The following input parameters will be supported in the POI Along The Route API request

### Mandatory Parameters

1. `path` (string) This parameter takes the encoded route along which POIs to be searched.
2. `category` {string} The POI category code to be searched. Only one category input supported by default. API does have the capability to search across multiple categories  simultaneously (`PREMIUM` Offering). To access multiple category search, please contact [API Support](mailto:apisupport@mapmyindia.com).  

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
16. `longitude`(double): Longitude of the POI.
Geometry information is NOT available in most use-case driven response; and is RESTRICTED.
17. `latitude`(double): Latitude of the POI.
Geometry information is NOT available in most use-case driven response; and is RESTRICTED.
18. `e_lng`(double): Entry latitude of the POI.
Geometry information is NOT available in most use-case driven response; and is RESTRICTED.
19. `e_lat`(double): Entry latitude of the POI.
Geometry information is NOT available in most use-case driven response; and is RESTRICTED.
20. `brand_code`(string): Brand id of the POI
21. `category`<sup>1</sup> (string): the category code to which this POI belongs to. Comes only when multiple category search is used.
<br><br>


## Sample requests

### cURL for single category search

```curl
curl --location --request POST 'https://atlas.mapmyindia.com/api/places/along_route' \
--header 'Authorization: bearer 0XXXXXXf-dXX0-4XX0-8XXa-eXXXXXXXXXX6' \
--form 'geometries=polyline5' \
--form 'path=mfvmDcalvMB?B?@EB}@lABzABrBDAaAFoDFuCFuC@{@@m@DoAFu@D_@VmAFWHSHKBCFCbA]n@S`@IX?^BdAL|ANtCV~ANXBfBDfBBl@Bp@BrA@Pa@FKHMf@@`CHXDLBJFHJHRbD@`D@Z?h@@f@@h@@bAB^@jDDlBB~@BT@N?dDDV?x@Bt@@dCFdCFzB@nD?N?|BEzBEzBE`@AJ?lCOxCMfAClCGnCIlCIlCIhDKfDIhDIzCK|AG|AEbBG`A@d@FVD^FjARlBVn@D`AD|@Fn@DnCZnCZtBTH@J?V@`A@lC@nC@lCB`AGNCTCPEl@SRI|@a@~BqAb@OZGt@E|BEl@AxA?|@?pA@T?V@bCB`AJNBn@L^NpAl@t@`@d@V~BlA`CnA~BnA`A`@VJd@NXF~@JN@xBBL?hA?x@Ar@?x@A@?vCAvCAvCAxCAj@F`@Fd@Nf@RrAn@|@b@dBz@fBz@nBfAJF~Ax@`CfAXLRHp@XtCpAtCrAf@V|@Rf@Px@TxAZ\\F`BL`BLZEPERGNKPQR_@BaBPeEHeAXo@NcDLaDNaDNaDAkB?kAKqDIoD_@mAI{BI{BGgBIgBGiBCm@ASAi@Cu@Cc@Ag@Aa@GgBGgBGkBAu@IeCAUJARARA~@GB?f@C|AK`BIbBIt@IPCPCZO`@[FKLOR]Vk@Pi@DUL{@D[P}CP{C@i@@a@Ae@EiBCiBAyC?_ACaB?QAeBAgB?WB_@BSDSDOTu@dA{Cr@sBRi@JU^q@j@cATYZ_@TUbBsAHIhA}@jA_AlAaA`Ay@bAy@d@c@pAgAv@q@`AcA^_@tAoAVSVQLGdAg@f@Yz@e@W_@KSWIoAuCmAwCLMBCDCNE@AJ?H@F@v@fB\\GNGb@W\\YfAcALI@C@CBADCD@JBDBBBBD@D?DDLBFJNFDHDF@J@|CKbCItAEHCHA@EBEDCDABAF?D@DB@BDH@D?JADL@l@?j@BbAGGcAGiACc@Cm@C[' \
--form 'category=FODCOF' \
--form 'buffer=300' \
--form 'page=1' \
--form 'sort='
```


### cURL for multiple category search

```curl
curl --location --request POST 'https://atlas.mapmyindia.com/api/places/along_route' \
--header 'Authorization: bearer 0XXXXXXf-dXX0-4XX0-8XXa-eXXXXXXXXXX6' \
--form 'geometries="polyline5"' \
--form 'path="k{{mDyhlvMD@J?jCJlCRL@|AFt@Af@CTCPCRIh@SnAy@nAw@lBmA|B}ApA_ArA}@Ng@BQDWFg@Oe@W_AGWEe@EgAAyBDcCFaCBsBAc@Cs@Eq@E[EYEWI_@I_@Qq@Oo@EUTKl@UrAm@RG^O~@UzCu@|Cu@|Cu@zCu@lBa@JCPAhACtCDtCBvCBtCBlCBnCDd@?t@@dC?T?fA@tB?tB@VCl@Qt@UPEf@AlDDz@H\\\\?xBK`AEtBCvBAlAB`DPdA^NDL@h@@fACxAE\\\\?~BA~BA~BAtBAL?nBC~@Af@g@HIJQFOBQ@WAUEWISOYOQQMQIOGQASAO@QDMFKJU\\\\_@f@@nC?b@@R?ZFvBDzB@JDlBFxBBbAD~AHhCHzDN^DFDFFFXPbAAT@L@VBH@z@NJDRLlAv@lAx@~AKnAOn@G`@IX?^BdAL|ANtCV~ANXBfBDfBBl@Bp@BrA@Pa@FKHMf@@`CHXDLBJFHJHRbD@`D@Z?h@@f@@h@@bAB^@jDDlBB~@BT@N?dDDV?x@Bt@@dCFdCFzB@nD?N?|BEzBEzBE`@AJ?lCOxCMfAClCGnCIlCIlCIhDKfDIhDIzCK|AG|AEbBG`A@^Sz@e@f@Yr@c@pCgB~@o@~AeA`BcAhA[XQb@_@\\\\YZe@?QBMDMDIDEDEJEDCFAF?"' \
--form 'category="FODCOF;TRNPMP;HOTPRE"' \
--form 'buffer="300"' \
--form 'page="1"' \
--form 'sort=""'
```

## Sample Response

```json
{
    "suggestedPOIs": [
        {
            "distance": 760,
            "place_id": "TT9FFL",
            "poi": "Indian Oil Petrol Pump",
            "subSubLocality": "",
            "subLocality": "Parda Bagh",
            "locality": "Daryaganj",
            "city": "New Delhi",
            "subDistrict": "Darya Ganj",
            "district": "Central District",
            "state": "Delhi",
            "poplrName": "",
            "address": "Elgin Road, Netaji Subhash Marg, New Delhi, Delhi, 110002",
            "category": "TRNPMP",
            "brand_code": "0"
        },
        {
            "distance": 2833,
            "place_id": "2ZU43P",
            "poi": "Cafe Coffee Day",
            "subSubLocality": "",
            "subLocality": "",
            "locality": "Indraprastha Estate",
            "city": "New Delhi",
            "subDistrict": "Darya Ganj",
            "district": "Central District",
            "state": "Delhi",
            "poplrName": "CCD",
            "address": "MBD House, Gulab Bhavan, 6, Bhadurshah Zafar Marg, New Delhi, Delhi, 110002",
            "category": "FODCOF",
            "brand_code": "0"
        },
        {
            "distance": 3232,
            "place_id": "WPSIFH",
            "poi": "SPA Canteen",
            "subSubLocality": "",
            "subLocality": "",
            "locality": "Indraprastha Estate",
            "city": "New Delhi",
            "subDistrict": "Darya Ganj",
            "district": "Central District",
            "state": "Delhi",
            "poplrName": "",
            "address": "School of Planning and Architecture, Indraprashta Marg, Balmiki Basti, Vikram Nagar, New Delhi, Delhi, 110002",
            "category": "FODCOF",
            "brand_code": "0"
        },
        {
            "distance": 3705,
            "place_id": "E1TFF1",
            "poi": "Le Cafe Royal",
            "subSubLocality": "",
            "subLocality": "",
            "locality": "Connaught Place",
            "city": "New Delhi",
            "subDistrict": "Connaught Place",
            "district": "New Delhi District",
            "state": "Delhi",
            "poplrName": "",
            "address": "Centre Point, 13, Connaught Place, Kasturba Gandhi Marg, New Delhi, Delhi, 110001",
            "category": "FODCOF",
            "brand_code": "0"
        },
        {
            "distance": 3741,
            "place_id": "2ZVYE1",
            "poi": "Cafe Coffee Day",
            "subSubLocality": "",
            "subLocality": "",
            "locality": "Connaught Place",
            "city": "New Delhi",
            "subDistrict": "Connaught Place",
            "district": "New Delhi District",
            "state": "Delhi",
            "poplrName": "CCD",
            "address": "44, Janpath, New Delhi, Delhi, 110001",
            "category": "FODCOF",
            "brand_code": "0"
        },
        {
            "distance": 3743,
            "place_id": "Q0RX2E",
            "poi": "Cafe Coffee Day",
            "subSubLocality": "",
            "subLocality": "",
            "locality": "Connaught Place",
            "city": "New Delhi",
            "subDistrict": "Connaught Place",
            "district": "New Delhi District",
            "state": "Delhi",
            "poplrName": "CCD",
            "address": "Connaught Place, New Delhi, Delhi, 110001",
            "category": "FODCOF",
            "brand_code": "0"
        },
        {
            "distance": 3744,
            "place_id": "B2D6E4",
            "poi": "Cafe Coffee Day",
            "subSubLocality": "",
            "subLocality": "",
            "locality": "Connaught Place",
            "city": "New Delhi",
            "subDistrict": "Connaught Place",
            "district": "New Delhi District",
            "state": "Delhi",
            "poplrName": "CCD",
            "address": "40/42, Ground Floor, Pearl Sons Pvt Ltd, Opposite To Janpath Market, Janpath Road, Near HDFC Bank, Connaught Place, New Delhi, Delhi, 110001",
            "category": "FODCOF",
            "brand_code": "0"
        },
        {
            "distance": 3760,
            "place_id": "D7S55S",
            "poi": "Indian Oil Petrol Pump",
            "subSubLocality": "",
            "subLocality": "",
            "locality": "Connaught Place",
            "city": "New Delhi",
            "subDistrict": "Connaught Place",
            "district": "New Delhi District",
            "state": "Delhi",
            "poplrName": "",
            "address": "Tolstoy Marg, Connaught Place, New Delhi, Delhi, 110001",
            "category": "TRNPMP",
            "brand_code": "0"
        },
        {
            "distance": 3822,
            "place_id": "ABC4M2",
            "poi": "Cottage Cafe by Smoothie Factory",
            "subSubLocality": "",
            "subLocality": "",
            "locality": "Connaught Place",
            "city": "New Delhi",
            "subDistrict": "Connaught Place",
            "district": "New Delhi District",
            "state": "Delhi",
            "poplrName": "",
            "address": "Jawahar Vyapar Bhawan, Cottage Emporium Janpath, Near Monga Handicrafts, New Delhi, Delhi, 110001",
            "category": "FODCOF",
            "brand_code": "0"
        },
        {
            "distance": 3963,
            "place_id": "FBE365",
            "poi": "The Imperial New Delhi",
            "subSubLocality": "",
            "subLocality": "",
            "locality": "Connaught Place",
            "city": "New Delhi",
            "subDistrict": "Connaught Place",
            "district": "New Delhi District",
            "state": "Delhi",
            "poplrName": "Imperial Hotel New Delhi",
            "address": "Janpath Lane, Connaught Place, New Delhi, Delhi, 110001",
            "category": "HOTPRE",
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




