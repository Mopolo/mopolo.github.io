---
category: Makefile
title: Check if a command exists
---
Sometimes it can be useful to know if a command exists from a Makefile.


For this we can use the `command` tool:
```makefile
some-target:
	@command -v foo >/dev/null 2>&1 || { echo >&2 "missing foo"; exit 1; }
	foo
```

In this example, if the `foo` binary is not available, it will print the message and exit.

Note the `@` before the `command` binary, it's used to [hide its execution](/til/makefile/hide-command-execution).
