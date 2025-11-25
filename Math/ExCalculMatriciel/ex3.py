import random as rd

def printMatrice(matrice):
    for row in matrice:
        print(*[f"{num:5.4g}" for num in row], sep="   ", end="\n")

def askUserMatriceDim():
    return (int(input("How many lines ? ")), int(input("How many columns ? ")))

def additionMatrice(matrice1, matrice2):
    if(len(matrice1) != len(matrice2) or len(matrice1[0]) != len(matrice2[0])):
        print("L'addition n'est pas possible car les matrices n'ont pas la même dimension")
        return [[]]
    
    matrice = [[None for j in range(0, len(matrice[0]))] for i in range(0, len(matrice1))]

    for i in range(0, len(matrice1)):
        for j in range(0, len(matrice[0])):
            matrice[i][j] = matrice1[i][j] + matrice2[i][j]
    
    return matrice

def soustractionMatrice(matrice1, matrice2):
    if(len(matrice1) != len(matrice2) or len(matrice1[0]) != len(matrice2[0])):
        print("L'addition n'est pas possible car les matrices n'ont pas la même dimension")
        return [[]]

    matrice = [[None for j in range(0, len(matrice[0]))] for i in range(0, len(matrice1))]

    for i in range(0, len(matrice1)):
        for j in range(0, len(matrice[0])):
            matrice[i][j] = matrice1[i][j] - matrice2[i][j]
    
    return matrice