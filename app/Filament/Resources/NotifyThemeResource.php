<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Resources;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Modules\Notify\Filament\Resources\NotifyThemeResource\Pages\CreateNotifyTheme;
use Modules\Notify\Filament\Resources\NotifyThemeResource\Pages\EditNotifyTheme;
use Modules\Notify\Filament\Resources\NotifyThemeResource\Pages\ListNotifyThemes;
use Modules\Notify\Models\NotifyTheme;
use Modules\Xot\Filament\Resources\XotBaseResource;

class NotifyThemeResource extends XotBaseResource
{
    protected static ?string $model = NotifyTheme::class;

    protected static ?string $navigationIcon = 'heroicon-o-bell';

    public static function getFormSchema(): array
<<<<<<< HEAD
=======
{
    return [
                    Select::make('lang')->options(self::fieldOptions('lang')),
                    Select::make('type')->options(self::fieldOptions('type')),
                    Select::make('post_type')->options(self::fieldOptions('post_type')),
                    TextInput::make('post_id'),
                    TextInput::make('subject'),
                    TextInput::make('from'),
                    TextInput::make('from_email'),
                    SpatieMediaLibraryFileUpload::make('logo_src')
                        ->enableOpen()
                        ->enableDownload()
                        ->columnSpanFull()
                        ->disk('uploads')
                        ->directory('photos')
                        ->preserveFilenames(),
                    TextInput::make('logo_width'),
                    TextInput::make('logo_height'),
                    // Forms\Components\TextInput::make('theme'),
                    Select::make('theme')->options(
                        [
                            'empty' => 'empty',
                            'ark' => 'ark',
                            'minty' => 'minty',
                            'sunny' => 'sunny',
                            'widgets' => 'widgets',
                        ]
                    )
                        ->default('empty'),
                    Textarea::make('body')->columnSpanFull(),
                    RichEditor::make('body_html')->columnSpanFull(),
                    // TinyEditor::make('body_html')->columnSpanFull(),
                ]
            );
    }

    public static function fieldOptions(string $field): array
    {
        return NotifyTheme::select($field)
            ->where($field, '!=', null)
            ->distinct()
            ->pluck($field, $field)
            ->toArray();
    }

    public static function tableOLD(Table $table): Table
    {
        return $table
            ->columns(
                [
                    'id' => TextColumn::make('id')->sortable(),
                    'lang' => TextColumn::make('lang')->sortable(),
                    'type' => TextColumn::make('type')->sortable(),
                    'post_id' => TextColumn::make('post_id')->sortable(),
                    'post_type' => TextColumn::make('post_type')->sortable(),
                    'logo_src' => TextColumn::make('logo_src')->sortable(),
                ]
            )
            ->filters(
                [
                    SelectFilter::make('lang')
                        ->options(self::fieldOptions('lang')),
                    SelectFilter::make('post_type')
                        ->options(self::fieldOptions('post_type')),
                    SelectFilter::make('type')
                        ->options(self::fieldOptions('type')),
                ]
            )
            ->actions(
                [
                    EditAction::make(),
                ]
            )
            ->bulkActions(
                [
                    DeleteBulkAction::make(),
                ]
            )
            ->headerActions(
                [
                    CreateAction::make(),
                ]
            );
    }

    public static function getRelations(): array
>>>>>>> 962ac989 (Auto update submodule)
    {
        return [
            'lang' => Select::make('lang')
                ->options(self::fieldOptions('lang')),
            'type' => Select::make('type')
                ->options(self::fieldOptions('type')),
            'post_type' => Select::make('post_type')
                ->options(self::fieldOptions('post_type')),
            'post_id' => TextInput::make('post_id'),
            'subject' => TextInput::make('subject'),
            'from' => TextInput::make('from'),
            'from_email' => TextInput::make('from_email'),
            'logo' => SpatieMediaLibraryFileUpload::make('logo_src')
                ->enableOpen()
                ->enableDownload()
                ->columnSpanFull()
                ->disk('uploads')
                ->directory('photos')
                ->preserveFilenames(),
            'logo_width' => TextInput::make('logo_width'),
            'logo_height' => TextInput::make('logo_height'),
            'theme' => Select::make('theme')
                ->options([
                    'empty' => 'empty',
                    'ark' => 'ark',
                    'minty' => 'minty',
                    'sunny' => 'sunny',
                    'widgets' => 'widgets',
                ])
                ->default('empty'),
            'body' => Textarea::make('body')
                ->columnSpanFull(),
            'body_html' => RichEditor::make('body_html')
                ->columnSpanFull(),
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListNotifyThemes::route('/'),
            'create' => CreateNotifyTheme::route('/create'),
            'edit' => EditNotifyTheme::route('/{record}/edit'),
        ];
    }

    public static function fieldOptions(string $field): array
    {
        return match ($field) {
            'lang' => [
                'it' => 'Italiano',
                'en' => 'English',
            ],
            'type' => [
                'email' => 'Email',
                'sms' => 'SMS',
                'push' => 'Push Notification',
            ],
            'post_type' => [
                'page' => 'Page',
                'post' => 'Post',
                'product' => 'Product',
            ],
            default => [],
        };
    }
}
