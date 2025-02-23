<?php

namespace App\Helpers;

use Illuminate\Support\Facades\{File};

class CoreIcon
{
    public static function getIcons()
    {
        $path = resource_path('svg');
        $icons = [];
        if (File::exists($path)) {
            $files = File::allFiles($path);
            foreach ($files as $file) {
                $folderName = $file->getRelativePathname();
                $folderNameParts = explode(DIRECTORY_SEPARATOR, $folderName);
                $folder = implode('.', array_slice($folderNameParts, 0, -1));
                $iconName = pathinfo($file->getFilename(), PATHINFO_FILENAME);
                $iconKey = !empty($folder) ? "{$folder}.{$iconName}" : $iconName;
                $icons[$iconKey] = $iconKey;
            }
        }
        return $icons;
    }
}
