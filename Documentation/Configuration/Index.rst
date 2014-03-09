.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _configuration:

Configuration
=============

The definition of the link layout differs for external, internal, mail and filelinks in detail. The possible value are
always ``image``, ``linkTag``, ``filesize`` and ``string``, the position of each element is given via an index. Note
that you can add as many elements as you want to.

For all types it's important to place the TypoScript at the right place, otherwise the extension will do nothing. By
default the extension's configuration is set in:

- tt_content.text.20.parseFunc.tags.link

- tt_content.text.20.parseFunc.tags.typolist.default.parseFunc.tags.link

- lib.parseFunc.tags.link

- lib.parseFunc_RTE.tags.link

.. tip::
	You may need to extend the default extension's configuration if you want to process output of 3rd-party extensions.
	E.g., with tt_news, you should add this:

	.. code-block:: typoscript

		plugin.tt_news.displaySingle.content_stdWrap.parseFunc < lib.parseFunc_RTE


.. toctree::
	:maxdepth: 5
	:titlesonly:
	:glob:

	TxMlLinks/Index
	TxMlLinks/FileLinks
	TxMlLinks/NotFound
	TxMlLinks/External
	TxMlLinks/InternalMailto
