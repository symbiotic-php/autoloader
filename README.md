# Symbiotic PSR-4 Autoloader

## Usage

```php
// Include Autoloader file
include_once  $basePath.'/vendor/symbiotic/autoloader/src/Autoload/Autoloader.php';

$autoloaderConfig = [
    // Put the autoloader at the beginning of the queue
    'prepend' => false,
    // Directories for searching packages
    'scan_dirs' => [
         $basePath.'/modules',
         $basePath.'/plugins'
    ],
    // Directory for saving class maps
    'storage_path' => $basePath.'/protectedDir/'
    
];
Autoloader::register(
            $autoloaderConfig['prepend'] ?? false,
            $autoloaderConfig['scan_dirs'],
            $autoloaderConfig['storage_path']
        );
```