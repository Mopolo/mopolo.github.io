---
category: Go
title: How to check if a variable is of some type
---
Using `variable.(type)` it's possible to check if a variable is of some type.

It returns 2 values, the value cast to the tested type (if it's of that type) and a boolean indicating if the
variable is of that type.

```go
foo := 123

if _, ok := foo.(int); ok {
    fmt.Println("foo is an int")
}
```

It works with scalar types, structs, interfaces, etc.

```go
type Foo struct {
    Bar int
}

val := Foo{Bar: 123}

if fooVal, ok := val.(Foo); ok {
    fmt.Printf("val is a Foo: %s\n", fooVal.Bar)
}
```
