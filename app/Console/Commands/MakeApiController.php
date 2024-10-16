<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeApiController extends Command
{
    // Nama perintah dan argumen yang dibutuhkan
    protected $signature = 'make:controller-api {name}';

    // Deskripsi singkat perintah
    protected $description = 'Create a new API Controller that extends ApiController';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Ambil nama controller dari argumen
        $name = $this->argument('name');

        // Cek apakah nama sudah mengandung kata "Controller"
        if (!str_ends_with($name, 'Controller')) {
            $name .= 'Controller';
        }

        // Definisikan namespace, directory, dan path file controller
        $namespace = 'App\\Http\\Controllers\\API';
        $path = app_path("Http/Controllers/API/{$name}.php");

        // Cek apakah file sudah ada
        if (File::exists($path)) {
            $this->error("Controller {$name} already exists!");
            return;
        }

        // Isi konten controller yang akan dibuat
        $stub = <<<EOT
<?php

namespace $namespace;

use Illuminate\Http\Request;

class $name extends ApiController
{
    //
}
EOT;

        // Buat folder jika belum ada
        if (!File::exists(dirname($path))) {
            File::makeDirectory(dirname($path), 0755, true);
        }

        // Simpan file controller
        File::put($path, $stub);

        $this->info("API Controller created successfully at: {$path}");
    }
}
