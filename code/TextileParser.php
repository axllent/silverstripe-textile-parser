<?php
/*
 * Textile Parser for SilverStripe 3+
 * Adds Textile parsing in your templates
 * eg: $MyTextField.Textile
 *
 * License: MIT-style license http://opensource.org/licenses/MIT
 * Authors: Techno Joy development team (www.technojoy.co.nz)
 */

class TextileParser extends Extension {

	static $client = null;

	static $doctype = 'html5'; // html5 || xhtml

	static $use_restricted = true;

	public function Textile($link_urls = true) {

		$content = $this->owner->value;

		self::$doctype = (self::$doctype == 'xhtml') ? 'xhtml' : 'html5';

		if (!self::$client) self::$client = new \Netcarver\Textile\Parser(self::$doctype);

		$content = self::$use_restricted ? self::$client->textileRestricted($content, 0) : self::$client->textileThis($content);

		if ($link_urls) {
			/* Convert urls to links */
			$content = preg_replace('#([\s|>|\(|^])(www)#i', '$1http://$2', $content);
			$pattern = '#(\s|>|\(|^)((http|https|ftp):\/\/[^\s<\)]+)#i';
			$replacement = '$1<a href="$2">$2</a>';
			$content = preg_replace($pattern, $replacement, $content);
			/* Convert all E-mail matches to appropriate HTML links */
			$pattern = '#([0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-.]?[0-9a-z])*\\.';
			$pattern .= '[a-wyz][a-z](fo|g|l|m|mes|o|op|pa|ro|seum|t|u|v|z)?)#i';
			$replacement = '<a href="mailto:\\1">\\1</a>';
			$content = preg_replace($pattern, $replacement, $content);
		}

		return $content;

	}

}