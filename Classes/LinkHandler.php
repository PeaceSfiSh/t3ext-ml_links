<?php

namespace Waurisch\MlLinks;

/***************************************************************
*  Copyright notice
*
*  (c) 2009-2014 Xavier Perseguers (xavier@causal.ch)
*  All rights reserved
*
*  (c) 2006-2008 Markus Friedrich (markus.friedrich@media-lights.de)
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

/**
 * Plugin 'Extended links' for the 'ml_links' extension.
 *
 * @category    Plugin
 * @package     TYPO3
 * @subpackage  tx_mllinks
 * @author      Xavier Perseguers <xavier@causal.ch>
 * @author      Markus Friedrich <markus.friedrich@media-lights.de>
 * @license     http://www.gnu.org/copyleft/gpl.html
 * @version     SVN: $Id$
 */
class LinkHandler extends \TYPO3\CMS\Frontend\Plugin\AbstractPlugin
{

    protected $buildLink = true;
    protected $separator;

    /**
     * @var string
     */
    protected $tag = '';

    /**
     * Goes through config and design the link layout
     *
     * @param string $content
     * @param array $conf
     * @return string
     */
    public function main($content, $conf)
    {
        // Get configuration
        $this->conf = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_mllinks_pi1.'];

        $fileType = $GLOBALS['TSFE']->register['fileType'];
        $linkType = $GLOBALS['TSFE']->register['linkType'];
        $linkTag = $GLOBALS['TSFE']->register['tag'];
        $url = urldecode($GLOBALS['TSFE']->register['url']);

        // Use given seperator
        $this->separator = isset($this->conf['separator']) ? $this->conf['separator'] : ' ';

        // Go through configuration and modify the link
        switch ($linkType) {
            case 'file':
                $this->prepareFileLink($content, $fileType, $linkTag, $url);
                break;
            case 'mailto':
                $this->prepareMailtoLink($content, $fileType, $linkTag, $url);
                break;
            case 'page':
                $this->preparePageLink($content, $fileType, $linkTag, $url);
                break;
            case 'url':
                $this->prepareUrlLink($content, $fileType, $linkTag, $url);
                break;
            default:
                $this->buildLink = false;
                break;
        }

        // Delete temp variables
        unset($GLOBALS['TSFE']->register['fileType']);
        unset($GLOBALS['TSFE']->register['linkType']);
        unset($GLOBALS['TSFE']->register['tag']);
        unset($GLOBALS['TSFE']->register['url']);

        if (!$this->buildLink) {
            $this->tag = $content;
        }

        return $this->tag;
    }

    /**
     * Prepares the tag for a link of type "file".
     *
     * @param string $content
     * @param string $fileType
     * @param string $linkTag
     * @param string $url
     * @return void
     */
    protected function prepareFileLink($content, $fileType, $linkTag, $url)
    {
        $fileName = $url;
        // For relative links (config.baseURL), there is no leading /
        // For absolute links (config.absRefPrefix), there is a leading / or a full scheme+domain
        if (!empty($GLOBALS['TSFE']->tmpl->setup['config.']['absRefPrefix'])) {
            $absRefPrefix = $GLOBALS['TSFE']->tmpl->setup['config.']['absRefPrefix'];
            if (\TYPO3\CMS\Core\Utility\GeneralUtility::isFirstPartOfStr($fileName, $absRefPrefix)) {
                $fileName = PATH_site . substr($fileName, strlen($absRefPrefix));
            }
        }

        // Check if there is anything defined for this filetype and if the file exists
        if (isset($this->conf[$fileType . '.']) && file_exists($fileName)) {
            /** @var array $settings */
            $settings = $this->conf[$fileType . '.'];
            ksort($settings);

            foreach ($settings as $data) {
                switch (key($data)) {
                    case 'image':
                        $this->tag .= $this->insertImage($data, $linkTag);
                        break;

                    case 'linkTag':
                        $this->tag .= $this->insertLink($data, $content, $url);
                        break;

                    case 'openingATag':
                        $this->tag .= $this->insertOpeningATag($data, $linkTag, $url);
                        break;

                    case 'linkText':
                        $this->tag .= $this->insertLinkText($data, $content);
                        break;

                    case 'closingATag':
                        $this->tag .= $this->insertClosingATag($data);
                        break;

                    case 'filename':
                        $this->tag .= $this->insertFilename($data, $url);
                        break;

                    case 'revisionDate':
                        $this->tag .= $this->insertRevisionDate($data, $fileName);
                        break;

                    case 'filesize':
                        $this->tag .= $this->insertFilesize($data, $fileName, $linkTag);
                        break;

                    case 'dimensions':
                        $this->tag .= $this->insertDimensions($data, $fileName);
                        break;

                    case 'string':
                        $this->tag .= $this->insertString($data, $linkTag);
                        break;
                }
            }
        } elseif (isset($this->conf['default.']) && file_exists($fileName)) {
            // Check if there are any default settings and if the file exists
            /** @var array $settings */
            $settings = $this->conf['default.'];
            ksort($settings);

            foreach ($settings as $data) {
                switch (key($data)) {
                    case 'image':
                        $this->tag .= $this->insertImage($data, $linkTag);
                        break;

                    case 'linkTag':
                        $this->tag .= $this->insertLink($data, $content, $url);
                        break;

                    case 'openingATag':
                        $this->tag .= $this->insertOpeningATag($data, $linkTag, $url);
                        break;

                    case 'linkText':
                        $this->tag .= $this->insertLinkText($data, $content);
                        break;

                    case 'closingATag':
                        $this->tag .= $this->insertClosingATag($data);
                        break;

                    case 'filename':
                        $this->tag .= $this->insertFilename($data, $url);
                        break;

                    case 'revisionDate':
                        $this->tag .= $this->insertRevisionDate($data, $url);
                        break;

                    case 'filesize':
                        $this->tag .= $this->insertFilesize($data, $url, $linkTag);
                        break;

                    case 'string':
                        $this->tag .= $this->insertString($data, $linkTag);
                        break;
                }
            }
        } elseif (!file_exists($fileName) && isset($this->conf['notFound.'])) {
            // Check if there are any settings if the file doesn't exist
            /** @var array $settings */
            $settings = $this->conf['notFound.'];
            ksort($settings);

            foreach ($settings as $data) {
                switch (key($data)) {
                    case 'image':
                        $this->tag .= $this->insertImage($data, $linkTag);
                        break;

                    case 'string':
                        $this->tag .= $this->insertString($data, $linkTag);
                        break;

                    case 'linkText':
                        $this->tag .= $this->insertLinkText($data, $content);
                        break;

                    case 'linkTag':
                        $this->tag .= $this->insertLink($data, $content, $url);
                        break;
                }
            }
        } else {
            // Do not change the link!
            $this->buildLink = false;
        }
    }

    /**
     * Prepares the tag for a link of type "mailto".
     *
     * @param string $content
     * @param string $fileType
     * @param string $linkTag
     * @param string $url
     * @return void
     */
    protected function prepareMailtoLink($content, $fileType, $linkTag, $url)
    {
        if (isset($this->conf['mailto.'])) {
            /** @var array $settings */
            $settings = $this->conf['mailto.'];
            ksort($settings);

            foreach ($settings as $data) {
                switch (key($data)) {
                    case 'image':
                        $this->tag .= $this->insertImage($data, $linkTag);
                        break;

                    case 'linkTag':
                        $this->tag .= $this->insertLink($data, $content, $url);
                        break;

                    case 'openingATag':
                        $this->tag .= $this->insertOpeningATag($data, $linkTag, $url);
                        break;

                    case 'linkText':
                        $this->tag .= $this->insertLinkText($data, $content);
                        break;

                    case 'closingATag':
                        $this->tag .= $this->insertClosingATag($data);
                        break;

                    case 'string':
                        $this->tag .= $this->insertString($data, $linkTag);
                        break;
                }
            }
        } else {
            // Do not change the link!
            $this->buildLink = false;
        }
    }

    /**
     * Prepares the tag for a link of type "page".
     *
     * @param string $content
     * @param string $fileType
     * @param string $linkTag
     * @param string $url
     * @return void
     */
    protected function preparePageLink($content, $fileType, $linkTag, $url)
    {
        if (isset($this->conf['internal.'])) {
            /** @var array $settings */
            $settings = $this->conf['internal.'];
            ksort($settings);

            foreach ($settings as $data) {
                switch (key($data)) {
                    case 'image':
                        $this->tag .= $this->insertImage($data, $linkTag);
                        break;

                    case 'linkTag':
                        $this->tag .= $this->insertLink($data, $content, $url);
                        break;

                    case 'openingATag':
                        $this->tag .= $this->insertOpeningATag($data, $linkTag, $url);
                        break;

                    case 'linkText':
                        $this->tag .= $this->insertLinkText($data, $content);
                        break;

                    case 'closingATag':
                        $this->tag .= $this->insertClosingATag($data);
                        break;

                    case 'string':
                        $this->tag .= $this->insertString($data, $linkTag);
                        break;
                }
            }
        } else {
            // Do not change the link!
            $this->buildLink = false;
        }
    }

    /**
     * Prepares the tag for a link of type "url".
     *
     * @param string $content
     * @param string $fileType
     * @param string $linkTag
     * @param string $url
     * @return void
     */
    protected function prepareUrlLink($content, $fileType, $linkTag, $url)
    {
        $settings = array();

        if (isset($this->conf['externalDomain.'])) {
            /** @var array $domains */
            $domains = $this->conf['externalDomain.'];

            if (count($domains)) {
                foreach ($domains as $settings) {
                    if (!isset($settings['domain'])) {
                        continue;
                    }
                    $domain = $settings['domain'];
                    unset($settings['domain']);

                    if (substr($url, 0, strlen($domain)) != $domain) {
                        $settings = array();
                    } else {
                        break;
                    }
                }
            }
        }

        if (isset($this->conf['external.']) && count($settings) == 0) {
            $settings = $this->conf['external.'];
        }

        if (count($settings)) {
            ksort($settings);

            foreach ($settings as $data) {
                switch (key($data)) {
                    case 'image':
                        if (!empty($this->tag)) {
                            $this->tag .= $this->separator;
                        }

                        // Get filetype
                        $file = basename($url);
                        if (preg_match('/(.*)\.([^\.]*$)/', $file, $reg)) {
                            $ext = strtolower($reg[2]);
                            $ext = ($ext === 'jpeg') ? 'jpg' : $ext;
                        }

                        // Add image
                        if (isset($data['image.'][$ext])) {
                            $image = $data['image.'][$ext];
                            $alt = isset($data['image.'][$ext . '.']['alt']) ? $data['image.'][$ext . '.']['alt'] : '';
                        } else {
                            $image = $data['image'];
                            $alt = isset($data['image.']['alt']) ? $data['image.']['alt'] : '';
                        }
                        if (substr($image, 0, 4) === 'EXT:') {
                            // Get rid of 'EXT:'
                            $image = substr($image, 4);
                            list($ext, $path) = explode('/', $image, 2);
                            $extRelPath = substr(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($ext), strlen(PATH_site));
                            $image = $extRelPath . $path;
                        }
                        $imageTag = file_exists($image) ? '<img src="' . $image . '" alt="' . $alt . '"/>' : '';

                        // Add link if configured
                        if (isset($data['image.']['link']) && $data['image.']['link'] == 1) {
                            $this->tag .= $linkTag . $imageTag . '</a>';
                        } else {
                            $this->tag .= $imageTag;
                        }
                        $this->buildLink = true;
                        break;

                    case 'linkTag':
                        $this->tag .= $this->insertLink($data, $content, $url);
                        break;

                    case 'openingATag':
                        $this->tag .= $this->insertOpeningATag($data, $linkTag, $url);
                        break;

                    case 'linkText':
                        $this->tag .= $this->insertLinkText($data, $content);
                        break;

                    case 'closingATag':
                        $this->tag .= $this->insertClosingATag($data);
                        break;

                    case 'string':
                        $this->tag .= $this->insertString($data, $linkTag);
                        break;
                }
            }
        } else {
            // Do not change the link!
            $this->buildLink = false;
        }
    }

    /**
     * Adds an image.
     *
     * @param array $data
     * @param string $linkTag
     * @return string
     */
    protected function insertImage(array $data, $linkTag)
    {
        $img = '';

        $image = $data['image'];
        if (substr($image, 0, 4) === 'EXT:') {
            // Get rid of 'EXT:'
            $image = substr($image, 4);
            list($ext, $path) = explode('/', $image, 2);
            $extRelPath = substr(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($ext), strlen(PATH_site));
            $image = $extRelPath . $path;
        }

        if (file_exists($image)) {
            if (!empty($this->tag)) {
                if (isset($data['separator'])) {
                    $img .= $data['separator'];
                } else {
                    $img .= $this->separator;
                }
            }

            if (isset($data['image.']['link']) && $data['image.']['link'] == 1) {
                if (isset($data['image.']['alt'])) {
                    $img .= $linkTag . '<img src="' . $image . '" alt="' . $data['image.']['alt'] . '" /></a>';
                } else {
                    $img .= $linkTag . '<img src="' . $image . '" alt="" /></a>';
                }
            } else {
                if (isset($data['image.']['alt'])) {
                    $img .= '<img src="' . $image . '" alt="' . $data['image.']['alt'] . '" />';
                } else {
                    $img .= '<img src="' . $image . '" alt="" />';
                }
            }
            $this->buildLink = true;
        }

        return $img;
    }

    /**
     * Adds a linktag.
     *
     * @param array $data
     * @param string $content
     * @param string $url
     * @return string
     */
    protected function insertLink(array $data, $content, $url)
    {
        $link = '';

        if ($data['linkTag'] == 1) {
            if (!empty($this->tag)) {
                if (isset($data['separator'])) {
                    $link .= $data['separator'];
                } else {
                    $link .= $this->separator;
                }
            }

            if (isset($data['linkTag.']['title']) && !empty($data['linkTag.']['title'])) {
                $title = $data['linkTag.']['title'];

                if (preg_match('/##linkTag##/i', $title)) {
                    $title = str_replace('##linkTag##', $url, $title);
                }

                if (!preg_match('/title/i', $content)) {
                    $expr = '|^.*(<a.*)(>.*</a>.*)$|';
                    preg_match($expr, $content, $parts);
                    $link .= $parts[1] . ' title="' . $title . '" ' . $parts[2];
                } else {
                    $link .= $content;
                }
            } else {
                $link .= $content;
            }

            $this->buildLink = true;
        }

        return $link;
    }

    /**
     * Adds an opening A-tag.
     *
     * @param array $data
     * @param string $linkTag
     * @param string $url
     * @return string
     */
    protected function insertOpeningATag(array $data, $linkTag, $url)
    {
        $openingATag = '';

        if (isset($data['openingATag']) && $data['openingATag'] == 1) {
            $openingATag .= $linkTag;

            // Insert given params
            if (isset($data['openingATag.']['params']) && !empty($data['openingATag.']['params'])) {
                $params = $data['openingATag.']['params'];

                // Insert url if necessary
                if (preg_match('/##linkTag##/i', $params)) {
                    $params = str_replace('##linkTag##', $url, $params);
                }

                $expr = '/^.*(<a.*)(>.*)$/';
                preg_match($expr, $openingATag, $parts);
                $openingATag = $parts[1] . ' ' . $params . ' ' . $parts[2];
            }

            // Insert given target
            if (isset($data['openingATag.']['target']) && !empty($data['openingATag.']['target'])) {
                $target = $data['openingATag.']['target'];

                if ($openingATag != ($str = preg_replace('/target="[^"]*"/', 'target="' . $target . '"', $openingATag))) {
                    $openingATag = $str;
                } else {
                    $expr = '/^.*(<a.*)(>.*)$/';
                    preg_match($expr, $openingATag, $parts);
                    $openingATag = $parts[1] . ' target="' . $target . '" ' . $parts[2];
                }
            }

            // Insert given title except a title is already set
            if (isset($data['openingATag.']['title']) && !empty($data['openingATag.']['title'])) {
                $title = $data['openingATag.']['title'];

                // Insert url if necessary
                if (preg_match('/##linkTag##/i', $title)) {
                    $title = str_replace('##linkTag##', $url, $title);
                }

                if (!preg_match('/title/i', $openingATag)) {
                    $expr = '/^.*(<a.*)(>.*)$/';
                    preg_match($expr, $openingATag, $parts);
                    $openingATag = $parts[1] . ' title="' . $title . '"' . $parts[2];
                }
            }
        }

        return $openingATag;
    }

    /**
     * Adds a link text.
     *
     * @param array $data
     * @param string $content
     * @return string
     */
    protected function insertLinkText(array $data, $content)
    {
        $linkText = '';

        if (isset($data['linkText']) && $data['linkText'] == 1) {
            if (!empty($this->tag)) {
                if (isset($data['separator'])) {
                    $linkText .= $data['separator'];
                } else {
                    $linkText .= $this->separator;
                }
            }

            $expr = '/<a.+?>(.*)(<\/a>)/';
            preg_match($expr, $content, $parts);
            $linkText .= $parts[1];
        }

        return $linkText;
    }

    /**
     * Adds a closing A-tag.
     *
     * @param array $data
     * @return string
     */
    protected function insertClosingATag(array $data)
    {
        $closingATag = '';

        if (isset($data['closingATag']) && $data['closingATag'] == 1) {
            $closingATag .= '</a>';
        }

        $this->buildLink = true;

        return $closingATag;
    }

    /**
     * Adds the filesize.
     *
     * @param array $data
     * @param string $fileName
     * @param string $linkTag
     * @return string
     */
    protected function insertFilesize(array $data, $fileName, $linkTag)
    {
        $stringFilesize = '';

        if (($data['filesize'] == 1) && file_exists($fileName)) {
            if (!empty($this->tag)) {
                if (isset($data['separator'])) {
                    $stringFilesize .= $data['separator'];
                } else {
                    $stringFilesize .= $this->separator;
                }
            }

            $units = array(
                '0' => $this->pi_getLL('bytes'),
                '1' => $this->pi_getLL('KB'),
                '2' => $this->pi_getLL('MB'),
                '3' => $this->pi_getLL('GB'),
                '4' => $this->pi_getLL('TB'),
            );

            $j = 0;
            $filesize = filesize($fileName);
            for ($j = 0; $filesize >= 1024; $j++) {
                $filesize /= 1024;
            }

            $decimalPlaces = ($j < 2) ? 0 : $j - 1;

            $size = '(%.' . $decimalPlaces . 'f&nbsp;%s)';
            if (isset($data['filesize.']['link']) && $data['filesize.']['link'] == 1) {
                $stringFilesize .= $linkTag . sprintf($size, $filesize, $units[$j]) . '</a>';
            } else {
                $stringFilesize .= sprintf($size, $filesize, $units[$j]);
            }
            $this->buildLink = true;
        }

        return $stringFilesize;
    }

    /**
     * Adds the dimensions.
     *
     * @param array $data
     * @param string $fileName
     * @return string
     */
    protected function insertDimensions(array $data, $fileName)
    {
        $dimensions = '';

        if (($data['dimensions'] == 1) && file_exists($fileName)) {
            if (!empty($this->tag)) {
                if (isset($data['separator'])) {
                    $dimensions .= $data['separator'];
                } else {
                    $dimensions .= $this->separator;
                }
            }

            $imgData = getimagesize($fileName);
            if (!empty($imgData)) {
                $dimensions .= sprintf('%sx%s', $imgData[0], $imgData[1]);
            }

            $this->buildLink = true;
        }

        return $dimensions;
    }

    /**
     * Adds the filename.
     *
     * @param array $data
     * @param string $url
     * @return string
     */
    protected function insertFilename(array $data, $url)
    {
        $filename = '';

        if ($data['filename'] == 1) {
            if (!empty($this->tag)) {
                if (isset($data['separator'])) {
                    $filename .= $data['separator'];
                } else {
                    $filename .= $this->separator;
                }
            }

            $filename .= basename($url);
            $this->buildLink = true;
        }

        return $filename;
    }

    /**
     * Adds the revision date.
     *
     * @param array $data
     * @param string $fileName
     * @return string
     */
    protected function insertRevisionDate(array $data, $fileName)
    {
        $date = '';

        if ($data['revisionDate'] == 1 && file_exists($fileName)) {
            if (!empty($this->tag)) {
                if (isset($data['separator'])) {
                    $date .= $data['separator'];
                } else {
                    $date .= $this->separator;
                }
            }

            $format = '%Y-%m-%d';
            if (isset($data['revisionDate.']['format'])) {
                $format = $data['revisionDate.']['format'];
            }

            $date .= strftime($format, filemtime($fileName));
            $this->buildLink = true;
        }

        return $date;
    }

    /**
     * Adds a string.
     *
     * @param array $data
     * @param string $linkTag
     * @return string
     */
    protected function insertString(array $data, $linkTag)
    {
        $string = '';

        if (!empty($this->tag) && isset($data['separator'])) {
            $string .= $data['separator'];
        }

        if (isset($data['string.']['link']) && $data['string.']['link'] == 1) {
            $string .= $linkTag . $data['string'] . '</a>';
        } else {
            $string .= $data['string'];
        }
        $this->buildLink = true;

        return $string;
    }

    /**
     * Gets data of created link.
     *
     * @param array $content
     * @param array $conf
     * @return string
     */
    public function getFiletype(array $content, $conf)
    {

        // Get file extension
        $file = basename($content['url']);
        if (preg_match('/(.*)\.([^\.]*$)/', $file, $reg)) {
            $ext = strtolower($reg[2]);
            $ext = ($ext === 'jpeg') ? 'jpg' : $ext;
        }
        $GLOBALS['TSFE']->register['fileType'] = $ext;

        // Get link type
        $GLOBALS['TSFE']->register['linkType'] = $content['TYPE'];

        // Get link url
        $GLOBALS['TSFE']->register['url'] = $content['url'];

        // Get link tag
        $GLOBALS['TSFE']->register['tag'] = $content['TAG'];

        return $content['TAG'];
    }

    /**
     * Wrapper for the LocalizationUtility
     *
     * @param string $key
     * @return string
     */
    public function pi_getLL($key, $alternativeLabel = '', $hsc = FALSE)
    {
        return LocalizationUtility::translate($key, 'ml_links');
    }
}
