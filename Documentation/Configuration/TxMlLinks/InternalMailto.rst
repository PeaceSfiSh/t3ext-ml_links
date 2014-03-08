.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../../Includes.txt


.. _ts-plugin-tx-mllinks-pi1-internal:

plugin.tx_mllinks_pi1.internal and plugin.tx_mllinks_pi1.mailto
---------------------------------------------------------------

The configuration to change the layout of "internal" and "mailto" links is similar. The difference is that you have to
use "internal" as TypoScript segment for internal links and "mailto" for mail links.

.. note::

	This chapter does not cover configuration of :ref:`file links <ts-plugin-tx-mllinks-pi1-filelinks>`.

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

.. _ts-plugin-tx-mllinks-pi1-internal-image:
.. _ts-plugin-tx-mllinks-pi1-mailto-image:

image
"""""

:typoscript:`plugin.tx_mllinks_pi1.mailto.image =` :ref:`t3tsref:data-type-string`

Image file and path e.g., "fileadmin/pdf.gif". File may specified as "EXT:<extension>/relative/path" too.


.. _ts-plugin-tx-mllinks-pi1-internal-image-link:
.. _ts-plugin-tx-mllinks-pi1-mailto-image-link:

image.link
""""""""""

:typoscript:`plugin.tx_mllinks_pi1.mailto.image.link =` :ref:`t3tsref:data-type-boolean`

If an image_ is given and link is:

1
	image will be surrounded by a link too

0
	image will only be displayed


.. _ts-plugin-tx-mllinks-pi1-internal-image-alt:
.. _ts-plugin-tx-mllinks-pi1-mailto-image-alt:

image.alt
"""""""""

:typoscript:`plugin.tx_mllinks_pi1.mailto.image.alt =` :ref:`t3tsref:data-type-string`

Alternative text for the image_.


.. _ts-plugin-tx-mllinks-pi1-internal-linktag:
.. _ts-plugin-tx-mllinks-pi1-mailto-linktag:

linkTag
"""""""

:typoscript:`plugin.tx_mllinks_pi1.mailto.linkTag =` :ref:`t3tsref:data-type-boolean`

The link you've generated e.g., via RTE will be displayed if set to "1".


.. _ts-plugin-tx-mllinks-pi1-internal-linktag-title:
.. _ts-plugin-tx-mllinks-pi1-mailto-linktag-title:

linkTag.title
"""""""""""""

:typoscript:`plugin.tx_mllinks_pi1.mailto.linkTag.title =` :ref:`t3tsref:data-type-string`

Title for this link. You can use ``##linkTag##`` to insert the link target into the title.


.. _ts-plugin-tx-mllinks-pi1-internal-openingatag:
.. _ts-plugin-tx-mllinks-pi1-mailto-openingatag:

openingATag
"""""""""""

:typoscript:`plugin.tx_mllinks_pi1.mailto.openingATag =` :ref:`t3tsref:data-type-boolean`

1
	place the opening A Tag e.g., <a href="www.media-lights.de">

0
	do not place the opening A Tag


.. _ts-plugin-tx-mllinks-pi1-internal-openingatag-title:
.. _ts-plugin-tx-mllinks-pi1-mailto-openingatag-title:

openingATag.title
"""""""""""""""""

:typoscript:`plugin.tx_mllinks_pi1.mailto.openingATag.title =` :ref:`t3tsref:data-type-string`

Title for this link. You can use ``##linkTag##`` to insert the link target into the title.


.. _ts-plugin-tx-mllinks-pi1-internal-openingatag-params:
.. _ts-plugin-tx-mllinks-pi1-mailto-openingatag-params:

openingATag.params
""""""""""""""""""

:typoscript:`plugin.tx_mllinks_pi1.mailto.openingATag.params =` :ref:`t3tsref:data-type-string`

Parameter for this link, you can also use ``##linkTag##`` to insert the link target.


.. _ts-plugin-tx-mllinks-pi1-internal-openingatag-target:
.. _ts-plugin-tx-mllinks-pi1-mailto-openingatag-target:

openingATag.target
""""""""""""""""""

:typoscript:`plugin.tx_mllinks_pi1.mailto.openingATag.target =` :ref:`t3tsref:data-type-string`

Determines the link target, any target set via TYPO3 will be replaced.


.. _ts-plugin-tx-mllinks-pi1-internal-linktext:
.. _ts-plugin-tx-mllinks-pi1-mailto-linktext:

linkText
""""""""

:typoscript:`plugin.tx_mllinks_pi1.mailto.linkText =` :ref:`t3tsref:data-type-boolean`

1
	display the link text generated e.g., via RTE

0
	link text will not be displayed


.. _ts-plugin-tx-mllinks-pi1-internal-closingatag:
.. _ts-plugin-tx-mllinks-pi1-mailto-closingatag:

closingATag
"""""""""""

:typoscript:`plugin.tx_mllinks_pi1.mailto.closingATag =` :ref:`t3tsref:data-type-boolean`

1
	place the closing A Tag (</a>)

0
	do not place the closing A Tag


.. _ts-plugin-tx-mllinks-pi1-internal-string:
.. _ts-plugin-tx-mllinks-pi1-mailto-string:

string
""""""

:typoscript:`plugin.tx_mllinks_pi1.mailto.string =` :ref:`t3tsref:data-type-string`

Any text you want to add to your link.


.. _ts-plugin-tx-mllinks-pi1-internal-string-link:
.. _ts-plugin-tx-mllinks-pi1-mailto-string-link:

string.link
"""""""""""

:typoscript:`plugin.tx_mllinks_pi1.mailto.string.link =` :ref:`t3tsref:data-type-boolean`

1
	text will be surrounded by a link too

0
	text will only be displayed
