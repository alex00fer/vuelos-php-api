## API Vuelos en PHP
#### Para configurar la BBDD:
Modificar las propiedades del fichero `dbConnection.php`
### CRUD API
Tiene un único punto de acceso: `/` o `/index.php`
#### Read (get)
**GET**

*empty:* devuelve todos los vuelos.
```

```
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