---
experience: osedea
title:  "WeSpeakStudent"
link: "https://wespeakstudent.com/"
images:
  - /img/projects/wss-1.jpg
  - /img/projects/wss-2.jpg
  - /img/projects/wss-3.jpg
  - /img/projects/wss-4.jpg
images_layout: site
techs:
  - PHP
  - Zend 2
  - AngularJS
  - Bootstrap
  - prerender.io
  - Ionic
  - Git
---

WeSpeakStudent is the first big project I worked on at Osedea.

This project is composed of several parts:

#### Pulse, the main backend

- Built with [Zend framework 2](https://framework.zend.com/) and [Doctrine](http://www.doctrine-project.org/)
- Emails are sent using Mandrill
- The insurance company can manage everything on the website
 + update the info of all schools
 + manage school administrators accounts
 + manage students registrations forms
 + manage payments made on the website
- School administrators can manage specific info for their school
 + promotional documents
 + traffic data using the Google Analytics API
 + access to their student listing
- Students can manage their school app content
 + news
 + events
 + elections
 + polls
 + planning of push notifications in advance

#### An API

- On the same stack as Pulse
- Exposes several services to access and update data

#### A Website

- Build with [AngularJS](https://angularjs.org/)
- Responsive and multi-lang
- Students can pay for their health insurance using Stripe
- Setup of [prerender.io](https://prerender.io/) for SEO

#### Mobile apps

- Built with [Ionic](https://ionicframework.com/)
- Released on iOs and Android
- One app per school ([example](https://itunes.apple.com/ca/app/cambrian-student-life/id906025355?mt=8))
- Public transport information is available using the GTFS standard
