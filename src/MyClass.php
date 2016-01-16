<?php

namespace MyVendor;

use Composer\Script\Event;
use Composer\Installer\PackageEvent;

class MyClass {

    public static function postInstall() {
        $projectname = basename(realpath("."));
        echo "Proyecto $projectname creado exitosamente\n";

        // Acá va el contenido a reemplazar, 
        // en este caso {{ projectname }}
        $replaces = [
            "{{ projectname }}" => $projectname
        ];


        foreach (glob("skel/templates/{,.}*-dist", GLOB_BRACE) as $distfile) {

            $target = substr($distfile, 15, -5);

            // First we copy the dist file to its new location,
            // overwriting files we might already have there.
            echo "creating clean file ($target) from dist ($distfile)...\n";
            copy($distfile, $target);

            // Then we apply our replaces for within those templates.
            echo "applying variables to $target...\n";
            applyValues($target, $replaces);
        }


        echo "\033[0;32mdist script done...\n";
    }

    public static function test() {
        echo "HOLA\n";
    }

}
