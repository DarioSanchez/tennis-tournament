# Tennis-tournament

# Proyecto de Simulación de Torneos

Este proyecto simula la gestión y ejecución de torneos, incluyendo la creación de partidos y la simulación de los mismos basándose en las habilidades y otros atributos de los jugadores.

## Instrucciones de Configuración y Uso

### Arrancar el proyecto

El proyecto utiliza Docker y un Makefile para facilitar la gestión de los contenedores y las tareas comunes. A continuación, se describen los comandos disponibles en el Makefile:

- **up**: Levanta todos los contenedores necesarios para el proyecto.
  ```
  make up

  -  down: Detiene y elimina los contenedores.

  make down
    
  -  restart: Reinicia todos los contenedores.

    
  make restart
    
  -  build: Construye y levanta los contenedores.
    
  make build
    
    shell: Accede al shell del contenedor de la aplicación.
    
  make shell
    
  -  logs: Muestra los logs de los contenedores.

  make logs
    
  -  migrate: Ejecuta las migraciones de la base de datos.
    
  make migrate
    
  -  seed: Ejecuta los seeders para poblar la base de datos con datos iniciales.
  
  make seed

# Rutas Disponibles

El proyecto define las siguientes rutas para la gestión de torneos y jugadores:

    POST /tournaments: Crea un nuevo torneo.
    GET /tournaments/{id}: Obtiene los detalles de un torneo específico.
    GET /tournaments: Lista todos los torneos.
    POST /players: Crea un nuevo jugador.
    GET /players/{id}: Obtiene los detalles de un jugador específico.
    GET /players: Lista todos los jugadores.
    POST /matches/simulate/{tournamentId}: Simula todos los partidos de un torneo específico.

# Simulación de Partidos

Para simular los partidos de un torneo, asegúrate de que el torneo y los jugadores estén correctamente establecidos y utiliza la ruta:

    POST /matches/simulate/{tournamentId}

Esta ruta procesará todos los partidos del torneo indicado y determinará los ganadores basados en las habilidades y otros factores de los jugadores.

# Comandos de Migración y Seeder

Antes de iniciar el proyecto, asegúrate de ejecutar las migraciones y seeders para
configurar y poblar la base de datos:

    Migraciones:

    - make migrate

    Seeders:

    - make seed
