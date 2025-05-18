
# 📝 Simple PHP JSON Notes API

A lightweight, no-database REST-style API for storing and retrieving notes using plain PHP and JSON files. Ideal for small tools, prototypes, and learning how to handle JSON-based APIs with no frameworks.

---

## 🚀 Features

- Pure PHP – no dependencies
- Flat-file JSON storage (no database needed)
- Supports:
  - `GET` – List all notes
  - `POST` – Create a new note
  - `DELETE` – Delete a note by ID
- Easy to deploy anywhere PHP runs

---

## 📦 Installation

### 1. Clone the repository

```bash
git clone https://github.com/eeysudo/flat-file-JSON-storage.git
cd flat-file-JSON-storage
```

### 2. Run the PHP built-in server

```bash
php -S localhost:8000
```

### 3. Access the API

Open in your browser or API client:

```
http://localhost:8000/api.php
```

---

## 📡 API Endpoints

### ➤ GET `/api.php`

Returns all saved notes.

**Example response:**

```json
{
  "success": true,
  "notes": {
    "note_6648a43535bb7": {
      "id": "note_6648a43535bb7",
      "text": "Example note",
      "created_at": 1716000000
    }
  }
}
```

---

### ➤ POST `/api.php`

Creates a new note.

**Request body:**

```json
{
  "text": "This is a new note"
}
```

**Example response:**

```json
{
  "success": true,
  "id": "note_6648a43535bb7"
}
```

---

### ➤ DELETE `/api.php`

Deletes a note by ID.

**Request body:**

```json
{
  "id": "note_6648a43535bb7"
}
```

**Example response:**

```json
{
  "success": true
}
```

---

## 🛡️ Error Handling

- `400 Bad Request`: Missing or invalid fields
- `404 Not Found`: Note not found
- `405 Method Not Allowed`: Unsupported HTTP method

---

## 🗂 File Structure

```
php-json-notes-api/
├── api.php         # The API logic
├── notes.json      # Auto-created flat file for storing notes
└── README.md
```

---

## 🧠 Use Cases

- Prototyping quick note-taking tools
- Teaching/learning API basics
- Internal low-complexity utilities
- Lightweight personal apps without DB overhead

---

## 📄 License

MIT — feel free to use, modify, and share.

---

Made with ❤️ in PHP.
