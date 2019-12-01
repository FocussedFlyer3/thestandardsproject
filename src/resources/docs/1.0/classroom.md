# Classroom  
This is an object representing a classroom. You can create new user, update and delete current classroom info.
<br/>  
### The Classroom Object:
```JSON
"classrooms": [
    {
        "class_id": 1,
        "grade": 5,
        "subject": "Math",
        "teacher_id": 1,
        "starts_at": "10:00:00",
        "ends_at": "10:45:00",
        "school": "PS101",
        "room": "A303"
    },
    {
        "class_id": 2,
        "grade": 5,
        "subject": "Math",
        "teacher_id": 1,
        "starts_at": "11:00:00",
        "ends_at": "11:45:00",
        "school": "PS101",
        "room": "A302"
    }
]
```  
---

- [Get All Classrooms](/{{route}}/{{version}}/classroom#section-1)
- [Get User's Classrooms](/{{route}}/{{version}}/classroom#section-2)
- [Get Classroom Benchmarks](/{{route}}/{{version}}/classroom#section-3)
- [Create New Classroom](/{{route}}/{{version}}/classroom#section-4)
- [Assign Classroom to a User](/{{route}}/{{version}}/classroom#section-5)
- [Update Classroom Informations](/{{route}}/{{version}}/classroom#section-6)

<a id="section-1"></a>
## Get all Classrooms
Endpoint:
This API will return all available classrooms in system.
```perl
GET 'classroom'
```

<br/>

<a id="section-2"></a>
## Get User's Classrooms
This API will return all of the classrooms assigned to a user base on the `{userID}`.  
Endpoint:
```perl
GET '{userID}/classroom'
```

<br/>

<a id="section-3"></a>
## Get Classroom Details
This API will return number of students that are proficent/almost proficent/non proficent in the class base on the `{classID}`.  
Endpoint:
```perl
GET '{userID}/classroom/{classID}'
```
<br/>
To obtain a detail breakdown of proficent/almost proficent/non proficent students on each chapter(target):  
Endpoint:
```perl
GET '{userID}/classroom/{classID}/{benchmark}'
```
with `{benchmark}` options:
```JSON
"p" : proficient students
"ap": almost proficient students
"np": non proficient students
```

<br/>

<a id="section-4"></a>
## Create New Classroom
Endpoint:
```perl
POST '{userID}/classroom'
```

<br/>
Expected Body on POST:
```JSON
"classroom": {
	"grade": 6,
	"subject": "Reading",
	"starts_at": "10:55:00",
	"ends_at": "11:55:00",
	"school": "ENG100",
	"room": "D101"
}
```  
> {warning} Formatting for `starts_at` and `ends_at` must obey `HH:MM:SS`

<br/>

<a id="section-5"></a>
## Assign Classroom to a User
Endpoint:
```perl
POST '{userID}/classroom-assign'
```
<br/>
Expected Body on POST:
```JSON
"classroom": {
	"id": [1,2]
}
```

<br/>

<a id="section-6"></a>
## Update Classroom Informations
Endpoint:
```perl
POST '{userID}/classroom/{classID}'
```
<br/>
Expected Body on POST:
```JSON
"classroom": {
	"grade": 6,
	"subject": "Reading",
	"starts_at": "10:55:00",
	"ends_at": "11:55:00",
	"school": "ENG100",
	"room": "D101"
}
```
> {warning} Formatting for `starts_at` and `ends_at` must obey `HH:MM:SS`

