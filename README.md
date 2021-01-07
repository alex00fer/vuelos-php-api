## API Vuelos en PHP

#### Para configurar la BBDD:
Modificar las propiedades del fichero `dbConnection.php`

### CRUD API
Tiene un único punto de acceso: `/` o `/index.php`.
Las respuestas siempre incluirán el campo booleano `success` que indicará si la operación se completo correctamente o no.

#### Read (get)
**GET**

*Sin nada:* devuelve todos los vuelos.

Para hacer una búsqueda:
```
{
    "codigo": "",
	"origen": "Londres",
	"destino": ""
}
```
En caso de no poder incluir cuerpo en la peticion GET enviar este JSON como parametro ?search={json} donde {json} es el JSON codificado para urls. (url_encoded)

#### Create (insert)
**POST**
```
{
    "codigo": "RW405",
	"origen": "Londres",
	"destino": "Zurich",
	"fecha": 1271289600000,
	"hora": "04:00",
	"plazas": 310,
	"plazas_libres": 300
}
```

#### Update
**PUT**
```
{
    "codigo": "RW405",
    "nuevo_codigo": "RW406",
	"origen": "Londres",
	"destino": "Zurich",
	"fecha": 1271289600000,
	"hora": "04:00",
	"plazas": 310,
	"plazas_libres": 300
}
```

#### Delete
**DELETE**
```
{
    "codigo": "RW405"
}
```