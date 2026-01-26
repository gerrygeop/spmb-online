<?php

namespace App\Filament\Resources\Registrations\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class RegistrationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Personal Information')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('registration_code')
                            ->label('Nomor Pendaftaran'),

                        TextEntry::make('school_level')
                            ->label('Jenjang Pendidikan')
                            ->formatStateUsing(fn(string $state): string => str()->upper($state)),

                        TextEntry::make('total_amount')
                            ->label('Total Biaya')
                            ->money('IDR', true)
                            ->placeholder('-')
                            ->columnSpanFull(),

                        TextEntry::make('created_at')
                            ->label('Tanggal mendaftar')
                            ->dateTime()
                            ->placeholder('-'),
                    ])
                    ->columns(2)
                    ->columnSpan(2),

                Section::make('Personal Information')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('status')
                            ->badge(),
                        TextEntry::make('notes')
                            ->placeholder('-')
                            ->columnSpanFull(),

                        TextEntry::make('updated_at')
                            ->label('Terakhir diperbarui')
                            ->dateTime()
                            ->placeholder('-'),
                    ])
                    ->columnSpan(1),
            ])
            ->columns(3);
    }
}
