<?php

namespace App\Filament\Clusters\Statistic\Resources\VisitorResource\Pages;

use App\Enums\Locale;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Database\Eloquent\Builder;
use JoseEspinal\RecordNavigation\Traits\HasRecordsList;
use App\Filament\Clusters\Statistic\Resources\VisitorResource;
use App\Filament\Clusters\Statistic\Resources\VisitorResource\Widgets\LocaleChart;
use App\Filament\Clusters\Statistic\Resources\VisitorResource\Widgets\TrafficChart;

class ListVisitors extends ListRecords
{
    use HasRecordsList;

    protected static string $resource = VisitorResource::class;

    public function getTabs(): array
    {
        return [
            'Global' => Tab::make()->icon('outline.public'),
            'English' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('locale', Locale::EN))
                ->icon('flags.en'),
            'Indonesian' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('locale', Locale::ID))
                ->icon('flags.id'),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            TrafficChart::class,
            LocaleChart::class,
        ];
    }
}
