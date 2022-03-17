import SistemaRecomendador as sr
from collections import Counter
import numpy as np

df = sr.lecturaArchivoCSV('D:\Archivos de programa\Xampp\htdocs\ProyectoDeGradoRepositorio\SistemaRecomendador\logs.csv')

def obtenerIntents(pDataframe):
    df = pDataframe
    intents = df['Intent'].tolist()
    conteo = Counter(intents)

    resultado = {}

    for clave in conteo:  
        valor = conteo[clave]
        if valor != 1:
            resultado[clave] = valor
    print(resultado)
    return resultado

def intentsMasRepetidos(pIntents):
    intents = pIntents
    intents.pop('saludos')
    intents.pop('despedidas')
    valorMayor = 0
    claveMayor = ''
    for intent in intents:
        valor = intents[intent]
        if(valor > valorMayor):
            valorMayor = valor
            claveMayor = intent
    print(claveMayor)


intents = obtenerIntents(df)
intentsMasRepetidos(intents)