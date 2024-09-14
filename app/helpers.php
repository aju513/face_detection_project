<?php
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

if (!function_exists('createSlug')) {
    /**
     * Create a unique slug for a given string.
     *
     * @param string $string The string to be converted into a slug
     * @param string $table The table where the slug is stored
     * @param string $column The column where the slug is stored (default is 'slug')
     * @param int $id Optional ID to exclude from uniqueness check (for updates)
     * @return string A unique slug
     */
    function createSlug($string, $table, $column = 'slug', $id = null)
    {
        // Generate an initial slug
        $slug = Str::slug($string);

        // Query the database to check if the slug exists
        $originalSlug = $slug;
        $counter = 1;

        while (
            DB::table($table)
                ->where($column, $slug)
                ->when($id, function ($query) use ($id) {
                    // Exclude the current ID from the uniqueness check (for updates)
                    return $query->where('id', '!=', $id);
                })
                ->exists()
        ) {
            // If the slug exists, append a number to make it unique
            $slug = $originalSlug . '-' . $counter++;
        }

        return $slug;
    }
}
