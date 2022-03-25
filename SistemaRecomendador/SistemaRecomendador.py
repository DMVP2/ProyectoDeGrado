from rake_nltk import Rake
import nltk
nltk.download('stopwords')
nltk.download('punkt')
import pandas as pd
from sklearn.metrics.pairwise import cosine_similarity
from sklearn.feature_extraction.text import CountVectorizer
import warnings
warnings.filterwarnings("ignore")

# Archivo CSV: 'D:\Archivos de programa\Xampp\htdocs\ProyectoDeGradoRepositorio\SistemaRecomendador\Dataset-RecommenderSystem.csv'

def lecturaArchivoCSV(pArchivo):
    # Lectura del archivo CSV
    df = pd.read_csv(pArchivo, sep=";", encoding ='latin1')
    return df

def analisisGeneralArchivoCSV(pDataframe):
    df = pDataframe
    # Resumen de datos
    print("Analizando el archivo CSV (Resumiendo los datos)")
    print("\n")
    print('Filas x Columnas : ', df.shape[0], 'x', df.shape[1])
    print('Títulos: ', df.columns.tolist())
    print("\n")
    print('Valores únicos:')
    print(df.nunique())
    for col in df.columns:
        print(col, end=': ')
        print(df[col].unique())
    # Conteo de valores nulos
    print("Tipos de entradas y conteo de valores nulos")
    print("\n")
    df.info()
    print('\nValores faltantes: ', df.isnull().sum().values.sum())
    print(df.isnull().sum())
    # Presentación de estadísticas básicas para las columnas numéricas
    print("Estadísticas básicas para las columnas numéricas")
    print("\n")
    print(df.describe().T)

# Preprocesamiento de datos

def preprocesamientoDatos(pDataframe):
    df = pDataframe
    # Remover puntuación y espacios en blanco de la columna "Explicación"
    df['Explicación'] = df['Explicación'].str.replace('[^\w\s]','')
    # Extracción de las palabras de una columna específica en una sublista
    df['Palabras clave'] = df['Palabras clave'].map(lambda x: str(x).split(','))
    df['Tipo de tema'] = df['Tipo de tema'].map(lambda x: str(x).split(','))
    df['Asignatura'] = df['Asignatura'].map(lambda x: str(x).split(','))
    df['Jerarquia temática (Mapa/Arbol)'] = df['Jerarquia temática (Mapa/Arbol)'].map(lambda x: str(x).split(','))
    # Se agregan las listas creadas al dataframe
    for index, row in df.iterrows():
        row['Palabras clave'] = [x.lower().replace(' ','') for x in row['Palabras clave']]
        row['Tipo de tema'] = [x.lower().replace(' ','') for x in row['Tipo de tema']]
        row['Asignatura'] = [x.lower().replace(' ','') for x in row['Asignatura']]
        row['Jerarquia temática (Mapa/Arbol)'] = [x.lower().replace(' ','') for x in row['Jerarquia temática (Mapa/Arbol)']]
    # Extraer las palabras clave creando una lista de palabras clave (Función Rake)
    r = Rake()
    # Extracción de las palabras clave de la columna "Explicación"
    df['Key_words_Explicacion'] = ''
    for index, row in df.iterrows():
        r.extract_keywords_from_text(str(row['Explicación']))
        key_words_dict_scores = r.get_word_degrees()
        row['Key_words_Explicacion'] = list(key_words_dict_scores.keys())
    return df

# Representación de las palabras
# Creación de la bolsa de palabras

def bolsaPalabras(pDataframe):
    df = pDataframe
    df['Bag_of_words'] = ''
    columns = ['Palabras clave', 'Tipo de tema', 'Asignatura', 'Jerarquia temática (Mapa/Arbol)', 'Key_words_Explicacion']

    for index, row in df.iterrows():
        words = ''
        for col in columns:
            words += ' '.join(row[col]) + ' '
        row['Bag_of_words'] = words   
         
    df['Bag_of_words'] = df['Bag_of_words'].str.strip().str.replace('   ', ' ').str.replace('  ', ' ')
    df = df[['Tema','Bag_of_words']]
    return df

def matrizSimilaridad(pDataframe):
    df = pDataframe
    count = CountVectorizer()
    count_matrix = count.fit_transform(df['Bag_of_words'])
    count_matrix
    cosine_sim = cosine_similarity(count_matrix, count_matrix)
    return cosine_sim

def recomendar(pTema, pCosine_sim, pDataframe):
    tema = pTema
    cosine_sim = pCosine_sim
    df = pDataframe
    indices = pd.Series(df['Tema'])
    recomendaciones = []
    idx = indices[indices == tema].index[0]
    score_series = pd.Series(cosine_sim[idx]).sort_values(ascending = False)
    top_indices = list(score_series.iloc[0:6].index)

    for i in top_indices:
        recomendaciones.append(list(df['Tema'])[i])
        
    return recomendaciones

df = lecturaArchivoCSV('D:\Archivos de programa\Xampp\htdocs\ProyectoDeGradoRepositorio\SistemaRecomendador\Dataset-RecommenderSystem.csv')
df = preprocesamientoDatos(df)
df = bolsaPalabras(df)
similaridad = matrizSimilaridad(df)