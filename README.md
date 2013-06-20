# Textile Parser for SilverStripe 3
Extension to add optional Textile parsing to StringField objects
in templates, such as Text & Varchar.

It includes/uses the PHP Textile class from [netcarver/textile](https://github.com/netcarver/textile)

## Requirements
* SilverStripe 3+

## Options
* $MyTextField.Textile[(0,1)] // auto-link any urls / emails in string - default on
* In _config.php: TextileParser::$doctype = 'xhtml'; // Use xhtml instead of html5
* In _config.php: TextileParser::$use_restricted = false; // Use regular parser instead of restricted one (adds more features)

## Usage
It is designed to be used in your templates where needed, such as:
<pre>
$MyTextField.Textile
</pre>
which will convert the value into HTML, and convert raw web & email links into html links, or
<pre>
$MyTextField.Textile(0)
</pre>
which will convert the value into HTML, but leave links & emails as plain text.