Demoseille
==========

Analytics for Foursquare venue owners.

This is a **work in progress** project, this documentation does not imply all 
the existing features (for more or less).

Requirements
------------

* PHP >= 5.3.5
* MySQL >= 5

Contents
--------

* [Requirements](#requirements)
* [Installation](#installation)
* [API end points](#api-endpoints)
    * [/venues](#getpost-venues)
    * [/venues/\*](#get-venues)
    * [/venues/\*/stats](#get-venuesstats)
    * [/venues/\*/people](#get-venuespeople)
    * [/venues/\*/people/\*](#get-venuespeople-2)
    * [/venues/\*/near](#get-venuesnear)
    * [/venues/\*/near/*](#get-venuesnear-2)
    * [/venues/\*/snapshot](#get-venuessnapshot)


Installation
------------

Installing is made using `make`. 
Make sure it is availiable and you have internet access when you run this command:

    $ make install

Point the web server to use the `public` folder as the Document Root. All requests
**must** be redirected to the `index.php` file. If Apache is used, a `.htaccess`
is already provided.


API endpoints
-------------

A list of URIs identifying the availiable resources in the given supported formats:

* text/html
* text/xml
* application/json
* application/x-net.php.serialize.vnd

### [GET/POST] `/venues`

List and search of venues.

Examples:

* `/venues?q=tribeca` Lists venues that are managed by the current API with the given name

*[Back to Contents](#contents)*

### [GET] `/venues/*`

Shows basic information about an specific venue.

*[Back to Contents](#contents)*

### [GET] `/venues/*/stats`

Shows detailed statics about the given venue:

* Total checkins
* New chekeins
* Unique visitors
* Sharing (Facebook/Twitter)
* Gender (Male/Female)
* Age
* Checkins per hour
* Histogram
* Tips
* Photos

*[Back to Contents](#contents)*

### [GET] `/venues/*/people`

Shows detailed information from the given venue related to people.

* Top people
* Recent people
* Unique people

*[Back to Contents](#contents)*

### [GET] `/venues/*/people/*`

Shows detailed information from the given venue related to a given person.

* Checkin history
* Tip history
* Photo history
* Comentary history
* Related people

OBS: Information provided only since the crawling for that vendor started.

*[Back to Contents](#contents)*

### [GET] `/venues/*/near`

Shows information about near venues related to the given venue.

* Similar audience
* Similar venues
* Same venue category
* Popular venues

OBS: Information provided only since the crawling for that vendor started.

*[Back to Contents](#contents)*

### [GET] `/venues/*/near/*`

Shows information about a near venue related to the given venue.

* Distance
* Same people
* Competing audience

OBS: Information provided only since the crawling for that vendor started.

*[Back to Contents](#contents)*

### [GET] `/venues/*/snapshot`

Basic information resuming what is provided by `stats`, `near` and `people` for 
the last hour.

OBS: Information provided only since the crawling for that vendor started.

*[Back to Contents](#contents)*

Contact
-------

If you feel like talking, you can reach us at:

* Alexandre Gaigalas: @alganet or alexandre@gaigalas.net
* Augusto Pascutti: @augustohp or augusto@phpsp.org.br

License
-------

    Locais.mobi, Foursquare statistics for venue owners.
    Copyright (C) 2012 Aeronautics

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU Affero General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Affero General Public License for more details.

    You should have received a copy of the GNU Affero General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.