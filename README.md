SugarCRM Whoops
==============

[Whoops](http://filp.github.io/whoops/ "Whoops") Exceptions and Error Pages for SugarCRM development

This is a tool for developing on the SugarCRM platform. This package is intended for local development
purposes only, and should not be used on-demand or in a production instance.



![Error Page Image](https://dl.dropboxusercontent.com/u/11285576/SugarCRMWhoops/exampleui.png "Error/Exception Pages")


## Configurations

All changes are made using the config_override.php file in the root directory of the instance.

```php
$sugar_config['whoops_dev'] = true; #Activate Whoops Handlers 
$sugar_config['whoops_show_bean'] = true; #Show SugarBean DataTable in the PrettyPageHandler
```


Download the installer package [Version 1.0](https://dl.dropboxusercontent.com/u/11285576/SugarCRMWhoops_v1_0_0.zip)
