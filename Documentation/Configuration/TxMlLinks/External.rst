.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../../Includes.txt


.. _ts-plugin-tx-mllinks-pi1-external:

plugin.tx_mllinks_pi1.external
------------------------------

The Layout for external links can be changed by adding the TypoScript element ``external``.

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
	image_                                                :ref:`t3tsref:data-type-string`                                       no                      "EXT:ml_links/Resources/Public/Icons/globe.gif"
	`image.<extension>`_                                  :ref:`t3tsref:data-type-string`                                       no                      *empty*
	`image.<extension>.alt`_                              :ref:`t3tsref:data-type-string`                                       no                      *empty*
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

.. _ts-plugin-tx-mllinks-pi1-external-image:

image
"""""

:typoscript:`plugin.tx_mllinks_pi1.external.image =` :ref:`t3tsref:data-type-string`

Image file and path e.g., "fileadmin/globe.gif". This file is used as default image for external links. If you have
defined a special image for some files this will be used if these files are linked.


.. _ts-plugin-tx-mllinks-pi1-external-image-extension:

image.<extension>
"""""""""""""""""

:typoscript:`plugin.tx_mllinks_pi1.external.image.<extension> =` :ref:`t3tsref:data-type-string`

It is possible to define a special image for external linked files like pdf, to do so you can define e.g., something
like this:

.. code-block:: typoscript

	plugin.tx_mllinks_pi1.external.image.pdf = EXT:ml_links/Resources/Public/Icons/filetypes/pdf.png


.. _ts-plugin-tx-mllinks-pi1-external-image-extension-alt:

image.<extension>.alt
"""""""""""""""""""""

:typoscript:`plugin.tx_mllinks_pi1.external.image.<extension>.alt =` :ref:`t3tsref:data-type-string`

Alternative text for the image.


.. _ts-plugin-tx-mllinks-pi1-external-image-link:

image.link
""""""""""

:typoscript:`plugin.tx_mllinks_pi1.external.image.link =` :ref:`t3tsref:data-type-boolean`

If an image_ is given and link is:

1
	image will be surrounded by a link too

0
	image will only be displayed


.. _ts-plugin-tx-mllinks-pi1-external-image-alt:

image.alt
"""""""""

:typoscript:`plugin.tx_mllinks_pi1.external.image.alt =` :ref:`t3tsref:data-type-string`

Alternative text for the default image_.


.. _ts-plugin-tx-mllinks-pi1-external-linktag:

linkTag
"""""""

:typoscript:`plugin.tx_mllinks_pi1.external.linkTag =` :ref:`t3tsref:data-type-boolean`

The link you've generated e.g., via RTE will be displayed if set to "1".


.. _ts-plugin-tx-mllinks-pi1-external-linktag-title:

linkTag.title
"""""""""""""

:typoscript:`plugin.tx_mllinks_pi1.external.linkTag.title =` :ref:`t3tsref:data-type-string`

Title for this link. You can use ``##linkTag##`` to insert the link target into the title.


.. _ts-plugin-tx-mllinks-pi1-external-openingatag:

openingATag
"""""""""""

:typoscript:`plugin.tx_mllinks_pi1.external.openingATag =` :ref:`t3tsref:data-type-boolean`

1
	place the opening A Tag e.g., <a href="www.media-lights.de">

0
	do not place the opening A Tag


.. _ts-plugin-tx-mllinks-pi1-external-openingatag-title:

openingATag.title
"""""""""""""""""

:typoscript:`plugin.tx_mllinks_pi1.external.openingATag.title =` :ref:`t3tsref:data-type-string`

Title for this link. You can use ``##linkTag##`` to insert the link target into the title.


.. _ts-plugin-tx-mllinks-pi1-external-openingatag-params:

openingATag.params
""""""""""""""""""

:typoscript:`plugin.tx_mllinks_pi1.external.openingATag.params =` :ref:`t3tsref:data-type-string`

Parameter for this link, you can also use ``##linkTag##`` to insert the link target.


.. _ts-plugin-tx-mllinks-pi1-external-openingatag-target:

openingATag.target
""""""""""""""""""

:typoscript:`plugin.tx_mllinks_pi1.external.openingATag.target =` :ref:`t3tsref:data-type-string`

Determines the link target, any target set via TYPO3 will be replaced.


.. _ts-plugin-tx-mllinks-pi1-external-linktext:

linkText
""""""""

:typoscript:`plugin.tx_mllinks_pi1.external.linkText =` :ref:`t3tsref:data-type-boolean`

1
	display the link text generated e.g., via RTE

0
	link text will not be displayed


.. _ts-plugin-tx-mllinks-pi1-external-closingatag:

closingATag
"""""""""""

:typoscript:`plugin.tx_mllinks_pi1.external.closingATag =` :ref:`t3tsref:data-type-boolean`

1
	place the closing A Tag (</a>)

0
	do not place the closing A Tag


.. _ts-plugin-tx-mllinks-pi1-external-string:

string
""""""

:typoscript:`plugin.tx_mllinks_pi1.external.string =` :ref:`t3tsref:data-type-string`

Any text you want to add to your link.


.. _ts-plugin-tx-mllinks-pi1-external-string-link:

string.link
"""""""""""

:typoscript:`plugin.tx_mllinks_pi1.external.string.link =` :ref:`t3tsref:data-type-boolean`

1
	text will be surrounded by a link too

0
	text will only be displayed
