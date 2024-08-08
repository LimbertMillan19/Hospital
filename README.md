# Aplicación de Gestión de Pacientes en un hospital

Esta aplicación permite gestionar una lista de pacientes, permitiendo crear, editar y eliminar pacientes así como descargar un PDF con los datos del paciente.

## Requisitos

- PHP 8.0 o superior
- Composer
- Node.js
- npm

## Instalación

1. Clona el repositorio:
git clone https://github.com/tu-usuario/nombre-del-proyecto.git

2. Ingresa al directorio del proyecto:
cd nombre-del-proyecto

3. Instala las dependencias de PHP:
composer install

4. Instala las dependencias de Node.js:
npm install

5. Copia el archivo de configuración:
cp .env.example .env

6. Genera la clave de la aplicación:
php artisan key:generate

7. Configura la conexión a la base de datos en el archivo 
`.env`.
viene configurado para una bd de mysql llamada hospital

8. Ejecuta las migraciones y seeds:
primero ejecuta
php artisan migrate

luego para llenar la base con datos de prueba ejecuta
php artisan tinker

>>> \App\Models\Hospital::factory()->count(5)->create()
>>> \App\Models\Paciente::factory()->count(20)->create()


9. Compila los assets:
npm run dev

10. Inicia el servidor de desarrollo:
 php artisan serve

11. Abre tu navegador y accede a `http://localhost:8000`.

## Usando la aplicación

Una vez que hayas iniciado el servidor de desarrollo inicias viendo la vista de la lista de pacientes, puedes acceder a las siguientes funcionalidades:

- Crear un nuevo paciente
    En la parte superior izquierda de la página web, se encuentra el botón crear paciente, haciendo clic sobre él se abrirá un formulario para llenar con los datos del paciente, elige guardar para registrar el paciente o cerrar para retirar el formulario sin hacer nada
- Editar un paciente existente
    En caso de ser necesario, se pueden modificar los datos del paciente, dando clic en el botón editar en su columna, de igual forma que con el botón de crear se abrirá un formulario, que mostrará los datos del paciente para modificarlos libremente, se pueden guardar los cambios con el botón guardar en la parte inferior o cerrar el formulario sin hacer cambios
- Eliminar un paciente
    Es un botón rojo ubicado debajo del botón editar, al clicarlo permite eliminar un registro, mostrando una ventana para confirmar o cancelar el borrado
- Generar PDF
    Finalmente esta la opción que permite generar un PDF con los datos del paciente, al dar clic en el automaticamente se descargará un pdf con los datos del paciente seleccionado

