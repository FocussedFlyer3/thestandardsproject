# Account  
This is an object representing a user account. You can create new user, update and delete current account info.
Account login through email only.
<br/>  
### The Account Object:
```JSON
"id": 1,
"name": "John Beck",
"username": "teacherone",
"email": "johnbeck@email.com",
"role": 1,
"api_token": "aCSZkvGkec5jNerGqDALIw0JFGWliGFUP65HW25ynggfWVyYDLJ7JFd9TuOM"
```  
---
> {info} `{userID}` in this docs refers to the user's account `id` field

- [Login Email](/{{route}}/{{version}}/account#section-1)
- [Create New User](/{{route}}/{{version}}/account#section-2)
- [Update User Information](/{{route}}/{{version}}/account#section-3)

<a id="section-1"></a>
## Login Email
To login using email.  
Endpoint:
```perl
POST '/account/login'
```
<br/>
Expected Body on POST:
```JSON
"account":{
	"email": "johnbeck@email.com",
	"password": "passwordone"
}
```
<br/>

<a id="section-2"></a>
## Create New User
To sign up new user with email.  
Endpoint:
```perl
POST '/account/signup'
```
<br/>
Expected Body on POST:
```JSON
"account":{
    "name": "John Beck",
    "username": "teacherone",
    "email": "johnbeck@email.com",
	"password": "passwordone",
    "role": 1
}
```
<br/>

<a id="section-3"></a>
## Update User Information
To update a user's info base on `{userID}`.  
Endpoint:
```perl
POST '{userID}/account'
```
<br/>
Expected Body on POST:
```JSON
"account":{
	"name": "John Beck",
	"username": "teacherone",
	"email": "johnbeck@email.com",
	"role": 1
}
```
> {info} Passing the whole account object with all its attributes is possible as well.
<br/>