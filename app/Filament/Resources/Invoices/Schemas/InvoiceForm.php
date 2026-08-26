<?php

namespace App\Filament\Resources\Invoices\Schemas;

use App\Models\Member;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class InvoiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Invoice Details')
                    ->schema([
                        TextInput::make('invoice_number')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                        Select::make('member_id')
                            ->label('Member')
                            ->relationship('member', 'first_name')
                            ->getOptionLabelFromRecordUsing(fn (Member $record) => $record->full_name)
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('payment_id')
                            ->relationship('payment', 'id')
                            ->label('Payment ID'),
                        TextInput::make('amount')->numeric()->prefix('$')->required(),
                        DatePicker::make('issued_at')->required(),
                        DatePicker::make('due_at')->required(),
                        Select::make('status')
                            ->options([
                                'unpaid' => 'Unpaid',
                                'paid' => 'Paid',
                                'cancelled' => 'Cancelled',
                            ])
                            ->default('unpaid')
                            ->required(),
                    ])->columns(2),
            ]);
    }
}
