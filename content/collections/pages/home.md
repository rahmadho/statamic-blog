---
id: 955d41e7-195c-4cf2-9815-bbfd584d4268
blueprint: page
title: Home
template: templates/page
updated_by: 1
updated_at: 1715869241
metadata_title: 'Welcome to Bakoding website'
metadata_description: 'bakoding, blog, tutorial, website'
metadata_meta_keywords:
  - bakoding
  - bakoding.com
  - blog
  - tutorial
featured_image: sample.png
content:
  -
    type: set
    attrs:
      id: lw8qdgc5
      values:
        type: partial
        template: partials/_navbar
  -
    type: set
    attrs:
      id: lw8yv8zm
      enabled: false
      values:
        type: slider
        sliders:
          -
            id: lw8yvagf
            image: 1.jpg
            title: 'Wafer Enak'
            url: '#'
          -
            id: lw8yvpm4
            image: sample.png
            title: 'Image Generator'
            url: '#'
  -
    type: paragraph
    attrs:
      textAlign: left
  -
    type: set
    attrs:
      id: lw8syw0d
      values:
        type: hero
        title: 'Payments tool for software companies'
        subtitle: 'From checkout to global sales tax compliance, companies around the world use Flowbite to simplify their payment stack.'
        link_label: 'Get Started'
        link_url: '#'
        image: phone-mockup.png
  -
    type: set
    attrs:
      id: lw98670e
      values:
        type: partial
        template: partials/_agenda
  -
    type: set
    attrs:
      id: lw9c8og7
      values:
        type: partial
        template: partials/_latest-post
  -
    type: paragraph
    attrs:
      textAlign: left
  -
    type: set
    attrs:
      id: lw8qdntb
      values:
        type: partial
        template: partials/_footer
  -
    type: paragraph
    attrs:
      textAlign: left
---
