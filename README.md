# API Rick and Morty — Laravel + Vue + Inertia

Proyecto ejemplo que consume la API pública de Rick and Morty y expone vistas web con Inertia + Vue. Está organizado como una aplicación Laravel con un pequeño frontend en Vue.

Relevante en el código

-   Servicio que consume la API: [`App\Services\RickAndMortyService`](app/Services/RickAndMortyService.php) — [app/Services/RickAndMortyService.php](app/Services/RickAndMortyService.php)
-   Controladores API: [`App\Http\Controllers\Apis\RickAndMortyController`](app/Http/Controllers/Apis/RickAndMortyController.php) — [routes/api.php](routes/api.php)
-   Controladores web / vistas Inertia: [`App\Http\Controllers\Web\CharactersController`](app/Http/Controllers/Web/CharactersController.php) — [resources/js/Pages/Characters/Index.vue](resources/js/Pages/Characters/Index.vue)
-   DTOs usados: [`App\Dtos\RickAndMorty\CharacterDto`](app/Dtos/RickAndMorty/CharacterDto.php), [`App\Dtos\RickAndMorty\LocationDto`](app/Dtos/RickAndMorty/LocationDto.php) — [app/Dtos/RickAndMorty](app/Dtos/RickAndMorty/)
-   Binding de la interfaz: [`App\Contracts\IRickAndMortyService`](app/Contracts/IRickAndMortyService.php) — [app/Providers/AppServiceProvider.php](app/Providers/AppServiceProvider.php)

Instalación rápida

2. Instalar dependencias PHP y JS:
   composer install
   npm install
3. Generar clave:
   php artisan key:generate
4. Levantar entorno de desarrollo:
   npm run dev
   php artisan serve

Endpoints públicos (ejemplos)

-   GET /api/characters
-   GET /api/character/{id}
-   GET /api/locations
-   GET /api/episodes

Contribución y notas

-   Ver binding del servicio en [app/Providers/AppServiceProvider.php](app/Providers/AppServiceProvider.php)
-   Para cambiar consumo de API modificar [`App\Services\RickAndMortyService`](app/Services/RickAndMortyService.php)
