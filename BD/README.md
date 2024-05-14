Cordial saludo. 

- para la ejecucion del proyecto en modo local: 

* descargar el proyecto del github ------> enlace para clonarlo git@github.com:JCmontero22/prueba_ativeApp.git
tener pre instalado, php  y composer, aparte de ello un servicio de base de datos para mysql. 

* configuar el archivo .env con las credenciales de la base de datos si es necesario. 
linea 11

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=prueba_NativeApp  ------------> nombre de la base de datos
    DB_USERNAME=root ---------------> usuario de conexion a la base de datos
    DB_PASSWORD= ------------------> si es necesario poner el password de acceso al motor de la base de datos. 


* desde la terminal del ordenador ejecutar el servidor de laravel, abrir la consola desde la carpeta del proyecto y ejecutar el siguiente comando 
    
    php artisan serve


