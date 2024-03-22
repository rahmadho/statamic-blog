<?php 
namespace Database\Seeders\Traits;

trait TruncateTable
{
    function disableForeignKey() {
        \DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    }
    function truncate($tables) {
        if (is_array($tables)) {
            foreach ($tables as $table) {
                \DB::table($table)->truncate();
            }
        } else if (is_string($tables)) {
            \DB::table($tables)->truncate();
        }
    }

    function enableForeignKey() {
        \DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
