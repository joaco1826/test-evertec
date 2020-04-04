<p align="center"><img src="https://www.evertecinc.com/images/evertec-logo.png" width="400"></p>

## Prueba Joaquin Forero

### Requisitos para correr el proyecto

- PHP >= 7.1.3
- BCMath PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- MySQL 5.7

#### Pasos

1. Clonar el proyecto 
```
git clone https://github.com/joaco1826/test-evertec.git
```

2. Crear arvhivo .env con las variables de entorno (Este será adjuntado en el correo)

3. Instalar las librerias por medio de composer, si no lo tiene instalado, [aquí](https://getcomposer.org/download/) la documentación de instalación
```
composer install
```

4. Crear la base de datos con el siguiente comando:
```
php artisan mysql:createdb
```

5. Crear las tablas mediante las migraciones y usuario admin con el siguiente comando:
```
php artisan migrate --seed
```

6. Correr las pruebas unitarias con el siguiente comando:
```
./vendor/bin/phpunit
```
