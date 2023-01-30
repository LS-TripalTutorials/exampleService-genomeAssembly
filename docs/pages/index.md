---
layout: page
title: "Tripal Services and Dependency Injection: Genome Assemblies Example"
permalink: /
tags:
  - Tripal 4
  - Services
  - Dependency Injection
---

{% include author-block.html %}

This tutorial and associated documentation will teach you how to create a Tripal service and use dependency injection to make the new Tripal DBX Chado database connection available within your code.

The tutorial will walk you through a hands-on example with code samples and short explanations guiding you through. The service created in the example is focused on providing access to genome assemblies stored in Chado using best practices.

In the left sidebar you will also notice an "Explanations" section which will describe more in depth what a service is, when you will want to use one and what I mean by dependency injection. These are provided to help you guide you to deeper understanding beyond the code given in the tutorial. It is separated out to keep the hands-on tutorial leaner and less overwhelming.

The following table summarizes the tokens used in this tutorial that you will want to replace with your own names when using this tutorial to create your own custom service:

| Value                             | Description                                                                    |
|-----------------------------------|--------------------------------------------------------------------------------|
| lstrptut_s4rnhy                   | The machine name of the module this service will be created in.                |
| LStutorial                        | The name of the docker container we will be using throughout this tutorial.    |
| lstrptut_s4rnhy.genomeassemblies  | The machine name of the service we will create.                                |
| GenomeAssemblies                  | The name of our service class.                                                 |

Additionally, you can find all the example code and the source for this tutorial in the following GitHub Repository. All of this material is open source and free to use in your own documentation (excluding commercial use).

## [GitHub:LS-TripalTutorials/lstrptut_s4rnhy](https://github.com/LS-TripalTutorials/lstrptut_s4rnhy)
