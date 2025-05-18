<?php

// Simple Notes JSON API - No DB Required

header('Content-Type: application/json');
$storageFile = __DIR__ . '/notes.json';
$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true) ?? [];

// Ensure storage file exists
if (!file_exists($storageFile)) {
    file_put_contents($storageFile, json_encode([]));
}

function loadNotes($file)
{
    return json_decode(file_get_contents($file), true) ?? [];
}

function saveNotes($file, $data)
{
    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
}

switch ($method) {
    case 'GET':
        $notes = loadNotes($storageFile);
        echo json_encode(['success' => true, 'notes' => $notes]);
        break;

    case 'POST':
        if (empty($input['text'])) {
            http_response_code(400);
            echo json_encode(['success' => false, 'error' => 'Missing note text']);
            break;
        }
        $notes = loadNotes($storageFile);
        $id = uniqid('note_', true);
        $notes[$id] = [
            'id' => $id,
            'text' => $input['text'],
            'created_at' => time(),
        ];
        saveNotes($storageFile, $notes);
        echo json_encode(['success' => true, 'id' => $id]);
        break;

    case 'DELETE':
        if (empty($input['id'])) {
            http_response_code(400);
            echo json_encode(['success' => false, 'error' => 'Missing note ID']);
            break;
        }
        $notes = loadNotes($storageFile);
        if (!isset($notes[$input['id']])) {
            http_response_code(404);
            echo json_encode(['success' => false, 'error' => 'Note not found']);
            break;
        }
        unset($notes[$input['id']]);
        saveNotes($storageFile, $notes);
        echo json_encode(['success' => true]);
        break;

    default:
        http_response_code(405);
        echo json_encode(['success' => false, 'error' => 'Method not allowed']);
        break;
}
