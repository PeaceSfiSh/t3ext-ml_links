.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _users-manual:

Users manual
============

After installation, "Extended Links" will parse every link created with TypoScript or via the link-tag. Settings for a
link type, the appearance will not be changed. To change the layout you have to set some TypoScript in the setup section
of your template.

.. note::

	If you use normal a-tags in your source code they will not be parsed!

Here is the TypoScript for the first example:

.. code-block:: typoscript

   plugin.tx_mllinks_pi1 {

       # definition for external links (special handling)
       externalDomain {
           1 {
               domain = http://en.wikipedia.org
               10.image = fileadmin/images/domains/wikipedia.png
               10.image.link = 0
               20.linkTag = 1
           }
           2 {
               domain = http://fr.wikipedia.org
               10.image = fileadmin/images/domains/wikipedia.png
               10.image.link = 0
               20.linkTag = 1
           }
       }

       # definition for external links (default)
       external {
           10.image = EXT:ml_links/Resources/Public/Icons/globe.gif
           10.image.link = 0
           20.linkTag = 1
       }

       # definition for mailto links here "mail@media-lights.de"
       mailto {
           10.image = EXT:ml_links/Resources/Public/Icons/mailto.gif
           10.image.link = 0
           20.linkTag = 1
       }

       # definition for filelinks with filetype "pdf"
       pdf {
           10.image = EXT:ml_links/Resources/Public/Icons/filetypes/pdf.png
           10.image.link = 0
           20.linkTag = 1
           30.filesize = 1
       }
   }

Some icons are already included in this extension, they are located in :file:`Resources/Public/Icons`. If you wish, you
may include the static TS that comes with this extension to get a standard "configuration" of links with all common
file types.
