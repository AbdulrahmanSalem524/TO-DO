# 🚀 Task Management API 

A simple yet well-structured RESTful API built with Laravel 9 to manage tasks, tags, and comments using clean architecture principles.

---

## 🧠 Project Overview

This project demonstrates how to build a scalable API with:

* Clean Architecture (Controller → Service → Repository)
* SOLID principles
* Database Transactions
* Relationships (Many-to-Many & Polymorphic)
* API Resources for clean responses
* Form Requests for validation

---

## ⚙️ Tech Stack

* PHP (Laravel 9)
* MySQL
* REST API
* Postman (for testing)

---

## 🏗️ Architecture

```
Client (Postman)
      ↓
Controller
      ↓
Service (Business Logic)
      ↓
Repository (Data Access)
      ↓
Model (Database)
```

---

## 🔗 Relationships

* **Task ↔ Tags** → Many-to-Many
* **Task → Comments** → Polymorphic Relationship

---

## 🔥 Features

* Full CRUD for Tasks
* Tag Management (independent entity)
* Dynamic Tag Creation (getOrCreate logic)
* Add comments to tasks
* Pagination
* Clean JSON responses using API Resources
* Validation using Form Requests
* Data consistency using Transactions

---

## 🧪 API Endpoints

### 📌 Tasks

| Method | Endpoint        | Description     |
| ------ | --------------- | --------------- |
| GET    | /api/tasks      | Get all tasks   |
| GET    | /api/tasks/{id} | Get single task |
| POST   | /api/tasks      | Create task     |
| PUT    | /api/tasks/{id} | Update task     |
| DELETE | /api/tasks/{id} | Delete task     |

---

### 📌 Tags

| Method | Endpoint  | Description  |
| ------ | --------- | ------------ |
| GET    | /api/tags | Get all tags |
| POST   | /api/tags | Create tag   |

---

## 🧪 Example Requests

### Create Task

```json
{
  "title": "Learn Laravel",
  "description": "Practice project",
  "tags": ["PHP", "Backend"],
  "comment": "Start now"
}
```

---

### Update Task

```json
{
  "title": "Updated Task",
  "tags": ["Laravel"],
  "comment": "New comment"
}
```

---

## ⚡ Key Concepts

### 🔹 Transactions

Ensures all database operations succeed or rollback entirely.

### 🔹 getOrCreate Logic

Handles tags dynamically:

* If tag exists → use it
* If not → create it

### 🔹 Repository Pattern

Separates data access logic from business logic.

### 🔹 Service Layer

Handles business logic and keeps controllers clean.

---

## ▶️ Installation

```bash
git clone https://github.com/your-username/task-api.git
cd task-api

composer install

cp .env.example .env
php artisan key:generate

php artisan migrate

php artisan serve
```

---

## 🧪 Testing

Use Postman to test endpoints:

Base URL:

```
http://127.0.0.1:8000/api
```

---

## 💡 Future Improvements

* Authentication (Laravel Sanctum)
* Search & Filters
* Caching layer
* Role-based access control

---

## 📌 Notes

This project was built for learning and demonstrating backend architecture best practices using Laravel.
