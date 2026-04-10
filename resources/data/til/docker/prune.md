---
category: Docker
title: Cleanup all Docker data
---

Docker can take a lot of room on the drive. There's a command to remove all stopped containers, images, volumes,
cache, etc.

```bash
docker system prune -a --volumes
```
