import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.linear_model import LinearRegression
from sklearn.metrics import mean_squared_error
import json

# Lire les données du fichier JSON
with open('data.json', 'r') as f:
    data = json.load(f)

# Convertir les données en DataFrame
df = pd.DataFrame(data)

# Séparer les variables indépendantes et la variable dépendante
X = df[['duree_formation', 'prix_formation']]
y = df['nb_inscriptions']

# Diviser les données en ensembles d'entraînement et de test
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=0)

# Créer et entraîner le modèle de régression linéaire multiple
model = LinearRegression()
model.fit(X_train, y_train)

# Faire des prédictions sur l'ensemble de test
y_pred = model.predict(X_test)

# Évaluer le modèle
mse = mean_squared_error(y_test, y_pred)

# Stocker les résultats dans un dictionnaire
results = {
    'mse': mse,
    'coefficients': model.coef_.tolist(),
    'intercept': model.intercept_.tolist()
}

# Écrire les résultats dans un fichier JSON
with open('results.json', 'w') as f:
    json.dump(results, f)
