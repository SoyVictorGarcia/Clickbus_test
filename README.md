# Proyecto test clickbus 
Este es un proyecto de prueba diseñado como un ejemplo simple de una aplicacion con las siguientes tecnologias:
* php, Symfony
* jquery
* bootstrap
* mysql
* twig
* docker

# Configuración
Sustituir el apikey que otorga la pagina www.currencyconverterapi.com para su api. El archivo donde se debe hacer esta sustitucion es: /clickbus/public/js/config.js

```javascript
var config = {
	apikey: '< HERE YOUR KEY >'
}
```
se debe sustituir la cadena "< HERE YOUR KEY >" por el valor del apikey, ejemplo:

```javascript
var config = {
	apikey: '11f40310288968550afb'
}
```

# Instalación
En la carpeta del proyecto ejecutar los siguientes comandos:

```bash
docker-compose build
docker-compose up &
```
una vez levantado el ambiente, se deben instalar las dependencias del proyecto, para esto usamos los siguientes comandos:

```bash
docker exec -it click_bus_php_1 bash
cd click_bus
composer install
```
una vez instaladas las dependencias revisamos el archivo de configuración de symfony.

```bash
cat .env
```
Por defecto debe ser el siguiente:

```plaintext
###> symfony/framework-bundle ###
APP_ENV=prod
APP_SECRET=ef1e990eb4e4c203123ab2f8b96c850e
###< symfony/framework-bundle ###

###> doctrine/doctrine-bundle ###
DATABASE_URL="mysql://clickbus:clickbus@basededatos:3306/clickbus"
###< doctrine/doctrine-bundle ###
```
Una vez revisada la configuración el siguiente paso es crear la base de datos, con el siguiente comando:

```bash
php bin/console doctrine:schema:create
```
Ya creada la base de datos, ingresamos al sitio usando la siguiente url en el navegador: 
```plaintext
url: http://localhost:8080/
```
En caso de que docker no este funcionando en linux directamente, usar la ip de la maquina virtual de docker (virtualbox) o la ip de la interfaz de red conectada a internet

```plaintext
url: http://<IP DOCKER MACHINE>:8080/
```
Terminando la configuración mencionada el proyecto estará listo para usarse.