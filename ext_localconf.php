<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPItoST43($_EXTKEY, 'pi1/class.tx_mllinks_pi1.php', '_pi1', 'includeLib', 1);

// Register XCLASS for DAM
$TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/dam/binding/mediatag/class.tx_dam_tsfemediatag.php'] = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('ml_links') . 'xclass/class.ux_tx_dam_tsfemediatag.php';
