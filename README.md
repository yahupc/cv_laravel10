# Proyecto CV

## Primeras configuraciones:

### Configuracion de Modulos:

[Referencia](https://github.com/nWidart/laravel-modules)

-   Crearemos los modulos necesarios para el proyecto.
-   Instalamos el paquete de composer para los modulos.

    ```shell
    composer require nwidart/laravel-modules
    ## Publicar el archivo del paquete de configuración.
    php artisan vendor:publish --provider="Nwidart\Modules\LaravelModulesServiceProvider"
    ```

    > No olvidar correr el siguiente comando para optimizar los archivos autoload.
    > `composer dump-autoload`

    Autoloading
    Por defecto, las clases de los modulos no son cargadas automaticamente. Para **autocargarlos** usando psr-4, añadir la linea siguiente a el final de la raiz del archivo **composer.json** bajo la seccion de autoload.

    ```json
    {
        "autoload": {
            "psr-4": {
                "App\\": "app/",
                "Database\\Factories\\": "database/factories/",
                "Database\\Seeders\\": "database/seeders/",
                "Modules\\": "Modules/"
            }
        }
    }
    ```

    > Tip: no olvides ejecutar `composer dump-autoload` despues de todo.

-   Para crear un nuevo modulo ingresa el siguiente codigo en consola.
    `php arisan module:make Configuration`
-   Despues de crear los modulos estos se deben de guardar en la ruta **app/Modules/Configuration**, de no guardarse en esta ruta por defecto, tenemos que modificar los siguientes archivos.
-   composer.json

    ```json
      {
          "autoload": {
              "psr-4": {
                  "App\\": "app/",
                  "Database\\Factories\\": "database/factories/",
                  "Database\\Seeders\\": "database/seeders/",
                  "Modules\\": "app/Modules/" <--- aqui esta la modificacion.
              }
          }
      }
    ```

-   config/modules.php

    ```php
    'paths' => [
       'modules' => base_path('app/Modules'), // aqui esta el cambio.
    ```

## Modulo de Seguridad:

-   Utilizamos los siguientes comandos:

    ```shell
      composer require laravel/ui
      php artisan ui bootstrap --auth
      npm install
      npm run dev
    ```

-   Aplicar medidas de seguridad:

    -   [Refrencia](https://pentest-tools.com/blog/laravel-application-security-guide#1-use-strong-passwords)
    -   Usando un password fuerte:
        app/Http/Controllers/Auth/RegisterController.php

        ```php
        protected function validator(array $data)
        {
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => [
                    'required', 'string', 'min:8', 'confirmed',
                    Password_new::min(8)
                        ->letters()
                        ->mixedCase()
                        ->numbers()
                        ->symbols()
                        ->uncompromised()
                ],
            ]);
        }
        ```

    END
