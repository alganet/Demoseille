locais.mobi
===========

Analytics for Foursquare venue owners.

This is a **work in progress** project, this documentation does not imply all 
the existing features (for more or less).

Requirements
------------

* PHP >= 5.3.5
* Respect (PHP Components)
    * Loader >= 0.2.0
    * Rest >= 0.4.4
    * Config >= 0.4.1
    * Relational >=  0.4.4
    * Validation >=  0.4.4

API endpoints
-------------

A list of URIs identifying the availiable resources in the given supported formats:

* text/html
* application/json
* text/xml
* application/x-net.php.serialize.vnd

### [GET/POST] `/venues`

List and search of venues.

Examples:

* `/venues?q=tribeca` Lists venues that are managed by the current API with the given name

### [GET] `/venues/*`

Shows basic information about an specific venue.

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

### [GET] `/venues/*/people`

Shows detailed information from the given venue related to people.

* Top people
* Recent people
* Unique people

### [GET] `/venues/*/people/*`

Shows detailed information from the given venue related to a given person.

* Checkin history
* Tip history
* Photo history
* Comentary history
* Related people

**OBS: Information provided only since the crawling for that vendor started.**

### [GET] `/venues/*/near`

Shows information about near venues related to the given venue.

* Similar audience
* Similar venues
* Same venue category
* Popular venues

**OBS: Information provided only since the crawling for that vendor started.**

### [GET] `/venues/*/near/*`

Shows information about a near venue related to the given venue.

* Distance
* Same people
* Competing audience

**OBS: Information provided only since the crawling for that vendor started.**

### [GET] `/venues/*/snapshot`

Basic information resuming what is provided by `stats`, `near` and `people` for 
the last hour.

**OBS: Information provided only since the crawling for that vendor started.**

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

Contact
-------

If you feel like talking, you can reach us at:

* Alexandre Gaigalas: @alganet or alexandre@gaigalas.net
* Augusto Pascutti: @augustohp or augusto@phpsp.org.br