<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CollectTranslations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:collect-translations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $path = base_path('resources/lang/ua/tempmessages.php');
        $translations = File::exists($path) ? include($path) : [];

        $this->info("Scanning files for translations...");


        $files = File::allFiles(resource_path());
        foreach ($files as $file) {
            $content = File::get($file);

            preg_match_all('/__\(\'([^\']+)\'\)/', $content, $matches);

            foreach ($matches[1] as $string) {
                if (!isset($translations[$string])) {
                    $translations[$string] = $string;
                }
            }
        }

        File::put($path, "<?php\n\nreturn " . var_export($translations, true) . ";\n");

        $this->info("Translation strings collected successfully!");
    }
}
