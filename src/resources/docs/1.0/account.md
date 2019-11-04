# Account  
This is an object representing a user account. You can create new user, update and delete current account info.
Account login through email only.
<br/>  
The Account Object:
```JSON
"id": 1,
"name": "John Beck",
"username": "teacherone",
"email": "johnbeck@email.com",
"role": 1,
"api_token": "aCSZkvGkec5jNerGqDALIw0JFGWliGFUP65HW25ynggfWVyYDLJ7JFd9TuOM"
```  
---

- [Login Email](/{{route}}/{{version}}/account#section-1)
- [Create New User](/{{route}}/{{version}}/account#section-2)
- [Update User Information](/{{route}}/{{version}}/account#section-3)
- [Delete a User](/{{route}}/{{version}}/account#section-4)

<a id="section-1"></a>
## Login Email
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

<a id="section-2"></a>
## Create New User
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

<a id="section-3"></a>
## Update User Information
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