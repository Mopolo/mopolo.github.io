---
category: Bash
title: Change a file last update date
---
It can be useful to change a file last update date, which can be done with `touch`:

```bash
# To set a date in the past
touch -d "10 minutes ago" ./example.txt

# To set it to now
touch ./example.txt
```
