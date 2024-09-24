<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

Route::get('/', function () {
    return view('welcome');
});

// NOTE ROUTES
Route::get('/notes', [NoteController::class, 'index'])->name('index');
Route::get('/note/{id}', [NoteController::class, 'viewNote'])->name('viewNote');
Route::get('/create', [NoteController::class, 'createNote'])->name('createNote'); // Show create form
Route::post('/note/create', [NoteController::class, 'createNoteSubmission'])->name('createNoteSubmission'); // Submit new note
Route::get('/note/edit/{id}', [NoteController::class, 'editNote'])->name('editNote'); // Show edit form
Route::post('/note/update/{id}', [NoteController::class, 'updateNote'])->name('updateNote'); // Update note
Route::post('/note/delete/{id}', [NoteController::class, 'deleteNote'])->name('deleteNote');
