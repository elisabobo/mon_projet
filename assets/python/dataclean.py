import pandas as pd

df_entreprise=pd.read_csv("assets/dataset/corporate_rating.csv")
# taille des données (2029, 31)
colonnes_a_sup=['Symbol','Rating Agency Name','Date','daysOfSalesOutstanding','pretaxProfitMargin','grossProfitMargin','returnOnAssets','returnOnCapitalEmployed'
    ,'assetTurnover','fixedAssetTurnover','effectiveTaxRate','freeCashFlowOperatingCashFlowRatio','freeCashFlowPerShare','cashPerShare','companyEquityMultiplier','ebitPerRevenue'
    ,'enterpriseValueMultiple','operatingCashFlowPerShare','payablesTurnover']
    
df_entreprise.drop(columns=colonnes_a_sup, inplace=True)
    #nom_colonnes=df_entreprise.columns
    #taille (2029, 12)
    # suppression de colonnes inutiles
secteur=df_entreprise.drop_duplicates(subset=["Sector"])["Sector"]
    #print(secteur)
    #dico
notation = {'AAA': 10,
            'AA':9,
            'A':8,
            'BBB':7,
            'BB': 6,
            'B':5,
            'CCC':4,
            'CC':3,
            'C':2,
            'D':1}

note_score={
    10 : 'AAA',
    9 : 'AA',
    8: 'A',
    7: 'BBB',
    6: 'BB',
    5: 'B',
    4: 'CCC',
    3: 'CC',
    2: 'C',
    1: 'D'}

#applique une fonction a chaque element de la liste
df_entreprise['rating_num']=df_entreprise['Rating'].map(notation)
df_entreprise = df_entreprise.groupby("Name").agg({"Sector":"first","rating_num":"mean","currentRatio":"mean","cashRatio":"mean",
"netProfitMargin":"mean","operatingProfitMargin":"mean", "debtRatio":"mean", "debtEquityRatio":"mean","returnOnEquity":"mean",
"operatingCashFlowSalesRatio":"mean"}).reset_index()
df_entreprise["rating_note"] = df_entreprise["rating_num"].round().map(note_score)
#taille (593, 11)


#print(secteur)



df_entreprise.to_csv("assets/dataset/corporate_rating_clean.csv", index=False)