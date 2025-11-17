---
category: Bash
title: Generate random passwords
sources:
    - https://github.com/tytso/pwgen
    - https://doc.ubuntu-fr.org/pwgen
---
The `pwgen` command can be used to generate random passwords.

Here's a breakdown of options:
```bash
pwgen  -s  -c  -y  -1  30   5
        │   │   │   │   │   │
        │   │   │   │   │   └─── Generate 5 passwords
        │   │   │   │   │
        │   │   │   │   └─── Each password is 30 characters long
        │   │   │   │
        │   │   │   └─── Print one password per line
        │   │   │
        │   │   └─── Include at least one special character
        │   │
        │   └─── Include at least one capital letter
        │
        └─── Generate secure, completely random passwords
```
