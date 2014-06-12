Textile Parser for SilverStripe 3
---------------------------------
Extension to add optional Textile parsing to StringField objects
in templates, such as Text & Varchar.

It includes/uses the PHP Textile class from
[netcarver/textile](https://github.com/netcarver/textile)

## Requirements
* SilverStripe 3.*

## Options
In `mysite/_config.php`

```php
TextileParser::$doctype = 'xhtml'; // Use xhtml instead of html5
TextileParser::$use_restricted = false; // Use regular parser instead of restricted one (adds more features)
```

## Usage
It is designed to be used in your templates where needed, such as:

```php
// convert the value into HTML, and convert raw web & email links into html links
$MyTextField.Textile

// which will convert the value into HTML, but leave links & emails as plain text
$MyTextField.Textile(0)
```