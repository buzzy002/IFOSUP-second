import random as rd

def printMatrice(matrice):
    for row in matrice:
        print(*[f"{num:5.4g}" for num in row], sep="   ", end="\n")

def askUserMatriceDim():
    return (int(input("How many lines ? ")), int(input("How many columns ? ")))


def genMatriceUnite(dim):
    matrice = list()
    for i in range(0, dim[0]):
        matrice.append([])
        for j in range(0, dim[1]):
            if(j == i):
                matrice[i].append(1)
            else:
                matrice[i].append(0)
    return matrice

def genMatriceDiag(dim):
    matrice = list()
    for i in range(0, dim[0]):
        matrice.append([])
        for j in range(0, dim[1]):
            if(j == i):
                matrice[i].append(rd.uniform(0, 100))
            else:
                matrice[i].append(0)
    return matrice

def genMatriceTriang(dim, isSupp=True):
    if(dim[0] != dim[1]):
        print("Le nombre de lignes doit être le même que le nombre de colonne")
        return [[]]
    
    matrice = list()
    if(isSupp):
        for i in range(0, dim[0]):
            matrice.append([])
            for j in range(0, dim[1]):
                if(j-i >= 0):
                    matrice[i].append(rd.uniform(0, 100))
                else:
                    matrice[i].append(0)
    else:
        for i in range(0, dim[0]):
            matrice.append([])
            for j in range(0, dim[1]):
                if(j-i <= 0):
                    matrice[i].append(rd.uniform(0, 100))
                else:
                    matrice[i].append(0)
    return matrice

def genMatriceCreuse(dim, density=0.2):
    return [[rd.randint(0, 1) for j in range(0, dim[1])] for i in range(0, dim[0])]

def genMatriceCreuseV2(dim, density=0.2):
    matrice = [[0 for j in range(0, dim[1])] for i in range(0, dim[0])]
    
    NumberNonNullElements = dim[0] * dim[1] * density
    countNonNullElemets = int()

    while(countNonNullElemets < NumberNonNullElements):
        i = rd.randint(0, dim[0]-1)
        j = rd.randint(0, dim[1]-1)
        matrice[i][j] = rd.uniform(0, 100)
        countNonNullElemets += 1
    
    return matrice

def genMatriceNull(dim):
    return [[0 for j in range(0, dim[1])] for i in range(0, dim[0])]