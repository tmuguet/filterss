filterss
========

Keyword-based filter for RSS/Atom feeds.

This script can take as input a feed URL or a feed XML content, and outputs the XML content filtered-out.

A filter deletes all entries where none of the keywords provided are found (filter OR). The keywords are searched in all nodes of the items (title, description, ...), and are case insensitive. Several filters can be chained to create an AND filter.


Usage:

```php
$f = new Filterss();
$f->loadFromUrl("http://thomasmuguet.info/index.php?feed/atom")
    ->filter(array("k’ą́sagi", "kasagi");   // Keep only items containing k’ą́sagi or kasagi
echo $f->out();
```

```php
$f = new Filterss();
$f->loadFromXml($xml)
    ->filter("keyword1")
    ->filter("keyword2");   // Keep only items containing keyword1 and keyword2
echo $f->out();
```


An online implementation is available at http://filterss.thomasmuguet.info .
