<?php 


namespace App\Models;

class isiContent{
    private static $isiContent = [
        [
            "title" => "judul pertama",
            "slug" => "judul-pertama",
            "category" => "modul ajar",
            "image" => "content1.png",
            "file" => "content.pdf",
            "deskripsi" => "modul ajar ini adlaah judul pertama"
        ],
        [
            "title" => "judul kedua",
            "slug" => "judul-kedua",
            "category" => "modul ajar",
            "image" => "content1.png",
            "file" => "content.pdf",
            "deskripsi" => "modul ajar ini adlaah judul kedua"
        ]
    ];

    public static function all()
    {

        return self::$isiContent;

    }

    public static function find($slug)
    {
        $contents = self::$isiContent;

        $content = [];
        foreach($contents as $con){
            if($con["slug"] == $slug) {
                $content = $con;
            }
        }

        return $content;
    }
}



?>