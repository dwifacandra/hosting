<?php

namespace App\Filament\Clusters\Collections\Resources\PhotographResource\Pages;

use App\Filament\Clusters\Collections\Resources\PhotographResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePhotograph extends CreateRecord
{
    protected static string $resource = PhotographResource::class;
}
