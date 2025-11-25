import random as rd 

def printMatrice(matrice):
    for row in matrice:
        print(*[f"{num:5.4g}" for num in row], sep="   ", end="\n")

def defMatrice(isFilledInt=True):
    MatriceNumLine = int(input("How many lines ? "))
    MatriceNumCol = int(input("How many columns ? "))

    if(isFilledInt):
        return [[rd.randint(0,100) for j in range(0, MatriceNumCol)] for i in range(0, MatriceNumLine)]
    else:
        return [[rd.uniform(0, 100) for j in range(0, MatriceNumCol)] for i in range(0, MatriceNumLine)]

printMatrice(defMatrice())

print("\n")

printMatrice(defMatrice(False))