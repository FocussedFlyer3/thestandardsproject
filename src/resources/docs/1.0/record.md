# Record  
This is an object representing recordings of a student's answers to a task. You can only call a `GET` to obtain the record.
<br/>
> {info} Manipulating this record requires a `POST` with correct JSON body using [score API](/{{route}}/{{version}}/score#section-1).

---

- [Get recording of a student's task](/{{route}}/{{version}}/record#section-1)

<a id="section-1"></a>
## Get a recording of a student's task
Endpoint:
```perl
GET '{userID}/record/{taskID}'
```
<br/>
Expected return body on GET:
```JSON
"record": {
    "score_id": 13,
    "user_id": 5,
    "score": 0,
    "records": [
        {
            "id": 2,
            "module_records": "{\"records\":{\"game_score\":500,\"quiz_score\":10,\"student_answers\":[{\"question_id\":1,\"answer\":\"B\"},{\"question_id\":2,\"answer\":\"D\"},{\"question_id\":3,\"answer\":\"D\"},{\"question_id\":4,\"answer\":\"C\"}]}}"
        }
    ]
}
```

> {info} `"module_records"` is an escaped JSON string, it should be parsed before using it.

