<?php

namespace App\Filament\Resources\GalleryPhotos;

use App\Filament\Resources\GalleryPhotos\Pages\ManageGalleryPhotos;
use App\Models\GalleryPhoto;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class GalleryPhotoResource extends Resource
{
    protected static ?string $model = GalleryPhoto::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-camera';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('gallery_album_id')
                    ->relationship('album', 'title') // Assuming relationship name is 'album'
                    ->required(),
                FileUpload::make('image_path')
                    ->image()
                    ->directory('gallery-photos')
                    ->required(),
                TextInput::make('caption')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_path'),
                TextColumn::make('album.title')
                    ->label('Album')
                    ->searchable(),
                TextColumn::make('caption')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageGalleryPhotos::route('/'),
        ];
    }
}
