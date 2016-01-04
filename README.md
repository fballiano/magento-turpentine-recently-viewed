Magento Turpentine Recently Viewed
==================================

Makes the "recently viewed" block available and working on Magento EE + Varnish (Turpentine)

About
-----

If you're using Magento EE 1.13+ and Varnish+Turpentine for full page cache you probably notices that the "recently viewed" functionality is not working.

Easy to explain, if a product page is in varnish's cache, then magento is not going to know that a visitor has visited that product. That's it.

So my idea is to rewrite and extend Turpentine's ajax system for magento's flash messages to "tell magento" that the visitor has visited that page/product.

I've used this module (a previous version actually) on a big project with satisfaction, hope it will be the same for you too.

Backup!!!
---------
This module is provided "as is" and I'll not be responsible for any data damage.

Installation
------------

Simply download the whole repository and copy everything to your Magento document root.
Otherwise with modman:
```shell
modman clone https://github.com/fballiano/magento-turpentine-recently-viewed
```

Be sure to enable "should fix flash messages" in Turpentine's backend configurations.

Compatibility
-------------
This module was developed on Magento EE 1.13.
If you have a different version of Magento and the module is working please drop me a line so I can update this compatibility list.

Support
-------
If you have any issues with this extension, open an issue on GitHub.

Contribution
------------
Any contributions are highly appreciated. The best way to contribute code is to open a
[pull request on GitHub](https://help.github.com/articles/using-pull-requests).

Developer
---------
Fabrizio Balliano  
[http://fabrizioballiano.com](http://fabrizioballiano.com)  
[@fballiano](https://twitter.com/fballiano)

Licence
-------
[OSL - Open Software Licence 3.0](http://opensource.org/licenses/osl-3.0.php)

Copyright
---------
(c) Fabrizio Balliano
