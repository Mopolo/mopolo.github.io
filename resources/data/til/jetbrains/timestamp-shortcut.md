---
category: JetBrains
title: Adding a timestamp shortcut
---
There is a way in Jetbrains IDEs to insert the current timestamp anywhere.

## Setup

First go to **Settings | Editor | Live Templates** and create a new one with:

- Abbreviation: `ts`
- Description: `Current timestamp`
- Template test: `$timestamp$`

Then click **Edit variables** and set the expression to this:

```
groovyScript("(int) (new Date().getTime() / 1000L);")
```

The last thing to do is to define the context where the shortcut will be available.

## Usage

Now all you need to do is type `ts` then press <kbd>tab</kbd> to insert the current timestamp.
