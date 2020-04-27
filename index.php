<?php
    $files = find_all_files(__DIR__ . "/app/Models");

    foreach ($files as $file) {
        $nameParts = explode('/', $file);
        $namespace = $nameParts[count($nameParts) - 2] . "/" . explode(".", $nameParts[count($nameParts) - 1])[0];

        print exec("php artisan make:request {$namespace}/Delete") . "\n\n";
        print exec("php artisan make:request {$namespace}/Index") . "\n\n";
        print exec("php artisan make:request {$namespace}/Show") . "\n\n";
        print exec("php artisan make:request {$namespace}/Store") . "\n\n";
        print exec("php artisan make:request {$namespace}/Update") . "\n\n";
    }


    function find_all_files($dir)
    {
        $root = scandir($dir);
        foreach($root as $value)
        {
            if($value === '.' || $value === '..') {continue;}
            if(is_file("$dir/$value")) {$result[]="$dir/$value";continue;}
            foreach(find_all_files("$dir/$value") as $value)
            {
                $result[]=$value;
            }
        }
        return $result;
    }
