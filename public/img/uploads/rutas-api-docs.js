/****************************************** EXPLICACION Leer antes  IMPORTANTE ***************************************
|	Documento de rutas APIS 
|	En Este documento estara de manera de ejemplo las RUTAS API 
|   
|	Cada objeto representa una ruta API
|	
|		- ruta: contiene la ruta textual a la que se debe acceder
|		- metodo: el Metodo HTTP (GET o POST ; solamente se usaran esos 2)
|		- comentarios: se aclara distintos puntos como seguridad, o maneras de uso, variantes etc
|		- respuesta: es la respuesta enviada por el servidor, esta siempre contiene un atributo 
|		"data" que es donde estara la informacion solicitada, 
|			tambien se presentan algunos atributos en algunos casos como 
|				"estado" que puede ser "ok" o "error" segun sea el caso
|				"mensaje" que es un mensaje del tipo "se inserto correctamente" o un mensaje de error ej: 'el usuario no tiene permiso'
|
|		Todas las peticiones API REST , tienen el prefijo "api", despues del dominio y nombre de aplicacion
|		
|		url servidor: 		http://fdbb661.online-server.cloud
|		aplicacion Web: 	reactivaweb/
|		prefijo: 			api/,
|		ruta-peticion: 		listar-rubros/ 
|
|		Entonces la ruta que nunca cambia en el caso de las APIs es: http://fdbb661.online-server.cloud/reactivaweb/api/ 
|		Recomendacion : Es cnveniente que esta se declare en una variable global, por si en algun caso se cambia de dominio o nombre de webAplication
|		solo modificar esa variable global.
|
|		
 */



LISTAR_RUBROS = {
	ruta:  "http://fdbb661.online-server.cloud/reactivaweb/api/listar-rubros",
	metodo: "get",
	comentarios:"",
	respuesta: 
	{
		"data": [
			{
				"id": 4,
				"nombre": "Salud",
				"orden": 1
			},
			{
				"id": 5,
				"nombre": "Transporte",
				"orden": 2
			},
			{
				"id": 6,
				"nombre": "Recolección de Residuos",
				"orden": 3
			},
			{
				"id": 7,
				"nombre": "Comercio",
				"orden": 4
			},
			{
				"id": 8,
				"nombre": "Turismo",
				"orden": 5
			},
			{
				"id": 9,
				"nombre": "Manufactura",
				"orden": 6
			},
			{
				"id": 10,
				"nombre": "Productivo",
				"orden": 7
			},
			{
				"id": 11,
				"nombre": "Minería",
				"orden": 8
			}
		],
	},
}

LISTAR_DEPARTAMENTOS = {
	ruta:  "http://fdbb661.online-server.cloud/reactivaweb/api/listar-departamentos",
	metodo: "get",
	comentarios:"",
	respuesta: 

	{
		"data": [
			{
				"id": 2,
				"nombre": "CHUQUISACA",
				"codigo": "01"
			},
			{
				"id": 3,
				"nombre": "LA PAZ",
				"codigo": "02"
			},
			{
				"id": 4,
				"nombre": "COCHABAMBA",
				"codigo": "03"
			},
			{
				"id": 5,
				"nombre": "ORURO",
				"codigo": "04"
			},
			{
				"id": 6,
				"nombre": "POTOSÍ",
				"codigo": "05"
			},
			{
				"id": 7,
				"nombre": "TARIJA",
				"codigo": "06"
			},
			{
				"id": 8,
				"nombre": "SANTA CRUZ",
				"codigo": "07"
			},
			{
				"id": 9,
				"nombre": "BENI",
				"codigo": "08"
			},
			{
				"id": 10,
				"nombre": "PANDO",
				"codigo": "09"
			}
		]
	}
}

LISTAR_PROVINCIAS_DE_DEPARTAMENTO = {
	ruta:  "http://fdbb661.online-server.cloud/reactivaweb/api/listar-provincias-de-departamento/9",
	metodo: "get",
	comentarios:"Despues de listar-provincias-de-departamento se debe colocar el id del departamento del que se requiere sus provincias",
	respuesta: 

	{
		"data": [
			{
				"id": 110,
				"nombre": "CERCADO",
				"codigo": "0801"
			},
			{
				"id": 111,
				"nombre": "VACA DIEZ",
				"codigo": "0802"
			},
			{
				"id": 112,
				"nombre": "GENERAL JOSE BALLIVIAN",
				"codigo": "0803"
			},
			{
				"id": 113,
				"nombre": "YACUMA",
				"codigo": "0804"
			},
			{
				"id": 114,
				"nombre": "MOXOS",
				"codigo": "0805"
			},
			{
				"id": 115,
				"nombre": "MARBAN",
				"codigo": "0806"
			},
			{
				"id": 116,
				"nombre": "MAMORÉ",
				"codigo": "0807"
			},
			{
				"id": 117,
				"nombre": "ITENEZ",
				"codigo": "0808"
			}
		]
	}
}


LISTAR-MUNICIPIOS-DE-PROVINCIA = {
	ruta:  "http://fdbb661.online-server.cloud/reactivaweb/api/listar-municipios-de-provincia/112",
	metodo: "get",
	comentarios:"se debe colocar el id de provincia del que se requiere sus munis",
	respuesta: 
	{
		"data": [
			{
				"id": 432,
				"nombre": "REYES",
				"codigo": "080301"
			},
			{
				"id": 433,
				"nombre": "SAN BORJA",
				"codigo": "080302"
			},
			{
				"id": 434,
				"nombre": "SANTA ROSA",
				"codigo": "080303"
			},
			{
				"id": 435,
				"nombre": "RURRENABAQUE",
				"codigo": "080304"
			}
		]
	}


}


LISTAR-MUNICIPIOS-DE-DEPARTAMENTO = {
	ruta:  "http://fdbb661.online-server.cloud/reactivaweb/api/listar-provincias-de-departamento/{id}",
	metodo: "get",
	comentarios:"se debe colocar el id de depto  del que se requiere sus munis",
	respuesta: 
	{
		"data": [
			{
				"id": 110,
				"nombre": "CERCADO",
				"codigo": "0801"
			},
			{
				"id": 111,
				"nombre": "VACA DIEZ",
				"codigo": "0802"
			},
			{
				"id": 112,
				"nombre": "GENERAL JOSE BALLIVIAN",
				"codigo": "0803"
			},
			{
				"id": 113,
				"nombre": "YACUMA",
				"codigo": "0804"
			},
			{
				"id": 114,
				"nombre": "MOXOS",
				"codigo": "0805"
			},
			{
				"id": 115,
				"nombre": "MARBAN",
				"codigo": "0806"
			},
			{
				"id": 116,
				"nombre": "MAMORÉ",
				"codigo": "0807"
			},
			{
				"id": 117,
				"nombre": "ITENEZ",
				"codigo": "0808"
			}
		]
	}
}


OBTENER-DEPARTAMENTOS-CON-MUNICIPIOS = {
	ruta:  "http://fdbb661.online-server.cloud/reactivaweb/api/obtener-departamentos-con-municipios",
	metodo: "get",
	comentarios:"se debe colocar el id de depto  del que se requiere sus munis",
	respuesta: 
	{
		"data": [
			{
				"id": 2,
				"nombre": "CHUQUISACA",
				"codigo": "01",
				"municipios": [
					{
						"municipio": "SUCRE",
						"id_municipio": 123,
						"codigo_municipio": "010101",
						"provincia": "OROPEZA"
					},
					{
						"municipio": "YOTALA",
						"id_municipio": 124,
						"codigo_municipio": "010102",
						"provincia": "OROPEZA"
					},
					{
						"municipio": "POROMA",
						"id_municipio": 125,
						"codigo_municipio": "010103",
						"provincia": "OROPEZA"
					},
					{
						"municipio": "AZURDUY",
						"id_municipio": 126,
						"codigo_municipio": "010201",
						"provincia": "AZURDUY"
					},
					{
						"municipio": "TARVITA",
						"id_municipio": 127,
						"codigo_municipio": "010202",
						"provincia": "AZURDUY"
					},
					{
						"municipio": "ZUDAÑEZ",
						"id_municipio": 128,
						"codigo_municipio": "010301",
						"provincia": "ZUDAÑEZ"
					},
					{
						"municipio": "PRESTO",
						"id_municipio": 129,
						"codigo_municipio": "010302",
						"provincia": "ZUDAÑEZ"
					},
					{
						"municipio": "MOJOCOYA",
						"id_municipio": 130,
						"codigo_municipio": "010303",
						"provincia": "ZUDAÑEZ"
					},
					{
						"municipio": "ICLA",
						"id_municipio": 131,
						"codigo_municipio": "010304",
						"provincia": "ZUDAÑEZ"
					},
					{	"etc" : "........."}
				]
			}, 
			
			{
				"id": 3,
				"nombre": "LA PAZ",
				"codigo": "02",
				"municipios": [
					{
						"municipio": "NUESTRA SEÑORA DE LA PAZ",
						"id_municipio": 152,
						"codigo_municipio": "020101",
						"provincia": "MURILLO"
					},
					{
						"municipio": "PALCA",
						"id_municipio": 153,
						"codigo_municipio": "020102",
						"provincia": "MURILLO"
					},
					{
						"municipio": "MECAPACA",
						"id_municipio": 154,
						"codigo_municipio": "020103",
						"provincia": "MURILLO"
					},
					{
						"municipio": "ACHOCALLA",
						"id_municipio": 155,
						"codigo_municipio": "020104",
						"provincia": "MURILLO"
					},
					{
						"municipio": "EL ALTO",
						"id_municipio": 156,
						"codigo_municipio": "020105",
						"provincia": "MURILLO"
					},
					{
						"municipio": "ACHACACHI",
						"id_municipio": 157,
						"codigo_municipio": "020201",
						"provincia": "OMASUYOS"
					},
					{  	"etc" : ".........."}
				]
			},
			{ "etc" : ".........."}
		]
	}
}
			


RUTA_OBTENER_TODOS_LOS_CONTENIDOS = { 
	ruta:  "http://fdbb661.online-server.cloud/reactivaweb/api/obtener-todos-los-contenidos",
	metodo: "get",
	comentarios:"devuelve un array de los encabezados, o tipos de contenidos ; y cada uno compuesto por un array de sus contenidos o informaciones",
	respuesta: 
	{
		"data": [
			{
				"id": 1,
				"nombre": "COVID 19",
				"orden": 1,
				"contenidos": [
					{
						"id": 1,
						"titulo": "¿Qué es el SARS - COV 2 ?",
						"texto": "La COVID-19 afecta de distintas maneras en función de cada persona. La mayoría de las personas que se contagian presentan síntomas de intensidad leve o moderada, y se recuperan sin necesidad de hospitalización.La COVID-19 afecta de distintas maneras en función de cada persona. La mayoría de las personas que se contagian presentan síntomas de intensidad leve o moderada, y se recuperan sin necesidad de hospitalización.\r\n",
						"url_redireccion": null,
						"url_imagen": "http://fdbb661.online-server.cloud/reactivaweb/show-imagen/covid.jpg"
					},
					{
						"id": 2,
						"titulo": "¿Cúales son los modos de Transmisión del SARS - COV 2?\r\n",
						"texto": "Una persona puede contraer la COVID‑19 por contacto con otra que esté infectada por el virus. La enfermedad se propaga principalmente de persona a persona a través de las gotículas que salen despedidas de la nariz o la boca de una persona infectada al toser, estornudar o hablar. Estas gotículas son relativamente pesadas, no llegan muy lejos y caen rápidamente al suelo. Una persona puede contraer la COVID‑19 si inhala las gotículas procedentes de una persona infectada por el virus. Por eso es importante mantenerse al menos a un metro de distancia de los demás. Estas gotículas pueden caer sobre los objetos y superficies que rodean a la persona, como mesas, pomos y barandillas, de modo que otras personas pueden infectarse si tocan esos objetos o superficies y luego se tocan los ojos, la nariz o la boca. Por ello es importante lavarse las manos frecuentemente con agua y jabón o con un desinfectante a base de alcohol. ",
						"url_redireccion": null,
						"url_imagen": "http://fdbb661.online-server.cloud/reactivaweb/show-imagen/102.jpg"
					},
					{
						"id": 3,
						"titulo": "¿Cúales son los signos y sintomas del COVID-19?\r\n",
						"texto": "Los síntomas más habituales de la COVID-19 son la fiebre, la tos seca y el cansancio. Otros síntomas menos frecuentes que afectan a algunos pacientes son los dolores y molestias, la congestión nasal, el dolor de cabeza, la conjuntivitis, el dolor de garganta, la diarrea, la pérdida del gusto o el olfato y las erupciones cutáneas o cambios de color en los dedos de las manos o los pies. Estos síntomas suelen ser leves y comienzan gradualmente. Algunas de las personas infectadas solo presentan síntomas levísimos.\r\n\r\nLa mayoría de las personas (alrededor del 80%) se recuperan de la enfermedad sin necesidad de tratamiento hospitalario. Alrededor de 1 de cada 5 personas que contraen la COVID‑19 acaba presentando un cuadro grave y experimenta dificultades para respirar. Las personas mayores y las que padecen afecciones médicas previas como hipertensión arterial, problemas cardiacos o pulmonares, diabetes o cáncer tienen más probabilidades de presentar cuadros graves. Sin embargo, cualquier persona puede contraer la COVID‑19 y caer gravemente enferma. Las personas de cualquier edad que tengan fiebre o tos y además respiren con dificultad, sientan dolor u opresión en el pecho o tengan dificultades para hablar o moverse deben solicitar atención médica inmediatamente. Si es posible, se recomienda llamar primero al profesional sanitario o centro médico para que estos remitan al paciente al establecimiento sanitario adecuado.",
						"url_redireccion": null,
						"url_imagen": "http://fdbb661.online-server.cloud/reactivaweb/show-imagen/103.jpg"
					},
					{
						"id": 4,
						"titulo": "¿Qué Tipos de Riesgo Existen?\r\n",
						"texto": "¿Qué clases de Riesgos Laborales existen?\r\nRiesgos Físicos. Sin duda, los riesgos físicos engloban una gran cantidad de riesgos derivados que los podríamos catalogar como subriesgos. ...\r\nRiesgos Químicos. ...\r\nRiesgos Biológicos. ...\r\nRiesgos Psicosociales. ...\r\nRiesgos Ambientales. ...\r\nRiesgos Mecánicos. ...\r\nRiesgos Ergonómicos.",
						"url_redireccion": null,
						"url_imagen": "http://fdbb661.online-server.cloud/reactivaweb/show-imagen/104.jpg"
					}
				]
			},
			{
				"id": 2,
				"nombre": "Riesgos por rubro",
				"orden": 2,
				"contenidos": [
					{
						"id": 5,
						"titulo": "Riesgo Salud",
						"texto": "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200",
						"url_redireccion": null,
						"url_imagen": "http://fdbb661.online-server.cloud/reactivaweb/show-imagen/201.jpg"
					},
					{
						"id": 6,
						"titulo": "Riesgo en Sector Transporte",
						"texto": "Se cree ampliamente que la historia de Lorem Ipsum se origina con Cicerón en el siglo I aC y su texto De Finibus bonorum et malorum. Esta obra filosófica, también conocida como En los extremos del bien y del mal, se dividió en cinco libros. El Lorem Ipsum que conocemos hoy se deriva de partes del primer libro Liber Primus y su discusión sobre el hedonismo, cuyas palabras habían sido alteradas, añadidas y eliminadas para convertirlas en un latín sin sentido e impropio. No se sabe exactamente cuándo el texto recibió su forma tradicional actual. Sin embargo, las referencias a la frase \"Lorem Ipsum\" se pueden encontrar en la Edición de la Biblioteca Clásica Loeb de 1914 del De Finibus en las secciones 32 y 33. Fue en esta edición del De Finibus en la que H. Rackman tradujo el texto",
						"url_redireccion": null,
						"url_imagen": "http://fdbb661.online-server.cloud/reactivaweb/show-imagen/202.jpg"
					},
					{
						"id": 7,
						"titulo": "Riesgo en Mineria",
						"texto": "Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but occasionally circumstances occur in which toil and pain can procure him some great pleasure\"",
						"url_redireccion": null,
						"url_imagen": "http://fdbb661.online-server.cloud/reactivaweb/show-imagen/203.jpg"
					}
				]
			},
			{
				"id": 3,
				"nombre": "Seguridad ocupacional",
				"orden": 3,
				"contenidos": [
					{
						"id": 8,
						"titulo": "Sobre este generador",
						"texto": "Purus semper vehicula eu cum libero a pellentesque pharetra porttitor luctus, primis facilisi imperdiet iaculis netus pulvinar tristique ultrices congue. Pellentesque cubilia fermentum eros ultricies convallis, arcu justo ante nascetur aliquet, faucibus senectus habitasse turpis. Taciti metus commodo nostra curae tempus parturient aenean ultricies ac facilisi volutpat ad facilisis risus accumsan nam litora, ne",
						"url_redireccion": null,
						"url_imagen": "http://fdbb661.online-server.cloud/reactivaweb/show-imagen/301.jpg"
					},
					{
						"id": 9,
						"titulo": "How does the system generate all this custom conten",
						"texto": "Designers at the digital agency Boom have imagined a better way. They’ve created a free text generator that replaces lorem ipsum with useful, topical prose that you can build in list or paragraph form, and in plain text or HTML. So if you’re creating a cooking site, you can generate text about hamburgers or tacos.",
						"url_redireccion": null,
						"url_imagen": "http://fdbb661.online-server.cloud/reactivaweb/show-imagen/302.jpg"
					},
					{
						"id": 10,
						"titulo": "¿Cuál es el mejor teléfono de Samsung?",
						"texto": "El Samsung Galaxy S20 Plus es el mejor celular que puedes comprar a día de hoy, aunque el Galaxy S20 es tan similar que hemos fusionado en una entrada aunque sea más pequeño y algo menos capaz que el S20 Plus. Por qué es el mejor celular: Es la relación valor-precio lo que permite a Samsung ganar sobre Apple",
						"url_redireccion": null,
						"url_imagen": "http://fdbb661.online-server.cloud/reactivaweb/show-imagen/303.jpg"
					},
					{
						"id": 11,
						"titulo": "\r\niPhone SE - Apple",
						"texto": "El iPhone SE viene con el chip A13 Bionic, modo Retrato, video 4K, Touch ID, pantalla Retina HD y una batería de gran duración en un diseño de 4.7”.",
						"url_redireccion": null,
						"url_imagen": "http://fdbb661.online-server.cloud/reactivaweb/show-imagen/304.png"
					}
				]
			}
		],
		"estado": "ok"
	}
}

RUTA-GUARDAR-EMPRESA = {
	ruta:  "http://fdbb661.online-server.cloud/reactivaweb/api/guardar-empresa",
	metodo: "POST",
	comentarios:"Sirve para guardar la empresa en su primera intervencion (INSERT) y tambien para actualizar los datos completos de la empresa posteriormente( UPDATE)",
	envia: 
	{
		id: "123456",   /* generado con UID, OBLIGATORIO, varchar*/
		nombre: "Helados DELIZIA", /* varchar , OBLIGATORIO*/
		id_rubro: 3,  /* int , OBLIGATORIO, id del rubro*/
		direccion : "Calle Olivos N 54",
		responsable_nombre : "Jorge Raul",
		responsable_ap : "Lopez Quinteros",
		mail : "cualquier@cosa.com", /* verificar si tiene el formato correcto en appMovil*/
		activo : 1, /* 1,0 -- si esta vigente 1, si se de de baja 0 , si no se envia por defecto se almacena 1*/
		id_departamento : 3, /* integer */
		id_municipio : 125, /* integer */

	}
	respuesta: {mensaje:"Se ingreso correctamente o Error: error generado por el server ", estado: "ok o error" }

}


RUTA_OBTENER_PREGUNTAS_CON_RRSPUESTAS = { 
	ruta: "http://localhost/www/laravel7/api/obtener-arbol-preguntas-riesgo",
	metodo: "get",
	comentarios:"devuelve un array con las preguntas del indice de riesgo; y cada uno compuesto por un array de sus opciones de respuesta con sus valor e id correspondientes",
	respuesta: 
	{
		"data": [
					{
						"id": 14,
						"nombre": "Interacción cara a cara con gente por más de 15 minutos",
						"orden": 1,
						"opciones": [
							{
								"id": 22,
								"nombre": "Sin filtro sindrómico",
								"valor": "70"
							},
							{
								"id": 23,
								"nombre": "Con filtro sindrómico",
								"valor": "50"
							},
							{
								"id": 24,
								"nombre": "< 15 minutos",
								"valor": "10"
							}
						]
					},
					{
						"id": 15,
						"nombre": "Interacción con más de una persona * hora",
						"orden": 2,
						"opciones": [
							{
								"id": 25,
								"nombre": "≥ 10 personas por hora sin filtro",
								"valor": "25"
							},
							{
								"id": 26,
								"nombre": "≥ 10 personas por hora con filtro",
								"valor": "20"
							},
							{
								"id": 27,
								"nombre": "< 10 personas por hora sin filtro",
								"valor": "15"
							},
							{
								"id": 28,
								"nombre": "< 10 personas por hora con filtro",
								"valor": "10"
							}
						]
					},
					{"etc etc....":"etc"},
	
				]
	}
}

RUTA-GUARDAR-RESPUESTAS-PREGUNTAS-RIESGO = {
	ruta:  "http://fdbb661.online-server.cloud/reactivaweb/api/guardar-respuestas-preguntas-riesgo",
	metodo: "POST",
	comentarios:"Sirve para guardar las respuestas seleccionadas (el id de la opcion y el valor) de las preguntas del indice de riesgo",
	envia_al_server: /* Se envia el id_empresa y un array con Ids de todas las respuestas seleccionadas y su valor, ya no es necesario el id de la pregunta */
	{
		id_empresa:'12345', /* OBLIGATORIO , Id de la Empresa  */
		respuestas:[
			{id_opcion:22}, /* id de la opcion seleccionada, con la opcion seleccionada se sabe el valor y la pregunva asociada  */
			{id_opcion:23},
			{id_opcion:24},
			{id_opcion:26},
			{id_opcion:27},
			{id_opcion:28},
		]

	}
	respuesta_server:  /* Devuelve el array que se envio, pero con un elemento mas en cada item, el id de respuesta del registro generado*/
	{
		data: [
			{id_opcion: "22", valor: "10", id_respuesta: 55},  /* id_respuesta es el id en la tabla donde se almacenan las respuestas realizas, sirve para las actualizaciones (update), si no esta contemplado realizar modificaciones en las respuestas (asumiendo que se introdujo una respuesta por error), entonces no tomar en cuenta   */
			{id_opcion: "23", valor: "25", id_respuesta: 56},
			{id_opcion: "24", valor: "70", id_respuesta: 57},
			{id_opcion: "26", valor: "20", id_respuesta: 58},
			{id_opcion: "28", valor: "50", id_respuesta: 60},
			{id_opcion: "27", valor: "15", id_respuesta: 59},
		],
		mensaje:"Se ingreso correctamente o Error: error generado por el server ", 
		estado: "ok o error"
	}

}


RUTA_OBTENER_ARBOL_EPP____Para_los_rubros_que_no_son_salud = { 
	ruta: "http://localhost/www/laravel7/api/obtener-arbol-epp/nosalud",
	metodo: "get",
	comentarios:"devuelve 2 objetos, 1 con el personal que tiene la empresa (Num empleados) y otro con un array con las EPPs y sus opciones ",
	respuesta: {
		"data": {
			"personal": [
			{
				"id": 67,
				"nombre": "Número de empleados"
			}
			],
			"epp": [
			{
				"id": 47,
				"nombre": "Uniforme de protección",
				"opciones": [
				{
					"id": 53,
					"nombre": "Tamaño 1"
				},
				{
					"id": 54,
					"nombre": "Tamaño 2"
				},
				{
					"id": 55,
					"nombre": "Tamaño 3"
				}
				]
			},
			{
				"id": 48,
				"nombre": "Guantes",
				"opciones": [
				{
					"id": 56,
					"nombre": "pequeño"
				},
				{
					"id": 57,
					"nombre": "mediano"
				},
				{
					"id": 58,
					"nombre": "grande"
				},
				{
					"id": 59,
					"nombre": "extra grande"
				}
				]
			},
			{
				"id": 49,
				"nombre": "Respiradores",
				"opciones": [
				{
					"id": 60,
					"nombre": "N95"
				},
				{
					"id": 61,
					"nombre": "Otros"
				}
				]
			},
			{
				"id": 50,
				"nombre": "Mascara quirúrgica",
				"opciones": [
				{
					"id": 62,
					"nombre": "ASTM 1"
				},
				{
					"id": 63,
					"nombre": "ASTM 2"
				},
				{
					"id": 64,
					"nombre": "ASTM 3"
				}
				]
			},
			{
				"id": 51,
				"nombre": "Escudo facial",
				"opciones": [
				{
					"id": 65,
					"nombre": "Estandar"
				},
				{
					"id": 66,
					"nombre": "Estandar"
				}
				]
			},
			{
				"id": 52,
				"nombre": "Mascara de tela",
				"opciones": []
			}
			]
		}
	}
}

RUTA_OBTENER_ARBOL_EPP____Para_salud = { 
	ruta: "http://localhost/www/laravel7/api/obtener-arbol-epp/nosalud",
	metodo: "get",
	comentarios:"devuelve 2 objetos, 1 con el personal que tiene la empresa (Num empleados) y otro con un array con las EPPs y sus opciones ",
	respuesta: {
		"data": {
			"personal": [
				{
					"id": 68,
					"nombre": "Número de médicos"
				},
				{
					"id": 69,
					"nombre": "N° de pacientes estándar por médico\t"
				},
				{
					"id": 70,
					"nombre": "N° de pacientes COVID-19 por médico"
				},
				{
					"id": 71,
					"nombre": "Número de enfermeras"
				},
				{
					"id": 72,
					"nombre": "N° de pacientes estándar por enfermera\t"
				},
				{
					"id": 73,
					"nombre": "N° de pacientes COVID-19 por enfermera"
				}
			],
			"epp": [
				{
					"id": 47,
					"nombre": "Uniforme de protección",
					"opciones": [
						{
							"id": 53,
							"nombre": "Tamaño 1"
						},
						{
							"id": 54,
							"nombre": "Tamaño 2"
						},
						{
							"id": 55,
							"nombre": "Tamaño 3"
						}
					]
				},
				{'etc etc' : '...etc'},
			]
		}
	}
}
			
	
RUTA_GUARDAR_RESPUESTAS_EPP= {
	ruta:  "http://fdbb661.online-server.cloud/reactivaweb/api/guardar-respuestas-epp",
	metodo: "POST",
	comentarios:"Sirve para guardar las respuestas llenadas de un epp , se manda un array de un epp con los valores y fechas , de varios dias",
	envia_al_server: /* Se envia el id_empresa y un array con Ids de todas las respuestas seleccionadas y su valor, ya no es necesario el id de la pregunta */
	{
            id_empresa: "EMP0908-258", /* varchar , OBLIGATORIO*/
            id_epp_opcion: 58,  /* int , OBLIGATORIO, es el id de la opcion epp que ha llenado  */
            categoria_epp : "epp", /* varchar  OBLIGAORIO , valores pueden ser  [epp o personal */
            respuestas: [
                {valor:58 , fecha_epp:'2020-10-22'},
                {valor:20 , fecha_epp:'2020-10-23'},
                {valor:12 , fecha_epp:'2020-10-24'},
                {valor:21 , fecha_epp:'2020-10-25'},
                {valor:20 , fecha_epp:'2020-10-26'},
            ]
       },
	respuesta_server:  /* Devuelve el array que se envio, pero con un elemento mas en cada item, el id de respuesta del registro generado*/
	{
		data: {},   /* array de los datos ingresados en la Bd con su Id generado, y datos adicionales*/
		mensaje:"Se ingreso correctamente o Error: error generado por el server ", 
		estado: "ok o error"
	}

}		




