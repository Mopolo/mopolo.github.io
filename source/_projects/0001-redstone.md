---
layout: project
title:  "Redstone"
link: "https://github.com/CraftWorldFr/redstone"
categories: project
images:
  - /img/projects/redstone-1.png
  - /img/projects/redstone-5.png
  - /img/projects/redstone-3.png
  - /img/projects/redstone-2.png
  - /img/projects/redstone-4.png
  - /img/projects/redstone-6.png
images_layout: site
techs:
  - Node.js
  - Java
---
Redstone is a `Node.js` CLI tool to create and manage [Spigot](https://www.spigotmc.org/) plugins (for Minecraft).

Using this you can:

- Generate a basic plugin structure (using Maven as the dependency manager)
- Generate boilerplate code for in-game commands, event listeners, etc
- List Spigot versions

This tool dynamically get the last stable versions of Spigot from their Maven repository.

The plugin template is downloaded [here](https://github.com/CraftWorldFr/SpigotTemplatePlugin).

A project generated using this tool can be directly imported into IntelliJ IDEA as a Maven project.
Spigot and Bukkit will be downloaded automatically via Maven.

It can be installed (with node >= 4.2.3) using npm:

```shell
$ npm install -g spigot-redstone
```

--

I also released [Commander Extra](https://github.com/CraftWorldFr/commander-extra), a wrapper around
[Commander](https://www.npmjs.com/package/commander) to be able to build CLI tools like this one more easily.
