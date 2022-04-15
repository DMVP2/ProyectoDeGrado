import SistemaRecomendador as sr
from collections import Counter
import pandas as pd
import numpy as np

def obtenerTematicas():
    diccionarioTematicas = pd.read_csv('D:\Archivos de programa\Xampp\htdocs\ProyectoDeGradoRepositorio\SistemaRecomendador\Intents-Temas.csv', sep=";", encoding ='latin1')
    return diccionarioTematicas

def obtenerIntents(pDataframe):
    df = pDataframe
    df = df.fillna('NULL')
    intents = df['Intent'].tolist()
    conteo = Counter(intents)

    resultado = {}

    for clave in conteo:  
        valor = conteo[clave]
        if valor != 1:
            resultado[clave] = valor
    return resultado

def intentsMasRepetidos(pIntents, pCantidadIntents):
    cantidadIntents = pCantidadIntents
    intents = pIntents
    intents.pop('saludos')
    intents.pop('despedidas')
    intents.pop('NULL')
    
    masRepetidos = []

    for i in range(cantidadIntents):
        valorMayor = 0
        claveMayor = ''
        for intent in intents:
            valor = intents[intent]
            if(valor > valorMayor):
                if not intent in masRepetidos:
                    valorMayor = valor
                    claveMayor = intent
        masRepetidos.append(claveMayor)
    return masRepetidos

def localizarTematicasIntents(pIntents, pDataframe):
    intents = pIntents
    tematicas = pDataframe

    tematicasFinales = []

    for intent in intents:
        for fila in tematicas.index:
            if(intent == tematicas['Intents'][fila]):
                tematicasFinales.append(tematicas['Tema'][fila])

    return tematicasFinales

df = sr.lecturaArchivoCSV('D:\Archivos de programa\Xampp\htdocs\ProyectoDeGradoRepositorio\SistemaRecomendador\logs.csv')

intents = obtenerIntents(df)
masRepetidos = intentsMasRepetidos(intents, 3)
intentsTematicas = obtenerTematicas()
tematicas = localizarTematicasIntents(masRepetidos, intentsTematicas)

df = sr.lecturaArchivoCSV('D:\Archivos de programa\Xampp\htdocs\ProyectoDeGradoRepositorio\SistemaRecomendador\Dataset-RecommenderSystem.csv')
df = sr.preprocesamientoDatos(df)
df = sr.bolsaPalabras(df)
similaridad = sr.matrizSimilaridad(df)

archivo = open('D:/Archivos de programa/Xampp/htdocs/ProyectoDeGradoRepositorio/SistemaRecomendador/RecomendacionesLogs.txt','w')
archivo.write('')
archivo.close()

for intent in tematicas:
    sr.recomendarLogs(intent, similaridad, df)