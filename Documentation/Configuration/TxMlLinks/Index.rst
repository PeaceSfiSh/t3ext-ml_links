.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../../Includes.txt


.. _ts-plugin-tx-mllinks-pi1:

plugin.tx_mllinks_pi1
---------------------

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
	separator_                                            :ref:`t3tsref:data-type-string`                                       no                      "&nbsp;"
	===================================================== ===================================================================== ======================= ==================


Property details
^^^^^^^^^^^^^^^^

.. only:: html

	.. contents::
		:local:
		:depth: 1


.. _ts-plugin-tx-mllinks-pi1-separator:

separator
"""""""""

:typoscript:`plugin.tx_mllinks_pi1.separator =` :ref:`t3tsref:data-type-string`

String that is used to separate the various elements (icon, file size, ...). If you do not override this configuration
value the elements are separated with a non-breaking space character. To delete the separator set it to an empty string
(separator = "").
