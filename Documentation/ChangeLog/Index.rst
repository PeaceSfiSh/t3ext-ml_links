.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _changelog:

ChangeLog
=========

The following is a very high level overview of the changes in this extension. For more details, `read the online log <http://forge.typo3.org/projects/extension-ml_links/repository/revisions>`_.

.. tabularcolumns:: |r|p{13.7cm}|

=======  ===========================================================================
Version  Changes
=======  ===========================================================================
1.2.2    Fix compatibility issue with TYPO3 6.x
1.2.0    DAM support
1.1.1    - Allowing 'EXT:'-prefixed images to be used for external images too
         - Update documentation
1.1.0    Add lots of file type icons and a default configuration for them as a
         static TS
1.0.1    - Code clean-up with TYPO3 CGL applied
         - Documentation clean-up
1.0.0    Bump version to 1.0.0 as it is considered as stable
0.2.0    - Labels ("KB", "MB", ...) are now localized
         - Add support for external domain special icon
         - Fix compatibility issue with TYPO3 4.3
0.1.6    - New default configuration
         - Allow simple configuration via "plugin.tx_mllinks_pi1"
----     .. note:: *Extension key transferred to Xavier Perseguers*
0.1.5    Add "target" to opening A-tag
0.1.4    - Remove the default brackets from “dimensions” and “filesize”
         - Add “filename” and “revisionDate” to file links
         - Add “notFound” category for broken filelinks
         - Separator can be defined separately for each element
0.1.3    Add "params" and "title" to opening A-tag
0.1.2    Opening A-tag, closing A-tag and the link text can be placed separately
0.1.1    - ALT-tag for images
         - TITLE-tag for each link type (external, internal, mailto, file), the
           link target can be inserted by using ``###linkTag###`` in the title
0.1.0    First public release
=======  ===========================================================================
