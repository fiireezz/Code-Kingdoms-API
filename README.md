# ⚔️ Codes & Kingdoms

> RPG por turnos multijugador con narrativa épica ambientada en la rivalidad entre los reinos de **Peachepe** y **Java**.

![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?style=flat&logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=flat&logo=laravel&logoColor=white)
![Vue.js](https://img.shields.io/badge/Vue.js-3-4FC08D?style=flat&logo=vuedotjs&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=flat&logo=mysql&logoColor=white)
![Estado](https://img.shields.io/badge/Estado-En%20desarrollo-yellow?style=flat)

---

## 📖 Descripción

**Codes & Kingdoms** es un videojuego RPG por turnos basado en navegador, sin necesidad de descarga. El jugador crea su personaje eligiendo reino, raza y clase, explora un mapa semi-abierto, combate enemigos en turnos y avanza por una historia épica donde cada decisión importa.

La lógica de combate es **autoritativa en el servidor** (Laravel), garantizando una experiencia justa y segura para todos los jugadores.

---

## 🗂️ Estructura del repositorio

```
Code-Kingdoms/
├── api/              # Backend — Laravel 12 (API REST)
├── frontend/         # Frontend — Vue.js 3 + Vite + TailwindCSS
├── .devcontainer/    # Configuración del entorno de desarrollo
├── .editorconfig     # Estilo de código unificado para el equipo
├── .gitattributes    # Normalización de saltos de línea y diffs
├── .gitignore        # Archivos ignorados por Git
└── README.md
```

---

## 🧰 Stack tecnológico

| Capa | Tecnología |
|---|---|
| Frontend | Vue.js 3 + Vite + TailwindCSS + Pinia + Axios |
| Backend | Laravel 12 (PHP) + Sanctum |
| Base de datos | MySQL 8 |
| Despliegue | Railway / Render |
| Control de versiones | Git + GitHub |

---

## ✨ Funcionalidades principales (MVP)

- 🔐 Registro e inicio de sesión con Laravel Sanctum
- 🧙 Creación de personaje (reino, raza y clase)
- 🗺️ Exploración de mapa semi-abierto
- ⚔️ Combate por turnos calculado en el servidor
- 🎒 Inventario, equipamiento y tienda
- 💬 Diálogos con NPCs y avance narrativo
- 📈 Sistema de niveles y progresión

---

## 🚀 Instalación y puesta en marcha

### Requisitos previos

- PHP >= 8.2 y Composer
- Node.js >= 18 y npm
- MySQL 8

### 1. Clonar el repositorio

```bash
git clone https://github.com/aasieerr/Code-Kingdoms.git
cd Code-Kingdoms
```

### 2. Configurar la API (Laravel)

```bash
cd api
composer install
cp .env.example .env
php artisan key:generate
# Configura tu base de datos en el .env
php artisan migrate --seed
```

### 3. Configurar el Frontend (Vue)

```bash
cd ../frontend
npm install
cp .env.example .env   # Apunta VITE_API_URL a http://localhost:8000
```

### 4. Lanzar todo desde la raíz

```bash
# En la raíz del repo
npm run dev
```

Esto arranca simultáneamente:
- **API** → `http://localhost:8000`
- **Frontend** → `http://localhost:5173`

---

## 🌿 Flujo de trabajo con Git

Este proyecto usa una versión simplificada de **Git Flow**. La rama por defecto es `develop`.

```
main          ← Solo producción (hitos validados, nunca commits directos)
develop       ← Integración diaria, siempre funcional
feature/xxx   ← Nueva funcionalidad → PR hacia develop
fix/xxx       ← Corrección de bug → PR hacia develop
release/v1.0  → merge a main y develop al entregar el MVP
```

### Convención de commits

```
feat(combat): add damage calculation logic
fix(auth): resolve token expiration issue
chore(api): update dependencies
```

---

## 👥 Equipo

| Nombre | Rol |
|---|---|
| Asier Aragón | Desarrollador Backend |
| Thani Amaru Martinez | Diseño, coordinación y apoyo general |
| Juan Diego Vázquez Santana | Desarrollador Frontend |

---

## 📄 Licencia

Proyecto académico — 2º DAW · IES Las Galletas
