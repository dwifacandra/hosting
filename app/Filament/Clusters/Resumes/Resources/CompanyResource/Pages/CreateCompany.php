<?php

namespace App\Filament\Clusters\Resumes\Resources\CompanyResource\Pages;

use App\Filament\Clusters\Resumes\Resources\CompanyResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCompany extends CreateRecord
{
    protected static string $resource = CompanyResource::class;
}
