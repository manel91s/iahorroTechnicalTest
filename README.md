# Prueba Técnica iahorro

## Introducción
Esta prueba técnica se enfoca en abordar los problemas de diseño identificados en un controlador que no sigue las mejores prácticas de programación.

## Enfoque General
Siguiendo el patrón de arquitectura MVC, mi enfoque general consiste en separar los métodos en un servicio independiente que gestione la división de responsabilidades. Esto permitirá que, a medida que nuestra aplicación crezca, evitemos que el controlador se llene de métodos que contengan lógica de negocio. En última instancia, el controlador se ocupará únicamente de transmitir las solicitudes a los servicios y devolver las respuestas al cliente.

## Arquitectura y Diseño
En la raíz del proyecto, adjunto una imagen del diagrama UML. En este diagrama, notarás que la clase "Lead" no está presente. Si en el futuro deseamos agregar otros tipos de clientes, sería complicado y no escalable. Además, acumularíamos deuda técnica al no poder actualizar fácilmente el tipo de cliente. He introducido la clase "Client," que mantendrá una relación con "TypeClient," lo que nos permitirá definir en cualquier momento el tipo de cliente.

La clase "ClientService", como capa intermedia, se encargará de recibir las solicitudes que llegan desde el controlador. En esta capa, se llevará a cabo toda la lógica necesaria para gestionar las respuestas HTTP, así como para delegar la persistencia de datos al modelo. Además, en caso de que sea necesario incorporar otros métodos que involucren lógica de negocio, esta capa facilitará considerablemente la tarea de realizar pruebas.

Este servicio también se relaciona con el servicio "ScoringServiceFactory". En términos de escalabilidad, es probable que en el futuro cada tipo de cliente requiera un cálculo diferente. Por lo tanto, le proporcionaremos un método que incluya el tipo de cliente como parámetro, lo que permitirá abstraer el cálculo del puntaje según el tipo de cliente.

Tipos de clientes:
1. Lead
2. New Customer
3. Regular Customer

Estos tipos de cliente se relacionaran entre Cliente y TipoCliente.

## Ejecución


## Pruebas
Existen pruebas unitarias y funcionales, estas pruebas se persisten en una base de datos a parte de test, para ejecutar todos los tests ejecutar el comando:
php artisan test
