---
layout: page
title: "Setting up your development environment"
permalink: /tutorial/setup
---

## 1. Create a GitHub Repository (Optional)

It is best practice to create a git repository for your extension module. If you are unfamiliar with creating a GitHub repository, we suggest you check out this [step-by-step documentation](https://docs.github.com/en/get-started/quickstart/create-a-repo). To follow along with this tutorial, I suggest creating the following repository in your own GitHub user account:

| Field | Value |
|---|---|
| Repository Name | lstrptut_s4rnhy |
| Description | A tutorial on how to create a Tripal/Drupal service for a Genome Assembly search/access Service using dependency injection. |

Now, clone this repository locally:

```
git clone https://github.com/LS-TripalTutorials/lstrptut_s4rnhy.git
```

```
Cloning into 'lstrptut_s4rnhy'...
remote: Enumerating objects: 282, done.
remote: Counting objects: 100% (282/282), done.
remote: Compressing objects: 100% (189/189), done.
remote: Total 282 (delta 92), reused 247 (delta 69), pack-reused 0
Receiving objects: 100% (282/282), 2.18 MiB | 4.31 MiB/s, done.
Resolving deltas: 100% (92/92), done.
```

## 2. Set-up Tripal Docker for Module Development

Navigate to the directory containing your module on the terminal. At this point the directory should be empty except for a README.md file.

We are going to use Tripal Docker to create a fully contained development environment for Tripal and then link/mount this local directory inside that environment. This will allow you to make code changes locally and they will be reflected immediately in the development environment. It also ensures that the only requirement for this tutorial is docker!

```
cd lstrptut_s4rnhy
docker run --publish=9000:80 --name=LStutorial -tid --volume=`pwd`:/var/www/drupal9/web/modules/lstrptut_s4rnhy tripalproject/tripaldocker:latest
```

```
Unable to find image 'tripalproject/tripaldocker:latest' locally
latest: Pulling from tripalproject/tripaldocker
8740c948ffd4: Already exists
1873be858264: Already exists
7ce6a163d8c1: Already exists
008a172010ba: Already exists
d15353ae3d77: Already exists
223eb1888c0f: Already exists
83374c2a967a: Already exists
8fdc86711b26: Already exists
23c0224c39b8: Already exists
915d82c7f5c5: Already exists
dc037a9c9035: Already exists
768542e0b637: Already exists
d7ade602d94f: Already exists
3f38d2277614: Pull complete
e043eb78103f: Pull complete
64ed92e11574: Pull complete
68d055cef744: Pull complete
5337cfb031c7: Pull complete
baaf353979ae: Pull complete
f3a05f260b72: Pull complete
2685726cacf2: Pull complete
84566e875be9: Pull complete
0dff2b6481e7: Pull complete
6c60544bfa40: Pull complete
7317eead8df8: Pull complete
61e317f03b0a: Pull complete
2094b29ec457: Pull complete
c88e031c8c16: Pull complete
28b0314968d0: Pull complete
5b7a27acfbf0: Pull complete
a94efcbc9cc8: Pull complete
9a3d796e0bd7: Pull complete
Digest: sha256:1eb66a21a8686ed9391ba7bf2035823021fae0363e2fa2260eead7814627de9b
Status: Downloaded newer image for tripalproject/tripaldocker:latest
ab393d13a73a53057d0498ec8facc551302048d744909ccc7301cae523663cc9
```

Then you simply start the database within your new development container:

```
docker exec LStutorial service postgresql restart
```

```
Restarting PostgreSQL 13 database server: main.
```

And now you have a fully functioning Tripal site which you can view at http://localhost:9000 in the web browser of your choice that is set-up to develop a new Tripal extension module!

## 3. Use Drush to Create a Module Skeleton

Drush is a command line shell and Unix scripting interface for Drupal that ships with many commands and code generators. It is included in TripalDocker and we will use it in this tutorial to generate skeleton code for our module and eventually our service as well.

The following command executes the drush generate command within your development container with the argument “module” to indicate that we would like it to generate a module skeleton for us.

```
docker exec -it LStutorial drush generate module
```

It will also ask if you want to create a number of other things, leave the default “No” selected. Once it is done prompting you, it will create files in the docker container that are then sync’d with our local directory.

At this point our module is really just a YAML file describing our module to Drupal.

```yml
name: "Example Service: Genome Assembly"
type: module
description: "Provides a service for searching genome assemblies stored in Chado."
package: "LS Tripal Tutorials"
core_version_requirement: ^9 || ^10
dependencies:
  - tripal
  - tripal_chado
```

That said, this single file is quite powerful as it plugs this directory into the Drupal Module API. You will now be able to navigate to your Tripal development site and enable this module!
