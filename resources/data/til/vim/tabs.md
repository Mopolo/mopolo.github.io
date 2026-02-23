---
category: Vim
title: Display tab characters
---
It is possible to display tab characters when editing a file in vim.

In the `.vimrc` file:

```
set list
set listchars=tab:>-
```

This will display a tab character as `>-------`
