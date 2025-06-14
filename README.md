# HoraLibre – API de Gestión de Citas y Consultas Profesionales

**HoraLibre** es una API RESTful desarrollada con Laravel 12 y desplegada en Laravel Vapor. Diseñada para profesionales de cualquier rubro (médicos, psicólogos, coaches, abogados, etc.), permite gestionar agendas, recibir reservas y automatizar recordatorios, todo con buenas prácticas y escalabilidad SaaS.

---

## 🚀 Características

* Gestión de **profesionales**, **clientes**, **servicios** y **citas**
* Horarios configurables por profesional
* Reservas simples desde cualquier frontend (mobile/web)
* Recordatorios automáticos vía scheduler
* Notas privadas post-consulta
* Arquitectura moderna con Service Classes y Providers
* Despliegue serverless en Laravel Vapor

---

## 📦 Endpoints principales

| Método | Ruta                               | Descripción                      |
| ------ | ---------------------------------- | -------------------------------- |
| GET    | `/professionals`                   | Listar profesionales disponibles |
| GET    | `/specialties`                     | Listar especialidades            |
| GET    | `/professionals/{id}/services`     | Servicios de un profesional      |
| GET    | `/professionals/{id}/availability` | Ver disponibilidad               |
| POST   | `/appointments`                    | Reservar una cita                |
| GET    | `/appointments/{id}`               | Consultar detalles de cita       |
| PUT    | `/appointments/{id}/cancel`        | Cancelar cita                    |
| POST   | `/appointments/{id}/notes`         | Nota privada del profesional     |

---

## ⚙️ Instalación local

```bash
git clone https://github.com/tuusuario/hora-libre.git
cd hora-libre

composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```
