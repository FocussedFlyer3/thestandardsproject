# Learning Management System Docs
A system that will store multimedia “modules” and present them to students for studying. The materials for students over the topics the modules cover as well as students' results are all stored in a local database in real-time. The local database will periodically update and pull from a statewide database, but it is important that these databases are kept separate for security reasons. Students’ results can be viewed by a teacher, parents, or system admin (with increasing scope given to higher permission ranks) in real-time. It will be possible for teachers to launch a remedial “intervention” module for any number of struggling students at the instructor's own discretion. The ultimate goal of this system will be to estimate and improve student’s projected standardized test scores throughout a whole state.

---


- [Overview](/{{route}}/{{version}}/overview#section-1)
- [APIs](/{{route}}/{{version}}/overview#section-2)

<a id="section-1"></a>
## Overview
This system API has predictable resource-oriented URLs, accepts **JSON-encoded** request bodies, returns **JSON-encoded** responses, and uses standard HTTP response codes, authentication, and verbs.  
<br/>
####Base url:
```curl
{{env('APP_URL')}}/api/v1
```  
<br/>
This system API uses API keys to authenticate requests. Authentication to the API is performed via HTTP authorization header using bearer token. Provide your API key as the basic authorization header value.  
<br/>
####Header of request should contain at-least:
```perl
Authorization: "Bearer <API KEY>",
Accept: "application/json",
Content-Type: "application/json"
```

<a id="section-2"></a>
## APIs
> - [Account](/{{route}}/{{version}}/account)
> - [Classroom](/{{route}}/{{version}}/classroom)
> - [Task](/{{route}}/{{version}}/task)
> - [Score](/{{route}}/{{version}}/score)