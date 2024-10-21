<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Filament\Resources\ProjectResource;
use App\Models\Project;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditProject extends EditRecord
{
    protected static string $resource = ProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
            ->after(function (Project $record) {
                // delete single
                if ($record->image_path) {
                   Storage::disk('public')->delete($record->image_path);
                }
             }),
        ];
    }
    protected function getActions(): array
{
   return [
     Actions\DeleteAction::make()
       ->after(function (YourModel $record) {
          // delete single
          if ($record->photo) {
             Storage::disk('public')->delete($record->photo);
          }
          // delete multiple
          if ($record->galery) {
             foreach ($record->galery as $ph) Storage::disk('public')->delete($ph);
          }
       }),
    ];
}
}
