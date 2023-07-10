<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CardResource\Pages;
use App\Filament\Resources\CardResource\RelationManagers;
use App\Models\Card;
use Filament\Forms;
use Filament\Notifications\Notification;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\SelectFilter;

class CardResource extends Resource
{
    protected static ?string $model = Card::class;

    protected static ?string $modelLabel = 'Credit Card';

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required(),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('approved', false);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.Full_name'),
                Tables\Columns\TextColumn::make('Card_number'),
                Tables\Columns\TextColumn::make('Holder_Name'),
                Tables\Columns\TextColumn::make('type')->enum([
                    'visa' => 'Visa',
                    'master' => 'Master',
                ]),
                Tables\Columns\TextColumn::make('Cvc'),
                Tables\Columns\TextColumn::make('Expire_Date')
                    ->date(),
            ])
            ->filters([
                SelectFilter::make('type')
                    ->options([
                        'visa' => 'Visa',
                        'master' => 'Master',
                    ])
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Action::make('approve')
                    ->label('Approve')
                    ->color('success')
                    ->action(function (Card $record) {
                        $record->approved = true;
                        $record->save();
                        Notification::make()
                            ->title('Approved successfuly')
                            ->success()
                            ->send();
                    }),
                Action::make('cancel')
                    ->label('Cancel')
                    ->color('danger')
                    ->action(function (Card $record) {
                        $record->delete();
                        Notification::make()
                            ->title('Canceled successfuly')
                            ->success()
                            ->send();
                    }),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCards::route('/'),
            // 'create' => Pages\CreateCard::route('/create'),
            'edit' => Pages\EditCard::route('/{record}/edit'),
        ];
    }
}
