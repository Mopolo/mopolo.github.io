---
category: Go
title: How to make sure a struct implements an interface
---
Interfaces in Go are implicit. It means there is no syntax to tell the compiler that a struct implements a specific
interface. If the struct has all the correct interface methods with the same signatures, then it implements it.

However, there is a way to check it at compile time by using a cast:

```go
type Greeter interface {
	SayHello(): string
}

type ExempleGreeter struct{}

func (ExempleGreeter) SayHello() string {
	return "Hello!"
}

var _ Greeter = (*ExempleGreeter)(nil)
```

With this `var` instruction, if the interface changes, the code won't compile anymore.
