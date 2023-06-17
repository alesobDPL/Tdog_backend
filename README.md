Nombre estudiante: Manuel torres sobarzo

Carrera: IECI


APIS a utilizar: 

    -perro: 
        POST(registra un perro en la base de datos): 
            http://127.0.0.1:8000/api/perro/registrar

            	{
			"nombre": "Pikachu",
			"url_foto": "https:\/\/example.com\/Pikachu",
			"descripcion": "A friendly and playful God pokemon" }

          	{
			"nombre": "Torterra",
			"url_foto": "https:\/\/example.com\/Torterra",
			"descripcion": "A friendly and playful earth God" }
   
        PUT(edita un perro ya ingresado en la base de datos(el id puede ser 1 o 2): 
            http://127.0.0.1:8000/api/perro/actualizar/{id}

                    {
            "nombre": "Pichule",
            "url_foto": "https://example.com/Pikachu",
            "descripcion": "A friendly and playful God pokemon" }
                    {
            "nombre": "Pichule2",
            "url_foto": "https://example.com/Pikachu",
            "descripcion": "A friendly and playful God pokemon" }
            
        GET(lista todos los perros en la base de datos): 
            http://127.0.0.1:8000/api/perro/listar
            
        GET(muestra el perro del cual se coloque la id en la ruta(puede ser 1 o 2)): 
            http://127.0.0.1:8000/api/perro/mostrar/{id}
            
            {   id:1 
                id:2 }
            
        DELETE(elimina el perro del cual se coloque el id en la ruta(puede ser 1 o 2)): 
            http://127.0.0.1:8000/api/perro/borrar/{id}
            
            {   id:1 
                id:2}
                
    - interaccion

        POST(ingresa una interaccion a la base de datos): 
            http://127.0.0.1:8000/api/interaccion/registrar
                                    {
                    "perro_interesado_id": 1,
                    "perro_candidato_id": 2,
                    "preferencia": "aceptado" }
                            {
                    "perro_interesado_id": 2,
                    "perro_candidato_id": 1,
                    "preferencia": "rechazado" }
                    
        GET(lista todas las interacciones en la base de datos): 
            http://127.0.0.1:8000/api/interaccion/listar

        GET(muestra una interaccion de la cual se coloque la id en la ruta(puede ser 1 o 2): 
            http://127.0.0.1:8000/api/interaccion/mostrar/{id}

            {   id:1 
                id:2}

        PUT(edita una interaccion la cual ya ingresada en la base de datos(el id puede ser 1 o 2):
            http://127.0.0.1:8000/api/interaccion/actualizar/{id}
                        {
            "perro_interesado_id": 1,
            "perro_candidato_id": 2,
            "preferencia": "rechazado"}

                        {
            "perro_interesado_id": 2,
            "perro_candidato_id": 1,
            "preferencia": "aceptado"}

        GET(Muestra todas las interacciones que tiene el perro_interesado usando su id(puede ser 1 o 2, en este caso): 
            http://127.0.0.1:8000/api/interaccion/grupoID/{id}

        DELETE(elimina una interaccion de la base de datos, la cual se coloca la id en la ruta(puede ser 1 o 2)): 
            http://127.0.0.1:8000/api/interaccion/borrar/{id}
        
    
    

