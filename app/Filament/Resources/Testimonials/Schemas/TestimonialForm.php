<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use App\Models\Member;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Testimonial Details')
                    ->schema([
                        Select::make('member_id')
                            ->label('Member (Optional)')
                            ->relationship('member', 'first_name')
                            ->getOptionLabelFromRecordUsing(fn (Member $record) => $record->full_name)
                            ->searchable()
                            ->preload()
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set) {
                                if ($state) {
                                    $member = Member::find($state);
                                    if ($member) {
                                        $set('author_name', $member->full_name);
                                    }
                                }
                            }),
                        TextInput::make('author_name')->required()->maxLength(255),
                        Select::make('rating')
                            ->options([
                                1 => '1 Star',
                                2 => '2 Stars',
                                3 => '3 Stars',
                                4 => '4 Stars',
                                5 => '5 Stars',
                            ])
                            ->required(),
                        Toggle::make('is_published')->default(false),
                        Textarea::make('content')->required()->rows(4)->columnSpanFull(),
                        FileUpload::make('photo')->image()->directory('testimonials')->columnSpanFull(),
                    ])->columns(2),
            ]);
    }
}
