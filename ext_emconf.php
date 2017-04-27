<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "ml_links".
 *
 * Auto generated 14-03-2014 08:29
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
    'title' => 'Extended Links',
    'description' => '"Extended Links" lets you post-process generated links (file, mailto, internal and external) to enrich them with additional information such as a type icon (PDF, DOC, ...) for links to a file or a mailbox icon for mailto links. Last modification date or size of a file to download may easily be appended as well.',
    'category' => 'fe',
    'shy' => 0,
    'dependencies' => '',
    'version' => '1.3.0',
    'conflicts' => '',
    'priority' => '',
    'loadOrder' => '',
    'module' => '',
    'state' => 'beta',
    'internal' => 0,
    'uploadfolder' => 0,
    'createDirs' => '',
    'modify_tables' => '',
    'clearCacheOnLoad' => 1,
    'lockType' => '',
    'author' => 'Xavier Perseguers',
    'author_email' => 'xavier@causal.ch',
    'author_company' => 'Causal Sarl',
    'CGLcompliance' => '',
    'CGLcompliance_note' => '',
    '_md5_values_when_last_written' => 'a:75:{s:9:"ChangeLog";s:4:"7c29";s:12:"ext_icon.gif";s:4:"8aef";s:12:"ext_icon.png";s:4:"ef59";s:17:"ext_localconf.php";s:4:"76e7";s:14:"ext_tables.php";s:4:"18fe";s:24:"ext_typoscript_setup.txt";s:4:"36e8";s:34:"Configuration/TypoScript/setup.txt";s:4:"4214";s:26:"Documentation/Includes.txt";s:4:"82ee";s:23:"Documentation/Index.rst";s:4:"af75";s:26:"Documentation/Settings.yml";s:4:"6c66";s:25:"Documentation/Targets.rst";s:4:"94c2";s:33:"Documentation/ChangeLog/Index.rst";s:4:"c2a7";s:37:"Documentation/Configuration/Index.rst";s:4:"98e3";s:50:"Documentation/Configuration/TxMlLinks/External.rst";s:4:"5de3";s:51:"Documentation/Configuration/TxMlLinks/FileLinks.rst";s:4:"5bf1";s:47:"Documentation/Configuration/TxMlLinks/Index.rst";s:4:"e151";s:56:"Documentation/Configuration/TxMlLinks/InternalMailto.rst";s:4:"61fe";s:50:"Documentation/Configuration/TxMlLinks/NotFound.rst";s:4:"ed12";s:52:"Documentation/Images/prefix-icon-suffix-filesize.png";s:4:"d9f8";s:43:"Documentation/Images/prefix-suffix-icon.png";s:4:"a186";s:45:"Documentation/Images/suffix-icon-filesize.png";s:4:"c119";s:36:"Documentation/Introduction/Index.rst";s:4:"b4dd";s:37:"Documentation/KnownProblems/Index.rst";s:4:"5572";s:35:"Documentation/UsersManual/Index.rst";s:4:"b38b";s:32:"Resources/Public/Icons/globe.gif";s:4:"5d5f";s:33:"Resources/Public/Icons/mailto.gif";s:4:"bab3";s:40:"Resources/Public/Icons/domains/typo3.png";s:4:"b7b2";s:44:"Resources/Public/Icons/domains/wikipedia.png";s:4:"d712";s:39:"Resources/Public/Icons/external/doc.png";s:4:"5941";s:43:"Resources/Public/Icons/external/overlay.png";s:4:"2075";s:39:"Resources/Public/Icons/external/pdf.png";s:4:"536e";s:40:"Resources/Public/Icons/filetypes/asc.png";s:4:"a114";s:40:"Resources/Public/Icons/filetypes/bz2.png";s:4:"a218";s:38:"Resources/Public/Icons/filetypes/c.png";s:4:"356c";s:40:"Resources/Public/Icons/filetypes/cer.png";s:4:"9c1c";s:40:"Resources/Public/Icons/filetypes/cpp.png";s:4:"a208";s:40:"Resources/Public/Icons/filetypes/deb.png";s:4:"fe15";s:40:"Resources/Public/Icons/filetypes/doc.png";s:4:"4f18";s:41:"Resources/Public/Icons/filetypes/docx.png";s:4:"bbbb";s:40:"Resources/Public/Icons/filetypes/dtd.png";s:4:"9c49";s:40:"Resources/Public/Icons/filetypes/dvi.png";s:4:"f562";s:40:"Resources/Public/Icons/filetypes/eps.png";s:4:"b497";s:40:"Resources/Public/Icons/filetypes/exe.png";s:4:"4698";s:40:"Resources/Public/Icons/filetypes/gif.png";s:4:"1e25";s:40:"Resources/Public/Icons/filetypes/gpg.png";s:4:"64cc";s:39:"Resources/Public/Icons/filetypes/gz.png";s:4:"6224";s:38:"Resources/Public/Icons/filetypes/h.png";s:4:"c354";s:41:"Resources/Public/Icons/filetypes/java.png";s:4:"b0a6";s:40:"Resources/Public/Icons/filetypes/jpg.png";s:4:"4ea1";s:40:"Resources/Public/Icons/filetypes/m4a.png";s:4:"7fdc";s:40:"Resources/Public/Icons/filetypes/mid.png";s:4:"3637";s:40:"Resources/Public/Icons/filetypes/mov.png";s:4:"d5c6";s:40:"Resources/Public/Icons/filetypes/mp3.png";s:4:"c98e";s:40:"Resources/Public/Icons/filetypes/mpg.png";s:4:"c629";s:40:"Resources/Public/Icons/filetypes/pdf.png";s:4:"fcf4";s:40:"Resources/Public/Icons/filetypes/png.png";s:4:"1e25";s:40:"Resources/Public/Icons/filetypes/pps.png";s:4:"adbd";s:40:"Resources/Public/Icons/filetypes/ppt.png";s:4:"a92f";s:41:"Resources/Public/Icons/filetypes/pptx.png";s:4:"4e08";s:39:"Resources/Public/Icons/filetypes/ps.png";s:4:"8312";s:40:"Resources/Public/Icons/filetypes/psd.png";s:4:"749e";s:39:"Resources/Public/Icons/filetypes/sh.png";s:4:"2731";s:40:"Resources/Public/Icons/filetypes/t3x.png";s:4:"3806";s:40:"Resources/Public/Icons/filetypes/tex.png";s:4:"632b";s:40:"Resources/Public/Icons/filetypes/tgz.png";s:4:"6224";s:40:"Resources/Public/Icons/filetypes/txt.png";s:4:"5198";s:40:"Resources/Public/Icons/filetypes/vsd.png";s:4:"1119";s:40:"Resources/Public/Icons/filetypes/wav.png";s:4:"f424";s:40:"Resources/Public/Icons/filetypes/xls.png";s:4:"7879";s:41:"Resources/Public/Icons/filetypes/xlsx.png";s:4:"fb83";s:40:"Resources/Public/Icons/filetypes/xml.png";s:4:"7080";s:40:"Resources/Public/Icons/filetypes/zip.png";s:4:"703d";s:28:"pi1/class.tx_mllinks_pi1.php";s:4:"b658";s:17:"pi1/locallang.xml";s:4:"c966";s:39:"xclass/class.ux_tx_dam_tsfemediatag.php";s:4:"fd8b";}',
    'constraints' => array(
        'depends' => array(
            'typo3' => '6.2.0-7.6.99',
        ),
        'conflicts' => array(
        ),
        'suggests' => array(
        ),
    ),
    'suggests' => array(
    ),
);
