<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2006 Markus Friedrich (markus.friedrich@media-lights.de)
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
/**
 * Plugin 'Extended links' for the 'ml_links' extension.
 *
 * @author	Markus Friedrich <markus.friedrich@media-lights.de>
 */


require_once(PATH_tslib."class.tslib_pibase.php");

class tx_mllinks_pi1 extends tslib_pibase {
	var $prefixId = "tx_mllinks_pi1";		// Same as class name
	var $scriptRelPath = "pi1/class.tx_mllinks_pi1.php";	// Path to this script relative to the extension dir.
	var $extKey = "ml_links";	// The extension key.
	var $buildLink = false;
	var $tag = "";
	var $separator = " ";


	/**
	 * add image 
	 */
	 function insertImage ($data, $linkTag) {
	 	$img = "";

		if (file_exists($data['image'])) {
			if (!empty($this->tag)) {
				if (isset($data['separator'])) {
					$img .= $data['separator'];
				}
				else {
					$img .= $this->separator;
					
				}
			}

				
			if (isset($data['image.']['link']) && $data['image.']['link'] == 1) {
				if (isset($data['image.']['alt'])) {
					$img .= $linkTag . '<img src="' . $data['image'] . '" alt="' . $data['image.']['alt'] . '" /></a>';
				}
				else {
					$img .= $linkTag . '<img src="' . $data['image'] . '" /></a>';
				}
			}
			else {
				if (isset($data['image.']['alt'])) {
					$img .= '<img src="' . $data['image'] . '" alt="' . $data['image.']['alt'] . '" />';
				}
				else {
					$img .= '<img src="' . $data['image'] . '" />';
				}
			}
			$this->buildLink = true;
		}

		return ($img);
	 }


	/**
	 * add linktag 
	 */
	 function insertLink ($data, $content, $url) {
	 	$link = "";

		if ($data['linkTag'] == 1) {
			if (!empty($this->tag)) {
				if (isset($data['separator'])) {
					$link .= $data['separator'];
				}
				else {
					$link .= $this->separator;
					
				}
			}

			if (isset($data['linkTag.']['title']) && !empty($data['linkTag.']['title'])) {
				$title = $data['linkTag.']['title'];

				if (eregi('##linkTag##', $title)) {
					$title = str_replace('##linkTag##', $url, $title);	
				}
						
				if (!eregi('title', $content)) {
					$expr = '^.*(<a.*)(>.*</a>.*)$';
					ereg($expr, $content, $parts);
					$link .= $parts[1] . ' title="' . $title . '" ' . $parts[2];
				}
				else {
					$link .= $content;
				}
			}
			else {
				$link .= $content;
			}

			$this->buildLink = true;
		}
		
		return ($link);
	 }


	/**
	 * add opening A-tag
	 */
	 function insertOpeningATag ($data, $linkTag, $url) {
	 	$openingATag = "";

		
		if (isset($data['openingATag']) && $data['openingATag'] == 1) {
			$openingATag .= $linkTag;

			// insert given params
			if (isset($data['openingATag.']['params']) && !empty($data['openingATag.']['params'])) {
				$params = $data['openingATag.']['params'];

				// insert url if necessary
				if (eregi('##linkTag##', $params)) {
					$title = str_replace('##linkTag##', $url, $params);	
				}
						
				$expr = '^.*(<a.*)(>.*)$';
				ereg($expr, $openingATag, $parts);
				$openingATag = $parts[1] . ' ' . $params . ' ' . $parts[2];
			}

			//insert given target
			if (isset($data['openingATag.']['target']) && !empty($data['openingATag.']['target'])) {
				$target = $data['openingATag.']['target'];

				if ($openingATag != ($str = ereg_replace('target="[^"]*"', 'target="'.$target.'"', $openingATag))) {
					$openingATag = $str;
				} else {
					$expr = '^.*(<a.*)(>.*)$';
					ereg($expr, $openingATag, $parts);
					$openingATag = $parts[1] . ' target="' . $target . '" ' . $parts[2];
				}
			}

			
			// insert given title except a title is already set
			if (isset($data['openingATag.']['title']) && !empty($data['openingATag.']['title'])) {
				$title = $data['openingATag.']['title'];

				// insert url if necessary
				if (eregi('##linkTag##', $title)) {
					$title = str_replace('##linkTag##', $url, $title);	
				}
						
				if (!eregi('title', $openingATag)) {
					$expr = '^.*(<a.*)(>.*)$';
					ereg($expr, $openingATag, $parts);
					$openingATag = $parts[1] . ' title="' . $title . '"' . $parts[2];
				}
			}
		}

	 	return ($openingATag);
	 }


	/**
	 * add link text
	 */
	 function insertLinkText ($data, $content) {
	 	$linkText = "";

		if (isset($data['linkText']) && $data['linkText'] == 1) {
			if (!empty($this->tag)) {
				if (isset($data['separator'])) {
					$linkText .= $data['separator'];
				}
				else {
					$linkText .= $this->separator;
					
				}
			}

			$expr = '^.*<a.*>(.*)</a>.*$';
			ereg($expr, $content, $parts);
			$linkText .= $parts[1];
		}
		
		return ($linkText);
	}


	/**
	 * add closing A-tag
	 */
	 function insertClosingATag ($data) {
	 	$closingATag = "";

		if (isset($data['closingATag']) && $data['closingATag'] == 1) {
			$closingATag .= '</a>';
		}

		return ($closingATag);
	 }


	/**
	 * add filesize
	 */
	 function insertFilesize ($data, $url, $linkTag) {
	 	$stringFilesize = "";

		if (($data['filesize'] == 1) && file_exists($url)) {
			if (!empty($this->tag)) {
				if (isset($data['separator'])) {
					$stringFilesize .= $data['separator'];
				}
				else {
					$stringFilesize .= $this->separator;
					
				}
			}

			$units = array(
				'0' => 'Byte',
				'1' => 'KB',
				'2' => 'MB',
				'3' => 'GB',
				'4' => 'TB'
			);
							
			$j = 0; 
			$filesize = filesize($url);
			for ($j=0; $filesize >= 1024; $j++) {
				$filesize /= 1024;
			}

			if ($j < 2) {
				$decimalPlaces = 0;
			}
			else {
				$decimalPlaces = $j-1;
			}

					
			$size = '%.' . $decimalPlaces . 'f %s';
			if (isset($data['filesize.']['link']) && $data['filesize.']['link'] == 1) {
				$stringFilesize .= $linkTag . sprintf($size, $filesize, $units[$j]) . '</a>';
			}
			else {
				$stringFilesize .= sprintf($size, $filesize, $units[$j]);
			}
			$this->buildLink = true;
		}

		return($stringFilesize);
	 }


	/**
	 * add dimensions 
	 */
	 function insertDimensions ($data, $url) {
	 	$dimensions = "";

		if (($data['dimensions'] == 1) && file_exists($url)) {
			if (!empty($this->tag)) {
				if (isset($data['separator'])) {
					$dimensions .= $data['separator'];
				}
				else {
					$dimensions .= $this->separator;
					
				}
			}

			$imgData = getimagesize ($url);
			if (!empty($imgData)) {
				$dimensions .= sprintf('%sx%s', $imgData[0], $imgData[1]);
			}

			$this->buildLink = true;
		}
		
		return ($dimensions);
	 }
	

	/**
	 * add filename
	 */
	 function insertFilename ($data, $url) {
	 	$filename = "";

		if ($data['filename'] == 1) {
			if (!empty($this->tag)) {
				if (isset($data['separator'])) {
					$filename .= $data['separator'];
				}
				else {
					$filename .= $this->separator;
					
				}
			}


			$filename .= basename($url);
			$this->buildLink = true;
		}

		return $filename;
	 }


	/**
	 * add revision date 
	 */
	 function insertRevisionDate ($data, $url) {
		$date = "";
	
		if ($data['revisionDate'] == 1 && file_exists($url)) {
			if (!empty($this->tag)) {
				if (isset($data['separator'])) {
					$date .= $data['separator'];
				}
				else {
					$date .= $this->separator;
					
				}
			}

			$format = "%Y-%m-%d";
			if (isset($data['revisionDate.']['format'])) {
				$format = $data['revisionDate.']['format'];
			}
					
			$date .= strftime ($format, filemtime($url));
			$this->buildLink = true;
		}

		return $date;
	 }


	/**
	 * add string 
	 */
	function insertString ($data, $linkTag) { 
		$string = "";

		if (!empty($this->tag) && isset($data['separator'])) {
			$string .= $data['separator'];
		}


		if (isset($data['string.']['link']) && $data['string.']['link'] == 1) {
			$string .= $linkTag . $data['string'] . '</a>';
		}
		else {
			$string .= $data['string'];
		}
		$this->buildLink = true;

		return($string);
	}
	

	/**
	 * go through config and design the link layout
	 */
	function main($content,$conf)	{
		global $TSFE;


		$fileType = $TSFE->register['fileType'];
		$linkType = $TSFE->register['linkType'];
		$linkTag = $TSFE->register['tag'];
		$url = urldecode($TSFE->register['url']);


		// use given seperator
		if (isset($conf['separator'])) {
			$this->separator = $conf['separator'];
		}

		// go through configuration and modify the link
		switch ($linkType) {
		case "file":
			//check if there is anything defined for this filetype and if the file exists
			if (isset($conf[$fileType . '.']) && file_exists($url)) {
				$settings = $conf[$fileType . '.'];
				ksort($settings);
				reset ($settings);

				for ($i = 0; $i < count($settings); $i++, next($settings)) {
					$data = current($settings);
	
					switch (key($data)) {
					case "image":
						$this->tag .= $this->insertImage($data, $linkTag);
					break;

					case "linkTag":
						$this->tag .= $this->insertLink($data, $content, $url);
					break;

					case "openingATag":
	 					$this->tag .= $this->insertOpeningATag ($data, $linkTag, $url);
					break;

					case "linkText":
						$this->tag .= $this->insertLinkText($data, $content);
					break;
					
					case "closingATag":
	 					$this->tag .= $this->insertClosingATag ($data);
					break;

					case "filename":
	 					$this->tag .= $this->insertFilename ($data, $url);
					break;

					case "revisionDate":
	 					$this->tag .= $this->insertRevisionDate($data, $url);
					break;

					case "filesize":
	 					$this->tag .= $this->insertFilesize ($data, $url, $linkTag);
					break;

					case "dimensions":
	 					$this->tag .= $this->insertDimensions ($data, $url);
					break;

					case "string":
	 					$this->tag .= $this->insertString ($data, $linkTag);
					break;
					}
				}
			}
			//check if there are any default settings and if the file exists
			elseif (isset($conf['default.']) && file_exists($url)) {
				$settings = $conf['default.'];
				ksort($settings);
				reset ($settings);

				for ($i = 0; $i < count($settings); $i++, next($settings)) {
					$data = current($settings);
					
					switch (key($data)) {
					case "image":
						$this->tag .= $this->insertImage($data, $linkTag);
					break;

					case "linkTag":
						$this->tag .= $this->insertLink($data, $content, $url);
					break;

					case "openingATag":
	 					$this->tag .= $this->insertOpeningATag ($data, $linkTag, $url);
					break;

					case "linkText":
						$this->tag .= $this->insertLinkText($data, $content);
					break;
					
					case "closingATag":
	 					$this->tag .= $this->insertClosingATag ($data);
					break;

					case "filename":
	 					$this->tag .= $this->insertFilename ($data, $url);
					break;

					case "revisionDate":
	 					$this->tag .= $this->insertRevisionDate($data, $url);
					break;

					case "filesize":
	 					$this->tag .= $this->insertFilesize ($data, $url, $linkTag);
					break;

					case "string":
	 					$this->tag .= $this->insertString ($data, $linkTag);
					break;
					}
				}
			}
			//check if there are anysettings if the file doesn't exist
			elseif (!file_exists($url) && isset($conf['notFound.'])) {
				$settings = $conf['notFound.'];
				ksort($settings);
				reset ($settings);

				for ($i = 0; $i < count($settings); $i++, next($settings)) {
					$data = current($settings);
				
					switch (key($data)) {
					case "image":
						$this->tag .= $this->insertImage($data, $linkTag);
					break;

					case "string":
	 					$this->tag .= $this->insertString ($data, $linkTag);
					break;

					case "linkText":
						$this->tag .= $this->insertLinkText($data, $content);
					break;

					case "linkTag":
						$this->tag .= $this->insertLink($data, $content, $url);
					break;
					}
				}
			}

		
		break;
			
		case "mailto":
			if (isset($conf['mailto.'])) {
				$settings = $conf['mailto.'];
				ksort($settings);
				reset ($settings);
				for ($i = 0; $i < count($settings); $i++, next($settings)) {
					$data = current($settings);
					switch (key($data)) {
					case "image":
						$this->tag .= $this->insertImage($data, $linkTag);
					break;
	
					case "linkTag":
						$this->tag .= $this->insertLink($data, $content, $url);
					break;

					case "openingATag":
	 					$this->tag .= $this->insertOpeningATag ($data, $linkTag, $url);
					break;

					case "linkText":
						$this->tag .= $this->insertLinkText($data, $content);
					break;
					
					case "closingATag":
	 					$this->tag .= $this->insertClosingATag ($data);
					break;
	
					case "string":
	 					$this->tag .= $this->insertString ($data, $linkTag);
					break;
					}
				}
			}
			
		break;
	
		
		case "page":
			if (isset($conf['internal.'])) {
				$settings = $conf['internal.'];
				ksort($settings);
				reset ($settings);
	
				for ($i = 0; $i < count($settings); $i++, next($settings)) {
					$data = current($settings);
					switch (key($data)) {
					case "image":
						$this->tag .= $this->insertImage($data, $linkTag);
					break;
	
					case "linkTag":
						$this->tag .= $this->insertLink($data, $content, $url);
					break;

					case "openingATag":
	 					$this->tag .= $this->insertOpeningATag ($data, $linkTag, $url);
					break;

					case "linkText":
						$this->tag .= $this->insertLinkText($data, $content);
					break;
					
					case "closingATag":
	 					$this->tag .= $this->insertClosingATag ($data);
					break;
	
					case "string":
	 					$this->tag .= $this->insertString ($data, $linkTag);
					break;
					}
				}
			}
		break;
		

		case "url":
			if (isset($conf['external.'])) {
				$settings = $conf['external.'];
				ksort($settings);
				reset ($settings);
	
				for ($i = 0; $i < count($settings); $i++, next($settings)) {
					$data = current($settings);
					switch (key($data)) {
					case "image":
						if (!empty($this->tag)) $this->tag .= $this->separator;
						//get filetype
						$file = basename($url);
						if (ereg('(.*)\.([^\.]*$)', $file,$reg))  {
							$ext=strtolower($reg[2]);
							$ext=($ext=='jpeg')?'jpg':$ext;
						}

						//add image
						if (isset($data['image.'][$ext]) && file_exists($data['image.'][$ext])) {
							if (isset($data['image.'][$ext]['alt'])) {
								$imageTag = '<img src="' . $data['image.'][$ext] . '" alt="' . $data['image.'][$ext]['alt'] . '"/>';
							}
							else {
								$imageTag = '<img src="' . $data['image.'][$ext] . '" />';
							}
						}
						elseif (file_exists($data['image'])) {
							if (isset($data['image.']['alt'])) {
								$imageTag = '<img src="' . $data['image'] . '" alt="' . $data['image.']['alt'] . '"/>';
							}
							else {
								$imageTag = '<img src="' . $data['image'] . '" />';
							}
						}
					
						//add link if configured
						if (isset($data['image.']['link']) && $data['image.']['link'] == 1) {
							$this->tag .= $linkTag . $imageTag . '</a>';
						}
						else {
							$this->tag .= $imageTag;
						}
						$this->buildLink = true;
					break;
	
					case "linkTag":
						$this->tag .= $this->insertLink($data, $content, $url);
					break;

					case "openingATag":
	 					$this->tag .= $this->insertOpeningATag ($data, $linkTag, $url);
					break;

					case "linkText":
						$this->tag .= $this->insertLinkText($data, $content);
					break;
					
					case "closingATag":
	 					$this->tag .= $this->insertClosingATag ($data);
					break;
	
					case "string":
	 					$this->tag .= $this->insertString ($data, $linkTag);
					break;
					}
				}
			}
		break;
		}

		// delete temp variables
		unset ($TSFE->register['fileType']);
		unset ($TSFE->register['linkType']);
		unset ($TSFE->register['tag']);
		unset ($TSFE->register['url']);

		if (!$this->buildLink) { $this->tag = $content;}
		return $this->tag;
		
	}

	/**
	 * Get data of created link 
	 */
	function getFiletype($content, $conf) {
		global $TSFE;

		//get file extension
		$file = basename($content['url']);
		if (ereg('(.*)\.([^\.]*$)', $file,$reg))  {
			$ext=strtolower($reg[2]);
			$ext=($ext=='jpeg')?'jpg':$ext;
		}
		$TSFE->register['fileType'] = $ext;

		//get link type
		$TSFE->register['linkType'] = $content['TYPE'];

		//get link url
		$TSFE->register['url'] = $content['url'];

		//get link tag
		$TSFE->register['tag'] = $content['TAG'];

		return $content['TAG'];
	}
}



if (defined("TYPO3_MODE") && $TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/ml_links/pi1/class.tx_mllinks_pi1.php"])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/ml_links/pi1/class.tx_mllinks_pi1.php"]);
}

?>
