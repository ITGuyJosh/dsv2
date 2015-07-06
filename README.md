# Document Store

[![License](https://poser.pugx.org/cakephp/cakephp/license.svg)](https://packagist.org/packages/cakephp/cakephp)
[![Code consistency](http://squizlabs.github.io/PHP_CodeSniffer/analysis/cakephp/cakephp/grade.svg)](http://squizlabs.github.io/PHP_CodeSniffer/analysis/cakephp/cakephp/)

## Description

A prototype web based document store for users to login, search for, and download documents that administrators can assign to them via groups. Each group contains its own relavent documentation that administrators can then upload. An archiving system is in place when users upload documents so documents cannot be overwritten.

### Demo
You can access the website via [ds.itguyjosh.com](http://ds.itguyjosh.com), and entering either the following details.
#### Admin
* email : admin@mail.com
* pass : admin

#### User
* email : user@mail.com
* pass : user

## Thanks & Dependencies

This project was created using the [CakePHP](http://www.cakephp.org) - The rapid development PHP framework. A number of dependencies where also used, these include:

* [jQuery](https://jquery.com/)
* [DataTables](https://www.datatables.net/)

The Document Store could not have happened without [IRS LTD](http://www.irs-limited.com/) giving me the opportunity to prototype one of their backlog projects.

## Key Features

* Administration section for managing documents, users, tags & groups.
* Document upload & download.
* User Document archiving.
* Document filtering & searching.
* Tag creation & assignment to documents.
* User & Administration Guides.

## Documentation

The documentation surrounding this project, including:

* Project Requirements
* Project Design Document
* Development Feature List
* Database Designs
* Project Creation Document
* Test Strategy & Logs
* Maintenance Procedure
* User Guide
* Admin Guide

[Are available from this link.](https://drive.google.com/folderview?id=0B91KgZMFVJ3_fmI2cEc3djF4cllqbElXSzIySGtCc2RrTmJORW8yMV90T0d5OXF0eTlOUFE&usp=sharing)

## Improvements over this Prototype

There are a number of additions that would make this Document Store even better. These include:

* ACL user session handling - right now only an adhoc Auth::Component system is in use. 
* Being able to assign multiple groups to each user.
* User account management, such as: password reset & email notifications.
* Support section for users to request assistance.

## MIT Licence

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
