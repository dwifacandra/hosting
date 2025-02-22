<?php

namespace App\Filament\Clusters\Statistic\Resources\VisitorResource\Schemes;

use App\Models\Visitor;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components;

trait InfolistScheme
{
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Components\Section::make('Visitor Information')
                    ->schema([
                        Components\TextEntry::make('ip_address')
                            ->label('IP Address'),
                        Components\TextEntry::make('locale')
                            ->label('Locale'),
                        Components\TextEntry::make('user_agent')
                            ->label('User Agent'),
                        Components\TextEntry::make('browser')
                            ->label('Browser'),
                        Components\TextEntry::make('os')
                            ->label('Operating System'),
                    ])
                    ->columns(2),
                Components\Section::make('Page Information')
                    ->schema([
                        Components\TextEntry::make('page_url')
                            ->label('Page URL')
                            ->url(fn(Visitor $record) => $record->page_url)
                            ->openUrlInNewTab(),
                        Components\TextEntry::make('page_path')
                            ->label('Page Path'),
                        Components\TextEntry::make('page_referer')
                            ->label('Page Referer')
                            ->url(fn(Visitor $record) => $record->page_referer)
                            ->openUrlInNewTab(),
                        Components\TextEntry::make('route_name')
                            ->label('Route Name'),
                        Components\TextEntry::make('route_query')
                            ->label('Route Query'),
                        Components\TextEntry::make('user_name')
                            ->label('User'),
                    ])
                    ->columns(2),
            ]);
    }
}
