---
category: Go
title: Optional parameters with Fx
---
It can sometimes be useful to have optional dependencies in the Fx container.

For example to run some checks when boot the app only when some dependencies are present.

```go
fx.New(
    // ...
    
    fx.Invoke(fx.Annotate(func(foo *Foo) error {
        if foo == nil {
            // The dependency was not provided, we skip the rest
            return nil
        }
        
        // Here we can run checks on foo
        
        return ...
    }, fx.ParamTags(`optional:"true"`))),
)
```
