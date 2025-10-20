<?php

namespace App\Traits;

trait Alert
{
    public function success(string $description = 'Task completed successfully.', string $title = 'Done!'): void
    {
        toastr()->success($description, ['title' => $title]);
    }

    public function error(string $description = 'Something went wrong!', string $title = 'Ops!'): void
    {
        toastr()->error($description, ['title' => $title]);
    }

    public function warning(string $description = 'Attention!', string $title = 'Aviso!'): void
    {
        toastr()->warning($description, ['title' => $title]);
    }

    public function info(string $description = 'Info message.', string $title = 'Info'): void
    {
        toastr()->info($description, ['title' => $title]);
    }
}
