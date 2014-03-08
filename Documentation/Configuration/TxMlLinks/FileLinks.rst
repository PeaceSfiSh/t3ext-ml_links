.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../../Includes.txt


.. _ts-plugin-tx-mllinks-pi1-filelinks:

plugin.tx_mllinks_pi1.<extension>
---------------------------------

To define a special layout for file links you have to give the settings seperatly for each file type,
e.g., "pdf" or "zip".

.. only:: html

	.. contents::
		:local:
		:depth: 1


Properties
^^^^^^^^^^

.. container:: ts-properties

	===================================================== ===================================================================== ======================= ==================
	Property                                              Data type                                                             :ref:`t3tsref:stdwrap`  Default
	===================================================== ===================================================================== ======================= ==================
	filesize_                                             :ref:`t3tsref:data-type-boolean`                                      no                      0
	`filesize.link`_                                      :ref:`t3tsref:data-type-boolean`                                      no                      0
	dimensions_                                           :ref:`t3tsref:data-type-boolean`                                      no                      0
	filename_                                             :ref:`t3tsref:data-type-boolean`                                      no                      0
	revisionDate_                                         :ref:`t3tsref:data-type-boolean`                                      no                      0
	`revisionDate.format`_                                :ref:`t3tsref:data-type-string`                                       no                      "%Y-%m-%d"
	image_                                                :ref:`t3tsref:data-type-string`                                       no                      *empty*
	`image.link`_                                         :ref:`t3tsref:data-type-boolean`                                      no                      0
	`image.alt`_                                          :ref:`t3tsref:data-type-string`                                       no                      *empty*
	linkTag_                                              :ref:`t3tsref:data-type-boolean`                                      no                      1
	`linkTag.title`_                                      :ref:`t3tsref:data-type-string`                                       no                      *empty*
	openingATag_                                          :ref:`t3tsref:data-type-boolean`                                      no                      0
	`openingATag.title`_                                  :ref:`t3tsref:data-type-string`                                       no                      *empty*
	`openingATag.params`_                                 :ref:`t3tsref:data-type-string`                                       no                      *empty*
	`openingATag.target`_                                 :ref:`t3tsref:data-type-string`                                       no                      *empty*
	linkText_                                             :ref:`t3tsref:data-type-boolean`                                      no                      0
	closingATag_                                          :ref:`t3tsref:data-type-boolean`                                      no                      0
	string_                                               :ref:`t3tsref:data-type-string`                                       no                      *empty*
	`string.link`_                                        :ref:`t3tsref:data-type-boolean`                                      no                      0
	===================================================== ===================================================================== ======================= ==================


Property details
^^^^^^^^^^^^^^^^

.. only:: html

	.. contents::
		:local:
		:depth: 1

.. _ts-plugin-tx-mllinks-pi1-filelinks-filesize:

filesize
""""""""

:typoscript:`plugin.tx_mllinks_pi1.<extension>.filesize =` :ref:`t3tsref:data-type-boolean`

1
	display size of linked file

0
	file size will not be displayed

.. note:: The file size of external files cannot be determined!


.. _ts-plugin-tx-mllinks-pi1-filelinks-filesize-link:

filesize.link
"""""""""""""

:typoscript:`plugin.tx_mllinks_pi1.<extension>.filesize.link =` :ref:`t3tsref:data-type-boolean`

If filesize_ is set to '1' and link is:

1
	file size will be surrounded with a link too

0
	file size will only be displayed


.. _ts-plugin-tx-mllinks-pi1-filelinks-dimensions:

dimensions
""""""""""

:typoscript:`plugin.tx_mllinks_pi1.<extension>.dimensions =` :ref:`t3tsref:data-type-boolean`

If you have linked an GIF, JPG, PNG, SWF, SWC, PSD, TIFF, BMP, IFF, JP2, JPX, JB2, JPC, XBM, or WBMP image file you can
define to show its dimensions:

1
	dimensions will be shown

0
	dimensions will not displayed


.. _ts-plugin-tx-mllinks-pi1-filelinks-filename:

filename
""""""""

:typoscript:`plugin.tx_mllinks_pi1.<extension>.filename =` :ref:`t3tsref:data-type-boolean`

1
	file name will be displayed

0
	file name will not be displayed


.. _ts-plugin-tx-mllinks-pi1-filelinks-revisiondate:

revisionDate
""""""""""""

:typoscript:`plugin.tx_mllinks_pi1.<extension>.revisionDate =` :ref:`t3tsref:data-type-boolean`

1
	revision date will be displayed

0
	revision date will not be displayed


.. _ts-plugin-tx-mllinks-pi1-filelinks-revisiondate-format:

revisionDate.format
"""""""""""""""""""

:typoscript:`plugin.tx_mllinks_pi1.<extension>.revisionDate.format =` :ref:`t3tsref:data-type-string`

Format for the revision date, the format has to be given in PHP-style. Have a look at
http://www.php.net/manual/en/function.strftime.php. For example "%Y-%m-%d" will generate a date in this format
"2005-10-24", this is also the default format.


.. _ts-plugin-tx-mllinks-pi1-filelinks-image:

image
"""""

:typoscript:`plugin.tx_mllinks_pi1.<extension>.image =` :ref:`t3tsref:data-type-string`

Image file and path e.g., "fileadmin/pdf.gif". File may specified as "EXT:<extension>/relative/path" too.


.. _ts-plugin-tx-mllinks-pi1-filelinks-image-link:

image.link
""""""""""

:typoscript:`plugin.tx_mllinks_pi1.<extension>.image.link =` :ref:`t3tsref:data-type-boolean`

If an image_ is given and link is:

1
	image will be surrounded by a link too

0
	image will only be displayed


.. _ts-plugin-tx-mllinks-pi1-filelinks-image-alt:

image.alt
"""""""""

:typoscript:`plugin.tx_mllinks_pi1.<extension>.image.alt =` :ref:`t3tsref:data-type-string`

Alternative text for the image_.


.. _ts-plugin-tx-mllinks-pi1-filelinks-linktag:

linkTag
"""""""

:typoscript:`plugin.tx_mllinks_pi1.<extension>.linkTag =` :ref:`t3tsref:data-type-boolean`

The link you've generated e.g., via RTE will be displayed if set to "1".


.. _ts-plugin-tx-mllinks-pi1-filelinks-linktag-title:

linkTag.title
"""""""""""""

:typoscript:`plugin.tx_mllinks_pi1.<extension>.linkTag.title =` :ref:`t3tsref:data-type-string`

Title for this link. You can use ``##linkTag##`` to insert the link target into the title.


.. _ts-plugin-tx-mllinks-pi1-filelinks-openingatag:

openingATag
"""""""""""

:typoscript:`plugin.tx_mllinks_pi1.<extension>.openingATag =` :ref:`t3tsref:data-type-boolean`

1
	place the opening A Tag e.g., <a href="www.media-lights.de">

0
	do not place the opening A Tag


.. _ts-plugin-tx-mllinks-pi1-filelinks-openingatag-title:

openingATag.title
"""""""""""""""""

:typoscript:`plugin.tx_mllinks_pi1.<extension>.openingATag.title =` :ref:`t3tsref:data-type-string`

Title for this link. You can use ``##linkTag##`` to insert the link target into the title.


.. _ts-plugin-tx-mllinks-pi1-filelinks-openingatag-params:

openingATag.params
""""""""""""""""""

:typoscript:`plugin.tx_mllinks_pi1.<extension>.openingATag.params =` :ref:`t3tsref:data-type-string`

Parameter for this link, you can also use ``##linkTag##`` to insert the link target.


.. _ts-plugin-tx-mllinks-pi1-filelinks-openingatag-target:

openingATag.target
""""""""""""""""""

:typoscript:`plugin.tx_mllinks_pi1.<extension>.openingATag.target =` :ref:`t3tsref:data-type-string`

Determines the link target, any target set via TYPO3 will be replaced.


.. _ts-plugin-tx-mllinks-pi1-filelinks-linktext:

linkText
""""""""

:typoscript:`plugin.tx_mllinks_pi1.<extension>.linkText =` :ref:`t3tsref:data-type-boolean`

1
	display the link text generated e.g., via RTE

0
	link text will not be displayed


.. _ts-plugin-tx-mllinks-pi1-filelinks-closingatag:

closingATag
"""""""""""

:typoscript:`plugin.tx_mllinks_pi1.<extension>.closingATag =` :ref:`t3tsref:data-type-boolean`

1
	place the closing A Tag (</a>)

0
	do not place the closing A Tag


.. _ts-plugin-tx-mllinks-pi1-filelinks-string:

string
""""""

:typoscript:`plugin.tx_mllinks_pi1.<extension>.string =` :ref:`t3tsref:data-type-string`

Any text you want to add to your link.


.. _ts-plugin-tx-mllinks-pi1-filelinks-string-link:

string.link
"""""""""""

:typoscript:`plugin.tx_mllinks_pi1.<extension>.string.link =` :ref:`t3tsref:data-type-boolean`

1
	text will be surrounded by a link too

0
	text will only be displayed
