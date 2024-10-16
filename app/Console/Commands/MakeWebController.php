<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeWebController extends Command
{
    // Command name and required argument
    protected $signature = 'make:controller-web {name}';

    // Short description of the command
    protected $description = 'Create a new Web Controller';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Get the name argument
        $name = $this->argument('name');

        // Check if the name already ends with 'Controller', if not, append 'Controller'
        if (!str_ends_with($name, 'Controller')) {
            $controllerName = "{$name}Controller";
        } else {
            $controllerName = $name;
        }

        // Define the namespace, directory, and file path for the controller
        $namespace = 'App\\Http\\Controllers\\Web';
        $path = app_path("Http/Controllers/Web/{$controllerName}.php");

        // Check if the file already exists
        if (File::exists($path)) {
            $this->error("Controller {$controllerName} already exists!");
            return;
        }

        // Content of the controller to be created
        $stub = <<<EOT
<?php

namespace $namespace;

use Illuminate\Http\Request;

class $controllerName extends Controller
{
    //
}
EOT;

        // Create the directory if it doesn't exist
        if (!File::exists(dirname($path))) {
            File::makeDirectory(dirname($path), 0755, true);
        }

        // Save the file
        File::put($path, $stub);

        $this->info("Web Controller created successfully at: {$path}");
    }
}
