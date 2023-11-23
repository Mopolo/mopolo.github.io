---
category: Go
title: Disable FX logs
---
The Fx Go framework outputs a lot of logs by default.

To disable them you can use the `fx.NopLogger` option when creating an app:

```go
fx.New(
    ...,
    fx.NopLogger,
    ...,
)
```
