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
- [Update Information](/{{route}}/{{version}}/account#section-3)

<a id="section-1"></a>
## Login Email
Endpoint:
```perl
POST /account/login
```
<br/>
Expected Body:
```JSON
"account":{
	"email": "johnbeck@email.com",
	"password": "passwordone"
}
```

<a id="section-2"></a>
## Create New User


<a id="section-3"></a>

