<?php

namespace App\Filament\Resources\ArticleNews\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ArticleNewsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('thumbnail')->image()
                    ->directory('magazine') // Folder di storage/app/public
                    ->visibility('public')
                    ->preserveFilenames()
                    ->disk('public')
                    ->imagePreviewHeight('150') // Tambahkan ini
                    ->loadingIndicatorPosition('left')
                    ->panelLayout('integrated')->required(),
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('author_id')
                    ->relationship('author', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('is_featured')
                    ->options([
                        'featured' => 'Featured',
                        'not_featured' => 'Not Featured'
                    ])
                    ->required(),
                RichEditor::make('content')
                        ->columnSpanFull()
                        ->toolbarButtons([
                            'attachFiles',
                            'blockquote',
                            'bold',
                            'bulletList',
                            'codeBlock',
                            'h2',
                            'h3',
                            'italic',
                            'link',
                            'orderedList',
                            'redo',
                            'strike',
                            'underline',
                            'undo'
                        ]),
            ]);
    }
}
