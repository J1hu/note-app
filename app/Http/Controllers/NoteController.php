<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    // Display all notes
    public function index()
    {
        $notes = Note::orderBy('updated_at', 'desc')->get();
        return view('notes', ['notes' => $notes]);
    }

    // View a specific note by ID
    public function viewNote($id) // Adjust to accept ID directly from route
    {
        $note = Note::find($id); // Use the ID directly, no need to use Request here

        if (!$note) {
            return redirect()->route('index')->with('error', 'Note not found.');
        }

        return view('note', ['note' => $note]);
    }

    // Show the form to create a new note
    public function createNote()
    {
        return view('create-note');
    }

    // Handle the form submission to create a note
    public function createNoteSubmission(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $note = new Note();
        $note->title = $validated['title'];
        $note->description = $validated['description']; // Save description
        $note->content = $validated['content'];
        $note->save();

        return redirect()->route('index')->with('success', 'Note created successfully.');
    }

    public function editNote($id) // Show the edit form
    {
        $note = Note::find($id);

        if (!$note) {
            return redirect()->route('index')->with('error', 'Note not found.');
        }

        return view('edit-note', ['note' => $note]);
    }

    public function updateNote(Request $request, $id) // Handle the note update
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $note = Note::find($id);

        if (!$note) {
            return redirect()->route('index')->with('error', 'Note not found.');
        }

        // Update the note
        $note->title = $validated['title'];
        $note->description = $validated['description'];
        $note->content = $validated['content'];
        $note->save();

        return redirect()->route('viewNote', ['id' => $note->id])->with('success', 'Note updated successfully.');
    }


    // Handle deleting a note
    public function deleteNote(Request $request, $id)
    {
        // Find and delete the note
        $note = Note::find($id);
        if ($note) {
            $note->delete();
        }

        return redirect()->route('index')->with('success', 'Note deleted successfully.');
    }
}
