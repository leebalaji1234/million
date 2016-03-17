GPix, the GPL Pixel Ad Script

Preqrequisites
--------------

GPix requires the following:

    PHP version 4.0.6 or higher
    MySQL version 3.23.58 or higher (4.1 or higher recommended)
    GD2 extension for PHP
    cURL extension for PHP (if PayPal IPN or Nochex APC is used)


Skins
-----

You may not get some advanced skin designs for GPix:

http://www.tufat.com/category12.htm

To install these skins, just upload to your GPix site, replacing existing
files. Then delete all files in the "cache" and "templates_c" folders
(very important!)


Installation Instructions
-------------------------

1. Unpack the contents of the distribution onto your server.

2. Move the contents of the "public_html" folder to the document root (or a
directory beneath the document root if you prefer) on your server. Be sure to
preserve the directory structure, including the empty directores "cache",
"temp", and "templates_c". If you have recently uploaded a GPix skin, you
should delete all files from the "cache" and "templates_c" folders, so that
you do not read cached content.

3. Run the installation program by pointing your browser to the "install.php"
file (http://www.yourdomain.com/install.php or similar)

4. Follow the instruction on screen to complete the installation.

5. When the installation is complete, you will be transferred to the
Administration area. The default user name is 'admin', password 'admin'. From
there you need to do the following:

    - Set a new administrator username/password

    - Define your site name and add your administrator e-mail address and
      other settings on the "Settings" page.

    - A default grid of 1000x1000 pixels is created. You can either edit this
      grid or delete it and create grid(s) of your own. Be sure to set the
      correct pixel price on each grid.

    - Use the "Payment Modules" page to enable at least one payment module.
      Configure each enabled module.

    - Review the email templates and edit as needed.

    - By default, the site will be in "Down for Maintenance" status; you need
      to change the status to "Up" before users can access your site.


License
-------
See the enclosed LICENSE.txt file


Adding Predefined Images
------------------------
The predefined images that can be used for pixel regions are automatically
found by reading the contents of the images/pixels/ directory. This directory
contains one or more subdirectories, each of which in turn contains one or
more image files. The names of the subdirectories become the categories used
for displaying the images.

To add a new category, just create a directory below images/pixels. It should
have read (and for Unix, execute) rights for the web server user. Place your
image files into the subdirectory.


Updating FCKeditor
------------------
The FCKeditor/ directory contains an unchanged installation (with one
exception; see below) of FCKeditor version 2.2, from:

    http://www.fckeditor.net/download/default.html

You may update to a later version of FCKeditor by replacing the FCKeditor/
directory with a clean installation of the new version.

You must then change one file to enable the file manager connector. Edit the
file FCKeditor/editor/filemanager/browser/default/connectors/php/config.php
and add the following lines to the bottom of the file:

    <?php 
    // customizations added for Million Pixel Script
    require_once('../../../../../../../config.php');
    $Config['Enabled'] = true ;
    $Config['UserFilesPath'] = DOC_ROOT . 'UserFiles/' ;
    $Config['UserFilesAbsolutePath'] = PACKAGE_ROOT . 'UserFiles/' ;
    ?>

That's all there is to it.

GPix was created by Darren Gates and Bob Showalter


Copyright Information for Dom.js
--------------------------------
Software License Agreement (BSD License)

Copyright (c) 2006, Yahoo! Inc.
All rights reserved.

Redistribution and use of this software in source and binary forms, with 
or without modification, are permitted provided that the following 
conditions are met:

* Redistributions of source code must retain the above
  copyright notice, this list of conditions and the
  following disclaimer.

* Redistributions in binary form must reproduce the above
  copyright notice, this list of conditions and the
  following disclaimer in the documentation and/or other
  materials provided with the distribution.

* Neither the name of Yahoo! Inc. nor the names of its
  contributors may be used to endorse or promote products
  derived from this software without specific prior
  written permission of Yahoo! Inc.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS 
IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED 
TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A 
PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER 
OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, 
EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, 
PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR 
PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF 
LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING 
NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS 
SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
