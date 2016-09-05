---
layout: default
title: Work
permalink: /work/
---
#### These are projects I worked on in companies.

<br />

<div>
    {% assign works = site.works | reverse %}
    {% for work in works %}
        <div class="project">
            <h2 id="{{ work.anchor }}"><a href="{{ work.link }}">{{ work.title }}</a></h2>

            <div class="row">
                <div class="{% if work.images == null %}col-xs-12{% else %}col-xs-12 col-md-6{% endif %}">
                    {{ work.content }}
                </div>

                {% if work.images != null %}
                <div class="col-xs-12 col-md-6">
                    <div class="row">
                        {% for image in work.images %}
                            <div class="col-xs-{% if work.images_layout == 'mobile' %}2{% else %}6{% endif %}">
                                <a href="{{ image }}" class="image-link thumbnail">
                                    <img src="{{ image }}" />
                                </a>
                            </div>
                        {% endfor %}
                    </div>
                </div>
                {% endif %}

                <div class="col-xs-12">
                    Technologies:
                    {% for tech in work.techs %}
                    <kbd>{{ tech }}</kbd>
                    {% endfor %}
                </div>
            </div>
        </div>
    {% endfor %}
</div>
