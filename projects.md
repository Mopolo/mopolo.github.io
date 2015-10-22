---
layout: default
title: Projects
permalink: /projects/
---
These are projects I worked on in companies or as side projects.

<div>
    {% assign projects = site.projects | reverse %}
    {% for project in projects %}
        <div class="project">
            <h2><a href="{{ project.link }}">{{ project.title }}</a></h2>

            <div class="row">
                <div class="col-xs-12 col-md-6">
                    {{ project.content }}
                </div>

                <div class="col-xs-12 col-md-6">
                    <div class="row">
                        {% for image in project.images %}
                            <div class="col-xs-{% if project.images_layout == 'mobile' %}2{% else %}6{% endif %}">
                                <a href="{{ image }}" class="image-link thumbnail">
                                    <img src="{{ image }}" />
                                </a>
                            </div>
                        {% endfor %}
                    </div>
                </div>
            </div>
        </div>
    {% endfor %}
</div>
