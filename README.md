# previred-php-api

> [!NOTE]
Compatible con <b>PHP 7/8</b>

API no oficial que facilita la obtención de los datos desde [Previred](https://www.previred.com/indicadores-previsionales)
<br> Se puede obtener actualmente:
<br>
* Valor UF (Mes reciente)
* Valor UTM
* UTA
* Datos de rentas topes imponibles
* Rentas mínimas imponibles
* Ahorro previsional voluntario (APV)
* Depósito convenido
* AFC
* Tabla AFP

> [!WARNING]
No se recomienda utilizar esta API para servicios en producción, ya que, cada cierto tiempo Previred puede cambiar de
posición algunos datos en la página web provocando lecturas erróneas. 

<h2>Formato JSON de salida.</h2>

* Sin agrupar
```JSON
[  
    {
        "name": "UF",
        "value": 36733.04,
        "category": "al 31 de Enero del 2024",
        "group": "",
        "type": "$"
    },
    {
        "name": "UTM",
        "value": 64666,
        "category": "Enero 2024",
        "group": "",
        "type": "$"
    },
    {
        "name": "UTA",
        "value": 775992,
        "category": "Enero 2024",
        "group": "",
        "type": "$"
    },
    {
        "name": "Para afiliados a una AFP (84,3 UF)",
        "value": 3096595,
        "category": "",
        "group": "RENTAS TOPES IMPONIBLES",
        "type": "$"
    },
    {
        "name": "Para afiliados al IPS (ex INP) (60 UF)",
        "value": 2207362,
        "category": "",
        "group": "RENTAS TOPES IMPONIBLES",
        "type": "$"
    },
    {
        "name": "Para Seguro de Cesantía (126,6 UF)",
        "value": 4650403,
        "category": "",
        "group": "RENTAS TOPES IMPONIBLES",
        "type": "$"
    },
    {
        "name": "Trab. Dependientes e Independientes",
        "value": 460000,
        "category": "",
        "group": "RENTAS MÍNIMAS IMPONIBLES",
        "type": "$"
    },
    {
        "name": "Menores de 18 y Mayores de 65",
        "value": 343150,
        "category": "",
        "group": "RENTAS MÍNIMAS IMPONIBLES",
        "type": "$"
    },
    {
        "name": "Trabajadores de Casa Particular",
        "value": 460000,
        "category": "",
        "group": "RENTAS MÍNIMAS IMPONIBLES",
        "type": "$"
    },
    {
        "name": "Para fines no remuneracionales",
        "value": 296511,
        "category": "",
        "group": "RENTAS MÍNIMAS IMPONIBLES",
        "type": "$"
    },
    {
        "name": "Tope Mensual (50 UF)",
        "value": 1836652,
        "category": "",
        "group": "AHORRO PREVISIONAL VOLUNTARIO (APV)",
        "type": "$"
    },
    {
        "name": "Tope Anual (600 UF)",
        "value": 22039824,
        "category": "",
        "group": "AHORRO PREVISIONAL VOLUNTARIO (APV)",
        "type": "$"
    },
    {
        "name": "Tope Anual (900 UF)",
        "value": 33059736,
        "category": "",
        "group": "DEPÓSITO CONVENIDO",
        "type": "$"
    },
    {
        "name": "Plazo Indefinido",
        "value": 2.4,
        "category": "EMPLEADOR",
        "group": "SEGURO DE CESANTÍA (AFC)",
        "type": "%"
    },
    {
        "name": "Plazo Indefinido",
        "value": 0.6,
        "category": "TRABAJADOR",
        "group": "SEGURO DE CESANTÍA (AFC)",
        "type": "%"
    },
    {
        "name": "Plazo Fijo",
        "value": 3,
        "category": "",
        "group": "SEGURO DE CESANTÍA (AFC)",
        "type": "%"
    },
    {
        "name": "Plazo Indefinido 11 años o más",
        "value": 0.8,
        "category": "",
        "group": "SEGURO DE CESANTÍA (AFC)",
        "type": "%"
    },
    {
        "name": "Trabajador de Casa Particular",
        "value": 3,
        "category": "",
        "group": "SEGURO DE CESANTÍA (AFC)",
        "type": "%"
    },
    {
        "name": "Capital",
        "value": 11.44,
        "category": "DEPENDIENTES",
        "group": "TASA COTIZACIÓN OBLIGATORIO AFP",
        "type": "%"
    },
    {
        "name": "Capital",
        "value": 12.93,
        "category": "INDEPENDIENTES",
        "group": "TASA COTIZACIÓN OBLIGATORIO AFP",
        "type": "%"
    },
    {
        "name": "Cuprum",
        "value": 11.44,
        "category": "DEPENDIENTES",
        "group": "TASA COTIZACIÓN OBLIGATORIO AFP",
        "type": "%"
    },
    {
        "name": "Cuprum",
        "value": 12.93,
        "category": "INDEPENDIENTES",
        "group": "TASA COTIZACIÓN OBLIGATORIO AFP",
        "type": "%"
    },
    {
        "name": "Habitat",
        "value": 11.27,
        "category": "DEPENDIENTES",
        "group": "TASA COTIZACIÓN OBLIGATORIO AFP",
        "type": "%"
    },
    {
        "name": "Habitat",
        "value": 12.76,
        "category": "INDEPENDIENTES",
        "group": "TASA COTIZACIÓN OBLIGATORIO AFP",
        "type": "%"
    },
    {
        "name": "PlanVital",
        "value": 11.16,
        "category": "DEPENDIENTES",
        "group": "TASA COTIZACIÓN OBLIGATORIO AFP",
        "type": "%"
    },
    {
        "name": "PlanVital",
        "value": 12.65,
        "category": "INDEPENDIENTES",
        "group": "TASA COTIZACIÓN OBLIGATORIO AFP",
        "type": "%"
    },
    {
        "name": "ProVida",
        "value": 11.45,
        "category": "DEPENDIENTES",
        "group": "TASA COTIZACIÓN OBLIGATORIO AFP",
        "type": "%"
    },
    {
        "name": "ProVida",
        "value": 12.94,
        "category": "INDEPENDIENTES",
        "group": "TASA COTIZACIÓN OBLIGATORIO AFP",
        "type": "%"
    },
    {
        "name": "Modelo",
        "value": 10.58,
        "category": "DEPENDIENTES",
        "group": "TASA COTIZACIÓN OBLIGATORIO AFP",
        "type": "%"
    },
    {
        "name": "Modelo",
        "value": 12.07,
        "category": "INDEPENDIENTES",
        "group": "TASA COTIZACIÓN OBLIGATORIO AFP",
        "type": "%"
    }
]
```


* Formato <b>agrupado</b>

```JSON
{
    "OTROS": [
        {
            "name": "UF",
            "value": 36733.04,
            "category": "al 31 de Enero del 2024",
            "group": "",
            "type": "$"
        },
        {
            "name": "UTM",
            "value": 64666,
            "category": "Enero 2024",
            "group": "",
            "type": "$"
        },
        {
            "name": "UTA",
            "value": 775992,
            "category": "Enero 2024",
            "group": "",
            "type": "$"
        }
    ],
    "RENTAS TOPES IMPONIBLES": [
        {
            "name": "Para afiliados a una AFP (84,3 UF)",
            "value": 3096595,
            "category": "",
            "group": "RENTAS TOPES IMPONIBLES",
            "type": "$"
        },
        {
            "name": "Para afiliados al IPS (ex INP) (60 UF)",
            "value": 2207362,
            "category": "",
            "group": "RENTAS TOPES IMPONIBLES",
            "type": "$"
        },
        {
            "name": "Para Seguro de Cesantía (126,6 UF)",
            "value": 4650403,
            "category": "",
            "group": "RENTAS TOPES IMPONIBLES",
            "type": "$"
        }
    ],
    "RENTAS MÍNIMAS IMPONIBLES": [
        {
            "name": "Trab. Dependientes e Independientes",
            "value": 460000,
            "category": "",
            "group": "RENTAS MÍNIMAS IMPONIBLES",
            "type": "$"
        },
        {
            "name": "Menores de 18 y Mayores de 65",
            "value": 343150,
            "category": "",
            "group": "RENTAS MÍNIMAS IMPONIBLES",
            "type": "$"
        },
        {
            "name": "Trabajadores de Casa Particular",
            "value": 460000,
            "category": "",
            "group": "RENTAS MÍNIMAS IMPONIBLES",
            "type": "$"
        },
        {
            "name": "Para fines no remuneracionales",
            "value": 296511,
            "category": "",
            "group": "RENTAS MÍNIMAS IMPONIBLES",
            "type": "$"
        }
    ],
    "AHORRO PREVISIONAL VOLUNTARIO (APV)": [
        {
            "name": "Tope Mensual (50 UF)",
            "value": 1836652,
            "category": "",
            "group": "AHORRO PREVISIONAL VOLUNTARIO (APV)",
            "type": "$"
        },
        {
            "name": "Tope Anual (600 UF)",
            "value": 22039824,
            "category": "",
            "group": "AHORRO PREVISIONAL VOLUNTARIO (APV)",
            "type": "$"
        }
    ],
    "DEPÓSITO CONVENIDO": [
        {
            "name": "Tope Anual (900 UF)",
            "value": 33059736,
            "category": "",
            "group": "DEPÓSITO CONVENIDO",
            "type": "$"
        }
    ],
    "SEGURO DE CESANTÍA (AFC)": [
        {
            "name": "Plazo Indefinido",
            "value": 2.4,
            "category": "EMPLEADOR",
            "group": "SEGURO DE CESANTÍA (AFC)",
            "type": "%"
        },
        {
            "name": "Plazo Indefinido",
            "value": 0.6,
            "category": "TRABAJADOR",
            "group": "SEGURO DE CESANTÍA (AFC)",
            "type": "%"
        },
        {
            "name": "Plazo Fijo",
            "value": 3,
            "category": "",
            "group": "SEGURO DE CESANTÍA (AFC)",
            "type": "%"
        },
        {
            "name": "Plazo Indefinido 11 años o más",
            "value": 0.8,
            "category": "",
            "group": "SEGURO DE CESANTÍA (AFC)",
            "type": "%"
        },
        {
            "name": "Trabajador de Casa Particular",
            "value": 3,
            "category": "",
            "group": "SEGURO DE CESANTÍA (AFC)",
            "type": "%"
        }
    ],
    "TASA COTIZACIÓN OBLIGATORIO AFP": [
        {
            "name": "Capital",
            "value": 11.44,
            "category": "DEPENDIENTES",
            "group": "TASA COTIZACIÓN OBLIGATORIO AFP",
            "type": "%"
        },
        {
            "name": "Capital",
            "value": 12.93,
            "category": "INDEPENDIENTES",
            "group": "TASA COTIZACIÓN OBLIGATORIO AFP",
            "type": "%"
        },
        {
            "name": "Cuprum",
            "value": 11.44,
            "category": "DEPENDIENTES",
            "group": "TASA COTIZACIÓN OBLIGATORIO AFP",
            "type": "%"
        },
        {
            "name": "Cuprum",
            "value": 12.93,
            "category": "INDEPENDIENTES",
            "group": "TASA COTIZACIÓN OBLIGATORIO AFP",
            "type": "%"
        },
        {
            "name": "Habitat",
            "value": 11.27,
            "category": "DEPENDIENTES",
            "group": "TASA COTIZACIÓN OBLIGATORIO AFP",
            "type": "%"
        },
        {
            "name": "Habitat",
            "value": 12.76,
            "category": "INDEPENDIENTES",
            "group": "TASA COTIZACIÓN OBLIGATORIO AFP",
            "type": "%"
        },
        {
            "name": "PlanVital",
            "value": 11.16,
            "category": "DEPENDIENTES",
            "group": "TASA COTIZACIÓN OBLIGATORIO AFP",
            "type": "%"
        },
        {
            "name": "PlanVital",
            "value": 12.65,
            "category": "INDEPENDIENTES",
            "group": "TASA COTIZACIÓN OBLIGATORIO AFP",
            "type": "%"
        },
        {
            "name": "ProVida",
            "value": 11.45,
            "category": "DEPENDIENTES",
            "group": "TASA COTIZACIÓN OBLIGATORIO AFP",
            "type": "%"
        },
        {
            "name": "ProVida",
            "value": 12.94,
            "category": "INDEPENDIENTES",
            "group": "TASA COTIZACIÓN OBLIGATORIO AFP",
            "type": "%"
        },
        {
            "name": "Modelo",
            "value": 10.58,
            "category": "DEPENDIENTES",
            "group": "TASA COTIZACIÓN OBLIGATORIO AFP",
            "type": "%"
        },
        {
            "name": "Modelo",
            "value": 12.07,
            "category": "INDEPENDIENTES",
            "group": "TASA COTIZACIÓN OBLIGATORIO AFP",
            "type": "%"
        }
    ]
}
```
