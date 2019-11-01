# Classroom  
This is an object representing a classroom. You can create new user, update and delete current classroom info.
<br/>  
The Classroom Object:
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

- [Enter A Classroom](/{{route}}/{{version}}/account#section-1)
- [Create New Classroom](/{{route}}/{{version}}/account#section-2)
- [Update Information](/{{route}}/{{version}}/account#section-3)

<a id="section-1"></a>
## Enter A Classroom
Endpoint:
```perl
GET /{user-id}/classroom
```
<br/>

<a id="section-2"></a>
## Create New Classroom


<a id="section-3"></a>

