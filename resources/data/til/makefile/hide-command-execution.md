---
category: Makefile
title: Hide a command execution
---
When a command is run by a Makefile, it is displayed into to terminal.

It is possible to disable this by prefixing the command with `@`:

```makefile
some-target:
	@echo "test"
```
