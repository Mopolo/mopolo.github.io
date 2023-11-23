---
category: Go
title: Unmarshall JSON when a struct type is different from the JSON type
---
Let's say you have this JSON:

```json
{
  "foo": "123"
}
```

And you want to unmarshall it into this struct:

```go
type Foo struct {
    Bar int
}
```

You can tell the JSON unmarshaller to use a different type for the `Bar` field:

```go
type Foo struct {
    Bar int `json:"bar,string"`
}
```

You can even omit the field name if it's the same (case-insensitive) as the JSON field name:

```go
type Foo struct {
    Bar int `json:",string"`
}
```
