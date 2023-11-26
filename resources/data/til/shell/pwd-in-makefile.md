---
category: Shell
title: Get the current directory in a Makefile
---
The `$PWD` variable might not always work in a Makefile.

Instead you need to use a command:

```makefile
some-target:
	@echo $(shell pwd)
```

This can be useful when using this information in another command, for example:

```makefile
some-target:
	docker run --rm -v $(shell pwd):/app composer install
```
