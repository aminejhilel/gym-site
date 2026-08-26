<?php

namespace App\Filament\Resources\Payments\Schemas;

use App\Models\Member;
use App\Models\Membership;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Payment Details')
                    ->schema([
                        Select::make('member_id')
                            ->label('Member')
                            ->relationship('member', 'first_name')
                            ->getOptionLabelFromRecordUsing(fn (Member $record) => $record->full_name)
                            ->searchable()
                            ->preload()
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(fn (callable $set) => $set('membership_id', null)),
                        Select::make('membership_id')
                            ->label('Membership')
                            ->options(function (callable $get) {
                                $member = Member::find($get('member_id'));
                                if (! $member) return [];
                                return $member->memberships->mapWithKeys(function ($m) {
                                    return [$m->id => $m->plan->name . ' (' . $m->start_date->format('M d') . ' - ' . $m->end_date->format('M d') . ')'];
                                });
                            })
                            ->required()
                            ->reactive(),
                        TextInput::make('amount')->numeric()->prefix('$')->required(),
                        Select::make('payment_method')
                            ->options([
                                'cash' => 'Cash',
                                'card' => 'Card',
                                'transfer' => 'Bank Transfer',
                            ])
                            ->required(),
                        DatePicker::make('paid_at')->default(now()),
                        Select::make('status')
                            ->options([
                                'paid' => 'Paid',
                                'pending' => 'Pending',
                                'refunded' => 'Refunded',
                            ])
                            ->default('paid')
                            ->required(),
                    ])->columns(2),
                Section::make('Notes')
                    ->schema([
                        Textarea::make('notes')->rows(3)->columnSpanFull(),
                    ])
            ]);
    }
}
