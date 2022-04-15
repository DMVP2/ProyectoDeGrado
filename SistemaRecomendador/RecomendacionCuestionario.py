import re
import SistemaRecomendador as sr
from collections import Counter
import pandas as pd
import numpy as np
from matplotlib import pyplot as plt
import sys

def obtenerTematicas(pDataframe):
    df = pDataframe
    resultado = []

    for i in df.index: 
        resultado.append(df['Tema'][i])

    return resultado

tematicas = sr.lecturaArchivoCSV('D:\Archivos de programa\Xampp\htdocs\ProyectoDeGradoRepositorio\SistemaRecomendador\Cuestionario-Temas.csv')

tematicasFinales = obtenerTematicas(tematicas)

df = sr.lecturaArchivoCSV('D:\Archivos de programa\Xampp\htdocs\ProyectoDeGradoRepositorio\SistemaRecomendador\Dataset-RecommenderSystem.csv')
df = sr.preprocesamientoDatos(df)
df = sr.bolsaPalabras(df)
similaridad = sr.matrizSimilaridad(df)

archivo = open('D:/Archivos de programa/Xampp/htdocs/ProyectoDeGradoRepositorio/SistemaRecomendador/RecomendacionesCuestionario.txt','w')
archivo.write('')
archivo.close()

i = 0

for intent in tematicasFinales:
    sr.recomendarCuestionario(intent, similaridad, df, tematicas['Nombre sesion'][i])
    i = i + 1