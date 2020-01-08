![MapmyIndia APIs](https://www.mapmyindia.com/api/img/mapmyindia-api.png)

# MapmyIndia Traveled Route API

The Still Map Image API creates a map based on URL parameters sent through a standard HTTP request and returns the map as an image which you can display on your application. The API lets you embed MapmyIndia Maps image according to geo-position, pixel size and zoom level of the map on your application without requiring any dynamic page loading. The image can be a retina image and markers can be added to the image to indicate position of any object.

## API URL

1.  The API URL should be of the following construct:  https://apis.mapmyindia.com/advancedmaps/v1/<licence_key>/still_image?<Parameters>
2. **Output**  format will be an 8-bit PNG image of varying sizes.
3.  The method used is  **POST**.

## Request Parameters

Returns PNG data to draw map tile at position specified with coordinates (centre of the image), image size, scale factor and zoom level. The request parameters that specify the image.

### Mandatory Parameters:

1.  `licence_key:` The REST API licence key allocated to you.
2.  `center:` A WGS-84 position coordinate that specifies the centre of the image requested.

### Optional Parameters:

1. `zoom:` The zoom level for which the image is requested. Ranges from 4 to 18 with 18 being the highest zoomed in level.  
2. `size:` The size of the image requested in pixels as <Width>x<Height>.
3. `ssf:`scale factor indicating retina or non-retina tiles. 
    <br>0→non-retina tiles.
    <br>1→retina tiles.
4. `markers:` Optional markers that you may want to add to the map tile.
5. `markers_icon:` The URL of the Custom Marker.


### Response Parameters

The following output parameters will be supported in the Travelled Route API response

1.  An 8-bit png image.

## Performance

The Performance is dependent on WAN/LAN/WLAN speed & also on the URL you are going to provide in the *`markers_icon`*

## Transaction Information

One Request (which returns one image) using the API link will be considered as one transaction.

## Use Cases

- To show a quick location point without having to additionally add a Map Control.
- To show multiple locations on map without the need to add a Map Control.

## Example

**Input**:  
https://apis.mapmyindia.com/advancedmaps/v1/<REST_KEY>/still_image?center=28.5959394,77.2255611&zoom=15&size=400x400&ssf=1&markers=28.5959394,77.2255611

### Output: :
![enter image description here](https://mmi-api-team.s3.ap-south-1.amazonaws.com/API%20Team/still_image.png)

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