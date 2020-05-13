![MapmyIndia APIs](https://www.mapmyindia.com/api/img/mapmyindia-api.png)
# FEEDBACK API

### Introduction

The API acts as a feedback loop to improve the user's search pattern by incorporating ML based personalization characteristics to further searches. This API is not billable directly; but has transactions limits to avoid abuse.

### URL
```html
https://atlas.mapmyindia.com/api/feedback/search/json?
```

### Method

##### POST

### Request Body

The request must have a JSON body with the below keys and their data types:

**Note**: Bold Ones are Mandatory, Italic ones are optional parameters.

1.  **`typedKeyword`**: (string) => The string that was searched. Must be 2 characters or more.   
2.  **`selectedEloc`**: (string) => eLoc of the location that was selected. Must be exactly 6 characters.
3. *`selectedLocationName`*: (string) => name of the location that was selected.  
4.  *`apiVersion`*: (string) => version of the API that was used to get the result.    
5.  **`selectedIndex`**: (integer) => the index of the selected object that was returned from the search.    
6.  *`username`*: (string) => the username of the user that’s logged in.    
7.  **`appVersion`**: (double) => the version of the app that was used to make the request.    
8.  *`latitude`*: (double) => the latitude of the location from where the search is made. The latitude must be a double value, must not start with 0 and must not be larger than the longitude.
9. *`longitude`*: (double) => the longitude of the location from where the search is made. The longitude must be a double value, must not start with 0.
  
#### Request Headers
The API leverages OAuth 2.0 based security. Hence, the developer would need to send a request for access token using their **client_id** and **client_secret** to the OAuth API. Once validated from the OAuth API, the access_token and the token_type need to be sent as Authorization header with the value: “{token_type} {access_token}”.
1.  **Authorization:** “{token_type} {passport}”.   
2.  **Content-Type:** Defines the type of content being sent to the API. It must be set to **“application/x-www-form-urlencoded”.** Please note: sending any request without it or different than it would lead to a 400: Bad request.
    

### Security Type:
OAuth 2.0 based security using AES 256 and SHA-1.

### Response Type
• JSON: if the user passed in “/json”.  

### Response Codes {as HTTP response code}

**Success:**

1. 201: To denote that the feedback was successfully created.

**Client-Side Issues:**

1. 400: Bad Request, User made an error while creating a valid request or the body of the request is invalid.4. 401: Unauthorized, Developer’s key is not allowed to send a request with restricted parameters  
2. 403: Forbidden, Developer’s key has hit its daily/hourly limit

**Server-Side Issues:**

1. 500: Internal Server Error, the request caused an error in our systems.  
2. 503: Service Unavailable, during our maintenance break or server downtimes.

### Response Messages (as HTTP response message

1. 201: Feedback submitted.  
2. 400: Something’s just not right with the request.  
3. 401: Access Denied.  
4. 403: Services for this key has been suspended due to daily/hourly transactions limit. 
5. 500: Something went wrong.  
6. 503: Maintenance Break.

### Response Parameters

The response of this API would be empty. Success would be denoted by the response codes and error would be denoted with the response codes while information on what went wrong with the request in-case of a 400: bad request would be a part of the response headers message.

### Sample cURL Request

```c
curl --location --request POST 'https://atlas.mapmyindia.com/api/feedback/search/json' \
--header 'Authorization: bearer 0XXXXXXf-dXX0-4XX0-8XXa-eXXXXXXXXXX6' \
--header 'Content-Type: application/x-www-form-urlencoded' \
--data-urlencode 'typedKeyword=hotel' \
--data-urlencode 'selectedEloc=531C42' \
--data-urlencode 'selectedIndex=1' \
--data-urlencode 'appVersion=1.1.1'
```


For any queries and support, please contact: 

![Email](https://www.mapmyindia.com/images/logo.png =150x) 
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


> © Copyright 2020. CE Info Systems Pvt. Ltd. All Rights Reserved. | [Terms & Conditions](http://www.mapmyindia.com/api/terms-&-conditions)