![MapmyIndia APIs](https://www.mapmyindia.com/api/img/mapmyindia-api.png)

# MapmyIndia Traveled Route API

This API can be used to get an image of map with traveled route plotted on it. The image size can be specified; which will dynamically create an image of varying zoom levels with the start and end locations plotted on it.

## API URL

1.  The API URL should be of the following construct:  http://apis.mapmyindia.com/advancedmaps/v1/<licence_key>/still_image_polyline?
2. **Output**  format will be an 8-bit PNG image of varying sizes.
3.  The method used is  **POST**.

## Request Parameters

The following input parameters will be supported in the Travelled Route API request –  
The body content will be of ‘form-data’ type, consisting of the following parameters:

### Mandatory Parameters:

1.  `height:` The height of the image resolution that is required.
2.  `width:` The width of the image resolution that is required.
3.  `polyline:` An array of comma separated [Longitude,Latitude] points that define the polyline along which the route was traversed.
4.  `licence_key:` The REST API licence key allocated to you.

### Optional Parameters:

1. `color:` hex color ie. #3edhhs  
2. `icon_from:` url: [https://maps.mapmyindia.com/images/from.png](https://maps.mapmyindia.com/images/from.png)  
3. `icon_to:`url: [https://maps.mapmyindia.com/images/to.png](https://maps.mapmyindia.com/images/to.png)  
4. `offset:`[top,right]
5. `padding_x:`number (in pixels); Max: 150
6. `padding_y:`number (in pixels); Max: 150
7. `markers:`An Array of comma separated [Longitude,Latitude], Custom Markers to be embedded in the image during the trip.
8. `markers_icon:`URL for the Custom Marker.


### Response Parameters

The following output parameters will be supported in the Travelled Route API response

1.  An 8-bit png image of  `height` x `width`  resolution.

## Performance

The Traveled Route API is a resource intensive API that consumes considerable computing power of the server. This API is meant to be used sparingly and hence has an above average response time. The Traveled Route API must respond within 2500 ms under standard circumstances. If you are parsing the custom marker in the image with your custom marker URL than the performance average response time would be more than what in standard circumstances.

## Example

**Input**:  
http://apis.mapmyindia.com/advancedmaps/v1/<licence_key>/ still_image_polyline?

**Body**
```json
height:400
width:400
polyline:[[77.227437,28.611004],[77.227385,28.611011],[77.226859,28.610907],[77.224885,28.610022],[77.224906,28.609965],[77.224906,28.609843],[77.224885,28.609786],[77.224788,28.609682],[77.224702,28.609644],[77.224595,28.609635],[77.224456,28.609682],[77.224349,28.609795],[77.220347,28.608005],[77.21892,28.607336],[77.218963,28.607148],[77.218942,28.60696],[77.218824,28.606677],[77.21876,28.606602],[77.218578,28.606385],[77.218374,28.606263],[77.218235,28.606216],[77.218063,28.606188],[77.217956,28.606197],[77.217945,28.605199],[77.217902,28.60438],[77.217859,28.603674],[77.217827,28.603033],[77.217773,28.602223],[77.217698,28.600933],[77.217805,28.600924],[77.217902,28.600886],[77.217988,28.600829],[77.218074,28.600707],[77.218106,28.600622],[77.218106,28.6005],[77.218085,28.600434],[77.218021,28.60033],[77.217882,28.600226],[77.217753,28.600188],[77.217571,28.600197],[77.217453,28.600244],[77.217389,28.600291],[77.217292,28.600404],[77.216798,28.600197],[77.215897,28.599801],[77.214384,28.599123],[77.212785,28.598407],[77.211326,28.597729],[77.211347,28.597682],[77.211336,28.597588],[77.211239,28.597484],[77.211196,28.597465],[77.211067,28.597465],[77.210992,28.597493],[77.210938,28.59755],[77.209575,28.596947],[77.20935,28.596853],[77.207998,28.59625],[77.20759,28.596071],[77.207526,28.596005],[77.207462,28.595996],[77.207033,28.596109],[77.20684,28.596156],[77.205295,28.596495],[77.204555,28.596561],[77.203546,28.596533],[77.20243,28.59642],[77.201218,28.59609],[77.200596,28.596109],[77.19992,28.596137],[77.199019,28.596175],[77.198826,28.596053],[77.198826,28.595996],[77.198772,28.595855],[77.198675,28.59577],[77.1986,28.595742],[77.198557,28.595723],[77.198428,28.595723],[77.198299,28.595761],[77.198235,28.595808],[77.197055,28.595516],[77.196529,28.59545],[77.196132,28.595431],[77.19566,28.595459],[77.194533,28.595695],[77.193986,28.595865],[77.193911,28.595799],[77.193772,28.595761],[77.193633,28.595789],[77.193515,28.595883],[77.193472,28.596005],[77.193483,28.596062],[77.193032,28.596241],[77.190908,28.597108],[77.190854,28.597042],[77.190768,28.596995],[77.190661,28.596967],[77.190532,28.596976],[77.190457,28.597004],[77.19035,28.597089],[77.190307,28.597155],[77.190286,28.597287],[77.190318,28.597391],[77.189095,28.5979],[77.188655,28.59807],[77.187775,28.598419],[77.187743,28.598362],[77.187646,28.598296],[77.187549,28.598268],[77.18741,28.598287],[77.187313,28.598334],[77.187238,28.598438],[77.187227,28.598532],[77.187259,28.598626],[77.183686,28.600058],[77.181991,28.600727],[77.181809,28.60084],[77.181498,28.601057],[77.181058,28.601528],[77.180897,28.601726],[77.180715,28.601811],[77.180618,28.60183],[77.180403,28.601811],[77.17933,28.601265],[77.175446,28.599212],[77.17521,28.59909],[77.174877,28.598911],[77.173965,28.598431],[77.173718,28.598309],[77.173471,28.598168],[77.172666,28.597754]]
color:#ff00f7
markers:[[77.217698,28.600933],[77.193986,28.595865]]
markers_icon:https://img.icons8.com/dusk/25/000000/region-code.png
```
### Output: :
![enter image description here](https://mmi-api-team.s3.ap-south-1.amazonaws.com/API%20Team/Still_Image_Polyline.png)

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