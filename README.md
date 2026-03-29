# 📝 Task Management API (Laravel)

A RESTful API built with Laravel for managing tasks, tags, and comments.
The project follows clean architecture principles using Service Layer, Repository Pattern, and API Resources.

---

## 🚀 Features

* ✅ CRUD Operations for Tasks
* 🏷️ Tagging System (Many-to-Many)
* 💬 Task Comments
* 🔄 Automatic Tag Creation
* 📦 Clean Architecture (Service + Repository Pattern)
* 📤 API Resources for consistent responses
* 🔐 Ready for Authentication (Laravel Sanctum)

---

## 🛠️ Tech Stack

* Laravel
* PHP
* MySQL
* REST API

---

## 📂 Project Structure

```
app/
├── Http/
│   ├── Controllers/Api
│   ├── Requests
│   └── Resources
├── Services
├── Repositories
├── Models
```

---

## ⚙️ Installation

1. Clone the repository:

```bash
git clone https://github.com/your-username/task-management-api.git
cd task-management-api
```

2. Install dependencies:

```bash
composer install
```

3. Create environment file:

```bash
cp .env.example .env
```

4. Generate app key:

```bash
php artisan key:generate
```

5. Configure database in `.env`

6. Run migrations:

```bash
php artisan migrate
```

7. Start server:

```bash
php artisan serve
```

---

## 📡 API Endpoints

### 🔹 Tasks

| Method    | Endpoint        | Description     |
| --------- | --------------- | --------------- |
| GET       | /api/tasks      | Get all tasks   |
| GET       | /api/tasks/{id} | Get single task |
| POST      | /api/tasks      | Create task     |
| PUT/PATCH | /api/tasks/{id} | Update task     |
| DELETE    | /api/tasks/{id} | Delete task     |

---

### 🔹 Tags

| Method | Endpoint  |
| ------ | --------- |
| GET    | /api/tags |
| POST   | /api/tags |

---

## 🧪 Example Request

### Create Task

```json
{
  "title": "Learn Laravel",
  "description": "Practice building APIs",
  "tags": ["Laravel", "Backend"],
  "comment": "Start today!"
}
```

---

## 🔄 Relationships

* Task ↔ Tags → Many-to-Many
* Task → Comments → One-to-Many

---

## 🧠 Architecture

This project uses:

* Repository Pattern → Data access abstraction
* Service Layer → Business logic handling
* API Resources → Response formatting

---

## 🔥 Future Improvements

* Authentication with Sanctum
* Pagination & Filtering
* Task status (completed / pending)
* User-specific tasks

---

## 👨‍💻 Author

Developed by [Your Name]

---
