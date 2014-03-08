.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../../Includes.txt


.. _ts-plugin-tx-mllinks-pi1-notfound:

plugin.tx_mllinks_pi1.notFound
------------------------------

With this category you can define the layout of broken file links.

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
	linkText_                                             :ref:`t3tsref:data-type-boolean`                                      no                      0
	string_                                               :ref:`t3tsref:data-type-string`                                       no                      *empty*
	===================================================== ===================================================================== ======================= ==================


Property details
^^^^^^^^^^^^^^^^

.. only:: html

	.. contents::
		:local:
		:depth: 1

.. _ts-plugin-tx-mllinks-pi1-notfound-image:

image
"""""

:typoscript:`plugin.tx_mllinks_pi1.notFound.image =` :ref:`t3tsref:data-type-string`

Image file and path e.g., "fileadmin/pdf.gif". File may specified as "EXT:<extension>/relative/path" too.


.. _ts-plugin-tx-mllinks-pi1-notfound-linktext:

linkText
""""""""

:typoscript:`plugin.tx_mllinks_pi1.notFound.linkText =` :ref:`t3tsref:data-type-boolean`

1
	display the link text generated e.g., via RTE

0
	link text will not be displayed


.. _ts-plugin-tx-mllinks-pi1-notfound-string:

string
""""""

:typoscript:`plugin.tx_mllinks_pi1.notFound.string =` :ref:`t3tsref:data-type-string`

Any text you want to add to your link.
