# Prueba Técnica iahorro

## Introducción
Esta prueba técnica se enfoca en abordar los problemas de diseño identificados en un controlador que no sigue las mejores prácticas de programación.

## Enfoque General
Siguiendo el patrón de arquitectura MVC, mi enfoque general consiste en separar los métodos en un servicio independiente que gestione la división de responsabilidades. Esto permitirá que, a medida que nuestra aplicación crezca, evitemos que el controlador se llene de métodos que contengan lógica de negocio. En última instancia, el controlador se ocupará únicamente de transmitir las solicitudes a los servicios y devolver las respuestas al cliente.

## Arquitectura y Diseño
En la raíz del proyecto, adjunto una imagen del diagrama UML. En este diagrama, notarás que la clase "Lead" no está presente. Si en el futuro deseamos agregar otros tipos de clientes, sería complicado y no escalable. Además, acumularíamos deuda técnica al no poder actualizar fácilmente el tipo de cliente. He introducido la clase "Client," que mantendrá una relación con "TypeClient," lo que nos permitirá definir en cualquier momento el tipo de cliente.

También he añadido que el modelo del cliente implemente una interfaz llamada "ModelInterface." Esto permitirá que nuestro "ClientService" abstraiga este modelo y facilite las pruebas unitarias mediante la inversión de dependencias. Además, como se muestra en el diagrama, la clase "ClientService" también se asocia con el servicio "LeadScoringService" para realizar los cálculos necesarios y separar esa responsabilidad.

## Implementación


## Ejecución


## Pruebas
Para las pruebas unitarias y funcionales, he separado la conexión a una base de datos de prueba mediante microservicios.