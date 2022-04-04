import re
import SistemaRecomendador as sr
from collections import Counter
import pandas as pd
import numpy as np
from matplotlib import pyplot as plt
import sys

def obtenerTematicaDiccionario(pDataframe, pTematica):
    df = pDataframe
    tematica = pTematica
    resultado = ""

    for i in df.index: 
        if(df['Tema cuestionario'][i] == tematica):
            resultado = df['Tema'][i]

    return resultado

tematicas = sr.lecturaArchivoCSV('D:\Archivos de programa\Xampp\htdocs\ProyectoDeGradoRepositorio\SistemaRecomendador\Cuestionario-Temas.csv')

tematica = obtenerTematicaDiccionario(tematicas, sys.argv[1])

df = sr.lecturaArchivoCSV('D:\Archivos de programa\Xampp\htdocs\ProyectoDeGradoRepositorio\SistemaRecomendador\Dataset-RecommenderSystem.csv')
df = sr.preprocesamientoDatos(df)
df = sr.bolsaPalabras(df)
similaridad = sr.matrizSimilaridad(df)

for intent in tematicas:
    print(sr.recomendar(tematica, similaridad, df))